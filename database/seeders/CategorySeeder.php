<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\PrimaryCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'IT・通信',
                'sort_order' => 1,
            ],
            [
                'name' => '金融・保険',
                'sort_order' => 2,
            ],
            [
                'name' => '医療・健康',
                'sort_order' => 3,
            ],
            [
                'name' => 'エンターテイメント',
                'sort_order' => 4,
            ],
            [
                'name' => '教育・研究',
                'sort_order' => 5,
            ],
        ]);
        DB::table('secondary_categories')->insert([

            [
                'name' => 'ソフトウェア開発',
                'sort_order' => 1,
                'primary_category_id' => 1,

            ],
            [
                'name' => 'ネットワーク管理',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'データ分析',
                'sort_order' => 3,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'データ分析',
                'sort_order' => 4,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'データ分析',
                'sort_order' => 5,
                'primary_category_id' => 1,
            ],
            [
                'name' => '保険販売',
                'sort_order' => 1,
                'primary_category_id' => 2,
            ],
            [
                'name' => '資産管理',
                'sort_order' => 2,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'リスク評価',
                'sort_order' => 3,
                'primary_category_id' => 2,
            ],
            [
                'name' => '医療設備',
                'sort_order' => 1,
                'primary_category_id' => 3,
            ],
            [
                'name' => '健康教育',
                'sort_order' => 2,
                'primary_category_id' => 3,
            ],
            [
                'name' => '医薬品開発',
                'sort_order' => 3,
                'primary_category_id' => 3,
            ],
            [
                'name' => '映画制作',
                'sort_order' => 1,
                'primary_category_id' => 4,
            ],
            [
                'name' => '音楽プロデュース',
                'sort_order' => 2,
                'primary_category_id' => 4,
            ],
            [
                'name' => 'ゲーム開発',
                'sort_order' => 3,
                'primary_category_id' => 4,
            ],
            [
                'name' => '高等教育',
                'sort_order' => 1,
                'primary_category_id' => 5,
            ],
            [
                'name' => '科学研究',
                'sort_order' => 2,
                'primary_category_id' => 5,
            ],
            [
                'name' => '教育政策',
                'sort_order' => 3,
                'primary_category_id' => 5,
            ],


        ]);
    }
}
