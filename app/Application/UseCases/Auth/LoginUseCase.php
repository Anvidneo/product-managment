<?php

namespace App\Application\UseCases\Auth;

use App\Core\Repositories\AuthRepository;

class LoginUseCase {
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function execute(array $credentials)
    {
        return $this->authRepository->login($credentials);
    }
}
