<?php
declare(strict_types=1);

namespace tests\Feature\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ShowCreateRecordControllerTest extends TestCase
{
    #[Test]
    public function 受診記録登録画面を表示できる(): void
    {
        $userId = '01HPTBK838V2BZ38ZYP8NYYFVT';

        $response = $this->get("/users/{$userId}/create-record");

        $response->assertOk();
    }
}
