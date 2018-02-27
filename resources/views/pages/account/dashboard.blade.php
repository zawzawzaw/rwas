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
print_r(json_encode($raw, JSON_PRETTY_PRINT));
@endphp
                  </pre>

                </div>
              </div>
            </div>
          </div> <!-- account-dashboard-content -->

          <div class="space100"></div>
          

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>



{{-- content --}}

@endsection
