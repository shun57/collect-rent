<?php

use App\Http\Controllers\Lent\LentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [LentController::class, 'index'])->name('lent');
    Route::get('/create', [LentController::class, 'create'])->name('lent.create');
    Route::post('/store', [LentController::class, 'store'])->name('lent.store');
    Route::get('/edit/{id}', [LentController::class, 'edit'])->name('lent.edit');
    Route::post('/update', [LentController::class, 'update'])->name('lent.update');
});

require __DIR__.'/auth.php';
