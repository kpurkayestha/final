@extends('layouts.admin')

@section('title', 'AskMe || ViewQuestion')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_nav.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_allcss.css') }}">
@endpush

@section('content')
<div class="container cnt">
	<div class="panel panel-default pnl">
		<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">View Question</div>
		<div class="panel-body">

				<div class="col-md-8 col-md-offset-2">
					    <h1>Question Provider : {{ $question->user->name }}</h1><hr>
					    <a href="#" style="text-decoration: none;"><span class="label label-default" style="font-size: 15px;">{{ $question->category->category_name }}</span></a><br>
						<h2>{{ $question->title }}</h2><hr>
						
						<p>{{ $question->description }}</p>

						<hr>
						<h4>{{ $question->created_at->diffForHumans() }}</h4>
						
						<a class="btn btn-success" href="{{ URL::previous() }}">
							<i class="fa fa-undo"></i>
							Back
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
					</div>
			</div>
		</div>


	</div>
@endsection