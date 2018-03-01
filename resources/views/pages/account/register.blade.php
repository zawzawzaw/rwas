@extends('layout.master')

@section('content')
  
  <div class="under-construction-disclaimer">
    A functionality demo <br>
    this is NOT the design
  </div>

  <article id="account-register-form-section">
    <div class="container-fluid has-breakpoint">

      <div class="row">
        <div class="col-md-6 col-md-push-3">
          <h1>Sign Up</h1>
        </div>
      </div> <!-- row -->


      <div class="row">
        <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

          <form id="account-register-form" 
            class="default-form simple-form-check-02 ajax-version api-version"
            method="post"
            action="{{url('/api/user/register')}}">

            <!--
                ___  _
               / _ \/ |
              | | | | |
              | |_| | |
               \___/|_|

            -->

            <div class="row">
              <div class="col-md-2">

                <div class="form-group">
                  <label>Title*</label>
                  <div class="manic-dropdown" id="register-title-dropdown">
                    <select name="title" class="required">
                      <option value="">Select one</option>
                      <option value="MR">Mr.</option>
                      <option value="MS">Ms.</option>
                      <option value="MDM">Mdm.</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>First Name*</label>
                  <input type="text" name="first_name" class="required">
                </div>
                
              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Last Name*</label>
                  <input type="text" name="last_name" class="required">
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
                    <select name="gender" class="required">
                      <option value="">Select one</option>
                      <option value="M">M</option>
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
                    <input name="date_of_birth" type="text" class="required form-control page-default-calendar" placeholder="DD/MM/YYYY">
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
                    <select name="nationality" class="required">
                      <option value="">Select one</option>

                      <option value="CHINA">CHINA</option>
                      <option value="HONG KONG">HONG KONG</option>
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
                  <label>Identification type</label>
                  <div class="manic-dropdown">
                    <select name="doc_type">
                      <option value="">Select one</option>
                      <option value="IC">Identification Card</option>
                      <option value="PP">Passport</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>ID or Passport number</label>
                  <input type="text" name="doc_no">
                </div>

              </div>
              <div class="col-md-5">

                <div class="form-group">
                  <label>Travel document issued by</label>
                  <div class="manic-dropdown">
                    <select name="doc_country">
                      <option value="">Select one</option>

                      <option value="CHINA">CHINA</option>
                      <option value="HONG KONG">HONG KONG</option>
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
              <div class="col-md-6">

                <div class="form-group">
                  <label>Travel document issue date</label>
                  <input type="text" name="doc_issue_date" placeholder="DD/MM/YYYY">
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Travel document expiry date</label>
                  <input type="text" name="doc_expiry_date" placeholder="DD/MM/YYYY">
                </div>

              </div>
            </div> <!-- row -->



            <!--
                ___  ____
               / _ \| ___|
              | | | |___ \
              | |_| |___) |
               \___/|____/

            -->

            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label>Occupation</label>
                  <div class="manic-dropdown">
                    <select name="occupation">
                      <option value="">Select one</option>

                      <option value="Business owner/Partner">Business owner/Partner</option>
                      <option value="Other office worker">Other office worker</option>
                      <option value="Professional / Technical">Professional / Technical</option>
                      <option value="Retired,unemployed,housewife,student">Retired,unemployed,housewife,student</option>
                      <option value="Senior/Executive management">Senior/Executive management</option>
                      <option value="Others">Others</option>
                      
                    </select>
                  </div>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Nature of business</label>
                  <div class="manic-dropdown">
                    <select name="nature_of_business">
                      <option value="">Select one</option>

                      <!-- <option value="Agriculture, Mining & Forestry">Agriculture, Mining & Forestry</option> -->
                      
                      <option value="Construction/Transpo/Comm/Utililities">Construction/Transpo/Comm/Utililities</option>
                      <option value="Financial Services - Banking, Insurance">Financial Services - Banking, Insurance</option>
                      <option value="Financial Services - Other">Financial Services - Other</option>
                      <option value="General Business/Self Employed">General Business/Self Employed</option>
                      <option value="Government/Public Sector">Government/Public Sector</option>

                      <!-- <option value="Hospitality & Tourism">Hospitality & Tourism</option> -->
                      
                      <option value="Non-Profit/Charity Organization">Non-Profit/Charity Organization</option>
                      <option value="Others/None">Others/None</option>
                      <option value="Professional Services:Law,Accounting">Professional Services:Law,Accounting</option>
                      <option value="Professional Services:Others">Professional Services:Others</option>
                      <option value="Real Estate">Real Estate</option>
                      <option value="Manufacturing:Defense Goods">Manufacturing:Defense Goods</option>
                      <option value="Trading Business:Defense Goods">Trading Business:Defense Goods</option>
                      <option value="Trading Business:Import/Export">Trading Business:Import/Export</option>
                      <option value="Manufacturing:Jewelry/Precious Metals">Manufacturing:Jewelry/Precious Metals</option>
                      <option value="Trading Business:Jewelry/Precious Metals">Trading Business:Jewelry/Precious Metals</option>
                      <option value="Trading Business:Others">Trading Business:Others</option>
                      <option value="Manufacturing:Others">Manufacturing:Others</option>
                      
                    </select>
                  </div>
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
                  <input type="text" name="email" class="required only-email">
                </div>
                
              </div>
              <div class="col-md-2">

                <div class="form-group">
                  <label>Mobile*</label>


                  <div class="manic-dropdown">
                    <select name="mobile_country" class="required">
                      <option value="">Select one</option>

                      <option value="86">CHINA</option>
                      <option value="852">HONG KONG</option>
                      <option value="62">INDONESIA</option>
                      <option value="60">MALAYSIA</option>
                      <option value="65">SINGAPORE</option>
                      <option value="886">TAIWAN</option>
                      <option value="66">THAILAND</option>
                      <option value="00">CANADA</option>
                      <option value="01">USA</option>
                      <option value="06">MALDIVES</option>
                      <option value="07">RUSSIA</option>
                      <option value="20">EGYPT</option>
                      <option value="21">ALGERIA</option>
                      <option value="23">MAURITIUS</option>
                      <option value="26">ZIMBABWE</option>
                      <option value="27">SOUTH AFRICA</option>
                      <option value="31">NETHERLANDS</option>
                      <option value="32">BELGIUM</option>
                      <option value="33">FRANCE</option>
                      <option value="34">SPAIN</option>
                      <option value="35">MALTA</option>
                      <option value="36">HUNGARY</option>
                      <option value="39">ITALY</option>
                      <option value="40">ROMANIA</option>
                      <option value="41">SWITZERLAND</option>
                      <option value="43">AUSTRIA</option>
                      <option value="44">UNITED KINGDOM</option>
                      <option value="45">DENMARK</option>
                      <option value="46">SWEDEN</option>
                      <option value="47">NORWAY</option>
                      <option value="48">POLAND</option>
                      <option value="49">GERMANY</option>
                      <option value="50">HONDURAS</option>
                      <option value="51">PORTUGAL</option>
                      <option value="52">MEXICO</option>
                      <option value="53">MACAU SPECIAL ADMINISTRATIVE REGION</option>
                      <option value="54">ARGENTINA</option>
                      <option value="55">BRAZIL</option>
                      <option value="56">CHILE</option>
                      <option value="58">FINLAND</option>
                      <option value="61">AUSTRALIA</option>
                      <option value="63">PHILIPPINES</option>
                      <option value="64">NEW ZEALAND</option>
                      <option value="66">THAILAND</option>
                      <option value="67">BRUNEI</option>
                      <option value="72">IRELAND</option>
                      <option value="75">PAPUA N. GUINEA</option>
                      <option value="78">PUERTO RICO</option>
                      <option value="80">KOREA</option>
                      <option value="81">JAPAN</option>
                      <option value="84">VIETNAM</option>
                      <option value="89">BANGLADESH</option>
                      <option value="90">NAURU</option>
                      <option value="91">INDIA</option>
                      <option value="92">PAKISTAN</option>
                      <option value="94">SRI LANKA</option>
                      <option value="95">MYANMAR</option>
                      <option value="96">SAUDI ARABIA AND KUWAIT</option>
                      <option value="97">UAE</option>
                      <option value="98">IRAN</option>
                      <option value="855">CAMBODIA</option>
                      
                    </select>
                  </div>

                      
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>&nbsp;</label>
                  <input type="text" name="mobile_number" class="required">
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
                  <input type="text" name="address_line_01" class="required">
                  <input type="text" name="address_line_02">
                  <input type="text" name="address_line_03">
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
                    <select name="address_country" class="required">
                      <option value="">Select one</option>

                      <option value="CHINA">CHINA</option>
                      <option value="HONG KONG">HONG KONG</option>
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
                  <input type="text" name="address_state" class="required">
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
                  <input type="text" name="address_city" class="required">
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Post code*</label>
                  <input type="text" name="address_postal_code" class="required only-numbers">
                </div>

              </div>
            </div>


            <!--
               _  ___
              / |/ _ \
              | | | | |
              | | |_| |
              |_|\___/

            -->

            <div class="row">
              <div class="col-md-4">

                <div class="form-group">
                  <label>Preferred language</label>
                  <div class="manic-dropdown">
                    <select name="preferred_language">
                      <option value="">Select one</option>
                      <option value="EN">ENGLISH</option>
                      <option value="ZT">繁體中文</option>
                      <option value="ZH">简体中文</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>Pin</label>
                  <input type="password" name="pin" class="required">
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>Confirm Pin</label>
                  <input type="password" name="pin_confirm" class="required">
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
                      <input value="YES" type="checkbox" name="head_of_state">
                      <span></span>Head of state, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input value="YES" type="checkbox" name="subscribe_to_gra">
                      <span></span>Subscribe to Genting Rewards Alliance updates, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input value="YES" type="checkbox" name="privacy_policy">
                      <span></span>Privacy policy, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input value="YES" type="checkbox" name="promo_permission">
                      <span></span>Promo permission, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </label>
                  </div>
                </div>

              </div>
            </div> <!-- row -->



            <!-- 
            <div class="row">
              <div class="col-md-3">

                <div class="form-group">
                  <label>Preferred Language</label>
                  <div class="manic-dropdown">
                    <select name="preferred_language">
                      <option value="">Select one</option>
                      <option value="EN">ENGLISH</option>
                      <option value="ZT">繁體中文</option>
                      <option value="ZH">简体中文</option>
                    </select>
                  </div>
                </div>
                
              </div>
              <div class="col-md-3">

                <div class="form-group">
                  <label>Preferred Currency (?)</label>
                  <div class="manic-dropdown">
                    <select name="currency_code">
                      <option value="">Select one</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </div>
                </div>

              </div>
            </div>
             -->

            <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <div class="cta-container">
                  
                  <a href="javascript:void(0);" class="square-cta large-version full-width-version form-check-submit-btn">Submit</a>

                </div>
              </div>
            </div> <!-- row -->


            <!-- 
            <div class="space100"></div>
            <div class="default-copy">
              <h5>create using</h5>
              <p>josh's document 'Reg_Check_Book_V4.pdf'</p>
              <p>fields from 'DRSXML Web Service_Ver11_1_For Vendor_20Nov17.pdf'</p>
              <p>valid input values from <a href="https://www.resortsworldatsea.com/api/get_dicts">https://www.resortsworldatsea.com/api/get_dicts</a></p>
              <div class="space30"></div>
                
              <h5>to create on frontend:</h5>
              <p>date picker</p>
              <p>stylized dropdown with scrollbar</p>
              <p>pin match check</p>
              <div class="space30"></div>

              <h5>to create on backend:</h5>
              <p>occupation</p>
              <p>nature_of_business</p>
              <p>pin - pin create</p>
              <p>pin_confirm - pin create</p>
              <p>date_of_birth, change date format from DD/MM/YYYY (input) to YYYY-MM-DD (to submit to drs)</p>
              <p>doc_issue_date, change date format from DD/MM/YYYY (input) to YYYY-MM-DD (to submit to drs)</p>
              <p>doc_expiry_date, change date format from DD/MM/YYYY (input) to YYYY-MM-DD (to submit to drs)</p>
              <div class="space30"></div>

              <h5>parameters that might be missing:</h5>
              <p>currency_code **</p>
              <p>chinese_title</p>
              <p>chinese_last_name</p>
              <p>chinese_first_name</p>
              <p>doc_issue_date - added this already</p>
              <p>address_description - what will we put here? 'Address from RWAS website sign-up form' ?</p>
              <p>address_language_code - will this follow current language?</p>
              <div class="space30"></div>

              <h5>To discuss</h5>
              <p>are travel documents are required to create a user?</p>
              <p>can i pass an empty string to the api call?</p>
              <p>should 'Preferred language' be required?</p>
              
            </div>
            <div class="space100"></div>
            -->


          </form> <!-- account-register-form -->

          <div class="space100"></div>

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>



{{-- content --}}

@endsection