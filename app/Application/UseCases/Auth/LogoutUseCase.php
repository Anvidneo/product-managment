<?php

namespace App\Application\UseCases\Auth;

use App\Core\Repositories\AuthRepository;

class LogoutUseCase {
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function execute()
    {
        return $this->authRepository->logout();
    }
}
