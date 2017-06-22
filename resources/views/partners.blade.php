@extends('layouts.profile')

@section('title')
Service Partners
@endsection


@section('slider')
<!-- banner -->
    <!-- Slider -->
    @foreach($admins as $admin)
    <div class="slider">
      <div class="callbacks_container">
        <ul class="rslides" id="slider">
          <li>
            <div class="w3layouts-banner-top w3layouts-banner-top3">
              <div class="container">
              <div class="slider-info">
              <h3>Here are the</h3>
              <h4>Available Packages</h4>
              
              </div>
              </div>
            </div>
          </li>
          <li>
            <div class="w3layouts-banner-top w3layouts-banner-top4">
              <div class="container">
                <div class="slider-info">
              <h3>You Can</h3>
              <h4>Book Your Event Now!</h4>
              <h5><a href="#" class="view rew3" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>Learn More</a></h5>
            </div>
  
              </div>
            </div>
          </li>
          <li>
            <div class="w3layouts-banner-top w3layouts-banner-top5">
              <div class="container">
                <div class="slider-info">
              <h3>Right Venue</h3>
              <h4>Right Services</h4>
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
                      <h4>How to book your event?</h4>
                      <h5>There are input fields you need to fill-up below</h5>
                      <img src="../assets2/images/inputdetails.jpg" alt="blog-image" />
                      <p>We need to get the necessary informations of your event so that we can be able to recommend services that are available nearest to the location of your event. </p>
                      
                </div>
              </div>
              </div>
               </div>
        <!-- //Modal5 -->
    <!-- //Slider -->
  <!-- //banner -->
    @endforeach
@endsection

