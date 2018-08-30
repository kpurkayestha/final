@include('section.head')

@stack('css')

@include('section.nav')

@yield('content')

@stack('script')

@include('section.footer')