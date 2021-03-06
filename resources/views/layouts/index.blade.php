<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Beauty Life web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->

<!-- css files -->
<link rel="stylesheet" href="../assets2/css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="../assets2/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="../assets2/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../assets2/css/lightbox.css">  <!-- For-Gallery-CSS -->
<link rel="stylesheet" href="../assets/css/malot-timepicker.css"> <!-- For Datetime picker -->
<!-- //css files -->

<!-- online-fonts -->
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<!-- //online-fonts -->
<style>
	      /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map {
	        margin-left: 2px;
	        height: 300px;
	        width: 500px;
	        border-radius: 15px;
	      }
	      /* Optional: Makes the sample page fill the window. */
	      html, body {
	        height: 100%;
	        margin: 0;
	        padding: 0;
	      }
	      .stars {
	          margin: 20px 0;
	          font-size: 24px;
	          color: #d17581;
	      }

	      .ratings {
	          color: #d17581;
	          padding-left: 10px;
	          padding-right: 10px;
	      }
	    </style>
</head>
<body>
<div class="Main-agile">
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="col-md-8 w3l_header_left">
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +132 546 897 201</li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="mailto:organiceoct17@gmail.com">organiceoct17@gmail.com</a></li>
					<li><span class="glyphicon glyphicon-map-marker add-w3" aria-hidden="true"></span>Basak Pardo, Cebu City, Philippines</li>
				</ul>
			</div>
			<div class="col-md-4 w3l_header_right">
				<div class="navbar-right social-icons"> 
					<ul>
						<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
						<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
					</ul>  
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<div class="col-md-3 logo-w3l">
					<h1><a class="navbar-brand" href="{{url('/')}}"><img src="../assets2/images/organice-logo.png"></a></h1>
					
				</div>
				<div class="col-md-9 navi-w3l">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<nav class="menu menu--francisco">
										<ul class="nav navbar-nav menu__list">
											<li class="menu__item menu__item--current"><a href="{{ url('/') }}" class="menu__link"><span class="menu__helper">Home</span></a></li>
											<li class="menu__item"><a href="#features" class="menu__link scroll"><span class="menu__helper">Services</span></a></li>
											<li class="menu__item"><a href="#bookvenue" class="menu__link scroll"><span class="menu__helper">Book Venue</span></a></li>
											
											
											
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
                        <li class="menu_item dropdown">
                            <a href="#" class="menu__link scroll dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('user')->user()->firstname }} <span class="menu__helper caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                            	<li><a href="{{ url('client/home') }}"><i class="fa fa-btn fa-home"></i><b> Dashboard</b></a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i><b>Logout</b></a></li>
                            </ul>
                        </li>
                    @else
                        <li class="drop">
                            <a href="#" class="dropdown-toggle menu__link scroll" data-toggle="dropdown" role="button" aria-expanded="false">
                               Client <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/login') }}"><b>Login Client</b></a>
                                </li>
                                <li><a href="{{ url('/register') }}"><b>Register Client</b></a>
                                </li>
                            </ul>
                        </li>

                        <li class="drop">
                            <a href="#" class="dropdown-toggle menu__link scroll" data-toggle="dropdown" role="button" aria-expanded="false">
                               Service Partner <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/admin/login') }}"><b>Login Partner</b></a></li>
                               <li><a href="{{ url('/admin/register') }}"><b>Register Partner</b></a></li>
                            </ul>
                        </li>
                    @endif
                
										</ul>
									</nav>
									<div class="clearfix"></div>
								</div><!-- /.navbar-collapse -->
									<!-- /.container-fluid -->
							</div>
						</nav>
				</div>
				<div class="clearfix"></div>
			</div>	
		</div>
	</div>
	<!-- //header -->
	<!-- banner -->
		<!-- Slider -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="w3layouts-banner-top">
							<div class="container">
								<div class="slider-info">
							<h3>Plan your</h3>
							<h4>Dream Wedding</h4>
							<h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Learn More</a></h5>
						</div>
	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="slider-info">
							<h3>Select the</h3>
							<h4>Best Services</h4>
							<h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Learn More</a></h5>
						</div>
	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="slider-info">
							<h3>Sit back while</h3>
							<h4>We plan for you</h4>
							<h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Learn More</a></h5>
						</div>

								
							</div>
						</div>
					</li>

				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- Modal5 -->
						<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4>Dream Wedding</h4>
											<h5>Organice your wedding with these services.</h5>
											<img src="../assets2/images/b1.jpg" alt="blog-image" />
											
											<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

											<ul id="myTab" class="nav nav-tabs" role="tablist">
                            				<li><a href="#catering" aria-expanded="false">Catering</a></li>

                            				<li role="presentation" class=""><a href="#equipment" aria-expanded="false">Equipments</a></li>

                            				<li role="presentation" class=""><a href="#accessories" aria-expanded="false">Event Accessories</a></li>

                            				<li role="presentation" class=""><a href="#videographer" aria-expanded="false">Videographer/Photographer</a></li>

                            				<li role="presentation" class=""><a href="#printables" aria-expanded="false">Printables/Giveaways</a></li>

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Flower Services</a></li>

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Entertainment Services</a></li>

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Cake and Pastry</a></li>

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Wines and Beverages</a></li>

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Styling Services</a></li>									

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Tailoring and Design Services</a></li>

                            				<li role="presentation" class=""><a href="#flower" aria-expanded="false">Bridal Car Services</a></li>
                            				</ul>
											</div>
								</div>
							</div>
							</div>
				       </div>
				<!-- //Modal5 -->
		<!-- //Slider -->
	<!-- //banner -->
	<!-- move-text -->
	<!-- <div class="banner-w3l-bo">
		<div class="demo">
			<marquee behavior="scroll" style="background:#06b393; color:#fff;" direction="left" onmouseover="this.stop();" onmouseout="this.start();">				
				ORGANIZING...<span> PLANNING...</span><span>BOOKING...</span> <span>We offer a wide selection of Event Services!</span>
			</marquee> 	 
		</div>
	</div> -->
	<!-- //move-text -->
