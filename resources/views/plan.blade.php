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
                            <option value="{{$date->id}}">{{$date->date}}</option>
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
                    @foreach($activities as $activity)
                    <tr>
                        <td>{{$activity->start_time}}</td>
                        <td>{{$activity->end_time}}</td>
                        <td>{{$activity->price}}</td>
                        <td>{{$activity->activity}}</td>
                    </tr>
                    @endforeach
                    @if (!$activities)
                    <tr id="row1" ondrop="drop(event)" ondragover="allowDrop(event)" draggable="true" ondragstart="drag(event)">
                        <td id="start1"></td>
                        <td id="end1"></td>
                        <td id="price1">-</td>
                        <td id="description1"></td>                  
                    </tr>
                    @endif
                </tbody>
            </table>
            <div>
                <form action="/list/store" method="POST">
                    @csrf
                    <input type="hidden" id="db-start" name="start">
                    <input type="hidden" id="db-end" name="end">
                    <input type="hidden" id="db-cost" name="cost">
                    <input type="hidden" id="db-place" name="place">
                    <input type="hidden" id="db-date" name="date">
                    <input type="hidden" id="activity-date" value="{{$activities[0]->date_holiday_id}}">
                    {{-- @if($activities[0]->date_holiday_id == 18) --}}
                    <button id="submit-button" type="submit" class="btn btn-success">Save</button>
                    {{-- @endif --}}
                </form>
            </div>
        </div>
        <div class="wishlist col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h2 style="color: #fca000">Wishlist</h2>
            <hr style="border-color: #fca000">
            @foreach ($wishlists as $wishlist)
            <div id='drag{{$wishlist->id}}' draggable="true" ondragstart="drag(event)" ondrop="drop1(event)" ondragover="allowDrop(event)">
                <a href="{{url('/place/'.$wishlist->id)}}" style="text-decoration: none; color:orange"><h4>{{$wishlist->name}}</h4></a>
                <input type="hidden" id='dur{{$wishlist->id}}' value='{{$wishlist->duration}}'>
            </div>
            @endforeach
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c"></script>
<script>
    var id = 2
    var start = 6
    var end = 0

    var db_start = []
    var db_end = []
    var db_activity = []
    var db_cost = []

    $(document).ready(function() {
        var activity_date = document.getElementById("activity-date").value
        var selected_date = document.getElementById("input").value
        console.log(selected_date)
        if (activity_date == selected_date) {
            document.getElementById("submit-button").remove()
        }
    });

    function allowDrop(ev) {
      ev.preventDefault();
    }
    
    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }
    
    function drop(ev) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
      
      var place_id = data.substring(4)
      var duration = document.getElementById('dur'+place_id).value
      console.log(duration)
      var end = parseInt(start)+parseInt(duration)
      $("table").append('<tr id="row'+id+'" ondrop="drop(event)" ondragover="allowDrop(event)">'+
      '<td id="start'+id+'"></td>'+
      '<td id="end'+id+'"></td>'+
      '<td id="price'+id+'">-</td>'+
      '<td id="description'+id+'"></td></tr>')
    //   console.log(document.getElementById("start"+(id-1)))
      document.getElementById("start"+(id-1)).append(start)
      document.getElementById("end"+(id-1)).append(end)
      
      db_start.push(start)
      db_end.push(end)
      db_activity.push(place_id)
      db_cost.push(100)
      console.log(db_start)

      document.getElementById("db-start").value = db_start;
      document.getElementById("db-end").value = db_end;
      document.getElementById("db-cost").value = db_cost;
      document.getElementById("db-place").value = db_activity;
      document.getElementById("db-date").value = document.getElementById("input").value;
      console.log(document.getElementById("db-date").value)

      id++
      start = end
    }
    function drop1(ev) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
    //   document.getElementById("row4").remove();
    }
    </script>
</body>
</html>