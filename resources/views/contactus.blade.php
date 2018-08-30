@extends('layouts.index')

@section('title', 'AskMe || Contact')

@section('content')
	<div class="container" style="margin-top: 100px;">
		
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: center; font-size: 20px; background-color: #343D46; color: #ffffff;"> Contact Us </div>
				<div class="panel-body">
					<div class="col-md-6">
						@include('section.msg')
				    
					<form action="{{ route('add') }}" method="post" id="message" class="form-horizontal">

						{{ csrf_field() }}

						<div class="form-group">
							
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="name"  placeholder="Write your name" required />
								</div>
								@if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group">
							
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" name="email"  placeholder="Write your email" required />
								</div>
								@if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group">
							
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-title"></i></span>
									<input type="text" class="form-control" name="subject"  placeholder="Write your subject" required />
								</div>
								@if ($errors->has('subject'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('subject') }}</strong>
	                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group">
							
							<div class="col-md-8 col-md-offset-2">
								<div class="input-group">
									{{-- <span class="input-group-addon"><i class="fa fa-comment"></i></span> --}}
									  <textarea class="form-control tinymce" id="texteditor" placeholder="Write your message...." name="message" required></textarea>
								</div>
								@if ($errors->has('message'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('message') }}</strong>
	                                    </span>
                                @endif
							</div>
							
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<input class="btn btn-danger" type="reset" name="cancel" value="Cancel">
								<input class="btn btn-success" type="submit" name="send" value="Send">
							</div>


						</div>
				</form>
				
				<div id="data-container">
							
				</div>

			</div>
			<div class="col-md-6">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.022775278462!2d91.86540391435163!3d24.897204749916888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3750552bc71c899d%3A0x804e438bcc32b390!2sMetropolitan+University!5e0!3m2!1sen!2sbd!4v1532633633239" width="520" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
					
				</div>
			</div>
		</div>

</div>

	</div>
@endsection
