@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li><a href="/teacherclassrooms?blade=blade"> Classrooms </a></li>
            <li><a href="/teacherclassroomview?classroomview={{$classroominfo->id}}"> {{$classroominfo->classroomname}} </a></li>
            <li>Group</li>
        </ul>
    </nav>


    

@endsection

@section('content')


<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">

    <style>
        .btn-icon-only {
            line-height: 2.5rem !important;
        }
    </style>






<div id="modal-book-list" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <h2 class="uk-modal-title">Add Book</h2> 
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Book Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="booktitle" type="text" placeholder="Book Title" autocomplete="off">
            </div>
        </div>
        <div class="uk-margin" id="book_list_Holder">
        </div>
    </div> 
</div>

<div id="modal-student-list" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <h2 class="uk-modal-title">Add Members</h2> 
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Student Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="studentname" type="text" placeholder="Student Name" autocomplete="off">
            </div>
        </div>
        <div class="uk-margin" id="student_list_Holder">
        </div>
    </div> 
</div>


<div id="modal-student-info" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <h2 class="uk-modal-title">Member Info</h2> 
        <div class="uk-margin">
            <a href="#" type="button" class="btn btn-danger uk-first-column remove_student">
                <i class="icon-feather-trash mr-2"></i>Remove member
            </a>
            <a href="#" type="button" class="btn btn-info uk-first-column assign_leader">
                <i class="fas fa-crown mr-2" style="color: #ffffff;"></i></i>Assign as leader
            </a>
        </div>
    </div> 
</div>

<div id="modal-book-info" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        {{-- <h2 class="uk-modal-title" id="modal_book_title"></h2>  --}}
        <div class="uk-margin">
            {{-- <div class="uk-child-width-expand@s uk-text-center uk-grid" uk-grid="">
                <div class="uk-first-column">
                    <div uk-lightbox="">
                        <img  id="modal_book_cover" alt="">
                    </div>
                </div>
            </div> --}}

            <div class="uk-grid" uk-grid="">
                <div class="uk-width-1-3@m">
                    <img  id="modal_book_cover" alt="">
                </div>
                <div class="uk-width-2-3@m">
                    <ul class="uk-list uk-list-divider text-small mt-lg-4">
                        <li>
                            <div class="uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m">
                                    Book Title:
                                </div>
                                <div class="uk-width-2-3@m">
                                    <span id="modal_book_title">
                                    </span>
                                </div>
                            <div>
                        </li>
                        <li>
                            <div class="uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m">
                                    Date Added:
                                </div>
                                <div class="uk-width-2-3@m">
                                    <span id="modal_book_added">
                                    </span>
                                </div>
                            <div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="uk-margin">
            <a href="#" target="_blank" type="button" class="btn btn-info uk-first-column" id="modal_view_book_button">
                <i class="icon-feather-book-open mr-2h mr-2"></i>View Book
            </a>
            <a href="#" target="_blank" type="button" class="btn btn-info uk-first-column" id="modal_view_quiz_button">
                <i class="icon-feather-book-open mr-2h mr-2"></i>View Book Quiz
            </a>
            <a href="#" type="button" class="btn btn-danger uk-first-column remove_book">
                <i class="icon-feather-trash mr-2"></i>Remove Book
            </a>
        </div>
    </div> 
</div>


    

<div class="course-details-wrapper topic-1 uk-light pt-5">

    <div class="container p-sm-0">

        <div uk-grid="" class="uk-grid uk-grid-stack">
            <div class="uk-width-2-3@m uk-first-column">

                <div class="course-details">
                    <h1> {{$groupinfo->name}}
                        
                        <span class="position-relative">
                            <i class="fas fa-pencil-alt ml-2"></i>
                            @if(empty($classroominfo->gradeid))
                                <span class="position-absolute top-0 end-0 translate-middle p-1 bg-danger rounded-circle"></span>
                            @endif
                        </span></h1>


                    <div class="course-details-info">

                        <ul style="display: block">
                            <li> Created by <a href="#"> {{auth()->user()->name}}</a> </li>
                            <li> Grade Level <a href="#">  {{$classroominfo->grade}}</a> </li>
                            <li> Created last {{\Carbon\Carbon::create($groupinfo->created_at)->isoFormat('MM/DD/YYYY')}}</li>
                        </ul>

                    </div>
                </div>
                <nav class="responsive-tab style-5">
                    <ul uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li class="uk-active"><a href="#" aria-expanded="true" id="memberstab">Members</a></li>
                        <li class=""><a href="#" aria-expanded="false" id="booksholdertab">Books</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>







<div class="container">

    <div class="uk-grid-large mt-4 uk-grid" uk-grid="">
        <div class="uk-width-expand@m uk-first-column">
            <ul id="course-intro-tab" class="uk-switcher mt-4 mb-4" style="touch-action: pan-y pinch-zoom;">

                <li class="course-description-content uk-active" id="members_holder">
                </li>
                <li class="" style="" id="books_holder"></li>

    
            </ul>
        </div>

    

    </div>





</div>


@endsection



@section('footerscript')


<script>

        var gradeid;
        $(document).ready(function(){
            

            loadgroup();
            loadstudentList();

            function loadgroup(){


                console.log('{{$groupinfo->id}}')

                $.ajax({
                    url: '/groupmembers',
                    data:{
                        groupid: '{{$groupinfo->id}}',
                        classroomid : '{{$classroominfo->id}}',

                    },
                    type:"GET",
                    success: function(data){
                        $('#members_holder').empty()
                        $('#members_holder').append(data)
                    }
                })

            }

            function loadstudentList(){

                var searchVal = $('input[name="studentname"]').val();

                $.ajax({
                        url: '/group/allstudent',
                        data:{
                            search: searchVal,
                            classroomid : '{{$classroominfo->id}}',
                            groupid: '{{$groupinfo->id}}'
                        },
                        type:"GET",
                        success: function(data){
                            $('#student_list_Holder').empty()
                            $('#student_list_Holder').append(data)
                        }
                })

            }

            $(document).on('click','.add_student',function(e){


                $.ajax({
                    url: '/teacheraddmember',
                    data:{
                            studid: $(this).attr('data-id'),
                            classroomid : '{{$classroominfo->id}}',
                            groupid: '{{$groupinfo->id}}'
                        },
                    type:"GET",
                    success: function(data){

                        loadgroup();
                        loadstudentList();

                        UIkit.notification("<span uk-icon='icon: check'></span> Student Added Successfully", {status:'success', timeout: 1000 }); 
                
                    }
                })

            
            })

            $(document).on('click','.assign_leader',function(e){

                var studentid = $(this).attr('data-id');

                $.ajax({
                    url: '/group/leader',
                    data:{
                            studid: studentid,
                            classroomid : '{{$classroominfo->id}}',
                            groupid: '{{$groupinfo->id}}'
                        },
                    type:"GET",
                    success: function(data){

                        loadgroup();
                        loadstudentList();

                        UIkit.notification("<span uk-icon='icon: check'></span> Student Assigned Successfully", {status:'success', timeout: 1000 }); 
                
                    }
                })

                


            
            })

            $(document).on('click','.membercard',function(e){

                var studentid = $(this).attr('data-id');

                console.log(studentid);
                $('.assign_leader').attr('data-id',studentid)


            
            })


        })


    </script>



    <script>

        var gradeid;
        $(document).ready(function(){
            

            loadgroupbooks();
            loadBookList();

            function loadgroupbooks(){


                console.log('{{$groupinfo->id}}')

                $.ajax({
                    url: '/groupbooks',
                    data:{
                        groupid: '{{$groupinfo->id}}'

                    },
                    type:"GET",
                    success: function(data){

                

                        $('#books_holder').empty()
                        $('#books_holder').append(data)
                
                
                    }
                })

            }

            

            function loadBookList(){

                var searchVal = $('input[name="booktitle"]').val();

                $.ajax({
                        url: '/groupbooks/allbooks',
                        data:{
                            search : searchVal,
                            classroomid : '{{$classroominfo->id}}',
                            groupid: '{{$groupinfo->id}}'

                        },
                        type:"GET",
                        success: function(data){
                            $('#book_list_Holder').empty()
                            $('#book_list_Holder').append(data)
                        }
                })

            }

            $(document).on('click','.add_book',function(){

                $.ajax({
                        url: '/teacheraddthisbookgroup',
                        data: {

                            classroomid: '{{$classroominfo->id}}',
                            bookid:  $(this).attr('data-id'),
                            groupid: '{{$groupinfo->id}}'


                        },
                        type:"GET",
                        success: function(data){

                            if(data == 1){

                                UIkit.notification("Added Successfully", {status:'success', timeout: 1000 }); 
                                loadBookList()
                                loadgroupbooks()
                                

                            }
                            else if(data == 0){

                                UIkit.notification("<span uk-icon='icon: check'></span> Book already exist", {status:'success', timeout: 1000 }); 

                            }

                        }
                })


            })


            $(document).on('click','.book_info',function(){

                selectedBook = $(this).attr('data-id');

                $('#modal_book_added').text($(this).attr('data-added'))
                $('#modal_book_title').text($(this).attr('data-title'))
                $('#modal_book_cover').attr('src',$(this).attr('data-cover'))
                $('#modal_view_book_button').attr('href','/viewbook/'+$(this).attr('view-book-id'))
                $('#modal_view_quiz_button').attr('href','/quiz/'+$(this).attr('view-book-id'))
                
            })

        })


    </script>





@endsection