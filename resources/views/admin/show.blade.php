@extends('layouts.app')

@section('content')
<div class="w3-container w3-padding-24" style="padding-left:200px; padding-right:200px;">
  <div class="w3-row">
    <ul class="breadcrumb">
      <li><a href="/admin">Handle Companies</a></li>
    </ul>
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="{{ URL::to('/images/login.jpg') }}" alt="baackground image" style="width:1000px; height:200px">
        <div class="w3-display-topmiddle" >
          <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b>Handle Companies</b></h1>
        </div>
    </header>
    <div class="w3-row">
      <div class="w3-col l12 s12 w3-white">
        <div class="w3-container w3-padding-64">
          <div class="w3-padding">
            <a href="/admin"class="w3-button w3-teal">Go Back</a>
          </div>
          @include('inc.message')
          <table class="w3-table-all">
                <tr><td><h4><b>{{$company->company_name}}</b></h4></tr>
                  <td>
                    <div class="w3-padding w3-light-gray" style="padding-left:200px;">
                      <p>Location      :  {{$company->company_location}}</p><br>
                      <p>Email  :  {{$company->email}}</p><br>
                  </div>
                </td>
                </tr>
          </table>
          <hr>
          <table>
          <tr>
          @if(!Auth::guest())

              @if(Auth::user()->id==1)
              <td class="w3=padding">  <a href="/admin/{{$company->id}}/edit" class="w3-btn w3-round-xxlarge w3-green">Edit job vacancy</a></td>
              <!--<td class="w3=padding">{!! Form::open(['action' => ['AdminController@destroy',$company->id],'method' => 'POST']) !!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete company',['class'=> 'w3-btn w3-round-xxlarge w3-red'])}}
              {!! Form::close() !!}
              </td>-->
              @endif
          @endif
        </tr>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

@endsection
