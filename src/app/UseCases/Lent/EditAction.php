<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\User;
use App\Models\Lent;

class EditAction
{
    private $lent;

    public function __construct(Lent $lent)
    {
        $this->lent = $lent;
    }
    /**
     * @param User $user
     * @param int $id
     * @return Lent
     */
    public function __invoke(User $user, int $id): ?Lent
    {
        return $this->lent->where('user_id', '=', $user->id)
                    ->where('id', '=', $id)
                    ->first();
    }
}
