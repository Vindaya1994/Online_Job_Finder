@extends('layouts.app')

@section('content')
<div class="w3-container w3-padding-24" style="padding-left:200px; padding-right:200px;">
  <div class="w3-row">
    <ul class="breadcrumb">
      <li><a href="">Edit Vacancies</a></li>

    </ul>
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="{{ URL::to('/images/login.jpg') }}" alt="baackground image" style="width:1000px; height:200px">
        <div class="w3-display-topmiddle" >
          <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b> Edit Vacancies</b></h1>
        </div>
    </header>
      <div class="w3-row">
      <div class="w3-col l12 s12 w3-white">
        <div class="w3-container w3-padding-64">

          {!! Form::open(['action' => ['VacancyController@update',$vacancy->vac_id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
              <div class="w3-container w3-light-grey">
                  {{Form::label('position','Position')}}
                  {{Form::text('position',$vacancy->vac_position,['class'=> 'w3-input w3-border','placeholder' => 'Enter job position' ])}}
              </div><br>
              <div class="w3-container w3-light-grey">
                  {{Form::label('basic_salary','Basic salary')}}
                  {{Form::text('basic_salary',$vacancy->basic_salary,['class'=> 'w3-input w3-border','placeholder' => 'Enter basic salary' ])}}
              </div><br>
              <div class="w3-container w3-light-grey">
                  {{Form::label('description','Job description')}}
                  {{Form::text('description',$vacancy->vac_description,['class'=> 'w3-input w3-border','placeholder' => 'Enter job description' ])}}
              </div><br>
              <div class="w3-container w3-light-grey">
                  {{Form::file('cover_image')}}
              </div><br>
              {{Form::hidden('_method','PUT')}}
              {{Form::submit('Submit',['class'=> 'w3-btn w3-round-xxlarge w3-green'])}}
          {!! Form::close() !!}
        </div>
       </div>
    </div>
  </div>
</div>

@endsection

@section('footer')

@endsection
