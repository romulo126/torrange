<?php

namespace App\Service\User;

use App\Repositories\UserRepositoryEloquent;

class UserService {
    private UserRepositoryEloquent $model;

    public function __construct(UserRepositoryEloquent $model)
    {
        $this->model = $model;   
    }
    public function register(array $data): ?array
    {
        return $this->model->register($data);
    }
}