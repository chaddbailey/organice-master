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
<!-- //css files -->

<!-- online-fonts -->
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kanit:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
<!-- //online-fonts -->
<style>
          table {
              font-family: arial, sans-serif;
              font-size: 20px;
              border-collapse: collapse;
              width: 100%;
              text-align: center; 
          }

          td, th {
              border: 1px solid #dddddd;
              padding: 8px;
              text-align: center;
          }

          .design{
            background-color: #dddddd;
            text-align: left;
            font-weight: bolder;
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
                                            <li class="menu__item"><a href="#gallery" class="menu__link scroll"><span class="menu__helper">Gallery</span></a></li>
                                            
                                            
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
    <div class="services-bottom">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="col-md-5 pull-right">
                        
                               <div class="col-md-10">
                                    <div class="form-group">
                                    <h1 class="h1fontcolor">Here's the breakdown of your expense which we allocated to each of the services you need for your event. <i class="fa fa-dollar" style="font-size:30px"></i></h1>
                                    <hr>
                                    <!-- Wedding Event-->
                                    @if($types === 'Wedding')
                                    <h1 style="font-size:50px; text-align: center;padding-top: 50px;">{{$types}}</h1>

                                    </div>
                                </div>
                        
            </div>
           <div class="col-sm-6 pull-left" style="margin-left: 40px;">
              
                     <div class="row"> 
                             <table class="table" style="position: center;">
                                 <tr>
                                     <th>Cost Drivers / Services</th>
                                     <th>Allocated Budget</th>
                                 </tr>
                                 <tr>
                                      <td class="design">Venue, Food and Beverages</td>
                                      <td></td>
                                 </tr>
                                 <tr>
                                     <td>Catering/Food</td>
                                     <td>₱ {{$catering_final}}</td>
                                 </tr>
                                 <tr>
                                     <td>Bartending/Beverages <small>(wines,alcohols,glasswares,etc...)</small> </td>
                                     <td>₱ {{$wine_final}}</td>
                                 </tr>
                                 <tr>
                                     <td>Cakes and Pastries</td>
                                     <td>₱ {{$cakes_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Decorations</td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Equipment <small>(lightings,rentals,chairs,sounds,etc...)</small></td>
                                     <td>₱ {{$equipment_final}}</td>
                                 </tr>
                                 <tr>
                                     <td>Florist/Bouquet <small>(personal,decor flowers,etc...)</small></td>
                                     <td>₱ {{$florist_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Photography/Videography</td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Photography and Videography <small>(photobooths,props,etc...)</small></td>
                                     <td>₱ {{$photography_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Stationary/Paper Goods</td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Giveaways/Invitations <small>(menu,programs,cards,etc...)</small></td>
                                     <td>₱ {{$giveaways_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Entertainment </td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Entertainment <small>(DJ,bands,DI,emcee,dancers,etc...)</small></td>
                                     <td>₱ {{$entertainment_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Attire and Make-up </td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Styling <small>(hair and make-up,etc...)</small></td>
                                     <td>₱ {{$styling_final}}</td>
                                 </tr>
                                 <tr>
                                     <td>Tailoring <small>(outfits,suits,gowns,etc...)</small> </td>
                                     <td>₱ {{$tailoring_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Wedding Accessories and Others </td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Accessories <small>(accessories,rings,bracelets,etc...)</small></td>
                                     <td>₱ {{$accessories_final}}</td>
                                 </tr>
                                 <tr>
                                     <td class="design">Entourage </td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td>Bridal Car/Entourage</td>
                                     <td>₱ {{$bridalcar_final}}</td>
                                 </tr>
                                 <tr>
                                     <td><h3 style="font-size:30px; text-align: center;"">Total Projected Budget</h3></td>
                                     <td>₱ {{$budget}}</td>
                                 </tr>
                             </table>
                     </div>
                @endif 

                <!-- Other Event -->   
                                     @if($types === 'Birthday'|| $types === 'Wedding Anniversary'|| $types === 'Christening'|| $types === 'Thanksgiving'|| $types === 'Debut'|| $types === 'Baby Shower'|| $types === 'Bridal Shower'|| $types === 'Founders Day Celebration'|| $types === 'Fashion Show'|| $types === 'Death Anniversary'|| $types === 'Graduation'|| $types === 'Simple Celebration')
                                     <h1 style="font-size:60px; text-align: center;padding-top: 50px;">{{$types}}</h1>
                                                            
                                     </div>
                                 </div>
                         
             </div>
            <div class="col-sm-6 pull-left" style="margin-left: 40px;">
               
                      <div class="row"> 
                              <table class="table" style="position: center;">
                                  <tr>
                                      <th>Cost Drivers / Services</th>
                                      <th>Allocated Budget</th>
                                  </tr>
                                  <tr>
                                      <td class="design">Venue, Food and Beverages</td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Catering/Food</td>
                                      <td>₱ {{$catering_final}}</td>
                                  </tr>
                                  <tr>
                                      <td>Bartending/Beverages <small>(wines,alcohols,glasswares,etc...)</small> </td>
                                      <td>₱ {{$wine_final}}</td>
                                  </tr>
                                  <tr>
                                      <td>Cakes and Pastries</td>
                                      <td>₱ {{$cakes_final}}</td>
                                  </tr>
                                  <tr>
                                      <td class="design">Decorations</td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Equipment <small>(lightings,rentals,chairs,sounds,etc...)</small></td>
                                      <td>₱ {{$equipment_final}}</td>
                                  </tr>
                                  <tr>
                                      <td class="design">Photography/Videography</td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Photography and Videography <small>(photobooths,props,etc...)</small></td>
                                      <td>₱ {{$photography_final}}</td>
                                  </tr>
                                  <tr>
                                      <td class="design">Entertainment </td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Entertainment <small>(DJ,bands,DI,emcee,dancers,etc...)</small></td>
                                      <td>₱ {{$entertainment_final}}</td>
                                  </tr>
                                  <tr>
                                      <td class="design">Stationary/Paper Goods</td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Giveaways/Invitations <small>(menu,programs,cards,etc...)</small></td>
                                      <td>₱ {{$giveaways_final}}</td>
                                  </tr>
                                  <tr>
                                     <td><h3 style="font-size:30px; text-align: center;"">Total Projected Budget</h3></td>
                                     <td>₱ {{$budget}}</td>
                                 </tr>
                                  
                              </table>
                      </div>
                 @endif

            </div>
    
            </div>  
                        
            <div class="clearfix"> </div>
<!-- //Counter -->



<!-- features -->
    <div class="features" id="features">
    <div class="container">
    <h3> Recommended Partners </h3>
        <div class="content">
                <div class="container-fluid">
                
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">

                            <li role="presentation" class=""><a href="#catering" id="catering-tab" data-toggle="tab" aria-controls="catering" aria-expanded="false">Catering Services</a></li>

                            <li role="presentation" class=""><a href="#equipment" id="equipment-tab" data-toggle="tab" aria-controls="equipment" aria-expanded="false">Equipment Services</a></li>

                            <li role="presentation" class=""><a href="#manpower" id="manpower-tab" data-toggle="tab" aria-controls="manpower" aria-expanded="false">Event Accessories</a></li>

                            <li role="presentation" class=""><a href="#videographer" id="videographer-tab" data-toggle="tab" aria-controls="videographer" aria-expanded="false">Videographer/Photographer</a></li>

                            <li role="presentation" class=""><a href="#printables" id="printables-tab" data-toggle="tab" aria-controls="printables" aria-expanded="false">Printables/Giveaways</a></li>

                            <li role="presentation" class=""><a href="#flower" id="flower-tab" data-toggle="tab" aria-controls="flower" aria-expanded="false">Flowerist and Styles</a></li>

                            <li role="presentation" class=""><a href="#entertainment" id="entertainment-tab" data-toggle="tab" aria-controls="entertainment" aria-expanded="false">Entertainment Services</a></li>

                            <li role="presentation" class=""><a href="#cakes" id="cakes-tab" data-toggle="tab" aria-controls="cakes" aria-expanded="false">Cake and Pastry</a></li>

                            <li role="presentation" class=""><a href="#wines" id="wines-tab" data-toggle="tab" aria-controls="wines" aria-expanded="false">Wines and Beverages</a></li>

                            <li role="presentation" class=""><a href="#styling" id="styling-tab" data-toggle="tab" aria-controls="styling" aria-expanded="false">Styling Services</a></li>                                  

                            <li role="presentation" class=""><a href="#tailoring" id="tailoring-tab" data-toggle="tab" aria-controls="tailoring" aria-expanded="false">Tailoring and Design Services</a></li>

                            <li role="presentation" class=""><a href="#bridalcars" id="bridalcars-tab" data-toggle="tab" aria-controls="bridalcars" aria-expanded="false">Bridal Car Services</a></li>


                    </ul>

                        </div>        


            <div id="myTabContent" class="tab-content">
            

            <div role="tabpanel" class="tab-pane fade active in" id="catering" aria-labelledby="catering-tab">
           <?php
           use Illuminate\Support\Str;
           ?>
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '1')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>
            

            <div role="tabpanel" class="tab-pane fade active in" id="equipment" aria-labelledby="equipment-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '2')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="manpower" aria-labelledby="manpower-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '3')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="printables" aria-labelledby="printables-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '4')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="videographer" aria-labelledby="videographer-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '5')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="flower" aria-labelledby="flower-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '6')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="entertainment" aria-labelledby="entertainment-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '7')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="cakes" aria-labelledby="cakes-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '8')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="wines" aria-labelledby="wines-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '9')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="styling" aria-labelledby="styling-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '10')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="tailoring" aria-labelledby="tailoring-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '11')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="bridalcars" aria-labelledby="bridalcars-tab">
            <div class="row">
            @foreach($joins as $join)
                    @if($join->servicetype == '12')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $join->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$join->id)}}" >
                                <p>{{$join->name}}</p></a></h2>
                                <p style="text-align: center;">{{$join->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$join->rating_count}} {{ Str::plural('review', $join->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $join->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($join->rating_cache, 1) }} stars
                                </p>
                            </div>
                         </div>
                    </div>
                    @endif
           
            @endforeach
            </div>
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
        
<!-- //js-scripts -->
</body>
</html>