</div>

<!-- Counter -->
	<div class="services-bottom" id="bookvenue">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="col-md-6 pull-right">
						<form action="/req/event" class="col-md-10">
							   <div class="col-md-10">
                        		<div class="form-group">
                        		<h1 class="h1fontcolor">Search a venue for your event. <i class="fa fa-map-marker" style="font-size:50px"></i></h1>
                          		<hr>
                          		<input type="text" name="venue" id="venue" class="form-control" value=""  placeholder=" ">
                          		<input id="clat" name="clat" type="text" class="setup-textp hidden ">
                          		<input id="clong" name="clong" type="text" class="setup-textp hidden">
                        		</div>
                        		</div>

                        		<div class="form-group col-md-10">
                      			<a href="{{ url('/formevent') }}"><button type="submit" class="btn btn-primaryvenue"><i class="fa fa-search" style="font-size:30px"></i>Search</button></a>
                				</div>
                        </form>
            </div>
           <div class="col-sm-4 pull-left" style="margin-left: 130px;">
                       <div class="row">
                      
                       	 <div id="map"></div> 
                       	 
                       </div>
            </div>
        

                      
                      <script type="text/javascript">

                      	 var map;
                          var centers = {lat:10.309937078055952,lng:123.89307975769043};
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

                                          var markers = [];
                                          google.maps.event.addListener(map, 'click', function (e) {

                                            var ll = {lat: e.latLng.lat(), lng: e.latLng.lng()}; 

                                                //alert(e.latLng.lat());  
                                                markers.forEach(function(marker) {
                                                  marker.setMap(null);
                                                });
                                                
                                                markers = []; 

                                                lastMarker = new google.maps.Marker({
                                                  position: ll,
                                                  map: map,
                                                  title: 'Hello World!'
                                                });
                                                markers.push(lastMarker);

                                                getAddressByLatlng(ll);


                                            });

                                          // Listen for the event fired when the user selects a prediction and retrieve
                                          // more details for that place.
                                          searchBox.addListener('places_changed', function() {
                                            var places = searchBox.getPlaces();

                                            if (places.length == 0) {
                                              return;
                                            }

                                            // Clear out the old markers.
                                            markers.forEach(function(marker) {
                                              marker.setMap(null);
                                            });
                                            markers = [];

                                            // For each place, get the icon, name and location.
                                            var bounds = new google.maps.LatLngBounds();
                                            places.forEach(function(place) {
                                              var icon = {
                                                url: place.icon,
                                                size: new google.maps.Size(71, 71),
                                                origin: new google.maps.Point(0, 0),
                                                anchor: new google.maps.Point(17, 34),
                                                scaledSize: new google.maps.Size(25, 25)
                                              };

                                              // Create a marker for each place.
                                              markers.push(new google.maps.Marker({
                                                map: map,
                                                icon: icon,
                                                title: place.name,
                                                position: place.geometry.location
                                              }));

                                              if (place.geometry.viewport) {
                                                // Only geocodes have viewport.
                                                bounds.union(place.geometry.viewport);
                                            } else {
                                              bounds.extend(place.geometry.location);
                                            }
                                        });
                                            map.fitBounds(bounds);
                                        });

                                              function getAddressByLatlng(latlng){

                                                var lat =latlng.lat;
                                                var lng =latlng.lng;

                                                var inputSearchBox = document.getElementById('venue');

                                                var cLatValId = document.getElementById('clat');
                                                var cLongValId = document.getElementById('clong');

                                                cLatValId.value=lat;
                                                cLongValId.value=lng;

                                                var geocoder = new google.maps.Geocoder();
                                                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                                                  if (status == google.maps.GeocoderStatus.OK) {
                                                    if (results[1]) {
                                                      inputSearchBox.value =  results[1].formatted_address;
                                                    }
                                                    var res = results[0].address_components;
                                                    for(var i=0; i<res.length; i++){
                                                      if(res[i].types[0] =="locality"){
                                                        local= res[i].long_name;
                                                   // console.log(nearbs);
                                               }
                                           }       

                                       }
                                      });
                                              }

                                      }

        

                      </script>
                      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places&callback=initMap"></script>
			</div>	
						
					
			<div class="clearfix"> </div>
		</div>
	</div>
		
