@include('user.section.user_head')

@stack('css')

@include('user.section.user_nav')

@include('user.section.user_sidebar')

@include('user.section.user_footer')

@stack('script')


@yield('content')

