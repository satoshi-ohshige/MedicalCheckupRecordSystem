<?php
declare(strict_types=1);

namespace App\Models;

use App\Exceptions\InvalidBirthdateException;
use Carbon\CarbonImmutable;

final readonly class Birthdate
{
    public function __construct(private CarbonImmutable $birthdate)
    {
    }

    /**
     * @param string $birthdateString YYYY-MM-DD形式の生年月日
     */
    public static function factory(string $birthdateString): self
    {
        $birthdateArray = explode('-', $birthdateString);
        if (count($birthdateArray) !== 3 || !checkdate((int)$birthdateArray[1], (int)$birthdateArray[2], (int)$birthdateArray[0])) {
            throw new InvalidBirthdateException($birthdateString);
        }

        return new self(new CarbonImmutable("{$birthdateString} 00:00:00"));
    }

    public function showBirthdate(): string
    {
        return $this->birthdate->format('Y-m-d');
    }

    public function calculateFiscalAge(): int
    {
        return FiscalYear::now()->endDate()->diff($this->birthdate)->y;
    }
}
