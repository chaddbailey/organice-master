@extends('layouts.profile')

@section('title')
Packages
@endsection

@section('slider')
<!-- banner -->
    <!-- Slider -->
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
@endsection


@section('bodycontent')
         <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="x_panel">
                 <h3>Available Packages</h3>
                 <hr>
               <div class="x_content">
                
                <div class="row">
                  @forelse($package as $packages)
                    <div class="col-sm-4 col-lg-4 col-md-4">
                      <div class="thumbnail">
                        <div style="width:320px; height:150px"><p style="font-size: 25px; text-align: center;">{{$packages->packagename}}</p>
                        
                        </div>
                        <div class="caption">
                           
                            <span class="label label-warning"><h4>Price: ₱ {{$packages->price}}</h4></span> 
                            <span><a href="{{url('/content/'.$packages->id)}}" class="btn btn-primary">Show Content</a></span>
                        </div>
                        
                      </div>
                    </div>
                  @empty
                  <p style="margin-left: 450px;color: red;">No available packages from this partner.</p>
                  @endforelse
                </div>

               </div>
             </div>
           </div>
         </div>
@endsection

<!-- Ratings and Reviews -->
@section('ratings')

    @foreach($admins as $admin)
    <form form enctype="multipart/form-data" action="{{ url('/reviewcontent/'. $admin->id) }}" > 
    @endforeach
                
                <div class="form-group">
                      <button type="submit" class="btn btn-primary center">Rate This Service</button>
                </div>
    </form>

@endsection
<!-- //Ratings and Reviews -->

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