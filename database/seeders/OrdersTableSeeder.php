<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->truncate();
        DB::table('orders')->truncate();
        for($i=0; $i<=20 ; $i++){
            DB::table('orders')->insert([
                'total_price' => 1,
                'customer_name' => 'dao'.$i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            DB::table('order_product')->insert([
                'product_id' => $i,
                'order_id' =>$i,
                'price' => 10000,
                'quality' => 1,
                'total_price' => 10000,
                'order_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
