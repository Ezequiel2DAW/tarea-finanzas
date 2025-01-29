<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $data = [];
        for($i=0;$i<=50; $i++){
            $data[]=[
                'amount' => rand(50,5000),
                'created_at' => $now,
                'updated_at' => $now,
                'message' => 'taxes',
                'date' => $now
            ];
        }
        DB::table('outcomes')->insert(
            $data);
    }
}
