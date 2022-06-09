<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        category::create([
            'category_name' => 'Bebidas',
        ]);

        category::create([
            'category_name' => 'desayuno',
        ]);

        category::create([
            'category_name' => 'postre',
        ]);

        category::create([
            'category_name' => 'almuerzo',
        ]);

        category::create([
            'category_name' => 'panaderia',
        ]);
    }
}
