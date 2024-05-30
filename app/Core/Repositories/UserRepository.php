<?php

namespace App\Core\Repositories;

interface UserRepository {

    public function findById(int $id);
    public function getAll();
    public function create($userData);
    public function update($id, $userData);
    public function delete($id);

}