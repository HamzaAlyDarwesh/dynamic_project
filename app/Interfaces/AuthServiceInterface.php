<?php

namespace App\Interfaces;

interface AuthServiceInterface
{
    public function registerUser(array $data);

    public function loginUser(array $data);

    public function logoutUser(object $token);
}
