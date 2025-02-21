<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Income;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = [ 
            "My Incomes" => "incomes", 
            "My Expenses" => "expenses",
            "Categories" => "categories"
        ];

        $categories = Category::all();

        return view('categories.index', ['title' => 'Categories', 'links' => $links, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incomes = Income::where('category_id', $id)->with('category')->get()->map(function($incomes) {
                return [
                    'date' => $incomes->date,
                    'category' => ucfirst($incomes->category->name),
                    'amount' => $incomes->amount,
                    'id' => $incomes->id
                ];
        });
        $expenses = Expense::where('category_id', $id)->with('category')->get()->map(function($expenses) {
            return [
                'date' => $expenses->date,
                'category' => ucfirst($expenses->category->name),
                'amount' => $expenses->amount,
                'id' => $expenses->id
            ];
    });
    
        $title = Category::where('id', $id)->get('name')[0]->name;

        $links = [ 
            "My Incomes" => "/incomes", 
            "My Expenses" => "/expenses",
            "Categories" => "/categories"
        ];

        return view('categories.show', ['title' => ucfirst($title), 'links' => $links, 'incomes' => $incomes, 'expenses' => $expenses]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
