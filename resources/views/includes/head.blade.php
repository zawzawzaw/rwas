<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<link rel="shortcut icon" href="tma_assets/images/icons/favicon.ico" type="image/x-icon" />

<title>@yield('head-page-title','Resorts World at Sea')</title>
<meta name="description" content="@yield('head-page-description','World-class leisure, entertainment and hospitality at sea')">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui"/>

<?php $is_debug = false; ?>

<?php if ($is_debug == true): ?>
  <link rel="stylesheet" type="text/css" href="tma_assets/css/critical_style.css">
<?php else: ?>
  <style type="text/css">
      <?php require_once('tma_assets/css/critical_style.css'); ?>
  </style>
<?php endif; ?>

<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->