<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('blog') }}"><img class="logo" src="{{ asset('img/logo.png') }}" alt="logo"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ route('blog') }}"><span class="fa fa-home"></span> Home</a></li>
				<li><a href="{{ route('about') }}"><span class="fa fa-info-circle"></span> About Us</a></li>
				<li><a href="{{ route('contact') }}"><span class="fa fa-map-marker"></span> Contact</a></li>
				@if (Auth::check())
					<li class="dropdown">
						<a href="" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="fa fa-bell"></span>  Notification @if($unreadnotification != 0) ({{ $unreadnotification }}) @endif
						</a>
						<ul class="dropdown-menu notificationmenu">
							@if (count($notifications) == 0)
							<li><a class="dropdown-item" href="#" style="font-size: 16px;"> You have no notification </a></li>
							@else
							@foreach ($notifications as $notification)
								<li><a class="dropdown-item @if($notification->status == '0') unreadnotification @endif" href="/notification/read/{{ $notification->id }}">  @if($notification->notification_type == 'Comment') {{ $notification->user->name }} comment on your post @elseif($notification->notification_type == 'Comment Comment') {{ $notification->user->name }} comment on a post @elseif($notification->notification_type == 'Like') {{ $notification->user->name }} like on your post @elseif($notification->notification_type == 'Dislike') {{ $notification->user->name }} dislike on your post @endif  </a></li>
							@endforeach
							@endif
						</ul>
					</li>
					<li><a href="{{ route('user.addquestion') }}"><span class="fa fa-question"></span> Add Question</a></li>
					<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-top:0px;"><i class="fa fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                	<li>
                                        <a href="{{ route('user.profile') }}">
                                                     <i class="fa fa-user-circle"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                @else
                    <li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span> Login</a></li>
					<li><a href="{{ route('register') }}"><span class="fa fa-user"></span> Sign Up</a></li>
                @endif
				
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>