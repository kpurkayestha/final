@extends('layouts.admin')

@section('title', 'AskMe || ViewAdmin')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View Admin</div>
		<div class="panel-body">
		
				<div class="col-md-2">
					<img src="{{ asset('img/profile.png') }}" alt="profile.png" class="adminimg">
				</div>
				<div class="col-md-8 col-md-offset-1">
						<h3>Name: {{ $admin->name }}</h3>
						<h4>Email: {{ $admin->email }}</h4>
						<h4>Role: {{ $admin->role }}</h4>
						<h5>Time: {{ $admin->created_at->diffForHumans() }}</h5>
						<br>
						<a class="btn btn-success" href="{{ route('admin.alladmin') }}">
								<i class="fa fa-undo"></i>
								Back
							</a>
							@if(Auth::user()->role == 'Admin')
							<a class="btn btn-info" href="{{ route('admin.editadmin', $admin->id) }}">
								<i class="fa fa-pencil-square icon-white"></i>
								Edit
							</a>
							@endif
						
					</div>

			</div>
		</div>


	</div>
@endsection