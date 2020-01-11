@extends('auth.main2')
@section('title','Login')

@push('css')
<style>
	.card {
		background-color: rgba(30, 0, 0, 0.7);
	}
	.form-control {
		background-color: transparent;
	    box-shadow: 0 1px 5px -2px rgba(0,0,0,.2);
	  
		color: white;
	}
</style>
@endpush

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-8 pt-5">
			<div class="intro text-white">
				<h2><b><u>Aplikasi Table Service Restaurant.</u></b></h2>
				<b>Sebuah Aplikasi Table Service yang Dirancang dengan Sistem POS (Point Of Sales), yang Dimana didalamnya Berisikan Sistem Client Server</b>
			</div>
		</div>

		<div class="col-md-4 pt-5">
          <div class="card bg-light-lightest shadow-sm rounded">
            <div class="card-header bg-danger-darker pb-1">
                <h5 class="text-center text-white"><span class="oi oi-account-login"></span> <strong>Login Account</strong></h5>
            </div>
            <div class="card-body">
              <form class="form-auth-small" method="POST" action="{{ route('login') }}">
					@csrf
					<div class="form-group">
						<label for="username" class="control-label sr-only">Username</label>
						<input type="text" class="form-control border-danger {{$errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Masukan Username" required autofocus>

						@if ($errors->has('username'))
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $errors->first('username') }}</strong>
			            </span>
			        	@endif
					</div>
					<div class="form-group">
						<label for="password" class="control-label sr-only">Password</label>
						<input type="password" class="form-control border-danger {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" placeholder="Masukan Password" required>

						@if ($errors->has('password'))
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $errors->first('password') }}</strong>
			            </span>
			       		@endif
					</div>
					<div class="form-group row">
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="border-danger" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label text-white">
                            Remember Me
                          </label>
                        </div>
                      </div>
                        </div>
					<button type="submit" class="btn btn-danger btn-lg btn-block"><span class="oi oi-account-login"></span> <b>LOGIN</b></button>

			        @if (Route::has('password.request'))
					<div class="bottom">
						<span class="helper-text"><i class="oi oi-lock"></i> <a class="text-white" href="{{ route('password.request') }}">Forgot password?</a></span>
						<span class="helper-text"><i class="oi oi-lock"></i> <a class="text-white" href="{{ route('register') }}"><u>Register Account</u></a></span>
					</div>
					@endif
				</form>
            </div>
            </div>

		</div>
	</div>

	
</div>
@endsection