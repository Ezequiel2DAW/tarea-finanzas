<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if ((isset($_POST['date'])&&!empty($_POST['date']))&&(isset($_POST['category'])&&!empty($_POST['category']))&&(isset($_POST['amount'])&&!empty($_POST['amount']))) {
            $date = $_POST['date'];
            $category = $_POST['category'];
            $amount = $_POST['amount'];
            DB::table('expenses')->insert([
                'date'=> $date,
                'message'=> $category,
                'amount'=> $amount
            ]);
        } else {
            dump('Conexión fallida');
        }
        return redirect('/expenses');
    }
}
