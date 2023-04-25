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
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">


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
    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">


</head>

<body>

     <div id="wrapper">

        @include('student.inc.topnav')
        @include('student.inc.sidenav')

        @yield('headercover')

        <div class="page-content">
            @yield('content')
        </div>

        {{-- <div id="searchbox">
            <div class="search-overlay"></div>
            <div class="search-input-wrapper">
                <div class="search-input-container">
                    <div class="search-input-control">
                        <span class="icon-feather-x btn-close uk-animation-scale-up" uk-toggle="target: #searchbox; cls: is-active"></span>
                        <div class=" uk-animation-slide-bottom" >
                            <input type="text" id="searchclassroominput" name="search" autofocus required style="font-size:2rem" placeholder="">
                            <p class="search-help text-center">Type the name of the Classroom you are looking for</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <script src="{{asset('templatefiles/framework.js')}}"></script>
        <script src="{{asset('templatefiles/simplebar.js')}}"></script>
        <script src="{{asset('templatefiles/main.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script> --}}
       
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

            $(document).on('change','input[name=search]',function(){
              
                $.ajax({
                    url: '/searchclassroom?roomcode='+$(this).val(),
                    type:"GET",
                    success: function(data){

                        if(data != 0 && data != 1){

                            $('.search-help').empty();
                            $('.search-help').append(data);

                        }
                        else if(data == 1){
                           
                            $('.search-help').text('You already joined this room!')
                        }
                        else{
                            $('.search-help').text('Classroom not found!')
                        }
                
                    }
                })
            })
           
        })


    </script>

    @yield('footerscript')

</body>
</html>