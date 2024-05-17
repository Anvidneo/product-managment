<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Product;
use App\Core\Repositories\ProductRepository;

class EloquentProductRepository implements ProductRepository {

    public function findById(int $id) {
        return Product::find($id);
    }

    public function getAll() {
        return Product::all();
    }

    public function create($productData) {
        $product = new Product([
            'name' => $productData->name,
            'price' => $productData->price,
            'stock' => $productData->stock
        ]);

        $product->save();

        return $product;
    }

    public function update($id, $productData) {
        $product = Product::findOrFail($id);

        $product->name = $productData->name;
        $product->price = $productData->price;
        $product->stock = $productData->stock;
        $product->save();

        return $product;
    }

    public function delete($id) {
        $product = Product::findOrFail($id);

        $product->delete();
        return $product;
    }
}