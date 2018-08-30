@extends('layouts.user')

@section('title', 'AskMe || CommentList')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user_nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/user_allcss.css') }}">
@endpush

@section('content')	

	<div class="container cnt">
			<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    Comment List
		</div>
		
		<div class="panel-body">
			@if($comments->count() == 0)
				<div style="text-align: center;">
					<h1>You have not comment in any question.</h1>
				</div>
			@else
			@include('section.msg')
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>SL No. </th>
						<th>Question Provider </th>
						<th style="width: 200px;">Question Title</th>
						<th style="width: 200px;">Comment </th>
						<th>Question Time</th>
						<th>Comment Time</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach( $comments as $key=>$comment)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $comment->question_user->name }}</td>
						<td>{{ $comment->question->title }}</td>
						<td>{{ $comment->comment_body }}</td>
						<td>{{ $comment->question->created_at->diffForHumans() }}</td>
						<td>{{ $comment->created_at->diffForHumans() }}</td>
						<td class="center">
							<a class="btn btn-success" href="{{ route('user.viewcomment', $comment->id) }}">
								<i class="fa fa-eye icon-white"></i>
								View
							</a>
							
						   <a class="btn btn-info" href="{{ route('user.editcomment', $comment->id) }}">
								<i class="fa fa-pencil-square"></i>
								Edit
							</a>

							<form id="delete-from-{{ $comment->id }}" action="{{ route('comment.delete', $comment->id) }}" style="display:none;" method="POST">
                                                    {{ csrf_field() }}
                                                    
                                                </form>
                                                <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-from-{{ $comment->id }}').submit();
                                                } else {
                                                    event.preventDefault();
                                                }"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif

		</div>
	</div>
	</div>
@endsection