<!-- //Counter -->

<!-- welcome -->
	<div class="welcome" id="about">
		<div class="container">
			<div class="col-md-6 welcome-right">
				<div class="welcome-right-top">
					<img src="../assets2/images/ab.png" alt="Beauty">
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-6 welcome-left">
				<h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">Welcome</h3>
				<h4 class="wow fadeInLeft animated animated" data-wow-delay=".5s"></h4>
				<p class="wow fadeInLeft animated animated" data-wow-delay=".5s"><b>OrgaNice</b> is a web-based application that serves as the premier event planning solution. It is a solution that is both efficient and beneficial for event organizers, service partners and clients. The app intends to help event organizers in systematically managing event happenings. Organice can also serve as a venue for advertising your services.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //welcome -->


<!-- features -->
	<div class="features" id="features">
		<div class="container">
			<h3>Services</h3>
			<div class="border"> </div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">

                            <li role="presentation" class=""><a href="#catering" id="catering-tab" data-toggle="tab" aria-controls="catering" aria-expanded="false">Catering Services</a></li>

                            <li role="presentation" class=""><a href="#equipment" id="equipment-tab" data-toggle="tab" aria-controls="equipment" aria-expanded="false">Equipment Services</a></li>

                            <li role="presentation" class=""><a href="#accessories" id="accessories-tab" data-toggle="tab" aria-controls="accessories" aria-expanded="false">Event Accessories</a></li>

                            <li role="presentation" class=""><a href="#videographer" id="videographer-tab" data-toggle="tab" aria-controls="videographer" aria-expanded="false">Videographer/Photographer</a></li>

                            <li role="presentation" class=""><a href="#printables" id="printables-tab" data-toggle="tab" aria-controls="printables" aria-expanded="false">Printables/Giveaways</a></li>

                            <li role="presentation" class=""><a href="#flower" id="flower-tab" data-toggle="tab" aria-controls="flower" aria-expanded="false">Flowerist and Styles</a></li>

                            <li role="presentation" class=""><a href="#entertainment" id="entertainment-tab" data-toggle="tab" aria-controls="entertainment" aria-expanded="false">Entertainment Services</a></li>

                            <li role="presentation" class=""><a href="#cakes" id="cakes-tab" data-toggle="tab" aria-controls="cakes" aria-expanded="false">Cake and Pastry</a></li>

                            <li role="presentation" class=""><a href="#wines" id="wines-tab" data-toggle="tab" aria-controls="wines" aria-expanded="false">Wines and Beverages</a></li>

                            <li role="presentation" class=""><a href="#styling" id="styling-tab" data-toggle="tab" aria-controls="styling" aria-expanded="false">Styling Services</a></li>									

                            <li role="presentation" class=""><a href="#tailoring" id="tailoring-tab" data-toggle="tab" aria-controls="tailoring" aria-expanded="false">Tailoring and Design Services</a></li>

                            <li role="presentation" class=""><a href="#bridalcars" id="bridalcars-tab" data-toggle="tab" aria-controls="bridalcars" aria-expanded="false">Bridal Car Services</a></li>

                            <li role="presentation" class=""><a href="#recommended" id="recommended-tab" data-toggle="tab" aria-controls="recommended" aria-expanded="false">Recommended</a></li>


					</ul>

					
					<div id="myTabContent" class="tab-content">						
							@yield('content')
								<div class="clearfix"> </div>
					</div>
						</div>
					</div>
				</div>
		</div>
	</div>
