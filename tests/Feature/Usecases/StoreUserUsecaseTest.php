<?php
declare(strict_types=1);

namespace Tests\Feature\Usecases;

use App\Models\Birthdate;
use App\Usecases\StoreUserUsecase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreUserUsecaseTest extends TestCase
{
    use DatabaseTransactions;

    private readonly StoreUserUsecase $usecase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->usecase = $this->app->make(StoreUserUsecase::class);
    }

    #[Test]
    public function ユーザー登録できる(): void
    {
        $name = '田中太郎';
        $birthdate = '2000-12-31';

        $output = $this->usecase->__invoke($name, Birthdate::factory($birthdate));

        $actualUser = $output->user;
        $this->assertSame($name, $actualUser->getName());
        $this->assertSame($birthdate, $actualUser->getBirthdate()->showBirthdate());

        $this->assertDatabaseHas('user', ['user_id' => $actualUser->getUserId(), 'name' => $name, 'birthdate' => $birthdate]);
    }
}
