<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $user = [
            ['id' => 1,
            'name' => 'omar',
            'email' => 'or455510@gmail.com',
            'password' => '12345678',

        ],
            ['id' => 2,
            'name' => 'omar2',
            'email' => 'or4555100@gmail.com',
            'password' => '1234567',

        ],
            ['id' => 3,
            'name' => 'omar3',
            'email' => 'or45551000@gmail.com',
            'password' => '1234567',

        ],
        ];


        DB::table('users')->insertOrIgnore(
            $user
        );
    }
}
