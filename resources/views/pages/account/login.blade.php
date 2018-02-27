@extends('layout.master')

@section('content')
  
  <div class="under-construction-disclaimer">
    A functionality demo <br>
    this is NOT the design
  </div>

  <article id="account-login-section">
    <div class="container-fluid has-breakpoint">

      <div class="row">
        <div class="col-md-6 col-md-push-3">
          <h1>Login</h1>
        </div>
      </div> <!-- row -->


      <div class="row">
        <div class="col-md-8 col-md-push-2 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">

            
          <form id="account-login-form" method="POST" action="{{ route('user.login') }}" class="default-form simple-form-check">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                <label>Member ID</label>
                <input type="text" class="required" name="id" value="{{ old('id') }}" autofocus>

                @if ($errors->has('id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('id') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label>Pin</label>
                <input type="password" class="required" name="password">

                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              <div class="cta-container">
                <a href="javascript:void(0);" class="square-cta large-version full-width-version form-check-submit-btn">Login</a>

                @if ($errors->has('customErr'))
                  <span class="help-block">
                    <strong>{{ $errors->first('customErr') }}</strong>
                  </span>
                @endif
              </div>

          </form>


          <div class="space100"></div>

          
          <p>If Member ID: '29' and Pin '222222' doesn't work, open <a href="http://52.77.205.209/drs_reset_user_29.php" target="_blank" style="text-decoration: underline !important;">this link</a> in a new tab and try again</p>
          

        </div> <!-- col -->
      </div> <!-- row -->

    </div> <!-- container-fluid -->
  </article>



{{-- content --}}

@endsection
