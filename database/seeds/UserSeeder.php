<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 50; $i++) {
            DB::table('users')->insert([
                'name' => "user$i",
                'email' => "user$i@email.com" ,
                'status' => rand(0, 1)
            ]);
        }

    }
}
