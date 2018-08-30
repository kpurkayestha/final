@extends('layouts.admin')

@section('title', 'AskMe || AllComment')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	<div class="container cnt">
			<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>Comment List</b>	
		</div>
		
		<div class="panel-body">
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>SL No. </th>
						<th>Q Provider</th>
						<th style="width: 200px;">Q Title</th>
						<th>C Provider</th>
						<th style="width: 150px;">Comment </th>
						<th>Q Time</th>
						<th>C Time</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					@foreach($comments as $key=> $comment)

					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $comment->question_user->name }}</td>
						<td>{{ $comment->question->title }}</td>
						<td>{{ $comment->comment_user->name }}</td>
						<td>{!! $comment->comment_body !!}</td>
						<td>{{ $comment->question->created_at->diffForHumans() }}</td>
						<td>{{ $comment->created_at->diffForHumans() }}</td>
						<td class="center">
							<a class="btn btn-success" href="{{ route('admin.viewcomment', $comment->id) }}">
								<i class="glyphicon glyphicon-zoom-in icon-white"></i>
								View
							</a>
							<form id="delete-from-{{ $comment->id }}" action="{{ route('comment.delete', $comment->id) }}" style="display:none;" method="POST">
                                {{ csrf_field() }}                
                            </form>
                            
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-from-{{ $comment->id }}').submit();
                                }else {
                                	event.preventDefault();
                                }"><i class="fa fa-trash"></i> Delete
                            </button>
						</td>
					</tr>

					@endforeach

				</tbody>
			</table>


		</div>
	</div>
	</div>
@endsection