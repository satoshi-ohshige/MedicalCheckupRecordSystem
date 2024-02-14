<?php
declare(strict_types=1);

namespace App\Usecases;

use App\ViewModels\MedicalRecordsItemViewModel;

final readonly class ShowMedicalRecordsUsecaseOutput
{
    /**
     * @param MedicalRecordsItemViewModel[] $medicalRecords
     */
    public function __construct(public array $medicalRecords)
    {
    }
}
