@extends('layouts.app')

@section('content')
<header class="w3-display-container w3-wide" id="home">
    <img class="w3-image" src="{{ URL::to('/images/bg1.jpg') }}" alt="baackground image" width="1600" height="100px">
    <div class="w3-display-left w3-padding-large" >
      <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b><i>Anything</i> is possible</b></h1>
      <p class=" w3-text-black w3-hide-small"><b>Build your future with us and explore opportunities</b></p>
      <h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off">JOIN HERE</button></h6>
    </div>
  </header>
  <div class="w3-row">
  <div class="w3-col l4 s4 w3-white">
    <div class="w3-container w3-padding-64">
      <ul class="w3-ul w3-hoverable">
         <li>
              <h3 style="border-color: coral;"><span class="w3-badge w3-border w3-white" >1</span>Best way to advertise a job vacancy </h3>
              <p> Effectively advertising job openings means making the most of your time, effort and money. Ultimately, you want to fill the job opening with the most qualified candidate. The best ways to do that will also enable you to fill the job in a timely manner. No one can tell you the surefire way to fill a job, but with careful assessment of available options, you can determine the most effective means for finding the right candidates for the position.</p>
         </li>
         <li>
              <h3 style="border-color: coral;"><span class="w3-badge w3-border w3-white" >2</span> Attract Applicants </h3>
              <p>Attracting job applicants might be relatively easy, but attracting qualified and enthusiastic job applicants is a challenge for many companies. Writing the perfect job posting can be one way to appeal to job applicants.</p>
         </li>

       </ul>
   </div>
  </div>
  <div class="w3-col l8 s8 w3-light-gray  ">
    <div class="container w3-padding-64">
      <img class="w3-image" src="{{ URL::to('/images/homepage1.jpeg') }}" alt="baackground image" width="1600" height="100px">
    </div>
  </div>
</div>
@endsection
