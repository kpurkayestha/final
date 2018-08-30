@extends('layouts.admin')

@section('title', 'AskMe || ViewMessage')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View Message</div>
		<div class="panel-body">
			<form action="#" method="post" >

				<div class="col-md-8 col-md-offset-2">
						<h3>Name: {{ $message->name }}</h3><hr>
						<h4>Email: {{ $message->email }}</h4><hr>
						<h5><b>Time: {{ $message->created_at->diffForHumans() }}</b></h5>
						<p>{{ $message->message }}</p>

						<hr>
						<a class="btn btn-success" href="{{ URL::previous() }}">
								<i class="fa fa-undo"></i>
								Back
							</a>
						
					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection