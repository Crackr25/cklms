@extends('admin.layouts.app')

@section('content')
    <!-- Font Awesome -->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
    <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">

    <style>
        /* .swal-wide{
            width:80%;
        } */
        .swal2-header{
            border: none;
        }
        
        ul, #myUL {
        list-style-type: none;
        }

        #myUL {
        margin: 0;
        padding: 0;
        }

        .box {
        cursor: pointer;
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none;
        }

        .box::before {
        content: "\229F";
        color: black;
        display: inline-block;
        margin-right: 6px;
        }

        .check-box::before {
        content: "\229E"; 
        color: dodgerblue;
        }

        .nested {
        display: none;
        }

        .active {
        display: block;
        }
    </style>
    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row uk-flex uk-flex-center">
                                    <div class="col-12 uk-flex uk-flex-center">
                                        <div uk-lightbox="" class="uk-flex uk-flex-center">
                                            <a href="{{asset($book->picurl)}}" data-caption="{{$book->booktitle}}" draggable="false" class="uk-flex uk-flex-center">
                                                <img class="uk-box-shadow-xlarge" alt="" src="{{asset($book->picurl)}}" style="width: 50%;" draggable="false">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row mt-2">
                                    @php
                                        if($book->status == 0)
                                        {
                                            $bookstatusactive = '';
                                            $bookstatusinactive = 'checked';

                                        }elseif($book->status == 1)
                                        {
                                            $bookstatusactive = 'checked';
                                            $bookstatusinactive = '';
                                            
                                        }else{

                                            $bookstatusactive = '';
                                            $bookstatusinactive = 'checked';
                                        }
                                    @endphp
                                    <div class="col-6">
                                        <div class="form-group clearfix ">
                                            <div class="icheck-primary d-inline">
                                            <input type="radio" id="bookstatus1" class="bookstatus" name="bookstatus"  bookid="{{$book->bookid}}" value="1" {{$bookstatusactive}}> 
                                            <label for="bookstatus1" style="font-size: 100% !important;">
                                                Active
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix ">
                                            <div class="icheck-primary d-inline">
                                            <input type="radio" id="bookstatus2" class="bookstatus" name="bookstatus"  bookid="{{$book->bookid}}" {{$bookstatusinactive}} value="0"> 
                                            <label for="bookstatus2" style="font-size: 100% !important;">
                                                Inactive
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <ul class="uk-list uk-list-divider text-small mt-1" style="font-size: 90%">
                                    <li> Title: {{$book->booktitle}}  </li>
                                    {{-- <li> Subject {{$book->subject}}</li> --}}
                                    <li> Publish time 12/12/2018</li>
                                </ul>
                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <button type="button" class="btn btn-warning" id="buttonupdateinfo">Update book info</button>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- @if(count($books) > 0) --}}
            {{-- <ul uk-accordion> --}}
                {{-- @foreach($books as $book) --}}
                    {{-- <li> --}}
                        {{-- <a class="uk-accordion-title" href="#">Book </a> --}}
                        <div class="uk-accordion-content">
                            <div class="card mb-2"  bookid="{{$book->bookid}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="uk-flex uk-flex-center">
                                                <strong>Table of Contents</strong>
                                            </label>

                                            <div class="row"   style="border: 1px solid;">
                                                <ul class="heirarchytree">
                                                    @if(count($book->parts)==0)
                                                        @if(count($book->chapters) > 0)
                                                            @php
                                                                $chapternumber = 0;
                                                                $partnumber = 0;
                                                            @endphp
                                                            @foreach($book->chapters as $chapter)   
                                                                @php
                                                                    $chapternumber+=1;;
                                                                @endphp
                                                                <li id="{{$chapternumber}}" contenttype="chapter" partid="0"  classification="old" bookchapterid="{{$chapter->id}}" class="liheirarchy chapter">
                                                                    <span class="box boxchapter{{$chapternumber}}" contenttype="chapter" chapterid="chapter{{$chapternumber}}" cid="{{$chapter->id}}">{{$chapter->title}} <i class="fa fa-times ml-4 removeitem" chapterid="{{$chapternumber}}" contentid="contentchapter{{$chapternumber}}" label="{{$chapter->title}}"></i></span>
                                                                    <ul class="nested lesson chapter{{$chapternumber}}part0 active" chapterid="chapter{{$chapternumber}}">
                                                                        @if(count($chapter->lessons) > 0)
                                                                            @php
                                                                                $lessonnumber = 0;
                                                                            @endphp
                                                                            @foreach($chapter->lessons as $lesson)  
                                                                                @php
                                                                                    $lessonnumber+=1;;
                                                                                @endphp
                                                                                <li id="{{$lessonnumber}}" class="liheirarchy lesson" contenttype="lesson"  classification="old" booklessonid="{{$lesson->id}}" bookchapterid="{{$chapter->id}}" chapterid="{{$chapternumber}}"  partid="{{$partnumber}}">
                                                                                    <span class="box boxlesson{{$lessonnumber}}" lessonid="lesson{{$lessonnumber}}">{{$lesson->title}}
                                                                                        {{-- <i class="fa fa-times ml-4 removeitem" lessonid="{{$lessonnumber}}" contentid="contentlesson{{$lessonnumber}}" label="{{$lesson->title}}"></i> --}}
                                                                                    </span>
                                                                                    <ul class="nested lesson{{$lessonnumber}}chapter{{$chapternumber}}part{{$partnumber}} active" lessonid="lesson{{$lessonnumber}}"></ul>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                        @if(count($chapter->quizzes) > 0)
                                                                            @php
                                                                                $quiznumber = 0;
                                                                            @endphp
                                                                            @foreach($chapter->quizzes as $quiz)  
                                                                                @php
                                                                                    $quiznumber+=1;;
                                                                                @endphp
                                                                                <li class="liheirarchy" contenttype="quiz"  classification="old" bookquizid="{{$quiz->id}}" chapterid="{{$chapternumber}}"  partid="{{$partnumber}}">
                                                                                    <span class="box boxquiz{{$quiznumber}}" quizid="quiz{{$quiznumber}}">{{$quiz->title}}
                                                                                        {{-- <i class="fa fa-times ml-4 removeitem" quizid="{{$quiznumber}}" contentid="contentquiz{{$quiznumber}}" label="{{$quiz->title}}"></i> --}}
                                                                                    </span>
                                                                                    <ul class="nested quiz{{$quiznumber}} active" quizid="quiz{{$quiznumber}}"></ul>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </li>  
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        @php
                                                            $partnumber = 0;
                                                        @endphp
                                                        @foreach($book->parts as $part)
                                                            @php
                                                                $partnumber+=1;
                                                            @endphp
                                                            <li id="{{$partnumber}}"  contenttype="part" classification="old" bookpartid="{{$part->id}}" class="liheirarchy part">
                                                                <span class="box boxpart{{$partnumber}}" contenttype="part" partid="part{{$partnumber}}">{{$part->title}} <i class="fa fa-times ml-4 removeitem" contentid="contentpart{{$partnumber}}"  label="{{$part->title}}"></i></span>
                                                                <ul class="nested part{{$partnumber}}  active" partid="part{{$partnumber}}">
                                                                    @if(count($part->chapters) > 0)
                                                                        @php
                                                                            $chapternumber = 0;
                                                                        @endphp
                                                                        @foreach($part->chapters as $chapter)   
                                                                            @php
                                                                                $chapternumber+=1;;
                                                                            @endphp
                                                                            <li id="{{$chapternumber}}" contenttype="chapter" partid="{{$partnumber}}"  classification="old" bookchapterid="{{$chapter->id}}" class="liheirarchy chapter">
                                                                                <span class="box boxchapter{{$chapternumber}}" contenttype="chapter" chapterid="chapter{{$chapternumber}}" cid="{{$chapter->id}}">{{$chapter->title}} <i class="fa fa-times ml-4 removeitem" chapterid="{{$chapternumber}}" contentid="contentchapter{{$chapternumber}}" label="{{$chapter->title}}"></i></span>
                                                                                <ul class="nested lesson chapter{{$chapternumber}}part{{$partnumber}} active" chapterid="chapter{{$chapternumber}}">
                                                                                    @if(count($chapter->lessons) > 0)
                                                                                        @php
                                                                                            $lessonnumber = 0;
                                                                                        @endphp
                                                                                        @foreach($chapter->lessons as $lesson)  
                                                                                            @php
                                                                                                $lessonnumber+=1;;
                                                                                            @endphp
                                                                                            <li id="{{$lessonnumber}}" class="liheirarchy lesson" contenttype="lesson"  classification="old" booklessonid="{{$lesson->id}}" bookchapterid="{{$chapter->id}}" chapterid="{{$chapternumber}}"  partid="{{$partnumber}}">
                                                                                                <span class="box boxlesson{{$lessonnumber}}" lessonid="lesson{{$lessonnumber}}">{{$lesson->title}} 
                                                                                                    {{-- <i class="fa fa-times ml-4 removeitem" lessonid="{{$lessonnumber}}" contentid="contentlesson{{$lessonnumber}}" label="{{$lesson->title}}"></i> --}}
                                                                                                </span>
                                                                                                <ul class="nested lesson{{$lessonnumber}}chapter{{$chapternumber}}part{{$partnumber}} active" lessonid="lesson{{$lessonnumber}}"></ul>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    @endif
                                                                                    @if(count($chapter->quizzes) > 0)
                                                                                        @php
                                                                                            $quiznumber = 0;
                                                                                        @endphp
                                                                                        @foreach($chapter->quizzes as $quiz)  
                                                                                            @php
                                                                                                $quiznumber+=1;;
                                                                                            @endphp
                                                                                            <li class="liheirarchy" contenttype="quiz"  classification="old" bookquizid="{{$quiz->id}}" chapterid="{{$chapternumber}}"  partid="{{$partnumber}}">
                                                                                                <span class="box boxquiz{{$quiznumber}}" quizid="quiz{{$quiznumber}}">{{$quiz->title}} 
                                                                                                    {{-- <i class="fa fa-times ml-4 removeitem" quizid="{{$quiznumber}}" contentid="contentquiz{{$quiznumber}}" label="{{$quiz->title}}"></i> --}}
                                                                                                </span>
                                                                                                <ul class="nested quiz{{$quiznumber}} active" quizid="quiz{{$quiznumber}}"></ul>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </li>  
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                    {{-- <li>
                                                        <span class="box">Beverages</span>
                                                      <ul class="nested">
                                                        <li>Water</li>
                                                        <li>Coffee</li>
                                                        <li><span class="box">Tea</span>
                                                          <ul class="nested">
                                                            <li>Black Tea</li>
                                                            <li>White Tea</li>
                                                            <li><span class="box">Green Tea</span>
                                                              <ul class="nested">
                                                                <li>Sencha</li>
                                                                <li>Gyokuro</li>
                                                                <li>Matcha</li>
                                                                <li>Pi Lo Chun</li>
                                                              </ul>
                                                            </li>
                                                          </ul>
                                                        </li>  
                                                      </ul>
                                                    </li> --}}
                                                </ul>
                                                {{-- <button type="button" class="btn btn-sm btn-block btn-warning heirarchyupdate" disabled>Update</button> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="btn-group-horizontal float-right">
                                                        <form action="/adminlessoncontents" method="get" name="viewlesson" target="_blank" hidden>
                                                            <input type="hidden" name="formlessonid"/>
                                                        </form>
                                                        <form action="/admincreatechaptertest" method="get" name="createchaptertest" target="_blank" hidden>
                                                            <input type="hidden" name="formchapterid"/>
                                                            <input type="hidden" name="formquiztype"/>
                                                        </form>
                                                        <form action="/adminviewchaptertest/view" method="get" name="viewchaptertest" target="_blank" hidden>
                                                            <input type="hidden" name="formchapterid"/>
                                                            <input type="hidden" name="formquizid"/>
                                                        </form>
                                                        {{-- <button type="button" class="btn btn-sm btn-info add" addtype="part" uk-tooltip="title: View Lesson; pos: bottom" bookid="{{$book->bookid}}" >
                                                            <i class="fa fa-eye"></i> View
                                                        </button> --}}
                                                        
                                                        @if(count($book->chapters)==0)
                                                        <button type="button" class="btn btn-sm btn-info add" addtype="part" uk-tooltip="title: New Part; pos: bottom" bookid="{{$book->bookid}}" >
                                                            <i class="fa fa-plus"></i> Part
                                                        </button>
                                                        @endif
                                                        <button type="button" class="btn btn-sm btn-info add" addtype="chapter" uk-tooltip="title: New Chapter; pos: bottom" bookid="{{$book->bookid}}"  >
                                                            <i class="fa fa-plus"></i> Chapter / Unit
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-info add" addtype="lesson" uk-tooltip="title: New Lesson; pos: bottom" bookid="{{$book->bookid}}">
                                                            <i class="fa fa-plus"></i> Lesson
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-info" id="addchapterquiz" uk-tooltip="title: New Quiz; pos: bottom" bookid="{{$book->bookid}}">
                                                            <i class="fa fa-plus"></i> Quiz / Test
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="" method="get" class=" m-0 p-0" name="formsubmit">
                                                <div class="row formcontainer p-3" >
                                                        
                                                </div>
                                                <label>Description</label>
                                                {{-- <br/> --}}
                                                <textarea name="description" class="form-control"></textarea>
                                                <button type="button" class="btn btn-sm btn-warning float-right" id="actionbutton" action="save">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </li>
                    @php
                        $cardcount+=1;
                    @endphp
                @endforeach
            </ul>
        @endif --}}
        <div class="footer">
            @include('admin.inc.footer')
        </div>
    </div>
            
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#addchapterquiz').hide();
            $('.page-menu').addClass(' menu-large');
            $('form[name="formsubmit"]').hide()
            $('div[role="log"]').remove()
            $(document).on('click','.bookstatus', function(){
                var bookstatus = $(this).val();
                $.ajax({
                    url: '/adminviewbookupdatestatus',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        bookid      :   '{{$book->bookid}}',
                        bookstatus  :   bookstatus
                    }
                })
            })
            $(document).on('click','#buttonupdateinfo', function(){
                var updatebookinfoform ='<form action="/adminviewbookupdateinfo" method="post" id="bookinfoupdate"  enctype="multipart/form-data">'+
                                        '@csrf'+
                                        '<label class="text-left">Cover Photo</label>'+
                                        '<input type="file" name="editcoverphoto" class="form-control form-control-sm" accept="image/x-png,image/gif,image/jpeg" >'+
                                        '<br/>'+
                                        '<label class="text-left">Book title</label>'+
                                        '<input type="hidden" name="editbookid" value="{{$book->bookid}}" style="border: 1px solid #ddd;">'+
                                        '<input type="title" name="editbooktitle" value="{{$book->booktitle}}" style="border: 1px solid #ddd;">'+
                                        '<br/>'+
                                        '<label class="text-left">Book description</label>'+
                                        '<textarea name="editbookdescription"  style="border: 1px solid #ddd;">{{$book->bookdescription}}</textarea>'
                                        '</form>';
                Swal.fire({
                    title: 'Book Info',
                    html: updatebookinfoform,
                    customClass: 'swal-wide',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Update',
                    preConfirm: () => {
                        if($('input[name="editbooktitle"]').val().replace(/^\s+|\s+$/g, "").length == 0){
                            Swal.showValidationMessage(
                                "Book title is required!"
                            );
                        }
                    }
                }).then((confirm) => {
                    if (confirm.value) {
                        $('#bookinfoupdate').submit()
                    }
                })
            })
        })

        // function callTextAreaSummernote(){
            
        // }
            $(function(){
                $('textarea').summernote({
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                    ]
                })
            })
        var selectedPart;

        var countpartnumber = $('ul.heirarchytree').children('li').length;
        
        var selectedChapter;

        var countchapternumber = $('ul.nested.part'+selectedPart).children('li').length;
        
        var countlessonnumber = $('ul.nested.chapter'+selectedChapter+'part'+selectedPart).children('li.lesson').length;

        var countquiznumber = $('ul.nested.chapter'+selectedChapter+'part'+selectedPart).children('li.quiz').length;

        var clickedlessonid;

        $(document).on('click','.liheirarchy[contenttype=part]',function(){
                $('button.buttoninfo').remove()
                $('.btn-group-horizontal').prepend(
                    '<button type="button" class="btn btn-sm btn-info buttoninfo" id="getpartinfo"><i class="fa fa-question"></i> View Info</button>'
                )
                $('.liheirarchy[contenttype=part]').children('span').css('backgroundColor','white')
                $(this).children('span').css('backgroundColor','#b1e6bd')
                selectedPart = $(this).attr('id');
                countchapternumber = $('ul.nested.part'+selectedPart).children('li.chapter').length;
        })

        $(document).on('click','.liheirarchy[contenttype="chapter"]',function(){
                $('button.buttoninfo').remove()
                $('.btn-group-horizontal').prepend(
                    '<button type="button" class="btn btn-sm btn-info buttoninfo" id="getchapterinfo" cid="'+$(this).attr('bookchapterid')+'"><i class="fa fa-question"></i> View Info</button>'
                )
                $('.liheirarchy[contenttype="chapter"]').children('span').css('backgroundColor','white')
                $(this).children('span').css('backgroundColor','#b1e6bd')
                selectedPart = $(this).attr('partid');
                selectedChapter = $(this).attr('id');
                countlessonnumber = $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children('li.lesson').length;
                countquiznumber = $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children('li.quiz').length;
                $('input[name="formchapterid"]').val($(this).attr('bookchapterid'));
        })
        $(document).on('click','.liheirarchy[contenttype=lesson]',function(){
            // console.log('asds')
            $('input[name="formlessonid"]').val($(this).attr('booklessonid'));
            $('form[name="viewlesson"]').submit()

        })


        
        $(document).on('click','.add[addtype=part]', function(){
            $('form[name="formsubmit"]').show()
            countpartnumber+=1;
            $('.heirarchytree').append(
                '<li id="'+countpartnumber+'"  contenttype="part" classification="new" class="liheirarchy bg-warning text-white">'+
                    '<span class="box boxpart'+countpartnumber+'" contenttype="part">Part '+countpartnumber+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                    '<ul class="nested part'+countpartnumber+'  active"></ul>'
            )
            $('.formcontainer').empty()
            $('.formcontainer').append(
                '<label>Part '+countpartnumber+' Title</label>'+
                '<br/>'+
                '<input type="text" name="title" contenttype="part" class="form-control"/>'+
                '<br/>'
            );
            $('textarea[name="description"]').summernote('reset');
            $('#actionbutton').attr('disabled', false)

        })
        $(document).on('click','#getchapterinfo', function(){
            var id = $(this).attr('cid');
            $.ajax({
                url: '/adminviewbookchapterinfo',
                type: 'get',
                dataType: 'json',
                data: {
                    id          :   id
                },
                success: function(data){
                    Swal.fire({
                        html: '<label>Chapter title</label>'+
                                '<br/>'+
                                '<input type="text" value="'+data.title+'" id="editchaptertitle"/>'+
                                '<label>Chapter description</label>'+
                                '<textarea name="editdescription" id="editdescription" class="text-left">'+data.description+'</textarea>',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Update',
                        showCancelButton: true,
                        allowOutsideClick: false,
                        onOpen: function() {
                                $('#editdescription').summernote({
                                    toolbar: [
                                        ['style', ['bold', 'italic', 'underline', 'clear']],
                                        ['font', ['strikethrough', 'superscript', 'subscript']],
                                        ['fontsize', ['fontsize']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['height', ['height']]
                                    ]
                                })
                        },
                        preConfirm: () => {
                            if($("#editchaptertitle").val().replace(/^\s+|\s+$/g, "").length == 0){
                                Swal.showValidationMessage(
                                    "Chapter title cannot be empty !"
                                );
                            }
                        }
                    }).then((confirm) => {
                        $.ajax({
                            url: '/adminviewbookchapterinfoedit',
                            type: 'get',
                            dataType: 'json',
                            data: {
                                id                          :   id,
                                editchaptertitle            :   $('#editchaptertitle').val(),
                                editdescription             :     $('#editdescription').val()
                            },
                            success: function(data){
                                console.log(data)
                                $('.box[cid="'+data.id+'"]').text(data.editchaptertitle)
                            }
                            })
                    })
                }
            })
        })
        $(document).on('click','.add[addtype=chapter]', function(){
            $('form[name="formsubmit"]').show()
            if($('ul.heirarchytree').find('li[contenttype="part"]').length == 0)
            {
                var countchapternumber = $('ul.heirarchytree').children('li.chapter').length;
                countchapternumber+=1;
                $('ul.heirarchytree').append(
                    '<li id="'+countchapternumber+'"  contenttype="chapter" classification="new" class="liheirarchy chapter bg-warning text-white">'+
                        '<span class="box boxchapter'+countchapternumber+'" contenttype="chapter">Chapter '+countchapternumber+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                        '<ul class="nested lesson chapter'+countchapternumber+'part'+selectedPart+' active"></ul>'
                )
                $('.formcontainer').empty()
                $('.formcontainer').append(
                    '<label>Chapter '+countchapternumber+' Title</label>'+
                    '<br/>'+
                    '<input type="text" name="title" contenttype="chapter"  class="form-control"/>'+
                    '<br/>'
                );
                $('.add[addtype="part"]').remove()
            }else{
                var countchapternumber = $('ul.nested.part'+selectedPart).children('li.chapter').length;
                countchapternumber+=1;
                $('ul.nested.part'+selectedPart).append(
                    '<li id="'+countchapternumber+'"  contenttype="chapter" classification="new" class="liheirarchy chapter bg-warning text-white">'+
                        '<span class="box boxchapter'+countchapternumber+'" contenttype="chapter">Chapter '+countchapternumber+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                        '<ul class="nested lesson chapter'+countchapternumber+'part'+selectedPart+' active"></ul>'
                )
                $('.formcontainer').empty()
                $('.formcontainer').append(
                    '<label>Chapter '+countchapternumber+' Title</label>'+
                    '<br/>'+
                    '<input type="text" name="title" contenttype="chapter"  class="form-control"/>'+
                    '<br/>'
                );

            }
            $('textarea[name="description"]').summernote('reset');
            $('#actionbutton').attr('disabled', false)
            
        })
        $(document).on('click','.add[addtype=lesson]', function(){
            $('form[name="formsubmit"]').show()
            countlessonnumber+=1;
            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).append(
                '<li id="'+countlessonnumber+'"  contenttype="lesson" classification="new" class="liheirarchy lesson bg-warning text-white">'+
                    '<span class="box boxlesson'+countlessonnumber+'" contenttype="lesson">Lesson '+countlessonnumber+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                    '<ul class="nested lesson'+countlessonnumber+'chapter'+countchapternumber+'part'+selectedPart+' active"></ul>'
            )
            $('.formcontainer').empty()
            $('.formcontainer').append(
                '<label>Lesson '+countlessonnumber+' Title</label>'+
                '<br/>'+
                '<input type="text" name="title" contenttype="lesson"  class="form-control"/>'+
                '<br/>'
            );
            $('textarea[name="description"]').summernote('reset');
            $('#actionbutton').attr('disabled', false)
        })
        $(document).on('click','.add[addtype=quiz]', function(){
            $('form[name="formsubmit"]').show()
            countquiznumber+=1;
            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).append(
                '<li id="'+countquiznumber+'"  contenttype="quiz" classification="new" class="liheirarchy quiz">'+
                    '<span class="box boxquiz'+countquiznumber+'" contenttype="quiz">Quiz '+countquiznumber+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                    '<ul class="nested quiz'+countquiznumber+'chapter'+countchapternumber+'part'+selectedPart+' active"></ul>'
            )
            $('.formcontainer').empty()
            $('.formcontainer').append(
                '<label>Quiz '+countquiznumber+' Title</label>'+
                '<br/>'+
                '<input type="text" name="title" contenttype="quiz"  class="form-control"/>'+
                '<br/>'
            );
            $('textarea[name="description"]').summernote('reset');
            $('#actionbutton').attr('disabled', false)
        })

        $(document).on('click','.chapter',function(){
            $('#addchapterquiz').show();
        })
        $(document).on('click','#actionbutton', function(){
            var inputtype = $('form[name="formsubmit"]').children()[0].children[2].attributes[2].value;
            // console.log(inputtype)
            var parentid;
            if(inputtype == 'part'){
                parentid = parseInt('{{$book->bookid}}');
            }
            if(inputtype == 'chapter'){
                parentid = $('li#'+selectedPart+'.part').attr('bookpartid');
            // console.log(parentid)
            }
            if(inputtype == 'lesson'){
                parentid = $('li#'+selectedChapter+'.chapter[partid="'+selectedPart+'"]').attr('bookchapterid');
            }
            if(inputtype == 'quiz'){
                
            }
            var title = $('form[name="formsubmit"]').children()[0].children[2].value;
            var description = $('form[name="formsubmit"]').children()[2].value;

            if($(this).attr('action') == 'save'){
                $(this).attr('disabled',true);
                // $(this).text('Update');
                $.ajax({
                    url: '/create',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        contenttype :   inputtype,
                        title       :   title,
                        description :   description,
                        parentid    :   parentid,
                        bookid      :   parseInt('{{$book->bookid}}')
                    },
                    success: function(data){
                        if(inputtype == 'part'){
                            $('form[name=formsubmit]').append(
                                '<input type="hidden" name="partid" value="'+data[0].id+'"/>'
                            )
                            // <li id="2" contenttype="part" classification="old" bookpartid="2" class="liheirarchy">
                            $('li#'+countpartnumber+'[contenttype=part]').addClass('part')
                            $('li#'+countpartnumber+'[contenttype=part]').removeClass('bg-warning')
                            $('li#'+countpartnumber+'[contenttype=part]').removeClass('text-white')
                            $('li#'+countpartnumber+'[contenttype=part]').attr('classification','old')
                            $('li#'+countpartnumber+'[contenttype=part]').attr('bookpartid',data[0].id)
                            $('li#'+countpartnumber+'[contenttype=part]').children('span').text(data[0].title)
                            $('li#'+countpartnumber+'[contenttype=part]').children('span').append(
                                '<i class="fa fa-times ml-4 removeitem"></i>'
                            )
                        }
                        if(inputtype == 'chapter'){
                            $('form[name=formsubmit]').append(
                                '<input type="hidden" name="chapterid" value="'+data[0].id+'"/>'
                            )
                            if(data[0].partid == null)
                            {
                                selectedPart = 0;
                                var parentlist = $('ul.heirarchytree');
                            }else{
                                var parentlist = $('ul.nested.part'+selectedPart);
                            }
                            parentlist.children().addClass('chapter');
                            parentlist.children().removeClass('bg-warning');
                            parentlist.children().removeClass('text-white');
                            parentlist.children().last().attr('classification','old');
                            parentlist.children().last().attr('bookchapterid',data[0].id);
                            parentlist.children().last().attr('partid',selectedPart);
                            parentlist.children().last().children('span').text(data[0].title);
                            parentlist.children().last().children('span').append(
                                '<i class="fa fa-times ml-4 removeitem"></i>'
                            );
                            parentlist.children().last().children('ul').attr('chapterid','chapter'+countchapternumber)
                            parentlist.children().last().children('span').attr('chapterid','chapter'+countchapternumber)
                            parentlist.children().last().children('span').attr('cid',data[0].id)
                        }
                        if(inputtype == 'lesson'){
                            // console.log(data)
                            $('form[name=formsubmit]').append(
                                '<input type="hidden" name="lessonid" value="'+data[0].id+'"/>'
                            )
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().removeClass('bg-warning');
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().removeClass('text-white');
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().attr('classification','old');
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().attr('booklessonid',data[0].id);
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().attr('bookchapterid',data[0].chapterid);
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().attr('chapterid',selectedChapter);
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().children('span').text(data[0].title);
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().children('span').append(
                                '<i class="fa fa-times ml-4 removeitem"></i>'
                            );
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().children('ul').attr('lessonid','lesson'+countlessonnumber)
                            $('ul.nested.lesson.chapter'+selectedChapter+'part'+selectedPart).children().last().children('span').attr('lessonid','lesson'+countlessonnumber)
                            // console.log($('ul.nested.part'+selectedPart).children().last())
                        }
                        Swal.fire({
                            title: 'Added successfully!',
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Close',
                            allowOutsideClick: false
                        })

                    }
                })
            }else{
                $(this).attr('action','save');
                $(this).text('Save');
            }
        })
        $(document).on('click', '.removeitem', function(){
            var classification = $(this).closest('li').attr('classification');
            var removeelem = $(this).closest('li');
            if($(this).closest('li').find('ul').children().length == 0){
                Swal.fire({
                    title: 'Are you sure you want to delete selected content?',
                    text: $(this).attr('label'),
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Delete',
                    showCancelButton: true,
                    allowOutsideClick: false
                }).then((confirm) => {
                    if (confirm.value) {
                        if(classification == 'new'){
                            $(this).closest('li').remove()
                            $('#'+$(this).attr('contentid')).remove()
                            if($('.form').children().length == 0){
                                $('button[addtype=part]').prop('disabled', false);
                                $('button[addtype=lesson]').prop('disabled', true);
                                $('button[addtype=quiz]').prop('disabled', true);

                            }
                        }else if(classification == 'old'){
                            var deleteid;
                            if($(this).closest('li').attr('contenttype') == 'part'){
                                deleteid = $(this).closest('li').attr('bookpartid');
                            }else if($(this).closest('li').attr('contenttype') == 'chapter'){
                                deleteid = $(this).closest('li').attr('bookchapterid');
                            }else if($(this).closest('li').attr('contenttype') == 'lesson'){
                                deleteid = $(this).closest('li').attr('booklessonid');
                            }else if($(this).closest('li').attr('contenttype') == 'quiz'){
                                deleteid = $(this).closest('li').attr('bookquizid');
                            }
                            
                            $.ajax({
                                url: '/delete',
                                type: 'get',
                                dataType: 'json',
                                data: {
                                    contenttype :   $(this).closest('li').attr('contenttype'),
                                    id          :   deleteid,
                                    bookid      :   parseInt('{{$book->bookid}}')
                                },
                                complete: function(data){
                                    removeelem.remove()
                                    Swal.fire({
                                        title: 'Deleted successfully',
                                        type: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Close',
                                        allowOutsideClick: false
                                    })
                                }
                            })
                        }
                    }
                })
            }else{
                
                Swal.fire({
                    title: $(this).attr('label')+' is not empty!',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Close',
                    allowOutsideClick: false
                })
            }
            
            $('.swal2-textarea').remove()
            
        })

        $(document).on('click','#addchapterquiz', function(){
            Swal.fire({
                html:   '<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>'+
                            '<div>'+
                                '<a href="#" quiztype="customize" class="quiztypeselection">'+
                                    '<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border: 1px solid gray;">'+
                                        '<h3 class="uk-card-title">Customize</h3>'+
                                        '<p>Click here to create your own questionnaire!</p>'+
                                    '</div>'+
                                '</a>'+
                            '</div>'+
                            '<div>'+
                                '<a href="#" quiztype="upload" class="quiztypeselection">'+
                                    '<div class="uk-card uk-card-default uk-card-hover uk-card-body" style="border: 1px solid gray;">'+
                                        '<h3 class="uk-card-title">Upload</h3>'+
                                        '<p>Click here to upload your questionnaire!</p>'+
                                    '</div>'+
                                '</a>'+
                            '</div>'+
                        '</div>',
                text: $(this).attr('label'),
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Delete',
                showCloseButton: true,
                showConfirmButton: false,
                allowOutsideClick: false
            });


            // $('form[name="createchaptertest"]').submit()

        });
        $(document).on('click', '.quiztypeselection', function(){
            // console.log($(this).attr('quiztype'));
            $('input[name="formquiztype"]').val($(this).attr('quiztype'));
            $('form[name="createchaptertest"]').submit()
        })
        $(document).on('click','li[contenttype="quiz"]', function(){
            
            $('form[name="viewchaptertest"]').find('input[name="formchapterid"]').val($(this).closest('li[contenttype="chapter"]').attr('bookchapterid'));
            $('form[name="viewchaptertest"]').find('input[name="formquizid"]').val($(this).attr('bookquizid'));
            $('form[name="viewchaptertest"]').submit();
            

        });
                                                        
    </script>
@endsection