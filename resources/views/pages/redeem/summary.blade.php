@extends('layout.master')

@section('content')

  <div class="under-construction-disclaimer">
    A functionality demo <br>
    this is NOT the design
  </div>

  <article id="redeem-cabin-type-header-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-cabin-type-header">
            <div class="row">
              <div class="col-md-4">

                <div id="redeem-cabin-type-header-itinerary-info">
                  <p>6 Days 5 Nights</p>
                  <p>Hongkong-Hongkong</p>
                </div>

              </div>
              <div class="col-md-3">

                <div id="redeem-cabin-type-header-ship-info">
                  <p>Ship Info.</p>
                  <p>World Dream</p>
                </div>

              </div>
              <div class="col-md-2">

                <div id="redeem-cabin-type-header-ship-logo">
                  <p>insert logo</p>
                </div>

              </div>
              <div class="col-md-3">
                
                <div id="redeem-cabin-type-header-departure-date">
                  <p>Departure Date.</p>
                  <p>21 feb 2018</p>
                </div>

              </div>
            </div>
          </div> <!-- redeem-cabin-type-header -->



        </div> <!-- col-md-12 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
  </article> <!-- redeem-cabin-type-header-section -->



  <article id="redeem-cabin-type-selected-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-cabin-type-selected">
            <div class="row">
              <div class="col-md-3">

                <p>2 pax</p>

              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-6">
                    <p>Cabin Type</p>
                  </div>
                  <div class="col-md-6">
                    <p>Redemption Rate</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p>Oceanviews (window) stateroom</p>
                  </div>
                  <div class="col-md-6">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </article> <!-- redeem-cabin-type-selected-section -->



  <!--
     _____ ___   ___ _____ _____ ____
    |  ___/ _ \ / _ \_   _| ____|  _ \
    | |_ | | | | | | || | |  _| | |_) |
    |  _|| |_| | |_| || | | |___|  _ <
    |_|   \___/ \___/ |_| |_____|_| \_\

  -->

  <article id="redeem-cabin-type-footer-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-8">

          <div id="redeem-cabin-type-subsequent-cabin-form-container">
            <div id="redeem-cabin-type-subsequent-cabin-form">
              <p>Your are eligable for 1 subsequent cabin redemption</p>
              <p>No of pax for the subsequent cabin</p>

              <div class="row">
                <p>pax form</p>
                <p>submit button</p>
              </div>
            </div> <!-- redeem-cabin-type-subsequent-cabin-form -->
          </div> <!-- redeem-cabin-type-subsequent-cabin-form-container -->

        </div>
        <div class="col-md-4">

          <div id="redeem-cabin-type-checkout-cta-container">
            
            <a href="{{url('/checkout')}}" class="square-cta large-version full-width-version" id="redeem-cabin-type-checkout-cta">Proceed To Checkout</a>
            <!-- <a href="javascript:void(0);" class="square-cta large-version full-width-version" id="redeem-cabin-type-checkout-cta">Proceed To Checkout</a> -->

          </div> <!-- redeem-cabin-type-checkout-cta-container -->

        </div>
      </div>
    </div>
  </article> <!-- redeem-cabin-type-footer-section -->


{{-- content --}}
@endsection
