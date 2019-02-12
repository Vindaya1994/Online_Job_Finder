@extends('layouts.app')

@section('content')
<div class="w3-container w3-padding-24" style="padding-left:200px; padding-right:200px;">
  <div class="w3-row">
    <ul class="breadcrumb">
      <li><a href="/vacancy">Available Vacancies</a></li>

    </ul>
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="{{ URL::to('/images/login.jpg') }}" alt="baackground image" style="width:1000px; height:200px">
        <div class="w3-display-topmiddle" >
          <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b>Vacancies</b></h1>
        </div>
    </header>
      <div class="w3-row">
      <div class="w3-col l12 s12 w3-white">
        <div class="w3-container w3-padding-64">
          <table class="w3-table-all">
            @if(count($vacancies) > 0)
                @foreach($vacancies as $vacancy)
                <tr>
                  <td>
                    <div class="w3-row" style="font-size:16px;">
                      <div class="w3-col m4 l5">
                          <img style="width:100%; height:300px;" src="/storage/cover_images/{{$vacancy->cover_image}}">
                       </div>
                       <div class="w3-col m8 l7 w3-padding">
                         <h4><b><a href="/vacancy/{{$vacancy->vac_id}}" >{{$vacancy->vac_position}}</a></b></h4>
                         <small><b>Posted On</b> {{$vacancy->created_at}}<br>
                         <hr>
                         <p>{{$vacancy->vac_description}} </p>

                         <div class="w3-gray w3-padding"><p><b>Posted by</b>
                         <?php
                            $company = App\User::where('id', $vacancy->id)->get();
                            echo $company[0]->company_name;
                          ?>
                        </p>
                      </div>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach

          </table>
            {{$vacancies->links()}}
            @else
                <p> No vacancy found  </p>
            @endif
        </div>
       </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

@endsection
