<?php

use App\Http\Controllers\AddExpensesController;
use App\Http\Controllers\AddIncomeController;
use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('incomes', IncomeController::class);
Route::get('/incomes', [IncomeController::class, 'index']);

Route::get('/expenses', [ExpensesController::class, 'index']);

Route::get('/expenses/add', [AddExpensesController::class,'index']);
Route::post('/expenses/add', [AddExpensesController::class,'store'])->name('form.expense.store');

Route::get('/incomes/add', [AddIncomeController::class,'index']);
Route::post('/incomes/add', [AddIncomeController::class,'store'])->name('form.income.store');