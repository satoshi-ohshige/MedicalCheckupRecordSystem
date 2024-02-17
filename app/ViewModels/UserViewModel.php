<?php
declare(strict_types=1);

namespace App\ViewModels;

use App\Models\CheckupCourse;
use App\Models\User;

final readonly class UserViewModel
{
    public function __construct(private User $user)
    {
    }

    public function showUserId(): string
    {
        return (string)$this->user->getUserId();
    }

    public function showName(): string
    {
        return $this->user->getName();
    }

    public function showBirthdate(): string
    {
        return $this->user->getBirthdate()->showBirthdate();
    }

    public function showFiscalAge(): string
    {
        return (string)$this->user->getBirthdate()->calculateFiscalAge();
    }

    public function showDefaultCheckupCourse(): string
    {
        return CheckupCourse::getDefaultCourse($this->user->getBirthdate()->calculateFiscalAge())->label();
    }
}