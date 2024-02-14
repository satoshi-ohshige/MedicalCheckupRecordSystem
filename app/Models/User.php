<?php
declare(strict_types=1);

namespace App\Models;

use Symfony\Component\Uid\Ulid;

readonly class User
{
    public function __construct(
        private Ulid $userId,
        private string $name,
        private Birthdate $birthdate,
    ) {
    }

    public function getUserId(): Ulid
    {
        return $this->userId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthdate(): Birthdate
    {
        return $this->birthdate;
    }
}
