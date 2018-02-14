@extends('layout.master')

@section('content')


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
            class="default-form simple-form-check-02"
            method="post"
            action="{{url('/user/create')}}">

            <div class="row">
              <div class="col-md-2">

                <div class="form-group">
                  <label>Title</label>
                  <div class="manic-dropdown">
                    <select name="title">
                      <option value="">Select one</option>
                      <option value="MR">Mr.</option>
                      <option value="MISS">Ms.</option>
                      <option value="MRS">Mrs.</option>

                    </select>
                  </div>
                </div>

              </div>
              <div class="col-md-4">

                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name">
                </div>
                
              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name">
                </div>

              </div>
            </div> <!-- row -->

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

            <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <div class="cta-container">
                  
                  <a href="javascript:void(0);" class="square-cta large-version full-width-version form-check-submit-btn">Submit</a>

                </div>
              </div>
            </div> <!-- row -->


  <div class="space100"></div>

  
  
  
  chinese_title
  chinese_last_name
  chinese_first_name
  gender
  date_of_birth
  nationality
  email
  mobile_number
  doc_type
  doc_no
  doc_country
  doc_issue_date
  doc_expiry_date
  address_language_code
  address_description
  address_line_01
  address_line_02
  address_line_03
  address_city
  address_state
  address_country
  address_postal_code

          </form> <!-- account-register-form -->

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>



{{-- content --}}
@endsection
