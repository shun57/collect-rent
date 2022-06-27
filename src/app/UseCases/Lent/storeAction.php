<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\User;
use App\Models\Lent;

class storeAction
{
    /**
     * @param User $user
     * @param array $params
     * @return void
     */
    public function __invoke(User $user, array $params): void
    {
        // return Lent::where('user_id', '=', $user->id);
    }
}