<!-- //features-->

<!-- Experts -->
			<div class="team w3layouts-agileits" id="experts">
				<div class="container">
					<h3>Meet Our Experts</h3>
					<ul class="ch-grid">
						<li>
							<div class="ch-item">				
								<div class="ch-info">
									<div class="ch-info-front ch-img-1"></div>
									<div class="ch-info-back">
										<h4>Jane Smith</h4>
										<p>Spa Specialist</p>
										<div class="icons">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li class="team-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>	
								</div>
							</div>
						</li>
						<li>
							<div class="ch-item">
								<div class="ch-info">
									<div class="ch-info-front ch-img-2"></div>
									<div class="ch-info-back">
										<h4>Amelia Bell</h4>
										<p>Beauty Therapist</p>
										<div class="icons">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li class="team-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="ch-item">
								<div class="ch-info">
									<div class="ch-info-front ch-img-3"></div>
									<div class="ch-info-back">
										<h4>Grace Jone</h4>
										<p>Hair Stylist</p>
										<div class="icons">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li class="team-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="ch-item">
								<div class="ch-info">
									<div class="ch-info-front ch-img-4"></div>
									<div class="ch-info-back">
										<h4>Nicola Hill</h4>
										<p>Beautician</p>
										<div class="icons">
											<ul>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li class="team-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
									

								</div>
							</div>
						</li>
					</ul>
				
				</div>
			</div>
<!-- //Experts -->

<!-- testimonial -->
	<div class="testimonial">
		<!-- container -->
		<div class="container">
			<h3 class="w3layouts-title">Our CLIENTS SAY</h3> 
			 <div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active agileits-w3layouts">
						<div class="carousel-caption">
							<div class="testimonial-grids">
								<div class="testimonial-left">
									<img src="../assets2/images/t2.jpg" alt="" />
								</div>
								<div class="testimonial-right">
									<h5>Jark Kohnson</h5>
									<p><span>"</span> Lorem ipsum dolor sit amet consec tetuer adi piscing elit Praesent vestibulum 
										molestie lacus consec tetuer adi piscing elit Praesent vestibulum molestie lacus <span>"</span>
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="item agileits-w3layouts"> 
						<div class="carousel-caption">
							<div class="testimonial-grids">
								<div class="testimonial-left">
									<img src="../assets2/images/t4.jpg" alt="" />
								</div>
								<div class="testimonial-right">
									<h5>Geo Mehak</h5>
									<p><span>"</span> Lorem ipsum dolor sit amet consec tetuer adi piscing elit Praesent vestibulum 
										molestie lacus consec tetuer adi piscing elit Praesent vestibulum molestie lacus <span>"</span>
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div> 
					</div>
					<div class="item agileits-w3layouts"> 
						<div class="carousel-caption">
							<div class="testimonial-grids">
								<div class="testimonial-left">
									<img src="../assets2/images/t1.jpg" alt="" />
								</div>
								<div class="testimonial-right">
									<h5>Grace Jone</h5>
									<p><span>"</span> Lorem ipsum dolor sit amet consec tetuer adi piscing elit Praesent vestibulum 
										molestie lacus consec tetuer adi piscing elit Praesent vestibulum molestie lacus <span>"</span>
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div> 
					</div>
				</div> 
			</div><!-- /.carousel -->  
		</div>
		<!-- //container -->
	</div>
