<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    public function index()
    {
        $tableData = DB::table("expenses")->select('date', 'message', 'amount')->get();
        $links = [ 
            "My Incomes" => "incomes", 
            "My Expenses" => "expenses"
        ];
        return view('expense.index',['title' => 'My expenses', 'tableData' => $tableData, 'links' => $links]);
    }
}
