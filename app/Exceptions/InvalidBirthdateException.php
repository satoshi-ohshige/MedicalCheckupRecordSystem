<?php
declare(strict_types=1);

namespace App\Exceptions;

class InvalidBirthdateException extends AppException
{
    public function __construct(string $invalidBirthdate)
    {
        parent::__construct("誕生日の形式が不正です: {$invalidBirthdate}", 400);
    }
}
