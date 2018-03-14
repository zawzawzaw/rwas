/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

/*
 * Vue component list
 */

import App from './components/v1/App';
import RedeemSearch from './components/v1/redeem/SearchBox';
import RedeemSearchList from './components/v1/redeem/SearchList';
import CabinList from './components/v1/redeem/CabinList';
import CabinCruiseInfoHeader from './components/v1/redeem/cabin/CabinHeader';
import CabinSummery from './components/v1/redeem/CabinSummery';
import CheckoutGuest from './components/v1/redeem/CheckoutGuest';
import CabinThankYou from './components/v1/redeem/CabinThankYou';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: '/api/public',
    routes: [{
        path: '/redeem',
        name: 'redeem',
        component: RedeemSearchList
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax',
        name: 'redeem.cabin',
        component: CabinList
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax/:cabin',
        name: 'redeem.cabin.summery',
        component: CabinSummery
    }, {
        path: '/redeem/cabin/:cruiseid/:date/:pax/:cabin/checkout',
        name: 'redeem.cabin.checkout',
        component: CheckoutGuest
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