@extends('layouts.user')

@section('title', 'AskMe || EditQuestion')

@push('css')
	<link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}">
@endpush

@section('content')
	
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Edit Question</div>
			<div class="panel-body">
				<form action="{{ route('question.updatequestion', $question->id) }}" method="post" >
					{{ csrf_field() }}
					<div class="col-md-8 col-md-offset-2">
						<label><i class="fa fa-th-list" aria-hidden="true"></i>
						Category:</label>
						<select class="form-control" required name="category_id">
							<option value="">Category</option>
							
							@foreach ($categories as $key => $category)
								<option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
							@endforeach
							
						</select>
						<label><i class="fa fa-quora" aria-hidden="true"></i>
						Title:</label>
						<input type="text" name="title" class="form-control" value="{{ $question->title }}" required>
						<label><i class="fa fa-info-circle" aria-hidden="true"></i>
						Description:</label>
						<textarea class="form-control tinymce" id="texteditor" placeholder="Write your message...." name="description" required>{{ $question->description }}</textarea>	
						<br>
						<a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
						<input type="submit" name="save" value="Save" class="btn btn-info">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection