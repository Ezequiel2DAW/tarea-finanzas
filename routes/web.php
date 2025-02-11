<?php

use App\Http\Controllers\AddExpensesController;
use App\Http\Controllers\AddIncomeController;
use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;

Route::get('/', function () {
    return view('welcome');
});


//Rutas para los Incomes
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');

Route::get('/incomes/add', [AddIncomeController::class,'index']);
Route::post('/incomes/add', [AddIncomeController::class,'store'])->name('form.income.store');

Route::get('/incomes/edit/{id}', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::post('/incomes/update/{id}', [IncomeController::class, 'update'])->name('incomes.update');

Route::get('/incomes/delete/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');

//Rutas para los expenses
Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');

Route::get('/expenses/add', [AddExpensesController::class,'index']);
Route::post('/expenses/add', [AddExpensesController::class,'store'])->name('form.expense.store');

Route::get('/expenses/edit/{id}', [ExpensesController::class, 'edit'])->name('expenses.edit');
Route::post('/expenses/update/{id}', [ExpensesController::class, 'update'])->name('expenses.update');

Route::get('/expenses/delete/{id}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');