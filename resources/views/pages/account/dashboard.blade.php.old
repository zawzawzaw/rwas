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

                  <!-- parsed account-dashboard-name-span in JS -->
                  <p>
                    Name: <span id="account-dashboard-name-span">{{ $info['details']['name'] }}</span><br/>
                    Membership ID: {{ $info['details']['membership_id'] }}<br/><br/>

                    GP (Visible Point or SP): {{ number_format($info['points']['gp'], 0) }}<br/>
                    CC (Loyalty Point): {{ number_format($info['points']['cc'], 0) }}<br/><br/>

                    Preferred Language: {{ $info['details']['preferred_language'] }}<br/>
                  </p>
                </div>
                <div class="col-md-6">
                  <p>
                    Tier Name: {{ $info['tier']['tier_name'] }}<br/>
                    Tier Points: {{ number_format($info['tier']['tier_points'], 0) }}
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
