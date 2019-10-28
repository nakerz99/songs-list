@include('admin.partials._header')
<body id="page-top">
    <!-- navbar -->
    @include('admin.partials._navbar')
    <!-- Sidebar -->
    @include('admin.partials._sidebar')
    <div id="content-wrapper">

        @yield('content')
      <!-- /.container-fluid -->

     

@include('admin.partials._footer')