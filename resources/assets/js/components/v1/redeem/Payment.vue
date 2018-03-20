<template>
    <div>
        <article id="payment-register-form-section">
            <div class="container-fluid has-breakpoint">

                <div class="row">
                    <div class="col-md-6 col-md-push-3">
                        <h1 class="booking-detail-title">Payment</h1>
                    </div>
                </div> <!-- row -->
              
                <div class="row">

                    <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

                        <form id="payment-register-form" method='POST' action='https://epgdev.starcruises.com/payment/PaymentInterface.jsp' class="default-form ajax-version api-version">

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Card Type</label>
                                        <div class="manic-dropdown">
                                            <select name="CARDTYPE" class="required" id="docType0">
                                            <option value="">Select one</option>
                                            <option value="V" selected>Visa</option>
                                            <option value="M">Master</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Card No *</label>
                                        <input name='CARDNO' type='text' value='' class="required only-numeric" required>
                                    </div>
                            
                                </div>

                            </div>

                            <input name='CARDNAME' type='hidden' value='asd'>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Card Expired Date*</label>
                                        <v-date-picker
                                            :min-date='new Date()'
                                            v-model='selectedDate'>
                                        </v-date-picker>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Marchant Tran Id</label>
                                        <input name='MERCHANT_TRANID' type='text' v-model='tranid' class="required only-numeric" required>
                                    </div>
                            
                                </div>
                            </div>

                            <input name='CARDCVC' type='hidden' value='123'>
                            <input name='PAYMENT_METHOD' type='hidden' value='1'>
                            <input name='TRANSACTIONTYPE' type='hidden' value='1'>
                            <input name='MERCHANTID' type='hidden' value='SCM_UAT'>
                            <!-- <input name='MERCHANT_TRANID' type='hidden' value='636564742558693142'> -->
                            <input name='PYMT_IND' type='hidden' value=''>
                            <input name='PAYMENT_CRITERIA' type='hidden' value=''>
                            <input name='CURRENCYCODE' type='hidden' value='HKD'>
                            <input name='AMOUNT' type='hidden' value='100.00'>
                            <input name='SIGNATURE' type='hidden' value='ADABF35344EE55C27754E4F35A4957917F9331BF'>
                            <input name='CUSTNAME' type='hidden' value='Test Payment'>
                            <input name='CUSTEMAIL' type='hidden' value='test.payment@starcruises.com'>
                            <input name='SHOPPER_IP' type='hidden' value='::1'>
                            <input name='DESCRIPTION' type='hidden' value=''>
                            <input name='RESPONSE_TYPE' type='hidden' value='2'>
                            <input name='EXPIRYMONTH' type='hidden' v-model='expMonth'>
                            <input name='EXPIRYYEAR' type='hidden' v-model='expYear'>
                            <input name='RETURN_URL' type='hidden' v-model='redirectLink'>
                            
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="cta-container">
                                    
                                    <button class="square-cta large-version full-width-version">Submit</button>

                                    </div>
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        computed: {
            expYear: function() {
                return this.selectedDate.getFullYear();
            },
            expMonth: function() {
                return this.selectedDate.getMonth()+1;
            },
            redirectLink: function(){
                return this.$root.apiEndpoint+"/redeem/cabin/"+this.$route.params.cruiseid+"/"+this.$route.params.date+"/"+this.$route.params.pax+"/"+this.$route.params.cabin+"/thankyou";
                // cruiseid: ths.$route.params.cruiseid,
                //             date: ths.$route.params.date,
                //             pax: ths.$route.params.pax,
                //             cabin: ths.$route.params.cabin,
            }
        },
        data() {
            return {
                selectedDate: new Date(),
                tranid: 0
            }
        },
        mounted() {
            if(this.$root.refreshPayment){
                window.location.reload();
            }
            this.tranid = Math.floor((Math.random() * 63656474255869314200) + 636564742558693142);
        }
    }
</script>