<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;


class ExpensesController extends Controller
{
    public function index()
    {
        $tableData = DB::table("expenses")->select('date', 'category', 'amount', 'id')->get();
        $links = [ 
            "My Incomes" => "incomes", 
            "My Expenses" => "expenses"
        ];
        return view('expense.index',['title' => 'My expenses', 'tableData' => $tableData, 'links' => $links]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $links = [ 
            "My Incomes" => "/incomes", 
            "My Expenses" => "/expenses"
        ];

        return view('expense.update',['title' => 'Updating expense', 'links' => $links, 'route' => route('expenses.update', ['id' => $id])]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0'
        ]);

        Expense::whereId($id)->update([
            'date'=> $request->date,
            'category'=> $request->category,
            'amount'=>$request->amount
        ]);

        return redirect('/expenses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense::whereId($id)->delete();

        return redirect('/expenses');
    }
}
