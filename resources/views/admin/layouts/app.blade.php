<!DOCTYPE html>
<!-- saved from url=(0061)# -->
<html lang="en" class="">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic Page Needs
    ================================================== -->
    <title>CK-LMS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="description" content="Courseplus - Professional Learning Management HTML Template">-->


    <!-- CSS 
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('templatefiles/night-mode.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('templatefiles/framework.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<!-- summernote -->

<!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">

    <!-- Import SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Import SweetAlert and Toast libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>



</head>
<style>
    
    html::-webkit-scrollbar-track, html::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        html::-webkit-scrollbar-track, html::-webkit-scrollbar
        {
            width: 6px;
            background-color: #F5F5F5;
        }

        html::-webkit-scrollbar-track, html::-webkit-scrollbar-thumb
        {
            background-color: gray;
        }
        
            
        @media (min-width: 640px){
            [class~=is-active][class~=header-widget] {
                display: fixed !important;
                padding: inherit !important;
            }
        }
        [class~=header-widget] {
            display: fixed !important;
            padding: unset !important;
        }
</style>
<body>

    <div id="wrapper" class="admin-panel">

        @include('admin.inc.sidenav')

        <!-- Header Container
        ================================================== -->
        
        @include('admin.inc.topnav')

        <!-- content -->
        <div class="page-content">


        @yield('content')


        </div>

        <!-- For Night mode -->
        {{-- <script>
            (function (window, document, undefined) {
                'use strict';
                if (!('localStorage' in window)) return;
                var nightMode = localStorage.getItem('gmtNightMode');
                if (nightMode) {
                    document.documentElement.className += ' night-mode';
                }
            })(window, document);


            (function (window, document, undefined) {

                'use strict';

                // Feature test
                if (!('localStorage' in window)) return;

                // Get our newly insert toggle
                var nightMode = document.querySelector('#night-mode');
                if (!nightMode) return;

                // When clicked, toggle night mode on or off
                nightMode.addEventListener('click', function (event) {
                    event.preventDefault();
                    document.documentElement.classList.toggle('night-mode');
                    if (document.documentElement.classList.contains('night-mode')) {
                        localStorage.setItem('gmtNightMode', true);
                        return;
                    }
                    localStorage.removeItem('gmtNightMode');
                }, false);

            })(window, document);
        </script> --}}



        <!-- javaScripts
    ================================================== -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('templatefiles/framework.js')}}"></script>
        <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('templatefiles/simplebar.js')}}"></script>
        {{-- <script src="{{asset('templatefiles/main.js')}}"></script> --}}
        <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('plugins/summernote/summernote-bs4.js')}}"></script>
        <script src="{{asset('templatefiles/chart.min.js')}}"></script>
        {{-- <script type="text/javascript" src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
        <script src="{{asset('templatefiles/chart-custom.js')}}"></script>
        <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        @yield('script')



</div>
<div id="backtotop">
    <a href="#"></a>
</div>
<script>
  $(document).ready(function(){

      $(document).on('click','#logout',function(){
        Swal.fire({
          title: 'Are you sure you want to logout?',
          type: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Logout'
        })
        .then((result) => {
          if (result.value) {
            event.preventDefault(); 
            $('#logout-form').submit()
          }
        })
      })
  })
</script>
</body>
</html>