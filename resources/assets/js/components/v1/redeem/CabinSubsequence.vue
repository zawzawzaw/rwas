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
                                    <div class="redeem-cabin-container">
                                        <div class="col-md-2 redeem-cabin-pax">{{ showPax }} PAX</div>
                                        <div class="col-md-10 redeem-cabin-info">
                                            <div class="row redeem-cabin-container-inner-section has-border-bottom">
                                                <div class="col-md-7 col-md-offset-1">Cabin Type</div>
                                                <div class="col-md-4">Redemption Rate</div>
                                            </div>
                                            <div class="row redeem-cabin-container-inner-section">
                                                <div class="col-md-7 col-md-offset-1">
                                                    <template v-if="cabin.cabin_type_code!==undefined">
                                                    {{ $root.retriveCabinData(cabin.cabin_type_code) }}
                                                    </template>
                                                </div>
                                                <div class="col-md-4">
                                                    {{ showPrice }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <template v-for="(s, index) in subCabin">
                                        <div class="redeem-cabin-container" v-bind:key="index">
                                            <div class="col-md-2 redeem-cabin-pax">{{ showPax }} PAX</div>
                                            <div class="col-md-10 redeem-cabin-info">
                                                <div class="row redeem-cabin-container-inner-section has-border-bottom">
                                                    <div class="col-md-7 col-md-offset-1">Cabin Type</div>
                                                    <div class="col-md-4">Redemption Rate</div>
                                                </div>
                                                <div class="row redeem-cabin-container-inner-section">
                                                    <div class="col-md-7 col-md-offset-1">
                                                        <template v-if="cabin.cabin_type_code!==undefined">
                                                        {{ $root.retriveCabinData(s.cabin) }}
                                                        </template>
                                                    </div>
                                                    <div class="col-md-4">
                                                        {{ s.value+" "+s.suffix }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            
            <article>
                <div class="container-fluid has-breakpoint">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="redeem-subsequence-cabin-search">
                                <div class="col-md-12">
                                    <div id="redeem-cabin-type-subsequent-cabin-form-container">
                                        <div id="redeem-cabin-type-subsequent-cabin-form">
                                            <template v-if="subsequenceCheck">
                                                <p>Checking eligible subsequent cabin</p>
                                            </template>
                                            <template v-else>
                                                <template v-if="(subNum-subCabin.length)>0">
                                                    <p class="pretend-text">Your are eligible for {{ subNum-subCabin.length }} subsequent cabin redemption</p>
                                                    <p>No of pax for the subsequent cabin</p>
                                                </template>
                                                <template v-else>
                                                    <p class="pretend-text">You have used all subsequent cabin</p>
                                                </template>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <template v-if="subsequenceCheck===false && subCabinList.length===0 && subNum>0">  
                                            <div class="subpax-selector">
                                                <label>PAX</label>
                                                <input type="text" :value="showPax" disabled/>
                                            </div>
                                            <button class="subpax-btn" v-on:click="loadCabin">Search</button>
                                        </template>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="proceedCheckOut" v-on:click="proceedCheck">
                                            Proceed to checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            
            <template  v-if="subCabinList.length>0">
                <div class="space100"></div>
                <article id="redeem-cabin-type-option-section">
                    <div class="container-fluid has-breakpoint">
                        <div class="row">
                            <div class="col-md-12">

                                <div id="redeem-cabin-type-option">


                                    <div id="redeem-cabin-type-option-header">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <p>Cabin Type</p>
                                            </div>
                                            <div class="col-md-3">
                                                <p>Redemption Rate</p>
                                            </div>
                                        </div>
                                    </div> <!-- redeem-cabin-type-option-header -->

                                    <div id="redeem-cabin-type-option-item-container">
                                        
                                        <template v-for="(c, index) in subCabinList">
                                    
                                            <div v-bind:key="index" class="redeem-cabin-type-option-item">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <p>{{ $root.retriveCabinData(c.cabin_type_code) }}</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p>                                             
                                                            <template v-if="c.price.cc>0 && c.price.cc<c.price.ownCC">
                                                                <a href="javascript:void(0);" v-on:click="useCC(index)">
                                                                    {{ c.price.cc }} CC
                                                                </a>
                                                                &nbsp;&nbsp;
                                                            </template>
                                                            <template v-else>
                                                                <a href="javascript:void(0);" v-on:click="useGP(index)">
                                                                    {{ c.price.gp }} GP
                                                                </a>
                                                                &nbsp;&nbsp;
                                                            </template>
                                                            <a href="javascript:void(0);" v-on:click="useCash(index)">
                                                                {{ c.price.cash }} SGD
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </template>

                                    </div> <!-- redeem-cabin-type-option-item-container -->

                                </div> <!-- redeem-cabin-type-option -->

                            </div>
                        </div>
                    </div>
                </article>
            </template>

        </template>
        <div class="space100"></div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ccValue: 0,
                cabin: {},
                cruise: {},
                subCabinList: [],
                subCabin: [],
                subsequenceCheck: true,
                subNum: 0
            }
        },
        computed: {
            showPrice: function() {
                // if(this.cabin.price===undefined) {
                //     return "";
                // }

                var price = this.cruise.dprice;

                switch (this.cruise.ptype) {
                    case "cc":
                        // price = this.cabin.price.cc + " CC";
                        price = price + " CC";
                        break;
                
                    case "gp":
                        // price = this.cabin.price.gp + " GP";
                        price = price + " GP";
                        break;

                    default:
                        // price = this.cabin.price.cash + " SGD";
                        price = price + " SGD";
                        break;
                }

                return price;
            },
            showPax: function() {
                return this.cruise.pax.length;
            }
        },
        methods: {
            loadCabinInfo: function(cabin){
                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/cruise/get_single_cabin_prices?cruise_id='+this.cruise.cruiseid+'&pax='+this.cruise.pax+'&cabin_code='+cabin,
                    method: 'get'
                }).then((res) => {
                    ths.cabin = res.data;
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
            checkSubsequent: function(){
                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/user/available-subsequent'
                }).then((res) => {
                    ths.subNum = res.data.subsequent;
                    ths.subsequenceCheck = false;
                }).catch((err) => {
                    alert("Failed to load eligible subsequent cabin! Refresh the browser and try again!");
                });
            },
            loadCabin: function() {
                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/cruise/get_cabin_prices?cruise_id='+this.cruise.cruiseid+'&pax='+this.cruise.pax,
                    method: 'get'
                }).then((res) => {
                    ths.subCabinList = res.data;
                }).catch((err) => {
                    if(err.response.status!== undefined) {
                        if(err.response.status===422) {
                            if(err.response.data.status="404") {
                                alert("Invalid cruise id! You will redirect to search page in a few second!");
                                setTimeout(function() {
                                    ths.$router.push({ name: 'redeem' });
                                }, 500);
                            }
                        }
                    }
                });
            },
            useCC: function(index) {
                this.selectPayment(index, "cc", this.subCabinList[index].price.cc, "CC");
            },
            useGP: function(index) {
                this.selectPayment(index, "gp", this.subCabinList[index].price.gp, "GP");
            },
            useCash: function(index) {
                this.selectPayment(index, "cash", this.subCabinList[index].price.cash, "SGD");
            },
            selectPayment: function(index, type, value, suffix) {

                this.subCabin.push({
                    cabin: this.subCabinList[index].cabin_type_code,
                    ptype: type,
                    suffix: suffix.toUpperCase(),
                    value: value,
                    pax: this.cruise.pax
                });

                this.subCabinList = [];
            },
            proceedCheck: function() {
                for(var i in this.subCabin) {
                    this.cruise.subsequence.push({
                        cabin: this.subCabin[i].cabin,
                        ptype: this.subCabin[i].ptype,
                        dprice: this.subCabin[i].value,
                        pax: this.subCabin[i].pax
                    });
                }

                this.$cookie.set('cruise', JSON.stringify(this.cruise), 1);
                this.$router.push({ name: 'redeem.cabin.summery' });
            },
            loadUserInfo: function() {

            }
        },
        created() {
            this.ccValue = Math.floor((Math.random() * 22) + 8);
            this.$root.refreshCheckout = true;
        },
        mounted() {
            var cruise = this.$cookie.get('cruise');
            cruise = JSON.parse(cruise);

            if(cruise===null) {
                this.$router.push({ name: 'redeem' });
                return false;
            }

            if(cruise.cabin===null || cruise.ptype===null) {
                this.$router.push({ name: 'redeem.cabin' });
                return false;
            }

            this.cruise = cruise;
            this.cruise.subsequence = [];
            this.checkSubsequent();
            this.loadCabinInfo(this.cruise.cabin);

        }
    }
</script>