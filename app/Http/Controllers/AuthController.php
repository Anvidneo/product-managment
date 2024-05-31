<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Application\UseCases\Auth\LoginUseCase;
use App\Application\UseCases\Auth\LogoutUseCase;
use App\Application\UseCases\Auth\RefreshUseCase;
use App\Application\UseCases\Auth\ErrorTokenUseCase;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Not login
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorToken()
    {
        return response()->json(['error' => 'Invalid token'], 401);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request, LoginUseCase $useCase)
    {
        $credentials = $request->only(['email', 'password']);
        return $useCase->execute($credentials);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(LogoutUseCase $useCase)
    {
        return $useCase->execute();
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(RefreshUseCase $useCase)
    {
        return $useCase->execute();
    }
}