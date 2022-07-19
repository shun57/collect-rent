<?php

declare(strict_types=1);

namespace Tests\Unit\Lent;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lent;
use App\UseCases\Lent\UpdateAction;

class UpdateActionTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->lent = new Lent();
    }

    /**
     * @return void
     */
    public function test_取り立て情報を1件更新(): void
    {
        $lent = $this->lent->factory()->count(1)->create([
            'user_id' => $this->user->id
        ]);

        $lent = $lent->toArray();

        $params = [
            'id' => $lent[0]['id'],
            'name' => 'テスト太郎2',
            'email' => 'test@test2.com',
            'lend_money' => 1000,
            'interval' => 3
        ];

        $action = new UpdateAction($this->lent);
        
        $action($params);

        $params['user_id'] = $this->user->id;

        $this->assertNotSame($lent[0], $params);
        $this->assertDatabaseCount('lents', 1);
        $this->assertDatabaseHas('lents', $params);
    }
}
