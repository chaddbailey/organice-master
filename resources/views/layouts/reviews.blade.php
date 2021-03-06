<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        margin-left: 150px;
        height: 300px;
        width: 800px;
      }
    </style>

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

<!-- review styles -->
@yield('ratingstyle')
<!-- //review styles -->

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
											<li class="menu__item"><a href="#features" class="menu__link scroll"><span class="menu__helper">Rate Service</span></a></li>
											
											
											
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
                            <a href="#" class="dropdown-toggle menu__link scroll" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('user')->user()->firstname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="drop">
                            <a href="#" class="dropdown-toggle menu__link scroll" data-toggle="dropdown" role="button" aria-expanded="false">
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
                            <a href="#" class="dropdown-toggle menu__link scroll" data-toggle="dropdown" role="button" aria-expanded="false">
                               Service Partner <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/admin/login') }}"><i class="fa fa-btn fa-sign-in"></i>Login Partner</a></li>
                               <li><a href="{{ url('/admin/register') }}">Register Partner</a></li>
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
	<!-- //header -->
				
</div>

<!-- banner -->
		<!-- Slider -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider">
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top3">
							<div class="container">
							<div class="slider-info">
							<h4>{{$partner->name}}</h4>
							<h3>{{$partner->address}}</h3>
							<h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myMap">More details here...</a></h5>
							</div>
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top4">
							<div class="container">
								<div class="slider-info">
							<h4>{{$partner->name}}</h4>
							<h3>{{$partner->address}}</h3>
							<h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myMap">More details here...</a></h5>
						</div>
	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top5">
							<div class="container">
								<div class="slider-info">
							<h4>{{$partner->name}}</h4>
							<h3>{{$partner->address}}</h3>
							<h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myMap">More details here...</a></h5>
						</div>

								
							</div>
						</div>
					</li>

				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
      <!-- Modal5 -->
            <div class="modal fade" id="myMap" tabindex="-1" role="dialog" >
              <div class="modal-dialog">
              <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4>{{$partner->name}}</h4>
                      <h5>{{$partner->email}}</h5>
                      <h5>{{$partner->address}}</h5>
                      <h5>{{$partner->contactperson}}</h5>
                      <h5>{{$partner->contactnumber}}</h5>
                     <div id="Map" style="margin-left: 10px;height: 300px;width: 545px;"></div>
                     
                     
                      <script>
                        
                          var map;
                          var centers = {lat:10.309937078055952,lng:123.89307975769043};
                          function initMap() {
                                  map = new google.maps.Map(document.getElementById('Map'), {
                                      center:centers,
                                      zoom: 18,
                                      mapTypeId: google.maps.MapTypeId.HYBRID
                                    });
                                    var marker = new google.maps.Marker({
                                              map: map,
                                              position: centers
                                            });
                        
                                      }
                      </script>
                      
                </div>
              </div>
              </div>
               </div>
        <!-- //Modal5 -->
		<!-- //Slider -->
	<!-- //banner -->

<!-- features -->
			
           </div>	
		</div>
	</div>
<!-- //features-->
           
  
<!-- Counter -->
	<div class="ratingfeatures" id="features">
		<div class="container">
					<?php
				 	use App\Reviews;
				 	use Illuminate\Support\Str;
				 	use App\User;
				 	?>

				 	    <div class="row">
				 	      
				 	        <div class="col-md-9">
				 	                    <div class="thumbnail">
				 	                      
				 	                      <div class="caption-full">
				 	                         
				 	                          <h3><a href="{{url('reviewcontent/'.$admin->id)}}">{{$partner->name}}</a></h3>
				 	                          <p>{{$partner->address}}</p>
				 	                         
				 	                      </div>
				 	                      <div class="ratings">
				 	                          <p class="pull-right">{{$partner->rating_count}} {{ Str::plural('review', $partner->rating_count) }}</p>
				 	                          <p>
				 	                            @for ($i=1; $i <= 5 ; $i++)
				 	                              <span class="glyphicon glyphicon-star{{ ($i <= $partner->rating_cache) ? '' : '-empty'}}"></span>
				 	                            @endfor
				 	                            {{ number_format($partner->rating_cache, 1) }} stars
				 	                          </p>
				 	                      </div>
				 	                    </div>

				 	          <div class="well" id="reviews-anchor">
				 	              <div class="row">
				 	                <div class="col-md-12">
				 	                  @if(Session::get('errors'))
				 	                    <div class="alert alert-danger">
				 	                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 	                       <h5>There were errors while submitting this review:</h5>
				 	                       @foreach($errors->all('<li>:message</li>') as $message)
				 	                          {{$message}}
				 	                       @endforeach
				 	                    </div>
				 	                  @endif
				 	                  @if(Session::has('review_posted'))
				 	                    <div class="alert alert-success">
				 	                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 	                      <h5>Your review has been posted!</h5>
				 	                    </div>
				 	                  @endif
				 	                  @if(Session::has('review_removed'))
				 	                    <div class="alert alert-success">
				 	                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 	                      <h5>Your review has been removed!</h5>
				 	                    </div>
				 	                  @endif
				 	                </div>
				 	              </div>

				 	              <div class="text-right">
				 	                <a href="#reviews-anchor" id="open-review-box" class="btn btn-success btn-green">Leave a Review</a>
				 	              </div>

				 	              <div class="row" id="post-review-box" style="display:none;">
				 	                <div class="col-md-12">
				 	                  <!-- form here -->
				 	                  {{Form::open()}}
				 	                  {{Form::hidden('rating', null, array('id'=>'ratings-hidden'))}}
				 	                  {{Form::textarea('comment', null, array('rows'=>'5','id'=>'new-review','class'=>'form-control animated','placeholder'=>'Enter your review here...'))}}
				 	                  <div class="text-right">
				 	                    <div class="stars starrr" data-rating=""></div>
				 	                    <a href="#" class="btn btn-danger btn-sm" id="close-review-box" style="display:none; margin-right:10px;"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
				 	                    <button class="btn btn-success" type="submit">Save</button>
				 	                  </div>
				 	                  <!-- form close -->
				 	                  {{Form::close()}}
				 	                </div>
				 	              </div>


				 	               @foreach($reviews as $review)
				 	              <hr>
				 	                <div class="row">
				 	                  <div class="col-md-12">
				 	                    @for ($i=1; $i <= 5 ; $i++)
				 	                      <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
				 	                    @endfor
				 	                   
				 	                    {{ $review->user ? $review->user->name :  'Anonymous' }} 
				 	                    <span class="pull-right">{{$review->timeago}}</span> 
				 	                   
				 	                    <p>{{{$review->comment}}}</p>
				 	                  </div>
				 	                </div>
				 	              @endforeach


				 	              {{ $reviews->links() }}
				 	              

				 	            </div>
				 	        </div>

				 	    </div>
				<div class="clearfix"> </div>
				<div class="border"></div>

		</div>
	</div>
<!-- //Counter -->



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
		
		<!-- //Baneer-js -->
		
		<script type="text/javascript" src="../assets2/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../assets2/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
			
			
		
				
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

		<!-- load Rating JS -->
		@yield('script')
		<!-- load Rating JS -->
		
<!-- //js-scripts -->
</body>
</html>