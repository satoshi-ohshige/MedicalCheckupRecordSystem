<?php
declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreRecordControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function 受診記録登録できる(): void
    {
        $user = UserFactory::factory();

        $response = $this->post("/users/{$user->getUserId()}/create-record", [
            'checkupDate' => '2024-02-01',
            'course' => 'basic',
            'place' => '東京都新宿区',
        ]);

        $response->assertRedirectToRoute('user-detail', ['userId' => $user->getUserId()]);
    }
}
