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

    <div id="page-preloader">
      <div id="page-preloader-line-01"></div>
      <div id="page-preloader-line-02">
        <div class="line-a"></div>
        <div class="line-b"></div>
      </div>
    </div>

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
    
  </body>
</html>