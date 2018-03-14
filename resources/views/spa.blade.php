<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ env("APP_NAME") }}</title>
        <!-- <link href="{/{ mix('css/style.css') }}" rel="stylesheet"/> -->
        <!-- <link href="{/{ mix('css/critical_style.css') }}" rel="stylesheet"/> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <link rel="shortcut icon" href="images/icons/favicon.ico" type="image/x-icon" />

        <title>@yield('head-page-title','Resorts World at Sea')</title>
        <meta name="description" content="@yield('head-page-description','World-class leisure, entertainment and hospitality at sea')">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui"/>
        <!-- INSERT GOOGLE ANALYTICS HERE -->

        <!-- INSERT FONTS HERE -->

        <!-- Playfair Display -->
        <!-- Regular, Italic, Bold -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">


        <!-- Proxima Nova -->
        <!-- Regular, Semibold, Bold -->
        <!-- 
        <script src="https://use.typekit.net/bqi4xyp.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        -->



        <!-- INSERT CSS HERE -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/critical_style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">
        <!-- <link rel="stylesheet" type="text/css" href="{\{mix('css/style2.css')}}"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="@yield('body-class','default-page') {{Lang::locale()}}-version">
        <div id="app">
            <app ref="rootApp"></app>
        </div>

        <script src="{{ asset('/js/app.js') }}?v={{ date('YmdHis') }}"></script>
        <!-- <script src="{/{ mix('js/app.js') }}"></script> -->
        <!-- INSERT JS HERE -->
        <script type="text/javascript" src="{{url('/assets/js/manic-polyfill.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/jquery-other/jquery-1.9.1.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/jquery-other/jquery.mousewheel.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/misc-js/mobile-detect.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/misc-js/preloadjs-0.4.0.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/gsap/src/minified/TweenMax.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/gsap/src/minified/jquery.gsap.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/gsap/src/minified/easing/EasePack.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/gsap/src/minified/utils/SplitText.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/scrollmagic/scrollmagic/minified/ScrollMagic.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/slick-carousel/slick/slick.min.js')}}"></script>

        <!-- Date Picker -->
        <script type="text/javascript" src="{{url('/assets/libs/jquery-ui-multidatepicker/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/libs/jquery-ui-multidatepicker/jquery-ui.multidatespicker.js')}}"></script>
        
        <!-- Google Closure -->
        <script type="text/javascript" src="{{url('/assets/libs/google-closure/closure-library/closure/goog/base.js')}}"></script>
        <script type="text/javascript" src="{{url('/assets/js/google-closure-dependency-list.js')}}"></script>
        <script type="text/javascript">
            goog.require('rwas.page.Default');
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
            page = new rwas.page.Default({});    
            });
        </script>
    </body>
</html>