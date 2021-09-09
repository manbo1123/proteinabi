<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands') -> insert([
            ['name' => 'アサヒ'],
            ['name' => '味の素'],
            ['name' => 'アムウェイ'],
            ['name' => 'アルプロン'],
            ['name' => '大塚製薬'],
            ['name' => 'オリヒロ'],
            ['name' => '健康体力研究所'],
            ['name' => 'コカ・コーラ'],
            ['name' => 'ゴールドジム'],
            ['name' => 'オプティマムニュートリション'],
            ['name' => 'サイベーション'],
            ['name' => 'DHC'],
            ['name' => 'BEST NUTRITION LAB'],
            ['name' => 'グリコ'],
            ['name' => 'ゴールドスタンダード'],
            ['name' => 'HALEO'],
            ['name' => 'ヒルズ'],
            ['name' => 'ビーレジェンド'],
            ['name' => 'Fine-Lab.'],
            ['name' => 'フィットネスショップ'],
            ['name' => 'DNS'],
            ['name' => 'マイプロテイン'],
            ['name' => '明治'],
            ['name' => '森永製菓'],
            ['name' => 'UHA味覚糖'],
            ['name' => 'ロイヤルカナン'],
            ['name' => 'その他'],
        ]);
    }
}
