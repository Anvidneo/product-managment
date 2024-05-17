<?php

namespace App\Core\Repositories;

interface ProductRepository {

    public function findById(int $id);
    public function getAll();
    public function create($productData);
    public function update($id, $productData);
    public function delete($id);

}