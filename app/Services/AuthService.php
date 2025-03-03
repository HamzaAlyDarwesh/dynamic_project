<?php

namespace App\Services;

use App\Interfaces\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{

    /**
     * @param array $data
     * @return User
     */
    public function registerUser(array $data): User
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    /**
     * @param array $data
     * @return array|null
     */
    public function loginUser(array $data): array|null
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return null; // Invalid credentials
        }

        $user = Auth::user();
        $token = $user->createToken('authToken', [], now()->addMinutes(30))->plainTextToken;

        return [
            'user' => $user,
            'access_token' => $token,
        ];
    }

    /**
     * @param object $token
     * @return mixed
     */
    public function logoutUser(object $token): mixed
    {
        return $token->delete();
    }
}
