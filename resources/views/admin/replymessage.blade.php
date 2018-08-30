@extends('layouts.admin')

@section('title', 'AskMe || ReplyMessage')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
	<div class="container cnt">
		<div class="panel panel-default pnl">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">Reply Message</div>
			<div class="panel-body">
				<form action="#" method="post" >
					
					{{ csrf_field() }}

					<div class="col-md-8 col-md-offset-2">
						<label><i class="fa fa-user" aria-hidden="true"></i>
						Name:</label>
						<input type="text" name="name" class="form-control" value="{{ $message->name }}" disabled>
						<label><i class="fa fa-envelope" aria-hidden="true"></i>
						Email:</label>
						<input type="text" name="name" class="form-control" value="{{ $message->email }}" disabled>
						<label><i class="fa fa-info-circle" aria-hidden="true"></i>
						Message:</label>
						<textarea name="message" class="form-control" cols="40" rows="8" placeholder="Message..." required></textarea>

						<br>
						<a class="btn btn-success" href="{{ URL::previous() }}">
								<i class="fa fa-undo"></i>
								Back
						</a>
						<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
						<input type="submit" name="reply" value="Reply" class="btn btn-info">

					</div>

					
					
				</form>
				
				

			</div>
		</div>


	</div>
@endsection