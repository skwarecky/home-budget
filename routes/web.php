<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth', 'verified')->group(function () {

	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


	Route::get('/budget/{budget}/show', [BudgetController::class, 'show'])->name('budget.show');
	Route::get('/budget/create', [BudgetController::class, 'create'])->name('budget.create');
	Route::get('/budget/{budget}/edit', [BudgetController::class, 'edit'])->name('budget.edit');

	Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');
	Route::patch('/budget', [BudgetController::class, 'update'])->name('budget.update');
	Route::delete('/budget', [BudgetController::class, 'destroy'])->name('budget.destroy');

	Route::post('/budget/{budget}/import', [BudgetController::class, 'import'])->name('budget.import');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
