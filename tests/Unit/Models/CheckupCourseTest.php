<?php
declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Models\CheckupCourse;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CheckupCourseTest extends TestCase
{
    #[Test]
    public function 正しい日本語表記になっている(): void
    {
        $this->assertSame('基本健診', CheckupCourse::Basic->label());
        $this->assertSame('1日人間ドック', CheckupCourse::Complete->label());
    }

    #[Test]
    #[DataProvider('年度年齢とその正しいデフォルト受診コースの組み合わせ')]
    public function デフォルトの受診コースを判定できる(int $fiscalAge, CheckupCourse $expectedDefaultCheckupCourse): void
    {
        $actualDefaultCheckupCourse = CheckupCourse::getDefaultCourse($fiscalAge);

        $this->assertSame($expectedDefaultCheckupCourse, $actualDefaultCheckupCourse);
    }

    public static function 年度年齢とその正しいデフォルト受診コースの組み合わせ(): array
    {
        return [
            '満34歳は基本健診' => [34, CheckupCourse::Basic],
            '満35歳は1日人間ドック' => [35, CheckupCourse::Complete],
        ];
    }
}
