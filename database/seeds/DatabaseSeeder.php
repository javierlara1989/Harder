<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
//        DB::table('user_types')->insert([
//            'description' => 'Admin',
//        ]);
//
//        DB::table('client_types')->insert([
//            'description' => 'Edificio',
//        ]);
//
//        DB::table('building_types')->insert([
//            'description' => 'Residencial',
//        ]);
//
//        DB::table('regions')->insert([
//            'name' => 'Metropolitana',
//        ]);
//
//        DB::table('provinces')->insert([
//            'name' => 'Santiago',
//        ]);
//
//        DB::table('communes')->insert([
//            'name' => 'Pudahuel',
//        ]);
//
        DB::table('building_status')->insert([
            'description' => 'Unreviewed',
        ]);
    }
}

