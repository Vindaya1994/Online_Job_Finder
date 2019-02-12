@extends('layouts.app')

@section('content')
<div class="w3-container w3-padding-24" style="padding-left:200px; padding-right:200px;">
  <div class="w3-row">
    <ul class="breadcrumb">
      <li><a href="">handle Companies</a></li>

    </ul>
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="{{ URL::to('/images/login.jpg') }}" alt="baackground image" style="width:1000px; height:200px">
        <div class="w3-display-topmiddle" >
          <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b>Companies</b></h1>
        </div>
    </header>
      <div class="w3-row">
      <div class="w3-col l12 s12 w3-white">
        <div class="w3-container w3-padding-64">
          <table class="w3-table-all">
            @if(count($company_data) > 0)
                @foreach($company_data as $company)
                <tr>
                  <td>
                    <div class="w3-row" style="font-size:16px;">

                       <div class="w3-col m8 l7 w3-padding">
                         <h4><b><a href="/admin/{{$company->id}}" >{{$company->company_name}}</a></b></h4>
                         <table>
                           <tr>
                             <td><small><b>Location </b> </td>
                             <td>{{$company->company_location}}</td>
                             <br>
                           </tr>
                          <tr>
                            <td><p><b>Email Address </b></p></td>
                            <td>  {{$company->email}}</td>
                          </tr>
                       </table>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
          </table>
            @else
                <p> No company found  </p>
            @endif
        </div>
       </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

@endsection
