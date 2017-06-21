<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">

<title>Service Registration</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
<link rel="icon" type="image/png" href="assets/img/favicon.png" />

<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

<!-- CSS Files -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/css/demo.css" rel="stylesheet" />
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
<!--   Creative Tim Branding   -->


<!--  Made With Material Kit  -->
    <a href="{{url('/')}}" class="made-with-mk">
      <div class="brand">Hi!</div>
      <div class="made-with">Road 2 <strong>GraduationOct17</strong></div>
    </a>

<!--   Big container   -->
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<!--      Wizard container        -->
<div class="wizard-container">
<div class="card wizard-card" data-color="red" id="wizardProfile">
<form  role="form" method="POST" action="{{ url('/admin/register') }}">
{{ csrf_field() }}

<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

<div class="wizard-header">
<h3 class="wizard-title">
Service Provider Registration
</h3>
<h5>This information will let us know more about you.</h5>
</div>
<div class="wizard-navigation">
<ul>
<li><a href="#about" data-toggle="tab">About</a></li>
<li><a href="#account" data-toggle="tab">Account</a></li>
</ul>
</div>

<div class="tab-content">
<div class="tab-pane" id="about">
<div class="row">
<h4 class="info-text"> Let's start with the basic information.</h4>
<div class="col-sm-4 col-sm-offset-1">
<div class="picture-container">
    <div class="picture">
        <img src="../assets/img-icons/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
        <input type="file" id="wizard-picture">
    </div>
    <h6>Choose Picture</h6>
</div>
</div>
<div class="col-sm-6">
<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">face</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label class="control-label">Service Name</label>
      <input name="name" type="text" class="form-control" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">face</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('contactperson') ? ' has-error' : '' }}">
      <label class="control-label"> Contact Person <small>(required)</small></label>
      <input name="contactperson" type="text" class="form-control" value="{{ old('contactperson') }}">
        @if ($errors->has('contactperson'))
            <span class="help-block">
                <strong>{{ $errors->first('contactperson') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">phone</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('contactnumber') ? ' has-error' : '' }}">
      <label class="control-label"> Contact Number <small>(required)</small></label>
      <input name="contactnumber" type="text" class="form-control" value="{{ old('contactnumber') }}">
        @if ($errors->has('contactnumber'))
            <span class="help-block">
                <strong>{{ $errors->first('contactnumber') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">add_location</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('address') ? ' has-error' : '' }}">
      <label class="control-label">Location</label>
      <input id="address" name="address" type="text" placeholder=" " class="form-control" value="{{ old('address') }}">
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places"></script>
   <script type="text/javascript">

         function initialize() {
         
         var input = document.getElementById('address');
         var country = {
                           componentRestrictions: {country: "ph"}
                         };
         autocomplete = new google.maps.places.Autocomplete(input,country);
         }

         google.maps.event.addDomListener(window, 'load', initialize);

   </script>

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">lock_outline</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label class="control-label"> Password <small>(required)</small></label>
      <input name="password" type="password" class="form-control">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">lock_outline</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label class="control-label"> Confirm Password <small>(required)</small></label>
      <input name="password_confirmation" type="password" class="form-control">
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>

</div>
<div class="col-sm-10 col-sm-offset-1">
<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">email</i>
    </span>
    <div class="form-group label-floating form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="control-label">Email <small>(required)</small></label>
        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
</div>
</div>
</div>

<div class="tab-pane" id="account">
<h4 class="info-text"> What service do you offer? <small>(choose only one)</small></h4>
<div class="row">
<div class="col-sm-10 col-sm-offset-1 form-group{{ $errors->has('servicetype') ? ' has-error' : '' }}">
@foreach($servicetypes as $servicetype)
<div class="col-sm-4">
    <div class="choice" data-toggle="wizard-checkbox">

        <input type="checkbox" name="servicetype" value="{{ $servicetype->service_id, old('servicetype')}}">
        <div class="icon">
            <i class="material-icons">store</i>
        </div>
        <h6>{{$servicetype->type}}</h6>

    </div>
</div>
@endforeach
</div>
@if ($errors->has('servicetype'))
<span class="help-block">
    <strong>{{ $errors->first('servicetype') }}</strong>
</span>
@endif
</div>
</div>

</div>
<div class="wizard-footer">
<div class="pull-right">
<input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
<input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
</div>

<div class="pull-left">
<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
</div>
<div class="clearfix"></div>
</div>
</form>
</div>
</div> <!-- wizard container -->
</div>
</div><!-- end row -->
</div> <!--  big container -->

<div class="footer">
          <div class="container text-left">
               Made with <i class="fa fa-heart heart"></i> by <img src="../assets/client/img/footer-logo.png">.
          </div>
</div>
</div>

</body>
<!--   Core JS Files   -->
<script src="/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/js/jquery.bootstrap.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="/assets/js/material-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="/assets/js/jquery.validate.min.js"></script>

</html>
