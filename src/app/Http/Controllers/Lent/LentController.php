<?php

declare(strict_types=1);

namespace App\Http\Controllers\Lent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Throwable;
use Psr\Log\LoggerInterface;
use App\Enums\LentFrequencyType;
use App\Http\Controllers\Lent\Exceptions\StoreLimitOveredException;
use App\Http\Requests\Lent\StoreRequest;
use App\UseCases\Lent\IndexAction;
use App\UseCases\Lent\StoreAction;
use App\UseCases\Lent\EditAction;
use App\Http\Resources\Lent\LentResource;

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
     * @param StoreAction $action
     * @return void
     */
    public function store(StoreRequest $request, StoreAction $action)
    {
        $user = $request->user();
        $params = $request->input();

        try {
            $action($user, $params);
        } catch (StoreLimitOveredException $e) {
            $this->logger->error($e);
            return redirect()->route('lent')->with('fail', $e->getMessage());
        }

        return redirect()->route('lent')->with('success', '取り立て情報を登録しました！');
    }

    /**
     * @param Request $request
     * @param EditAction $action
     * @return Inertia
     */
    public function edit(Request $request, EditAction $action)
    {
        $user = $request->user();
        $id = (int)$request->id;

        try {
            $lent = $action($user, $id);
        } catch (Throwable $e) {
            $this->logger->error($e->getMessage());
            abort(500);
        }

        if (empty($lent)) {
            abort(404);
        }

        return Inertia::render('Lent/EditLent', [
            'lent' => new LentResource($lent),
            'types' => LentFrequencyType::getValues()
        ]);
    }
}
