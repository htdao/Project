<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for ($i=0; $i <20 ; $i++) { 
            // code...
            DB::table('products')->insert([
                'name' => 'Iphone 12'.$i,
                'slug' => 'iphone-12-'.$i,
                'origin_price' => '20000000',
                'sale_price' => '10000000',
                'user_id' => $i,
                'category_id' => "2",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
