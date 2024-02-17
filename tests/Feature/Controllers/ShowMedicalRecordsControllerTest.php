<?php
declare(strict_types=1);

namespace tests\Feature\Controllers;

use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowMedicalRecordsControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    #[DataProvider('年度の指定と取得できる結果の組み合わせ')]
    public function 特定の年度の受診記録一覧を取得できる(string $fyParameter, int $expectedFy): void
    {
        CarbonImmutable::setTestNow('2100-01-01 10:00:00');

        $response = $this->get('/medical-records' . $fyParameter);

        $response->assertOk()
            ->assertSeeText("{$expectedFy}年度の受診記録一覧");
    }

    public static function 年度の指定と取得できる結果の組み合わせ(): array
    {
        return [
            '指定が無い場合はデフォルトとして今年度の受診記録一覧を取得できる' => ['', 2099],
            '過去の年度を指定した場合はその年度の受診記録一覧を取得できる' => ['?fy=2000', 2000],
            '未来の年度を指定した場合はその年度の代わりに今年度の受診記録一覧を取得できる' => ['?fy=3000', 2099],
            '年度として不正な値を指定した場合は代わりに今年度の受診記録一覧を取得できる' => ['?fy=xxxx', 2099],
        ];
    }
}
