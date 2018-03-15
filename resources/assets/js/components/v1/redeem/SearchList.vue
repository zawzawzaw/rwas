<template>
    <div>
        <article id="redeem-search-result-section">
            <div class="container-fluid has-breakpoint">
                <div class="row">
                    <div class="col-md-12">

                        <div id="redeem-search-result">

                            <div class="redeem-search-result-item" v-for="(i, index) in itinerary" v-bind:key="index">
                                <div class="item-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="itinerary-name">{{ i.iten_code }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="ship-name">{{ $root.retriveShipData(i.ship_code) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h4>Departure Date</h4>
                                    <div class="item-date-container">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-4 col-xs-6" v-for="(c, cindex) in i.cruise_array" v-bind:key="cindex">
                                                
                                                <router-link :to="{ name: 'redeem.cabin', params: {cruiseid: c.cruise_id, date: c.departure_date.replace(/\//g, '-'), pax: $root.redeemSearch.pax.total} }" class="item-date" >
                                                    <div class="item-date-header">
                                                    <h6>{{ parseDate(index, cindex) }}</h6>
                                                    </div>
                                                    <div class="item-date-price">
                                                        <p>From</p>
                                                        <div class="price">
                                                            <span class="number">{{ c.cheapest_cabin.gp }}</span>
                                                            <span class="currency">GP</span>
                                                        </div>
                                                    </div>
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- redeem-search-result -->

                    </div> <!-- col-md-12 -->
                </div> <!-- row -->
            </div> <!-- container-fluid -->
        </article> <!-- redeem-search-result-section -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                itinerary: []
            }
        },
        methods: {
            searchNow: function(){
                var ths = this;
                var links = "";

                axios({
                    url: this.$root.apiEndpoint+"/cruise/get_itineraries?port="+this.$root.redeemSearch.port+"&date="+this.$root.redeemSearch.time+"&pax="+this.$root.redeemSearch.pax.total,
                }).then((res) => {
                    ths.itinerary = res.data.data;
                }).catch((err) => {

                });
            },
            parseDate: function(index, cindex){
                var date_arr = this.itinerary[index].cruise_array[cindex].departure_date.split('/');
                var month_number = parseInt(date_arr[1]);
                var month_year = date_arr[2];
            
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
                
                return date_arr[0] + ' ' + months[month_number-1] + ' ' + month_year;
            }
        },
        created() {
            var ths = this;
            this.searchNow();

            eventHub.$on('searchCruise', function(){
                ths.searchNow();
            });
        }
    }
</script>