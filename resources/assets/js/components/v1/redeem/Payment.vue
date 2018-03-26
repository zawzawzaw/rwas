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
                            <template v-if="loading">
                                Loading payment information...
                            </template>
                            
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>First name</label>
                                         <input type='text' class='required' value='Test Payment' v-model="fname">
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Last name</label>
                                         <input type='text' class='required' value='Test Payment' v-model="lname">
                                    </div>

                                </div>

                                <input name='CUSTNAME' type='hidden' v-model="custname">
                            </div>

                            <div class="row">
                                <div class="col-md-2">

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

                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Card No *</label>
                                        <input name='CARDNO' type='text' value='' class="required only-numeric" required>
                                    </div>
                            
                                </div>
                                
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>CVC *</label>
                                        <input name='CARDCVC' type='text' value='123'>
                                    </div>
                            
                                </div>

                            </div>

                            <input name='CUSTEMAIL' type='hidden' value='test.payment@starcruises.com'>
                            <input name='CARDNAME' type='hidden' value='asd'>

                            <div class="row">
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label>Card Expired Date*</label>
                                        <v-date-picker
                                            :min-date='new Date()'
                                            :format='format'
                                            v-model='selectedDate'>
                                        </v-date-picker>
                                    </div>
                                </div>
                                <div class="col-md-9">

                                    <div class="form-group">
                                        <label>Marchant Tran Id</label>
                                        <input name='MERCHANT_TRANID' type='text' v-model='tranid' class="required only-numeric" required>
                                    </div>
                            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                    <label>Address*</label>
                                    <input type="text" name="BILLING_ADDRESS" class="required" id="address0" value="Address 1">
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                    <label>City*</label>
                                    <input type="text" name="BILLING_ADDRESS_CITY" class="required" :id="'city'" value="city">
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>State / Province*</label>
                                        <input type="text" name="BILLING_ADDRESS_STATE" class="required" value="state">
                                    </div>
                                    
                                </div>

                                <div class="col-md-2">

                                    <div class="form-group">
                                        <label>Country *</label>

                                        <div class="manic-dropdown">
                                            <select name="BILLING_ADDRESS_COUNTRY_CODE" class="required">
                                            <option value="">Select one</option>

                                            <option value="CHINA">CHINA</option>
                                            <option value="HONG KONG" selected>HONG KONG</option>
                                            <option value="INDONESIA">INDONESIA</option>
                                            <option value="MALAYSIA">MALAYSIA</option>
                                            <option value="SINGAPORE">SINGAPORE</option>
                                            <option value="TAIWAN">TAIWAN</option>
                                            <option value="THAILAND">THAILAND</option>
                                            <option value="CANADA">CANADA</option>
                                            <option value="USA">USA</option>
                                            <option value="MALDIVES">MALDIVES</option>
                                            <option value="RUSSIA">RUSSIA</option>
                                            <option value="EGYPT">EGYPT</option>
                                            <option value="ALGERIA">ALGERIA</option>
                                            <option value="MAURITIUS">MAURITIUS</option>
                                            <option value="ZIMBABWE">ZIMBABWE</option>
                                            <option value="SOUTH AFRICA">SOUTH AFRICA</option>
                                            <option value="NETHERLANDS">NETHERLANDS</option>
                                            <option value="BELGIUM">BELGIUM</option>
                                            <option value="FRANCE">FRANCE</option>
                                            <option value="SPAIN">SPAIN</option>
                                            <option value="MALTA">MALTA</option>
                                            <option value="HUNGARY">HUNGARY</option>
                                            <option value="ITALY">ITALY</option>
                                            <option value="ROMANIA">ROMANIA</option>
                                            <option value="SWITZERLAND">SWITZERLAND</option>
                                            <option value="AUSTRIA">AUSTRIA</option>
                                            <option value="UNITED KINGDOM">UNITED KINGDOM</option>
                                            <option value="DENMARK">DENMARK</option>
                                            <option value="SWEDEN">SWEDEN</option>
                                            <option value="NORWAY">NORWAY</option>
                                            <option value="POLAND">POLAND</option>
                                            <option value="GERMANY">GERMANY</option>
                                            <option value="HONDURAS">HONDURAS</option>
                                            <option value="PORTUGAL">PORTUGAL</option>
                                            <option value="MEXICO">MEXICO</option>
                                            <option value="MACAU">MACAU SPECIAL ADMINISTRATIVE REGION</option>
                                            <option value="ARGENTINA">ARGENTINA</option>
                                            <option value="BRAZIL">BRAZIL</option>
                                            <option value="CHILE">CHILE</option>
                                            <option value="FINLAND">FINLAND</option>
                                            <option value="AUSTRALIA">AUSTRALIA</option>
                                            <option value="PHILIPPINES">PHILIPPINES</option>
                                            <option value="NEW ZEALAND">NEW ZEALAND</option>
                                            <option value="THAILAND">THAILAND</option>
                                            <option value="BRUNEI">BRUNEI</option>
                                            <option value="IRELAND">IRELAND</option>
                                            <option value="PAPUA N. GUINEA">PAPUA N. GUINEA</option>
                                            <option value="PUERTO RICO">PUERTO RICO</option>
                                            <option value="KOREA">KOREA</option>
                                            <option value="JAPAN">JAPAN</option>
                                            <option value="VIETNAM">VIETNAM</option>
                                            <option value="BANGLADESH">BANGLADESH</option>
                                            <option value="NAURU">NAURU</option>
                                            <option value="INDIA">INDIA</option>
                                            <option value="PAKISTAN">PAKISTAN</option>
                                            <option value="SRI LANKA">SRI LANKA</option>
                                            <option value="MYANMAR">MYANMAR</option>
                                            <option value="SAUDI ARABIA AND KUWAIT">SAUDI ARABIA AND KUWAIT</option>
                                            <option value="UAE">UAE</option>
                                            <option value="IRAN">IRAN</option>
                                            <option value="CAMBODIA">CAMBODIA</option>
                                            
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-5">

                                    <div class="form-group">
                                    <label>Post code*</label>
                                    <input type="text" name="BILLING_ADDRESS_POSCODE" class="required only-numbers" :id="'postCode'" value="11111">
                                    </div>

                                </div>

                            </div>

                            <input name='PAYMENT_METHOD' type='hidden' value='1'>
                            <input name='TRANSACTIONTYPE' type='hidden' value='1'>
                            <input name='MERCHANTID' type='hidden' value='SCM_UAT'>
                            <!-- <input name='MERCHANT_TRANID' type='hidden' value='636564742558693142'> -->
                            <input name='PYMT_IND' type='hidden' value=''>
                            <input name='PAYMENT_CRITERIA' type='hidden' value=''>
                            <input name='CURRENCYCODE' type='hidden' value='HKD'>
                            <input name='AMOUNT' type='hidden' v-model='amount'>
                            <input name='SIGNATURE' type='hidden' v-model='signature'>
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
                return this.$root.apiEndpoint+"/redeem/cabin/thankyou";
            },
            custname: function() {
                return this.fname + " " + this.lname;
            }
        },
        data() {
            return {
                selectedDate: new Date(),
                tranid: 0,
                signature: 0,
                amount: 0,
                loading: true,
                format: {
                    title: 'MMMM YYYY',
                    weekdays: 'W',
                    navMonths: 'MMM',
                    input: ['YYYY-MM-DD', 'YYYY-MM-DD', 'MM/YY'],
                    dayPopover: 'L',
                },
                fname: "",
                lname: ""
            }
        },
        mounted() {
            if(this.$root.refreshPayment){
                window.location.reload();
            }
            var ths = this;
            this.amount = this.$route.query.cash===undefined ? 0 : this.$route.query.cash;
            axios({
                url: this.$root.apiEndpoint+"/cruise/generate_payment_requirement?amount="+this.amount
            }).then((res) => {
                ths.signature = res.data.signature;
                ths.tranid = res.data.tranid;
                ths.loading = false;
            }).catch((err) => {
                alert('Failed to load payment information!');
            });
        }
    }
</script>