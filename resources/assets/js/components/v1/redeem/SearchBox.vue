<template>
    <article id="redeem-search-header-section">
        <div class="container-fluid has-breakpoint">
            <div class="row">
                <div class="col-md-12">

                    <div id="redeem-search-header">

                        <div id="redeem-search-header-title">
                            <h2>Plan your cruise</h2>
                        </div>

                        <form id="itinerary-search-form" class="default-form simple-form-check-02 ajax-version api-version" v-on:submit.prevent="sendSearchData">
                            <div class="row">
                                <div class="col-md-10">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Departing From</label>
                                                <input type="text" name="port" v-model="showPort" disabled>
                                            </div>

                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label>Month & Year</label>
                                                <input type="text" name="date" v-model="showDate" disabled>
                                            </div>

                                        </div>
                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <label>Pax</label>
                                                <input type="text" name="pax" value="" v-model="paxCount" disabled>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-2">

                                    <div class="cta-container">
                                        <a href="javascript:void(0);" v-on:click="sendSearchData" class="square-cta full-width-version form-check-submit-btn">Search</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </form> <!-- itinerary-search-form -->
                    
                    </div> <!-- redeem-search-header -->

                    <div class="row">
                        <div class="col-md-10">
                            <div id="redeem-search-header-expanded">

                                <div class="row">
                                    <div class="col-md-6">

                                        <div id="redeem-search-valid-departure-ports" class="redeem-search-options">
                                            <template  v-for="(po, index) in port">
                                                <p v-bind:key="index" :class="{'selected' : po.checked===true }" v-on:click.prevent="selectFilterPort(index)">
                                                    {{ $root.portData[po.data].en }}
                                                </p>
                                            </template>
                                        </div> <!-- redeem-search-valid-departure-ports -->

                                    </div>
                                    <div class="col-md-4">

                                        <div id="redeem-search-valid-departure-dates" class="redeem-search-options">
                                            <template v-for="(d, index) in date">
                                                <p v-bind:key="index" :class="{'selected' : d.checked===true }" v-on:click.prevent="selectFilterDate(index)">{{ d.placeHolder }}</p>
                                            </template>
                                        </div> <!-- redeem-search-valid-departure-dates -->

                                    </div>

                                    <div class="col-md-2">

                                        <div id="redeem-search-valid-pax">

                                            <div class="form-group">
                                                <label>Adult</label>
                                                <div class="number-plus-minus" id="redeem-search-valid-pax-adult">
                                                    <div class="number-minus" v-on:click="removeAdult"></div>
                                                    <div class="number-value">{{ adult }}</div>
                                                    <div class="number-add" v-on:click="addAdult"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Child</label>
                                                <div class="number-plus-minus" id="redeem-search-valid-pax-child">
                                                    <div class="number-minus" v-on:click="removeChild"></div>
                                                    <div class="number-value">{{ child }}</div>
                                                    <div class="number-add" v-on:click="addChild"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Infant</label>
                                                <div class="number-plus-minus" id="redeem-search-valid-pax-infant">
                                                    <div class="number-minus" v-on:click="removeInfant"></div>
                                                    <div class="number-value">{{ infant }}</div>
                                                    <div class="number-add" v-on:click="addInfant"></div>
                                                </div>
                                            </div>
                                        </div> <!-- redeem-search-valid-pax -->

                                    </div>
                                </div>
                            </div> <!-- redeem-search-header-expanded -->
                        </div> <!-- col-md-10 -->
                    </div> <!-- row -->
                </div> <!-- col-md-12 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </article> <!-- redeem-search-header-section -->
</template>

