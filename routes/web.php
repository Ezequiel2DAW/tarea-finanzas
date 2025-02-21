<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;

Route::get('/', function () {
    return view('welcome');
});


//Rutas para los Incomes
Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');

Route::get('/incomes/add', [IncomeController::class,'create']);
Route::post('/incomes/add', [IncomeController::class,'store'])->name('form.income.store');

Route::get('/incomes/edit/{id}', [IncomeController::class, 'edit'])->name('incomes.edit');
Route::post('/incomes/update/{id}', [IncomeController::class, 'update'])->name('incomes.update');

Route::get('/incomes/delete/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');

//Rutas para los expenses
Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');

Route::get('/expenses/add', [ExpensesController::class,'create']);
Route::post('/expenses/add', [ExpensesController::class,'store'])->name('form.expense.store');

Route::get('/expenses/edit/{id}', [ExpensesController::class, 'edit'])->name('expenses.edit');
Route::post('/expenses/update/{id}', [ExpensesController::class, 'update'])->name('expenses.update');

Route::get('/expenses/delete/{id}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');

//Rutas para las categories
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');