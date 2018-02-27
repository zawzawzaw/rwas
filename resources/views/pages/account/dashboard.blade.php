@extends('layout.master')

@section('content')
  
  <div class="under-construction-disclaimer">
    A functionality demo <br>
    this is NOT the design
  </div>

  <article id="account-dashboard-section">
    <div class="container-fluid has-breakpoint">

      <div class="row">
        <div class="col-md-6 col-md-push-3">
          <h1>Account</h1>
        </div>
      </div> <!-- row -->


      <div class="row">
        <div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

          <div id="account-dashboard-content">
            <div class="default-copy">



              <div class="row">
                <div class="col-md-6">
                  <p>
                    Name: {{ $info['details']['name'] }}<br/>
                    Membership ID: {{ $info['details']['membership_id'] }}<br/><br/>

                    GP (Visible Point or SP): {{ $info['points']['gp'] }}<br/>
                    CC (Loyalty Point): {{ $info['points']['cc'] }}<br/><br/>

                    Country Name: {{ $info['details']['home_country_name'] }}<br/>
                    Preferred Language: {{ $info['details']['preferred_language'] }}<br/>
                  </p>
                </div>
                <div class="col-md-6">
                  <p>
                    Tier Code: {{ $info['tier']['tier_code'] }}<br/>
                    Tier Name: {{ $info['tier']['tier_name'] }}<br/>
                    Tier Points: {{ $info['tier']['tier_points'] }}
                  </p>
                  <div class="cta-container">
                    <a href="{{ url('/account/edit-profile') }}" class="square-cta">Edit Profile</a>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-12">

                  <h4>Raw Data</h4>

                  <pre>
                    @php
                    print_r(json_decode(json_encode($raw), true));
                    @endphp
                  </pre>

                </div>
              </div>

              
              <!-- 
              <p>
                Country Region Code: {{ $info['details']['home_country_region_code'] }}<br/>
                Country Name: {{ $info['details']['home_country_name'] }}<br/>
                Currency: {{ $info['details']['home_currency'] }}<br/>
                


                
                Preferred Language: {{ $raw->CustomerPreferredLanguage }}<br/>
                Date Of Birth: {{ $raw->CustomerDateOfBirth }}<br/>
                Type: {{ $raw->CustomerTypeDescription }}<br/>
                Email: {{ $raw->EmailAddress }}<br/>
                @foreach($raw->Contact->ContactSection->Cust_Contact as $contact)
                {{ $contact->Type }}: {{ $contact->ContactNo}}<br/>
                @endforeach
                Region Code: {{ $raw->CustomerRegionCode }}<br/>
                Country: {{ $raw->CustomerNAT }}<br/>
                Passport No: {{ $raw->CustomerICPassportNo }}<br/>
                Passport Type: {{ $raw->CustomerICPassportType }}<br/>
                Passport Country: {{ $raw->CustomerICPassportCountry }}<br/>
                Address 1: {{ $raw->CustomerAddressLine1 }}<br/>
                Address 2: {{ $raw->CustomerAddressLine2 }}<br/>
                Address 3: {{ $raw->CustomerAddressLine3 }}<br/>
                Address City: {{ $raw->CustomerAddressCity }}<br/>
                Address State: {{ $raw->CustomerAddressState->{0} }}<br/>
                Address Postal Code: {{ $raw->CustomerAddressPostCode }}<br/>
                Address Country: {{ $raw->CustomerAddressCountry }}<br/><br/>
                Loyalty Point Balance: {{ $raw->LoyaltyPointBalance }}<br/>
                E Cash Balance: {{ $raw->CashECashBalance }}<br/>
              </p>
              -->

            </div>
          </div>

          

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>



{{-- content --}}

@endsection
