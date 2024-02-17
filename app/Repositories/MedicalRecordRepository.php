<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\FiscalYear;
use App\Models\MedicalRecord;
use App\Models\User;
use App\ViewModels\MedicalRecordsItemViewModel;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Uid\Ulid;

class MedicalRecordRepository implements MedicalRecordRepositoryInterface
{
    /**
     * @return MedicalRecord[]
     */
    public function findByUserId(Ulid $userId): array
    {
        $medicalRecords = DB::table('medical_record')
            ->select([
                'medical_record_id',
                'user_id',
                'course',
                'place',
                'checkup_date',
            ])
            ->where('user_id', $userId)
            ->orderByDesc('checkup_date')
            ->get();

        return $medicalRecords->map(fn ($medicalRecord) => MedicalRecord::recreateFromDb($medicalRecord))->all();
    }

    /**
     * @return MedicalRecordsItemViewModel[]
     */
    public function findByFiscalYear(FiscalYear $fiscalYear): array
    {
        $medicalRecords = DB::table('medical_record')
            ->join('user', 'medical_record.user_id', '=', 'user.user_id')
            ->select([
                'medical_record.medical_record_id',
                'medical_record.user_id',
                'medical_record.course',
                'medical_record.place',
                'medical_record.checkup_date',
                'user.name',
                'user.birthdate',
            ])
            ->where('medical_record.checkup_fiscal_year', $fiscalYear->year())
            ->orderByDesc('medical_record.checkup_date')
            ->get();

        return $medicalRecords->map(
            fn ($medicalRecord) => new MedicalRecordsItemViewModel(User::recreateFromDb($medicalRecord), MedicalRecord::recreateFromDb($medicalRecord))
        )->all();
    }

    public function insertOrFail(MedicalRecord $medicalRecord): void
    {
        try {
            DB::table('medical_record')->insert([
                [
                    'medical_record_id' => $medicalRecord->getRecordId(),
                    'user_id' => $medicalRecord->getUserId(),
                    'course' => $medicalRecord->getCourse()->value,
                    'place' => $medicalRecord->getPlace(),
                    'checkup_date' => $medicalRecord->getCheckupDate()->format('Y-m-d')
                ]
            ]);
        } catch (UniqueConstraintViolationException) {
            // TODO: 独自例外を用意
            abort(400);
        }
    }
}
