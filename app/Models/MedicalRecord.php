<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonImmutable;
use Symfony\Component\Uid\Ulid;

readonly class MedicalRecord
{
    public function __construct(
        private Ulid $recordId,
        private Ulid $userId,
        private CheckupCourse $course,
        private string $place,
        private CarbonImmutable $checkupDate,
    ) {
    }

    public function getRecordId(): Ulid
    {
        return $this->recordId;
    }

    public function getUserId(): Ulid
    {
        return $this->userId;
    }

    public function getCourse(): CheckupCourse
    {
        return $this->course;
    }

    public function getPlace(): string
    {
        return $this->place;
    }

    public function getCheckupDate(): CarbonImmutable
    {
        return $this->checkupDate;
    }
}
