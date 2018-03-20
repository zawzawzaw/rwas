<template>
    <div>
        <article id="account-register-form-section">
            <div class="container-fluid has-breakpoint">

            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <h1 class="booking-detail-title">Booking Details</h1>
                </div>
            </div> <!-- row -->


            <div class="row">
                <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

                <form id="account-register-form" 
                    class="default-form simple-form-check-02 ajax-version api-version"
                    method="post"
                    action="{/{url('/api/user/register')}}">

                    <!--
                        ___  _
                    / _ \/ |
                    | | | | |
                    | |_| | |
                    \___/|_|

                    -->

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Given Name*</label>
                                <input type="text" name="first_name" id="gName1" class="required only-alpha-and-space" value="John">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>SurName*</label>
                                <input type="text" name="last_name" id="sName0" class="required only-alpha-and-space" value="Doe">
                            </div>

                        </div>
                    </div> <!-- row -->



                    <!--
                        ___ ____
                    / _ \___ \
                    | | | |__) |
                    | |_| / __/
                    \___/_____|

                    -->

                    <div class="row">
                    <div class="col-md-3">

                        <div class="form-group">
                        <label>Gender*</label>
                        <div class="manic-dropdown" id="register-gender-dropdown">
                            <select name="gender" class="required" id="gender0">
                            <option value="">Select one</option>
                            <option value="M" selected>M</option>
                            <option value="F">F</option>
                            </select>
                        </div>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <!-- pending -->
                        <div class="form-group simple-date-version">
                        <div class="page-default-calendar-bg"></div>
                        <label>Date of Birth*</label>
                        <div class="manic-calendar">
                            <input name="date_of_birth" type="text" class="required form-control page-default-calendar" placeholder="DD/MM/YYYY" id="dob0" value="21/02/1995">
                            <div class="calendar-icon"></div>
                            <div class="page-default-calendar-container">
                            <div class="page-default-calendar-datepicker"></div>
                            </div>
                        </div>
                        </div>

                    </div>

                    <div class="col-md-5">

                        <div class="form-group">
                        <label>Nationality*</label>
                        <div class="manic-dropdown">
                            <select name="nationality" class="required" id="nat0">
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
                    </div> <!-- row -->



                    <!--
                        ___ _____
                    / _ \___ /
                    | | | ||_ \
                    | |_| |__) |
                    \___/____/

                    -->

                    <div class="row">
                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Identification type*</label>
                            <div class="manic-dropdown">
                                <select name="doc_type" class="required" id="docType0">
                                <option value="">Select one</option>
                                <option value="IC" selected>Identification Card</option>
                                <option value="PP">Passport</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                        <label>ID or Passport number*</label>
                        <input type="text" name="doc_no" class="required only-alphanumeric" id="docNo0" value="1234567890">
                        </div>

                    </div>
                    <div class="col-md-5">

                        <div class="form-group">
                        <label>Travel document issued by*</label>
                        <div class="manic-dropdown">
                            <select name="doc_country" class="required" id="docLoc0">
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
                    </div> <!-- row -->



                    <!--
                        ___  _  _
                    / _ \| || |
                    | | | | || |_
                    | |_| |__   _|
                    \___/   |_|

                    -->

                    <div class="row">
                    <!-- <div class="col-md-6">

                        <div class="form-group">
                        <label>Travel document issue date*</label>
                        <input type="text" name="doc_issue_date" placeholder="DD/MM/YYYY" class="required" id="docIssue">
                        </div>

                    </div> -->
                    <div class="col-md-12">

                        <div class="form-group">
                        <label>Travel document expiry date*</label>
                        <input type="text" name="doc_expiry_date" placeholder="DD/MM/YYYY" class="required" id="docExpire0" value="21/02/2019">
                        </div>

                    </div>
                    </div> <!-- row -->

                    <!--
                        ___   __
                    / _ \ / /_
                    | | | |  _ \
                    | |_| | (_) |
                    \___/ \___/

                    -->

                    <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>Email address*</label>
                        <input type="text" name="email" class="required only-email" id="email0" value="johndoe@example.com">
                        </div>
                        
                    </div>
                    <div class="col-md-2">

                        <div class="form-group">
                        <label>Mobile*</label>


                        <div class="manic-dropdown">
                            <select name="mobile_country" class="required" id="ccode0">
                            <option value="">Select one</option>

                            <option value="86">CHINA (86)</option>
                            <option value="852" selected>HONG KONG (852)</option>
                            <option value="62">INDONESIA (62)</option>
                            <option value="60">MALAYSIA (60)</option>
                            <option value="65">SINGAPORE (65)</option>
                            <option value="886">TAIWAN (886)</option>
                            <option value="66">THAILAND (66)</option>
                            <option value="00">CANADA (00)</option>
                            <option value="01">USA (01)</option>
                            <option value="06">MALDIVES (06)</option>
                            <option value="07">RUSSIA (07)</option>
                            <option value="20">EGYPT (20)</option>
                            <option value="21">ALGERIA (21)</option>
                            <option value="23">MAURITIUS (23)</option>
                            <option value="26">ZIMBABWE (26)</option>
                            <option value="27">SOUTH AFRICA (27)</option>
                            <option value="31">NETHERLANDS (31)</option>
                            <option value="32">BELGIUM (32)</option>
                            <option value="33">FRANCE (33)</option>
                            <option value="34">SPAIN (34)</option>
                            <option value="35">MALTA (35)</option>
                            <option value="36">HUNGARY (36)</option>
                            <option value="39">ITALY (39)</option>
                            <option value="40">ROMANIA (40)</option>
                            <option value="41">SWITZERLAND (41)</option>
                            <option value="43">AUSTRIA (43)</option>
                            <option value="44">UNITED KINGDOM (44)</option>
                            <option value="45">DENMARK (45)</option>
                            <option value="46">SWEDEN (46)</option>
                            <option value="47">NORWAY (47)</option>
                            <option value="48">POLAND (48)</option>
                            <option value="49">GERMANY (49)</option>
                            <option value="50">HONDURAS (50)</option>
                            <option value="51">PORTUGAL (51)</option>
                            <option value="52">MEXICO (52)</option>
                            <option value="53">MACAU SPECIAL ADMINISTRATIVE REGION (53)</option>
                            <option value="54">ARGENTINA (54)</option>
                            <option value="55">BRAZIL (55)</option>
                            <option value="56">CHILE (56)</option>
                            <option value="58">FINLAND (58)</option>
                            <option value="61">AUSTRALIA (61)</option>
                            <option value="63">PHILIPPINES (63)</option>
                            <option value="64">NEW ZEALAND (64)</option>
                            <option value="66">THAILAND (66)</option>
                            <option value="67">BRUNEI (67)</option>
                            <option value="72">IRELAND (72)</option>
                            <option value="75">PAPUA N. GUINEA (75)</option>
                            <option value="78">PUERTO RICO (78)</option>
                            <option value="80">KOREA (80)</option>
                            <option value="81">JAPAN (81)</option>
                            <option value="84">VIETNAM (84)</option>
                            <option value="89">BANGLADESH (89)</option>
                            <option value="90">NAURU (90)</option>
                            <option value="91">INDIA (91)</option>
                            <option value="92">PAKISTAN (92)</option>
                            <option value="94">SRI LANKA (94)</option>
                            <option value="95">MYANMAR (95)</option>
                            <option value="96">SAUDI ARABIA AND KUWAIT (96)</option>
                            <option value="97">UAE (97)</option>
                            <option value="98">IRAN (98)</option>
                            <option value="855">CAMBODIA (855)</option>
                            
                            </select>
                        </div>

                            
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" name="mobile_number" class="required only-numbers" id="mobile0" value="1234567890">
                        </div>

                    </div>
        
                    </div> <!-- row -->



                    <!--
                        ___ _____
                    / _ \___  |
                    | | | | / /
                    | |_| |/ /
                    \___//_/

                    -->
                    
                    <div class="row">

                    <div class="col-md-12">

                        <div class="form-group">
                        <label>Address*</label>
                        <input type="text" name="address_line_01" class="required" id="address0" value="Address 1">
                        </div>
                        
                    </div>
                    </div>


                    <!--
                        ___   ___
                    / _ \ ( _ )
                    | | | |/ _ \
                    | |_| | (_) |
                    \___/ \___/

                    -->

                    <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                        <label>Country*</label>
                        <div class="manic-dropdown">
                            <select name="address_country" class="required" id="country0">
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
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>State / Province*</label>
                        <input type="text" name="address_state" class="required" id="state0" value="state 1">
                        </div>
                        
                    </div>
                    </div> <!-- row -->



                    <!--
                        ___   ___
                    / _ \ / _ \
                    | | | | (_) |
                    | |_| |\__, |
                    \___/   /_/

                    -->

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>City*</label>
                            <input type="text" name="address_city" class="required" id="city0" value="City 1">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>Post code*</label>
                            <input type="text" name="address_postal_code" class="required only-numbers" id="postCode0" value="11111">
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>Member ID *</label>
                            <input type="text" name="address_city" class="required" id="memberid0" value="29">
                            </div>

                        </div>
                    
                    </div>

                <template v-if="$route.params.pax.length>1" v-for="n in ($route.params.pax.length-1)">
                    <div v-bind:key="n">
                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <h1>Guest {{ n }}</h1>
                            </div>
                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Given Name*</label>
                                    <input type="text" name="first_name" :id="'gName'+n" class="required only-alpha-and-space" value="Jame">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>SurName*</label>
                                    <input type="text" name="last_name" :id="'sName'+n" class="required only-alpha-and-space" value="Doe">
                                </div>

                            </div>
                        </div> <!-- row -->



                        <!--
                            ___ ____
                        / _ \___ \
                        | | | |__) |
                        | |_| / __/
                        \___/_____|

                        -->

                        <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">
                            <label>Gender*</label>
                            <div class="manic-dropdown" id="register-gender-dropdown">
                                <select name="gender" class="required" :id="'gender'+n">
                                <option value="">Select one</option>
                                <option value="M">M</option>
                                <option value="F" selected>F</option>
                                </select>
                            </div>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <!-- pending -->
                            <div class="form-group simple-date-version">
                            <div class="page-default-calendar-bg"></div>
                            <label>Date of Birth*</label>
                            <div class="manic-calendar">
                                <input name="date_of_birth" type="text" class="required form-control page-default-calendar" placeholder="DD/MM/YYYY" :id="'dob'+n" value="21/02/1995">
                                <div class="calendar-icon"></div>
                                <div class="page-default-calendar-container">
                                <div class="page-default-calendar-datepicker"></div>
                                </div>
                            </div>
                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="form-group">
                            <label>Nationality*</label>
                            <div class="manic-dropdown">
                                <select name="nationality" class="required" :id="'nat'+n">
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
                        </div> <!-- row -->



                        <!--
                            ___ _____
                        / _ \___ /
                        | | | ||_ \
                        | |_| |__) |
                        \___/____/

                        -->

                        <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">
                            <label>Identification type*</label>
                            <div class="manic-dropdown">
                                <select name="doc_type" class="required" :id="'docType'+n">
                                <option value="">Select one</option>
                                <option value="IC" selected>Identification Card</option>
                                <option value="PP">Passport</option>
                                </select>
                            </div>
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                            <label>ID or Passport number*</label>
                            <input type="text" name="doc_no" class="required only-alphanumeric" :id="'docNo'+n" value="1234567890">
                            </div>

                        </div>
                        <div class="col-md-5">

                            <div class="form-group">
                            <label>Travel document issued by*</label>
                            <div class="manic-dropdown">
                                <select name="doc_country" class="required" id="docLoc">
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
                        </div> <!-- row -->



                        <!--
                            ___  _  _
                        / _ \| || |
                        | | | | || |_
                        | |_| |__   _|
                        \___/   |_|

                        -->

                        <div class="row">
                        <!-- <div class="col-md-6">

                            <div class="form-group">
                            <label>Travel document issue date*</label>
                            <input type="text" name="doc_issue_date" placeholder="DD/MM/YYYY" class="required" id="docIssue">
                            </div>

                        </div> -->
                        <div class="col-md-12">

                            <div class="form-group">
                            <label>Travel document expiry date*</label>
                            <input type="text" name="doc_expiry_date" placeholder="DD/MM/YYYY" class="required" :id="'docExpire'+n" value="21/02/1995">
                            </div>

                        </div>
                        </div> <!-- row -->

                        <!--
                            ___   __
                        / _ \ / /_
                        | | | |  _ \
                        | |_| | (_) |
                        \___/ \___/

                        -->

                        <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>Email address*</label>
                            <input type="text" name="email" class="required only-email" :id="'email'+n" value="jamedoe@example.com">
                            </div>
                            
                        </div>
                        <div class="col-md-2">

                            <div class="form-group">
                            <label>Mobile*</label>


                            <div class="manic-dropdown">
                                <select name="mobile_country" class="required" :id="'ccode'+n">
                                <option value="">Select one</option>

                                <option value="86">CHINA (86)</option>
                                <option value="852" selected>HONG KONG (852)</option>
                                <option value="62">INDONESIA (62)</option>
                                <option value="60">MALAYSIA (60)</option>
                                <option value="65">SINGAPORE (65)</option>
                                <option value="886">TAIWAN (886)</option>
                                <option value="66">THAILAND (66)</option>
                                <option value="00">CANADA (00)</option>
                                <option value="01">USA (01)</option>
                                <option value="06">MALDIVES (06)</option>
                                <option value="07">RUSSIA (07)</option>
                                <option value="20">EGYPT (20)</option>
                                <option value="21">ALGERIA (21)</option>
                                <option value="23">MAURITIUS (23)</option>
                                <option value="26">ZIMBABWE (26)</option>
                                <option value="27">SOUTH AFRICA (27)</option>
                                <option value="31">NETHERLANDS (31)</option>
                                <option value="32">BELGIUM (32)</option>
                                <option value="33">FRANCE (33)</option>
                                <option value="34">SPAIN (34)</option>
                                <option value="35">MALTA (35)</option>
                                <option value="36">HUNGARY (36)</option>
                                <option value="39">ITALY (39)</option>
                                <option value="40">ROMANIA (40)</option>
                                <option value="41">SWITZERLAND (41)</option>
                                <option value="43">AUSTRIA (43)</option>
                                <option value="44">UNITED KINGDOM (44)</option>
                                <option value="45">DENMARK (45)</option>
                                <option value="46">SWEDEN (46)</option>
                                <option value="47">NORWAY (47)</option>
                                <option value="48">POLAND (48)</option>
                                <option value="49">GERMANY (49)</option>
                                <option value="50">HONDURAS (50)</option>
                                <option value="51">PORTUGAL (51)</option>
                                <option value="52">MEXICO (52)</option>
                                <option value="53">MACAU SPECIAL ADMINISTRATIVE REGION (53)</option>
                                <option value="54">ARGENTINA (54)</option>
                                <option value="55">BRAZIL (55)</option>
                                <option value="56">CHILE (56)</option>
                                <option value="58">FINLAND (58)</option>
                                <option value="61">AUSTRALIA (61)</option>
                                <option value="63">PHILIPPINES (63)</option>
                                <option value="64">NEW ZEALAND (64)</option>
                                <option value="66">THAILAND (66)</option>
                                <option value="67">BRUNEI (67)</option>
                                <option value="72">IRELAND (72)</option>
                                <option value="75">PAPUA N. GUINEA (75)</option>
                                <option value="78">PUERTO RICO (78)</option>
                                <option value="80">KOREA (80)</option>
                                <option value="81">JAPAN (81)</option>
                                <option value="84">VIETNAM (84)</option>
                                <option value="89">BANGLADESH (89)</option>
                                <option value="90">NAURU (90)</option>
                                <option value="91">INDIA (91)</option>
                                <option value="92">PAKISTAN (92)</option>
                                <option value="94">SRI LANKA (94)</option>
                                <option value="95">MYANMAR (95)</option>
                                <option value="96">SAUDI ARABIA AND KUWAIT (96)</option>
                                <option value="97">UAE (97)</option>
                                <option value="98">IRAN (98)</option>
                                <option value="855">CAMBODIA (855)</option>
                                
                                </select>
                            </div>

                                
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="text" name="mobile_number" class="required only-numbers" :id="'mobile'+n" value="1234567890">
                            </div>

                        </div>
            
                        </div> <!-- row -->



                        <!--
                            ___ _____
                        / _ \___  |
                        | | | | / /
                        | |_| |/ /
                        \___//_/

                        -->
                        
                        <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                            <label>Address*</label>
                            <input type="text" name="address_line_01" class="required" :id="'address'+n" value="Address">
                            </div>
                            
                        </div>
                        </div>


                        <!--
                            ___   ___
                        / _ \ ( _ )
                        | | | |/ _ \
                        | |_| | (_) |
                        \___/ \___/

                        -->

                        <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                            <label>Country*</label>
                            <div class="manic-dropdown">
                                <select name="address_country" class="required" :id="'country'+n">
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
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>State / Province*</label>
                            <input type="text" name="address_state" class="required" :id="'state'+n" value="state">
                            </div>
                            
                        </div>
                        </div> <!-- row -->



                        <!--
                            ___   ___
                        / _ \ / _ \
                        | | | | (_) |
                        | |_| |\__, |
                        \___/   /_/

                        -->

                        <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>City*</label>
                            <input type="text" name="address_city" class="required" :id="'city'+n" value="city">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                            <label>Post code*</label>
                            <input type="text" name="address_postal_code" class="required only-numbers" :id="'postCode'+n" value="11111">
                            </div>

                        </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Member ID *</label>
                                    <input type="text" name="address_city" class="required" :id="'memberid'+n" value="">
                                </div>

                            </div>
                        
                        </div>
                    </div>

                </template>

                    <!--
                    _  ___
                    / |/ _ \
                    | | | | |
                    | | |_| |
                    |_|\___/

                    -->
                <div class="row">
                    <div class="col-md-6 col-md-push-3">
                        <h1>Emergency contact person info</h1>
                    </div>
                </div> <!-- row -->

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Given Name*</label>
                            <input type="text" name="first_name" class="required only-alpha-and-space" id="cgName" value="John">
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>SurName*</label>
                            <input type="text" name="last_name" class="required only-alpha-and-space" id="csName" value="Roe">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                        <label>Email address*</label>
                        <input type="text" name="email" class="required only-email" id="cEmail" value="johnroe@example.com">
                        </div>
                        
                    </div>
                    <div class="col-md-2">

                        <div class="form-group">
                        <label>Mobile*</label>


                        <div class="manic-dropdown">
                            <select name="mobile_country" class="required" id="cccode">
                            <option value="">Select one</option>

                            <option value="86">CHINA (86)</option>
                            <option value="852" selected>HONG KONG (852)</option>
                            <option value="62">INDONESIA (62)</option>
                            <option value="60">MALAYSIA (60)</option>
                            <option value="65">SINGAPORE (65)</option>
                            <option value="886">TAIWAN (886)</option>
                            <option value="66">THAILAND (66)</option>
                            <option value="00">CANADA (00)</option>
                            <option value="01">USA (01)</option>
                            <option value="06">MALDIVES (06)</option>
                            <option value="07">RUSSIA (07)</option>
                            <option value="20">EGYPT (20)</option>
                            <option value="21">ALGERIA (21)</option>
                            <option value="23">MAURITIUS (23)</option>
                            <option value="26">ZIMBABWE (26)</option>
                            <option value="27">SOUTH AFRICA (27)</option>
                            <option value="31">NETHERLANDS (31)</option>
                            <option value="32">BELGIUM (32)</option>
                            <option value="33">FRANCE (33)</option>
                            <option value="34">SPAIN (34)</option>
                            <option value="35">MALTA (35)</option>
                            <option value="36">HUNGARY (36)</option>
                            <option value="39">ITALY (39)</option>
                            <option value="40">ROMANIA (40)</option>
                            <option value="41">SWITZERLAND (41)</option>
                            <option value="43">AUSTRIA (43)</option>
                            <option value="44">UNITED KINGDOM (44)</option>
                            <option value="45">DENMARK (45)</option>
                            <option value="46">SWEDEN (46)</option>
                            <option value="47">NORWAY (47)</option>
                            <option value="48">POLAND (48)</option>
                            <option value="49">GERMANY (49)</option>
                            <option value="50">HONDURAS (50)</option>
                            <option value="51">PORTUGAL (51)</option>
                            <option value="52">MEXICO (52)</option>
                            <option value="53">MACAU SPECIAL ADMINISTRATIVE REGION (53)</option>
                            <option value="54">ARGENTINA (54)</option>
                            <option value="55">BRAZIL (55)</option>
                            <option value="56">CHILE (56)</option>
                            <option value="58">FINLAND (58)</option>
                            <option value="61">AUSTRALIA (61)</option>
                            <option value="63">PHILIPPINES (63)</option>
                            <option value="64">NEW ZEALAND (64)</option>
                            <option value="66">THAILAND (66)</option>
                            <option value="67">BRUNEI (67)</option>
                            <option value="72">IRELAND (72)</option>
                            <option value="75">PAPUA N. GUINEA (75)</option>
                            <option value="78">PUERTO RICO (78)</option>
                            <option value="80">KOREA (80)</option>
                            <option value="81">JAPAN (81)</option>
                            <option value="84">VIETNAM (84)</option>
                            <option value="89">BANGLADESH (89)</option>
                            <option value="90">NAURU (90)</option>
                            <option value="91">INDIA (91)</option>
                            <option value="92">PAKISTAN (92)</option>
                            <option value="94">SRI LANKA (94)</option>
                            <option value="95">MYANMAR (95)</option>
                            <option value="96">SAUDI ARABIA AND KUWAIT (96)</option>
                            <option value="97">UAE (97)</option>
                            <option value="98">IRAN (98)</option>
                            <option value="855">CAMBODIA (855)</option>
                            
                            </select>
                        </div>

                            
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" name="mobile_number" class="required only-numbers" id="cmobile" value="1023456789">
                        </div>

                    </div>
        
                    </div> <!-- row -->
                    <!--
                    _ _
                    / / |
                    | | |
                    | | |
                    |_|_|

                    -->
                    <div class="row">
                        <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox" id="visaConfirm">
                                        <span></span>I understand that I am responsible for checking my own visa requirements
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="cta-container">
                        
                        <a href="javascript:void(0);" class="square-cta large-version full-width-version form-check-submit-btn" v-on:click="confirmBooking">Submit</a>

                        </div>
                    </div>
                    </div> <!-- row -->



                </form> <!-- account-register-form -->

                <div class="space100"></div>

                </div> <!-- col -->
            </div> <!-- row -->

            </div> <!-- container-fluid -->
        </article>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                totalPax: 1
            }
        },
        methods: {
            confirmBooking: function(){

                if($("#visaConfirm").prop("checked")===false) {
                    alert("Please agreed our sevice before proceeding!");
                    return false;
                }

                for(var i=0; i<this.totalPax; i++) {
                    var data = {
                        guestBod: $("#dob"+i).val(),
                        guestGender: $("#gender"+i).val(),
                        guestNat: $("#nat"+i).val(),
                        guestName: $("#gName"+i).val(),
                        guestMName: $("#mName"+i).val(),
                        guestSName: $("#sName"+i).val(),
                        guestEamil: $("#email"+i).val(),
                        guestCCode: $("#ccode"+i).val(),
                        guestPhone: $("#mobile"+i).val(),
                        guestAdd: $("#address"+i).val(),
                        guestCity: $("#city"+i).val(),
                        guestCountry: $("#country"+i).val(),
                        guestPostal: $("#postal"+i).val(),
                        guestState: $("#state"+i).val(),
                        gContactName: $("#cgName").val(),
                        gContactMName: $("#cmName").val(),
                        gContactSName: $("#csName").val(),
                        gContactEmail: $("#cEmail").val(),
                        gContactCCode: $("#cccode").val(),
                        gContactPhone: $("#cmobile").val(),
                        gTravDocId: $("#docNo"+i).val(),
                        gTravDocIssuLoc: $("#docLoc"+i).val(),
                        gTravDocType: $("#docType"+i).val(),
                        gTravDocExpire: $("#docExpire"+i).val()
                    };

                    var data = new FormData();

                    for(var i in data){
                        if(data[i]==""){
                            alert("Fill all the input form!");
                            return null;
                        }
                    }
                }

                for(var i=0; i<this.totalPax; i++) {
                    data.append('guest['+i+'][guestBod]', $("#dob"+i).val());
                    data.append('guest['+i+'][guestGender]', $("#gender"+i).val());
                    data.append('guest['+i+'][guestNat]', $("#nat"+i).val());
                    data.append('guest['+i+'][guestName]', $("#gName"+i).val());
                    data.append('guest['+i+'][guestMName]', $("#mName"+i).val());
                    data.append('guest['+i+'][guestSName]', $("#sName"+i).val());
                    data.append('guest['+i+'][guestEamil]', $("#email"+i).val());
                    data.append('guest['+i+'][guestCCode]', $("#ccode"+i).val());
                    data.append('guest['+i+'][guestPhone]', $("#mobile"+i).val());
                    data.append('guest['+i+'][guestAdd]', $("#address"+i).val());
                    data.append('guest['+i+'][guestCity]', $("#city"+i).val());
                    data.append('guest['+i+'][guestCountry]', $("#country"+i).val());
                    data.append('guest['+i+'][memberid]', $("#memberid"+i).val());
                    data.append('guest['+i+'][guestPostal]', $("#postCode"+i).val());
                    data.append('guest['+i+'][guestState]', $("#state"+i).val());
                    data.append('guest['+i+'][gTravDocId]', $("#docNo"+i).val());
                    data.append('guest['+i+'][gTravDocIssuLoc]', $("#docLoc"+i).val());
                    data.append('guest['+i+'][gTravDocType]', $("#docType"+i).val());
                    data.append('guest['+i+'][gTravDocExpire]', $("#docExpire"+i).val());
                }
                
                data.append('gContactName', $("#cgName").val());
                data.append('gContactMName', $("#cmName").val());
                data.append('gContactSName', $("#csName").val());
                data.append('gContactEmail', $("#cEmail").val());
                data.append('gContactCCode', $("#cccode").val());
                data.append('gContactPhone', $("#cmobile").val());
                data.append('cruise_id', this.$route.params.cruiseid);
                data.append('cabin', this.$route.params.cabin);
                data.append('pax', this.$route.params.pax);
                data.append('date', this.$route.params.date);

                var ths = this;
                axios({
                    url: this.$root.apiEndpoint+ "/cruise/book_cruise_cabin",
                    data: data,
                    method: "post"
                }).then((res) => {
                    if(ths.$route.query.cash!==undefined && ths.$route.query.cash>0) {
                        ths.$root.refreshPayment = true;
                        ths.$router.push({ name: 'redeem.cabin.payment', params: {
                                cruiseid: ths.$route.params.cruiseid,
                                date: ths.$route.params.date,
                                pax: ths.$route.params.pax,
                                cabin: ths.$route.params.cabin,
                            }
                        });
                    }else{ 
                        ths.$router.push({ name: 'redeem.cabin.thankyou', params: {
                                cruiseid: ths.$route.params.cruiseid,
                                date: ths.$route.params.date,
                                pax: ths.$route.params.pax,
                                cabin: ths.$route.params.cabin,
                            } , query: {
                                cc: ths.$route.query.cc!==undefined && ths.$route.query.cc>0 ? ths.$route.query.cc : 0,
                                cash: ths.$route.query.cash!==undefined && ths.$route.query.cash>0 ? ths.$route.query.cash : 0
                            } 
                        });
                    }
                    ths.$root.result = JSON.stringify(res.data, undefined, 2);
                }).catch((err) => {
                    alert("Failed to submit guest form!");
                });
            }
        },
        mounted() {
            console.log("Checkout mounted");
            if(this.$root.refreshCheckout){
                window.location.reload();
            }
            this.totalPax = this.$route.params.pax.length;
        }
    }
</script>