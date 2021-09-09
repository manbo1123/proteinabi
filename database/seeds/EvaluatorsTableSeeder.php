<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class EvaluatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluators') -> insert([
            [
                'first_name' => '一',
                'family_name' => '評価者',
                'first_name_kana' => 'はじめ',
                'family_name_kana' => 'ひょうかしゃ',
                'email' => 'evaluator1@gmail.com',
                'belong' => '東京',
                'number' => 12345,
                'address' => '東京都千代田区神田須田町1丁目17 神田須田町117ビルディング',
                'url' => 'https://giraffe-co.jp/',
                'password' => Hash::make('evaluator1'),
            ],
            [
                'first_name' => '二',
                'family_name' => '評価者',
                'first_name_kana' => 'ふた',
                'family_name_kana' => 'ひょうかしゃ',
                'email' => 'evaluator2@gmail.com',
                'belong' => '東京',
                'number' => 29753,
                'address' => '東京都千代田区神田小川町３丁目２８−５',
                'url' => 'https://giraffe-co.jp/service/',
                'password' => Hash::make('evaluator2'),
            ],
        ]);
    }
}
