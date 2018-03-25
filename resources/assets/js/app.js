/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
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
import CabinSubsequence from './components/v1/redeem/CabinSubsequence';
import CabinSummery from './components/v1/redeem/CabinSummery';
import CheckoutGuest from './components/v1/redeem/CheckoutGuest';
import Payment from './components/v1/redeem/Payment';
import CabinThankYou from './components/v1/redeem/CabinThankYou';

Vue.use(Vuex);
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
            path: 'cabin',
            name: 'redeem.cabin',
            component: CabinList
        }]
    }, {
        path: '/redeem/cabin/subsequence',
        name: 'redeem.cabin.subsequence',
        component: CabinSubsequence
    }, {
        path: '/redeem/cabin/summery',
        name: 'redeem.cabin.summery',
        component: CabinSummery
    }, {
        path: '/redeem/cabin/checkout',
        name: 'redeem.cabin.checkout',
        component: CheckoutGuest
    }, {
        path: '/redeem/cabin/payment',
        name: 'redeem.cabin.payment',
        component: Payment
    }, {
        path: '/redeem/cabin/thankyou',
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

const store = new Vuex.Store({
    state: {
      count: 0
    },
    mutations: {
      increment (state) {
        state.count++
      }
    }
});

router.beforeEach((to, from, next) => {
    // document.title = to.meta.title
    document.title = "Resorts World at Sea";
    store.commit('increment')

    console.log(store.state.count)
    next();
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
            portData: [],
            shipData: [],
            cabinData: []
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
        },
        getPort: function() {
            var ths = this;
            axios({
                url: this.apiEndpoint+"/api/info/port"
            }).then((res) => {
                ths.portData = res.data;
            });
        },
        getShip: function() {
            var ths = this;
            axios({
                url: this.apiEndpoint+"/api/info/ship"
            }).then((res) => {
                ths.shipData = res.data;
            });
        },
        getCabin: function() {
            var ths = this;
            axios({
                url: this.apiEndpoint+"/api/info/cabin"
            }).then((res) => {
                ths.cabinData = res.data;
            });
        },
        inputValidate: function(e, type) {

            if(type===undefined) {
                type = "";
            }

            var status = true;

            console.log(e);
            var key = e.key;

            var te;

            switch(type) {
                case "alpha":
                    te = /^[a-z]+$/i;
                    break
                
                case "numeric":
                    te = /^[\d]+$/i;
                    break;

                default:
                    te = /^[a-z\d\ ]+$/i;
                    break;
            }

            var tt = te.test(key);
            console.log(tt);
            
            if(tt===false){
                e.preventDefault();
            }

            return tt;
        
        }
    },
    created() {
        this.getPort();
        this.getShip();
        this.getCabin();
        this.getPara();
    },
    router
});