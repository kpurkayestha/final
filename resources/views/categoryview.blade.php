@extends('layouts.index')

@section('title','AskMe || View Question with Category')

@push('css')
	
@endpush

@section('content')

	<div class="container">
		<div class="panel panel-default" style="margin-top: 100px;margin-bottom: 120px;">
			<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;">
				View Question Based On Category
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<br>
					<a href="{{ route('categoryView', $category->id) }}" style="text-decoration: none;text-align: center;">
						<span class="label label-default" style="font-size: 30px;">
							{{ $category->category_name }}
						</span>
					</a>
						

				
					@foreach ($questions as $key => $question)
						<div class="panel panel-default" style="margin-top: 20px;">
							<div class="panel-body">
						<h3><a href="/question/view/{{ $question->id }}">{{ $question->title }}</a></h3>
								
						<p>{{ $question->description }}</p>
						@if (count($questions) > 1)
							
						@endif
						</div>
					</div>
					@endforeach
				</div>
					
					{{-- <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>	 --}}				
				</div>

				<div style="text-align:center;">
					{{ $questions->links()  }}
				</div>

			</div>
		</div>
	</div>
@endsection