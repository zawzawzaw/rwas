<template>
    <div>
        <cabin-cruise-info></cabin-cruise-info>
        
        <article id="redeem-cabin-summery-section">
            <div class="container-fluid has-breakpoint">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="redeem-cabin-container">
                                    <div class="col-md-2 redeem-cabin-pax">{{ $route.params.pax.length }} PAX</div>
                                    <div class="col-md-10 redeem-cabin-info">
                                        <div class="row redeem-cabin-container-inner-section has-border-bottom">
                                            <div class="col-md-7 col-md-offset-1">Cabin Type</div>
                                            <div class="col-md-4">Redemption Rate</div>
                                        </div>
                                        <div class="row redeem-cabin-container-inner-section">
                                            <div class="col-md-7 col-md-offset-1">{{ $route.params.cabin }}</div>
                                            <div class="col-md-4">{{ ccValue }} cc&nbsp;&nbsp;&nbsp;100 GP</div>
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
                            <div class="col-md-6 redeem-cabin-checkout-amount">{{ ccValue }} cc&nbsp;&nbsp;&nbsp;100 GP</div>
                            <div class="col-md-4">
                                <div id="redeem-cabin-type-checkout-cta-container">
                                    <router-link :to="{ name: 'redeem.cabin.checkout', params: {
                                        cruiseid: $route.params.cruiseid,
                                        date: $route.params.date,
                                        pax: $route.params.pax,
                                        cabin: $route.params.cabin
                                    } }" class="square-cta large-version full-width-version" id="redeem-cabin-type-checkout-cta">
                                        Proceed To Checkout
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ccValue: 0
            }
        },
        created() {
            this.ccValue = Math.floor((Math.random() * 22) + 8);
            this.$root.refreshCheckout = true;
        }
    }
</script>