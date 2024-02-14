<?php
declare(strict_types=1);

namespace App\ViewModels;

use App\Models\MedicalRecord;
use App\Models\User;

final readonly class MedicalRecordsItemViewModel
{
    public function __construct(private User $user, private MedicalRecord $medicalRecord)
    {
    }

    public function showUserName(): string
    {
        return $this->user->getName();
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
