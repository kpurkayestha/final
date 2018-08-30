@extends('layouts.admin')

@section('title', 'AskMe || AddAdmin')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Edit Admin</div>
			<div class="panel-body">
				<form action="{{ route('admin.updateadmin',$admin->id) }}" method="post" >
					{{ csrf_field() }}
					<div class="col-md-8 col-md-offset-2">
						<label><i class="fa fa-user" aria-hidden="true"></i>
						Name:</label>
						<input type="text" name="name" class="form-control" placeholder="Enter name...." value="{{ $admin->name }}" required>

						<label><i class="fa fa-envelope" aria-hidden="true"></i>
						Email:</label>
						<input type="email" name="email" class="form-control" placeholder="Enter email...." value="{{ $admin->email }}" disabled >
						<label><i class="fa fa-bars" aria-hidden="true"></i>
						Role:</label>
						<select class="form-control" required name="role">
							<option value="">Role</option>
							<option value="{{ $admin->role }}" selected>{{ $admin->role }}</option>
							
							
						</select>

						<br>
						<a class="btn btn-success" href="{{ route('admin.alladmin') }}">
								<i class="fa fa-undo"></i>
								Back
						</a>
						<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
						<input type="submit" name="save" value="SAVE" class="btn btn-info">
						

					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection