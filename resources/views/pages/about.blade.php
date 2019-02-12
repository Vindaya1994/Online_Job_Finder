@extends('layouts.app')

@section('content')
<div class="w3-container w3-padding-24" style="padding-left:200px; padding-right:200px;">
  <div class="w3-row">  
    <ul class="breadcrumb">
      <li><a href="/aboutus">About Us</a></li>

    </ul>
    <header class="w3-display-container w3-wide" id="home">
        <img class="w3-image" src="{{ URL::to('/images/login.jpg') }}" alt="baackground image" style="width:1000px; height:200px">
        <div class="w3-display-topmiddle" >
          <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b>About Us</b></h1>
        </div>
    </header>
      <div class="w3-row">
      <div class="w3-col l12 s12 w3-white">
        <div class="w3-container w3-padding-64">
          <p> One of the most common ways today's job seekers uncover employment opportunities is by using online sources. There are hundreds of job boards, both generic and niche, as well as aggregators, social media channels, networking groups and staffing company websites to choose from. </p>
        </div>
       </div>
      </div>

  </div>
</div>

@endsection

@section('footer')

@endsection
