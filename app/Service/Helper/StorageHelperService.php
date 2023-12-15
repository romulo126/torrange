<?php

namespace App\Service\Helper;

use Illuminate\Support\Facades\Storage;
use App\Service\Bot\BjSher\BJRequestService;
use Illuminate\Support\Facades\Http;
use App\Service\Bot\BotHelpesrsServices;
use Illuminate\Support\Facades\Log;

class  StorageHelperService
{
    public static function getPublic(?string $body, ?string $type): string
    {
        if (empty($body) || empty($type)) {
            return '';
        }

        $name = null;
        $local = 'public';

        $data = BotHelpesrsServices::replaceUrl(1, $body);

        if (! empty($data)) {
            $body = $data['replace'];

            $name = str_replace('__typeUrlReplaceBot__', "{$type}", $body);

            if (! self::checkIconExist($local, $name)) {
                $file = BotHelpesrsServices::download(1, $data['origin']);

                self::createFile($local, $name, $file);
            }
        }

        return self::getUrl($local, $name);
    }

    static function checkIconExist(string $local, string $name)
    {
        return Storage::disk( $local)->exists($name);
    }

    static function createFile(string $local, string $name, string $body)
    {
        return Storage::disk($local)->put($name, $body);
    }

    static function getUrl(string $local, string $name) {
        return Storage::disk($local)->url($name);
    }
}
