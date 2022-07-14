<!DOCTYPE html>
<html lang="en">
@include('layouts/head')
<body>
    @include('layouts/topbar')
    @include('layouts/navbar')
    @yield('content')
    @include('layouts/footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    @include('layouts/javascript')
</body>
</html>