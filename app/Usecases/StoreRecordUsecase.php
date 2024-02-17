<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\Birthdate;
use App\Models\CheckupCourse;
use App\Models\MedicalRecord;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Support\Str;
use Symfony\Component\Uid\Ulid;

final readonly class StoreRecordUsecase
{
    public function __invoke(Ulid $userId, CarbonImmutable $checkupDate, CheckupCourse $course, string $place): void
    {
        $medicalRecord = new MedicalRecord(Str::ulid(), $userId, $course, $place, $checkupDate);
    }
}
