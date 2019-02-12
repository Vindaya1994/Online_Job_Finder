@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->category=='Company')
                    <div class="w3-container">
                        <h2>Campany Vacancy</h2>

                        <table class="w3-table-all w3-centered">
                          <tr>
                            <th>Position</th>
                            <th></th>
                            <th></th>
                          </tr>
                          @if(count($vacancies) > 0)
                            @foreach($vacancies as $item)
                          <tr>
                            <td>{{$item->vac_position}}</td>
                            <td>  <td class="w3=padding">  <a href="/vacancy/{{$item->vac_id}}/edit" class="w3-btn w3-round-xxlarge w3-green">Edit job vacancy</a></td></td>
                            <td class="w3=padding">{!! Form::open(['action' => ['VacancyController@destroy',$item->vac_id],'method' => 'POST']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete job vacancy',['class'=> 'w3-btn w3-round-xxlarge w3-red'])}}
                            {!! Form::close() !!}
                          </td>
                          </tr>
                          @endforeach
                        @endif
                        </table>
                      </div>
                    @elseif(Auth::user()->category=='Applicant')
                    <div class="w3-container">
                      <header class="w3-display-container w3-wide" id="home">
                          <img class="w3-image" src="{{ URL::to('/images/bg1.jpg') }}" alt="baackground image" width="1600" height="100px">
                          <div class="w3-display-left w3-padding-large" >
                            <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b><i>Anything</i> is possible</b></h1>
                            <p class=" w3-text-black w3-hide-small"><b>Build your future with us and explore opportunities</b></p>
                            <h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off">JOIN HERE</button></h6>
                          </div>
                        </header>
                    </div>
                    @else
                    <div class="w3-container">
                      <header class="w3-display-container w3-wide" id="home">
                          <img class="w3-image" src="{{ URL::to('/images/bg1.jpg') }}" alt="baackground image" width="1600" height="100px">
                          <div class="w3-display-left w3-padding-large" >
                            <h1 class="w3-white w3-padding w3-text-blue" style="color:#000f1a;"><b><i>Anything</i> is possible Admin</b></h1>
                            <p class=" w3-text-black w3-hide-small"><b>Build your future with us and explore opportunities</b></p>
                            <h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off">JOIN HERE</button></h6>
                          </div>
                        </header>
                    </div>
                  @endif
    </div>
</div>
@endsection
