<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name'=>'Atlyginimas','type'=>'income'],
            ['name'=>'Kita','type'=>'income'],
            ['name'=>'Maistas','type'=>'expense'],
            ['name'=>'Kuras','type'=>'expense'],
            ['name'=>'Komunaliniai','type'=>'expense'],
        ]);
    }
}