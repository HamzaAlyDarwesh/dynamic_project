<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Interfaces\AuthServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(protected AuthServiceInterface $authService)
    {
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->authService->registerUser($request->validated());


        return $this->response(
            __('response.created_successfully'),
            $response,
            null,
            Response::HTTP_CREATED
        );
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authService->loginUser($request->validated());

        if (!$response) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $this->authService->logoutUser($request->user()->currentAccessToken());

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
