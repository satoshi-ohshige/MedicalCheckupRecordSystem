<?php
declare(strict_types=1);

namespace Tests\Feature\Usecases;

use App\Exceptions\MedicalRecordAlreadyExistException;
use App\Exceptions\UserNotFoundException;
use App\Models\CheckupCourse;
use App\Usecases\StoreRecordUsecase;
use Carbon\CarbonImmutable;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreRecordUsecaseTest extends TestCase
{
    use DatabaseTransactions;

    private readonly StoreRecordUsecase $usecase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->usecase = $this->app->make(StoreRecordUsecase::class);
    }

    #[Test]
    public function 受診記録登録できる(): void
    {
        $user = UserFactory::factory();
        $checkupDate = '2023-12-01';
        $course = CheckupCourse::Complete;
        $place = 'どこかの場所';

        $this->usecase->__invoke($user->getUserId(), new CarbonImmutable($checkupDate), $course, $place);

        $this->assertDatabaseHas('medical_record', [
            'user_id' => $user->getUserId(),
            'course' => $course->value,
            'place' => $place,
            'checkup_date' => $checkupDate,
            'checkup_fiscal_year' => 2023,
        ]);
    }

    #[Test]
    public function 同じユーザーが同じ年度で受診記録登録すると例外が発生する(): void
    {
        $user = UserFactory::factory();

        // 2023年度で一度登録する
        $this->usecase->__invoke($user->getUserId(), new CarbonImmutable('2023-04-01'), CheckupCourse::Basic, 'どこかの場所');

        // 同じユーザーが再度2023年度で登録する
        $this->expectException(MedicalRecordAlreadyExistException::class);
        $this->usecase->__invoke($user->getUserId(), new CarbonImmutable('2024-03-31'), CheckupCourse::Basic, 'どこかの場所');
    }

    #[Test]
    public function 存在しないユーザーで受診記録登録すると例外が発生する(): void
    {
        $this->expectException(UserNotFoundException::class);
        $this->usecase->__invoke(Str::ulid(), new CarbonImmutable(), CheckupCourse::Basic, 'どこかの場所');
    }
}
