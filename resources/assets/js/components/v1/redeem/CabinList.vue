<template>
    <div>
        <div>
            <cabin-cruise-info></cabin-cruise-info>
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
                                                        <template v-if="c.price.cc>0">
                                                            <router-link :to="{ name: 'redeem.cabin.summery', params: {cruiseid: $route.params.cruiseid, date: $route.params.date, pax: $route.params.pax, cabin: c.cabin_type_code}, query: {cc: c.price.cc} }">
                                                                {{ c.price.cc }} CC
                                                            </router-link>
                                                            &nbsp;&nbsp;
                                                        </template>
                                                        <template v-else>
                                                            <router-link :to="{ name: 'redeem.cabin.summery', params: {cruiseid: $route.params.cruiseid, date: $route.params.date, pax: $route.params.pax, cabin: c.cabin_type_code}, query: {gp: c.price.gp} }">
                                                                {{ c.price.gp }} GP
                                                            </router-link>
                                                            &nbsp;&nbsp;
                                                        </template>
                                                        <router-link :to="{ name: 'redeem.cabin.summery', params: {cruiseid: $route.params.cruiseid, date: $route.params.date, pax: $route.params.pax, cabin: c.cabin_type_code}, query: {cash: c.price.cash} }">
                                                            {{ c.price.cash }} SGD
                                                        </router-link>
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
                cabins: []
            }
        },
        methods: {
            searchNow: function() {
                this.$router.push({ name: 'redeem' })
            },
            loadCabin: function() {
                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/cruise/get_cabin_prices?cruise_id='+this.$route.params.cruiseid+'&pax='+this.$route.params.pax,
                    method: 'get'
                }).then((res) => {
                    ths.cabins = res.data;
                }).catch((err) => {

                });
            }
        },
        created() {
            this.loadCabin();

            var ths = this;

            eventHub.$on('searchCruise', function() {
                ths.searchNow();
            });
        }
    }
</script>