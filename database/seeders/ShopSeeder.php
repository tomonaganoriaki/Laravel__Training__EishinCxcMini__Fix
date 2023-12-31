<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'ここに企業名',
                'information' => 'ここに企業情報。ここに企業情報。ここに企業情報。ここに企業情報。',
                'filename' => '',
                'is_selling' => true,

            ],
            [
                'owner_id' => 2,
                'name' => 'ここに企業名',
                'information' => 'ここに企業情報。ここに企業情報。ここに企業情報。ここに企業情報。',
                'filename' => '',
                'is_selling' => true,

            ],
        ]);
    }
}
