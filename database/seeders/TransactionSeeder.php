<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $user = \App\Models\User::first() ?? \App\Models\User::factory()->create();

        Transaction::create([
            'user_id'=>$user->id,
            'category_id'=>1,
            'amount'=>1200,
            'date'=>now()->subDays(5),
            'note'=>'Pagrindinis atlyginimas'
        ]);

        Transaction::create([
            'user_id'=>$user->id,
            'category_id'=>3,
            'amount'=>-35.60,
            'date'=>now()->subDays(3),
            'note'=>'Maistas'
        ]);
    }
}
