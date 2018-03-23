/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VCalendar from 'v-calendar';
import 'v-calendar/lib/v-calendar.min.css';
import VueCookie from 'vue-cookie';

/*
 * Vue component list
 */

import App from './components/v1/App';
import RedeemSearch from './components/v1/redeem/SearchBox';
import RedeemSearchList from './components/v1/redeem/SearchList';
import SearchRoot from './components/v1/redeem/SearchRoot';
import CabinList from './components/v1/redeem/CabinList';
import CabinCruiseInfoHeader from './components/v1/redeem/cabin/CabinHeader';
import CabinSummery from './components/v1/redeem/CabinSummery';
import CheckoutGuest from './components/v1/redeem/CheckoutGuest';
import Payment from './components/v1/redeem/Payment';
import CabinThankYou from './components/v1/redeem/CabinThankYou';

Vue.use(VueRouter);
Vue.use(VueCookie);
Vue.use(VCalendar, {
    format: {
        title: 'MMMM YYYY',
        weekdays: 'W',
        navMonths: 'MMM',
        input: ['YYYY-MM-DD', 'YYYY-MM-DD', 'MM/YY'],
        dayPopover: 'L',
    }
});

const router = new VueRouter({
    mode: 'history',
    base: '/api/public',
    routes: [{
        path: '/redeem',
        component: SearchRoot,
        children: [{
            path: '',
            name: 'redeem',
            component: RedeemSearchList
        }, {
            path: 'cabin/:cruiseid/:date/:pax',
            name: 'redeem.cabin',
            component: CabinList
        }]
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax/:cabin',
        name: 'redeem.cabin.summery',
        component: CabinSummery
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax/:cabin/checkout',
        name: 'redeem.cabin.checkout',
        component: CheckoutGuest
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax/:cabin/payment',
        name: 'redeem.cabin.payment',
        component: Payment
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax/:cabin/thankyou',
        name: 'redeem.cabin.thankyou',
        component: CabinThankYou
    }, {
        path: '*',
        name: '404',
        component: {
            template: "<div><br/><br/><br/><br/><br/><p>There is no data!</p></div>"
        }
    }]
});

router.beforeEach((to, from, next) => {
    // document.title = to.meta.title
    document.title = "Resorts World at Sea"
    next()
});

window.eventHub = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app', App);
Vue.component('redeem-search', RedeemSearch);
Vue.component('cabin-cruise-info', CabinCruiseInfoHeader);

