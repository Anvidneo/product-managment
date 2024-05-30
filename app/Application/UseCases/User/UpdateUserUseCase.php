<?php

namespace App\Application\UseCases\User;

use App\Core\Repositories\UserRepository;

class UpdateUserUseCase {
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($id, $user) {
        return $this->userRepository->update($id, $user);
    }
}