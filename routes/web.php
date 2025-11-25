<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }
    return redirect('/dashboard');
});

Route::get('/lang/{lang}', function($lang) {
    session(['locale' => $lang]);
    app()->setLocale($lang);
    return back();
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function() {

    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::resource('income', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);
});