<script>
export default {
    data() {
        return {
            raw: [],
            port: {},
            date: [],
            adult: 1,
            child: 0,
            infant: 0
        }
    },
    computed: {
        showPort: function() {
            var res = "";
            for(var i in this.port) {
                if(this.port[i].checked===false) continue;
                res = this.$root.portData[this.port[i].data].location_code;
                break;
            }  
            return res;
        },
        showDate: function() {
            var res = "";
            for(var i in this.date) {
                if(this.date[i].checked===false) continue;
                res = this.date[i].placeHolder;
                break;
            }  
            return res;
        },
        paxCount: function() {
            var res = "";
            for(var i=0; i<this.adult; i++) {
                res = res +"A";
            }
            for(var i=0; i<this.child; i++) {
                res = res +"C";
            }
            for(var i=0; i<this.infant; i++) {
                res = res +"J";
            }
            return res;
        }
    },
    methods: {
        addAdult: function() {
            if((this.adult+this.child+this.infant)<4){
                this.adult++;
            }
        },
        removeAdult: function() {
            if(this.adult>1){
                this.adult--;
            }
        },
        addChild: function() {
            if((this.adult+this.child+this.infant)<4){
                this.child++;
            }
        },
        removeChild: function() {
            if(this.child>0){
                this.child--;
            }
        },
        addInfant: function() {
            if((this.adult+this.child+this.infant)<4){
                this.infant++;
            }
        },
        removeInfant: function() {
            if(this.infant>0){
                this.infant--;
            }
        },
        selectFilterPort: function(index) {
            this.port[index].checked = true;
            console.log(index);
            for(var i in this.port){
                if(i.toString()!=index){
                    this.port[i].checked = false;
                    console.log("no Matched");
                }else{
                    console.log("I'm matched!");
                }
            }
        },
        selectFilterDate: function(index) {
            this.date[index].checked = true;
            for(var i in this.date){
                if(i!=index){
                    this.date[i].checked = false;
                }
            }
        },
        sendSearchData: function(){
            var port = "";
            for(var i in this.port) {
                if(this.port[i].checked===false) continue;
                port = this.$root.portData[this.port[i].data].location_code;
                break;
            }  
        
            var time = "";
            for(var i in this.date) {
                if(this.date[i].checked===false) continue;
                time = this.date[i].value;
                break;
            }  
        
            var adultC = 0;
            var childC = 0;
            var infantC = 0;

            var res = "";
            for(var i=0; i<this.adult; i++) {
                res = res +"A";
                adultC++;
            }
            for(var i=0; i<this.child; i++) {
                res = res +"C";
                childC++;
            }
            for(var i=0; i<this.infant; i++) {
                res = res +"J";
                infantC++;
            }

            this.$root.redeemSearch.port = port;
            this.$root.redeemSearch.time = time;
            this.$root.redeemSearch.pax = {
                adult: adultC,
                child: childC,
                infant: infantC,
                total: res
            };
            eventHub.$emit('searchCruise');    
        },
        getParameter: function() {
            var ths = this;
            axios({
                url: this.$root.apiEndpoint+"/cruise/get_valid_search_parameters",
                method: "get"
            }).then((res) => {
                var portCon = {};
                ths.raw = res.data;

                for(var i in res.data) {
                    var newDate = true;
                    var portDate = true;

                    var date = {
                        value: res.data[i].mon_year,
                        placeHolder: ths.$root.dateParser(res.data[i].mon_year),
                    };

                    if(portCon.hasOwnProperty(res.data[i].port)===false){
                        var check = ths.$root.retrivePortData(res.data[i].port);
                        if(check===null) continue;

                        var selected = false;

                        if(ths.$root.redeemSearch.port==res.data[i].port){
                            selected = true;
                        }

                        portCon[res.data[i].port] = {
                            data: check,
                            date: [],
                            checked: selected
                        };
                    }
                    
                    for(var d in portCon[res.data[i].port].date){
                        if(portCon[res.data[i].port].date[d].value!==res.data[i].mon_year) continue;
                        portDate = false;
                        break;
                    }
                    
                    if(portDate){
                        portCon[res.data[i].port].date.push(date);
                    }

                    for(var d in ths.date){
                        if(ths.date[d].value!==res.data[i].mon_year) continue;
                        newDate = false;
                        break;
                    }

                    if(newDate){
                        var selected = false;

                        if(ths.$root.redeemSearch.time==res.data[i].mon_year){
                            selected = true;
                        }

                        date.checked = selected;
                        ths.date.push(date);
                    }
                }

                ths.port = portCon;
            }).catch((err) => {
                
            });
        },
        isPortExists: function(port){
            for(var i in this.port) {
                if(i!==port) continue;
                return true;
            }
            return false;
        }
    },
    created() {
        this.adult = this.$root.redeemSearch.pax.adult===0 ? 1 : this.$root.redeemSearch.pax.adult;
        this.child = this.$root.redeemSearch.pax.child;
        this.infant = this.$root.redeemSearch.pax.infant;
        var res = "";
        for(var i=0; i<this.adult; i++) {
            res = res +"A";
        }
        for(var i=0; i<this.child; i++) {
            res = res +"C";
        }
        for(var i=0; i<this.infant; i++) {
            res = res +"J";
        }
        this.$root.redeemSearch.pax.total = res;
        this.getParameter();
    }
}
</script>