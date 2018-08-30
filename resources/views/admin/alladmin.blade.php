@extends('layouts.admin')

@section('title', 'AskMe || All Admin')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')

<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>All Admin</b>	
		</div>
		
		<div class="panel-body">
			@include('section.msg')
			@if(Auth::user()->role == 'Admin')
			<div class="col-md-2 col-md-offset-10" style="margin-bottom: 10px;">
				<a href="{{ route('admin.addadmin') }}" class="btn btn-info">Add New Admin</a>
			</div>
			@endif
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>SL No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Registered</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($users as $key=>$user)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role }}</td>
						<td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
						<td class="center">
							<a class="btn btn-success" href="{{ route('admin.viewadmin', $user->id) }}">
								<i class="fa fa-eye icon-white"></i>
								View
							</a>
							@if(Auth::user()->role == 'Admin')
							<a class="btn btn-info" href="{{ route('admin.editadmin', $user->id) }}">
								<i class="fa fa-pencil-square icon-white"></i>
								Edit
							</a>
							<form id="delete-from-{{ $user->id }}" action="{{ route('admin.delete', $user->id) }}" style="display:none;" method="POST">
                                {{ csrf_field() }}                        
                            </form>
                            
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-from-{{ $user->id }}').submit();
                                }else {
                                	event.preventDefault();
                                }"><i class="fa fa-trash"></i> Delete
                            </button
                            @endif
						</td>
					</tr>
					@endforeach

				</tbody>
				
			</table>


		</div>
	</div>
</div>
@endsection