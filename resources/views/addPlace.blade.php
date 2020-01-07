<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c"></script>
<script>
	var lat;
	var lng;
    function findLoc(address, map_id){
        console.log(address, map_id);
    	$.get("https://maps.googleapis.com/maps/api/geocode/json?address="+address+"&key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c", function(data){
	        lat = data['results'][0]['geometry']['location']['lat'];
	        lng = data['results'][0]['geometry']['location']['lng'];
	        var uluru = {lat: Number(lat), lng: Number(lng)};
	        var map = new google.maps.Map(document.getElementById('map'+map_id), {
	          zoom: 14,
	          center: uluru
	        });
	        var marker = new google.maps.Marker({
	          position: uluru,
	          map: map
	        });
	    });
    }
</script>
</head>
<body>
    {{-- <form action="{{url('/place')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" placeholder="Nama" name="name"><br>
        <input type="text" placeholder="Alamat" name="address"><br>
        <select name="city_id">
            @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select><br>
        <input type="file" name="image"><br>
        <button type="submit">Submit</button>
    </form> <br><br> --}}
    <div>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header" style="margin-right:0px;">
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
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">City</th>
                <th class="text-center">Place</th>
                <th class="text-center">Category</th>
                <th class="text-center">Rating</th>
                <th class="text-center">Opening Time</th>
                <th class="text-center">Image</th>
                <th class="text-center">Map</th>
            </tr>
        </thead>
        <tbody style="text-align:center">
            @foreach($places as $place)
            @if($place->status == 1)
            <tr>
                <td><a href="{{url('/city/'.$place->city->id)}}" style="text-decoration: none;">{{$place->city->name}}</a></td>
                <td><a href="{{url('/place/'.$place->id)}}" style="text-decoration: none;">{{$place->name}}</a></td>
                <td>{{$place->category}}</td>
                <td>{{$place->rating}}</td>
                <td>{{$place->opening}}</td>
                <td><img src="/images/{{$place->image}}" style="width: 180px"></td> 
                <td style="width:30%; height:20vh">
                    <script>
                        findLoc('{{$place->address}}', '{{$place->id}}');
                     </script>
                    <div id="map{{$place->id}}" style="width:450px;height:20vh;"></div>
                </td>
            </tr> 
            @endif
            @endforeach
        </tbody>
    </table>

</body>
</html>