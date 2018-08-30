@extends('layouts.index')

@section('title', 'AskMe || Home')

@section('content')
<div class="container-fluid">

	
	<div class="search">
	
		<h3 class="title">Have a Question?</h3>
		<p class="tag-line">If you have any question you can ask below or enter what you are looking for!</p>

		<form class="example" method="get" action="#">
			<input type="text" class="form-control srch" placeholder="Type your search terms here" name="search">
			<button type="submit" class="btn btn-info">SEARCH</button>
		</form>
	
	</div>

</div>

<div class="container">
	@include('section.msg')
</div>


<section style="margin: 5px 2px 0px 10px;">
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-3" >
			<div class="card">
				<div class="panel panel-default">
					<div class="panel-body" style="text-align: center;">
						<b>Category </b>
						<span class="badge">{{ $categories->count() }}</span>
					</div>
					<div class="panel-footer">
						<ul class="list-group">
							@foreach ( $categories as $key=>$category )
							<a class="list-group-item" href="{{ route('categoryView', $category->id) }}">
								<span class="badge">{{ $category->question->count() }}</span>
								{{ $category->category_name }}
							</a>
							@endforeach
							
						</ul>
					</div>
				</div>
			</div>
			@if(Auth::user())
			<div class="panel panel-default">
				<div class="panel-body">
					<h3 style="text-align:center;">Follower Question</h3>
				</div>
				<div class="list-group">
					@foreach($recentquestions as $key=>$recentquestion)
						<a href="{{ route('guestView', $recentquestion->id) }}" class="list-group-item">{{ $recentquestion->title }}</a>
					@endforeach
				</div>
			</div>
			@endif

		</div>

		<div class="col-md-6">

			<div class="panel panel-default">
				@foreach ( $questions as $key=>$question )
				<div class="panel-body">
					<div class="post"><br>
						<div class="panel panel-default" style="margin-top: -20px;">
							<div class="panel-body">
								<img src="{{ asset('uploads/user/images/'.$question->user->pro_pic) }}" alt="Avatar" class="w3-left circle w3-margin-right" style="width:60px">
								<span class="time">{{ $question->created_at->diffForHumans() }}</span>
								
								<a href="{{ route('user.view', $question->user_id) }}" style="text-decoration: none;"><h3 class="person">{{ $question->user->name }}</h3></a><br>

								<hr class="hr">
								<h4><a href="{{ route('guestView', $question->id) }}">{{ $question->title }}</a></h4>
								<p>{{ $question->description }}</p>
								<a href="{{ route('categoryView', $question->category_id) }}" style="text-decoration: none;"><span class="label label-default" style="font-size: 15px;">{{ $question->category->category_name }}</span></a><br><br>
								<a href="/question/like/{{ $question->id }}" class="btn btn-like"><i class="fa fa-thumbs-up"></i> &nbsp;Like ({{ $question->vote->like }})</a> 
								<a href="/question/dislike/{{ $question->id }}" class="btn btn-dislike"><i class="fa fa-thumbs-down"></i> &nbsp;Dislike ({{ $question->vote->dislike }}) </a> 
								<a href="{{ route('guestView', $question->id) }}" class="btn btn-comment">Comment ({{ $question->comment->count() }})</a>
							</div>
							
						</div>
					</div>
				</div>
			@endforeach
			</div>

				<div style="text-align:center;">
					{{ $questions->links()  }}
				</div>
		</div>
	
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body" style="text-align: center;">
					<a href="{{ route('user.addquestion') }}" class="btn btn-info">Ask question</a>
				</div>
				
			</div>            
			<br>

			<div class="panel panel-default">
				<div class="panel-body">

					<div class="profile">
						<p> Find Friend </p>
						<img src="img/avatar6.png" alt="Avatar" style="width:50%"><br>
						<span><b>John Doe</b></span>
						<div class="half">
							<button class="btn btn-success" style="width: 100px;" title="Accept"><i class="fa fa-check"></i></button>
							
							<button class="btn btn-danger" style="width: 100px;" title="Decline"><i class="fa fa-remove"></i></button>
						</div>

					</div>
					
				</div>
			</div>  
			<br>
			<div class="panel panel-default">
				<div class="panel-body">
					<h3 style="text-align:center;">Recent Question</h3>
				</div>
				<div class="list-group">
					@foreach($recentquestions as $key=>$recentquestion)
						<a href="{{ route('guestView', $recentquestion->id) }}" class="list-group-item">{{ $recentquestion->title }}</a>
					@endforeach
				</div>
			</div>

		</div>
	</div>
	</div>
	
</section>

@endsection