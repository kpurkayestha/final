@extends('layouts.user')

@section('title', 'AskMe || AccountSetting')

@push('css')
	<link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}">
@endpush

@section('content')	
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Account Setting</div>
			<div class="panel-body">
				@include('section.msg')
				<form action="{{ route('user.account') }}" method="post" >
					{{ csrf_field() }}
					<div class="col-md-6 col-md-offset-3">
						<label><i class="fa fa-unlock" aria-hidden="true"></i>
						Old password:</label>
						<input type="password" name="oldpass" class="form-control" placeholder="Old Password" required>

						<label><i class="fa fa-key" aria-hidden="true"></i>
						New password:</label>
						<input type="password" name="password" class="form-control" placeholder="New Password" required>

						<label><i class="fa fa-key" aria-hidden="true"></i>
						Confirm password:</label>
						<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required><br>

						<input type="reset" name="update" value="Cancel" class="btn btn-danger">
						<input type="submit" name="update" value="Save" class="btn btn-success">

					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection