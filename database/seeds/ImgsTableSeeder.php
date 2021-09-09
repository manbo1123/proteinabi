<?php

use Illuminate\Database\Seeder;
class ImgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imgs') -> insert([
            [
                'product_id' => 1,
                'file_name' => 'クリア ホエイ アイソレート_ビターレモン_マイプロテイン.jpg',
            ],
            [
                'product_id' => 2,
                'file_name' => 'ソイ プロテイン アイソレート_チョコレートスムーズ味_マイプロテイン.jpg',
            ],
            [
                'product_id' => 3,
                'file_name' => 'BCAA 2-1-1 パウダー_ノンフレーバー_マイプロテイン.jpg',
            ],
            [
                'product_id' => 4,
                'file_name' => 'ビーガン プロテイン クッキー_ダークチョコレートチップ_マイプロテイン.jpg',
            ],
        ]);
    }
}
