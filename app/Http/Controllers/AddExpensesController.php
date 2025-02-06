<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class AddExpensesController extends Controller
{
    public function index()
    {
        $links = [ 
            "My Incomes" => "/incomes", 
            "My Expenses" => "/expenses"
        ];
        return view('expense.add.index',['title' => 'Adding an expense', 'links' => $links]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0'
        ]);

        Expense::create([
            'date'=> $request->date,
            'category'=> $request->category,
            'amount'=> $request->amount
        ]);

        return redirect('/expenses');
    }
}
