@extends('layouts.index')

@section('title', 'AskMe || Login')

@push('css')
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')

	@extends('section.msg')
	
	<div class="container" style="margin-top: 100px;">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;"> Login </div>
				<div class="panel-body">
					@include('section.msg')
				    <div class="col-md-8 col-md-offset-3">
				    	<div class="form-group">
				    
				    	<a href="{{ url('socialauth/facebook') }}" class="btn btn-fb"><i class="fa fa-facebook-square fa-3x"></i> </a>
				    	<a href="{{ url('socialauth/google') }}" class="btn btn-gl"><i class="fa fa-google fa-3x"></i> </a>
				    	<a href="{{ url('socialauth/twitter') }}" class="btn btn-tw"><i class="fa fa-twitter-square fa-3x"></i> </a>
				    	<a href="{{ url('socialauth/github') }}" class="btn btn-gt"><i class="fa fa-github fa-3x"></i> </a>
				    	</div>
				    	
				    </div>
					<div class="col-md-12" style="text-align: center;font-size: 30px;padding-bottom: 10px;"> OR 
					</div>
					<form action="{{ route('login') }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" name="email"  placeholder="Enter your email" required />
								</div>
								@if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input type="password" class="form-control" name="password"   placeholder="Enter your password" required/>
								</div>
								@if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
                                	@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
									</label>
								</div>
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<input class="btn btn-danger" type="reset" name="cancel" value="Cancel">
								<input class="btn btn-info" type="submit" name="login" value="Login">
							</div>
							
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<a class="btn btn-default" href="{{ route('forgot') }}">
                                    Forgot Your Password?
                                </a>
							</div>
						</div>
				</form>
				<div class="col-md-8 col-md-offset-2">
					<p>Don't have an account. Please <a href="{{ route('register') }}">register</a> here.</p>
				</div>

				</div>
			</div>
		</div>
	</div>
@endsection
	