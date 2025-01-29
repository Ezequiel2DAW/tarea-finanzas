<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutcomeController extends Controller
{
    public function index()
    {
        $tableData = DB::table("outcomes")->select('date', 'message', 'amount')->get();
        return view('outcome.index',['title' => 'My outcomes', 'tableData' => $tableData]);
    }
}
