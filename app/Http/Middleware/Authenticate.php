<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class Authenticate extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Unauthenticated: Token not provided or invalid.'
        ], JsonResponse::HTTP_UNAUTHORIZED));
    }
}
