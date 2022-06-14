<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UseCases\Lent\IndexAction;
use Inertia\Inertia;

class LentController extends Controller
{
    public function index(Request $request, IndexAction $action)
    {
        $user = $request->user();

        $lents = $action($user);

        return Inertia::render('Lent/Lent', ['lents' => $lents->all()]);
    }
}
