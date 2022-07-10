<?php

declare(strict_types=1);

namespace Tests\Unit\Lent;

use Tests\TestCase;
use App\Models\User;
use App\Models\Lent;
use App\UseCases\Lent\EditAction;

class EditActionTest extends TestCase
{
    private $user;
    private $lent;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->lent = new Lent();
    }

    /**
     * @return void
     */
    public function test_ユーザーの特定の貸出情報を取得(): void
    {
        $lent = $this->lent->factory()->count(1)->create([
            'user_id' => $this->user->id
        ]);

        $lent = $lent->toArray();

        $action = new EditAction($this->lent);
        $user_lent = $action($this->user, $lent[0]['id']);

        $this->assertEquals($lent[0], $user_lent->toArray());
    }

    /**
     * @return void
     */
    public function test_ユーザーが渡されない場合はエラー(): void
    {
        $this->expectException(\TypeError::class);

        $user = 'test';
    
        $action = new EditAction($this->lent);

        $action($user);
    }

    /**
     * @return void
     */
    public function test_貸出情報が存在しない場合は取得しない(): void
    {
        $this->lent->factory()->count(1)->create([
            'user_id' => $this->user->id
        ]);

        $action = new EditAction($this->lent);
        $lent = $action($this->user, 1000);

        $this->assertEmpty($lent);
    }
}
