<?php
declare(strict_types=1);

namespace App\Usecases;

use App\ViewModels\UsersItemViewModel;

final readonly class ShowUsersUsecaseOutput
{
    /**
     * @param UsersItemViewModel[] $users
     */
    public function __construct(public array $users)
    {
    }
}
