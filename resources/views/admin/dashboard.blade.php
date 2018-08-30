@extends('layouts.admin')

@section('title', 'AskMe || ViewUser')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="color:#fff;text-align: center; font-size: 20px; background-color: #343D46;">Website Overview</div>
			<div class="panel-body">
				<div class="panel-body">
					<div class="col-md-3">
						<div class="well dash-box">
							<h2><span class="fa fa-user" aria-hidden="true"></span> 203</h2>
							<h4>Users</h4>
						</div>
					</div>
					<div class="col-md-3">
						<div class="well dash-box">
							<h2><span class="fa fa-list-alt" aria-hidden="true"></span> 12</h2>
							<h4>Pages</h4>
						</div>
					</div>
					<div class="col-md-3">
						<div class="well dash-box">
							<h2><span class="fa fa-pencil" aria-hidden="true"></span> 33</h2>
							<h4>Posts</h4>
						</div>
					</div>
					<div class="col-md-3">
						<div class="well dash-box">
							<h2><span class="fa fa-bar-chart" aria-hidden="true"></span> 12,334</h2>
							<h4>Visitors</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection