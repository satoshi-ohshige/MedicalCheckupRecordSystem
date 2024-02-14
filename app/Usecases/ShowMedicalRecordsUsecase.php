<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\Birthdate;
use App\Models\CheckupCourse;
use App\Models\FiscalYear;
use App\Models\MedicalRecord;
use App\Models\User;
use App\ViewModels\MedicalRecordsItemViewModel;
use Carbon\CarbonImmutable;
use Illuminate\Support\Str;

final readonly class ShowMedicalRecordsUsecase
{
    public function __invoke(FiscalYear $fiscalYear): ShowMedicalRecordsUsecaseOutput
    {
        $medicalRecords = [
            new MedicalRecordsItemViewModel(
                new User(Str::ulid(), '島田直樹', Birthdate::factory('1996-04-30')),
                new MedicalRecord(Str::ulid(), Str::ulid(), CheckupCourse::Basic, '東京都練馬区', new CarbonImmutable('2023-10-13 00:00:00')),
            ),
            new MedicalRecordsItemViewModel(
                new User(Str::ulid(), '山口貴志', Birthdate::factory('1986-08-09')),
                new MedicalRecord(Str::ulid(), Str::ulid(), CheckupCourse::Complete, '東京都新宿区', new CarbonImmutable('2024-01-02 00:00:00')),
            ),
            new MedicalRecordsItemViewModel(
                new User(Str::ulid(), '北野大輔', Birthdate::factory('1978-07-21')),
                new MedicalRecord(Str::ulid(), Str::ulid(), CheckupCourse::Complete, '埼玉県さいたま市', new CarbonImmutable('2024-01-28 00:00:00')),
            ),
            new MedicalRecordsItemViewModel(
                new User(Str::ulid(), '横山麻衣子', Birthdate::factory('1992-01-30')),
                new MedicalRecord(Str::ulid(), Str::ulid(), CheckupCourse::Complete, '神奈川県横須賀市', new CarbonImmutable('2023-08-22 00:00:00')),
            ),
            new MedicalRecordsItemViewModel(
                new User(Str::ulid(), '岡美樹', Birthdate::factory('1984-11-02')),
                new MedicalRecord(Str::ulid(), Str::ulid(), CheckupCourse::Complete, '東京都八王子', new CarbonImmutable('2023-05-12 00:00:00')),
            ),
        ];

        return new ShowMedicalRecordsUsecaseOutput($medicalRecords);
    }
}
