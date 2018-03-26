<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en" class="no-js"><!--<![endif]-->
  <head>
    @include('includes.head')
  </head>

  <body class="@yield('body-class','default-page') {{Lang::locale()}}-version">
    
    @section('preloader')
      @include('includes.preloader')
    @show
    
    @section('mobile-header')
      @include('includes.mobile-header')
    @show

    <div id="page-wrapper">
      <div id="page-wrapper-content">

        @section('desktop-header')
          @include('includes.desktop-header')
        @show

        
        @yield('content')


        @section('mobile-footer')
          @include('includes.mobile-footer')
        @show

        @section('desktop-footer')
          @include('includes.desktop-footer')
        @show

      </div> <!-- page-wrapper-content -->
    </div> <!-- page-wrapper -->

    @section('script')
      @include('includes.script-default')
    @show

    <script>
      $(window).load(function(){
      console.log("Regexer loaded");
      $(document).on("keypress", ".alphaRegex", function(e) {
        console.log("Alpha regex loaded");
        var key = e.key;
        if(key.toLowerCase()==="backspace" || key.toLowerCase()==="delete") {
            return true;
        }

        var te = /^[a-z]+$/i;

        var tt = te.test(key);

        if(tt===false){
            e.preventDefault();
        }

        return tt;
      }); 
      $(document).on("keypress", ".alphaNumericRegex", function(e) {
        console.log("Alpha numeric regex loaded");
        var key = e.key;
        if(key.toLowerCase()==="backspace" || key.toLowerCase()==="delete") {
            return true;
        }

        var te = /^[a-z\d\ ]+$/i;
        
        var tt = te.test(key);

        if(tt===false){
            e.preventDefault();
        }

        return tt;
      }); 
      $(document).on("keypress", ".numericRegex", function(e) {
        console.log("Numeric regex loaded");
        var key = e.key;
        if(key.toLowerCase()==="backspace" || key.toLowerCase()==="delete") {
            return true;
        }

        var te = /^[\d]+$/i;

        var tt = te.test(key);

        if(tt===false){
            e.preventDefault();
        }

        return tt;
      }); 
      $(".noTypeInput").on("keypress", function(e){
        console.log("No input load");
        e.preventDefault();
      return true;
    });
    });
    </script>
    
  </body>
</html>