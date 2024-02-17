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

    public static function recreateFromDb(\stdClass $raw): self
    {
        return new self(Ulid::fromString($raw->user_id), $raw->name, Birthdate::factory($raw->birthdate));
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
