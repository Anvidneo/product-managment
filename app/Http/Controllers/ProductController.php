<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Product\CreateProductUseCase;
use App\Application\UseCases\Product\DeleteProductUseCase;
use App\Application\UseCases\Product\GetAllProductUseCase;
use App\Application\UseCases\Product\GetProductByIdUseCase;
use App\Application\UseCases\Product\UpdateProductUseCase;
use App\Application\UseCases\Product\GetProductByCategoryOrPriceRangeUseCase;
use App\Application\UseCases\Product\GetListOfPriceByProductsAvalibleUseCase;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllProductUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetProductByIdUseCase $useCase) {
        $product = $useCase->execute($id);
        return $product;
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateProductUseCase $useCase)
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
    public function update(int $id, Request $request, UpdateProductUseCase $useCase)
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
    public function destroy(int $id, DeleteProductUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error', "error" => $th], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function findByCategoryAndPriceRange(Request $request, GetProductByCategoryOrPriceRangeUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error', "error" => $th], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function listOfPriceByProductsAvalible(GetListOfPriceByProductsAvalibleUseCase $useCase)
    {
        try {
            return $useCase->execute();
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error', "error" => $th], 500);
        }
    }
}
