<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Exceptions\UserNotFoundException;
use App\Repositories\UserRepositoryInterface;
use Symfony\Component\Uid\Ulid;

final readonly class ShowCreateRecordUsecase
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(Ulid $userId): ShowCreateRecordUsecaseOutput
    {
        $user = $this->userRepository->findById($userId);
        if ($user === null) {
            throw new UserNotFoundException($userId);
        }

        return new ShowCreateRecordUsecaseOutput($user);
    }
}