<!-- //testimonial --> 

<!-- gallery -->
	<div id="gallery" class="gallery">
		<div class="container"> 
			<h3 class="w3stitle">OUR <span> Gallery</span></h3>  
			<div class="gallery-w3lsrow">
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g1.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g1.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g2.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g2.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g3.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g3.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g4.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g4.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g6.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g6.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g5.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g5.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g7.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g7.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-3 col-xs-4 gallery-grids">
					<div class="w3ls-hover">
						<a href="../assets2/images/g8.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
							<img src="../assets2/images/g8.jpg" class="img-responsive zoom-img" alt=""/>
							<div class="view-caption">
								<h5>Beauty Life</h5>
								<span class="glyphicon glyphicon-search"></span>
							</div>
						</a>
					</div>
				</div>  
				<div class="clearfix"> </div> 
			</div>
		</div> 
	</div>
<!-- //gallery -->
	


<!-- Contact -->
	<div class="agileinfo-contact" id="contact">
		<div class="container">
		<h3 class="agile">Contact</h3>
			<div class="w3_agile_mail_grids_agile">
				<div class="w3_agile_mail_left">
					<div class="agileits_mail_grid_right1 agile_mail_grid_right1">
						<form action="#" method="post">
							<span>
								<i>Name</i>
								<input type="text" name="Name" placeholder=" " required="">
							</span>
							<span>
								<i>Email</i>
								<input type="email" name="Email" placeholder=" " required="">
							</span>
							
							<span>
								<i>Message</i>
								<textarea name="Message" placeholder=" " required=""></textarea>
							</span>
							<input type="submit" value="Submit Now">
						</form>
					</div>
				</div>
			</div>
	</div>
</div>

<!-- //Contact -->

<!-- footer -->
<div class="footer">
	<div class="container">
			<div class="logo-footer-1">
				<div class="col-md-6 logo-w3l-footer2 pull-right">
					<ul>
						<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></li>
						<li>USJ-R Basak Pardo, </li>
						<li>Cebu City Philippines</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- newsletter -->
			<div class="newsletter-w3l">
				<!-- <div class="col-md-8 get-in-grids">
					<div class="get-in-grid-left">
						<p>Subscribe Here<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></p>
					</div>
					<div class="get-in-grid-right">
						<form action="#" method="post">
							<input type="email" name="email" Placeholder="Enter Your Mail..." required="">
							<input type="submit" value="Subscribe" >
						</form>
					</div>
				</div> -->
				<!-- <div class="col-md-4 w3l_header_right soci-w3">
					<div class="navbar-right social-icons"> 
						<ul>
							<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
							<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
							<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
							<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>
						</ul>  
					</div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
			<!-- //newsletter -->
			<div class="logo-footer">
				<div class="col-md-3 agileinfo_footer_grid">
					<h4>About Us</h4>
					<p><b>OrgaNice</b> is a web-based application that serves as the premier event planning solution. It is a solution that is both efficient and beneficial for event organizers, service partners and clients.</p>
				</div>
				<div class="col-md-3 agileinfo_footer_grid f1">
					<h4>Instagram Posts</h4>
					<div class="agileinfo_footer_grid1">
						<a href="#"><img src="../assets2/images/f1.jpg" alt=" " class="img-responsive"></a>
					</div>
					<div class="agileinfo_footer_grid1">
						<a href="#"><img src="../assets2/images/f2.jpg" alt=" " class="img-responsive"></a>
					</div>
					<div class="agileinfo_footer_grid1">
						<a href="#"><img src="../assets2/images/f3.jpg" alt=" " class="img-responsive"></a>
					</div>
					<div class="agileinfo_footer_grid1">
						<a href="#"><img src="../assets2/images/f4.jpg" alt=" " class="img-responsive"></a>
					</div>
					<div class="agileinfo_footer_grid1">
						<a href="#"><img src="../assets2/images/f5.jpg" alt=" " class="img-responsive"></a>
					</div>
					<div class="agileinfo_footer_grid1">
						<a href="#"><img src="../assets2/images/f6.jpg" alt=" " class="img-responsive"></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 agileinfo_footer_grid f2">
					<h4>Information</h4>
					<div class="w3-agileits_mail_grid_left">
						<div class="w3-agileits_mail_grid_left1">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="w3-agileits_mail_grid_left2">
							<h3>Mail Us</h3>
							<a href="mailto:info@example.com">mail@example.com</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3-agileits_mail_grid_left">
						<div class="w3-agileits_mail_grid_left1">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="w3-agileits_mail_grid_left2">
							<h3>Address</h3>
							<p>5280 Wetzel Lane</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="w3-agileits_mail_grid_left">
						<div class="w3-agileits_mail_grid_left1">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
						</div>
						<div class="w3-agileits_mail_grid_left2">
							<h3>Phone</h3>
							<p>+5244 125 625</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 agileinfo_footer_grid f3">
					<h4>Navigation</h4>					
					<div class="nav-w3-l">
						<ul>
							<li><a href="index.html" >Home</a></li>
							<li><a href="#about" class="scroll" >About Us</a></li>
							<li><a href="#features" class="scroll" >Features</a></li>
							<li><a href="#experts" class="scroll" >Experts</a></li>
							<li><a href="#gallery" class="scroll" >Gallery</a></li>
							<li><a href="#contact" class="scroll" >Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		<div class="w3agile_footer_copy">
			<p class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="{{url('/')}}">Organice</a>, your event organicer!
            </p>
		</div>
	</div>
</div>
<!-- //footer -->

	
<!-- js-scripts -->					
		<script type="text/javascript" src="../assets2/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../assets2/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
			
			
		<!--  light box js -->
			<script src="../assets2/js/lightbox-plus-jquery.min.js"> </script> 
		<!-- //light box js-->	
				
		<!-- Baneer-js -->
			<script src="../assets2/js/responsiveslides.min.js"></script>
		<script>
				$(function () {
					$("#slider").responsiveSlides({
						auto: true,
						pager:false,
						nav: true,
						speed: 1000,
						namespace: "callbacks",
						before: function () {
							$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
						}
					});
				});
			</script>

		<!-- //Baneer-js -->
		
		<!-- start-smoth-scrolling -->
				<script type="text/javascript" src="../assets2/js/move-top.js"></script>
				<script type="text/javascript" src="../assets2/js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<!-- start-smoth-scrolling -->
		
		<!-- Stats-Number-Scroller-Animation-JavaScript -->
				<script src="../assets2/js/waypoints.min.js"></script> 
				<script src="../assets2/js/counterup.min.js"></script> 
				<script>
					jQuery(document).ready(function( $ ) {
						$('.counter').counterUp({
							delay: 100,
							time: 1000
						});
					});
				</script>
		<!-- //Stats-Number-Scroller-Animation-JavaScript -->
			
		<!-- smooth scrolling-bottom-to-top -->
				<script type="text/javascript">
					$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/								
					$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!-- //smooth scrolling-bottom-to-top -->
		 <script>
				jQuery("#myMap").on("shown.bs.modal", function () {
					google.maps.event.trigger(map, "resize");
					map.setCenter(centers);
				});
		 </script>
<!-- //js-scripts -->
</body>
</html>