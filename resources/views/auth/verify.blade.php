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
                       <form class="form-horizontal" role="form" method="POST" action="{{ url('auth/verify') }}">
                        {{ csrf_field() }}

                          <div class="wizard-header">
                              <h3 class="wizard-title">
                                Account Verification
                              </h3>
                              <h5>Enter the code we sent to your mobile number.</h5>
                          </div>

                        <div class="wizard-navigation">
                              <ul>
                                  
                                  <li><a href="#verify" data-toggle="tab">Verification</a></li>

                              </ul>
                        </div>

                            <div class="tab-content">
                                

                                <div class="form-group tab-pane" id="verify">
                                    <div class="row">
                                    
                                    <div class="col-sm-4 col-sm-offset-4">
                                        
                                            
                                          <div class="form-group label-floating">
                                              <label class="control-label">Verification Code</label>
                                              <input name="code" type="text" class="form-control">
                                            </div>
                                       
                                       
                                    </div>
                                    </div>

                              

                                </div>
                            </div>

                            



                            <div class="wizard-footer">
                                  <div class="pull-right">
                                      
                                      <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />

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
