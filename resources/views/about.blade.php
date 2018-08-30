@extends('layouts.index')
@section('title', 'AskMe || Login')

@section('content')
	<div class="container" style="margin-top: 100px;">
		<div class="panel panel-default">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">About Us</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('img/profile.png') }}" alt="profile.png" style="width: 200px; height: 200px; border-radius: 50%">
						<div class="caption">
							<h3>Tawfiquzzaman Prim Opu</h3>
							<h4> CEO</h4>
							<h5>Email: <a href="mailto:opu.cse.32@gmail.com">opu.cse.32@gmail.com</a></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<p style="text-align: center;">
								<a href="#" target="" class="btn btn-info" role="button"><i class="fa fa-facebook-square fa-2x"></i></a> 
								<a href="#" class="btn btn-default" role="button"><i class="fa fa-google-plus-circle fa-2x"></i></a> 
								<a href="#" class="btn btn-success" role="button"><i class="fa fa-twitter-square fa-2x"></i></a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('img/profile.png') }}" alt="profile.png" style="width: 200px; height: 200px; border-radius: 50%">
						<div class="caption">
							<h3>Ashraf Hossan Shovo</h3>
							<h4> CEO</h4>
							<h5>Email: <a href="mailto:ashrafshovo@gmail.com">ashrafshovo@gmail.com</a></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<p style="text-align: center;">
								<a href="#" class="btn btn-info" role="button"><i class="fa fa-facebook-square fa-2x"></i></a> 
								<a href="#" class="btn btn-default" role="button"><i class="fa fa-google-plus-circle fa-2x"></i></a> 
								<a href="#" class="btn btn-success" role="button"><i class="fa fa-twitter-square fa-2x"></i></a>
							</p>
						</div>
					</div>
				</div><div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('img/profile.png') }}" alt="profile.png" style="width: 200px; height: 200px; border-radius: 50%">
						<div class="caption">
							<h3>Kongkon Purkayestha</h3>
							<h4> CEO</h4>
							<h5>Email: <a href="mailto:kpukayestha@gmail.com">kpukayestha@gmail.com</a></h5>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

							<p style="text-align: center;">
								<a href="http://facebook.com/kongkonpurkayastha" target="-blank" class="btn btn-info" role="button"><i class="fa fa-facebook-square fa-2x"></i></a> 
								<a href="#" class="btn btn-default" role="button"><i class="fa fa-google-plus-circle fa-2x"></i></a> 
								<a href="#" class="btn btn-success" role="button"><i class="fa fa-twitter-square fa-2x"></i></a>
							</p>
						</div>
					</div>
				</div>  
			</div>
		</div>
	</div>

	</div>
@endsection