@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li>Classrooms</li>
        </ul>
    </nav>

@endsection

@section('content')

    <!-- search overlay-->
    <div id="searchbox">

        <div class="search-overlay"></div>

        <div class="search-input-wrapper">
            <div class="search-input-container">
                <div class="search-input-control">
                    <span class="icon-feather-x btn-close uk-animation-scale-up" uk-toggle="target: #searchbox; cls: is-active"></span>
                    <div class=" uk-animation-slide-bottom">
                        <input type="text" name="search" autofocus="" required="" autocomplete="off" id="general_search_pc">
                        <p class="search-help">Type the name or code of the classroom you are looking for</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="modal-close-default" uk-modal> 
        <div class="uk-modal-dialog uk-modal-body"> 
            <button class="uk-modal-close-default" type="button" uk-close></button> 
            <h2 class="uk-modal-title">Create Classroom</h2> 

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Classroom Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="classroomname" type="text" placeholder="Classroom Name" autocomplete="off">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Classroom Code</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="classroomcode" id="form-horizontal-text" type="text" placeholder="Classroom Code" disabled>
                </div>
            </div>
            <div class="uk-margin">
                <a href="#" type="button" class="btn btn-primary btn-sm uk-first-column" id="generate_random_code">
                    Generate Random Code
                </a>
            </div>
            <br>
            <div class="uk-margin">
                <a href="#" type="button" class="btn btn-success uk-first-column disabled" id="create_classroom" >
                    Create Classroom
                </a>
            </div>
        </div> 
    </div>



    {{-- <div class="page-content-inner pt-lg-0  pr-lg-0">
        <br/> --}}
        <div class="container">
            {{-- <div class="section-header mb-lg-2 border-0 uk-flex-middle">
                <div class="section-header-left">
                    <h2 class="uk-heading-line text-left"><span> Classrooms </span></h2>
                </div>
                <div class="section-header-right">
                    <a href="#" class="btn btn-default uk-visible@s" id="addclassroom" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add classroom</a>
         
                </div>
            </div>
         --}}
            {{-- <div class="section-small pt-0">
                <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">
                    <div class="grid-slider-header">
                        <div class="grid-slider-header-link">
                            <a href="" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                            <a href="" class="slide-nav-next" uk-slider-item="next"></a>
                        </div>
                    </div>
                    <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(0px, 0px, 0px);" id="classroom_table_holder">

                    </ul>
                </div>
            </div> --}}
            
            <div class="section-header pb-0">
                <div class="section-header-left">
                    <h1>Classrooms</h1>
                    {{-- <a href="#" class="btn bs-placeholder btn-default" id="addclassroom" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add classroom</a> --}}
                </div>
                <div class="section-header-right">
                    <a href="#" class="btn bs-placeholder btn-default" id="addclassroom" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add classroom</a>
                </div>
            </div>
            <div class="section-small" id="classroom_table_holder">
              
            </div>
            
        
            {{-- <div class="footer">
                @include('admin.inc.footer')
            </div> --}}
        </div>
    {{-- </div> --}}
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script>
        $(document).ready(function(){

            var skip = null;
            var searchVal = null;

            // $(window).on("scroll", function() {
            //     var scrollHeight = $(document).height();
            //     var scrollPosition = $(window).height() + $(window).scrollTop();

            //     if ((scrollHeight - scrollPosition) / scrollHeight === 0 && $('#max_reach').length == 0)  {
            //         skip = $('.roomCount').length
            //         loadClassroom()
            //     }
            //     else if((scrollHeight - scrollPosition) / scrollHeight === 0 && $('#max_reach').length){
            //         UIkit.notification("<span uk-icon='icon: check'></span> You have reached the bottom!", {status:'success',timeout: 1000});
            //     }
            // });

            
            loadClassroom()

            function loadClassroom(){

                $.ajax({
                    url: '/teacherclassrooms?table=table'+'&search='+searchVal+'&skip='+skip,
                    type:"GET",
                    success: function(data){

                        $('#classroom_table_holder').append(data)
                
                    }
                })
                
            }

            $(document).on('click','#generate_random_code',function(){
                   
                $.ajax({
                    url: '/teachergetavailablecode',
                    type:"GET",
                    complete: function(data){
                       
                        $('input[name="classroomcode"]').val(data.responseText)
                        $('#create_classroom').removeClass('disabled')
                    }
                })

            })

            $(document).on('change','#general_search',function(){
                skip = null
                $('#classroom_table_holder').empty()
                searchVal = $(this).val()
                loadClassroom()

            })


            $(document).on('change','#general_search_pc',function(){
                skip = null
                $('#classroom_table_holder').empty()
                searchVal = $(this).val()
                loadClassroom()

            })

            

         
            $(document).on('click','#create_classroom',function(){

                var validInput = true

                if($('input[name=classroomname]').val() == ''){

                    UIkit.notification("<span uk-icon='icon: check'></span> Classroom name is required!", {status:'success', timeout: 1500 });

                    validInput = false
                    console.log('invalid')
                }
                
                if(validInput){

                    $.ajax({
                            url: '/teacherclassroom/create',
                            type:"GET",
                            data:{
                                classroomname: $('input[name=classroomname]').val(),
                                code: $('input[name=classroomcode]').val()
                            },
                            success: function(data){
                                skip = null
                                UIkit.notification("<span uk-icon='icon: check'></span> Created Successfully!", {status:'success', timeout: 1000 });

                                $('.uk-modal').removeClass('uk-open')
                                $('.uk-modal').removeAttr('style')
                                $('input[name=classroomname]').val('')
                                $('input[name=classroomcode]').val('')
                                $('#classroom_table_holder').empty()
                                $('.uk-modal-page').removeClass('uk-modal-page')
                                $('#create_classroom').addClass('disabled')
                                loadClassroom()
                                $('#create_classroom').addClass('uk-modal-close')

                                

                                
                            }
                    })

                }

            })
   

          
        })

        // $(document).on('click', 'li.classroom', function(){
        //         console.log($('form[name="viewclassroom"]'))
        //         $('input[name=classroomview]').val($(this).attr('classroomid'));
        //         $('form[name="viewclassroom"]').submit();
        //     })
    </script>


    <!-- Bootstrap -->
    {{-- <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    <!-- AdminLTE -->
    {{-- <script src="{{asset('dist/js/adminlte.js')}}"></script> --}}
    <!-- SweetAlert2 -->
    {{-- <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script> --}}
    {{-- @include('teacher.ajax.ajaxforms') --}}
    {{-- <script>
        $(document).ready(function(){
            $('.page-menu').addClass('menu-large');
            $(document).on('click', '#addclassroom', function(){
                Swal.fire({
                    title: 'Create New Classroom',
                    html:   '<label class="text-left"><strong>Classroom Name</strong></label>'+
                            '<input type="text" class="form-control mb-3" name="classroomname" id="classroomname"/>'+
                            '<div class="row">'+
                                '<div class="col-md-7">'+
                                    '<label class="text-left"><strong>Code</strong></label>'+
                                    '<input type="text" class="form-control mb-2" name="code" id="code"/>'+
                                '</div>'+
                                '<div class="col-md-5 p-3">'+
                                    // '<br/>'+
                                    '<label class="text-left">&nbsp;</label>'+
                                    '<div class="form-group clearfix text-left" style="vertical-align: middle;">'+
                                        '<div class="icheck-primary d-inline">'+
                                            '<input type="checkbox" id="generatecode" style="width: 20px; height: 20px; display: inline; ">'+
                                            '<label for="generatecode" style="display: inline;">'+
                                                '&nbsp;Auto generate'+
                                            '</label>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>',
                    customClass: 'swal-wide',
                    confirmButtonText: 'Create',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    preConfirm: () => {
                        if($('#classroomname').val() == ""){
                            Swal.showValidationMessage(
                                "First Name is required!"
                            );
                            $('#firstname').css('border','1px solid red');
                        }
                        else if($('#code').val() == ""){
                            Swal.showValidationMessage(
                                "Last Name is required!"
                            );
                            $('#lastname').css('border','1px solid red');
                        }else{
                            $.ajax({
                                url: '/teacherclassroom/create',
                                type:"GET",
                                dataType:"json",
                                data:{
                                    classroomname: $('#classroomname').val(),
                                    code: $('#code').val()
                                },
                                // headers: { 'X-CSRF-TOKEN': token },,
                                success: function(data){
                                    if(data == 0){
                                        Swal.fire({
                                            title: 'Classroom already exists',
                                            type: 'error',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK!'
                                        }).then((confirm) => {
                                            if (confirm.value) {
                                                window.location.reload();
                                            }
                                        })
                                    }else if(data == 1){
                                        Swal.fire({
                                            title: 'New Classroom added successfully!',
                                            type: 'success',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK!'
                                        }).then((confirm) => {
                                            if (confirm.value) {
                                                window.location.reload();
                                            }
                                        })
                                    }
                                }
                            })
                        }
                    }
                })
                $(document).on('click','#generatecode', function(){
                    if($(this).prop('checked') == true){
                        $.ajax({
                            url: '/teachergetavailablecode',
                            type:"GET",
                            dataType:"json",
                            complete: function(data){
                                console.log(data.responseText)
                                $('input[name="code"]').val(data.responseText)
                            }
                        })
                    }
                })
            })
            $(document).on('click', 'li.classroom', function(){
                console.log($('form[name="viewclassroom"]'))
                $('input[name=classroomview]').val($(this).attr('classroomid'));
                $('form[name="viewclassroom"]').submit();
            })
        })
    </script> --}}
@endsection