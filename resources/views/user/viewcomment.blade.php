@extends('layouts.user')

@section('title', 'AskMe || ViewComment')

@push('css')
	<link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}">
@endpush

@section('content')


<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View Comment</div>
		<div class="panel-body">
			<form action="#" method="post" >

				<div class="col-md-8 col-md-offset-2">
						<h1>Question Title: {{ $comment->question->title }}</h1>
						<h2>Question Provider: <a href="{{ route('user.view', $comment->question_user_id) }}">{{ $comment->question_user->name }}</a></h2>
						
						<p>
							<b>Comment:</b><br>
							{{ $comment->comment_body }}
						</p>

						<br>
						<a href="{{ route('categoryView', $comment->category_id) }}" style="text-decoration: none;"><span class="label label-default" style="font-size: 15px;">{{ $comment->category->category_name }}</span></a><br><br>
						<a href="{{ route('user.editcomment', $comment->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Edit</a>

					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection