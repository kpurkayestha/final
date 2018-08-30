@extends('layouts.admin')

@section('title', 'AskMe || All Category')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')

	<div class="container cnt">
			<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
		    <b>All Category</b>	
		</div>
		
		<div class="panel-body">
			@include('section.msg')
			<div class="col-md-2 col-md-offset-8" style="margin-bottom: 10px;">
				
				<a href="{{ route('category.create') }}" class="btn btn-info category">Add Category</a>
			</div>
			<table class="table table-striped table-bordered bootstrap-datatable datatable responsive tbl">
				<thead>
					<tr>
						<th style="text-align: center;">Name</th>
						<th style="text-align: center;">Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ( $categories as $key=>$category )
						<tr>
							<td>{{ $category->category_name }}</td>
							<td class="center">
								<a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square"></i> Edit</a>
								<form id="delete-from-{{ $category->id }}" action="/admin/category/destroy/{{ $category->id }}" style="display:none;" method="POST">
                                    {{ csrf_field() }}
                                                    
                                </form>
                                <button class="btn btn-danger" type="button" onclick="if(confirm('Are you sure? You want to delete this?')){
                                        event.preventDefault();
                                        document.getElementById('delete-from-{{ $category->id}}').submit();
                                            } else {
                                                event.preventDefault();
                                            }"><i class="fa fa-trash"></i> Delete
                                </button>
                                
							</td>
						</tr>
					@endforeach
				</tbody>
				<tbody>


					
				</tbody>
			</table>


		</div>
	</div>
	</div>
@endsection