<?php
declare(strict_types=1);

namespace App\ViewModels;

use App\Models\User;

final readonly class UsersItemViewModel
{
    private UserViewModel $userViewModel;

    public function __construct(private User $user, private int $checkupCount)
    {
        $this->userViewModel = new UserViewModel($this->user);
    }

    public function showUserId(): string
    {
        return $this->userViewModel->showUserId();
    }

    public function showName(): string
    {
        return $this->userViewModel->showName();
    }

    public function showBirthdate(): string
    {
        return $this->userViewModel->showBirthdate();
    }

    public function showFiscalAge(): string
    {
        return $this->userViewModel->showFiscalAge();
    }

    public function showDefaultCheckupCourse(): string
    {
        return $this->userViewModel->showDefaultCheckupCourse();
    }

    public function showCheckupCount(): string
    {
        return (string)$this->checkupCount;
    }
}
