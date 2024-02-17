<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\FiscalYear;
use App\Models\MedicalRecord;
use App\ViewModels\MedicalRecordsItemViewModel;
use Symfony\Component\Uid\Ulid;

interface MedicalRecordRepositoryInterface
{
    /**
     * @return MedicalRecord[]
     */
    public function findByUserId(Ulid $userId): array;

    /**
     * @return MedicalRecordsItemViewModel[]
     */
    public function findByFiscalYear(FiscalYear $fiscalYear): array;

    public function insertOrFail(MedicalRecord $medicalRecord): void;
}
