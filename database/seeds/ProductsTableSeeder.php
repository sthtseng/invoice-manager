<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Chair',
            'price' => 10.00,
            'tax' => 1.20,
        ]);
        DB::table('products')->insert([
            'name' => 'Table',
            'price' => 50.00,
            'tax' => 6.00,
        ]);
    }
}
