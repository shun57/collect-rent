<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\User;
use App\Http\Controllers\Lent\Exceptions\StoreLimitOveredException;

class StoreAction
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
        // 10件以上の場合はエラーを返す
        // TODO：無料プランの場合のみ
        $count = $user->lents()->count();

        if ($count >= 10) {
            throw new StoreLimitOveredException('無料プランの場合10件以上登録はできません。有料プランへの切替を検討ください。');
        }

        $user->lents()->create($params);
    }
}
