@extends('layouts.admin')

@section('title', 'AskMe || BanUsers')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')

	<div class="container cnt">
		<div class="panel panel-default pnl">
		<div class="panel-heading"style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>Ban Users</b>	
		</div>
			<div class="panel-body">
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Registered</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>


					<tr>
						<td>Kongkon Purkayestha</td>
						<td>kpurkayestha@gmail.com</td>
						<td>5 hr ago</td>
						<td class="center">
						   <a class="btn btn-success" href="#">
								<i class="fa fa-check"></i>
								Unblock
							</a>
						</td>
					</tr>

				</tbody>
				<tbody>


					<tr>
						<td>Kollol Purkayestha</td>
						<td>kollolp@gmail.com</td>
						<td>1 hr ago</td>
						<td class="center">
						    <a class="btn btn-success" href="#">
								<i class="fa fa-check"></i>
								Unblock
							</a>
						</td>
					</tr>

				</tbody>
			</table>


		</div>
	</div>
	</div>
@endsection