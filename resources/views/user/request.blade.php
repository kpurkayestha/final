@extends('layouts.user')

@section('title', 'AskMe || Request')

@push('css')
	<link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}">
@endpush

@section('content')

<div class="container cnt">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">All Request
			</div>

				<style>
				.profile {
					border: 1px solid #767676;
					border-radius: 5px;
					text-align: center;
					height: 200px;
					margin-bottom: 10px;
					padding: 20px 5px;
				}
				</style>


			<div class="panel-body">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
									
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>

							</div>
						</div>
						<div class="col-xs-6 col-md-3">
							<div class="profile">
								<p> Find Friend </p>
								<img src="{{ asset('img/profile.png') }}" alt="Avatar" style="width:60%; border-radius: 50%;"><br>
								<span>Jane Doe</span>
								<div class="half">
									<button class="btn btn-success" style="width: 50px;" title="Accept"><i class="fa fa-check"></i></button>
								
									<button class="btn btn-danger" style="width: 50px;" title="Decline"><i class="fa fa-remove"></i></button>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection