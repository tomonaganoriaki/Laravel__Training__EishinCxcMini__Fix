<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = [];
        for ($i = 1; $i <= 30; $i++) {
            $inserts[] = [
                'name' => '求人名' . $i,
                'information' => '求人説明' . $i,
                'price' => mt_rand(250000, 400000),
                'secondary_category_id' => mt_rand(1, 7),
                'is_selling' => 1,
                'company_id' => $i % 2 === 0 ? 1 : 0,
            ];
        }
        DB::table('products')->insert($inserts);
    }
}
