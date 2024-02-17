<?php
declare(strict_types=1);

namespace tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowUsersControllerTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function ユーザー一覧を取得できる(): void
    {
        $response = $this->get('/users');

        $response->assertOk();
    }
}
