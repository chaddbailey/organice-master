@extends('layouts.clientregister')

@section('title')
Client Registration 
@endsection

@section('content')
      <!--   Big container   -->
      <div class="container">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="red" id="wizard">
                    <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                       <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                          <div class="wizard-header">
                              <h3 class="wizard-title">
                                Client Registration
                              </h3>
                              <h5>This information will let us know more about you.</h5>
                          </div>

                        <div class="wizard-navigation">
                              <ul>
                                  <li><a href="#account" data-toggle="tab">Account</a></li>
                                  <li><a href="#about" data-toggle="tab">About</a></li>
                                  <li><a href="#event_type" data-toggle="tab">Event Type</a></li>
                                 
                              </ul>
                        </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="account">
                                  <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <h4 class="info-text"> Let's start with your account details.</h4>
                                    </div>

                         <div class="col-sm-6 col-sm-offset-3">

                              <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                  <i class="material-icons">email</i>
                                </span>
                               <div class="form-group">
                                      <label class="control-label">Email</label>
                                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                       @if ($errors->has('email'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                       @endif
                                </div>
                              </div>

                              <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                  </span>
                                <div class="form-group">
                                       <label class="control-label">Password</label>
                                       <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                                       @if ($errors->has('password'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                       @endif
                                </div>
                              </div>

                              <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                  </span>
                                <div class="form-group">
                                       <label class="control-label">Confirm Password</label>
                                       <input name="password_confirmation" type="password" class="form-control">
                                </div>
                              </div>

                          </div>

                                  </div>
                                </div>

                                 <div class="tab-pane" id="about">
                                  <div class="row">
                                      <h4 class="info-text"> Fill in your basic information.</h4>

                                      <div class="col-sm-6 col-sm-offset-3">
                                         <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label">Firstname</label>
                                    <input name="firstname" type="text" class="form-control">
                                </div>
                              </div>
                              
                              <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person_outline</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label">Lastname</label>
                                    <input name="lastname" type="text" class="form-control">
                                </div>
                              </div>

                              <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">phone</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label">Mobile Number</label>
                                    <input name="mobile" type="text" class="form-control">
                                </div>
                              </div>

                              <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">add_location</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label">Location</label>
                                    <input name="location" id="location" placeholder=" " type="text" class="form-control">
                                </div>
                              </div>  
                                      </div>
                                      
                                  </div>
                                </div>

                                <div class="form-group tab-pane" id="event_type">
                                    <h4 class="info-text">What type of event are you organizing? </h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-4">

                                          <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                              <label class="control-label">What is your type of event ?</label>
                                              
                                              <select class="form-control" name="event">@foreach($events as $event)
                                                  <option value="{{ $event->event_id, old('event')}}">{{$event->type}}</option>@endforeach
                                              </select>
                                              
                                            </div>
                                          </div>

                                        </div>
                                    </div>

                                </div>

                               
                            </div>

                            



                            <div class="wizard-footer">
                                  <div class="pull-right">
                                      <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                                      <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />

                                  </div>
                                  <div class="pull-left">
                                      <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

                    
                                  </div>
                                  <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->
@endsection
