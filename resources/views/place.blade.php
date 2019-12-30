<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{$place->name}}</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/object.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<style>
		 #map {
		   width: 100%;
		   height: 400PX;
		 }
	</style>
</head>
<body onload="findLoc();">
	<div class="landing-background">
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
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="object-pic" style="background-image: url('../images/{{$place->image}}');">
				<div class="object-title">
					<h1 style="margin-top:0px;margin-bottom:0px;margin-left : 10px">{{$place->name}}</h1>
					<h4 style="margin-bottom:0px;margin-top:0px;margin-left : 10px">Rating : {{$place->rating}} </h4>
				</div>
			</div>
			<div role="tabpanel" class="tabpanels">
				<!-- Nav tabs -->
				<table class="table table-bordered">
			  		<tbody>
			  			<tr>
			  				<td class="tab" id="tab-structure1" style="background-color: #151f47">
			  					<a style="color: white;" class="tab-detail" id="tab1" onclick="tab()" data-toggle="tab" href="#home">Description</a>
			  				</td>
			  				<td class="tab" id="tab-structure2">
			  					<a class="tab-detail" id="tab2" onclick="tab()" data-toggle="tab" href="#menu1">Attractions</a>
			  				</td>
					    	<td class="tab" id="tab-structure3">
					    		<a class="tab-detail" id="tab3" onclick="tab()" data-toggle="tab" href="#menu2">Gallery</a>
					    	</td>
					    	<td class="tab" id="tab-structure4">
					    		<a class="tab-detail" id="tab4" onclick="tab()" data-toggle="tab" href="#menu3">Reviews</a>
					    	</td>
					    	<td class="tab" style="width: 30%;"></td>
			  			</tr>
			  		</tbody>
			  	</table>
				@if(Auth::user())
					@if($isWishlisted)
					<button type="submit" class="btn btn-danger" disabled>Wishlisted</button>
					@else
					<form action="{{url('wishlist/'.$place->id)}}" method="POST" role="form">
						@csrf
						<button type="submit" class="btn btn-danger">Add to Wishlist</button>
				  	</form>
					@endif
				@endif
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="asd" style="overflow: hidden">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<h3>Categories</h3>
								<h5>{{$place->category}}</h5>

								<h3>Opening Hour</h3>
								<h5>{{$place->opening}} </h5>

								<h3>Average Time Spent</h3>
								<h5>{{$place->duration}} Hours</h5>

								<h3>Cost</h3>
								<h5>Rp. 100.000 - Rp. 400.000</h5>

								<h3>Address</h3>
								<h5 id="address">{{$place->address}}</h5>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding: 0px;">
								<div id="map"></div>
							</div>
							
						</div>
					</div>

					<div role="tabpanel" class="tab-pane" id="menu1">
						<div class="attractions" style="overflow: hidden;padding-top:20px;">
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 attraction">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<h4>Banana Boat</h4>
								<h5>Rp. 100.000/pax</h5>
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 attraction">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<h4>Banana Boat</h4>
								<h5>Rp. 100.000/pax</h5>
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 attraction">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<h4>Banana Boat</h4>
								<h5>Rp. 100.000/pax</h5>
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 attraction">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<h4>Banana Boat</h4>
								<h5>Rp. 100.000/pax</h5>
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 attraction">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<h4>Banana Boat</h4>
								<h5>Rp. 100.000/pax</h5>
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 attraction">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<h4>Banana Boat</h4>
								<h5>Rp. 100.000/pax</h5>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="menu2">
						<div class="galleries" style="overflow: hidden;padding-top:20px;">
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 gallery">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
								<div class="overlay">
									
								</div>
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 gallery">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 gallery">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 gallery">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 gallery">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
							</div>
							<div class="col-xs-5 col-sm-5 col-md-3 col-lg-3 gallery">
								<img src="{{asset('images/pantaianyer.jpg')}}" class="img-responsive" alt="Image">
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="menu3">
						<div class="review">
							<textarea name="" id="input" class="form-control" rows="3" required="required" placeholder="Write Review"></textarea>
							
							<button style="display: block;margin:auto;margin-right:0;margin-top:10px;" type="button" class="btn btn-info">Post</button>
						
							<hr>
							<div class="reviews">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-1">
										<img src="{{asset('/images/user.png')}}" class="reviewer img-responsive" alt="Image">
										<h3 class="ver" style="text-align: center;margin-top:10px;">52</h3>
										<h3 class="ver" style="text-align: center;margin-top:10px;">
											<span class="glyphicon glyphicon-heart"></span>
										</h3>
										<span class="hor">52 Likes</span>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-11">
										<h3 style="margin-top:10px;">Daniel Prawira</h3>
										<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
									</div>
								</div>
								
							</div>
						</div>
					</div>

				</div>
			</div>			
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="container-fluid recommendation" style="padding-top: 0px;">
				<h2 style="font-weight: bolder;">Recommendation</h2>
				@foreach($recs as $rec)
				@if($rec)
				<a href="{{url('place/'.$rec->id)}}">
				<div class="recommend-pic" style="background-image: url('../images/{{$rec->image}}');">
					<div class="recommend-title">
						<h4 style="margin-top:0px;">{{$rec->name}}</h4>
						<h5 style="margin-bottom:0px;">Rating : {{$rec->rating}} </h5>
					</div>
				</div>
				</a>
				@endif
				@endforeach
			</div>
		</div>
	</div>
	<div class="container-fluid footer" style="height: 100px;">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<i class="fa fa-facebook"></i>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<i class="fa fa-instagram"></i>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<i class="fa fa-youtube"></i>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<i class="fa fa-twitter"></i>
			</div>
			<br><br>
			<small style="margin-top:10px;">Copyright 2019 | Trippie</small>
		</div>
		
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c"></script>
<script>
	var lat;
	var lng;

	$('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
	});
	

	function tab(){
    	var x = event.srcElement;
    	$('.'+x.parentNode.getAttribute('class')).css('background-color','white');
    	$('.'+x.getAttribute('class')).css('color','#337ab7');

    	$('#'+x.parentNode.id).css('background-color','#151f47');
    	$('#'+x.id).css('color','white');
    	
    }

    function findLoc(){
    	$.get("https://maps.googleapis.com/maps/api/geocode/json?address="+$('#address').text()+"&key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c", function(data){
	        lat = data['results'][0]['geometry']['location']['lat'];
	        lng = data['results'][0]['geometry']['location']['lng'];
	        var uluru = {lat: Number(lat), lng: Number(lng)};
	        var map = new google.maps.Map(document.getElementById('map'), {
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
</body>
</html>