<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WMS</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  @vite([   'resources/assets/modules/bootstrap/css/bootstrap.min.css',
            'resources/assets/modules/fontawesome/css/all.min.css',
            'resources/assets/modules/prism/prism.css',
            'resources/assets/css/style.css',
            'resources/assets/css/components.css',
            'resources/assets/css/custom.css',

            'resources/assets/modules/jquery.min.js',
            'resources/assets/modules/popper.js',
            'resources/assets/modules/bootstrap/js/bootstrap.min.js',
            'resources/assets/modules/tooltip.js',
            'resources/assets/modules/nicescroll/jquery.nicescroll.min.js',
            'resources/assets/modules/moment.min.js',
            'resources/assets/js/stisla.js',
            'resources/assets/modules/prism/prism.js',
            'resources/assets/js/page/bootstrap-modal.js',
            'resources/assets/js/scripts.js',
            'resources/assets/js/custom.js',
            'resources/js/custom.js',
    ])

<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>
<body scroll="no" style="overflow: hidden; backgroundimage: url({{ Vite::asset('resources/assets/img/background_sign.jpg') }});">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

            @yield('content')
            
    </div>
  </div>
</body>
</html>