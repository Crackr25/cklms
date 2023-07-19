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
                <a href="#" class="btn btn-default uk-visible@s" id="specialCode"> Generate Special Code</a>
                <a href="#" class="btn btn-default uk-visible@s" id="addinstructor"> <i class="uil-plus"></i> Add teacher</a>
                <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search-input" placeholder="Search Instructor" aria-label="Search" aria-describedby="search-button">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="search-button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="row" id="instructor_holder">
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

        function loadinstructors(){

            $.ajax({
                url: '/adminteachers/getInstructors',
                type: 'GET',
                success: function(data) {
                    $('#instructor_holder').empty();
                    $('#instructor_holder').append(data);
                }
            })


        }

                
        $(document).ready(function() {
            loadinstructors();


        });

        $(document).on('input','.teacherinput', function(){
            $('.buttonupdateinfo').prop('disabled', false);

        })


        $(document).on('input','#search-input', function(){
            var search = $(this).val();
            $.ajax({
                url: '/adminteachers/getInstructors',
                type: 'GET',
                data: {
                    search : search

                },
                success: function(data) {
                    $('#instructor_holder').empty();
                    $('#instructor_holder').append(data);
                }
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

        $(document).on('click', '#generateBtn', function() {
                $.ajax({
                url: '/adminteachers/generatecode',
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#specialCodeInput').val(data);
                }
                });
        });
        // $(document).on('click','#generateBtn', function(){
            
            
        //     $.ajax({
        //         url: '/adminteachers/generatecode',
        //         type: 'GET',
        //         success: function(data){
        //             console.log(data);
        //             $('#specialCode').val(data)
        //         }
        //     })

        // })


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
            $('.teachername').text(' ');
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
                    $('#booksassignedcontainerul'+id).text('');
                    console.log(data);
                    $('.teachername').text(data[0].teachername);
                    
                    
                    if(data.length == 0)
                    {
                        $('#booksassignedcontainerul'+id).append(
                            '<div class="col-md-12 text-center">No assigned books</div>'
                        )
                    }else{
                        $('#booksassignedcontainerul'+id).removeClass('text-center')
                        $.each(data, function(key, value){
                        
                        var html =   ` <div class="col-md-3 col-4">
                                            <a href="#" class="skill-card" style="border: 1px solid #ddd">
                                                <i class="skill-card-icon" style="color:#dd0031">
                                                    <img src="${value.picurl}" style="width: 50px">
                                                </i>
                                                <div>
                                                    <h2 class="skill-card-title">${value.title}</h2>
                                                    <p class="skill-card-title">Classroom books added: </p>
                                                    <ol>`
                        $.each(value.classroom, function(key, value){
                                                html+= `<li>${value.classroomname}</li>`

                        })
                        
                    
                        html+=  `</ol> <p class="skill-card-subtitle">
                                                <button type="button" class="btn btn-sm btn-block btn-danger deleteassignbook" id="${value.id}">Delete</button>
                                            </p>
                                        </div>
                                    </a>
                                </div>`

                        $('#booksassignedcontainerul'+id).append(html);
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