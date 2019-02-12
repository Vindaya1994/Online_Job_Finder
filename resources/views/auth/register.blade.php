@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <div id="radioMsg">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--user category-->
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User Category</label>

                            <div class="col-md-3">
                                <label for="user" class="radio-inline">Applicant</label>
                                    <input type="radio" id="yesCheck" onclick="javascript:yesnoCheck();"   class="form-control" name="category" value="Applicant" required  >
                            </div>
                            <div class="col-md-3">
                                <label for="user" class="radio-inline">Job Company</label>
                                <input type="radio"  id="noCheck" onchange="javascript:yesnoCheck();" class="form-control" name="category" value="Company" required>
                            </div>
                        </div>

                        <div class="w3-padding" style="height:170px;" id="ifYes" style="visibility:hidden">

                          <!--comany data-->
                          <label for="company_name" class="col-md-4 control-label">Company Name</label>
                          <div class="col-md-6">
                              <input id="company_name" type="text" class="form-control" name="company_name"  >

                              @if ($errors->has('company_name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('company_name') }}</strong>
                                  </span>
                              @endif
                          </div><br><br>

                          <!--company location-->
                          <label for="company_location" class="col-md-4 control-label">Company Location</label>
                          <div class="col-md-6">
                              <input id="company_location" type="text" class="form-control" name="company_location" >

                              @if ($errors->has('company_location'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('company_location') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function yesnoCheck() {
    if (document.getElementById('noCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

    }
</script>
