<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>WMS</title>

  <!-- General CSS Files 
  <link rel="stylesheet" href="{{ asset('resources/modules/bootstrap/css/bootstrap.min.css') }}">
  -->
  <!-- CSS Libraries 
  <link rel="stylesheet" href="{{ asset('resources/modules/fontaweseome/css/all.min.css') }}">
  -->

  <!-- Template CSS 
  <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/css/components.css') }}">
  -->
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  @vite([   'resources/assets/modules/bootstrap/css/bootstrap.min.css',
            'resources/assets/modules/fontawesome/css/all.min.css',
            'resources/assets/css/components.css',
            'resources/assets/css/style.css',
            'resources/css/custom.css',
            'resources/assets/modules/jquery.min.js',
            'resources/assets/modules/nicescroll/jquery.nicescroll.min.js',
            'resources/assets/modules/popper.js',
            'resources/assets/modules/tooltip.js',
            'resources/assets/modules/bootstrap/js/bootstrap.min.js',
            'resources/assets/modules/moment.min.js',
            'resources/assets/js/stisla.js',
            'resources/assets/js/scripts.js',
            'resources/assets/js/custom.js',
            'resources/js/custom.js',
    ])

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
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ Vite::asset('resources/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, @username</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"><img src="{{ Vite::asset('resources/assets/img/WMS.png') }}" style="width:40%;"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">WMS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-user"></i>
            <span>Supplier</span>
            </a>
            </li>
            </li>
            <li class="{{ request()->is('warehouse') ? 'active' : '' }}">
              <a href="{{ url('warehouse') }}"><i class="fa fa-boxes"></i><span>Warehouse</span></a>
            </li>
            <li class="{{ request()->is('room') ? 'active' : '' }}">
              <a href="{{ url('room') }}"><i class="fa fa-door-open"></i><span>Ruangan</span></a>
            </li>
            <li class="{{ request()->is('report_item') ? 'active' : '' }}">
              <a href="{{ url('report_item') }}"><i class="fa fa-truck"></i><span>Lapor Barang Rusak</span></a>
            </li>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i>
               Documentation
            </a>
          </div>
        </aside>
      </div>
            @yield('content')
            @extends('layouts.footer')
    </div>
  </div>

  <!--
  General JS Scripts 
  <script src="{{ asset('resources/assets/modules/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/assets/modules/nicescroll/jquery.nicescroll.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/assets/modules/popper.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/assets/modules/tooltip.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/assets/modules/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/assets/modules/moment.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/assets/js/stisla.js') }}" type="text/javascript"></script>
-->
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
    <!-- Template JS File 
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script> 
    -->

    
</body>
</html>