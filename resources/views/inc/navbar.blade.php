<nav class="navbar navbar-inverse w3-light-gray">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <div class="navbar-header" style="width:100px;">
              <a class="navbar-brand" href="/">
                <div>
                  <img src="{{ URL::to('/images/logo.jpg') }}" class="w3-left"  alt="system_icon" style="height:40px; width:80px;">
                </div>
              </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
              @if (Auth::guest())
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/aboutus" ><b>About Us</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li> &nbsp;
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/vacancy" ><b>Available Job Vacancies</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>
              @elseif(Auth::user()->category=='Applicant')

                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/aboutus" ><b>About Us</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li> &nbsp;
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/vacancy" ><b>Available Job Vacancies</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>

              @elseif(Auth::user()->category=='Company')

                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/aboutus" ><b>About Us</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li> &nbsp;
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/vacancy" ><b>Available Job Vacancies</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-black"><a href="/vacancy/create"> <b>Add Job Vacancies</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>
              @else
                <li style="padding-top:10px;  width:100px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/aboutus" ><b>About Us</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li> &nbsp;
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/vacancy" ><b>Manage Job Vacancies</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-blue"><a href="/admin" ><b>Manage Companies</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>
                <li style="padding-top:10px; padding-left:5px;" ><button  class="w3-button w3-white w3-hover-white w3-round-large w3-text-white w3-hover-text-black"><a href="/applicant"> <b>Manage Applicants</b></a> &nbsp; <i class='fas fa-angle-down'></i></button></li>
              @endif
              <li style="padding-top:5px;" >
                <form class="navbar-form navbar-left" action="/action_page.php">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                    <input type="text" class="form-control" placeholder=" What do you want to learn?" name="search">
                  </div>
                </form>
              </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="w3-padding"><a href="{{ route('login') }}" class="w3-button w3-border-blue w3-light-blue w3-hover-white w3-round-large w3-text-black w3-hover-text-blue">Login</a></li>
                    <li class="w3-padding"><a href="{{ route('register') }}" class="w3-button w3-light-blue w3-hover-white w3-round-large w3-text-black w3-hover-text-blue">Register</a></li>


                @else
                <div class="w3-dropdown-hover w3-padding">
                   <button class="w3-button w3-padding w3-text-blue"><b>{{ Auth::user()->name }}</b><span class="caret"></span> </button>
                   <div class="w3-dropdown-content w3-bar-block w3-card-4">
                      <ul>
                          <li class="w3-padding w3-light-gray" style="height:50px;"><a href="/dashboard">Dashboard </a></li>
                          <li class="w3-padding w3-light-gray" style="height:50px;"><a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                      </ul>

                   </div>
                </div>

                @endif
            </ul>
        </div>
    </div>
</nav>
