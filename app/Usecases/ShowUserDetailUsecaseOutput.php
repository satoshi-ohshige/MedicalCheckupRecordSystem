<?php
declare(strict_types=1);

namespace App\Usecases;

use App\Models\MedicalRecord;
use App\Models\User;

final readonly class ShowUserDetailUsecaseOutput
{
    /**
     * @param MedicalRecord[] $medicalRecords
     */
    public function __construct(public User $user, public array $medicalRecords)
    {
    }
}
