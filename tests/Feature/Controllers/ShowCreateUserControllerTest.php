<?php
declare(strict_types=1);

namespace tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowCreateUserControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function ユーザー登録画面を表示できる(): void
    {
        $response = $this->get('/sign-up');

        $response->assertOk();
    }
}
