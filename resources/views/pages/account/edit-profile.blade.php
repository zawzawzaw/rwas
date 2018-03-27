@extends('layout.master')

@section('content')
  
  <div class="under-construction-disclaimer">
    A functionality demo <br>
    this is NOT the design
  </div>

  <article id="account-edit-user-form-section">
    <div class="container-fluid has-breakpoint">

      <div class="row">
        <div class="col-md-6 col-md-push-3">
          <h1>Edit Profile</h1>
        </div>
      </div> <!-- row -->


      <div class="row">
        <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

<div style="display: none;">
  <pre>
  @php
  print_r(json_encode($info, JSON_PRETTY_PRINT));
  @endphp
  </pre>
  <div class="space100"></div>
</div>





          <form id="account-edit-user-form" 
            class="default-form simple-form-check-02 ajax-version api-version"
            method="post"
            action="{{url('/api/user/update-profile')}}">

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
                  <label>Title</label>
                  <p>{{ $info['details']['title'] }}</p>
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>Name</label>
                  <p>{{ str_replace(['[', ']'], '', $info['details']['name']) }}</p>
                </div>
                
              </div>
              <div class="col-md-2">

                <div class="form-group">
                  <label>Date of Birth</label>
                  <p>{{ substr($info['profile']['date_of_birth'], 6, 8) . "/" . substr($info['profile']['date_of_birth'], 4, 2) . "/" . substr($info['profile']['date_of_birth'], 0, 4) }}</p>
                </div>

              </div>

              <div class="col-md-2">

                <div class="form-group">
                  <label>Nationality</label>
                  <p>{{ $info['profile']['nationality'] }}</p>
                </div>

              </div>
              <div class="col-md-2">

                <div class="form-group">
                  <label>Gender</label>
                  <p>{{ $info['profile']['gender'] }}</p>
                </div>

              </div>
            </div> <!-- row -->


            <hr>
            <div class="space30"></div>



            <!--
                ___ _____
               / _ \___ /
              | | | ||_ \
              | |_| |__) |
               \___/____/

            -->

            <!-- 
            <div class="row">
              <div class="col-md-3">

                <div class="form-group">
                  <label>Identification type</label>
                  <p>insert id type here</p>
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>ID or Passport number</label>
                  <p>insert passport number here</p>
                </div>

              </div>
              <div class="col-md-5">

                <div class="form-group">
                  <label>Travel document issued by</label>
                  <p>insert country here</p>
                </div>

              </div>
              
            </div>
            -->
            <!-- row -->



            <!--
                ___  _  _
               / _ \| || |
              | | | | || |_
              | |_| |__   _|
               \___/   |_|

            -->

            <!-- 
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label>Travel document issue date</label>
                  <p>insert date here</p>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Travel document expiry date</label>
                  <p>insert date here</p>
                </div>

              </div>
            </div>
            -->



            <!--
                ___  ____
               / _ \| ___|
              | | | |___ \
              | |_| |___) |
               \___/|____/

            -->

            


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
                  <input type="text" name="email" class="required only-email" value="{{ $info['profile']['email'] }}">
                </div>
                
              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Mobile*</label>
                  <input type="text" name="mobile" class="required only-numbers" value="{{ $info['profile']['mobile'] }}">
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
                  <input type="text" name="address_line_01" class="required" value="{{ $info['profile']['address_line_01'] }}">
                  <input type="text" name="address_line_02" value="">
                  <input type="text" name="address_line_03" value="">
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

                  <div class="manic-dropdown" data-initial-value="{{ $info['profile']['address_country'] }}">
                    <select name="address_country" class="required">
                      <option value="">Select one</option>

                      <option value="MAINLAND CHINA">MAINLAND CHINA</option>
                      <option value="HONG KONG SPECIAL ADMINSTRATIVE REGION">HONG KONG SPECIAL ADMINSTRATIVE REGION</option>
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
                      <option value="MACAU SPECIAL ADMINISTRATIVE REGION">MACAU SPECIAL ADMINISTRATIVE REGION</option>
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
                  <input type="text" name="address_state" class="required" value=""><!-- {{ $info['profile']['address_state'] }} -->
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
                  <input type="text" name="address_city" class="required" value=""><!-- {{ $info['profile']['address_city'] }} -->
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Post code*</label>
                  <input type="text" name="address_postal_code" class="required" value="{{ $info['profile']['address_postal_code'] }}">
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
                  <div class="manic-dropdown" data-initial-value="{{ $info['details']['preferred_language'] }}">
                    <select name="preferred_language">
                      <option value="">Select one</option>
                      <option value="EN">ENGLISH</option>
                      <option value="ZT">繁體中文</option>
                      <option value="ZH">简体中文</option>
                    </select>
                  </div>
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
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <div class="cta-container">
                  
                  <a href="javascript:void(0);" class="square-cta large-version full-width-version form-check-submit-btn">Submit</a>

                </div>
              </div>
            </div> <!-- row -->

          </form> <!-- account-register-form -->

          <div class="space100"></div>

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>



{{-- content --}}

@endsection