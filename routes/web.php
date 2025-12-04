<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebtController;

// Code entry routes (NEW)
Route::get('/enter-code', function() {
    return view('enter-code');
})->name('enter.code');

Route::post('/verify-code', function(Illuminate\Http\Request $request) {
    $code = $request->input('code');
    
    // Validate code format (6 digits)
    if (preg_match('/^\d{6}$/', $code)) {
        session(['user_code' => $code]);
        return redirect()->route('home');
    }
    
    return back()->with('error', 'الرمز يجب أن يكون 6 أرقام');
})->name('verify.code');

Route::get('/logout', function() {
    session()->forget('user_code');
    session()->forget('active_tab');
    return redirect()->route('enter.code');
})->name('logout');

Route::get('/', [DebtController::class, 'index'])->name('home');

// Debt routes
Route::post('/debt', [DebtController::class, 'storeDebt'])->name('debt.store');
Route::put('/debt/{id}', [DebtController::class, 'updateDebt'])->name('debt.update');
Route::delete('/debt/{id}', [DebtController::class, 'deleteDebt'])->name('debt.delete');

// Expense routes
Route::post('/expense', [DebtController::class, 'storeExpense'])->name('expense.store');
Route::put('/expense/{id}', [DebtController::class, 'updateExpense'])->name('expense.update');
Route::delete('/expense/{id}', [DebtController::class, 'deleteExpense'])->name('expense.delete');

// Safekeeping routes
Route::post('/safekeeping', [DebtController::class, 'storeSafekeeping'])->name('safekeeping.store');
Route::put('/safekeeping/{id}', [DebtController::class, 'updateSafekeeping'])->name('safekeeping.update');
Route::delete('/safekeeping/{id}', [DebtController::class, 'deleteSafekeeping'])->name('safekeeping.delete');