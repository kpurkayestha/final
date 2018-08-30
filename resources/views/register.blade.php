@extends('layouts.index')

@section('title', 'AskMe || Register')

@push('css')

	<link rel="stylesheet" href="register.css">
@endpush
@section('content')
	<div class="container" style="margin-top: 100px;">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="height: 400px;">
				<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;"> Register </div>
				<div class="panel-body" style="margin-top: 35px;">
				     
					<form action="{{ route('register') }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="name"  placeholder="Enter your name" required />
									
								</div>
								@if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
                                	@endif
							</div>
							
						</div>

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
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control" name="password"   placeholder="Enter your password" required/>
									
								</div>
								@if ($errors->has('password'))
                                    	<span class="help-block">
                                    	    <strong>{{ $errors->first('password') }}</strong>
                                    	</span>
                                @endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control" name="password_confirmation"   placeholder="Confirm your password" required/>
									
								</div>
								@if ($errors->has('password_confirmation'))
                                    	<span class="help-block">
                                    	    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    	</span>
                                	@endif
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<input class="btn btn-danger" type="reset" name="cancel" value="Cancel">
								<input class="btn btn-info" type="submit" name="register" value="Register">
							</div>


						</div>

					

				</form>
				<div class="col-md-8 col-md-offset-2">
					<p class="par">Have an account? Please <a href="{{ route('login') }}">Login</a> here.</p>
				</div>

			</div>
		</div>

</div>

	</div>
@endsection