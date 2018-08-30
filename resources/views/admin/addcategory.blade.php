@extends('layouts.admin')

@section('title', 'AskMe || AddAdmin')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Add Category</div>
			<div class="panel-body">
				<form action="{{ route('category.store') }}" method="post" >
					{{ csrf_field() }}
					
					<div class="col-md-4 col-md-offset-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bars"></i></span>
									<input type="text" class="form-control" name="category"  placeholder="Enter category name..." required />
							
						</div>
						

						<br>
						<a class="btn btn-success" href="{{ route('category.index') }}">
								<i class="fa fa-undo"></i>
								Back
						</a>
						<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
						<input type="submit" name="addcategory" value="ADD" class="btn btn-info">
						

					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection