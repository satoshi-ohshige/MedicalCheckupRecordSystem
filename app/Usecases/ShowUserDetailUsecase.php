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

final readonly class ShowUserDetailUsecase
{
    public function __invoke(Ulid $userId): ShowUserDetailUsecaseOutput
    {
        $user = new User($userId, '島田直樹', Birthdate::factory('1996-04-30'));
        $medicalRecords = [
            new MedicalRecord(Str::ulid(), $userId, CheckupCourse::Basic, '東京都練馬区', new CarbonImmutable('2023-10-13 00:00:00')),
            new MedicalRecord(Str::ulid(), $userId, CheckupCourse::Basic, '東京都練馬区', new CarbonImmutable('2022-09-22 00:00:00')),
            new MedicalRecord(Str::ulid(), $userId, CheckupCourse::Basic, '東京都新宿区', new CarbonImmutable('2021-10-25 00:00:00')),
            new MedicalRecord(Str::ulid(), $userId, CheckupCourse::Basic, '東京都練馬区', new CarbonImmutable('2020-08-27 00:00:00')),
            new MedicalRecord(Str::ulid(), $userId, CheckupCourse::Basic, '東京都港区', new CarbonImmutable('2019-09-21 00:00:00')),
        ];

        return new ShowUserDetailUsecaseOutput($user, $medicalRecords);
    }
}
