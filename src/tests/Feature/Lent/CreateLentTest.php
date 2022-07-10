<?php

declare(strict_types=1);

namespace Tests\Feature\Lent;

use App\Models\User;
use Tests\TestCase;

class CreateLentTest extends TestCase
{
    /**
     * @return void
     */
    public function test_ログインして取り立て情報作成画面を表示(): void
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/create');

        $response->assertStatus(200);
    }
}
