<?php
declare(strict_types=1);

namespace Tests\Feature\Commands;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowUserDetailCommandTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function ユーザー詳細を取得できる(): void
    {
        $user = UserFactory::factory();

        $this->artisan('app:show-user-detail', ['userId' => $user->getUserId()])
            ->expectsOutput('ユーザーID: ' . $user->getUserId())
            ->assertSuccessful();
    }

    #[Test]
    public function 存在しないユーザーの場合はエラー表示になる(): void
    {
        $this->artisan('app:show-user-detail', ['userId' => Str::ulid()])
            ->expectsOutputToContain('ユーザーが存在しません')
            ->assertFailed();
    }
}
