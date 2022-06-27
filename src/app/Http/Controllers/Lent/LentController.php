<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lent;

use Illuminate\Http\Request;
use App\Http\Requests\Lent\StoreRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Lent\IndexAction;
use App\UseCases\Lent\storeAction;
use Inertia\Inertia;
use Throwable;
use Psr\Log\LoggerInterface;
use App\Enums\LentFrequencyType;

class LentController extends Controller
{
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * @param Request $request
     * @param IndexAction $action
     * @return Inertia
     */
    public function index(Request $request, IndexAction $action)
    {
        $user = $request->user();

        try {
            $lents = $action($user);
        } catch (Throwable $e) {
            $this->logger->error($e->getMessage());
            abort(500);
        }

        return Inertia::render('Lent/Lent', ['lents' => $lents->toArray()]);
    }

    public function create()
    {
        return Inertia::render('Lent/CreateLent', ['types' => LentFrequencyType::getValues()]);
    }

    /**
     * @param StoreRequest $request
     * @param storeAction $action
     * @return void
     */
    public function store(StoreRequest $request, storeAction $action)
    {
        dd($request);
    }
}
