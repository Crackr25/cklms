@extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li>Books</li>
    </ul>
</nav>
@endsection
@section('content')

    {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}
    <style>
        /* .swal-wide{
        width:80%;
    } */
    .swal2-header{
        border: none;
    }
    
    .select2-container {
            z-index: 9999;
            margin: 0px;
        }
        .select2-search__field{
            margin: 0px;
        }
        .dataTables_filter label{
            float: right;
        }
    </style>
    <div class="page-content-inner">
        <div class="row mb-2">
            <div class="col-md-12">
                <h1>Password Generator</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-default" disabled><i class="fa fa-filter"></i></button>
                <button type="button" class="btn btn-info" id="button-filter-student">Students</button>
                <button type="button" class="btn btn-info" id="button-filter-teacher">Teachers</button>
            </div>
        </div>
        <div id="users-container"></div>
        {{-- <div class="card">
            <div class="card-header">
            </div>
        </div> --}}
    </div>
    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        // function filter(usertype){
        //     $.ajax({
        //         url: '/admin/passwordgenerator/filter',
        //         type:"GET",
        //         data: {
        //             usertype: usertype
        //         },
        //         success: function(data){
        //             $('#users-container').append(data)
        //             // $('search-user')
        //             $("#search-user-student").DataTable({
        //                 // pageLength : 3,
        //                 // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
        //                 // "paging": false,
        //                 // dom: 'lifrtp',
        //                 "bFilter": false,
        //                 searching: true
        //                 // dom: 't'      
        //                 // "dom": '<"toolbar">frtip'
        //             });
        //         }
        //     })
        // }
        $('#button-filter-student').on('click', function(){
            // filter('student');
            Swal.fire({
                title: 'Fetching data...',
                allowOutsideClick: false,
                closeOnClickOutside: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                }
            })  
            $.ajax({
                url: '/admin/passwordgenerator/filter',
                type:"GET",
                data: {
                    usertype: 'student'
                },
                success: function(data){
                    $('#users-container').empty()
                    $('#users-container').append(data)
                    // $('search-user')
                    $("#search-user-student").DataTable({
                        // pageLength : 3,
                        // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
                        // "paging": false,
                        // dom: 'lifrtp',
                        "bFilter": false,
                        searching: true
                        // dom: 't'      
                        // "dom": '<"toolbar">frtip'
                    });
                    $(".swal2-container").remove();
                    $('body').removeClass('swal2-shown')
                    $('body').removeClass('swal2-height-auto')
                }
            })
        })
        $('#button-filter-teacher').on('click', function(){
            // filter('teacher');
            Swal.fire({
                title: 'Fetching data...',
                allowOutsideClick: false,
                closeOnClickOutside: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                }
            })  
            $.ajax({
                url: '/admin/passwordgenerator/filter',
                type:"GET",
                data: {
                    usertype: 'teacher'
                },
                success: function(data){
                    $('#users-container').empty()
                    $('#users-container').append(data)
                    // $('search-user')
                    $("#search-user-teacher").DataTable({
                        // pageLength : 3,
                        // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
                        // "paging": false,
                        // dom: 'lifrtp',
                        "bFilter": false,
                        searching: true
                        // dom: 't'      
                        // "dom": '<"toolbar">frtip'
                    });
                    $(".swal2-container").remove();
                    $('body').removeClass('swal2-shown')
                    $('body').removeClass('swal2-height-auto')
                }
            })
        })
        // $('#searchclassroominput').keyup(function(){
        //     thistable.search($(this).val()).draw() ;
        // })
    })
</script>
@endsection