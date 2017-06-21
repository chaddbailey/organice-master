<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title')</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

  <link rel="apple-touch-icon" sizes="76x76" href="assets/client/img/calendar-icon.png" />
  <link rel="icon" type="image/png" href="assets/client/img/calendar-icon.png" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  <link href="../assets/client/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/client/css/material-bootstrap-wizard.css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/client/css/demo.css" rel="stylesheet" />

  <!-- Image Slider Css -->
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="../assets/img-slider/style/style.css">

  <!-- SweetAlert -->
  <script src="../assets/dist/sweetalert-dev.js"></script>
  <script src="../assets/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../assets/dist/sweetalert.css">
   
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

             <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/assets/client/img/organicesmall-logo.png">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::guard('admin')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-home"></i> Dashboard</a></li>
                                <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @elseif(Auth::guard('user')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('user')->user()->firstname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('client/dashboard') }}"><i class="fa fa-btn fa-home"></i> Dashboard</a></li>
                                <li><a href="{{ url('client/profile') }}"><i class="fa fa-btn fa-user"></i> Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Client <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i>Login Client</a>
                                </li>
                                <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-register"></i>Register Client</a>
                                </li>
                            </ul>
                        </li>

                        <li class="drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Service Partner <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/admin/login') }}"><i class="fa fa-btn fa-sign-in"></i>Login Partner</a></li>
                               <li><a href="{{ url('/admin/register') }}">Register Partner</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container-fluid">
          <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Organice</a>, your event organicer!
          </p>
          <nav class="nav navbar-nav pull-right">
            <ul>
              <li>
                <a href="https://www.facebook.com/chaaddee">
                  <i class="material-icons"><img src="../assets/img-icons/facebook.png"></i>

                </a>
              </li>
              <li>
                <a href="https://twitter.com/chadd_bailey">
                  <i class="material-icons"><img src="../assets/img-icons/twitter.png"></i>
                </a>
              </li>
              <li>
                <a href="https://plus.google.com/u/0/+ChaddRepunte">
                  <i class="material-icons"><img src="../assets/img-icons/google-plus.png"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/chaaddee/">
                   <i class="material-icons"><img src="../assets/img-icons/instagram.png"></i>
                </a>
              </li>
            </ul>
          </nav>
          
        </div>
      </footer>

   <!--   Core JS Files   -->
  <script src="/assets/client/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="/assets/client/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets/client/js/jquery.bootstrap.js" type="text/javascript"></script>

  <!-- Image Slider JQuery and Javascript -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="assets/img-slider/jquery.kaibanner.js"></script>
  <script type="text/javascript">

  $('.kai_banner_container').kaiBanner({
    minWidth:1200,
    intervalTime:6000,
    highlightClass:'highlight'
  });

  $('.kai_banner2_container').kaiBanner();

  $('.kai_banner3_container').kaiBanner({
    speed:1000,
    intervalTime:3000,
    fixedWidth:true,
    minWidth:980,
    highlightClass:'highlight'
  });



</script>


  <!--  Plugin for the Wizard -->
  <script src="/assets/client/js/material-bootstrap-wizard.js"></script>

  <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
  <script src="/assets/client/js/jquery.validate.min.js"></script>
</body>
</html>
