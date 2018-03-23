<?php

use Illuminate\Database\Seeder;
use App\Models\ShipData;

class ShipDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ship = [
            [
                'ship_code' => 'GDR',
                'ship_code_drs' => 'Genting Dream',
                'en' => 'Genting Dream',
                'zh_Hans' => '云顶梦号',
                'zh_Hant' => '雲頂夢號'
            ],
            [
                'ship_code' => 'WDR',
                'ship_code_drs' => 'World Dream',
                'en' => 'World Dream',
                'zh_Hans' => '世界梦号',
                'zh_Hant' => '世界夢號'
            ],
            [
                'ship_code' => 'SPC',
                'ship_code_drs' => 'SPC ex Hong Kong',
                'en' => 'Star Pisces',
                'zh_Hans' => '双鱼星号',
                'zh_Hant' => '雙魚星號'
            ],
            [
                'ship_code' => 'SSQ',
                'ship_code_drs' => 'SSQ ex Taiwan',
                'en' => 'SuperStar Aquarius',
                'zh_Hans' => '宝瓶星号',
                'zh_Hant' => '寶瓶星號'
            ],
            [
                'ship_code' => 'SXG',
                'ship_code_drs' => 'SSG ex Singapore',
                'en' => 'SuperStar Gemini',
                'zh_Hans' => '双子星号',
                'zh_Hant' => '雙子星號'
            ],
            [
                'ship_code' => 'SSR',
                'ship_code_drs' => 'SSR ex Penang',
                'en' => 'SuperStar Libra',
                'zh_Hans' => '天秤星号',
                'zh_Hant' => '天秤星號'
            ],
            [
                'ship_code' => 'SSV',
                'ship_code_drs' => 'SSV ex Nansha',
                'en' => 'SuperStar Virgo',
                'zh_Hans' => '处女星号',
                'zh_Hant' => '處女星號'
            ]
        ];

        foreach($ship as $s) {
            ShipData::create($s);
        }
    }
}
