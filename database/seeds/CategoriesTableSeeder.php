<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories') -> insert([
            ['name' => 'ホエイ・プロテイン'],
            ['name' => 'カゼイン・プロテイン'],
            ['name' => 'ソイ・プロテイン'],
            ['name' => 'ビーガン・プロテイン'],
            ['name' => 'ブレンド・プロテイン'],
            ['name' => 'BCAA'],
            ['name' => 'HMB'],
            ['name' => 'その他'],
        ]);
    }
}
