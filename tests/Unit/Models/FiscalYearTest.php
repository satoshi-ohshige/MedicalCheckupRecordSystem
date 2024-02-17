<?php
declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Models\FiscalYear;
use Carbon\CarbonImmutable;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FiscalYearTest extends TestCase
{
    #[Test]
    #[DataProvider('現在日時とその正しい年度の組み合わせ')]
    public function 年度を正しく計算できる(string $targetDateString, int $expectedFiscalYear): void
    {
        $fiscalYear = FiscalYear::factory(new CarbonImmutable($targetDateString));

        $this->assertSame($expectedFiscalYear, $fiscalYear->year());
    }

    public static function 現在日時とその正しい年度の組み合わせ(): array
    {
        return [
            '1月1日は前年が年度になる' => ['2024-01-01 00:00:00', 2023],
            '3月31日は前年が年度になる' => ['2024-03-31 00:00:00', 2023],
            '4月1日は今年が年度になる' => ['2024-04-01 00:00:00', 2024],
            '12月31日は今年が年度になる' => ['2024-12-31 00:00:00', 2024],
        ];
    }

    #[Test]
    #[DataProvider('現在日時とその正しい年度末の組み合わせ')]
    public function 年度末を正しく計算できる(string $targetDateString, string $expectedFiscalYearEndDate): void
    {
        $fiscalYear = FiscalYear::factory(new CarbonImmutable($targetDateString));

        $this->assertSame($expectedFiscalYearEndDate, $fiscalYear->endDate()->format('Y-m-d H:i:s'));
    }

    public static function 現在日時とその正しい年度末の組み合わせ(): array
    {
        return [
            '1月1日は今年の3月31日が年度末になる' => ['2024-01-01 00:00:00', '2024-03-31 00:00:00'],
            '3月31日はその日が年度末になる' => ['2024-03-31 00:00:00', '2024-03-31 00:00:00'],
            '4月1日は翌年の3月31日が年度末になる' => ['2024-04-01 00:00:00', '2025-03-31 00:00:00'],
            '12月31日は翌年の3月31日が年度末になる' => ['2024-12-31 00:00:00', '2025-03-31 00:00:00'],
        ];
    }
}
