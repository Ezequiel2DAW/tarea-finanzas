<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;


class ExpensesController extends Controller
{
    public function index()
    {
        $tableData = Expense::with('category')->get()->map(function($expense) {
            return [
                'date' => $expense->date,
                'category' => ucfirst($expense->category->name),
                'amount' => $expense->amount,
                'id' => $expense->id
            ];
        });
        $links = [ 
            "My Incomes" => "incomes", 
            "My Expenses" => "expenses",
            "Categories" => "categories"
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
            "My Expenses" => "/expenses",
            "Categories" => "/categories"
        ];

        $categories = Category::all();

        return view('expense.update',['title' => 'Updating expense', 'links' => $links, 'route' => route('expenses.update', ['id' => $id]), 'categories' => $categories]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0'
        ]);

        Expense::whereId($id)->update([
            'date'=> $request->date,
            'category_id'=> $request->category_id,
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

    public function create()
    {
        $links = [ 
            "My Incomes" => "/incomes", 
            "My Expenses" => "/expenses",
            "Categories" => "/categories"
        ];

        $categories = Category::all();

        return view('expense.add.index',['title' => 'Adding an expense', 'links' => $links, 'route' => route('form.expense.store'), 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0'
        ]);

        Expense::create([
            'date'=> $request->date,
            'category_id'=> $request->category_id,
            'amount'=> $request->amount
        ]);

        return redirect('/expenses');
    }
}
