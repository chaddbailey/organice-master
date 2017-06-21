<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Service Partner - Home</title>

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
  <style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

     #myImg2 {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg2:hover {opacity: 0.7;}

     #myImg3 {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg3:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 900px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .close2 {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close2:hover,
    .close2:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .close3 {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close3:hover,
    .close3:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }

  </style>

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

            <div class="row">
           <!-- SweetAlert -->
           <script src="../assets/dist/sweetalert.min.js"></script>
           <link rel="stylesheet" href="../assets/dist/sweetalert.css">
            @if (Session::has('success_message'))
           <script>
                  swal("Accepted!", "Request Accepted!", "success")
           </script>
            @endif
            @if (Session::has('failed_message'))
           <script>
                  swal("Declined!", "Request Declined", "error")
           </script>
            @endif
           </div>

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
          <!-- top tiles -->
          
          <!-- /top tiles -->


          <div class="row">
          @foreach($displayclients as $displayclient)
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                  <div class="x_title">
                    <h4>Booking Details of Client</h4> <label>{{$displayclient->status}}</label>
                    
                    <form >

                     <a href="{{ url('/accept/'.$displayclient->id) }}" type="submit" id="{{$displayclient->id}}" class="btn btn-primary">
                      ACCEPT
                    </a>

                    <a href="{{ url('/decline/'.$displayclient->id) }}" type="submit" id="{{$displayclient->id}}" class="btn btn-warning">
                      DECLINE
                    </a>

                    <a href="{{ url('/del/'.$displayclient->id) }}" type="submit" id="{{$displayclient->id}}" class="btn btn-danger">
                      DELETE
                    </a>

                   
                  </form>
                   
                 
                  </div>
                    <td>Date and Time: <label>{{$displayclient->datetime}}</label></td><br>  
                    <td>Name: <label>{{$displayclient->firstname .' '. $displayclient->lastname}}</label></td><br>
                    <td>No. of Heads: </h5><label>{{$displayclient->heads}}</label></td><br>
                    <td>Package: </h5><label>{{$displayclient->package}}</label></td><br>
                    <td><a href="{{ url('/admin/showmore/'.$displayclient->id) }}" id="{{$displayclient->id}}">...Show More</a></td>
                      
              </div>
            </div>
            @endforeach
          </div>


          <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>BIR Photo</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                <!-- photo here -->
                <img id="myImg" src="/uploads/documents/{{  Auth::guard('admin')->user()->bir  }}" style="width:300px; height:200px; float:left; border-radius:%; margin-right:25px;">
                     <form enctype="multipart/form-data" action="/admin/bir" method="POST">
                        <input type="file" name="bir">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Update BIR image
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>

                  <div class="widget_summary">
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </div>

            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
              <div id="caption"></div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>SEC Photo</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 <img id="myImg2" src="/uploads/documents/{{  Auth::guard('admin')->user()->sec  }}" style="width:300px; height:200px; float:left; border-radius:%; margin-right:25px;">
                    <form enctype="multipart/form-data" action="/admin/sec" method="POST">
                        <input type="file" name="sec">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Update SEC image
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                 
                </div>
              </div>
            </div>

            <div id="myModal2" class="modal">
              <span class="close2">&times;</span>
              <img class="modal-content" id="img02">
              <div id="caption"></div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Menu</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <img id="myImg3" src="/uploads/documents/{{  Auth::guard('admin')->user()->menu  }}" style="width:300px; height:200px; float:left; border-radius:%; margin-right:25px;">
                   <form enctype="multipart/form-data" action="/admin/menu" method="POST">
                      
                      <input type="file" name="menu">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      Update Menu image
                      <input type="submit" class="pull-right btn btn-sm btn-primary">
                  </form>
                </div>
              </div>
            </div>

            <div id="myModal3" class="modal">
              <span class="close3">&times;</span>
              <img class="modal-content" id="img03">
              <div id="caption"></div>
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
            <div class="container-fluid">
          
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Organice</a>, your event organicer!
          
            </div>
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


    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById('myModal2');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg2');
    var modalImg = document.getElementById("img02");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById('myModal3');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg3');
    var modalImg = document.getElementById("img03");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close3")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
    </script>
    
  </body>
</html>
