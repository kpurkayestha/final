@extends('layouts.admin')

@section('title', 'AskMe || AllUser')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')

	<div class="container cnt">
			<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>All User</b>	
		</div>
		
		<div class="panel-body">
			@include('section.msg')
		
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>SL No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Status</th>
						<th>Registered</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					@foreach($users as $key=>$user)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						@if($user->ban == 0)
						<td> Active </td>
						@else
						<td> Ban </td>
						@endif
						<td>{{ Carbon\Carbon::parse($user->created_at )->diffForHumans() }}</td>
						<td class="center">
							<a class="btn btn-success" href="{{ route('admin.viewuser', $user->id) }}">
								<i class="fa fa-eye icon-white"></i>
								View
							</a>
							@if($user->ban == 0)
							<a class="btn btn-warning" href="user/ban/{{ $user->id }}">
								<i class="fa fa-ban"></i>
								Ban
							</a>
							@else
							<a class="btn btn-warning" href="user/unban/{{  $user->id }}">
								<i class="fa fa-ban"></i>
								Unban
							</a>
							@endif
							<form id="delete-from-{{ $user->id }}" action="{{ route('admin.deleteuser', $user->id) }}" style="display:none;" method="POST">
                                {{ csrf_field() }}                        
                            </form>
                            
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-from-{{ $user->id }}').submit();
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