<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
<div class="container">
	<div id="picture" class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>
	<div id="login-form" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<form action="{{url('login')}}" method="POST" role="form">
			{{csrf_field()}}
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
			
			<button type="submit" class="btn btn-masuk">MASUK</button>
			<a class="forgot">Forgot Password?</a>
		</form>
	    <a class="register">Belum memiliki akun? Daftar di sini!</a>
	</div>
</div>
</body>
</html>
