<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\FiscalYear;
use App\Repositories\MedicalRecordRepositoryInterface;

final readonly class ShowMedicalRecordsUsecase
{
    public function __construct(private MedicalRecordRepositoryInterface $medicalRecordRepository)
    {
    }

    public function __invoke(FiscalYear $fiscalYear): ShowMedicalRecordsUsecaseOutput
    {
        $medicalRecords = $this->medicalRecordRepository->findByFiscalYear($fiscalYear);

        return new ShowMedicalRecordsUsecaseOutput($medicalRecords);
    }
}
