@extends('layouts.admin')

@section('title', 'AskMe || AllQuestion')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	<div class="container cnt">
			<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>Question List</b>	
		</div>
		
		<div class="panel-body">
			@include('section.msg')
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>SL No. </th>
						<th>Q provider </th>
						<th>Category </th>
						<th style="width: 250px;">Question Title</th>
						<th style="width: 250px;">Question Description</th>
						<th>Q Time</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>

					@foreach ($questions as $key => $question)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $question->user->name }}</td>
						<td>{{ $question->category->category_name }}</td>
						<td>{{ $question->title }}</td>
						<td>{{ $question->description }}</td>
						<td>{{ $question->created_at->diffForHumans() }}</td>
						<td class="center">
							<a class="btn btn-success" href="{{ route('admin.viewquestion', $question->id) }}">
								<i class="fa fa-eye icon-white"></i>
								View
							</a>
							
							<form id="delete-from-{{ $question->id }}" action="{{ route('question.delete', $question->id) }}" style="display:none;" method="POST">
                                {{ csrf_field() }}                        
                            </form>
                            
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-from-{{ $question->id }}').submit();
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