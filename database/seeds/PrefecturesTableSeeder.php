<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->truncate();
        DB::table('prefectures')->insert([
            [
                'pref' => '東京都',
                'city' => '新宿区',
            ],
            [
                'pref' => '神奈川県',
                'city' => '横浜巣',
            ],
            [
                'pref' => '千葉県',
                'city' => '千葉市',
            ],
            [
                'pref' => '埼玉県',
                'city' => 'さいたま市',
            ],
            [
                'pref' => '茨城県',
                'city' => '水戸市',
            ],
            [
                'pref' => '群馬県',
                'city' => '前橋市',
            ],
            [
                'pref' => '栃木県',
                'city' => '宇都宮市',
            ]
        ]);
    }
}
