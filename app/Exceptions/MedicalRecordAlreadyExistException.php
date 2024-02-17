<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Models\FiscalYear;
use Symfony\Component\Uid\Ulid;

class MedicalRecordAlreadyExistException extends AppException
{
    public function __construct(Ulid $userId, FiscalYear $fiscalYear, \Throwable $previous = null)
    {
        parent::__construct("その年度の受診記録は登録済みです: {$userId}, {$fiscalYear->year()}年度", 400, $previous);
    }
}
