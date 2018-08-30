@extends('layouts.admin')

@section('title', 'AskMe || EditProfile')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Edit Profile</div>
			<div class="panel-body">

				@include('section.msg')

				<form action="{{ route('admin.update') }}" method="post" enctype="multipart/form-data">

					{{ csrf_field() }}

					<div class="col-md-4">
						<label><i class="fa fa-picture-o" aria-hidden="true"></i>
 						Upload a picture:</label>
						<input type="file" name="image" class="form-control" placeholder="choose a picture">
						<label><i class="fa fa-info-circle"></i>
							About yourself:</label>
						<textarea cols="40" rows="5" name="about" class="form-control">{{ Auth::user()->about }}</textarea>	
					</div>

					<div class="col-md-6">
						<label><i class="fa fa-user-circle"></i> Name:</label>
						<input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
					
						<label><i class="fa fa-envelope"></i> Email:</label>
						<input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" disabled>

						<label><i class="fa fa-map-marker"></i> Location:</label>
						<input type="text" name="location" value="{{ Auth::user()->location }}" class="form-control"><br>

						<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
						<input type="submit" name="update" value="Update" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection