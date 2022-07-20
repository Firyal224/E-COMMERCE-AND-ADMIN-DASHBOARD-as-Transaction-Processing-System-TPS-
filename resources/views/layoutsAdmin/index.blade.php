<!DOCTYPE html>
<html lang="en">
@include('layoutsAdmin/head')
<body class="">
  <div class="wrapper ">
    @include('layoutsAdmin/sidebar')
    <div class="main-panel">
      @include('layoutsAdmin/navbar')
      
      @yield('content')

      @include('layoutsAdmin/footer')
    </div>
  </div>

@include('layoutsAdmin/javascript')
</body>
</html>