@extends('layouts.index')

@section('title', 'AskMe || AddQuestion')

@push('css')
	<!-- <link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}"> -->
@endpush

@section('content')	
	@if (Auth::check())
	<div class="container" style="margin-top: 100px;">
			<div class="panel panel-default">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    Add Question	
		</div>

			<div class="panel-body">

				
					<form action="{{ route('question.storequestion') }}" method="post" >
						{{ csrf_field() }}
						@if(Auth::user()->ban == 1)
						<div class="col-md-8 col-md-offset-2" style="padding:100px 0px">

						<h1>You Can not add question. <br><br> <strong>You are baned by admin</strong></h1>
								
						</div>
						@else
						<div class="col-md-8 col-md-offset-2">
							<label><i class="fa fa-th-list" aria-hidden="true"></i>
							Category:</label>
							<select class="form-control" required name="category_id">
								<option value="" selected>Category</option>
								@foreach ( $categories as $key=>$category )
									<option value="{{ $category->id }}">{{ $category->category_name }}</option>
								@endforeach
							</select>
							<label><i class="fa fa-quora" aria-hidden="true"></i>
							Title:</label>
							<input type="text" name="title" class="form-control" placeholder="Enter the title...." required>
							<label><i class="fa fa-info-circle" aria-hidden="true"></i>
							Description:</label>
							{{-- <textarea class="form-control tinymce" id="texteditor" placeholder="Write your description...." name="description" required></textarea> --}}
							<textarea class="form-control" id="texteditor" placeholder="Write your description...." name="description" required></textarea>

							<br>
							<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
							<input type="submit" name="post" value="Post" class="btn btn-info">
						</div>	
						@endif					
					</form>
				</div>
			</div>
		</div>

	@else
		<div class="container" style="margin-top: 100px;">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
			    	Unauthenticate Service	
				</div>

				<div class="panel-body" style="text-align: center;margin-bottom: 100px;padding-top: 100px;">
					<h1>You Are not eligible for this service.</h1>
					<h2>For become authenticate user please login <a style="text-decoration: none;" href="{{ route('login') }}">here</a> or register <a style="text-decoration: none;" href="{{ route('register') }}">here</a>.</h2>
				</div>
			</div>
		</div>
	@endif
@endsection