<?php
declare(strict_types=1);

namespace tests\Feature\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowUserDetailControllerTest extends TestCase
{
    #[Test]
    public function ユーザー詳細を取得できる(): void
    {
        $response = $this->get('/users/01HPKZCTPJYJNMRGC6PT49CPP7');

        $response->assertOk();
    }

    #[Test]
    public function 存在しないユーザーの場合は404になる(): void
    {
        $response = $this->get('/users/not-exist');

        $response->assertNotFound();
    }
}
