@extends('layouts.profile')

@section('title')
Service Partners
@endsection





@section('bodycontent')
  
           <div class="row">
           <!-- SweetAlert -->
           <script src="../assets/dist/sweetalert.min.js"></script>
           <link rel="stylesheet" href="../assets/dist/sweetalert.css">
            @if (Session::has('add_message'))
           <script>
                  swal("Thank You!", "Event Successfully Booked!", "success")
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
                          <label class="control-label">No. of Heads</label>
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



