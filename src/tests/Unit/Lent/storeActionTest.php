<?php

declare(strict_types=1);

namespace Tests\Unit\Lent;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lent;
use App\UseCases\Lent\storeAction;

class storeActionTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * @return void
     */
    public function test_取り立て情報を1件作成(): void
    {
        $params = [
            'name' => 'テスト太郎',
            'email' => 'test@test.com',
            'lend_money' => 100,
            'interval' => 1
        ];

        $action = new storeAction();
        
        $action($this->user, $params);

        $params['user_id'] = $this->user->id;

        $this->assertDatabaseCount('lents', 1);
        $this->assertDatabaseHas('lents', $params);
    }

    /**
     * @return void
     */
    public function test_10件作成済みの場合に取り立て情報を作成しようとするとエラー(): void
    {
        $this->expectException(\Exception::class);

        Lent::factory()->count(10)->create([
            'user_id' => $this->user->id
        ]);

        $params = [
            'name' => 'テスト太郎',
            'email' => 'test@test.com',
            'lend_money' => 100,
            'interval' => 1
        ];

        $action = new storeAction();
        
        $action($this->user, $params);
    }
}
