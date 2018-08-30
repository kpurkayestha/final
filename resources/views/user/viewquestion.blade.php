@extends('layouts.user')

@section('title', 'AskMe || ViewQuestion')

@push('css')
	<link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}">
@endpush

@section('content')

<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View Question</div>
		<div class="panel-body">
			

				<div class="col-md-8 col-md-offset-2">
					<h1>{{ $question->title }}</h1>
						
					<p>{{ $question->description }}</p>

					<br>
					<a href="#" style="text-decoration: none;"><span class="label label-default" style="font-size: 15px;">{{ $question->category->category_name }}</span></a><br><br>
					<a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
					<a href="{{ route('user.editquestion',$question->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Edit</a>
				</div>		

			</div>
		</div>


	</div>
@endsection