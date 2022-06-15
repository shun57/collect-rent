<?php

declare(strict_types=1);

namespace Tests\Feature\Lent;

use App\Models\User;
use Tests\TestCase;

class LentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ログインして取り立て一覧画面を表示()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}
