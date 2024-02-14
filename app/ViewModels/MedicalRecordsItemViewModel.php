<?php
declare(strict_types=1);

namespace App\ViewModels;

use App\Models\MedicalRecord;
use App\Models\User;

final readonly class MedicalRecordsItemViewModel
{
    private MedicalRecordViewModel $medicalRecordViewModel;

    public function __construct(private User $user, private MedicalRecord $medicalRecord)
    {
        $this->medicalRecordViewModel = new MedicalRecordViewModel($this->medicalRecord);
    }

    public function showUserName(): string
    {
        return $this->user->getName();
    }

    public function showCheckupDate(): string
    {
        return $this->medicalRecordViewModel->showCheckupDate();
    }

    public function showCheckupCourse(): string
    {
        return $this->medicalRecordViewModel->showCheckupCourse();
    }

    public function showCheckupPlace(): string
    {
        return $this->medicalRecordViewModel->showCheckupPlace();
    }
}
