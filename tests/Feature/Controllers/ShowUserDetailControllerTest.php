<?php
declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowUserDetailControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function ユーザー詳細を取得できる(): void
    {
        $user = UserFactory::factory();

        $response = $this->get("/users/{$user->getUserId()}");

        $response->assertOk();
    }

    #[Test]
    public function 存在しないユーザーの場合は404になる(): void
    {
        $response = $this->get('/users/not-exist');

        $response->assertNotFound();
    }
}
