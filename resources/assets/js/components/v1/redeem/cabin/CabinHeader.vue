<template>
    <article id="redeem-cabin-type-header-section">
        <div class="container-fluid has-breakpoint">
            <div class="row">
                <div class="col-md-12">

                <div id="redeem-cabin-type-header">
                    <div class="row">
                        <div class="col-md-4">

                            <div id="redeem-cabin-type-header-itinerary-info">
                            <p>{{ ship.duration }}</p>
                            <p>
                                {{ ship.dep_port }}
                                <template v-if="ship.dep_port!==ship.arr_port">
                                 - {{ ship.arr_port }}
                                </template>
                            </p>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div id="redeem-cabin-type-header-ship-info">
                            <p>Ship Info.</p>
                            <p>{{ ship.shipCom }}</p>
                            </div>

                        </div>
                        <!-- <div class="col-md-2">

                            <div id="redeem-cabin-type-header-ship-logo">
                            <p>insert logo</p>
                            </div>

                        </div> -->
                        <div class="col-md-3 col-md-offset-2">
                            
                            <div id="redeem-cabin-type-header-departure-date">
                            <p>Departure Date.</p>
                            <p>{{ ship.dep_date }}</p>
                            </div>

                        </div>
                    </div>
                </div> <!-- redeem-cabin-type-header -->



                </div> <!-- col-md-12 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </article>
</template>

<script>
    export default {
        props: {
            cruiseid: {
                type: String,
                default: ""
            }
        },
        data() {
            return {
                ship: []
            }
        },
        methods: {
            loadCruiseInfo: function(){
                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+'/cruise/get_cruise_info_for_cabin?cruise_id='+this.cruiseid,
                    method: 'get'
                }).then((res) => {
                    var data = res.data;
                    data['shipCom'] = ths.$root.retriveShipData(data.ship_code);
                    data['dep_port'] = ths.$root.portData[ths.$root.retrivePortData(data['dep_port'])].en;
                    data['arr_port'] = ths.$root.portData[ths.$root.retrivePortData(data['arr_port'])].en;
                    ths.ship = data;
                }).catch((err) => {

                });
            },
        },
        mounted() {
            this.loadCruiseInfo();
        }
    }
</script>