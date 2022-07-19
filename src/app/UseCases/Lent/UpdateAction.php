<?php

declare(strict_types=1);

namespace App\UseCases\Lent;

use App\Models\Lent;

class UpdateAction
{
    private $lent;

    public function __construct(Lent $lent)
    {
        $this->lent = $lent;
    }

    /**
     * @param array $params
     * @return void
     */
    public function __invoke(array $params): void
    {
        $lent = $this->lent->findOrFail($params['id']);

        $lent->name = $params['name'];
        $lent->email = $params['email'];
        $lent->lend_money = $params['lend_money'];
        $lent->interval = $params['interval'];

        $lent->save();
    }
}
