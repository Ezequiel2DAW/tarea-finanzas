<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Category;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableData = Income::with('category')->get()->map(function($income) {
            return [
                'date' => $income->date,
                'category' => ucfirst($income->category->name),
                'amount' => $income->amount,
                'id' => $income->id
            ];
        });

        $links = [ 
            "My Incomes" => "incomes", 
            "My Expenses" => "expenses",
            "Categories" => "categories"
        ];

        //Aquí la lógica de negocio para el index
        return view('income.index',['title' => 'My incomes', 'tableData' => $tableData, 'links' => $links]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $links = [ 
            "My Incomes" => "/incomes", 
            "My Expenses" => "/expenses",
            "Categories" => "/categories"
        ];

        $categories = Category::all();

        return view('income.add.index',['title' => 'Adding an income', 'links' => $links, 'route' => route('form.income.store'), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0'
        ]);

        Income::create([
            'date'=> $request->date,
            'category_id'=> $request->category_id,
            'amount'=> $request->amount
        ]);

        return redirect('/incomes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return '<p>Esta es la página del show de incomes</p>';
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

        return view('income.update',['title' => 'Updating income', 'links' => $links, 'route' => route('incomes.update', ['id' => $id]), 'categories' => $categories]);
        
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

        Income::whereId($id)->update([
            'date'=> $request->date,
            'category_id'=> $request->category_id,
            'amount'=>$request->amount
        ]);

        return redirect('/incomes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Income::whereId($id)->delete();

        return redirect('/incomes');
    }
}
