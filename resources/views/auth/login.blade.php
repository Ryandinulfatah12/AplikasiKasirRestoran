@extends('auth.main')
@section('title','Login')

@section('content')
<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
		<div class="auth-box ">
			<div class="left">
				<div class="content">
					<div class="header">
						<div class="logo text-center"><img src="{{ url('klorofil/img/ngapak.png') }}" width="192px" alt="Klorofil Logo"></div>
						<p class="lead">Login to Your Account</p>
					</div>
					<form class="form-auth-small" method="POST" action="{{ route('login') }}">
						@csrf
						<div class="form-group">
							<label for="username" class="control-label sr-only">Username</label>
							<input type="text" class="form-control {{$errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Masukan Username" required autofocus>

							@if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        	@endif
						</div>
						<div class="form-group">
							<label for="password" class="control-label sr-only">Password</label>
							<input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Masukan Password" required>

							@if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                       		@endif
						</div>
						<div class="form-group clearfix">
							<label class="fancy-checkbox element-left">
								<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
								<span>Remember me</span>
							</label>
						</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                        @if (Route::has('password.request'))
						<div class="bottom">
							<span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
						</div>
						@endif
					</form>
				</div>
			</div>
			<div class="right">
				<div class="overlay"></div>
				<div class="content text">
					<h1 class="heading">Ngapak Restourant &copy; 2020</h1>
					<p>by The Develovers</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection