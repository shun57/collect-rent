<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\User;
use App\Models\Lent;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    public function __invoke(User $user): Collection
    {
        return Lent::where('user_id', '=', $user->id)->limit(10)->get();
    }
}
