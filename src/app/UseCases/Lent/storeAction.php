<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\User;
use App\Models\Lent;

class storeAction
{
    public function __construct()
    {
    }

    /**
     * @param User $user
     * @param array $params
     * @return void
     */
    public function __invoke(User $user, array $params): void
    {
        // TODO：10件以上の場合はエラーを返す

        $user->lents()->create($params);
    }
}
