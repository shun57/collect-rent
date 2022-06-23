<?php

namespace Tests\Unit\Lent;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lent;
use App\UseCases\Lent\IndexAction;

class IndexActionTest extends TestCase
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
    public function test_ユーザーの貸出リストを取得(): void
    {
        $lents = Lent::factory()->count(10)->create([
            'user_id' => $this->user->id
        ]);

        $lents = $lents->map(function ($lent) {
            $lent = $lent->only(['id', 'name', 'email', 'lend_money', 'created_at', 'interval']);
            $lent['created_at'] = $lent['created_at']->toDateString();
            return $lent;
        });
    
        $action = new IndexAction();
        $user_lents = $action($this->user)->toArray();

        $this->assertEquals($lents->toArray(), $user_lents);
    }

    /**
     * @return void
     */
    public function test_ユーザーの貸出リストを10件のみ取得(): void
    {
        Lent::factory()->count(11)->create([
            'user_id' => $this->user->id
        ]);
    
        $user_lents = new IndexAction();

        $this->assertCount(10, $user_lents($this->user)->toArray());
    }

    /**
     * @return void
     */
    public function test_ユーザーが渡されない場合はエラー(): void
    {
        $this->expectException(\TypeError::class);

        $user = 'test';
    
        $user_lents = new IndexAction();

        $user_lents($user)->toArray();
    }
}
