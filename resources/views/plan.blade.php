<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plan</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plan.css')}}">
</head>
<body>
    <div class="landing-background" style="background: url('../images/trip/{{$holiday->image}}');background-repeat: no-repeat;background-size: cover;background-position: center">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <strong><a class="navbar-brand" href="#">Trippie</a></strong>
                </div>
        
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('')}}">Home</a></li>
                        <li><a href="{{url('')}}">Cities</a></li>
                        <li><a href="{{url('')}}">Trips</a></li>
                        <li><a href="{{url('')}}">Contact Us</a></li>
                        @guest
                        <li><a href="{{url('/login')}}">Login</a></li> 
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('/list')}}">Holiday List</a></li>
                                <li><a href="{{url('/place')}}">Wishlist</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <div style="padding-top: 250px;"></div>
        <div class="headline container-fluid">
            <h1>{{$holiday->title}}</h1>
            <h4>{{$holiday->start}} - {{$holiday->end}}</h4>
        </div>
    </div>
    <div class="panel">
        <div class="rundown col-xs-8 col-sm-8 col-md-8 col-lg-8 container-fluid">
            <div class="container" style="margin-top:30px">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <select name="" id="input" class="form-control" required="required">
                        @foreach($holiday->date as $date)
                            <option value="">{{$date->date}}</option>
                        @endforeach
                    </select>
                </div>
                
                
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Start time</th>
                        <th class="text-center">End time</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="row1">
                        <td id="start1">06.00</td>
                        <td id="end1">-</td>
                        <td id="price1">-</td>
                        <td id="description1" ondrop="drop(event)" ondragover="allowDrop(event)"></td>                  
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="wishlist col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h2 style="color: #fca000">Wishlist</h2>
            <hr style="border-color: #fca000">
            @foreach ($wishlists as $wishlist)
            <div>
                <h4>{{$wishlist->name}}</h4>
            </div>
            @endforeach
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c"></script>

</body>
</html>