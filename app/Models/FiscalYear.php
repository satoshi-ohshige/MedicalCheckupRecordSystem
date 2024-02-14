<?php
declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonImmutable;

final readonly class FiscalYear
{
    public function __construct(private int $year)
    {
    }

    public static function factory(CarbonImmutable $now): self
    {
        return new self((int)$now->subMonthsNoOverflow(3)->format('Y'));
    }

    public static function now(): self
    {
        return self::factory(new CarbonImmutable());
    }

    public function year(): int
    {
        return $this->year;
    }

    public function endDate(): CarbonImmutable
    {
        $year = $this->year + 1;
        return new CarbonImmutable("{$year}-03-31 00:00:00");
    }
}
