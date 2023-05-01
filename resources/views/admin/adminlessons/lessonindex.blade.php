@extends('admin.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Font Awesome -->
<!--<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">-->
<!-- summernote -->
    <!--<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">-->
    <style>
        .swal-wide{
            width:850px !important;
        }
        .note-toolbar {
                position: relative;
                z-index: 0 !important;
            }
        .gfg_tooltip { 
                position: relative; 
                display: inline-block; 
                border-bottom: 1px dotted black; 
                background-color: gray; 
                color: black; 
                padding: 15px; 
                text-align: center; 
                display: inline-block; 
                font-size: 16px; 
            } 
            .gfg_tooltip:hover {
            -ms-transform: scale(1.2); /* IE 9 */
            -webkit-transform: scale(1.2); /* Safari 3-8 */
            transform: scale(1.2); 
            }
            .gfg_tooltip .gfg_text { 
                visibility: hidden; 
                width: 120px; 
                background-color: gray; 
                color: white; 
                text-align: center; 
                border-radius: 6px; 
                padding: 5px 0; 
                position: absolute; 
                z-index: 1; 
                top: 5%; 
                left: 115%; 
            } 
              
            .gfg_tooltip .gfg_text::after { 
                content: ""; 
                position: absolute; 
                top: 50%; 
                right: 100%; 
                margin-top: -5px; 
                border-width: 5px; 
                border-style: solid; 
                border-color: transparent gray transparent  
                                transparent; 
            } 
              
            .gfg_tooltip:hover .gfg_text { 
                visibility: visible; 
            } 
            iframe {
                width: 100%;
                height: 100%;
            }
    </style>
    <form name="formdata" action="/adminlessoncontentcreate" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="contenttype"/>
        <input type="hidden" name="lessonid" value="{{$lessonid}}"/>
    </form>
            <div class="page-content-inner">

                <div class="card rounded">
                    <div class="row">
                        <div class="col-md-4" style="border-right: 1px solid #ddd">
                            <div class="row pt-3 pl-3">
                                <div class="col-md-12">
                                    <h5><i class="fa fa-book"></i> {{$bookinfo->title}}</h5>
                                </div>
                                @if($partkey == 0)
                                {{-- <div class="col-md-4">
                                    &nbsp;
                                </div> --}}
                                @else
                                    <div class="col-md-4">
                                        <h5>Part </h5>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>: {{$partinfo[0]->title}}</h5>
                                    </div>
                                @endif
                                <div class="col-md-4">
                                    <h5>Chapter</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>: {{$chapterinfo->title}}</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5>Lesson </h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>: {{$lessoninfo->title}}</h5>
                                </div>
                                <div class="col-md-12">
                                    <hr/>
                                    <h5>Description</h5>
                                    {{strip_tags($lessoninfo->description)}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="contentcontainer">
                                @if(count($lessoncontents) == 0)
                                    <div class="row p-3 dragrow">
                                        <div class="col-lg-1 col-2 rowhidden">
                                            <div class="btn-group-vertical">
                                                <a class="btn btn-sm text-white gfg_tooltip" contenttype="title" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    T
                                                    <span class="gfg_text">Title</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip" contenttype="description" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    D
                                                    <span class="gfg_text"> 
                                                        Description 
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip" contenttype="file" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fa fa-file m-0"></i><span class="gfg_text">PDF</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip" contenttype="link" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fa fa-link m-0"></i><span class="gfg_text">Link</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip" contenttype="image" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fa fa-image m-0"></i><span class="gfg_text">Image</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip" contenttype="video" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fas fa-video m-0"></i><span class="gfg_text">Video</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip"style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fa-sharp fa-light fa-scroll"></i><span class="gfg_text">Quiz</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fas fa-plus m-0"></i><span class="gfg_text">New row</span>
                                                </a>                                            </div>
                                        </div>
                                        <div class="col-lg-11 col-10 editcontent col-content">
                                            <div class="contenttype">
                                                <textarea contenttype="description" class="form-control editcontent" placeholder="Description" name="description" id="1"></textarea>
                                            </div>
                                            <div class="float-right editcontent">
                                                <button type="button" class="btn btn-sm btn-warning mr-1 editcontent savebutton">Save</button>
                                                {{-- <button type="button" class="btn btn-sm btn-danger editcontent removerow">Remove</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach($lessoncontents as $lessoncontent)
                                        <div class="row p-3 dragrow">
                                            <div class="col-lg-1 col-2 rowhidden">
                                                <div class="btn-group-vertical" hidden>
                                                    <a class="btn btn-sm text-white gfg_tooltip" contenttype="title" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        T
                                                        <span class="gfg_text">Title</span>
                                                    </a>
                                                    <a class="btn btn-sm text-white gfg_tooltip" contenttype="description" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        D
                                                        <span class="gfg_text"> 
                                                            Description 
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-sm text-white gfg_tooltip" contenttype="file" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        <i class="fa fa-file m-0"></i><span class="gfg_text">PDF</span>
                                                    </a>
                                                    <a class="btn btn-sm text-white gfg_tooltip" contenttype="link" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        <i class="fa fa-link m-0"></i><span class="gfg_text">Link</span>
                                                    </a>
                                                    <a class="btn btn-sm text-white gfg_tooltip" contenttype="image" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        <i class="fa fa-image m-0"></i><span class="gfg_text">Image</span>
                                                    </a>
                                                    <a class="btn btn-sm text-white gfg_tooltip" contenttype="video" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        <i class="fas fa-video m-0"></i><span class="gfg_text">Video</span>
                                                    </a>
                                                    <a class="btn btn-sm text-white gfg_tooltip"style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        <i class="fa-sharp fa-light fa-scroll"></i><span class="gfg_text">Quiz</span>
                                                    </a>
                                                    
                                                    <a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                        <i class="fas fa-plus m-0"></i><span class="gfg_text">New row</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-11 col-10 editcontent col-content">
                                                <form action="/adminlessoncontentupdate" method="POST"  enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" class="form-control m-0" name="id" value="{{$lessoncontent->id}}" />
                                                    <div class="contenttype">
                                                        @if($lessoncontent->type == '1')
                                                            <input contenttype="title" type="text" class="form-control m-0" name="title" value="{{$lessoncontent->content}}" placeholder="Title"/>
                                                            <label class="text-muted">Title</label>
                                                        @elseif($lessoncontent->type == '2')
                                                            <textarea contenttype="description" class="form-control editcontent" placeholder="Description" name="description">
                                                                {{$lessoncontent->content}}
                                                            </textarea>
                                                        @elseif($lessoncontent->type == '3')
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <embed src="{{asset($lessoncontent->filepath)}}" width="100%" height="" />
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <li><a href="{{asset($lessoncontent->filepath)}}" target="_blank">{{$lessoncontent->content}}</a></li>
                                                                </div>
                                                            </div>
                                                        @elseif($lessoncontent->type == '4')
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    @php
                                                                        echo htmlspecialchars_decode(stripslashes($lessoncontent->content))
                                                                    @endphp
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input contenttype="link" type="text" class="form-control" name="link" value="{{$lessoncontent->content}}" placeholder="Paste link here..."/>
                                                                </div>
                                                            </div>
                                                        @elseif($lessoncontent->type == '5')
                                                            <input contenttype="image" type="file" class="form-control" name="photos" />
                                                        @elseif($lessoncontent->type == '6')
                                                            <input contenttype="video" type="file" class="form-control" name="video"/>
                                                        @endif
                                                    </div>
                                                    <div class="float-right editcontent">
                                                        <button type="submit" class="btn btn-sm btn-warning mr-1 editcontent updatebutton">Update</button>
                                                        {{-- <button type="button" class="btn btn-sm btn-danger editcontent removerow">Remove</button> --}}
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
        
                        </div>
                    </div>
                </div>

            </div>
            <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
            <!-- SweetAlert2 -->
            <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
            <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
            @include('admin.sweetalerts.swalmanuallecture')
            <script>
                $(document).ready(function(){

                    $('.page-menu').addClass(' menu-large');
                    $('textarea[name="lessondescription"]').summernote({
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']]
                        ]
                    })
                    $('textarea.editcontent').summernote({
                        toolbar: [
                            // [groupName, [list of button]]
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']]
                        ]
                    })
                    $('.ui-helper-hidden-accessible').remove();
                    $('iframe').attr('allowfullscreen');

                    // $(".contentcontainer").sortable();
                    // $(".contentcontainer").disableSelection();
                    // $(".dragrow").draggable({
                    //     containment : ".contentcontainer",
                    //     helper : 'clone',
                    //     revert : 'invalid'
                    // });
                    // $(".dragrow, .dragrow").droppable({
                    //     hoverClass : 'ui-state-highlight',
                    //     accept: ":not(.ui-sortable-helper)",
                    //     drop : function(ev, ui) {
                    //         $(ui.draggable).clone().appendTo(this);
                    //         $(ui.draggable).remove();
                    //     }
                    // });
                    $(document).on('click', '.lecturelink', function(){
                    $('.ui-helper-hidden-accessible').remove();
                        $(this).closest('form').submit();
                    });
                    $(document).on('click','.lessonselect', function(){
                    $('.ui-helper-hidden-accessible').remove();
                        $(this).closest('form').submit();
                    });
                    
                    // var addrow = 1;
                    var addrow = $('.contentcontainer').children('.row').length;
                    $(document).on('click', '.newrow', function(){
                    $('.ui-helper-hidden-accessible').remove();
                        addrow+=1;
                        // console.log()
                        $(this).closest('.row').find('.rowhidden').empty()
                        $('.contentcontainer').append(
                            '<div id="'+addrow+'" class="row p-3">'+
                                '<div class="col-lg-1 col-2 rowhidden" id="'+addrow+'">'+
                                    '<div class="btn-group-vertical">'+
                                        '<a class="btn btn-sm text-white gfg_tooltip" contenttype="title" style="background-color: #3175c2; border: 3px solid #1d62b7;">'+
                                            'T'+
                                            '<span class="gfg_text">Title</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip" contenttype="description" style="background-color: #3175c2; border: 3px solid #1d62b7;">'+
                                            'D'+
                                            '<span class="gfg_text">'+ 
                                                'Description'+
                                            '</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip" contenttype="file" style="background-color: #3175c2; border: 3px solid #1d62b7;"id="'+addrow+'">'+
                                            '<i class="fa fa-file m-0"></i><span class="gfg_text">PDF</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip" contenttype="link" style="background-color: #3175c2; border: 3px solid #1d62b7;"id="'+addrow+'">'+
                                            '<i class="fa fa-link m-0"></i><span class="gfg_text">Link</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip" contenttype="image" style="background-color: #3175c2; border: 3px solid #1d62b7;"id="'+addrow+'">'+
                                            '<i class="fa fa-image m-0"></i><span class="gfg_text">Image</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip" contenttype="video" style="background-color: #3175c2; border: 3px solid #1d62b7;"id="'+addrow+'">'+
                                            '<i class="fas fa-video m-0"></i><span class="gfg_text">Video</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">'+
                                            '<i class="fa-sharp fa-light fa-scroll"></i><span class="gfg_text">Quiz</span>'+
                                        '</a>'+
                                        '<a class="btn btn-sm text-white gfg_tooltip newrow" id="'+addrow+'"style="background-color: #3175c2; border: 3px solid #1d62b7;">'+
                                            '<i class="fas fa-plus m-0"></i><span class="gfg_text">New row</span>'+
                                        '</a>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-11 col-10 editcontent col-content" id="'+addrow+'">'+
                                    '<div class="contenttype" id="'+addrow+'">'+
                                        '<input contenttype="title" type="text" class="form-control" name="title" placeholder="Title" id="'+addrow+'"/>'+
                                    '</div>'+
                                    '<div class="float-right editcontent actionbuttonscontainer" id="'+addrow+'" >'+
                                        '<button type="button" class="btn btn-sm btn-warning mr-1 editcontent savebutton">Save</button>'+
                                        '<button type="button" class="btn btn-sm btn-danger removerow">Remove</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        )
                        $('textarea.editcontent').summernote({
                            toolbar: [
                                // [groupName, [list of button]]
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['font', ['strikethrough', 'superscript', 'subscript']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['height', ['height']]
                            ]
                        })
                    })
                    $(document).on('click', '.editcontent', function(){
                    $('.ui-helper-hidden-accessible').remove();
                        $('.btn-group-vertical').remove();
                        var addrowid = $(this).attr('id');
                        $(this).closest('.row').find('.rowhidden').append(
                            '<div class="btn-group-vertical">'+
                                '<a class="btn btn-sm text-white gfg_tooltip" contenttype="title" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    'T'+
                                    '<span class="gfg_text">Title</span>'+
                                '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip" contenttype="description" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    'D'+
                                    '<span class="gfg_text">'+ 
                                        'Description'+
                                    '</span>'+
                                '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip" contenttype="file" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    '<i class="fa fa-file m-0"></i><span class="gfg_text">PDF</span>'+
                                '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip" contenttype="link" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    '<i class="fa fa-link m-0"></i><span class="gfg_text">Link</span>'+
                                '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip" contenttype="image" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    '<i class="fa fa-image m-0"></i><span class="gfg_text">Image</span>'+
                                '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip" contenttype="video" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    '<i class="fas fa-video m-0"></i><span class="gfg_text">Video</span>'+
                                '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">'+
                                            '<i class="fa-sharp fa-light fa-scroll"></i><span class="gfg_text">Quiz</span>'+
                                        '</a>'+
                                '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;" id="'+addrowid+'">'+
                                    '<i class="fas fa-plus m-0"></i><span class="gfg_text">New row</span>'+
                                '</a>'+
                            '</div>'
                        )
                    })
                    var selectedcontent;
                    $(document).on('click', '.gfg_tooltip', function(){
                    $('.ui-helper-hidden-accessible').remove();
                        var addrowid = $(this).attr('id');
                        if($(this).attr('contenttype') == 'title'){
                            selectedcontent = 'title';
                            var contentdisplay = '<input contenttype="title" type="text" class="form-control" name="title" placeholder="Title" id="'+addrowid+'"/>';
                        }
                        if($(this).attr('contenttype') == 'description'){
                            selectedcontent = 'description';
                            var contentdisplay = '<textarea contenttype="description" class="form-control editcontent" name="description" placeholder="Description" id="'+addrowid+'"></textarea>';
                        }
                        if($(this).attr('contenttype') == 'file'){
                            selectedcontent = 'file';
                            var contentdisplay = '<input contenttype="file" type="file" class="form-control" name="file"  accept="application/pdf" id="'+addrowid+'"/>';
                        }
                        if($(this).attr('contenttype') == 'link'){
                            selectedcontent = 'link';
                            var contentdisplay = '<input contenttype="link" type="text" class="form-control" name="link"   id="'+addrowid+'"placeholder="Paste link here..."/>';
                        }
                        if($(this).attr('contenttype') == 'image'){
                            selectedcontent = 'image';
                            // console.log("Hello!")
                            var contentdisplay = '<input contenttype="image" type="file" class="form-control" name="photos" id="'+addrowid+'" />';
                        }
                        if($(this).attr('contenttype') == 'video'){
                            selectedcontent = 'video';
                            var contentdisplay = '<input contenttype="video" type="file" class="form-control" name="video"  id="'+addrowid+'"/>';
                        }
                        $(this).closest('.row').find('.col-content').find('.contenttype').empty();
                        $(this).closest('.row').find('.col-content').find('.contenttype').append(contentdisplay);

                        $('textarea.editcontent').summernote({
                            toolbar: [
                                // [groupName, [list of button]]
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['font', ['strikethrough', 'superscript', 'subscript']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['height', ['height']]
                            ]
                        })
                    })
                    $('#edittitlebutton').on('click', function(){
                        $('#lessontitle').hide();
                    });
                    $('#editdescriptionbutton').on('click', function(){
                        $('#lessondescription').hide();
                    });
                })

                $(document).on('click', '.removerow', function(){
                    $('.ui-helper-hidden-accessible').remove();
                    // $(this).closest('.row').find('.actionbuttonscontainer').find('.editcontent').hide()
                    var rowid = $(this).closest('.row').attr('id');
                    $(this).closest('.actionbuttonscontainer').children('button').hide();
                    $(this).closest('.row').find('.actionbuttonscontainer').prepend(
                        '<div class="alert alert-danger alert-dismissible">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                            '<h6 class="m-0" style="height: 20px;"><i class="icon fas fa-exclamation-triangle"></i> Undo (<span id="countdown'+rowid+'">6 seconds remaining</span>)</h6>'+
                        '</div>'
                    )
                    var timeleft = 5;

                    var downloadTimer = setInterval(function function1(){
                        
                        // console.log(timeleft + " seconds remaining")
                        $('span#countdown'+rowid).text(timeleft + " seconds remaining")
                    // document.getElementById(").innerHTML = timeleft + 
                    // "&nbsp"+"seconds remaining";

                        timeleft -= 1;
                        if(timeleft == 0){

                            clearInterval(downloadTimer);
                            // $('span#countdown'+rowid).remove();
                            $('div#'+rowid+'.row').remove();
                        $.ajax({
                            url: '/adminlessoncontentdelete',
                            type:"GET",
                            dataType:"json",
                            data:{
                                contents: allcontents,
                                lessonid: '{{$lessonid}}'
                            },
                            // headers: { 'X-CSRF-TOKEN': token },,
                            complete: function(){
                                Swal.fire({
                                    title: 'Created Successfully!',
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK!',
                                    allowOutsideClick: false
                                })
                            }
                        })
                        }else{
                            $('button.close').on('click', function(){
                                $('span#countdown'+rowid).remove();
                                clearInterval(downloadTimer);
                                $(this).closest('.actionbuttonscontainer').children('button').show();
                            })
                        }
                    }, 1000);
                })
                
                // var allcontents = [];
                $(document).on('click', '.savebutton', function(){
                    $(this).closest('.actionbuttonscontainer').find('.removerow').remove();
                    $(this).attr('disabled', true);
                    $('.ui-helper-hidden-accessible').remove();
                    var contentvalue = $(this).closest('div.row').find('div.contenttype').children()[0].value;
                    var formcontenttype = $(this).closest('div.row').find('div.contenttype').children().first().attr('contenttype');
                    if(formcontenttype == 'file' || formcontenttype == 'image'){
                        $('form[name="formdata"]').append($(this).closest('div.row').find('div.contenttype').children()[0]);
                        $('form[name="formdata"]').find('input[name=file]').attr('name','content');
                        $('form[name="formdata"]').find('input[name=contenttype]').val(formcontenttype);
                        $('form[name="formdata"]').submit();
                    }else{
                        $.ajax({
                            url: '/adminlessoncontentcreate',
                            type:"POST",
                            dataType:"json",
                            data:{
                                contenttype: formcontenttype,
                                content: contentvalue,
                                lessonid: '{{$lessonid}}'
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            complete: function(){
                                Swal.fire({
                                    title: 'Created Successfully!',
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK!',
                                    allowOutsideClick: false
                                })
                                // .then((confirm) => {
                                //     if (confirm.value) {
                                //         // window.location.reload();
                                //     }
                                // })
                            }
                        })
                    }
                })
            </script>
@endsection