<?php

namespace App\Core\Repositories;

interface AuthRepository
{
    public function login(array $authData);
    public function logout();
    public function refresh();
    public function errorToken();
}
