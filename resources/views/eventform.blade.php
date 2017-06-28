@extends('layouts.profile')

@section('title')
Make Event
@endsection


@section('bodycontent')
  
           <div class="row">
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
              <h3>Fill out.</h3>
              <label><h4>Fill-up the necessary details of your event.</h4></label>
              <hr>       
                     
                      <form action="/user/inf">
                     
                      {{ csrf_field() }} 
                                  
                <div class="row">
                    <div class="col-md-5">
                         <b><h4>1. Please select your event details.</h4></b>
                    </div>
                </div>

                <div class="row">
                                          
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Date</label>
                          <input type="datepicker" name="date" id="datepicker" class="form-control" value="" placeholder=" "><i class=""></i>
                        </div>
                    </div>



                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Time</label>
                          <input type="time" name="time" id="time" class="form-control" value="">
                        </div>
                    </div>

                </div>
               

                <div class="row">
                    <div class="col-md-5">
                         <b><h4>2. What event are you organizing?</h4></b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Event</label>
                          <select class="form-control" name="event">
                              @foreach($events as $event)
                              <option value="{{ $event->type }}">{{$event->type}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Venue</label>
                          @foreach($venues as $ven)
                          <input type="text" name="venue" id="venue" class="form-control" value="{{$ven->venue}}"  placeholder=" ">
                          @endforeach
                        </div>
                    </div>

                      <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsmYK9yYsJukH7KXcd2sOVJ8ANklrJU3A&libraries=places"></script>
                      <script type="text/javascript">

                        /*function initialize() {
                
                        var input = document.getElementById('venue');
                        var country = {
                           componentRestrictions: {country: "ph"}
                         };
                        autocomplete = new google.maps.places.Autocomplete(input,country);
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);*/
                        var local;
                        var map;
                        var centers = {lat:10.309937078055952,lng:123.89307975769043};
                        function initializeMap(){
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

                      </script>
                       <input id="clat" type="text" class="setup-textp ">
                   <input id="clong" type="text" class="setup-textp ">
                   <input type="text" name="address"  class="setup-textp" id="job-address">
                   <div class="map" id="map"></div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                         <b><h4>4. Enter basic infos.</h4></b>
                    </div>
                </div>

                <div class="row">
                                          
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Firstname</label>
                          <input type="text" name="firstname" id="firstname" class="form-control" value="" placeholder=" "><i class=""></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Lastname</label>
                          <input type="text" name="lastname" id="lastname" class="form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Contact Number</label>
                          <input type="text" name="contactnum" id="contactnum" class="form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input type="text" name="email" id="email" class="form-control" value="">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                      <a href="{{url('client/dashboard')}}" type="submit" class="btn btn-primary pull-right">Make Event</a>
                </div>
                </form>

                              
                </div>
               </div>
             </div>
@endsection

      