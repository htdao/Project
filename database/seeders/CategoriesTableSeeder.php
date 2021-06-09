<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Trang điểm', 'Son môi', 'Chăm sóc da', 'Chăm sóc cơ thể', 'Chăm sóc tóc', 'Dụng cụ', 'Nước hoa', 'Sản phẩm khác'];
        DB::table('categories')->truncate();
        foreach($categories as $value){
            DB::table('categories')->insert([
                'name' => $value,
                'slug' => Str::slug($value),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
