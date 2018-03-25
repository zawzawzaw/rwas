<template>
    <div>

        <template v-if="cruise.cruiseid!==undefined && cruise.cruiseid!==''">
            <cabin-cruise-info
                :cruiseid="cruise.cruiseid"
            ></cabin-cruise-info>

            <article id="redeem-cabin-summery-section">
                <div class="container-fluid has-breakpoint">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="redeem-cabin-container" v-for="(c,index) in cabins" v-bind:key="index">
                                        <div class="col-md-2 redeem-cabin-pax">{{ c.pax.length }} PAX</div>
                                        <div class="col-md-10 redeem-cabin-info">
                                            <div class="row redeem-cabin-container-inner-section has-border-bottom">
                                                <div class="col-md-7 col-md-offset-1">Cabin Type</div>
                                                <div class="col-md-4">Redemption Rate</div>
                                            </div>
                                            <div class="row redeem-cabin-container-inner-section">
                                                <div class="col-md-7 col-md-offset-1">{{ $root.retriveCabinData(c.cabin) }}</div>
                                                <div class="col-md-4">
                                                    <template v-if="c.priceLoad!==-1">
                                                        {{ showPrice(index) }}
                                                    </template>
                                                    <template v-else>
                                                        Loading...
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            
            <article id="redeem-cabin-summery-section">
                <div class="container-fluid has-breakpoint">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="redeen-cabin-summery-checkout">
                                <div class="col-md-2 redeem-cabin-checkout-total">Total</div>
                                <div class="col-md-6 redeem-cabin-checkout-amount">
                                    {{ showTotalPrice }}
                                </div>
                                <div class="col-md-4">
                                    <div id="redeem-cabin-type-checkout-cta-container">
                                        <router-link :to="{ name: 'redeem.cabin.checkout'}" class="square-cta large-version full-width-version" id="redeem-cabin-type-checkout-cta">
                                            Proceed To Checkout
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </template>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ccValue: 0,
                cruise: {},
                cabins: []
            }
        },
        computed: {
            showTotalPrice: function() {
                var price = "";
                var cc = 0;
                var gp = 0;
                var cash = 0;
                for(var index in this.cabins){
                    switch (this.cabins[index].ptype) {
                        case "cc":
                            cc = cc+parseInt(this.cabins[index].price.cc);
                            break;

                        case "gp":
                            gp = gp+parseInt(this.cabins[index].price.gp);
                            break;
                    
                        default:
                            cash = cash+parseInt(this.cabins[index].price.cash);
                            break;
                    }
                }

                if(cc>0) {
                    price = cc + " CC";
                }

                if(gp>0){
                    if(price!=="") price = price + " + ";
                    price = price + gp + " GP";
                }

                if(cash>0){
                    if(price!=="") price = price + " + ";
                    price = price + cash + " SGD";
                }

                return price==="" ? "Loading" : price;
            }  
        },
        methods: {
            loadCabinInfo: function() {
                var sec = -1;
                for(var i in this.cabins) {
                    if(this.cabins[i].priceLoad!==-1) continue;
                    sec = i;
                    break;
                }

                if(sec===-1) {
                    return false;
                }

                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/cruise/get_single_cabin_prices?cruise_id='+this.cruise.cruiseid+'&pax='+this.cruise.pax+'&cabin_code='+this.cabins[sec].cabin,
                    method: 'get'
                }).then((res) => {
                    ths.cabins[sec].price = res.data.price;
                    ths.cabins[sec].priceLoad = 1;
                    ths.loadCabinInfo();
                }).catch((err) => {
                    // if(err.response.status!== undefined) {
                    //     if(err.response.status===422) {
                    //         if(err.response.data.status="404") {
                    //             alert("Invalid cruise id! You will redirect to search page in a few second!");
                    //             setTimeout(function() {
                    //                 ths.$router.push({ name: 'redeem' });
                    //             }, 500);
                    //         }
                    //     }
                    // }
                });
            },
            showPrice: function(index) {
                var price = "";
                switch (this.cabins[index].ptype) {
                    case "cc":
                        price = this.cabins[index].price.cc+ " CC";
                        break;

                    case "gp":
                        price = this.cabins[index].price.gp+ " GP";
                        break;
                
                    default:
                        price = this.cabins[index].price.cash+ " SGD";
                        break;
                }
                return price;
            }
        },
        created() {
            this.ccValue = Math.floor((Math.random() * 22) + 8);
            this.$root.refreshCheckout = true;
        },
        mounted() {
            var cruise = this.$cookie.get('cruise');

            if(cruise===null) {
                this.$router.push({ name: 'redeem' });
                return false;
            }

            if(cruise.cabin===null || cruise.ptype===null) {
                this.$router.push({ name: 'redeem.cabin' });
                return false;
            }

            cruise = JSON.parse(cruise);
            this.cruise = cruise;

            var selectedCabins = [];

            selectedCabins.push({
                cabin: cruise.cabin,
                ptype: cruise.ptype,
                pax: cruise.pax,
                price: {},
                priceLoad: -1
            });

            if(cruise.subsequence.length>0) {
                for(var i in cruise.subsequence) {
                    selectedCabins.push({
                        cabin: cruise.subsequence[i].cabin,
                        ptype: cruise.subsequence[i].ptype,
                        pax: cruise.subsequence[i].pax,
                        price: {},
                        priceLoad: -1
                    });
                }
            }

            this.cabins = selectedCabins;
            this.loadCabinInfo();
        }
    }
</script>