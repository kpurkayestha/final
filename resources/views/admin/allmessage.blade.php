@extends('layouts.admin')

@section('title', 'AskMe || Message')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')

	<div class="container cnt">
			<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>All Message</b>	
		</div>
		
		<div class="panel-body">
			@include('section.msg')
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>SL No. </th>
						<th>Name</th>
						<th>Email</th>
						<th style="width: 350px;">Message</th>
						<th>Message Time</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($messages as $key=>$message)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $message->name }}</td>
						<td>{{ $message->email }}</td>
						<td>{{ $message->message }}</td>
						<td>{{ $message->created_at->diffForHumans() }}</td>
						<td class="center">
							<a class="btn btn-success" href="{{ route('admin.viewmessage', $message->id) }}">
								<i class="fa fa-eye icon-white"></i>
								View
							</a>
							
							<form id="delete-from-{{ $message->id }}" action="{{ route('admin.deletemessage', $message->id) }}" style="display:none;" method="POST">
                                {{ csrf_field() }}
                                                    
                            </form>
                                <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-from-{{ $message->id }}').submit();
                                                } else {
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