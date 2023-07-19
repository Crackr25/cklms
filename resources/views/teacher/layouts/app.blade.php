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

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- SweetAlert2 -->
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- icons -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">


    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.min.css')}}">
    <!-- font-awesome -->
    {{-- <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}"> --}}

    <style>

        @media print {
                .page-content {
                    display: none;
                }
            }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: white;
            color: red;
            border: none;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; /* Add this line */
            }


            .close-button:hover {
                background-color: white;
                color: black;
                }

                .close-button::after {
                    content: "Delete";
                    position: absolute;
                    top: 35px;
                    left: -20px;
                    display: none;
                    background-color: white;
                    color: black;
                    padding: 5px 10px;
                    border-radius: 4px;
                    font-size: 12px;
                }

                .close-button:hover::after {
                    display: block;
                }



    </style>

</head>

<body>

     <div id="wrapper">

        
        @include('teacher.inc.topnav')
        @include('teacher.inc.sidenav')


        @yield('headercover')
        
        <div class="page-content">
            @yield('content')
        </div>

        <footer class="text-center py-4">
                        <div class="container">
                            <p class="m-0">© 2023 Powered by <span>  <img src="assets/cklogo.png" alt="Logo" style="width:30px ; height:30px;">  </span> </p>
                        </div>
        </footer>
        
    

        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('templatefiles/framework.js')}}"></script>
        <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('templatefiles/simplebar.js')}}"></script>
        {{-- <script src="{{asset('templatefiles/main.js')}}"></script> --}}
        <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('plugins/summernote/summernote-bs4.js')}}"></script>
        <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> --}}
        <script src="{{asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{asset('plugins/fullcalendar/main.min.js')}}"></script>
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


            $(document).on('click','.close-button',function(){
                var classroomId = $(this).data('id');
                console.log(classroomId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "The book,quiz and student data will not be recovered.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        console.log(result);
                    if (result.value == true) {

                        $.ajax({
                            url: '/teacher/deleteclassroom',
                            type:"GET",
                            data:{
                                id: classroomId
                            },
                            success: function(data){
                                console.log("1");

                                window.location.reload();

                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
                                
                            }
                        })

                        
                        
                    }
                    })

            

            })
        })
    </script>

    @yield('footerscript')

</body>
</html>