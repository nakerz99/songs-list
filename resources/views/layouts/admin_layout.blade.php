@include('admin.partials._header')
    <!-- navbar -->
    @include('admin.partials._navbar')
    <!-- Sidebar -->
    @include('admin.partials._sidebar')
        @yield('content')
@include('admin.partials._footer')