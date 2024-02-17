<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\Birthdate;
use App\Models\User;
use Symfony\Component\Uid\Ulid;

final readonly class ShowCreateRecordUsecase
{
    public function __invoke(Ulid $userId): ShowCreateRecordUsecaseOutput
    {
        $user = new User($userId, '島田直樹', Birthdate::factory('1996-04-30'));

        return new ShowCreateRecordUsecaseOutput($user);
    }
}
