@extends('layout.master')

@section('content')

  <div class="under-construction-disclaimer">
    a functionality demo <br>
    this is NOT the design
  </div>

  <article id="redeem-search-header-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-search-header">

            <div id="redeem-search-header-title">
              <h2>Plan your cruise</h2>
            </div>

            <form id="itinerary-search-form"
              class="default-form simple-form-check-02">
              <div class="row">
                <div class="col-md-10">

                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Departing From</label>
                        <input type="text" name="departure_port">
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
                        <input type="text" name="pax">
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
                        <div class="number" id="redeem-search-valid-pax-adult">
                          <div class="number-minus"></div>
                          <div class="number-value">2</div>
                          <div class="number-add"></div>
                        </div>
                      </div>

                      <div class="form-group" id="redeem-search-valid-pax-child">
                        <label>child</label>
                        <div class="number">
                          <div class="number-minus"></div>
                          <div class="number-value">0</div>
                          <div class="number-add"></div>
                        </div>
                      </div>

                      <div class="form-group" id="redeem-search-valid-pax-infant">
                        <label>infant</label>
                        <div class="number">
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


  <article id="redeem-search-result-section">
    <div class="container-fluid has-breakpoint">
      <div class="row">
        <div class="col-md-12">

          <div id="redeem-search-result">
            <p>result 1</p>
            <p>result 2</p>
            <p>result 3</p>
          </div> <!-- redeem-search-result -->

        </div> <!-- col-md-12 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
  </article> <!-- redeem-search-result-section -->

{{-- content --}}
@endsection
