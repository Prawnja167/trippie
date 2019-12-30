<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday List</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/list.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
</head>
<body>
    <div class="landing-background">
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
    </div>
    <div class="container-fluid">
        <h1 class="headline">My Holiday List</h1>

        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4"  data-toggle="modal" data-target="#myModal">
            <img src="{{asset('Images/fav1.jpg')}}" class="img-responsive" alt="Image">
            <div class="middle">
                <div class="text">
                    <span class="glyphicon glyphicon-plus"></span>
                    <h3>Add a New Plan</h3>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a New Plan</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/list')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="" placeholder="Input field" name="title">
                    </div>

                    <div class="form-group col-xs-6 col-lg-6" style="padding-left: 0px">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" id="" placeholder="Input field" name="start_date">
                    </div>

                    <div class="form-group col-xs-6 col-lg-6" style="padding-right: 0px">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" id="" placeholder="Input field" name="end_date">
                    </div>
                
                    <div class="form-group">
                        <label for="">Album Picture</label>
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    Browse&hellip; <input type="file" style="display: none;" name="image">
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <input type="hidden" name="cost" value="0">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>

          </div>
        </div>
        @foreach($holidays as $holiday)
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
            <img src="{{asset('images/trip/'.$holiday->image)}}" class="img-responsive" alt="Image">

            <div class="middle">
                <div class="text">
                    
                    <h1>{{$holiday->title}}</h1>
                    <hr>
                    <h4>{{$holiday->start}} - {{$holiday->end}}</h4>
                    <a href="{{url('list/'.$holiday->id)}}" class="btn btn-success">View</a>
                    <form action="{{url('list/'.$holiday->id)}}" method="POST" role="form" style="display: inline;">
                        @csrf
                        <input type="hidden" value="delete" name="_method"> 
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>  
        </div>
        @endforeach
    </div>
    

    
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    $(function() {

      // We can attach the `fileselect` event to all file inputs on the page
      $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
      });

      // We can watch for our custom `fileselect` event like this
      $(document).ready( function() {
          $(':file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  if( log ) alert(log);
              }

          });
      });
      
    });
</script>
</body>
</html>
