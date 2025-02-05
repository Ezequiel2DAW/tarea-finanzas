<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddIncomeController extends Controller
{
    public function index()
    {
        $links = [ 
            "My Incomes" => "/incomes", 
            "My Expenses" => "/expenses"
        ];
        return view('income.add.index',['title' => 'Adding an income', 'links' => $links]);
    }

    public function store(Request $request)
    {
        if ((isset($_POST['date'])&&!empty($_POST['date']))&&(isset($_POST['category'])&&!empty($_POST['category']))&&(isset($_POST['amount'])&&!empty($_POST['amount']))) {
            $date = $_POST['date'];
            $category = $_POST['category'];
            $amount = $_POST['amount'];
            DB::table('incomes')->insert([
                'date'=> $date,
                'category'=> $category,
                'amount'=> $amount
            ]);
        } else {
            dump('Conexión fallida');
        }
        return redirect('/incomes');
    }
}
