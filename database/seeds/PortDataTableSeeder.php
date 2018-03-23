<?php

use Illuminate\Database\Seeder;
use App\Models\PortData;

class PortDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $port = [
            [
                'country' => "Mainland China",
                'en' => "Port of Haikou, China",
                'location_code' => "CNHAK",
                'zh_Hans' => "海口秀英港, 中国",
                'zh_Hant' => "海口秀英港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Nansha, China",
                'location_code' => "CNNSA",
                'zh_Hans' => "南沙港客运码头, 中国",
                'zh_Hant' => "南沙港客運碼頭, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Shanghai, China",
                'location_code' => "CNSHA",
                'zh_Hans' => "上海港, 中国",
                'zh_Hant' => "上海港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Shekou, China",
                'location_code' => "CNSHK",
                'zh_Hans' => "蛇口港, 中國",
                'zh_Hant' => "蛇口港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Sanya, China",
                'location_code' => "CNSYA",
                'zh_Hans' => "海南三亚港, 中國",
                'zh_Hant' => "海南三亞港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Taizhou, China",
                'location_code' => "CNTZO",
                'zh_Hans' => "台州市港, 中国",
                'zh_Hant' => "台州市港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Weizhou, China",
                'location_code' => "CNWZO",
                'zh_Hans' => "涠洲岛港, 中国",
                'zh_Hant' => "潿洲島港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Xiamen, China",
                'location_code' => "CNXMN",
                'zh_Hans' => "厦门岛港, 中国",
                'zh_Hant' => "廈門島港, 中國"
            ],
            [
                'country' => "Mainland China",
                'en' => "Port of Ningbo-Zhoushan, China",
                'location_code' => "CNZOS",
                'zh_Hans' => "宁波舟山港, 中国",
                'zh_Hant' => "寧波舟山港, 中國"
            ],
            [
                'country' => "Hong Kong Special Administrative Region",
                'en' => "Ocean Terminal (Star Pisces), Kai Tak Cruise Terminal (Genting Dream, World Dream), Hong Kong",
                'location_code' => "HKHKG",
                'zh_Hans' => "海运码头（双鱼星号），启德邮轮码头（云顶梦号, 世界梦号），香港",
                'zh_Hant' => "海運碼頭（雙魚星號），啟德郵輪碼頭（雲頂夢號, 世界夢號），香港"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Fukuoka, Japan",
                'location_code' => "JPFKK",
                'zh_Hans' => "福冈港, 日本",
                'zh_Hant' => "福岡港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Hososhima, Japan",
                'location_code' => "JPHSM",
                'zh_Hans' => "细岛港, 日本",
                'zh_Hant' => "細島港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Ishigaki, Japan",
                'location_code' => "JPISG",
                'zh_Hans' => "石垣島港, 日本",
                'zh_Hant' => "石垣島港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Kagoshima, Japan",
                'location_code' => "JPKAG",
                'zh_Hans' => "鹿儿岛港, 日本",
                'zh_Hant' => "鹿兒島港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Kobe, Japan",
                'location_code' => "JPKOB",
                'zh_Hans' => "神戸港, 日本",
                'zh_Hant' => "神戸港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Kochi, Japan",
                'location_code' => "JPKOC",
                'zh_Hans' => "高知港, 日本",
                'zh_Hant' => "高知港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Motobu, Japan",
                'location_code' => "JPMBT",
                'zh_Hans' => "本部町港, 日本",
                'zh_Hant' => "本部町港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Miyakojima, Japan",
                'location_code' => "JPMYK",
                'zh_Hans' => "宫古岛港, 日本",
                'zh_Hant' => "宮古島港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Naha, Japan",
                'location_code' => "JPNAH",
                'zh_Hans' => "那霸港, 日本",
                'zh_Hant' => "那霸港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Nakagusuku, Japan",
                'location_code' => "JPNAK",
                'zh_Hans' => "中城村港, 日本",
                'zh_Hant' => "中城村港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Yonaguni, Japan",
                'location_code' => "JPOGN",
                'zh_Hans' => "与那国島港, 日本",
                'zh_Hant' => "與那國島港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Osaka, Japan",
                'location_code' => "JPOSA",
                'zh_Hans' => "大阪港, 日本",
                'zh_Hant' => "大阪港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Shimizu, Japan",
                'location_code' => "JPSMZ",
                'zh_Hans' => "清水港, 日本",
                'zh_Hant' => "清水港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Sasebo, Japan",
                'location_code' => "JPSSB",
                'zh_Hans' => "佐世保港, 日本",
                'zh_Hant' => "佐世保港, 日本"
            ],
            [
                'country' => "Japan",
                'en' => "Port of Yokohama, Japan",
                'location_code' => "JPYOK",
                'zh_Hans' => "东京（横滨）港, 日本",
                'zh_Hant' => "東京（橫濱）港, 日本"
            ],
            [
                'country' => "Malaysia",
                'en' => "Johor Port, Malaysia",
                'location_code' => "MYJHB",
                'zh_Hans' => "柔佛港，马来西亚",
                'zh_Hant' => "柔佛港，馬來西亞"
            ],
            [
                'country' => "Malaysia",
                'en' => "Langkawi Port, Malaysia",
                'location_code' => "MYLGK",
                'zh_Hans' => "兰卡威港,马来西亚",
                'zh_Hant' => "蘭卡威港,馬來西亞"
            ],
            [
                'country' => "Malaysia",
                'en' => "Malacca Cruise Port, Malaysia",
                'location_code' => "MYMKZ",
                'zh_Hans' => "马六甲邮轮港,马来西亚",
                'zh_Hant' => "馬六甲郵輪港,馬來西亞"
            ],
            [
                'country' => "Malaysia",
                'en' => "Penang, Malaysia (Swettenham Pier, Penang International Cruise Terminal(PICT))",
                'location_code' => "MYPEN",
                'zh_Hans' => "马来西亚，槟城 (槟城国际邮轮中心 - 瑞典咸邮轮中心)",
                'zh_Hant' => "馬來西亞，檳城 (檳城國際郵輪中心 - 瑞典咸郵輪中心)"
            ],
            [
                'country' => "Malaysia",
                'en' => "Port Klang, Malaysia",
                'location_code' => "MYPKG",
                'zh_Hans' => "巴生港, 马来西亚",
                'zh_Hant' => "巴生港, 馬來西亞"
            ],
            [
                'country' => "Malaysia",
                'en' => "Redang Port, Malaysia",
                'location_code' => "MYRDN",
                'zh_Hans' => "热浪岛港, 马来西亚",
                'zh_Hant' => "熱浪島港, 馬來西亞"
            ],
            [
                'country' => "Malaysia",
                'en' => "Kuala Terengganu Port, Malaysia",
                'location_code' => "MYTGG",
                'zh_Hans' => "登嘉楼港, 马来西亚",
                'zh_Hant' => "登嘉樓港, 馬來西亞"
            ],
            [
                'country' => "Malaysia",
                'en' => "Tioman Port, Malaysia",
                'location_code' => "MYTOD",
                'zh_Hans' => "刁曼岛港, 马来西亚",
                'zh_Hant' => "刁曼島港, 馬來西亞"
            ],
            [
                'country' => "Philippines",
                'en' => "BORACAY, Philippines",
                'location_code' => "PHBOR",
                'zh_Hans' => "长滩岛港, 菲律宾",
                'zh_Hant' => "長灘島港, 菲律賓"
            ],
            [
                'country' => "Philippines",
                'en' => "Laoag, Luzon, Philippines",
                'location_code' => "PHLAO",
                'zh_Hans' => "佬沃, 呂宋, 菲律宾",
                'zh_Hant' => "佬沃, 呂宋, 菲律賓"
            ],
            [
                'country' => "Philippines",
                'en' => "Manila South Harbour, Port Area Manila, Philippines",
                'location_code' => "PHMNL",
                'zh_Hans' => "马尼拉南港，港区马尼拉，菲律宾",
                'zh_Hant' => "馬尼拉南港，港區馬尼拉，菲律賓"
            ],
            [
                'country' => "Singapore",
                'en' => "Singapore Cruise Centre (SuperStar Gemini), Marina Bay Cruise Centre (Genting Dream), Singapore",
                'location_code' => "SGSIN",
                'zh_Hans' => "新加坡邮轮中心（双子星号），滨海湾邮轮中心（云顶梦号），新加坡",
                'zh_Hant' => "新加坡郵輪中心（雙子星號），濱海灣郵輪中心（雲頂夢號），新加坡"
            ],
            [
                'country' => "Thailand",
                'en' => "Port of Bangkok, Thailand",
                'location_code' => "THBKK",
                'zh_Hans' => "曼谷港, 泰国",
                'zh_Hant' => "曼谷港, 泰國"
            ],
            [
                'country' => "Thailand",
                'en' => "Phuket, Thailand",
                'location_code' => "THHKT",
                'zh_Hans' => "布吉港, 泰国",
                'zh_Hant' => "布吉港, 泰國"
            ],
            [
                'country' => "Thailand",
                'en' => "Krabi, Thailand",
                'location_code' => "THKRA",
                'zh_Hans' => "喀比港, 泰国",
                'zh_Hant' => "喀比港, 泰國"
            ],
            [
                'country' => "Thailand",
                'en' => "KO SAMUI, Thailand",
                'location_code' => "THKSM",
                'zh_Hans' => "苏梅岛港, 泰国",
                'zh_Hant' => "蘇梅島港, 泰國"
            ],
            [
                'country' => "Thailand",
                'en' => "Port of Laem Chabang,Thailand",
                'location_code' => "THLCH",
                'zh_Hans' => "林查班港, 泰国",
                'zh_Hant' => "林查班港, 泰國"
            ],
            [
                'country' => "Taiwan",
                'en' => "Hualien Port, Taiwan",
                'location_code' => "TWHUN",
                'zh_Hans' => "花莲港, 台湾",
                'zh_Hant' => "花蓮港, 台灣"
            ],
            [
                'country' => "Taiwan",
                'en' => "Keelung Port, Taiwan",
                'location_code' => "TWKEL",
                'zh_Hans' => "基隆港, 台湾",
                'zh_Hant' => "基隆港, 台灣"
            ],
            [
                'country' => "Taiwan",
                'en' => "Keelung Port, Taiwan",
                'location_code' => "TWKEL/PIER 1",
                'zh_Hans' => "基隆港, 台湾",
                'zh_Hant' => "基隆港, 台灣"
            ],
            [
                'country' => "Taiwan",
                'en' => "Kaohsiung Port, Taiwan",
                'location_code' => "TWKHH",
                'zh_Hans' => "高雄港, 台湾",
                'zh_Hant' => "高雄港, 台灣"
            ],
            [
                'country' => "Taiwan",
                'en' => "Makung Port, Taiwan",
                'location_code' => "TWMZG",
                'zh_Hans' => "澎湖港., 台湾",
                'zh_Hant' => "澎湖港., 台灣"
            ],
            [
                'country' => "Taiwan",
                'en' => "Port of Taichung, Taiwan",
                'location_code' => "TWTXG",
                'zh_Hans' => "台中港, 台湾",
                'zh_Hant' => "台中港, 台灣"
            ]
        ];

        foreach($port as $p) {
            PortData::create($p);
        }
    }
}
