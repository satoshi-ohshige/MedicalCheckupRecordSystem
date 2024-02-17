<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Repositories\UserRepositoryInterface;

final readonly class ShowUsersUsecase
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(): ShowUsersUsecaseOutput
    {
        $users = $this->userRepository->findAll();

        return new ShowUsersUsecaseOutput($users);
    }
}
