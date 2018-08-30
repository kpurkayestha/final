
@extends('layouts.index')

@section('title', 'AskMe || Edit Comment')

@push('css')
	
@endpush

@section('content')
	<div class="container cnt">
		<div class="panel panel-default">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Edit Comment
			</div>
			<div class="panel-body" style="margin-top: 18px;height: 500px;">
				<form action="{{ route('updatecomment', $comment->id) }}" method="post" >
				{{ csrf_field() }}
				<div class="col-md-8 col-md-offset-2">
					<label><i class="fa fa-th-list" aria-hidden="true"></i>
					
					<label><i class="fa fa-quora" aria-hidden="true"></i>
					Title:</label>
					<input type="text" name="name" class="form-control" value="{{ $comment->question->title }}" required disabled>
					<label><i class="fa fa-comment" aria-hidden="true"></i>
					Comment:</label>

					<textarea class="form-control tinymce" name="comment_body" >{!! $comment->comment_body !!}</textarea>

					{{-- <textarea class="form-control tinymce" id="texteditor" placeholder="Write your message...." name="description" required>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea> --}}
					<br>
					<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
					<input type="submit" name="save" value="Save" class="btn btn-info">

				</div>

				
				
			</form>
			</div>
		</div>
	</div>
@endsection