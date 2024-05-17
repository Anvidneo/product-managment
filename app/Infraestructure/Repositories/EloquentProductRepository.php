<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Product;
use App\Core\Entities\Category;
use App\Core\Entities\ProductsCategories;
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
        $this->createproductcategory($product->id, $productData->categories);
        $product->load('categories');

        return $product;
    }

    public function update($id, $productData) {
        $product = Product::findOrFail($id);

        $product->name = $productData->name;
        $product->price = $productData->price;
        $product->stock = $productData->stock;

        $product->save();
        $product->categories()->detach();
        $product->categories()->delete();
        $this->createproductcategory($product->id, $productData->categories);
        $product->load('categories');

        return $product;
    }

    private function createproductcategory($productId, $categories){
        foreach ($categories as $key => $value) {
            $category = Category::findOrFail($value);
            $productCategory = new ProductsCategories([
                'product' => $productId,
                'category' => $category->id
            ]);
    
            $productCategory->save();
        }
    }

    public function delete($id) {
        $product = Product::findOrFail($id);

        $product->categories()->detach();
        $product->categories()->delete();

        $product->delete();

        return $product;
    }
}