<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<link rel="shortcut icon" href="images/icons/favicon.ico" type="image/x-icon" />

<title>@yield('head-page-title','Resorts World at Sea')</title>
<meta name="description" content="@yield('head-page-description','World-class leisure, entertainment and hospitality at sea')">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui"/>


@if( config('rwas.is_debug') )
  <link rel="stylesheet" type="text/css" href="{{asset('css/critical_style.css')}}">

@else
  <style type="text/css">
    <?php // require_once(asset('css/critical_style.css')); ?>
  </style>
@endif


<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->