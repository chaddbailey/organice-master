<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Client Details</title>

    <!-- Bootstrap -->
    <link href="../../assets1/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets1/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets1/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../../assets1/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../../assets1/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="../../assets1/build/css/custom.min.css" rel="stylesheet">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
          margin-left: 150px;
          height: 300px;
          width: 800px;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
      </style>
  </head>

  <body class="nav-md">
    <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="{{url('/')}}" class="site_title"><i class="fa fa-calendar"></i> <span><img src="../../assets/dashboard/img/organicesmall-logo.png"></span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                  <div class="profile_pic">
                    <img src="/uploads/avatars/{{  Auth::guard('admin')->user()->avatar  }}" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{ Auth::guard('admin')->user()->name }}</h2>
                  </div>
                </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ url('admin') }}"><i class="fa fa-home"></i> Home <span class=""></span></a>
                    </li>
                    <li>
                        <a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{ url('admin/form') }}">Create Package</a></li>
                          <li><a href="{{ url('admin/about') }}">Add Description</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('admin/calendar') }}"><i class="fa fa-table"></i> Timeline <span class=""></span></a></li>
                    <li>
                    <a href="{{ url('admin/photo') }}"><i class="fa fa-photo"></i> Photos <span class=""></span></a>
                    </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="/uploads/avatars/{{  Auth::guard('admin')->user()->avatar  }}" alt="">{{ Auth::guard('admin')->user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{url('/')}}"><i class="fa fa-home pull-right"></i> Dashboard</a></li>
                    <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    <li style="background-color: #23527c;color: #fff;padding: 12px;">
                    <form enctype="multipart/form-data" action="/admin/av" method="POST">

                        <input type="file" name="avatar" placeholder=" ">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" placeholder=" ">
                        Update Profile image
                        <input type="file" name="slider" placeholder=" ">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" placeholder=" ">
                        Add Image Slider
                        <input type="submit" class="pull-right btn btn-sm btn-success">
                    </form>
                  </li>
                  </ul>
                </li>

                

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

           <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Event Details <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                              <div class="row">
                                  <div class="col-md-5">
                                       <b><h4>Schedule</h4></b>
                                  </div>
                              </div>

                                  <div class="row">
                                    <div class="col-md-4">
                                           <div class="form-group">
                                             <label class="control-label">Date & Time</label>
                                               
                                               @foreach($displayclients as $dt)
                                                   <input size="16" type="text" class="form-control" id="datetime" name="datetime" value="{{ $dt->datetime }}" disabled="disabled">
                                               @endforeach
                                               
                                             </div>
                                    </div> 

                                      <div class="col-md-4">
                                          <div class="form-group">
                                          @foreach($displayclients as $heads)
                                            <label class="control-label">No. of Heads</label>
                                            <input type="text" name="heads" id="heads" class="form-control" value="{{ $heads->heads }}" disabled="disabled">
                                          </div>
                                          @endforeach
                                      </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-md-4">
                                            <div class="form-group">
                                              <b><h4>Selected Package</h4></b>                                             
                                               @foreach($displayclients as $packages)
                                              <input type="text" name="package"  class="form-control" value="{{$packages->package}}"  placeholder=" " disabled="disabled">
                                              @endforeach
                                            </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-5">
                                           <b><h4>Event Details</h4></b>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="control-label">Event</label>
                                               @foreach($displayclients as $event)
                                                <input type="text" name="event" class="form-control" value="{{$event->event}}"  placeholder=" " disabled="disabled">
                                               @endforeach
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="control-label">Venue</label>
                                            @foreach($displayclients as $client)
                                            <input type="text" name="venue" id="venue" class="form-control" value="{{$client->venue}}"  placeholder=" " disabled="disabled">
                                            <input id="clat" name="clat" type="text" class="setup-textp " value="{{$client->lat}}" hidden >
                                            <input id="clong" name="clong" type="text" class="setup-textp " value="{{$client->lng}}" hidden>
                                            @endforeach
                                          </div>
                                      </div>

                                      <div id="map"></div>

                                       
                                        <script>

                                          /*function initialize() {
                           
                                          var input = document.getElementById('venue');
                                          var country = {
                                             componentRestrictions: {country: "ph"}
                                           };
                                          autocomplete = new google.maps.places.Autocomplete(input,country);
                                          }

                                          google.maps.event.addDomListener(window, 'load', initialize);
                  */                        
                                            var map;
                                           @foreach($displayclients as $cr)
                                            var centers = {lat:{{$cr->lat}},lng:{{$cr->lng}}};
                                           @endforeach
                                            function initMap() {
                                                    map = new google.maps.Map(document.getElementById('map'), {
                                                        center:centers,
                                                        zoom: 18,
                                                        mapTypeId: google.maps.MapTypeId.HYBRID
                                                      });
                                                      

                                                      var input = document.getElementById('venue');
                                                      var searchBox = new google.maps.places.SearchBox(input);


                                                            // Bias the SearchBox results towards current map's viewport.
                                                            map.addListener('bounds_changed', function() {
                                                              searchBox.setBounds(map.getBounds());
                                                            });

                                                      var marker = new google.maps.Marker({
                                                                map: map,
                                                                position: centers
                                                              });
                                          

                                                        }
                                                  
                                                  


                                        </script>
                                         <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places&callback=initMap"></script>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-5">
                                           <b><h4>Client's Info</h4></b>
                                      </div>
                                  </div>

                                  <div class="row">
                                      @foreach($displayclients as $displayclient)
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="control-label">Firstname</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control" value="{{$displayclient->firstname}}" placeholder=" " disabled="disabled"><i class=""></i>
                                          </div>
                                      </div>
                                      
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="control-label">Lastname</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" value="{{$displayclient->lastname}}" disabled="disabled">
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="control-label">Contact Number</label>
                                            <input type="text" name="mobile" id="mobile" class="form-control" value="{{$displayclient->mobile}}" disabled="disabled">
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" value="{{$displayclient->email}}" disabled="disabled">
                                          </div>
                                      </div>
                                     
                                  </div>
                                  
                                  <div class="row">
                                      <div class="col-md-9">
                                          <div class="form-group">
                                              <label>Client's instruction</label>
                                            <div class="form-group">
                                                <textarea type="text" name="desc" id="desc" class="form-control" rows="2" value="" disabled="disabled">{{$displayclient->desc}}</textarea>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                @endforeach


                                  <div class="form-group">
                                        <a href="{{ url('admin/dashboard') }}" class="btn btn-primary pull-right">Back</a>
                                  </div>
                                  </form>

                                                
                                  </div>
                                 </div>
                               </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
    </div>
        
    <!-- jQuery -->
    <script src="../../assets1/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets1/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets1/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../assets1/vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../../assets1/vendors/moment/min/moment.min.js"></script>
    <script src="../../assets1/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets1/build/js/custom.min.js"></script>

  </body>
</html>