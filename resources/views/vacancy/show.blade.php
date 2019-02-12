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
          <div class="w3-padding">
            <a href="/vacancy"class="w3-button w3-teal">Go Back</a>
          </div>
          @include('inc.message')
          <table class="w3-table-all">
                <tr><td><h4><b>{{$vacancy->vac_position}}</b></h4></tr>
                <tr class="w3-center w3-black" >
                    <div style="padding-left:300px;" class="w3-gray">
                      <img class="w3-center" style="width:300px; height:300px;" src="/storage/cover_images/{{$vacancy->cover_image}}"></tr>
                  </div>
                <tr>
                  <td><div class="w3-padding w3-light-gray" style="padding-left:200px;">
                      <p>{{$vacancy->vac_description}}</p><br>
                      <p>Basic salary  :  {{$vacancy->basic_salary}}</p><br>
                      <p>Posted on     :  {{$vacancy->created_at}}  </p><br>
                      <p>Posted by     :
                        <?php
                           $comapny = App\User::where('id', $vacancy->id)->get();
                           echo $comapny[0]->company_name;
                         ?>
                      </p>
                  </div>
                </td>
                </tr>
          </table>
          <hr>
          <table>
          <tr>
          @if(!Auth::guest())
            <?php  $comapny[0]->category  ?>
            @if(Auth::user()->id==$vacancy->id or Auth::user()->id==1)
                <td class="w3=padding">  <a href="/vacancy/{{$vacancy->vac_id}}/edit" class="w3-btn w3-round-xxlarge w3-green">Edit job vacancy</a></td>


                <td class="w3=padding">{!! Form::open(['action' => ['VacancyController@destroy',$vacancy->vac_id],'method' => 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete job vacancy',['class'=> 'w3-btn w3-round-xxlarge w3-red'])}}
                {!! Form::close() !!}
              </td>
            @endif

            <?php
              $cat = App\User::where('id', Auth::user()->id)->get();
              //echo $cat[0]->category;
              if($cat[0]->category=='Applicant'){?>


                    <button class="w3-center">  <a href="/candidate/{{ $vacancy->vac_id}}/edit" class="w3-btn w3-round-xxlarge w3-green">Apply</a></button>



                <?php }
             ?>

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
