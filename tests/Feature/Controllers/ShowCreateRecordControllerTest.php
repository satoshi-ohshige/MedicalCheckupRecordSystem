<?php
declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowCreateRecordControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function 受診記録登録画面を表示できる(): void
    {
        $user = UserFactory::factory();

        $response = $this->get("/users/{$user->getUserId()}/create-record");

        $response->assertOk();
    }
}
