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
            <div>
                <h4></h4>
                <div>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                </div>
            </div>
            
            <div id="drag3" draggable="true" ondragstart="drag(event)">
                <h4 id="drag3-activity"></h4>
                <div class="hidden">
                    <h4 id="drag3-price"></h4>
                    <h4 id="drag3-duration"></h4>
                    <h4 id="drag3-address"></h4>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c"></script>

<script>
    var count = 2;
    var temp;
    var obj = {
        "data" : [{
            "duration": 4, 
            "activity": "Ancol", 
            "price": "Rp. 100.000 - Rp. 400.000",
            "address" : "Central Park Jakarta" 
        },
        {
            "duration": 2, 
            "activity": "Central Park", 
            "price": "Rp. 200.000 - Rp. 400.000",
            "address" : "Taman Impian Jaya Ancol"
        },
        {
            "duration": 1, 
            "activity": "Kota Tua", 
            "price": "Rp. 50.000 - Rp. 100.000",
            "address" : "Kota Tua Jakarta"
        }
        ],
    };
    
    for (i = 0; i < 3; i++) { 
        $('#drag'+(i+1)+'-activity').html(obj.data[i].activity);
        $('#drag'+(i+1)+'-price').html(obj.data[i].price);
        $('#drag'+(i+1)+'-duration').html(obj.data[i].duration);  
        $('#drag'+(i+1)+'-address').html(obj.data[i].address);    
    }

    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        temp = ev.target;
    }

    function unDrag(ev){

    }

    function drop(ev) {
        ev.preventDefault();
        var dat = ev.dataTransfer.getData("text");
        var check = ev.target.id;

        if($('#'+ev.target.id).text() == "" ){
            
            ev.target.appendChild(document.getElementById(dat));
            
            if(count > 2){
                var c = document.getElementById('description'+(count-2)).childNodes[0].id;
                var d = document.getElementById('description'+(count-1)).childNodes[0].id;
                var a = $('#'+c+'-address').text();
                var b = $('#'+d+'-address').text();
                $.ajax({
                    url: "https://maps.googleapis.com/maps/api/distancematrix/json?origins="+a+"&destinations="+b+"&mode=driving&language=en-FR&key=AIzaSyCec-1HavYb2nmaIpEwf1WeZmVyPhseZ9o",
                    cache: false,
                    dataType : '',
                    success: function(data){
                        console.log(data);
                        var duration = data['rows'][0]['elements'][0]['duration']['text'];

                       
                        var hoursTrav = 0;
                        var startMin = $('#startT'+Number(count-1)).text().substring(3,5);
                        var startHour = $('#startT'+Number(count-1)).text().substring(0,2);
                        if(duration.includes("hour") == true){
                            hoursTrav = duration.substring(0,2);
                            var minsTrav = duration.substring(duration.length-7, duration.length-4);
                        }
                        else {
                            var minsTrav = duration.substring(0,2);
                        }

                        var timeTrav = String(Number(startHour)+Number(hoursTrav))+'.'+String(Number(startMin)+Number(minsTrav));
                        $('#endT'+Number(count-1)).text(timeTrav);
                        $('#start'+Number(count-1)).text(timeTrav);  

                        var index = ev.target.id.slice(-1);

                        var price = $('#'+dat+'-price').text();
                        var duration = $('#'+dat+'-duration').text();
                        
                        
                        $('#price'+index).text(price);
                         
                        var y = Number(timeTrav.substring(0,2))+Number(duration);
                        
                        if( y < 10){
                            var z = '0'+y+'.'+String(Number(startMin)+Number(minsTrav));
                        }
                        else{
                            var z = y+'.'+String(Number(startMin)+Number(minsTrav));
                        }
                        $('#end'+index).text(z);

                        $(document).ready(function(){
                            var travelling = $("tbody").append('<tr id="rowT'+count+'"><td id="startT'+count+'">'+z+'</td><td id="endT'+count+'"> - </td><td> - </td><td id="descriptionT'+count+'">Travelling</td></tr>').hide();
                                travelling.show('fast');


                            $("tbody").append('<tr id="row'+count+'"><td id="start'+count+'"> - </td><td id="end'+count+'"> - </td><td id="price'+count+'"> - </td><td id="description'+count+'" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>');
                            count++;
                        });

                    }
                });
            }   
             else if(count == 2){
                var index = ev.target.id.slice(-1);

                var price = $('#'+dat+'-price').text();
                var duration = $('#'+dat+'-duration').text();
                    
                $('#price'+index).text(price);
                    
                 var w = $('#start1').text();
                   
                var y = Number(w.substring(0,2))+Number(duration);
                    
                if( y < 10){
                    var z = '0'+y+'.00'
                }
                else{
                    var z = y+'.00'
                }
                $('#end'+index).text(z);
                $(document).ready(function(){
                    var travelling = $("tbody").append('<tr id="rowT'+count+'"><td id="startT'+count+'">'+z+'</td><td id="endT'+count+'"> - </td><td> - </td><td id="descriptionT'+count+'">Travelling</td></tr>').hide();
                    travelling.show('fast');


                    $("tbody").append('<tr id="row'+count+'"><td id="start'+count+'"> - </td><td id="end'+count+'"> - </td><td id="price'+count+'"> - </td><td id="description'+count+'" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>');
                    count++;
                });
            }       
        }
      //   else if(temp.id.substring(0,4) == "drag" && check.substring(0,4) == "drag"){

      //    var tempTitle = $('#'+check.substring(0,5)+'-activity').text();
      //    var tempPrice = $('#'+check.substring(0,5)+'-price').text();
      //    var tempDuration = $('#'+check.substring(0,5)+'-duration').text();
       
      //    console.log()
      //    $('#'+check.substring(0,5)+'-activity').text($('#'+temp.id+'-activity').text());

      //    $('#'+check.substring(0,5)+'-price').text($('#'+temp.id+'-price').text());
      //    $('#'+check.substring(0,5)+'-duration').text($('#'+temp.id+'-duration').text());

      //    $('#'+temp.id+'-activity').text(tempTitle);
            // $('#'+temp.id+'-price').text(tempPrice);
            // $('#'+temp.id+'-duration').text(tempDuration);
      //   }
      //   else{
      //    var tempTitle = $('#'+temp.id+'-activity').text();
      //    var tempDuration = $('#'+temp.id+'-duration').text();
      //    var tempPrice = $('#'+temp.id+'-price').text();

      //        var tempIndex = check.substring(0,5);
      //        var title = $('#'+check).text();
      //        var duration = $('#'+tempIndex+'-duration').text();
      //        var price = $('#'+tempIndex+'-price').text();

      //        $('#'+temp.id+'-activity').text(title);
            // $('#'+temp.id+'-duration').text(duration);
            // $('#'+temp.id+'-price').text(price);

            // $('#'+check).text(tempTitle);
            // $('#'+tempIndex+'-duration').text(tempDuration);
            // $('#'+tempIndex+'-price').text(tempPrice);

            // var index = ev.target.parentNode.parentNode.id.slice(-1);

            // $('#price'+index).text(tempPrice);

            // var x = $('#start'+index).text();

            // var y = x.substring(0,2);
            // y = Number(y) + Number(tempDuration);

            // if(y < 10){
            //  var z = '0'+y+'.00';
            // }
            // else{
            //  var z = y+'.00'
            // }

            // $('#end'+index).text(z);
            // for(i = index ; i < count ; i++){
            //  $('#start'+(Number(i)+1)).text($('#end'+i).text());
            //  $('#startT'+(Number(i)+1)).text($('#end'+i).text());
            //  if($('#description'+(Number(i)+1)).text() != ""){
            //      var w = document.getElementById('description'+(Number(i)+1)).childNodes[0];
            //      var editIndex = w.childNodes[1].id.substring(0,5);
            //      var editDuration = $('#'+editIndex+'-duration').text();
            //      var e = $('#start'+(Number(i)+1)).text().substring(0,2);
            //      var endResult = Number(e)+Number(editDuration);
            //      if(endResult < 10){
            //          endResult = '0'+endResult+'.00';
            //      }
            //      else{
            //          endResult = endResult+'.00';
            //      }
            //      $('#end'+(Number(i)+1)).text(endResult);
            //  }
            // }
      //   }
    }
</script>
</body>
</html>
{{-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    ID : {{$holiday->id}} <br>
    TITLE : {{$holiday->title}} <br>
    Date : 
    <ul>
    @foreach($holiday->date as $date)
        {{$date->date}}<br>
        <form action="{{url('list/'.$holiday->id.'/detail')}}" method="post">
        {{csrf_field()}}
            <input type="text" placeholder="Nama" name="activity"><br>
            <input type="time" placeholder="Start time" name="start_time"><br>
            <input type="time" placeholder="End time" name="end_time"><br>
            <input type="text" placeholder="price" name="price"><br>
            <input type="hidden" value="{{$date->id}}" name="date">
            <button type="submit">Submit</button>
        </form>
        @foreach($activities as $activity)
            @if($activity->date_holiday_id == $date->id)
                {{$activity->activity}}<br>
            @endif
        @endforeach
    @endforeach
    </ul>
    COST : {{$holiday->cost}} <br>

    
</body>
</html> --}}