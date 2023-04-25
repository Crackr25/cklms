@extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li>Students</li>
    </ul>
</nav>
@endsection
@section('content')
    <style>
        .swal2-header{
            border:none;
        }
        .swal2-content{
            text-align: left;
        }
        .changestatusactive{
            filter: none;
        }
        .changestatusinactive{
            filter: grayscale(100%);
        }
    </style>
    <div class="page-content-inner">
        {{-- <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
                    <li>Instuctors</li>
                </ul>
            </nav>
        </div> --}}
        <div class="section-header mb-lg-2 border-0 uk-flex-middle">
            <div class="section-header-left">
                <h2 class="uk-heading-line text-left"><span> Students </span></h2>
            </div>
        </div>
        
        <input type="text" id="searchclassroominput" name="search" autofocus required  placeholder="">
        <p class="search-help text-center">Type the name of the student you are looking for</p>
        {{-- <p class="search-help">Type the name of the Course and book you are looking for</p> --}}
        <div class="uk-child-width-1-1@m uk-grid-small uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    {{-- <h6 class="uk-card-title"><butt</h6> --}}
                    {{-- <button type="button" class="btn btn-sm btn-secondary active">Active : {{count($students->where('isActive','1'))}} </button>
                    <button type="button" class="btn btn-sm btn-secondary active">Deactivated : {{count($students->where('isActive','0'))}}</button> --}}
                    <table class="table" id="searchclassroom">
                        <thead>
                            <tr>
                                <th style="width: 75%;">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($students)>0)
                                @foreach($students as $student)
                                    <tr>
                                        <td>
                                            @php
                                                if(strtolower($student->gender) == 'female'){
                                                    $avatar = 'avatar/S(F) 1.png';
                                                }
                                                elseif(strtolower($student->gender) == 'male'){
                                                    $avatar = 'avatar/S(M) 3.png';
                                                }else{
                                                    
                                                    $avatar = 'assets/images/avatars/256-512.png';
                                                }
                                            @endphp
                                            <div class="row">                                                
                                                <div class="col-1">
                                                    <a href="#" class="avatar mr-2">
                                                        <img src="{{asset($student->picurl)}}" alt="" onerror="this.onerror = null, this.src='{{asset($avatar)}}'"/>
                                                    </a>
                                                </div>
                                                <div class="col-11">
                                                    <span>{{$student->firstname}} {{$student->middlename}} {{$student->lastname}} {{$student->suffix}}</span>
                                                    <p class="text-muted p-0">{{$student->email}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p style="font-size: 12px;">
                                                Date joined: {{date('m d, Y h:i A',strtotime($student->createddatetime))}}
                                                {{-- <br/>
                                                @if($student->isActive == '1')
                                                    <button type="button" class="btn btn-sm btn-secondary active p-1">Deactivate</button>
                                                @elseif($student->isActive == '0')
                                                    <button type="button" class="btn btn-sm btn-secondary active p-1">Activate</button>
                                                @endif --}}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- footer
        ================================================== -->
        <div class="footer">
            @include('admin.inc.footer')
        </div>
    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            
            var thistable = $("#searchclassroom").DataTable({
                // pageLength : 3,
                // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
                // "paging": false,
                // dom: 'lifrtp'
                "bFilter": false,
                searching: true,
                dom: 't'      
                // "dom": '<"toolbar">frtip'
            });
            $('#searchclassroominput').keyup(function(){
                thistable.search($(this).val()).draw() ;
            })
        })
        $(document).on('click','.buttoneditstatus', function(){
            var userid = $(this).attr('id');
            var currentstat = $(this).attr('currentstat');
            if(currentstat == '1')
            {
                var changestatfrom  = 'Active';
                var changestatto    = 'Inactive';
            }else{
                var changestatfrom  = 'Inactive';
                var changestatto    = 'Active';
            }
            Swal.fire({
                type: 'warning',
                title: 'Are you sure you want to change the teacher\'s status?',
                html: 'Changing status from <u>'+changestatfrom+'</u> to <u>'+changestatto+'</u>',
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if(result.value){
                    
                    $.ajax({
                        url: '/adminteachers/editstatus',
                        type:"GET",
                        dataType:"json",
                        data:{
                            userid  : userid,
                            currentstat : currentstat
                        },
                        // headers: { 'X-CSRF-TOKEN': token },,
                        success: function(data){
                            console.log(data)
                            if(data.newstatus == 1)
                            {
                                $('#buttonstatus'+data.userid).removeClass('bg-dark');
                                $('#buttonstatus'+data.userid).addClass('bg-success');
                                $('#buttonchangestatus'+data.userid).removeClass('uil-user-times')
                                $('#buttonchangestatus'+data.userid).addClass('uil-user-check')
                                $('#profpic'+data.userid).removeClass('changestatusinactive')
                                $('#profpic'+data.userid).addClass('changestatusactive')
                                var strstatus = 'Active';
                            }else{

                                $('#buttonstatus'+data.userid).removeClass('bg-success');
                                $('#buttonstatus'+data.userid).addClass('bg-dark');
                                $('#buttonchangestatus'+data.userid).removeClass('uil-user-check')
                                $('#buttonchangestatus'+data.userid).addClass('uil-user-times')
                                $('#profpic'+data.userid).removeClass('changestatusactive')
                                $('#profpic'+data.userid).addClass('changestatusinactive')
                                var strstatus = 'Inactive';

                            }
                            $('.buttoneditstatus#'+data.userid).attr('currentstat',data.newstatus)
                            $('.buttoneditstatus#'+data.userid).attr('uk-tooltip',strstatus)
                            Swal.fire({
                                icon: 'success',
                                title: 'Teacher successfully!'
                            })
                        }
                    })
                }
            })

        })
    </script>
@endsection