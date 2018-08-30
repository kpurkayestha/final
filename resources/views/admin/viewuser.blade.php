@extends('layouts.admin')

@section('title', 'AskMe || ViewUser')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View User</div>
		<div class="panel-body">
			

				<div class="col-md-8 col-md-offset-2">
						<h3>Name: {{ $user->name }}</h3>
						<h4>Email: {{ $user->email }}</h4>
						<h5>Time: {{ $user->created_at->diffForHumans() }}</h5>
						<br>
						<a class="btn btn-success" href="{{ URL::previous() }}">
								<i class="fa fa-undo"></i>
								Back
							</a>
						<a class="btn btn-warning" href="{{ route('admin.banuser') }}">
								<i class="fa fa-ban"></i>
								Ban
					    </a>
							
					</div>

			</div>
		</div>


	</div>
@endsection