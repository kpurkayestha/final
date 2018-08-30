@extends('layouts.auth')

@section('title', 'AskMe || Admin Register')


@section('content')
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top: 100px;">
				<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;"> Admin Register </div>
				<div class="panel-body" style="margin-top: 35px;">
				     
					<form action="{{ route('admin.register') }}" method="post" class="form-horizontal">
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

						<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-bars"></i></span>
									<select class="form-control" name="role" required>
										<option value="">Role</option>
										<option value="Admin">Admin</option>
							
									</select>
								</div>
								@if ($errors->has('role'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('role') }}</strong>
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
						
							

						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input type="password" class="form-control" name="password_confirmation"   placeholder="Re enter your password" required/>
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
				
			</div>
		</div>

</div>

	</div>
@endsection