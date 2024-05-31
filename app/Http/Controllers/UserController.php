<?php

namespace App\Http\Controllers;

use App\Application\UseCases\User\CreateUserUseCase;
use App\Application\UseCases\User\DeleteUserUseCase;
use App\Application\UseCases\User\GetAllUserUseCase;
use App\Application\UseCases\User\GetUserByIdUseCase;
use App\Application\UseCases\User\UpdateUserUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllUserUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetUserByIdUseCase $useCase) {
        $user = $useCase->execute($id);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error', "error" => $th], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request, UpdateUserUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error', "error" => $th], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, DeleteUserUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error', "error" => $th], 500);
        }
    }
}
