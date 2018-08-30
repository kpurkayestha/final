@extends('layouts.admin')

@section('title', 'AskMe || Profile')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')

	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Profile</div>
			<div class="panel-body">
				@include('section.msg')
				<div class="col-md-4">
					<img src="{{ asset('uploads/admin/images/'.Auth::user()->pro_pic) }}" alt="profile.png" title="profile.png" class="profile-img">
					<div class="info">
						<h5>{{ Auth::user()->about }}</h5>
					</div>
					
				</div>

				<div class="col-md-8">
					<h1><img src="{{ asset('uploads/images/test.jpg') }}" alt="profile.png" class="icon-img">
 						{{ Auth::user()->name }}</h1>
				<h3><i class="fa fa-envelope" aria-hidden="true"></i>
				{{ Auth::user()->email }}</h3>
				<h4><i class="fa fa-map-marker" aria-hidden="true"></i>
				{{ Auth::user()->location }}</h4>
				<h4><i class="fa fa-history" aria-hidden="true"></i>
				{{ Auth::user()->created_at->diffForHumans() }}</h4>
				<h4><i class="fa fa-eye" aria-hidden="true"></i>
				0 profile views</h4>
				<h4><i class="fa fa-clock-o" aria-hidden="true"></i> Last seen 1 minute ago</h4>
				
				</div>
				
				

			</div>
		</div>


	</div>
@endsection