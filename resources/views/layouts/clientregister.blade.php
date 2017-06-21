<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title')</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/client/img/calendar-icon.png" />
  <link rel="icon" type="image/png" href="../assets/client/img/calendar-icon.png" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <!-- CSS Files -->
  <link href="../assets/client/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/client/css/material-bootstrap-wizard.css" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/client/css/demo.css" rel="stylesheet" />

  <!-- SweetAlert -->
  <script src="../assets/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="../assets/dist/sweetalert.css">

</head>

<body>

  <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../assets/client/img/organicesmall-logo.png">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <!-- <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul> -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::guard('admin')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @elseif(Auth::guard('user')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('user')->user()->firstname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="dropdown">
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

                        <li class="dropdown">
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

  <div class="image-container set-full-height" style="background-image: url('../assets/client/img/clientbg.jpg')">

    <!--  Made With Material Kit  -->
    <a href="{{url('/')}}" class="made-with-mk">
      <div class="brand">Hi!</div>
      <div class="made-with">Road 2 <strong>GraduationOct17</strong></div>
    </a>


        @yield('content')

      <div class="footer">
          <div class="container text-left">
               Made with <i class="fa fa-heart heart"></i> by <img src="../assets/client/img/footer-logo.png">.
          </div>
      </div>
  </div>

</body>
  <!--   Core JS Files   -->
  <script src="../assets/client/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="../assets/client/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/client/js/jquery.bootstrap.js" type="text/javascript"></script>

  <!--   Location AutoComplete  -->
  <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places"></script>

                        <script type="text/javascript">
    
                                $(document).ready(function(){
                                    //initMap();
                                var input = document.getElementById('location');
                                var options = {
                                                componentRestrictions: {country: "ph"}
                                              };

                                searchBox = new google.maps.places.Autocomplete(input,options);
                                searchBox.addListener('places_changed',function(){places = searchBox.getPlaces();
                                    if (places.length == 0){
                                        return;
                                    }
                                });

                                });
                        </script>

  <!--  Plugin for the Wizard -->
  <script src="../assets/client/js/material-bootstrap-wizard.js"></script>

  <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
  <script src="../assets/client/js/jquery.validate.min.js"></script>
</html>
