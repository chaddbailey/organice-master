@extends('layouts.profile')

@section('title')
Package Content
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
              <h3>See the</h3>
              <h4>Contents below</h4>
              
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
               @foreach($package_id as $packs)
                 <h3>Package Content</h3>
                 <p style=" text-align: center; color: red">{{$packs->packagename}}</p>
                
                 <hr>
                 @endforeach
               
               
               <div class="x_content">
                
                @foreach($packagecontent as $packcontent)
                             <label><h2>{{$packcontent->contentname}}</h2>
                             </label><br>
                @endforeach
                  

               </div>
                
                
               </div>
             </div>
           </div>
@endsection
