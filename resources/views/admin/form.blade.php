<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Package</title>

    <!-- Bootstrap -->
    <link href="../assets1/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets1/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets1/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets1/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    
    <!-- bootstrap-progressbar -->
    <link href="../assets1/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../assets1/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../assets1/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets1/build/css/custom.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('/')}}" class="site_title"><i class="fa fa-calendar"></i> <span><img src="../assets/dashboard/img/organicesmall-logo.png"></span></a>
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
             <h3>Form Validation</h3>
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
           <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="x_panel">
               <div class="x_title">
                 <h2>Add Package <small>sub title</small></h2>
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

                 <form class="form-horizontal form-label-left" novalidate action="{{ url('/add/package')}}">

                 <div class="col-md-4 col-md-offset-2">
                        <div class="form-group">
                          <label class="control-label" for="packagename">Package Name</label>
                          <input type="text" name="packagename" id="packagename" class="form-control" value="">
                        </div>
                 </div>

                 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="price">Price</label>
                          <input type="text" name="price" id="price" class="form-control" value="">
                        </div>
                 </div>
                   
                   <div class="ln_solid"></div>
                   <div class="form-group">
                     <div class="col-md-4 col-md-offset-10">
                       <a href="{{url('admin/form')}}" class="btn btn-primary">Cancel</a>
                       <button id="send" type="submit" class="btn btn-success">Submit</button>
                     </div>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>

         <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="x_panel">
               <div class="x_title">
                 <h2>Edit Package <small>sub title</small></h2>
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
                  @foreach($package as $packages)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                  <div class="thumbnail" style = "width: auto; height: auto;" >
                    <div style = "width: auto; height: auto;">

                     @foreach($pack as $packs) 
                          @if($packs->package_id == $packages->id)
                             <label class="control-label">{{$packs->contentname}}
                             </label><br>
                          @endif
                     @endforeach
                     </div>
                   
                    <div class="caption">
                        <h4>{{$packages->packagename}}</h4>
                        <span class="label label-info">Price: ₱ {{$packages->price}}</span>
                    </div>
                    
                      <span class="pull-right"> <a href="{{ url('admin/edit'. $packages->id)}}" class="btn btn-primary"> Edit </a> </span>
                      <span class="pull-right"> <a href="{{ url('delete/package'. $packages->id)}}" class="btn btn-danger"> Delete </a> </span>
                    </div>
                  </div>
                </div>
                 @endforeach
                </div>
                
               </div>
             </div>
           </div>
         </div>

       </div>
     </div>
                  


         

                </div>
                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Organice</a>, your event organicer!
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets1/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets1/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets1/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets1/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../assets1/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../assets1/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets1/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets1/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../assets1/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../assets1/vendors/Flot/jquery.flot.js"></script>
    <script src="../assets1/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../assets1/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../assets1/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../assets1/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../assets1/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../assets1/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../assets1/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../assets1/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../assets1/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../assets1/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../assets1/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets1/vendors/moment/min/moment.min.js"></script>
    <script src="../assets1/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../assets1/build/js/custom.min.js"></script>

    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
    
  </body>
</html>
