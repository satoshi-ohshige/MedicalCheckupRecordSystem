<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\ViewModels\UsersItemViewModel;
use Symfony\Component\Uid\Ulid;

interface UserRepositoryInterface
{
    public function findById(Ulid $userId): ?User;

    /**
     * @return UsersItemViewModel[]
     */
    public function findAll(): array;

    public function insert(User $user): void;
}
