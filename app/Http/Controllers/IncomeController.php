<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Income;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableData = DB::table("incomes")->select('date', 'category', 'amount', 'id')->get();
        $links = [ 
            "My Incomes" => "incomes", 
            "My Expenses" => "expenses"
        ];

        // $tableData = [
        //     'headers' => [
        //         'date', 'type', "quantity"
        //     ],
        //     'data' => [
        //         ['12/12/2012', "salary", "2500$"],
        //         ['12/1/2013', "salary", "2500$"],
        //         ['12/2/2013', "salary", "2550$"],
        //         ['12/3/2013', "salary", "2555$"]
        //     ]
        //     ];

        //Aquí la lógica de negocio para el index
        return view('income.index',['title' => 'My incomes', 'tableData' => $tableData, 'links' => $links]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return '<p>Esta es la página del create de incomes</p>';
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
            "My Expenses" => "/expenses"
        ];

        return view('income.update',['title' => 'Updating income', 'links' => $links, 'route' => route('incomes.update', ['id' => $id])]);
        
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

        Income::whereId($id)->update([
            'date'=> $request->date,
            'category'=> $request->category,
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
