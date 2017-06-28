@extends('layouts.profile')

@section('title')
Service Partners
@endsection

@section('navi')
                      <li class="menu__item menu__item--current"><a href="{{ url('/') }}" class="menu__link"><span class="menu__helper">Home</span></a></li>
                      <li class="menu__item"><a href="#bookevent" class="menu__link scroll"><span class="menu__helper">Book Event</span></a></li>
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
                            <a href="#" class="dropdown-toggle menu__link scroll" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('user')->user()->firstname }} <span class="caret"></span>
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
                                <li><a href="{{ url('/login') }}"></i>Login Client</a>
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
                              <li><a href="{{ url('/admin/login') }}">Login Partner</a></li>
                               <li><a href="{{ url('/admin/register') }}">Register Partner</a></li>
                            </ul>
                        </li>
                    @endif

@endsection

@section('bodycontent')
  
           <div class="row" id="bookevent">
           <!-- SweetAlert -->
           <script src="../assets/dist/sweetalert.min.js"></script>
           <link rel="stylesheet" href="../assets/dist/sweetalert.css">
            @if (Session::has('add_message'))
           <script>
                @foreach($admins as $admin)
                  swal("Thank You!", "{{$admin->name}} Successfully Booked!", "success")
                @endforeach
           </script>
            @endif
           </div>
                       

           <div class="row">
           <div class="col-md-11 col-sm-12 col-xs-12">
             <div class="x_panel">  
              <h3>Book Your Event</h3>
              <label><h4>Fill-up the necessary details of your event.</h4></label>
              <hr>       
                     
                      <form form enctype="multipart/form-data" action="{{ url('/user/inf') }}" > 
                     
                      {{ csrf_field() }} 
                                  
                <div class="row">
                    <div class="col-md-5">
                         <b><h4>1. Please select your booking details.</h4></b>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                         <div class="form-group">
                           <label class="control-label">Date & Time</label>
                             <div class="input-append date form_datetime">
                                 <input size="16" type="text" value="" readonly class="form-control" id="datetime" name="datetime">
                                 <span class="add-on"><i class="icon-remove"></i></span>
                                 <span class="add-on"><i class="icon-th"></i></span>
                             </div>
                           </div>
                  </div> 

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">No. of Guests</label>
                          <input type="text" name="heads" id="heads" class="form-control" value="">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-5">
                         <b><h4>2. Enter event details.</h4></b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Event</label>
                          <select class="form-control" name="event" value="">
                             @foreach($events as $event)
                              <option value="{{$event->type}}">{{$event->type}}</option>
                             @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Venue</label>
                          @foreach($cli as $client)
                          <input type="text" name="venue" id="venue" class="form-control" value="{{$client->location}}"  placeholder=" ">
                          @endforeach
                          @foreach($clireq as $cr)
                          <input id="clat" name="clat" type="text" class="setup-textp " value="{{$cr->lat}}" hidden>
                          <input id="clong" name="clong" type="text" class="setup-textp " value="{{$cr->lng}}" hidden>
                          @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label">Motif</label>
                              <input type="text" name="motif" id="motif" class="form-control" value="">
                            </div>
                    </div>

                    <div id="map"></div>

                      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places&callback=initMap"></script>
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
                         @foreach($clireq as $cr)
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
                </div>

                <div class="row">
                    <div class="col-md-5">
                         <b><h4>3. Enter basic infos.</h4></b>
                    </div>
                </div>

                <div class="row">
                    @foreach($cli as $client)
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Firstname</label>
                          <input type="text" name="firstname" id="firstname" class="form-control" value="{{$client->firstname}}" placeholder=" "><i class=""></i>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Lastname</label>
                          <input type="text" name="lastname" id="lastname" class="form-control" value="{{$client->lastname}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Contact Number</label>
                          <input type="text" name="mobile" id="mobile" class="form-control" value="{{$client->mobile}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input type="text" name="email" id="email" class="form-control" value="{{$client->email}}">
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Budget</label>
                          <input type="text" name="budget" id="budget" class="form-control" value="">
                        </div>
                    </div>
                </div>
                
             


                <div class="form-group">
                     <button type="submit" class="btn btn-primary pull-right">Submit Event Booking</button>
                </div>
                </form>

                              
                </div>
               </div>
             </div>
@endsection



