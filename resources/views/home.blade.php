<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trippie</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/home.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
	<style>
		 #map {
		   width: 100%;
		   height: 353px;
		 }
	</style>
</head>
<body >
	<div class="landing-background" id="home">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
						<li><a href="#home">Home</a></li>
						<li><a href="#city">Cities</a></li>
						<li><a href="#trip">Trips</a></li>
						<li><a href="#contact">Contact Us</a></li>
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
	
		<div class="headline">
			<h1 style="margin-bottom:0px">ATUR LIBURAN IDAMANMU</h1>
			<h1 style="margin-top:0px;">BERSAMA KAMI!</h1>
			@if (Auth::guest()) 
				<a href="{{url('register')}}" type="button" class="btn btn-default">DAFTAR</a>
			@endif
		</div>
	</div>
	<div class="favorite-section text-center container-fluid" style="padding-bottom: 20px;" id="city">
		<h1 id="fav-head">Popular Cities in Indonesia</h1>
		@foreach($cities as $city)
			<div id="col{{$city->id}}" class="fav col-xs-6 col-sm-6 col-md-3 col-lg-3" style="background-image:url('images/{{$city->image}}');">
				<div class="overlay">
					<h1 id="text{{$city->id}}"><a href="{{url('city/'.$city->id)}}" style="text-decoration: none;color: white;">{{$city->name}}</a></h1>
				</div>
			</div>
		@endforeach
	</div>
	<div class="container-fluid text-center" id="trip">
		<h1 id="fav-head">SHAREABLE TRIPS</h1>
		<section class="variable slider">
		    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 share">
				<img src="{{asset('images/kesuma.jpg')}}" class="img-responsive" alt="Image">
				<div class="share-content container-fluid">
					<h2>Dummy Trip</h2>
					<h4>14 Dec 2018 - 25 Dec 2018</h4>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 share">
				<img src="{{asset('images/kesuma.jpg')}}" class="img-responsive" alt="Image">
				<div class="share-content container-fluid">
					<h2>Dummy Trip</h2>
					<h4>14 Dec 2018 - 25 Dec 2018</h4>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 share">
				<img src="{{asset('images/kesuma.jpg')}}" class="img-responsive" alt="Image">
				<div class="share-content container-fluid">
					<h2>Dummy Trip</h2>
					<h4>14 Dec 2018 - 25 Dec 2018</h4>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 share">
				<img src="{{asset('images/kesuma.jpg')}}" class="img-responsive" alt="Image">
				<div class="share-content container-fluid">
					<h2>Dummy Trip</h2>
					<h4>14 Dec 2018 - 25 Dec 2018</h4>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 share">
				<img src="{{asset('images/kesuma.jpg')}}" class="img-responsive" alt="Image">
				<div class="share-content container-fluid">
					<h2>Dummy Trip</h2>
					<h4>14 Dec 2018 - 25 Dec 2018</h4>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-1 share">
				<img src="{{asset('images/kesuma.jpg')}}" class="img-responsive" alt="Image">
				<div class="share-content container-fluid">
					<h2>Dummy Trip</h2>
					<h4>14 Dec 2018 - 25 Dec 2018</h4>
				</div>
			</div>
		</section>
		
	</div>
	<div class="container-fluid contact" id="contact">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h1 id="fav-head" style="border-color: white">GET IN TOUCH</h1>
			<form action="" method="POST" role="form">
				
				<div class="form-group">
					<input type="text" class="form-control" id="" placeholder="Full Name">
				</div>

				<div class="form-group">
					<input type="email" class="form-control" id="" placeholder="Email">
				</div>

				<div class="form-group">
					<input type="text" class="form-control" id="" placeholder="Subject">
				</div>

				<div class="form-group">
					<textarea name="" id="input" class="form-control" rows="10" required="required" placeholder="Message"></textarea>
				</div>
			
				<button type="submit" class="btn btn-large btn-block">Submit</button>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="padding-top:50px;">
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h4>021 - 123456789</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h4>Jalan Rawa Belong, Palmerah, Kota Jakarta Barat, 11480</h4>
				</div>
			</div>
			<div id="map"></div>
		</div>
	</div>
	<div class="container-fluid footer" style="height: 100px;">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
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
		</div><br><br>
		<small style="margin-top:10px;">Copyright 2019 | Trippie</small>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVb6byfNVvArVNCh7jeUmj_oDjQgNHd8c&callback=findLoc"></script>
<script>
	function findLoc(){
	    var uluru = {lat: -6.2018962, lng: 106.781713};
	    var map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 14,
	      center: uluru
	    });
	    var marker = new google.maps.Marker({
	      position: uluru,
	      map: map
	    });
    }

    $(".variable").slick({
        slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		dots: true,
		arrows: true,
    });
    $(document).ready(function(){
	  // Add smooth scrolling to all links
	  $("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });
	});
</script>
</script>
</body>
</html>
