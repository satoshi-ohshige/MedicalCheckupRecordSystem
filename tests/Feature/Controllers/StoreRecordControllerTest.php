<?php
declare(strict_types=1);

namespace tests\Feature\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreRecordControllerTest extends TestCase
{
    #[Test]
    public function 受診記録登録できる(): void
    {
        $userId = '01HPTBK838V2BZ38ZYP8NYYFVT';

        $response = $this->post("/users/{$userId}/create-record", [
            'checkupDate' => '2024-02-01',
            'course' => 'basic',
            'place' => '東京都新宿区',
        ]);

        $response->assertRedirectToRoute('user-detail', ['userId' => $userId]);
    }
}