const app = new Vue({
    el: '#app',
    data() {
        return {
            urlPara: [],
            // Server
            apiEndpoint: "http://52.77.205.209/api/public",
            // Local
            // apiEndpoint: "http://localhost:8082",
            redeemSearch: {
                port: "",
                time: "",
                pax: {
                    adult: 0,
                    child: 0,
                    infant: 0,
                    total: ""
                }
            },
            result: "",
            refreshCheckout: false,
            refreshPayment: false,
            portData: [{
                    'country': "Mainland China",
                    'en': "Port of Haikou, China",
                    'location_code': "CNHAK",
                    'zh-Hans': "海口秀英港, 中国",
                    'zh-Hant': "海口秀英港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Nansha, China",
                    'location_code': "CNNSA",
                    'zh-Hans': "南沙港客运码头, 中国",
                    'zh-Hant': "南沙港客運碼頭, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Shanghai, China",
                    'location_code': "CNSHA",
                    'zh-Hans': "上海港, 中国",
                    'zh-Hant': "上海港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Shekou, China",
                    'location_code': "CNSHK",
                    'zh-Hans': "蛇口港, 中國",
                    'zh-Hant': "蛇口港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Sanya, China",
                    'location_code': "CNSYA",
                    'zh-Hans': "海南三亚港, 中國",
                    'zh-Hant': "海南三亞港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Taizhou, China",
                    'location_code': "CNTZO",
                    'zh-Hans': "台州市港, 中国",
                    'zh-Hant': "台州市港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Weizhou, China",
                    'location_code': "CNWZO",
                    'zh-Hans': "涠洲岛港, 中国",
                    'zh-Hant': "潿洲島港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Xiamen, China",
                    'location_code': "CNXMN",
                    'zh-Hans': "厦门岛港, 中国",
                    'zh-Hant': "廈門島港, 中國"
                },
                {
                    'country': "Mainland China",
                    'en': "Port of Ningbo-Zhoushan, China",
                    'location_code': "CNZOS",
                    'zh-Hans': "宁波舟山港, 中国",
                    'zh-Hant': "寧波舟山港, 中國"
                },
                {
                    'country': "Hong Kong Special Administrative Region",
                    'en': "Ocean Terminal (Star Pisces), Kai Tak Cruise Terminal (Genting Dream, World Dream), Hong Kong",
                    'location_code': "HKHKG",
                    'zh-Hans': "海运码头（双鱼星号），启德邮轮码头（云顶梦号, 世界梦号），香港",
                    'zh-Hant': "海運碼頭（雙魚星號），啟德郵輪碼頭（雲頂夢號, 世界夢號），香港"
                },
                {
                    'country': "Japan",
                    'en': "Port of Fukuoka, Japan",
                    'location_code': "JPFKK",
                    'zh-Hans': "福冈港, 日本",
                    'zh-Hant': "福岡港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Hososhima, Japan",
                    'location_code': "JPHSM",
                    'zh-Hans': "细岛港, 日本",
                    'zh-Hant': "細島港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Ishigaki, Japan",
                    'location_code': "JPISG",
                    'zh-Hans': "石垣島港, 日本",
                    'zh-Hant': "石垣島港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Kagoshima, Japan",
                    'location_code': "JPKAG",
                    'zh-Hans': "鹿儿岛港, 日本",
                    'zh-Hant': "鹿兒島港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Kobe, Japan",
                    'location_code': "JPKOB",
                    'zh-Hans': "神戸港, 日本",
                    'zh-Hant': "神戸港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Kochi, Japan",
                    'location_code': "JPKOC",
                    'zh-Hans': "高知港, 日本",
                    'zh-Hant': "高知港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Motobu, Japan",
                    'location_code': "JPMBT",
                    'zh-Hans': "本部町港, 日本",
                    'zh-Hant': "本部町港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Miyakojima, Japan",
                    'location_code': "JPMYK",
                    'zh-Hans': "宫古岛港, 日本",
                    'zh-Hant': "宮古島港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Naha, Japan",
                    'location_code': "JPNAH",
                    'zh-Hans': "那霸港, 日本",
                    'zh-Hant': "那霸港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Nakagusuku, Japan",
                    'location_code': "JPNAK",
                    'zh-Hans': "中城村港, 日本",
                    'zh-Hant': "中城村港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Yonaguni, Japan",
                    'location_code': "JPOGN",
                    'zh-Hans': "与那国島港, 日本",
                    'zh-Hant': "與那國島港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Osaka, Japan",
                    'location_code': "JPOSA",
                    'zh-Hans': "大阪港, 日本",
                    'zh-Hant': "大阪港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Shimizu, Japan",
                    'location_code': "JPSMZ",
                    'zh-Hans': "清水港, 日本",
                    'zh-Hant': "清水港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Sasebo, Japan",
                    'location_code': "JPSSB",
                    'zh-Hans': "佐世保港, 日本",
                    'zh-Hant': "佐世保港, 日本"
                },
                {
                    'country': "Japan",
                    'en': "Port of Yokohama, Japan",
                    'location_code': "JPYOK",
                    'zh-Hans': "东京（横滨）港, 日本",
                    'zh-Hant': "東京（橫濱）港, 日本"
                },
                {
                    'country': "Malaysia",
                    'en': "Johor Port, Malaysia",
                    'location_code': "MYJHB",
                    'zh-Hans': "柔佛港，马来西亚",
                    'zh-Hant': "柔佛港，馬來西亞"
                },
                {
                    'country': "Malaysia",
                    'en': "Langkawi Port, Malaysia",
                    'location_code': "MYLGK",
                    'zh-Hans': "兰卡威港,马来西亚",
                    'zh-Hant': "蘭卡威港,馬來西亞"
                },
                {
                    'country': "Malaysia",
                    'en': "Malacca Cruise Port, Malaysia",
                    'location_code': "MYMKZ",
                    'zh-Hans': "马六甲邮轮港,马来西亚",
                    'zh-Hant': "馬六甲郵輪港,馬來西亞"
                },
                {
                    'country': "Malaysia",
                    'en': "Penang, Malaysia (Swettenham Pier, Penang International Cruise Terminal(PICT))",
                    'location_code': "MYPEN",
                    'zh-Hans': "马来西亚，槟城 (槟城国际邮轮中心 - 瑞典咸邮轮中心)",
                    'zh-Hant': "馬來西亞，檳城 (檳城國際郵輪中心 - 瑞典咸郵輪中心)"
                },
                {
                    'country': "Malaysia",
                    'en': "Port Klang, Malaysia",
                    'location_code': "MYPKG",
                    'zh-Hans': "巴生港, 马来西亚",
                    'zh-Hant': "巴生港, 馬來西亞"
                },
                {
                    'country': "Malaysia",
                    'en': "Redang Port, Malaysia",
                    'location_code': "MYRDN",
                    'zh-Hans': "热浪岛港, 马来西亚",
                    'zh-Hant': "熱浪島港, 馬來西亞"
                },
                {
                    'country': "Malaysia",
                    'en': "Kuala Terengganu Port, Malaysia",
                    'location_code': "MYTGG",
                    'zh-Hans': "登嘉楼港, 马来西亚",
                    'zh-Hant': "登嘉樓港, 馬來西亞"
                },
                {
                    'country': "Malaysia",
                    'en': "Tioman Port, Malaysia",
                    'location_code': "MYTOD",
                    'zh-Hans': "刁曼岛港, 马来西亚",
                    'zh-Hant': "刁曼島港, 馬來西亞"
                },
                {
                    'country': "Philippines",
                    'en': "BORACAY, Philippines",
                    'location_code': "PHBOR",
                    'zh-Hans': "长滩岛港, 菲律宾",
                    'zh-Hant': "長灘島港, 菲律賓"
                },
                {
                    'country': "Philippines",
                    'en': "Laoag, Luzon, Philippines",
                    'location_code': "PHLAO",
                    'zh-Hans': "佬沃, 呂宋, 菲律宾",
                    'zh-Hant': "佬沃, 呂宋, 菲律賓"
                },
                {
                    'country': "Philippines",
                    'en': "Manila South Harbour, Port Area Manila, Philippines",
                    'location_code': "PHMNL",
                    'zh-Hans': "马尼拉南港，港区马尼拉，菲律宾",
                    'zh-Hant': "馬尼拉南港，港區馬尼拉，菲律賓"
                },
                {
                    'country': "Singapore",
                    'en': "Singapore Cruise Centre (SuperStar Gemini), Marina Bay Cruise Centre (Genting Dream), Singapore",
                    'location_code': "SGSIN",
                    'zh-Hans': "新加坡邮轮中心（双子星号），滨海湾邮轮中心（云顶梦号），新加坡",
                    'zh-Hant': "新加坡郵輪中心（雙子星號），濱海灣郵輪中心（雲頂夢號），新加坡"
                },
                {
                    'country': "Thailand",
                    'en': "Port of Bangkok, Thailand",
                    'location_code': "THBKK",
                    'zh-Hans': "曼谷港, 泰国",
                    'zh-Hant': "曼谷港, 泰國"
                },
                {
                    'country': "Thailand",
                    'en': "Phuket, Thailand",
                    'location_code': "THHKT",
                    'zh-Hans': "布吉港, 泰国",
                    'zh-Hant': "布吉港, 泰國"
                },
                {
                    'country': "Thailand",
                    'en': "Krabi, Thailand",
                    'location_code': "THKRA",
                    'zh-Hans': "喀比港, 泰国",
                    'zh-Hant': "喀比港, 泰國"
                },
                {
                    'country': "Thailand",
                    'en': "KO SAMUI, Thailand",
                    'location_code': "THKSM",
                    'zh-Hans': "苏梅岛港, 泰国",
                    'zh-Hant': "蘇梅島港, 泰國"
                },
                {
                    'country': "Thailand",
                    'en': "Port of Laem Chabang,Thailand",
                    'location_code': "THLCH",
                    'zh-Hans': "林查班港, 泰国",
                    'zh-Hant': "林查班港, 泰國"
                },
                {
                    'country': "Taiwan",
                    'en': "Hualien Port, Taiwan",
                    'location_code': "TWHUN",
                    'zh-Hans': "花莲港, 台湾",
                    'zh-Hant': "花蓮港, 台灣"
                },
                {
                    'country': "Taiwan",
                    'en': "Keelung Port, Taiwan",
                    'location_code': "TWKEL",
                    'zh-Hans': "基隆港, 台湾",
                    'zh-Hant': "基隆港, 台灣"
                },
                {
                    'country': "Taiwan",
                    'en': "Keelung Port, Taiwan",
                    'location_code': "TWKEL/PIER 1",
                    'zh-Hans': "基隆港, 台湾",
                    'zh-Hant': "基隆港, 台灣"
                },
                {
                    'country': "Taiwan",
                    'en': "Kaohsiung Port, Taiwan",
                    'location_code': "TWKHH",
                    'zh-Hans': "高雄港, 台湾",
                    'zh-Hant': "高雄港, 台灣"
                },
                {
                    'country': "Taiwan",
                    'en': "Makung Port, Taiwan",
                    'location_code': "TWMZG",
                    'zh-Hans': "澎湖港., 台湾",
                    'zh-Hant': "澎湖港., 台灣"
                },
                {
                    'country': "Taiwan",
                    'en': "Port of Taichung, Taiwan",
                    'location_code': "TWTXG",
                    'zh-Hans': "台中港, 台湾",
                    'zh-Hant': "台中港, 台灣"
                }
            ],
            shipData: [{
                    'ship_code': 'GDR',
                    'ship_code_drs': 'Genting Dream',
                    'en': 'Genting Dream',
                    'zh-Hans': '云顶梦号',
                    'zh-Hant': '雲頂夢號'
                },
                {
                    'ship_code': 'WDR',
                    'ship_code_drs': 'World Dream',
                    'en': 'World Dream',
                    'zh-Hans': '世界梦号',
                    'zh-Hant': '世界夢號'
                },
                {
                    'ship_code': 'SPC',
                    'ship_code_drs': 'SPC ex Hong Kong',
                    'en': 'Star Pisces',
                    'zh-Hans': '双鱼星号',
                    'zh-Hant': '雙魚星號'
                },
                {
                    'ship_code': 'SSQ',
                    'ship_code_drs': 'SSQ ex Taiwan',
                    'en': 'SuperStar Aquarius',
                    'zh-Hans': '宝瓶星号',
                    'zh-Hant': '寶瓶星號'
                },
                {
                    'ship_code': 'SXG',
                    'ship_code_drs': 'SSG ex Singapore',
                    'en': 'SuperStar Gemini',
                    'zh-Hans': '双子星号',
                    'zh-Hant': '雙子星號'
                },
                {
                    'ship_code': 'SSR',
                    'ship_code_drs': 'SSR ex Penang',
                    'en': 'SuperStar Libra',
                    'zh-Hans': '天秤星号',
                    'zh-Hant': '天秤星號'
                },
                {
                    'ship_code': 'SSV',
                    'ship_code_drs': 'SSV ex Nansha',
                    'en': 'SuperStar Virgo',
                    'zh-Hans': '处女星号',
                    'zh-Hant': '處女星號'
                }
            ],
            cabinData: [{
                    "cabin_code": "BDA",
                    "cabin_type": "BDA: Balcony Deluxe Stateroom",
                    "cabin_type_en": "BDA: Balcony Deluxe Stateroom",
                    "cabin_type_zh-Hans": "BDA: 豪华露台客房",
                    "cabin_type_zh-Hant": "BDA: 豪華露台客房",
                    "key": "GDR:BDA",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "BDS",
                    "cabin_type": "BDS: Balcony Deluxe Stateroom",
                    "cabin_type_en": "BDS: Balcony Deluxe Stateroom",
                    "cabin_type_zh-Hans": "BDS: 豪华露台客房",
                    "cabin_type_zh-Hant": "BDS: 豪華露台客房",
                    "key": "GDR:BDS",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "BSA",
                    "cabin_type": "BSA: Balcony Stateroom",
                    "cabin_type_en": "BSA: Balcony Stateroom",
                    "cabin_type_zh-Hans": "BSA: 露台客房",
                    "cabin_type_zh-Hant": "BSA: 露台客房",
                    "key": "GDR:BSA",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "BSS",
                    "cabin_type": "BSS: Balcony Stateroom",
                    "cabin_type_en": "BSS: Balcony Stateroom",
                    "cabin_type_zh-Hans": "BSS: 露台客房",
                    "cabin_type_zh-Hant": "BSS: 露台客房",
                    "key": "GDR:BSS",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "ISA",
                    "cabin_type": "ISA: Interior Stateroom",
                    "cabin_type_en": "ISA: Interior Stateroom",
                    "cabin_type_zh-Hans": "ISA: 内侧客房",
                    "cabin_type_zh-Hant": "ISA: 內側客房",
                    "key": "GDR:ISA",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "ISS",
                    "cabin_type": "ISS: Interior Stateroom",
                    "cabin_type_en": "ISS: Interior Stateroom",
                    "cabin_type_zh-Hans": "ISS: 内侧客房",
                    "cabin_type_zh-Hant": "ISS: 內側客房",
                    "key": "GDR:ISS",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "OSA",
                    "cabin_type": "OSA: Oceanview Stateroom",
                    "cabin_type_en": "OSA: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "OSA: 海景客房",
                    "cabin_type_zh-Hant": "OSA: 海景客房",
                    "key": "GDR:OSA",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "OSS",
                    "cabin_type": "OSS: Oceanview Stateroom",
                    "cabin_type_en": "OSS: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "OSS: 海景客房",
                    "cabin_type_zh-Hant": "OSS: 海景客房",
                    "key": "GDR:OSS",
                    "ship_code": "Genting Dream"
                },
                {
                    "cabin_code": "AE",
                    "cabin_type": "AE: Superior Deluxe",
                    "cabin_type_en": "AE: Superior Deluxe",
                    "cabin_type_zh-Hans": "AE: 高级豪华客房",
                    "cabin_type_zh-Hant": "AE: 高級豪華客房",
                    "key": "SPC:AE",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "AF",
                    "cabin_type": "AF: Deluxe",
                    "cabin_type_en": "AF: Deluxe",
                    "cabin_type_zh-Hans": "AF: 豪华房",
                    "cabin_type_zh-Hant": "AF: 豪華房",
                    "key": "SPC:AF",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "CA",
                    "cabin_type": "CA: Deluxe Stateroom",
                    "cabin_type_en": "CA: Deluxe Stateroom",
                    "cabin_type_zh-Hans": "CA: 豪华客房",
                    "cabin_type_zh-Hant": "CA: 豪華客房",
                    "key": "SPC:CA",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "CB",
                    "cabin_type": "CB: Deluxe Stateroom",
                    "cabin_type_en": "CB: Deluxe Stateroom",
                    "cabin_type_zh-Hans": "CB: 豪华客房",
                    "cabin_type_zh-Hant": "CB: 豪華客房",
                    "key": "SPC:CB",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "CC",
                    "cabin_type": "CC: Deluxe Stateroom - Single Occupancy",
                    "cabin_type_en": "CC: Deluxe Stateroom - Single Occupancy",
                    "cabin_type_zh-Hans": "CC: 豪华客房 - 1张单人床",
                    "cabin_type_zh-Hant": "CC: 豪華客房 - 1張單人床",
                    "key": "SPC:CC",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "DA",
                    "cabin_type": "DA: Inside Stateroom",
                    "cabin_type_en": "DA: Inside Stateroom",
                    "cabin_type_zh-Hans": "DA: 内侧客房",
                    "cabin_type_zh-Hant": "DA: 內側客房",
                    "key": "SPC:DA",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "DB",
                    "cabin_type": "DB: Inside Stateroom",
                    "cabin_type_en": "DB: Inside Stateroom",
                    "cabin_type_zh-Hans": "DB: 内侧客房",
                    "cabin_type_zh-Hant": "DB: 內側客房",
                    "key": "SPC:DB",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "DC",
                    "cabin_type": "DC: Inside Stateroom",
                    "cabin_type_en": "DC: Inside Stateroom",
                    "cabin_type_zh-Hans": "DC: 内侧客房",
                    "cabin_type_zh-Hant": "DC: 內側客房",
                    "key": "SPC:DC",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "DD",
                    "cabin_type": "DD: Inside Stateroom",
                    "cabin_type_en": "DD: Inside Stateroom",
                    "cabin_type_zh-Hans": "DD: 内侧客房",
                    "cabin_type_zh-Hant": "DD: 內側客房",
                    "key": "SPC:DD",
                    "ship_code": "SPC ex Hong Kong"
                },
                {
                    "cabin_code": "BA",
                    "cabin_type": "BA: Oceanview Stateroom with Balcony",
                    "cabin_type_en": "BA: Oceanview Stateroom with Balcony",
                    "cabin_type_zh-Hans": "BA: 露台海景客房",
                    "cabin_type_zh-Hant": "BA: 露台海景客房",
                    "key": "SSQ:BA",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CA",
                    "cabin_type": "CA: Superior Oceanview Stateroom",
                    "cabin_type_en": "CA: Superior Oceanview Stateroom",
                    "cabin_type_zh-Hans": "CA: 高级海景客房",
                    "cabin_type_zh-Hant": "CA: 高級海景客房",
                    "key": "SSQ:CA",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CB",
                    "cabin_type": "CB: Oceanview Stateroom",
                    "cabin_type_en": "CB: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "CB: 海景客房",
                    "cabin_type_zh-Hant": "CB: 海景客房",
                    "key": "SSQ:CB",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CC",
                    "cabin_type": "CC: Oceanview Stateroom",
                    "cabin_type_en": "CC: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "CC: 海景客房",
                    "cabin_type_zh-Hant": "CC: 海景客房",
                    "key": "SSQ:CC",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CD",
                    "cabin_type": "CD: Oceanview Stateroom",
                    "cabin_type_en": "CD: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "CD: 海景客房",
                    "cabin_type_zh-Hant": "CD: 海景客房",
                    "key": "SSQ:CD",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CF",
                    "cabin_type": "CF: Oceanview with PortHole",
                    "cabin_type_en": "CF: Oceanview with PortHole",
                    "cabin_type_zh-Hans": "CF: 海景舷窗客房",
                    "cabin_type_zh-Hant": "CF: 海景舷窗客房",
                    "key": "SSQ:CF",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CG",
                    "cabin_type": "CG: Oceanview with PortHole",
                    "cabin_type_en": "CG: Oceanview with PortHole",
                    "cabin_type_zh-Hans": "CG: 海景舷窗客房",
                    "cabin_type_zh-Hant": "CG: 海景舷窗客房",
                    "key": "SSQ:CG",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "CH",
                    "cabin_type": "CH: Fully Obstructed View",
                    "cabin_type_en": "CH: Fully Obstructed View",
                    "cabin_type_zh-Hans": "CH: 海景窗户客房(景观受阻)",
                    "cabin_type_zh-Hant": "CH: 海景窗戶客房(景觀受阻)",
                    "key": "SSQ:CH",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "DA",
                    "cabin_type": "DA: Superior Inside Stateroom",
                    "cabin_type_en": "DA: Superior Inside Stateroom",
                    "cabin_type_zh-Hans": "DA: 高级内侧客房",
                    "cabin_type_zh-Hant": "DA: 高級內側客房",
                    "key": "SSQ:DA",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "DB",
                    "cabin_type": "DB: Inside Stateroom",
                    "cabin_type_en": "DB: Inside Stateroom",
                    "cabin_type_zh-Hans": "DB: 内侧客房",
                    "cabin_type_zh-Hant": "DB: 內側客房",
                    "key": "SSQ:DB",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "DC",
                    "cabin_type": "DC: Inside Stateroom",
                    "cabin_type_en": "DC: Inside Stateroom",
                    "cabin_type_zh-Hans": "DC: 内侧客房",
                    "cabin_type_zh-Hant": "DC: 內側客房",
                    "key": "SSQ:DC",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "DD",
                    "cabin_type": "DD: Inside Stateroom",
                    "cabin_type_en": "DD: Inside Stateroom",
                    "cabin_type_zh-Hans": "DD: 内侧客房",
                    "cabin_type_zh-Hant": "DD: 內側客房",
                    "key": "SSQ:DD",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "DE",
                    "cabin_type": "DE: Inside Stateroom",
                    "cabin_type_en": "DE: Inside Stateroom",
                    "cabin_type_zh-Hans": "DE: 内侧客房",
                    "cabin_type_zh-Hant": "DE: 內側客房",
                    "key": "SSQ:DE",
                    "ship_code": "SSQ ex Taiwan"
                },
                {
                    "cabin_code": "BA",
                    "cabin_type": "BA: Deluxe Oceanview Stateroom",
                    "cabin_type_en": "BA: Deluxe Oceanview Stateroom",
                    "cabin_type_zh-Hans": "BA: 豪华海景客房",
                    "cabin_type_zh-Hant": "BA: 豪華海景客房",
                    "key": "SSR:BA",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "BAB",
                    "cabin_type": "BAB: Deluxe Oceanview Stateroom - Obstructed View",
                    "cabin_type_en": "BAB: Deluxe Oceanview Stateroom - Obstructed View",
                    "cabin_type_zh-Hans": "BAB: 豪华海景客房(景观受阻)",
                    "cabin_type_zh-Hant": "BAB: 豪華海景客房(景觀受阻)",
                    "key": "SSR:BAB",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "BB",
                    "cabin_type": "BB: Deluxe Oceanview Stateroom",
                    "cabin_type_en": "BB: Deluxe Oceanview Stateroom",
                    "cabin_type_zh-Hans": "BB: 豪华海景客房",
                    "cabin_type_zh-Hant": "BB: 豪華海景客房",
                    "key": "SSR:BB",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "CA",
                    "cabin_type": "CA: Oceanview Stateroom with Window",
                    "cabin_type_en": "CA: Oceanview Stateroom with Window",
                    "cabin_type_zh-Hans": "CA: 海景窗户客房",
                    "cabin_type_zh-Hant": "CA: 海景窗戶客房",
                    "key": "SSR:CA",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "CAB",
                    "cabin_type": "CAB: Oceanview Stateroom with Window - Obstructed View",
                    "cabin_type_en": "CAB: Oceanview Stateroom with Window - Obstructed View",
                    "cabin_type_zh-Hans": "CAB: 海景窗户客房(景观受阻)",
                    "cabin_type_zh-Hant": "CAB: 海景窗戶客房(景觀受阻)",
                    "key": "SSR:CAB",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "CB",
                    "cabin_type": "CB: Oceanview Stateroom with Window",
                    "cabin_type_en": "CB: Oceanview Stateroom with Window",
                    "cabin_type_zh-Hans": "CB: 海景窗户客房",
                    "cabin_type_zh-Hant": "CB: 海景窗戶客房",
                    "key": "SSR:CB",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "CC",
                    "cabin_type": "CC: Oceanview Stateroom with Window",
                    "cabin_type_en": "CC: Oceanview Stateroom with Window",
                    "cabin_type_zh-Hans": "CC: 海景窗户客房",
                    "cabin_type_zh-Hant": "CC: 海景窗戶客房",
                    "key": "SSR:CC",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "CD",
                    "cabin_type": "CD: Oceanview Stateroom with Porthole",
                    "cabin_type_en": "CD: Oceanview Stateroom with Porthole",
                    "cabin_type_zh-Hans": "CD: 海景舷窗客房",
                    "cabin_type_zh-Hant": "CD: 海景舷窗客房",
                    "key": "SSR:CD",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "DA",
                    "cabin_type": "DA: Inside Stateroom",
                    "cabin_type_en": "DA: Inside Stateroom",
                    "cabin_type_zh-Hans": "DA: 内侧客房",
                    "cabin_type_zh-Hant": "DA: 內側客房",
                    "key": "SSR:DA",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "DB",
                    "cabin_type": "DB: Inside Stateroom",
                    "cabin_type_en": "DB: Inside Stateroom",
                    "cabin_type_zh-Hans": "DB: 内侧客房",
                    "cabin_type_zh-Hant": "DB: 內側客房",
                    "key": "SSR:DB",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "DC",
                    "cabin_type": "DC: Inside Stateroom",
                    "cabin_type_en": "DC: Inside Stateroom",
                    "cabin_type_zh-Hans": "DC: 内侧客房",
                    "cabin_type_zh-Hant": "DC: 內側客房",
                    "key": "SSR:DC",
                    "ship_code": "SSR ex Penang"
                },
                {
                    "cabin_code": "BA",
                    "cabin_type": "BA: O/View Stateroom wz Balcony",
                    "cabin_type_en": "BA: O/View Stateroom wz Balcony",
                    "cabin_type_zh-Hans": "BA: 露台海景客房",
                    "cabin_type_zh-Hant": "BA: 露台海景客房",
                    "key": "SSV:BA",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "BB",
                    "cabin_type": "BB: O/View Stateroom wz Balcony",
                    "cabin_type_en": "BB: O/View Stateroom wz Balcony",
                    "cabin_type_zh-Hans": "BB: 露台海景客房",
                    "cabin_type_zh-Hant": "BB: 露台海景客房",
                    "key": "SSV:BB",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "BC",
                    "cabin_type": "BC: O/View Stateroom wz Balcony",
                    "cabin_type_en": "BC: O/View Stateroom wz Balcony",
                    "cabin_type_zh-Hans": "BC: 露台海景客房",
                    "cabin_type_zh-Hant": "BC: 露台海景客房",
                    "key": "SSV:BC",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "CA",
                    "cabin_type": "CA: O/View Stateroom wz Window",
                    "cabin_type_en": "CA: O/View Stateroom wz Window",
                    "cabin_type_zh-Hans": "CA: 窗户海景客房",
                    "cabin_type_zh-Hant": "CA: 窗戶海景客房",
                    "key": "SSV:CA",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "CB",
                    "cabin_type": "CB: O/View Stateroom wz Window",
                    "cabin_type_en": "CB: O/View Stateroom wz Window",
                    "cabin_type_zh-Hans": "CB: 窗户海景客房",
                    "cabin_type_zh-Hant": "CB: 窗戶海景客房",
                    "key": "SSV:CB",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "CC",
                    "cabin_type": "CC: O/View Stateroom wz Window",
                    "cabin_type_en": "CC: O/View Stateroom wz Window",
                    "cabin_type_zh-Hans": "CC: 窗户海景客房",
                    "cabin_type_zh-Hant": "CC: 窗戶海景客房",
                    "key": "SSV:CC",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "CD",
                    "cabin_type": "CD: O/View Stateroom wz Porthole",
                    "cabin_type_en": "CD: O/View Stateroom wz Porthole",
                    "cabin_type_zh-Hans": "CD: 舷窗海景客房",
                    "cabin_type_zh-Hant": "CD: 舷窗海景客房",
                    "key": "SSV:CD",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "CS",
                    "cabin_type": "CS: O/View Stateroom wz Window Deluxe",
                    "cabin_type_en": "CS: O/View Stateroom wz Window Deluxe",
                    "cabin_type_zh-Hans": "CS: 豪华窗户海景客房",
                    "cabin_type_zh-Hant": "CS: 豪華窗戶海景客房",
                    "key": "SSV:CS",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "DA",
                    "cabin_type": "DA: Inside Stateroom",
                    "cabin_type_en": "DA: Inside Stateroom",
                    "cabin_type_zh-Hans": "DA: 内侧客房",
                    "cabin_type_zh-Hant": "DA: 內側客房",
                    "key": "SSV:DA",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "DB",
                    "cabin_type": "DB: Inside Stateroom",
                    "cabin_type_en": "DB: Inside Stateroom",
                    "cabin_type_zh-Hans": "DB: 内侧客房",
                    "cabin_type_zh-Hant": "DB: 內側客房",
                    "key": "SSV:DB",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "DC",
                    "cabin_type": "DC: Inside Stateroom",
                    "cabin_type_en": "DC: Inside Stateroom",
                    "cabin_type_zh-Hans": "DC: 内侧客房",
                    "cabin_type_zh-Hant": "DC: 內側客房",
                    "key": "SSV:DC",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "DD",
                    "cabin_type": "DD: Inside Stateroom",
                    "cabin_type_en": "DD: Inside Stateroom",
                    "cabin_type_zh-Hans": "DD: 内侧客房",
                    "cabin_type_zh-Hant": "DD: 內側客房",
                    "key": "SSV:DD",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "DS",
                    "cabin_type": "DS: Inside Stateroom Deluxe",
                    "cabin_type_en": "DS: Inside Stateroom Deluxe",
                    "cabin_type_zh-Hans": "DS: 豪华内侧客房",
                    "cabin_type_zh-Hant": "DS: 豪華內側客房",
                    "key": "SSV:DS",
                    "ship_code": "SSV ex Nansha"
                },
                {
                    "cabin_code": "BA",
                    "cabin_type": "BA: Oceanview Stateroom with Balcony",
                    "cabin_type_en": "BA: Oceanview Stateroom with Balcony",
                    "cabin_type_zh-Hans": "BA: 露台海景客房",
                    "cabin_type_zh-Hant": "BA: 露台海景客房",
                    "key": "SXG:BA",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CA",
                    "cabin_type": "CA: Superior Oceanview Stateroom",
                    "cabin_type_en": "CA: Superior Oceanview Stateroom",
                    "cabin_type_zh-Hans": "CA: 高级海景客房",
                    "cabin_type_zh-Hant": "CA: 高級海景客房",
                    "key": "SXG:CA",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CB",
                    "cabin_type": "CB: Oceanview Stateroom with Window",
                    "cabin_type_en": "CB: Oceanview Stateroom with Window",
                    "cabin_type_zh-Hans": "CB: 窗户海景客房",
                    "cabin_type_zh-Hant": "CB: 窗戶海景客房",
                    "key": "SXG:CB",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CC",
                    "cabin_type": "CC: Oceanview Stateroom Open to Jogging Track",
                    "cabin_type_en": "CC: Oceanview Stateroom Open to Jogging Track",
                    "cabin_type_zh-Hans": "CC: 海景客房 (面向缓跑径)",
                    "cabin_type_zh-Hant": "CC: 海景客房 (面向緩跑徑)",
                    "key": "SXG:CC",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CD",
                    "cabin_type": "CD: Oceanview Stateroom with Window",
                    "cabin_type_en": "CD: Oceanview Stateroom with Window",
                    "cabin_type_zh-Hans": "CD: 窗户海景客房",
                    "cabin_type_zh-Hant": "CD: 窗戶海景客房",
                    "key": "SXG:CD",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CE",
                    "cabin_type": "CE: Oceanview Stateroom with Porthole",
                    "cabin_type_en": "CE: Oceanview Stateroom with Porthole",
                    "cabin_type_zh-Hans": "CE: 舷窗海景客房",
                    "cabin_type_zh-Hant": "CE: 舷窗海景客房",
                    "key": "SXG:CE",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CF",
                    "cabin_type": "CF: Oceanview Stateroom with Porthole",
                    "cabin_type_en": "CF: Oceanview Stateroom with Porthole",
                    "cabin_type_zh-Hans": "CF: 舷窗海景客房",
                    "cabin_type_zh-Hant": "CF: 舷窗海景客房",
                    "key": "SXG:CF",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "CH",
                    "cabin_type": "CH: Oceanview Stateroom with Window Obstructed View",
                    "cabin_type_en": "CH: Oceanview Stateroom with Window Obstructed View",
                    "cabin_type_zh-Hans": "CH: 窗户海景客房(景观受阻)",
                    "cabin_type_zh-Hant": "CH: 窗戶海景客房(景觀受阻)",
                    "key": "SXG:CH",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "DA",
                    "cabin_type": "DA: Superior Inside Stateroom",
                    "cabin_type_en": "DA: Superior Inside Stateroom",
                    "cabin_type_zh-Hans": "DA: 高级内侧客房",
                    "cabin_type_zh-Hant": "DA: 高級內側客房",
                    "key": "SXG:DA",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "DB",
                    "cabin_type": "DB: Inside Stateroom",
                    "cabin_type_en": "DB: Inside Stateroom",
                    "cabin_type_zh-Hans": "DB: 内侧客房",
                    "cabin_type_zh-Hant": "DB: 內側客房",
                    "key": "SXG:DB",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "DC",
                    "cabin_type": "DC: Inside Stateroom",
                    "cabin_type_en": "DC: Inside Stateroom",
                    "cabin_type_zh-Hans": "DC: 内侧客房",
                    "cabin_type_zh-Hant": "DC: 內側客房",
                    "key": "SXG:DC",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "DD",
                    "cabin_type": "DD: Inside Stateroom",
                    "cabin_type_en": "DD: Inside Stateroom",
                    "cabin_type_zh-Hans": "DD: 内侧客房",
                    "cabin_type_zh-Hant": "DD: 內側客房",
                    "key": "SXG:DD",
                    "ship_code": "SSG ex Singapore"
                },
                {
                    "cabin_code": "BDA",
                    "cabin_type": "BDA: Balcony Deluxe Stateroom",
                    "cabin_type_en": "BDA: Balcony Deluxe Stateroom",
                    "cabin_type_zh-Hans": "BDA: 豪华露台客房",
                    "cabin_type_zh-Hant": "BDA: 豪華露台客房",
                    "key": "WDR:BDA",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "BDS",
                    "cabin_type": "BDS: Balcony Deluxe Stateroom",
                    "cabin_type_en": "BDS: Balcony Deluxe Stateroom",
                    "cabin_type_zh-Hans": "BDS: 豪华露台客房",
                    "cabin_type_zh-Hant": "BDS: 豪華露台客房",
                    "key": "WDR:BDS",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "BSA",
                    "cabin_type": "BSA: Balcony Stateroom",
                    "cabin_type_en": "BSA: Balcony Stateroom",
                    "cabin_type_zh-Hans": "BSA: 露台客房",
                    "cabin_type_zh-Hant": "BSA: 露台客房",
                    "key": "WDR:BSA",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "BSS",
                    "cabin_type": "BSS: Balcony Stateroom",
                    "cabin_type_en": "BSS: Balcony Stateroom",
                    "cabin_type_zh-Hans": "BSS: 露台客房",
                    "cabin_type_zh-Hant": "BSS: 露台客房",
                    "key": "WDR:BSS",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "DDS",
                    "cabin_type": "DDS: Dream Deluxe Suite",
                    "cabin_type_en": "DDS: Dream Deluxe Suite",
                    "cabin_type_zh-Hans": "DDS: 星梦豪华套房",
                    "cabin_type_zh-Hant": "DDS: 星夢豪華套房",
                    "key": "WDR:DDS",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "DES",
                    "cabin_type": "DES: Dream Executive Suite",
                    "cabin_type_en": "DES: Dream Executive Suite",
                    "cabin_type_zh-Hans": "DES: 星梦行政套房",
                    "cabin_type_zh-Hant": "DES: 星夢行政套房",
                    "key": "WDR:DES",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "DGP",
                    "cabin_type": "DGP: Dream Garden Penthhouse",
                    "cabin_type_en": "DGP: Dream Garden Penthhouse",
                    "cabin_type_zh-Hans": "DGP: 帝庭总统套房",
                    "cabin_type_zh-Hant": "DGP: 帝庭總統套房",
                    "key": "WDR:DGP",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "DPS",
                    "cabin_type": "DPS: Palace Suite",
                    "cabin_type_en": "DPS: Palace Suite",
                    "cabin_type_zh-Hans": "DPS: 皇宫套房",
                    "cabin_type_zh-Hant": "DPS: 皇宮套房",
                    "key": "WDR:DPS",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "DSA",
                    "cabin_type": "DSA: Dream Suite",
                    "cabin_type_en": "DSA: Dream Suite",
                    "cabin_type_zh-Hans": "DSA: 星梦套房",
                    "cabin_type_zh-Hant": "DSA: 星夢套房",
                    "key": "WDR:DSA",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "DSS",
                    "cabin_type": "DSS: Dream Suite",
                    "cabin_type_en": "DSS: Dream Suite",
                    "cabin_type_zh-Hans": "DSS: 星梦套房",
                    "cabin_type_zh-Hant": "DSS: 星夢套房",
                    "key": "WDR:DSS",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "ISA",
                    "cabin_type": "ISA: Inside Stateroom",
                    "cabin_type_en": "ISA: Inside Stateroom",
                    "cabin_type_zh-Hans": "ISA: 内侧客房",
                    "cabin_type_zh-Hant": "ISA: 內側客房",
                    "key": "WDR:ISA",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "ISS",
                    "cabin_type": "ISS: Inside Stateroom",
                    "cabin_type_en": "ISS: Inside Stateroom",
                    "cabin_type_zh-Hans": "ISS: 内侧客房",
                    "cabin_type_zh-Hant": "ISS: 內側客房",
                    "key": "WDR:ISS",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "OSA",
                    "cabin_type": "OSA: Oceanview Stateroom",
                    "cabin_type_en": "OSA: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "OSA: 海景客房",
                    "cabin_type_zh-Hant": "OSA: 海景客房",
                    "key": "WDR:OSA",
                    "ship_code": "World Dream"
                },
                {
                    "cabin_code": "OSS",
                    "cabin_type": "OSS: Oceanview Stateroom",
                    "cabin_type_en": "OSS: Oceanview Stateroom",
                    "cabin_type_zh-Hans": "OSS: 海景客房",
                    "cabin_type_zh-Hant": "OSS: 海景客房",
                    "key": "WDR:OSS",
                    "ship_code": "World Dream"
                }
            ]
        }
    },
    methods: {
        getPara: function() {
            var url = this.$route.path.split("/");
            for (var u in url) {
                if (url[u] == "" || url[u] == null) continue;
                this.urlPara.push(url[u]);
            }
        },
        queryParser: function(urlPara) {
            var url = new URL(urlPara)
            url = url.search.substr(1);

            var url = url.split('&');
            if (url.slice(-1) == "&") {
                url = url.slice(0, -1);
            }

            var res = {};
            console.log(url);

            for (var u in url) {
                var carbon = url[u];

                if (carbon.indexOf("=") === -1) {
                    // ignore empty parameter
                    continue;
                }

                var carbon = carbon.split("=");
                carbon[0] = decodeURI(carbon[0]);
                carbon[1] = decodeURI(carbon[1]);

                if (carbon[0].indexOf("[") !== -1 && carbon[0].indexOf("]") !== -1) {
                    carbon[0] = carbon[0].replace(/\[(.*)\]/g, "");
                    if (res[carbon[0] + "[]"] === undefined) {
                        res[carbon[0] + "[]"] = [];
                    }
                    res[carbon[0] + "[]"].push(carbon[1]);
                } else {
                    res[carbon[0]] = carbon[1];
                }
            }
            return res;
        },
        buildParameter(para) {
            var res = "";

            for (var c in para) {
                if (Array.isArray(para[c])) {
                    for (var ac in para[c]) {
                        res += c + "=" + para[c][ac] + "&";
                    }
                } else {
                    res += c + "=" + para[c] + "&";
                }
            }

            return res;
        },
        retrivePortData: function(port) {
            var myport = null;
            for (var i in this.portData) {
                if (this.portData[i].location_code !== port) continue;
                myport = i;
            }
            return myport;
        },
        retriveShipData: function(shipcode) {
            for (var i in this.shipData) {
                if (this.shipData[i].ship_code !== shipcode) continue;
                return this.shipData[i].en;
            }
            return shipcode;
        },
        retriveCabinData: function(cabin) {
            for (var c in this.cabinData) {
                if (this.cabinData[c].cabin_code !== cabin) continue;
                return this.cabinData[c].cabin_type;
            }
            return cabin;
        },
        dateParser: function(date) {
            var date_arr = date.split('/');
            var month_number = parseInt(date_arr[0]);
            var month_year = date_arr[1];

            var months = [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ];

            return months[month_number - 1] + ' ' + month_year;
        }
    },
    created() {
        this.getPara();
    },
    router
});