<?php
declare(strict_types=1);

namespace App\ViewModels;

use App\Models\CheckupCourse;
use App\Models\FiscalYear;
use App\Models\MedicalRecord;
use App\Models\User;

final readonly class MedicalRecordViewModel
{
    public function __construct(private MedicalRecord $medicalRecord)
    {
    }

    public function showCheckupFiscalYear(): string
    {
        return (string)FiscalYear::factory($this->medicalRecord->getCheckupDate())->year();
    }

    public function showCheckupDate(): string
    {
        return $this->medicalRecord->getCheckupDate()->format('Y-m-d');
    }

    public function showCheckupCourse(): string
    {
        return $this->medicalRecord->getCourse()->label();
    }

    public function showCheckupPlace(): string
    {
        return $this->medicalRecord->getPlace();
    }
}
