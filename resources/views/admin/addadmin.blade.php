@extends('layouts.admin')

@section('title', 'AskMe || AddAdmin')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Add Admin</div>
			<div class="panel-body">
				<form action="{{ route('admin.add') }}" method="post" >
					{{ csrf_field() }}
					<div class="col-md-8 col-md-offset-2">
						<label><i class="fa fa-user" aria-hidden="true"></i>
						Name:</label>
						<input type="text" name="name" class="form-control" placeholder="Enter name...." required>

						<label><i class="fa fa-envelope" aria-hidden="true"></i>
						Email:</label>
						<input type="email" name="email" class="form-control" placeholder="Enter email...." required>
						<label><i class="fa fa-bars" aria-hidden="true"></i>
						Role:</label>
						<select class="form-control" name="role" required>
							<option value="">Role</option>
							<option value="Editor">Editor</option>					
						</select>

						<label><i class="fa fa-unlock" aria-hidden="true"></i>
						Password:</label>
						<input type="password" name="password" class="form-control" placeholder="Enter a Password" required>
						<br>
						<a class="btn btn-success" href="{{ URL::previous() }}">
								<i class="fa fa-undo"></i>
								Back
						</a>
						<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</button>
						<button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> ADD</button>
						
						
					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection