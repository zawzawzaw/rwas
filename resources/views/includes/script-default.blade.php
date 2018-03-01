@if( config('rwas.is_debug') )
    
  <!--
     ____  _______     _______ _     ___  ____  __  __ _____ _   _ _____   __  __  ___  ____  _____
    |  _ \| ____\ \   / / ____| |   / _ \|  _ \|  \/  | ____| \ | |_   _| |  \/  |/ _ \|  _ \| ____|
    | | | |  _|  \ \ / /|  _| | |  | | | | |_) | |\/| |  _| |  \| | | |   | |\/| | | | | | | |  _|
    | |_| | |___  \ V / | |___| |__| |_| |  __/| |  | | |___| |\  | | |   | |  | | |_| | |_| | |___
    |____/|_____|  \_/  |_____|_____\___/|_|   |_|  |_|_____|_| \_| |_|   |_|  |_|\___/|____/|_____|

  -->

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
  
  <!-- INSERT JS HERE -->
  <script type="text/javascript" src="{{url('../resources/assets/js/manic-polyfill.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/jquery-other/jquery-1.9.1.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/jquery-other/jquery.mousewheel.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/misc-js/mobile-detect.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/misc-js/preloadjs-0.4.0.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/gsap/src/minified/TweenMax.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/gsap/src/minified/jquery.gsap.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/gsap/src/minified/easing/EasePack.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/gsap/src/minified/utils/SplitText.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/gsap/src/minified/plugins/ScrollToPlugin.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/scrollmagic/scrollmagic/minified/ScrollMagic.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/slick-carousel/slick/slick.min.js')}}"></script>

  <!-- Date Picker -->
  <script type="text/javascript" src="{{url('../resources/assets/libs/jquery-ui-multidatepicker/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/libs/jquery-ui-multidatepicker/jquery-ui.multidatespicker.js')}}"></script>
  
  <!-- Google Closure -->
  <script type="text/javascript" src="{{url('../resources/assets/libs/google-closure/closure-library/closure/goog/base.js')}}"></script>
  <script type="text/javascript" src="{{url('../resources/assets/js/google-closure-dependency-list.js')}}"></script>
  <script type="text/javascript">
    goog.require('rwas.page.Default');
  </script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      page = new rwas.page.Default({});    
    });
  </script>

@else

  <!--
      ___  ____ _____ ___ __  __ ___ __________ ____    __  __  ___  ____  _____
     / _ \|  _ \_   _|_ _|  \/  |_ _|__  / ____|  _ \  |  \/  |/ _ \|  _ \| ____|
    | | | | |_) || |  | || |\/| || |  / /|  _| | | | | | |\/| | | | | | | |  _|
    | |_| |  __/ | |  | || |  | || | / /_| |___| |_| | | |  | | |_| | |_| | |___
     \___/|_|    |_| |___|_|  |_|___/____|_____|____/  |_|  |_|\___/|____/|_____|

  -->

  
  <script type="text/javascript" src="{{asset('js/minified/head.load.min.js')}}"></script>
  
  <!-- 
  need to test if this would work
  <script type="text/javascript">
    <?php // require_once('asset('js/minified/head.load.min.js')'); ?>
  </script>
  -->

  <script type="text/javascript">

    var PAGE_LIBRARY        = "{{asset('js/minified/libraries-about.min.js')}}";
    var PAGE_JS             = "{{asset('js/minified/page-about.min.js')}}";
    var PAGE_CSS            = "{{asset('css/style.css')}}";
    
    // font async loads (webfontloader library)
    window.WebFontConfig = {
      google: {
        families: ['Playfair Display:400,400i,700']
      },
      typekit: { id: 'bqi4xyp' }
    };

    window.head_js = head;
    window.head_js.load(PAGE_CSS);
    window.head_js.load(PAGE_LIBRARY, function() {
      window.head_js.load(PAGE_JS, function() {
        window.page = new rwas.page.About({});
      });
    });
    
  </script>

@endif