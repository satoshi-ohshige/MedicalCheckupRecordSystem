<?php
declare(strict_types=1);

namespace App\Exceptions;

use Symfony\Component\Uid\Ulid;

class UserNotFoundException extends AppException
{
    public function __construct(Ulid $userId)
    {
        parent::__construct("ユーザーが存在しません: {$userId}", 400);
    }
}
