<?php

declare(strict_types=1);

namespace Tests\Feature\Lent;

use App\Models\User;
use Tests\TestCase;

class LentTest extends TestCase
{
    /**
     * @return void
     */
    public function test_ログインして取り立て一覧画面を表示(): void
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_未ログインの場合は取り立て一覧画面を表示できずエラー(): void
    {
        $response = $this->withoutMiddleware()->get('/');

        $response->assertStatus(500);
    }
}
