@extends('layout.master')

@section('content')


  <!--
       ____    _    _   _ _   _ _____ ____
      | __ )  / \  | \ | | \ | | ____|  _ \
      |  _ \ / _ \ |  \| |  \| |  _| | |_) |
      | |_) / ___ \| |\  | |\  | |___|  _ <
      |____/_/   \_\_| \_|_| \_|_____|_| \_\

  -->

  <div class="scroll-target" data-value="banner"></div>
  <article id="home-banner-section">
    <p>home banner</p>
  </article> <!-- home-banner-section -->

  <!--
       __  __ _____ __  __ ____  _____ ____  ____  _   _ ___ ____
      |  \/  | ____|  \/  | __ )| ____|  _ \/ ___|| | | |_ _|  _ \
      | |\/| |  _| | |\/| |  _ \|  _| | |_) \___ \| |_| || || |_) |
      | |  | | |___| |  | | |_) | |___|  _ < ___) |  _  || ||  __/
      |_|  |_|_____|_|  |_|____/|_____|_| \_\____/|_| |_|___|_|

  -->

  <div class="scroll-target" data-value="membership"></div>
  <article id="home-membership-section">
    <p>membership area</p>
  </article> <!-- home-membership-section -->


  <!--
       ___ _____ ___ _   _ _____ ____      _    ______   __
      |_ _|_   _|_ _| \ | | ____|  _ \    / \  |  _ \ \ / /
       | |  | |  | ||  \| |  _| | |_) |  / _ \ | |_) \ V /
       | |  | |  | || |\  | |___|  _ <  / ___ \|  _ < | |
      |___| |_| |___|_| \_|_____|_| \_\/_/   \_\_| \_\|_|

  -->

  <div class="scroll-target" data-value="itinerary"></div>
  <article id="home-itinerary-section">

  </article> <!-- home-itinerary-section -->


  <!--
       ____  _   _ ___ ____
      / ___|| | | |_ _|  _ \
      \___ \| |_| || || |_) |
       ___) |  _  || ||  __/
      |____/|_| |_|___|_|

  -->

  <div class="scroll-target" data-value="ship"></div>
  <article id="home-ship-section">

  </article> <!-- home-ship-section -->

  <!--
        ___  _   _ _____ ____ _____ ___ ___  _   _
       / _ \| | | | ____/ ___|_   _|_ _/ _ \| \ | |
      | | | | | | |  _| \___ \ | |  | | | | |  \| |
      | |_| | |_| | |___ ___) || |  | | |_| | |\  |
       \__\_\\___/|_____|____/ |_| |___\___/|_| \_|

  -->

  <div class="scroll-target" data-value="quetion"></div>
  <article id="home-quetion-section">

  </article> <!-- home-quetion-section -->



  @if (Route::has('login'))
    <!-- put this somewhere ? -->
    <div class="top-right links">
      @auth
        <a href="{{ url('/home') }}">Home</a>
      @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      @endauth
    </div>
  @endif



{{-- content --}}
@endsection