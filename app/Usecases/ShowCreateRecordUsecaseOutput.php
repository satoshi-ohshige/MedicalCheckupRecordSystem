<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\User;

final readonly class ShowCreateRecordUsecaseOutput
{
    public function __construct(public User $user)
    {
    }
}
