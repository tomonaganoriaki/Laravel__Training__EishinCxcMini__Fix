<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'name' => '完全週休3日制'
            ],
            [
                'name' => 'フルフレックス制'
            ],
            [
                'name' => '有給消化率70%以上'
            ],
            [
                'name' => 'フルリモートOK'
            ],
            [
                'name' => '家賃補助有り'
            ],
            [
                'name' => 'インセンティブ制度'
            ],
            [
                'name' => '車通勤可'
            ]

        ]);
    }
}
