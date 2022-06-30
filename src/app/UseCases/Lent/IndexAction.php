<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\User;
use App\Models\Lent;
use Illuminate\Database\Eloquent\Collection;

class IndexAction
{
    private $lent;

    public function __construct(Lent $lent)
    {
        $this->lent = $lent;
    }
    /**
     * @param User $user
     * @return Collection
     */
    public function __invoke(User $user): Collection
    {
        return $this->lent->where('user_id', '=', $user->id)
                    ->limit(config('const.lentListLimit'))
                    ->get(['id', 'name', 'email', 'lend_money', 'created_at', 'interval']);
    }
}
