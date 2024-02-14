<?php
declare(strict_types=1);

namespace App\Models;

enum CheckupCourse: string
{
    case Basic = 'basic';
    case Complete = 'complete';

    private const int DEFAULT_COURSE_AGE_THRESHOLD = 35;

    public function label(): string
    {
        return match ($this) {
            self::Basic => '基本健診',
            self::Complete => '1日人間ドック',
        };
    }

    public static function getDefaultCourse(int $fiscalAge): self
    {
        return self::DEFAULT_COURSE_AGE_THRESHOLD <= $fiscalAge ? self::Complete : self::Basic;
    }
}
