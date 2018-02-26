@extends('layout.master')

@section('content')

  <div class="under-construction-disclaimer">
    a functionality demo <br>
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
                        <input type="text" name="port">
                      </div>

                    </div>
                    <div class="col-md-4">

                      <div class="form-group">
                        <label>Date (Year & Month)</label>
                        <input type="text" name="date">
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
              <div id="redeem-search-header-expanded">

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
                        <label>adult</label>
                        <div class="number-plus-minus" id="redeem-search-valid-pax-adult">
                          <div class="number-minus"></div>
                          <div class="number-value">2</div>
                          <div class="number-add"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>child</label>
                        <div class="number-plus-minus" id="redeem-search-valid-pax-child">
                          <div class="number-minus"></div>
                          <div class="number-value">0</div>
                          <div class="number-add"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>infant</label>
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


  <!--
     ____  _____ ____  _   _ _   _____   _____ _____ __  __ ____  _        _  _____ _____ ____
    |  _ \| ____/ ___|| | | | | |_   _| |_   _| ____|  \/  |  _ \| |      / \|_   _| ____/ ___|
    | |_) |  _| \___ \| | | | |   | |     | | |  _| | |\/| | |_) | |     / _ \ | | |  _| \___ \
    |  _ <| |___ ___) | |_| | |___| |     | | | |___| |  | |  __/| |___ / ___ \| | | |___ ___) |
    |_| \_\_____|____/ \___/|_____|_|     |_| |_____|_|  |_|_|   |_____/_/   \_\_| |_____|____/

  -->

  <script type="text/template" id="redeem-search-result-item-template">
    <div class="redeem-search-result-item">
      <div class="item-header">
        <div class="row">
          <div class="col-md-6">
            <p class="itinerary-name">{{ '{' . 'iten_code'. '}' }}</p>
          </div>
          <div class="col-md-6">
            <p class="ship-name">{{ '{' . 'ship_name'. '}' }}</p>
          </div>
        </div>
      </div>
      <div class="item-content">
        <h4>Departure Date</h4>
        <div class="item-date-container">
          <div class="row">
            {{ '{' . 'date_items'. '}' }}
          </div>
        </div>
      </div>
    </div>
  </script>

  <script type="text/template" id="redeem-search-result-item-date-template">
    <div class="col-md-2 col-sm-4 col-xs-6">
      <div class="item-date" 
        data-iten-code="{{ '{' . 'iten_code'. '}' }}"
        data-ship-code="{{ '{' . 'ship_code'. '}' }}"
        data-cruise-id="{{ '{' . 'cruise_id'. '}' }}"
        data-departure-date="{{ '{' . 'departure_date'. '}' }}">
        <div class="item-date-header">
          <h6>{{ '{' . 'date_str'. '}' }}</h6>
        </div>
        <div class="item-date-price">
          <p>From</p>
          <div class="price">
            {{ '{' . 'price_str'. '}' }}
          </div>
        </div>
      </div>
    </div>
  </script>

  <!--
     ____  _____ ____  _   _ _   _____
    |  _ \| ____/ ___|| | | | | |_   _|
    | |_) |  _| \___ \| | | | |   | |
    |  _ <| |___ ___) | |_| | |___| |
    |_| \_\_____|____/ \___/|_____|_|

  -->

  <article id="redeem-search-result-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-search-result">

            <!-- 
            <div class="redeem-search-result-item">
              <div class="item-header">
                <div class="row">
                  <div class="col-md-6">
                    div
                  </div>
                  <div class="col-md-6">
                  </div>
                </div>
              </div>
              <div class="item-content">
                <h4>Departure Date</h4>
                <div class="item-date-container">


                  <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="item-date" 
                        data-iten-code=""
                        data-ship-code=""
                        data-cruise-id=""
                        data-departure-date="">

                        <div class="item-date-header">
                          <h6>05 Feb</h6>
                        </div>
                        <div class="item-date-price">
                          <p>From</p>
                          <div class="price">
                            <span class="number">300</span>
                            <span class="currency">gp</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6">
                      <div class="item-date" 
                        data-iten-code=""
                        data-ship-code=""
                        data-cruise-id=""
                        data-departure-date="">

                        <div class="item-date-header">
                          <h6>05 Feb</h6>
                        </div>
                        <div class="item-date-price">
                          <p>From</p>
                          <div class="price">
                            <span class="number">300</span>
                            <span class="currency">gp</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                
              </div>
            </div> 
            
             -->
            <!-- redeem-search-result-item -->

          </div> <!-- redeem-search-result -->

        </div> <!-- col-md-12 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
  </article> <!-- redeem-search-result-section -->

{{-- content --}}
@endsection
