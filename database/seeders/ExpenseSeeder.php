<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $data = [];
        for($i=0;$i<=10; $i++){
            $data[]=[
                'amount' => rand(50,5000),
                'created_at' => $now,
                'updated_at' => $now,
                'category_id' => rand(1,3),
                'date' => $now
            ];
        }
        DB::table('expenses')->insert(
            $data);
    }
}