@section('partnerabout')
    

    @foreach($admins as $admin) 
      <div class="col-md-6 welcome-right">
          <div class="welcome-right-top">
              <img src="/uploads/avatars/{{ $admin->avatar }}" alt="...">
          </div>
        <div class="clearfix"> </div>
      </div>

      <div class="col-md-6 welcome-left">
        <h3 class="wow fadeInLeft animated animated" data-wow-delay=".5s">About</h3>
        <h4 class="wow fadeInLeft animated animated" data-wow-delay=".5s"></h4>
        <p class="wow fadeInLeft animated animated" data-wow-delay=".5s">
        {{$admin->description}}
        </p>
        <p><a href="#" class="view rew3" data-toggle="modal" data-target="#myMap">More details here...</a></p>
        <h5><a href="{{url('/packages/'. $admin->id)}}"><span class="glyphicon glyphicon-view" aria-hidden="true"></span>View Partner's Portfolio</a></h5>
      <!-- Modal5 -->
            <div class="modal fade" id="myMap" tabindex="-1" role="dialog" >
              <div class="modal-dialog">
              <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4>{{$findpartner->name}}</h4>
                      <h5>{{$findpartner->email}}</h5>
                      <h5>{{$findpartner->address}}</h5>
                      <h5>{{$findpartner->contactperson}}</h5>
                      <h5>{{$findpartner->contactnumber}}</h5>
                     <div id="Map" style="margin-left: 10px;height: 300px;width: 545px;"></div>

                      
                      <script>
                        
                          var map;
                         @foreach($clireq as $cr)
                          var centers = {lat:{{$cr->lat}},lng:{{$cr->lng}}};
                         @endforeach
                          function initMap() {
                                  map = new google.maps.Map(document.getElementById('Map'), {
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
              </div>
              </div>
               </div>
        <!-- //Modal5 -->
      </div>
      @endforeach

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
            @if (Session::has('failed_message'))
           <script>
                  swal("Sorry!", "Date has already been reserved!", "error")
           </script>
            @endif
           </div>
                       

           <div class="row">
           <div class="col-md-11 col-sm-12 col-xs-12">
             <div class="x_panel">  
              <h3>Book a Service</h3>
              <label><h4>Fill-up the necessary details of your event.</h4></label>
              <hr>       
                      @foreach($partners as $partner)
                      <form form enctype="multipart/form-data" action="{{ url('/request'. $partner->id) }}" > 
                      @endforeach
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
                             @foreach($data as $dt)
                                 <input size="16" type="text" value="{{ $dt->datetime }}" readonly class="form-control" id="datetime" name="datetime">
                                 <span class="add-on"><i class="icon-remove"></i></span>
                                 <span class="add-on"><i class="icon-th"></i></span>
                             @endforeach
                             </div>
                           </div>
                  </div> 

                    <div class="col-md-4">
                        <div class="form-group">
                        @foreach($data as $h)
                          <label class="control-label">No. of Guests</label>
                          <input type="text" name="heads" id="heads" class="form-control" value="{{$h->heads}}" placeholder="no. of heads">
                        @endforeach
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                          <div class="form-group">
                            <b><h4>2. Select Package.</h4></b>
                            <select name="package" class="form-control">
                            @foreach($package as $packages)
                            <option value="{{$packages->packagename}}" >
                            {{$packages->packagename}}
                            </option>
                            @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                            @foreach($data as $h)
                              <label class="control-label">Motif</label>
                              <input type="text" name="motif" id="motif" class="form-control" value="{{$h->motif}}" >
                            @endforeach
                            </div>
                    </div>

                            @if($type == 8)
                    <div class="col-md-4">
                            <div class="form-group">
                            @foreach($data as $h)
                              <label class="control-label">Layers of Cake</label>
                              <input type="text" name="uniques" id="uniques" class="form-control" value="" placeholder="add no of layers">
                            @endforeach
                            </div>
                    </div>
                            
                            @elseif($type == 6)
                    <div class="col-md-4">
                            <div class="form-group">
                            @foreach($data as $h)
                              <label class="control-label">Kind</label>
                              <input type="text" name="uniques" id="uniques" class="form-control" value="" placeholder="kind of flower">
                            @endforeach
                            </div>
                    </div>
                          
                          @endif
                </div>

                <div class="row">
                    <div class="col-md-5">
                         <b><h4>3. Enter event details.</h4></b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Event</label>
                          
                             @foreach($data as $event)
                              <input type="text" name="event" class="form-control" value="{{$event->event}}"  placeholder=" ">
                             @endforeach
                          
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
                         <b><h4>4. Enter basic infos.</h4></b>
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

                    @foreach($data as $h)
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Budget</label>
                          <input type="text" name="budget" id="budget" class="form-control" value="{{$h->budget}}">
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Instructions/Notes (What are your plans?)</label>
                          <div class="form-group">
                              <textarea type="text" name="desc" id="desc" class="form-control" rows="2" value="desc"></textarea>
                          </div>
                        </div>
                    </div>
                </div>
             


                <div class="form-group">
                      <button type="submit" class="btn btn-primary pull-right">Send Booking Request</button>
                </div>
                </form>

                              
                </div>
               </div>
             </div>
@endsection

@section('gallery')

        <!-- gallery -->
  <div id="gallery" class="gallery">
    <div class="container"> 
      <h3 class="w3stitle"><span> Gallery</span></h3>
      
      @forelse($images as $img)  
      <div class="gallery-w3lsrow">
        <div class="col-sm-3 col-xs-4 gallery-grids">
          <div class="w3ls-hover panel">
            <a href="/image/{{ $img->image }}" data-lightbox="example-set" data-title="//description">
                <img src="/image/{{ $img->image }}" >
              <div class="view-caption">
                <h5>OrgaNice</h5>
                <span class="glyphicon glyphicon-search"></span>
              </div>
            </a>
          </div>
        </div> 
      </div>
      @empty
      <p style="margin-left: 450px;color: red;">No images from this partner.</p>
      @endforelse
      
    </div> 
  </div>
<!-- //gallery -->

@endsection

@section('ratings')

<div class="agileinfo-contact" id="contact">
  <div class="container">
  <h3 class="agile">Reviews</h3>
    <div class="w3_agile_mail_grids_agile">
      <div class="w3_agile_mail_left">
        <div class="agileits_mail_grid_right1 agile_mail_grid_right1">
          @foreach($admins as $admin)
              <form form enctype="multipart/form-data" action="{{ url('/reviewcontent/'. $admin->id) }}" > 
              @endforeach
                          
                          <div class="form-group">
                                <button type="submit" class="btn btn-primary center">Rate This Service</button>
                          </div>
              </form>
        </div>
      </div>
    </div>
</div>
</div>

@endsection