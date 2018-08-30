@extends('layouts.index')

@section('title','AskMe || View Question')

@push('css')

@endpush

@section('content')

<div class="container">
	<div class="panel panel-default" style="margin-top: 100px;margin-bottom: 120px;">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View Question
		</div>
		<div class="panel-body">
			<div class="col-md-8 col-md-offset-2">

				<h1>{{ $question->title }}</h1>

				<a href="{{ route('user.view', $question->user_id) }}"><h3>{{ $question->user->name }}</h3></a>

				<h4>{{ $question->created_at->diffForhumans() }}</h4>

				<p>{{ $question->description }}</p>

				<br>
				<a href="{{ route('categoryView', $question->category_id) }}" style="text-decoration: none;"><span class="label label-default" style="font-size: 15px;">{{ $question->category->category_name }}</span></a><br><br>

				@if($question->user == Auth::user())
				<a href="{{ route('edit.question', $question->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square"></i>Edit</a>
				<form id="delete-from-{{ $question->id }}" action="{{ route('delete.question', $question->id) }}" style="display:none;" method="POST">
					{{ csrf_field() }}

				</form>
				<button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
					event.preventDefault();
					document.getElementById('delete-from-{{ $question->id }}').submit();
				} else {
					event.preventDefault();
				}"><i class="fa fa-trash"></i> Delete</button>
				@endif


				<br><br>
				<div class="panel panel-default">
					<div class="panel-heading" style="font-size: 15px;">
						<b>Comments </b>
						<span class="badge">{{ $comments->count() }}</span>
					</div>

					@if($comments->count() == 0)
					<h3 style="font-style: italic; text-align: center; padding: 20px 0px;">No Comment</h3>
					@else

					<div class="panel-body">

						@foreach($comments as $key=>$comment)
						<a href="{{ route('user.view', $comment->comment_user_id) }}"><h4>{{ $comment->comment_user->name }}</h4></a>
						<span class="time">{{ $comment->created_at->diffForhumans() }}</span><br>
						<p>{!! $comment->comment_body !!}</p>

						@if($comment->comment_user == Auth::user())
						<a href="{{ route('editcomment', $comment->id) }}" class="btn btn-warning">Edit</a>
						<form id="delete-from-{{ $comment->id }}" action="{{ route('deletecomment', $comment->id) }}" style="display:none;" method="POST">
							{{ csrf_field() }}

						</form>
						<button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
							event.preventDefault();
							document.getElementById('delete-from-{{ $comment->id }}').submit();
						} else {
							event.preventDefault();
						}"><i class="fa fa-trash"></i> Delete</button>
						@endif

						<hr>
						@endforeach

					</div>
					@endif
				</div>

				@if(Auth::check())
				@if(Auth::user()->ban == 1)
				<h1 style="font-size: 20px;text-align: center;">You Can not add Comment. <br><br> <strong>You are baned by admin</strong></h1>
				@else
				<form action="{{ route('addcomment', $question->id) }}" method="post">
					{{ csrf_field() }}
					<textarea name="comment_body"  class="form-control tinymce"  placeholder="Write a comment here."></textarea><br>
					<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
					<input type="submit" name="comment" value="Comment" class="btn btn-success">
				</form>
				<br>
				@endif
				@else
				<p>To write a comment please <a href="{{ route('login') }}" >Login</a> here.</p>
				@endif	
			</div>
		</div>
	</div>
</div>
@endsection