<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TorrentController extends Controller
{
    public function __invoke(string $id, Request $request)
    {
        return view('torrange', ['id' => $id, 'type' => $request->type]);
    }
}
