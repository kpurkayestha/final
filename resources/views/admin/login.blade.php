@extends('layouts.auth')

@section('title', 'AskMe || Admin Login')



@section('content')
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top: 150px;">
				<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;"> Admin Login </div>
				<div class="panel-body">
					@if (\Session::has('error'))
					    <div class="alert alert-danger">
					        <ul>
					            {!! \Session::get('error') !!}
					        </ul>
					    </div>
					@endif
					@if(count($errors) > 0)
						@foreach($errors->all() as $error)
						<h5>{{  $error  }}</h5>
						@endforeach
					@endif
					<form action="{{ route('admin.login') }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						
						<div class="form-group">
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" name="email"  placeholder="Enter your email" required />
								</div>
								{{-- @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
                                	@endif --}}
							</div>
							
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input type="password" class="form-control" name="password"   placeholder="Enter your password" required/>
								</div>
								{{-- @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
                                	@endif --}}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox">
									<label><input type="checkbox"> Remember me</label>
								</div>
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<input class="btn btn-danger" type="reset" name="cancel" value="Cancel">
								<input class="btn btn-info" type="submit" name="login" value="Login">
							</div>


						</div>

					

				</form>
				
			</div>
		</div>

</div>

	</div>
@endsection
	