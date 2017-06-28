@extends('layouts.index')

@section('title')
Organice - Home 
@endsection

@section('content')
<div class="container">
            <div class="row">
           <!-- SweetAlert -->
           <script src="../assets/dist/sweetalert.min.js"></script>
           <link rel="stylesheet" href="../assets/dist/sweetalert.css">
            @if (Session::has('success_message'))
           <script>
                  swal("Success!", "Your account is successfully verified!", "success")
           </script>
            @endif
            @if (Session::has('wrongcode_message'))
           <script>
                  swal("Failed!", "You entered the wrong code!", "error")
           </script>
            @endif
           </div>

            <div class="content">
                <div class="container-fluid">
                
            <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="catering" aria-labelledby="catering-tab">
           <?php
           use Illuminate\Support\Str;
           ?>
            <div class="row">
            @foreach($admins as $admin)
                    @if($admin->servicetype == '1')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '2')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                    <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                    <p>
                                    @for ($i=1; $i <= 5 ; $i++)
                                        <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                    @endfor
                                    {{ number_format($admin->rating_cache, 1) }} stars
                                    </p>
                            </div>
                         </div>
                    </div>
                    @endif
            @endforeach
            </div>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="accessories" aria-labelledby="accessories-tab">
            <div class="row">
            @foreach($admins as $admin)
                    @if($admin->servicetype == '3')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '4')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '5')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '6')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '7')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '8')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '9')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '10')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '11')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
            @foreach($admins as $admin)
                    @if($admin->servicetype == '12')
                    <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail" style="width:320px; height:330px" >
                         <img src="/uploads/avatars/{{ $admin->avatar }}" alt="..." style="width:320px; height:150px">
                            <div class="caption">
                                <h2 style="text-align: center;"><a href="{{url('/partners/'.$admin->id)}}" >
                                <p>{{$admin->name}}</p></a></h2>
                                <p style="text-align: center;">{{$admin->address}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">{{$admin->rating_count}} {{ Str::plural('review', $admin->rating_count) }}</p>
                                <p>
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $admin->rating_cache) ? '' : '-empty'}}"></span>
                                @endfor
                                {{ number_format($admin->rating_cache, 1) }} stars
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
@endsection
