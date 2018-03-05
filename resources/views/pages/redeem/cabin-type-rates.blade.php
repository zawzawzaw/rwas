@extends('layout.master')

@section('content')

  <div class="under-construction-disclaimer">
    A functionality demo <br>
    this is NOT the design
  </div>

  <!--
     _   _ _____    _    ____  _____ ____
    | | | | ____|  / \  |  _ \| ____|  _ \
    | |_| |  _|   / _ \ | | | |  _| | |_) |
    |  _  | |___ / ___ \| |_| | |___|  _ <
    |_| |_|_____/_/   \_\____/|_____|_| \_\

  -->

  <article id="redeem-search-header-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-search-header">

            <div id="redeem-search-header-title">
              <h2>Plan your cruise</h2>
            </div>

            <form id="itinerary-search-form"
              action="{{url('/cruise/get_itineraries')}}"
              class="default-form simple-form-check-02 ajax-version api-version">
              <div class="row">
                <div class="col-md-10">

                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Departing From</label>
                        <input type="text" name="port" value="CNSHA">
                      </div>

                    </div>
                    <div class="col-md-4">

                      <div class="form-group">
                        <label>Month & Year</label>
                        <input type="text" name="date" value="01/2018">
                      </div>

                    </div>
                    <div class="col-md-2">

                      <div class="form-group">
                        <label>Pax</label>
                        <input type="text" name="pax" value="AA">
                      </div>

                    </div>
                  </div>
                  
                </div>
                <div class="col-md-2">

                  <div class="cta-container">
                    <a href="javascript:void(0);" class="square-cta full-width-version form-check-submit-btn">Search</a>
                  </div>
                  
                </div>
              </div>
            </form> <!-- itinerary-search-form -->
            
          </div> <!-- redeem-search-header -->

          <div class="row">
            <div class="col-md-10">
              <div id="redeem-search-header-expanded" class="hidden-version">

                <div class="row">
                  <div class="col-md-6">

                    <div id="redeem-search-valid-departure-ports" class="redeem-search-options">
                      <p data-value="">Singapore</p>
                      <p data-value="">Hong Kong</p>
                      <p data-value="">Guanzhou</p>
                      <p data-value="">Kuala Lumpur</p>
                    </div> <!-- redeem-search-valid-departure-ports -->

                  </div>
                  <div class="col-md-4">

                    <div id="redeem-search-valid-departure-dates" class="redeem-search-options">
                      <p data-value="">Jan 2017</p>
                      <p data-value="">Feb 2017</p>
                      <p data-value="">Mar 2017</p>
                      <p data-value="">Apr 2017</p>
                    </div> <!-- redeem-search-valid-departure-dates -->

                  </div>
                  <div class="col-md-2">

                    <div id="redeem-search-valid-pax">

                      <div class="form-group">
                        <label>Adult</label>
                        <div class="number-plus-minus" id="redeem-search-valid-pax-adult">
                          <div class="number-minus"></div>
                          <div class="number-value">2</div>
                          <div class="number-add"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Child</label>
                        <div class="number-plus-minus" id="redeem-search-valid-pax-child">
                          <div class="number-minus"></div>
                          <div class="number-value">0</div>
                          <div class="number-add"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Infant</label>
                        <div class="number-plus-minus" id="redeem-search-valid-pax-infant">
                          <div class="number-minus"></div>
                          <div class="number-value">0</div>
                          <div class="number-add"></div>
                        </div>
                      </div>
                    </div> <!-- redeem-search-valid-pax -->

                  </div>
                </div>

              </div> <!-- redeem-search-header-expanded -->

            </div> <!-- col-md-10 -->
          </div> <!-- row -->


        </div> <!-- col-md-12 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
  </article> <!-- redeem-search-header-section -->

  


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


  <!--
      ____    _    ____ ___ _   _   _____ _____ __  __ ____  _        _  _____ _____
     / ___|  / \  | __ )_ _| \ | | |_   _| ____|  \/  |  _ \| |      / \|_   _| ____|
    | |     / _ \ |  _ \| ||  \| |   | | |  _| | |\/| | |_) | |     / _ \ | | |  _|
    | |___ / ___ \| |_) | || |\  |   | | | |___| |  | |  __/| |___ / ___ \| | | |___
     \____/_/   \_\____/___|_| \_|   |_| |_____|_|  |_|_|   |_____/_/   \_\_| |_____|

  -->


  <script type="text/template" id="redeem-cabin-type-option-item-template">
    <div class="redeem-cabin-type-option-item">
      cabin name <br>
      cabin price
    </div>
  </script>





  <!--
        ___  ____ _____ ___ ___  _   _
       / _ \|  _ \_   _|_ _/ _ \| \ | |
      | | | | |_) || |  | | | | |  \| |
      | |_| |  __/ | |  | | |_| | |\  |
       \___/|_|    |_| |___\___/|_| \_|

  -->

  <article id="redeem-cabin-type-option-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-cabin-type-option">


            <div id="redeem-cabin-type-option-header">
              <div class="row">
                <div class="col-md-9">
                  <p>Cabin Type</p>
                </div>
                <div class="col-md-3">
                  <p>Redemption Rate</p>
                </div>
              </div>
            </div> <!-- redeem-cabin-type-option-header -->

            <div id="redeem-cabin-type-option-item-container">
              
              <a href="{{url('/summary')}}" class="redeem-cabin-type-option-item">
                <div class="row">
                  <div class="col-md-9">
                    <p>Standing</p>
                  </div>
                  <div class="col-md-3">
                    <p>100 GP</p>
                  </div>
                </div>
              </a>

              <a href="{{url('/summary')}}" class="redeem-cabin-type-option-item">
                <div class="row">
                  <div class="col-md-9">
                    <p>Inside stateroom</p>
                  </div>
                  <div class="col-md-3">
                    <p>100 GP</p>
                  </div>
                </div>
              </a>

              <a href="{{url('/summary')}}" class="redeem-cabin-type-option-item">
                <div class="row">
                  <div class="col-md-9">
                    <p>Oceanviews (window) stateroom</p>
                  </div>
                  <div class="col-md-3">
                    <p>100 GP</p>
                  </div>
                </div>
              </a>

              <a href="{{url('/summary')}}" class="redeem-cabin-type-option-item">
                <div class="row">
                  <div class="col-md-9">
                    <p>Balcony stateroom</p>
                  </div>
                  <div class="col-md-3">
                    <p>100 GP</p>
                  </div>
                </div>
              </a>

              <a href="{{url('/summary')}}" class="redeem-cabin-type-option-item">
                <div class="row">
                  <div class="col-md-9">
                    <p>Junior Suite</p>
                  </div>
                  <div class="col-md-3">
                    <p>100 GP</p>
                  </div>
                </div>
              </a>

            </div> <!-- redeem-cabin-type-option-item-container -->



          </div> <!-- redeem-cabin-type-option -->

        </div>
      </div>
    </div>
  </article> <!-- redeem-cabin-type-option-section -->

{{-- content --}}
@endsection
