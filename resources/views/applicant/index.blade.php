@extends('layouts.app')

@section('content')
<div class="w3-container w3-padding-24" style="padding-left:200px; padding-right:200px;">
  <div class="w3-row">
    <ul class="breadcrumb">
      <li><a href="">handle Applicant</a></li>

    </ul>
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="{{ URL::to('/images/login.jpg') }}" alt="baackground image" style="width:1000px; height:200px">
        <div class="w3-display-topmiddle" >
          <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b>Applicants</b></h1>
        </div>
    </header>
      <div class="w3-row">
      <div class="w3-col l12 s12 w3-white">
        <div class="w3-container w3-padding-64">
          <table class="w3-table-all">
            @if(count($applicant_data) > 0)
                @foreach($applicant_data as $applicant)
                <tr>
                  <td>
                    <div class="w3-row" style="font-size:16px;">

                       <div class="w3-col m8 l7 w3-padding">
                         <h4><b><a href="" >{{$applicant->name}}</a></b></h4>
                         <table>
                           <tr>
                             <td><small><b>Email address</b> </td>
                             <td>{{$applicant->email}}</td>
                             <br>
                           </tr>
                       </table>


                      </div>
                    </div>
                  </td>
                </tr>
                @if(!Auth::guest())
                    @if(Auth::user()->id==1)
                      <td class="w3=padding">  <a href="/applicant/{{$applicant->id}}/edit" class="w3-btn w3-round-xxlarge w3-green">Edit applicant</a></td>
                    @endif
                @endif
              @endforeach
          </table>
            @else
                <p> No applicant found  </p>
            @endif
        </div>
       </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

@endsection
