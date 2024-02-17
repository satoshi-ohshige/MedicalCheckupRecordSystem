<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Repositories\MedicalRecordRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Symfony\Component\Uid\Ulid;

final readonly class ShowUserDetailUsecase
{
    public function __construct(private UserRepositoryInterface $userRepository, private MedicalRecordRepositoryInterface $medicalRecordRepository)
    {
    }

    public function __invoke(Ulid $userId): ShowUserDetailUsecaseOutput
    {
        $user = $this->userRepository->findById($userId);
        if ($user === null) {
            // TODO: 独自例外を用意
            abort(404);
        }

        $medicalRecords = $this->medicalRecordRepository->findByUserId($userId);

        return new ShowUserDetailUsecaseOutput($user, $medicalRecords);
    }
}
