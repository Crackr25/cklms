@extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li>Teachers</li>
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
                <h2 class="uk-heading-line text-left"><span> Teachers </span></h2>
            </div>
            <div class="section-header-right">
                <a href="#" class="btn btn-default uk-visible@s" id="addinstructor"> <i class="uil-plus"></i> Add teacher</a>
            </div>
        </div>
        <div class="row">
            @if(count($teachers) > 0)
                @foreach($teachers as $teacher)
                    <div class="col-md-3 col-3 mb-2">
                        <div class="card  h-100">
                            <div class="card-body text-center">
                                <div class="avatar-parent-child">
                                @php
                                    if($teacher->isActive == 1)
                                    {
                                        $classstatus = "changestatusactive";
                                    }else{
                                        $classstatus = "changestatusinactive";
                                    }
                                @endphp
                                @php                  
                                        if(strtolower($teacher->gender) == 'female'){
                                            $avatar = 'avatar/teacher-female.png';
                                        }
                                        else{
                                            $avatar = 'avatar/teacher-male.png';
                                        }
                                @endphp
                                <img alt="Image placeholder" src="{{asset($teacher->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatar)}}'" class="avatar  rounded-circle avatar-lg {{$classstatus}}" id="profpic{{$teacher->userid}}">
                                @if($teacher->isActive == 1)
                                <span class="avatar-child avatar-badge bg-success" id="buttonstatus{{$teacher->userid}}"></span>
                                @else
                                <span class="avatar-child avatar-badge bg-dark" id="buttonstatus{{$teacher->userid}}"></span>
                                @endif
                                </div>
                                <h5 class="h6 mt-4 mb-0" id="fullname{{$teacher->teacherid}}"> {{$teacher->firstname}} {{$teacher->middlename}} {{$teacher->lastname}} {{$teacher->suffix}} </h5>
                                <a href="#" class="d-block text-sm text-muted mb-3">
                                    <small id="email{{$teacher->teacherid}}">{{$teacher->email}}</small>
                                </a>
                                @php
                                    if($teacher->isActive == 1)
                                    {
                                        $strstatus = "Active";
                                    }else{
                                        $strstatus = "Inactive";
                                    }
                                @endphp
                                <div class="d-flex justify-content-between px-4">
                                    <a href="#" class="btn btn-icon btn-hover btn-circle buttoneditstatus" id="{{$teacher->userid}}" currentstat="{{$teacher->isActive}}" uk-tooltip="{{$strstatus}}" title="" aria-expanded="false">
                                        @if($teacher->isActive == 1)
                                            <i class="uil-user-check" id="buttonchangestatus{{$teacher->userid}}"></i> 
                                        @else
                                            <i class="uil-user-times" id="buttonchangestatus{{$teacher->userid}}"></i> 
                                        @endif
                                    </a>
                                    <a href="#edit-modal{{$teacher->teacherid}}" class="btn btn-icon btn-hover btn-circle buttoneditinfo" id="{{$teacher->teacherid}}" uk-tooltip="Edit"  uk-toggle  title="" aria-expanded="false">
                                        <i class="uil-edit-alt"></i> </a>                                        
                                        <div id="edit-modal{{$teacher->teacherid}}" class="uk-flex-top" uk-modal>
                                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                                <h2 class="uk-modal-title">Edit Teacher</h2>
                                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                                <label>First Name</label>
                                                <input type="text" id="firstname{{$teacher->teacherid}}"/>
                                                <label>Middle Name</label>
                                                <input type="text" id="middlename{{$teacher->teacherid}}"/>
                                                <label>Last Name</label>
                                                <input type="text" id="lastname{{$teacher->teacherid}}"/>
                                                <label>Gender</label>
                                                <select id="gender{{$teacher->teacherid}}">
                                                    <option value="male">MALE</option>
                                                    <option value="female">FEMALE</option>
                                                </select>
                                                <label>Username</label>
                                                <input type="text" id="username{{$teacher->teacherid}}"/>
                                                <button type="button" class="btn btn-warning uk-modal-close-default buttonupdateinfo" id="{{$teacher->teacherid}}">Update</button>
                                            </div>
                                        </div>
                                        
                                    <a href="#modal-full{{$teacher->teacherid}}" class="btn btn-icon btn-hover btn-circle buttonbooksassigned" id="{{$teacher->teacherid}}" uk-tooltip="Books Assigned"  title="" aria-expanded="false" uk-toggle>
                                        <i class="uil-books"></i>
                                    </a>
                                    <div id="modal-full{{$teacher->teacherid}}" class="uk-modal-full" uk-modal>
                                        <div class="uk-modal-dialog">
                                            <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                            <div class="uk-grid-collapse uk-child-width-1-1@s uk-flex-middle" uk-grid>
                                                <div class="uk-background-cover uk-padding-large" uk-height-viewport id="booksconatainer{{$teacher->teacherid}}">
                                                    <h1 class="text-center">Books</h1>
                                                    <div id="bookscontainer{{$teacher->teacherid}}">
                                                        <p id="booksassignedcontainer{{$teacher->teacherid}}" style="text-align:center;"></p>
                                                            <div class="row pl-2"id="booksassignedcontainerul{{$teacher->teacherid}}">
                                                            </div>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-4">
                                                                    <label class="text-center">Assign more books</label>
                                                                    <input type="text" id="searchclassroominput" name="search" teacherid="{{$teacher->teacherid}}" autofocus required   placeholder="Title of the book">
                                                                </div>
                                                                <div class="col-md-4"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12" >
                                                                    <p class="text-center" id="searchbookscontainerresponse{{$teacher->teacherid}}"></p>
                                                                    
                                                                    <div class="section-small">

                                                                        <div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" uk-grid=""id="searchbooksresults{{$teacher->teacherid}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="uk-padding-large" uk-height-viewport>
                                                    <h1 class="text-center">Students</h1>
                                                    <div id="studentscontainer{{$teacher->userid}}"></div>
                                                </div> --}}
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- <a href="#" class="btn btn-icon btn-hover btn-circle buttonsendmessage" id="{{$teacher->userid}}" uk-tooltip="Send Message"  title="" aria-expanded="false">
                                        <i class="uil-envelope"></i>
                                    </a> --}}
                                    {{-- <a href="#" class="btn btn-icon btn-hover btn-circle buttondeleteuser" id="{{$teacher->userid}}" uk-tooltip="Delete" title="" aria-expanded="false">
                                        <i class="uil-trash-alt"></i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="card-footer text-center py-2">
                                {{-- <a href="#" class="text-muted uk-text-small"> 13 Courses </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
            <li class="uk-active uk-first-column"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="uk-disabled"><span>...</span></li>
            <li><a href="#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-next"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"></polyline></svg></span></a></li>
        </ul> --}}
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
    @include('admin.sweetalerts.swalmanuallecture')
    <script>
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
        $(document).on('click','.buttoneditinfo', function(){
            var id = $(this).attr('id')
            $.ajax({
                url: '/adminteachers/getinfo',
                type: 'GET',
                datatype: 'json',
                data: {
                    id : id
                },
                success: function(data){
                    $('#firstname'+id).val(data.firstname)
                    $('#middlename'+id).val(data.middlename)
                    $('#lastname'+id).val(data.lastname)
                    $("#gender"+id+" option").each(function(){
                        if($(this).val()==data.gender){ 
                            $(this).attr("selected","selected");    
                        }
                    });
                    $('#username'+id).val(data.email)
                }
            })
        })
        $(document).on('click','.buttonupdateinfo', function(){
            var id          = $(this).attr('id');
            var firstname   = $('#firstname'+id).val();
            var middlename  = $('#middlename'+id).val();
            var lastname    = $('#lastname'+id).val();
            var gender      = $('#gender'+id).val();
            var username    = $('#username'+id).val();
            $.ajax({
                url: '/adminteachers/updateinfo',
                type: 'GET',
                datatype: 'json',
                data: {
                    id          : id,
                    firstname   : firstname,
                    middlename  : middlename,
                    lastname    : lastname,
                    gender      : gender,
                    username    : username
                },
                success: function(data){
                    $('#fullname'+id).text(data.firstname+' '+data.middlename+' '+data.lastname)
                    $('#email'+id).text(data.username)
                }
            })
        })
        var selectedteacherid;
        $(document).on('click','.buttonbooksassigned', function(){
            var id  = $(this).attr('id');
            selectedteacherid = id;
            $.ajax({
                url: '/adminteachers/booksassigned',
                type: 'GET',
                datatype: 'json',
                data: {
                    id          : id
                },
                success: function(data){
                    $('#booksassignedcontainerul'+id).text('')
                    if(data.length == 0)
                    {
                        $('#booksassignedcontainerul'+id).append(
                            '<div class="col-md-12 text-center">No assigned books</div>'
                        )
                    }else{
                        $('#booksassignedcontainerul'+id).removeClass('text-center')
                        $.each(data, function(key, value){
                            $('#booksassignedcontainerul'+id).append(
                                '<div class="col-md-3 col-4">'+
                                    '<a href="#" class="skill-card" style="border: 1px solid #ddd">'+
                                        '<i class="skill-card-icon" style="color:#dd0031">'+
                                            '<img src="'+value.picurl+'" style="width: 50px">'+
                                        '</i>'+
                                        '<div>'+
                                            '<h2 class="skill-card-title"> '+value.title+'</h2>'+
                                            '<p class="skill-card-subtitle">'+
                                                '<button type="button" class="btn btn-sm btn-block btn-danger deleteassignbook" id="'+value.id+'">Delete</button>'+
                                            '</p>'+
                                        '</div>'+
                                    '</a>'+
                                '</div>'
                            )
                        })
                    }
                }
            })
        })
        $(document).on('input','#searchclassroominput', function(){
            var thisbook = $(this).val();
            var teacherid = $(this).attr('teacherid');
            $.ajax({
                url: '/adminteachers/searchbook',
                type: 'GET',
                datatype: 'json',
                data: {
                    thisbook : thisbook,
                    teacherid : teacherid
                },
                success: function(data){
                    console.log(data)
                    $('#searchbooksresults'+selectedteacherid).empty()
                    $('#searchbookscontainerresponse'+selectedteacherid).text('')
                    if(data.length == 0)
                    {
                        $('#searchbookscontainerresponse'+selectedteacherid).text('No book results')
                    }else{
                        
                        $.each(data, function(key, value){
                            $('#searchbooksresults'+selectedteacherid).append(
                                '<div>'+
                                    '<a href="#" class="skill-card" style="border: 1px solid #ddd">'+
                                        '<i class="skill-card-icon" style="color:#dd0031">'+
                                            '<img src="'+value.picurl+'" style="width: 50px">'+
                                        '</i>'+
                                        '<div>'+
                                            '<h2 class="skill-card-title"> '+value.title+'</h2>'+
                                            '<p class="skill-card-subtitle">'+
                                                '<button type="button" class="btn btn-sm btn-block btn-light assignbook" id="'+value.id+'">Add</button>'+
                                            '</p>'+
                                        '</div>'+
                                    '</a>'+
                                '</div>'
                            )
                            
                        })
                    }
                    // $('#searchbookscontainer').empty()
                    // $('#searchbookscontainer').append(data)
                }
            })
        })
        $(document).on('click','.assignbook', function(){
            var bookid = $(this).attr('id')
            var thiselement = $(this)
            console.log(thiselement.prop('disabled'))
            if(thiselement.prop('disabled') == false)
            {
                $.ajax({
                    url: '/adminteachers/assignthisbook',
                    type: 'GET',
                    datatype: 'json',
                    data: {
                        bookid : bookid,
                        teacherid : selectedteacherid
                    },
                    success: function(data){
                        $(".link-field-first-ticket-button").appendTo(".event-location-one");
                        thiselement.prop('disabled',true);
                        thiselement.text('Book added');

                    }
                })
            }
        })
        $(document).on('click','.deleteassignbook', function(){
            var id = $(this).attr('id');
            var thiselement = $(this)
            $.ajax({
                url: '/adminteachers/deleteassignedbook',
                type: 'GET',
                datatype: 'json',
                data: {
                    id : id
                },
                success: function(data){
                    thiselement.prop('disabled',true);
                    thiselement.text('Book deleted');

                }
            })
        })
    </script>
@endsection