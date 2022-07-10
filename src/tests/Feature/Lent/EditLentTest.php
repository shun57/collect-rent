<?php

declare(strict_types=1);

namespace Tests\Feature\Lent;

use App\Models\User;
use App\Models\Lent;
use Tests\TestCase;

class EditLentTest extends TestCase
{
    /**
     * @return void
     */
    public function test_ログインして取り立て情報詳細画面を表示(): void
    {
        $user = User::factory()->create();
        $lent = Lent::factory()->count(1)->create([
                    'user_id' => $user->id
                ]);
        $lent = $lent->toArray();
        
        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/edit/' . $lent[0]['id']);

        $response->assertStatus(200);
    }
}
