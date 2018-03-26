<template>
    <div>
        <div>
            <template v-if="cruise.cruiseid!==undefined && cruise.cruiseid!==''">
                <cabin-cruise-info
                    :cruiseid="cruise.cruiseid"
                ></cabin-cruise-info>
            </template>
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
                                    
                                    <template v-for="(c, index) in cabins">
                                  
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
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cabins: [],
                cruise: {}
            }
        },
        methods: {
            searchNow: function() {
                this.$router.push({ name: 'redeem' })
            },
            loadCabin: function() {
                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/cruise/get_cabin_prices?cruise_id='+this.cruise.cruiseid+'&pax='+this.cruise.pax,
                    method: 'get'
                }).then((res) => {
                    ths.cabins = res.data;
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
                this.selectPayment(index, "cc");
            },
            useGP: function(index) {
                this.selectPayment(index, "gp");
            },
            useCash: function(index) {
                this.selectPayment(index, "cash");
            },
            selectPayment: function(index, type) {
                this.cruise.ptype = type;
                this.cruise.cabin = this.cabins[index].cabin_type_code;

                this.$cookie.set('cruise', JSON.stringify(this.cruise), 1);
                this.$router.push({ name: 'redeem.cabin.subsequence'});
            }
        },
        created() {
            var ths = this;

            eventHub.$on('searchCruise', function() {
                ths.searchNow();
            });
        },
        mounted() {
            var cruise = this.$cookie.get('cruise');

            if(cruise===null) {
                this.$router.push({ name: 'redeem' });
                return false;
            }

            cruise = JSON.parse(cruise);
            this.cruise = cruise;

            this.loadCabin();
        }
    }
</script>