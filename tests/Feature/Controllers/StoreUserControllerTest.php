<?php
declare(strict_types=1);

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreUserControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function ユーザー登録できる(): void
    {
        $response = $this->post('/sign-up', [
            'name' => '田中太郎',
            'birthdate' => '2000-01-01',
        ]);

        $response->assertRedirect();
    }
}
