<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{$city->name}}</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/city.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>
	<div class="landing-background" style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('../images/{{$city->image}}');background-size: cover;background-repeat: no-repeat;background-position: center;">
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
		
		<div class="headline">
			<span style="margin-bottom:0px">{{$city->name}}</span>
		</div>
	</div>
	<div class="text-center">
		<h1 id="fav-head" class="container">Popular Destination</h1>
		<div class="fav-head-outline"></div>
			<div class="tabs container">
			  	<table class="table table-bordered">
			  		<tbody>
			  			<tr>
			  				<td class="tab" id="tab-structure1" style="background-color: #fca000">
			  					<a style="color: white;" class="tab-detail" id="tab1" onclick="tab()" data-toggle="tab" href="#home">Activities</a>
			  				</td>
			  				<td class="tab" id="tab-structure2">
			  					<a class="tab-detail" id="tab2" onclick="tab()" data-toggle="tab" href="#menu1">Historical</a>
			  				</td>
					    	<td class="tab" id="tab-structure3">
					    		<a class="tab-detail" id="tab3" onclick="tab()" data-toggle="tab" href="#menu2">Hotels</a>
					    	</td>
					    	<td class="tab" id="tab-structure4">
					    		<a class="tab-detail" id="tab4" onclick="tab()" data-toggle="tab" href="#menu3">Restaurant</a>
					    	</td>
			  			</tr>
			  		</tbody>
			  	</table>
		  	</div>

			<div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
			      <section class="variable slider">
			      	@foreach($places as $place)
			      		@if($place->category == 'landscape')
				    		<div>
				      			<img style="height: 250px;" src="{{asset('images/'.$place->image)}}">
				      			<div class="overlay">
				      				<h5><a href="{{url('place/'.$place->id)}}">{{$place->name}}</a></h5>
				      			</div>
				   	 		</div>
						@endif
					@endforeach				    
				  </section>
			    </div>
			    <div id="menu1" class="tab-pane fade in">
			      <section class="variable slider">
				    @foreach($places as $place)
			      		@if($place->category == 'historical & religious')
				    		<div>
				      			<img style="height: 250px;" src="{{asset('images/'.$place->image)}}">
				      			<div class="overlay">
				      				<h5>{{$place->name}}</h5>
				      			</div>
				   	 		</div>
						@endif
					@endforeach	
				  </section>
			    </div>
			    <div id="menu2" class="tab-pane">
			      <section class="variable slider" onload="">
				    @foreach($places as $place)
			      		@if($place->category == 'hotels')
				    		<div>
				      			<img style="height: 250px;" src="{{asset('images/'.$place->image)}}">
				      			<div class="overlay">
				      				<h5>{{$place->name}}</h5>
				      			</div>
				   	 		</div>
						@endif
					@endforeach	
				  </section>
			    </div>
			    <div id="menu3" class="tab-pane fade">
			      <section class="variable slider">
				    @foreach($places as $place)
			      		@if($place->category == 'restaurant')
				    		<div>
				      			<img style="height: 250px;" src="{{asset('images/'.$place->image)}}">
				      			<div class="overlay">
				      				<h5>{{$place->name}}</h5>
				      			</div>
				   	 		</div>
						@endif
					@endforeach	
				  </section>
			    </div>
			</div>
		</div>
	<div class="footer" style="height: 100px;">
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
		</div><br><br>
		<small style="margin-top:10px;">Copyright 2019 | Trippie</small>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
	$('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
	});
	$(".variable").slick({
        slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		dots: true,
		arrows: true,
    });
    function tab(){
    	var x = event.srcElement;
    	console.log(x.parentNode.id);
    	

    	console.log(x.parentNode.getAttribute('class'));
    	$('.'+x.parentNode.getAttribute('class')).css('background-color','white');
    	$('.'+x.getAttribute('class')).css('color','#337ab7');

    	$('#'+x.parentNode.id).css('background-color','#fca000');
    	$('#'+x.id).css('color','white');
    	
    }
</script>
</body>
</html>