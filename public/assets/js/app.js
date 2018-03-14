
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

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes: [{
        path: '/',
        name: 'home',
        component: RedeemSearch
    }]
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
});

window.eventHub = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app', App);

const app = new Vue({
    el: '#app',
    data() {
        return {
            urlPara: []
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
        }
    },
    created() {
        this.getPara();
    },
    router
});
