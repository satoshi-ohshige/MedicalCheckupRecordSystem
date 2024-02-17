<?php
declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Exceptions\InvalidBirthdateException;
use App\Models\Birthdate;
use Carbon\CarbonImmutable;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class BirthdateTest extends TestCase
{
    #[Test]
    #[DataProvider('正しい形式の生年月日')]
    public function 正しい形式の生年月日を渡すとインスタンスを生成できる(string $birthdateString): void
    {
        $birthdate = Birthdate::factory($birthdateString);

        $this->assertSame($birthdateString, $birthdate->showBirthdate());
    }

    public static function 正しい形式の生年月日(): array
    {
        return [
            '1月1日' => ['2024-01-01'],
            '12月31日' => ['2024-12-31'],
            '閏年' => ['2024-02-29'],
            '遠い未来' => ['9999-01-01'],
        ];
    }

    #[Test]
    #[DataProvider('不正な形式の生年月日')]
    public function 不正な形式の生年月日を渡すと例外が発生する(string $birthdateString): void
    {
        $this->expectException(InvalidBirthdateException::class);
        Birthdate::factory($birthdateString);
    }

    public static function 不正な形式の生年月日(): array
    {
        return [
            'スラッシュ区切り' => ['2024/01/01'],
            '区切りなし' => ['20240101'],
            '誤った閏年' => ['2025-02-29'],
            '存在しない日付' => ['0000-00-00'],
        ];
    }

    #[Test]
    #[DataProvider('生年月日と現在日時とその正しい年度年齢の組み合わせ')]
    public function 年度年齢を正しく計算できる(string $birthdateString, string $targetDate, int $expectedFiscalAge): void
    {
        CarbonImmutable::setTestNow("{$targetDate} 00:00:00");

        $birthdate = Birthdate::factory($birthdateString);

        $this->assertSame($expectedFiscalAge, $birthdate->calculateFiscalAge());
    }

    public static function 生年月日と現在日時とその正しい年度年齢の組み合わせ(): array
    {
        return [
            '生年月日: 2000年10月1日 現在: 2024年12月31日 -> 同年度の誕生日を過ぎているので数え年と同じ24歳' => ['2000-10-01', '2024-12-31', 24],
            '生年月日: 2000年10月1日 現在: 2025年3月31日 -> 同年度の誕生日を過ぎているので数え年と同じ24歳' => ['2000-10-01', '2025-03-31', 24],
            '生年月日: 2000年10月1日 現在: 2025年4月1日 -> 同年度の誕生日は過ぎていないが年度末時点での換算なので25歳' => ['2000-10-01', '2025-04-01', 25],
            '生年月日: 2001年3月1日 現在: 2024年12月31日 -> 同年度の誕生日は過ぎていないが年度末時点での換算なので24歳' => ['2001-03-01', '2024-12-31', 24],
            '生年月日: 2001年3月1日 現在: 2025年3月31日 -> 同年度の誕生日を過ぎているので数え年と同じ24歳' => ['2001-03-01', '2025-03-31', 24],
            '生年月日: 2001年3月1日 現在: 2025年4月1日 -> 同年度の誕生日は過ぎていないが年度末時点での換算なので25歳' => ['2001-03-01', '2025-04-01', 25],
        ];
    }
}
