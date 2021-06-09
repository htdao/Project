<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users_info')->truncate();
        for ($i=1; $i <100 ; $i++) {
            DB::table('users')->insert([
                'name' => 'Admin'.$i,
                'email' => 'admin'.$i.'@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            DB::table('users_info')->insert([
                'address' => 'Hanoi',
                'phone' => '0123456789',
                'user_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
