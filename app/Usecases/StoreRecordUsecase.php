<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\CheckupCourse;
use App\Models\MedicalRecord;
use App\Repositories\MedicalRecordRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

final readonly class StoreRecordUsecase
{
    public function __construct(private UserRepositoryInterface $userRepository, private MedicalRecordRepositoryInterface $medicalRecordRepository)
    {
    }

    public function __invoke(Ulid $userId, CarbonImmutable $checkupDate, CheckupCourse $course, string $place): void
    {
        $user = $this->userRepository->findById($userId);
        if ($user === null) {
            // TODO: 独自例外を用意
            abort(404);
        }

        $medicalRecord = new MedicalRecord(Str::ulid(), $userId, $course, $place, $checkupDate);
        $this->medicalRecordRepository->insertOrFail($medicalRecord);
    }
}
