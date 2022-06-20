<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [

                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('oklm'),
                'isprofilcompleted' => false,
            ],
            [

                'name' => 'oklm',
                'email' => 'oklm@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('test'),
                'isprofilcompleted' => false,
            ],

        ]);
    }
}
