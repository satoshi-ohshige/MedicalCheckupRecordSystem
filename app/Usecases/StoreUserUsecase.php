<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\Birthdate;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Str;

final readonly class StoreUserUsecase
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(string $name, Birthdate $birthdate): StoreUserUsecaseOutput
    {
        $user = new User(Str::ulid(), $name, $birthdate);
        $this->userRepository->insert($user);

        return new StoreUserUsecaseOutput($user);
    }
}
