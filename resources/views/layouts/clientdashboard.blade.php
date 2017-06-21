<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/dashboard/img/calendar-icon.png" />
	<link rel="icon" type="image/png" href="../assets/dashboard/img/calendar-icon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/dashboard/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/dashboard/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/dashboard/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- SweetAlert -->
  	<script src="../assets/dist/sweetalert-dev.js"></script>
  	<script src="../assets/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/dist/sweetalert.css">

  	
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="red" data-image="../assets/dashboard/img/sidebar-3.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="{{ url('/') }}" class="simple-text">
					<img src="../assets/dashboard/img/organicesmall-logo.png">
				</a>
			</div>

			@yield('sidebar')
	    	
	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						
						<a class="navbar-brand" href="#"><h4> @yield('title') </h4> </a>
						
					</div>
						
				</div>
			</nav>

			@yield('content')

			<footer class="footer">
				<div class="container-fluid">
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Organice</a>, your event organicer!
					</p>
					<nav class="pull-right">
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
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets/dashboard/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="../assets/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/dashboard/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/dashboard/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="../assets/dashboard/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="../assets/dashboard/js/material-dashboard.js"></script>

	

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
