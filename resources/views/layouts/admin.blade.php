@include('admin.section.admin_head')

@stack('css')

@include('admin.section.admin_nav')

@include('admin.section.admin_sidebar')

@include('admin.section.admin_footer')

@stack('script')


@yield('content')