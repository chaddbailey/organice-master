@extends('layouts.app')

@section('title')
Organice - Home 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                
                <div class="main">
                    <div class="kai_banner_container clearfix">
                    <div class="kai_banner_body clearfix">
                        <a href=""><img src="../../assets/img-slider/Cocina_8.jpg"></a>
                        <a href=""><img src="../../assets/img-slider/Cocina_7.jpg"></a>
                        <a href=""><img src="../../assets/img-slider/Cocina_6.jpg"></a>
                        <a href=""><img src="../../assets/img-slider/Cocina_5.jpg"></a>
                        <a href=""><img src="../../assets/img-slider/Cocina_10.jpg"></a>
                    </div>
                    <div class="kai_banner_bottombtns">
                        <span class="highlight" style='background-image:url("../../assets/img-slider/Cocina_8.jpg")'></span>
                        <span style='background-image:url("../../assets/img-slider/Cocina_7.jpg")'></span>
                        <span style='background-image:url("../../assets/img-slider/Cocina_6.jpg")'></span>
                        <span style='background-image:url("../../assets/img-slider/Cocina_5.jpg")'></span>
                        <span style='background-image:url("../../assets/img-slider/Cocina_10.jpg")'></span>
                    </div>
                    <div class="kai_banner_prevbtn side_btn"></div>
                    <div class="kai_banner_nextbtn side_btn"></div>
                    </div>
                </div> 
        </div>
    </div>

            <div class="content">
                <div class="container-fluid">
                
                 <div class="row">
                     <div class="col-lg-12 col-md-6 col-sm-6">
                        <div class="card card-stats">
                     <p><h4>“All successful people men and women are big dreamers. They imagine what their future could be, ideal in every respect, and then they work every day toward their distant vision, that goal or purpose.” 
                    <label>― Brian Tracy, Personal Success</label></h4></p>
                     </div>
                     </div>
                 </div>
                 <form class="navbar-form navbar-right" role="search">
              <div class="form-group  is-empty">
                <input type="text" class="form-control" placeholder="Search">
                <span class="material-input"></span>
              </div>
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i><div class="ripple-container"></div>
              </button>
            </form>
                 <div class="row">
                     <div class="col-md-3">
            <p class="lead">Service Categories</p>
            <div class="list-group">
              <a href="{{ url('booking/list') }}" class="list-group-item">All</a>
              <a href="{{ url('booking/catering') }}" class="list-group-item">Catering</a>
              <a href="{{ url('booking/equipments') }}" class="list-group-item">Equipments</a>
              <a href="#" class="list-group-item">Man Power</a>
            </div>
        </div>
                 </div>

            <div class="row">
            @foreach($admins as $admin)

                    @if($admin->servicetype == '1')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">restaurant</i>
                            </div>
                            <div class="caption">
                                <h4><a href="{{url('/profileID/'.$admin->id)}}">{{$admin->name}}</a></h4>
                                <p>{{$admin->address}}</p>
                            </div><span><a href="#" class="btn btn-primary pull-right">Request</a></span>
                         </div>
                    </div>
                    @endif
                    
            @endforeach
            </div>  
            </div>
            </div>
</div>
@endsection
