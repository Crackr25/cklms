@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li><a href="/teacherclassrooms?blade=blade"> Classrooms </a></li>
            <li>{{$classroominfo->classroomname}}</li>
        </ul>
    </nav>

@endsection

@section('content')

    <style>
        .btn-icon-only {
            line-height: 2.5rem !important;
        }
    </style>

<div id="modal-close-default" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <h2 class="uk-modal-title">Add Student</h2> 
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Student Name</label>
            <div class="uk-form-controls">
                <input class="uk-input" name="student" type="text" placeholder="Student Name" autocomplete="off">
            </div>
        </div>
        <div class="uk-margin" id="student_list_holder">
        </div>
    </div> 
</div>


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

<div id="modal-student-info" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <h2 class="uk-modal-title">Student Info</h2> 
       
        <div class="uk-margin">
            <a href="#" type="button" class="btn btn-danger uk-first-column remove_student">
                <i class="icon-feather-trash mr-2"></i>Remove Student
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
                    <h1> {{$classroominfo->classroomname}}</h1>
                  

                    <div class="course-details-info">

                        <ul>
                            <li> Created by <a href="#"> {{auth()->user()->name}}</a> </li>
                            <li> Created last {{\Carbon\Carbon::create($classroominfo->createddatetime)->isoFormat('MM/DD/YYYY')}}</li>
                        </ul>
                         {{--<button type="button" class="btn btn-twitter btn-icon-label mt-2 call" id="{{$classroominfo->id}}">
                            <span class="btn-inner--icon">
                                <i class="icon-feather-video"></i>
                            </span>
                            <span class="btn-inner--text">Start a call</span>
                          </button> 
                        <button type="button" class="btn btn-sm btn-light active"> </button> --}}

                    </div>
                </div>
                <nav class="responsive-tab style-5">
                    <ul uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li class="uk-active"><a href="#" aria-expanded="true" id="feetab">Feed</a></li>
                        <li class=""><a href="#" aria-expanded="false" id="studenttab">Students</a></li>
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

                <li class="course-description-content uk-active  " style="" 
                id="feed_holder"
                >


             
                </li>
                <li class="" style="" id="studens_holder"></li>
                <li class="" style="" id="books_holder"></li>

                <!-- course Announcement-->
                <li class="" style="">
                    <h4> Announcement </h4>

                    <div class="user-details-card">
                        <div class="user-details-card-avatar">
                            <img src="http://ck_lms.ck/templatefiles/avatar-2.jpg" alt="">
                        </div>
                        <div class="user-details-card-name">
                            Stella Johnson <span> Instructor <span> 1 year ago </span> </span>
                        </div>
                    </div>



                    <article class="uk-article">

                        <p class="lead"> Nam liber tempor cum soluta nobis eleifend option
                            congue  imperdiet doming id quod mazim placerat facer possim assum.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                            aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                            nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia
                            deserunt mollit anim id est laborum.</p>

                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                            nibh
                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                            enim ad
                            minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                            ut
                            aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend
                            option congue nihil imperdiet doming id quod mazim placerat facer possim
                            assum.
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                            nibh
                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                            enim ad
                            minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                            ut
                            aliquip ex ea commodo consequat.</p>


                    </article>
                </li>

                <!-- course Reviews-->
                <li class="" style="">

                    <div class="review-summary">
                        <h4 class="review-summary-title"> Student feedback </h4>
                        <div class="review-summary-container">
                            <div class="review-summary-avg">
                                <div class="avg-number">
                                    4.8
                                </div>
                                <div class="review-star">
                                    <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star half"></span></div>
                                </div>
                                <span>Course Rating</span>
                            </div>


                            <div class="review-summary-rating">
                                <div class="review-summary-rating-wrap">
                                    <div class="review-bars">
                                        <div class="full_bar">
                                            <div class="bar_filler" style="width:95%"></div>
                                        </div>
                                    </div>
                                    <div class="review-stars">
                                        <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                    </div>
                                    <div class="review-avgs">
                                        95 %
                                    </div>
                                </div>
                                <div class="review-summary-rating-wrap">
                                    <div class="review-bars">
                                        <div class="full_bar">
                                            <div class="bar_filler" style="width:80%"></div>
                                        </div>
                                    </div>
                                    <div class="review-stars">
                                        <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span>
                                        </div>
                                    </div>
                                    <div class="review-avgs">
                                        80 %
                                    </div>
                                </div>
                                <div class="review-summary-rating-wrap">
                                    <div class="review-bars">
                                        <div class="full_bar">
                                            <div class="bar_filler" style="width:60%"></div>
                                        </div>
                                    </div>
                                    <div class="review-stars">
                                        <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span>
                                        </div>
                                    </div>
                                    <div class="review-avgs">
                                        60 %
                                    </div>
                                </div>
                                <div class="review-summary-rating-wrap">
                                    <div class="review-bars">
                                        <div class="full_bar">
                                            <div class="bar_filler" style="width:45%"></div>
                                        </div>
                                    </div>
                                    <div class="review-stars">
                                        <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span><span class="star empty"></span>
                                        </div>
                                    </div>
                                    <div class="review-avgs">
                                        45 %
                                    </div>
                                </div>
                                <div class="review-summary-rating-wrap">
                                    <div class="review-bars">
                                        <div class="full_bar">
                                            <div class="bar_filler" style="width:25%"></div>
                                        </div>
                                    </div>
                                    <div class="review-stars">
                                        <div class="star-rating"><span class="star"></span><span class="star empty"></span><span class="star empty"></span><span class="star empty"></span><span class="star empty"></span>
                                        </div>
                                    </div>
                                    <div class="review-avgs">
                                        25 %
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                    <div class="comments">
                        <h4>Reviews <span class="comments-amount"> (4610) </span> </h4>

                        <ul>
                            <li>
                                <div class="comments-avatar"><img src="http://ck_lms.ck/templatefiles/avatar-2.jpg" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by">Stella Johnson<span>Student</span>
                                        <div class="comment-stars">
                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                        diam
                                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                        erat
                                        volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                        tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                        consequat.
                                    </p>
                                    <div class="comment-footer">
                                        <span> Was this review helpful? </span>
                                        <button> Yes </button>
                                        <button> No </button>
                                        <a href="#"> Report</a>
                                    </div>
                                </div>

                            </li>

                            <li>
                                <div class="comments-avatar"><img src="http://ck_lms.ck/templatefiles/avatar-3.jpg" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by"> Adrian Mohani <span>Instructor </span>
                                        <div class="comment-stars">
                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star half"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                        ullamcorper
                                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam
                                        liber
                                        tempor cum soluta nobis eleifend
                                    </p>
                                    <div class="comment-footer">
                                        <span> Was this review helpful? </span>
                                        <button> Yes </button>
                                        <button> No </button>
                                        <a href="#"> Report</a>
                                    </div>
                                </div>

                            </li>

                            <li>
                                <div class="comments-avatar"><img src="http://ck_lms.ck/templatefiles/avatar-3.jpg" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by"> Adrian Mohani <span>Student</span>
                                        <div class="comment-stars">
                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                        </div>
                                    </div>
                                    <p> Nam liber tempor cum soluta nobis eleifend option congue nihil
                                        imperdiet doming id quod mazim placerat facer possim assum.
                                        Lorem
                                        ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                        nonummy
                                        nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat.
                                    </p>
                                    <div class="comment-footer">
                                        <span> Was this review helpful? </span>
                                        <button> Yes </button>
                                        <button> No </button>
                                        <a href="#"> Report</a>
                                    </div>
                                </div>

                            </li>

                            <li>
                                <div class="comments-avatar"><img src="http://ck_lms.ck/templatefiles/avatar-2.jpg" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by">Stella Johnson<span>Student</span>
                                        <div class="comment-stars">
                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                        diam
                                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                        erat
                                        volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                        tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                        consequat.
                                    </p>
                                    <div class="comment-footer">
                                        <span> Was this review helpful? </span>
                                        <button> Yes </button>
                                        <button> No </button>
                                        <a href="#"> Report</a>
                                    </div>
                                </div>

                            </li>

                        </ul>

                    </div>

                    <div class="comments">
                        <h3>Submit Review </h3>
                        <ul>
                            <li>
                                <div class="comments-avatar"><img src="http://ck_lms.ck/templatefiles/avatar-2.jpg" alt="">
                                </div>
                                <div class="comment-content">
                                    <form class="uk-grid-small uk-grid" uk-grid="">
                                        <div class="uk-width-1-2@s uk-first-column">
                                            <label class="uk-form-label">Name</label>
                                            <input class="uk-input" type="text" placeholder="Name">
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <label class="uk-form-label">Email</label>
                                            <input class="uk-input" type="text" placeholder="Email">
                                        </div>
                                        <div class="uk-width-1-1@s uk-grid-margin uk-first-column">
                                            <label class="uk-form-label">Comment</label>
                                            <textarea class="uk-textarea" placeholder="Enter Your Comments her..." style=" height:160px"></textarea>
                                        </div>
                                        <div class="uk-grid-margin uk-first-column">
                                            <input type="submit" value="submit" class="btn btn-default">
                                        </div>
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </div>

                </li>

            </ul>
        </div>

    

    </div>

  



</div>


    
   

  


@endsection

@section('footerscript')

    <script>
        $(document).ready(function(){
            

            loadfeed()

            function loadfeed(){

                $.ajax({
                    url: '/classroomfeed?classroomview='+'{{$classroominfo->id}}',
                    type:"GET",
                    success: function(data){

                        $('#feed_holder').empty()
                        $('#feed_holder').append(data)
                
                    }
                })

            }

            setInterval(loadfeed(), 500);

           


            

            $(document).on('click','#submitform', function(){

                $('input[name=classroomid]').val('{{$classroominfo->id}}')

                if($('#postcontent').val().replace(/^\s+|\s+$/g, "").length == 0){
                    if(addattachment == null){
                        $('#postcontent').attr('required',true)
                    }
                    else{
                        $('#postcontent').removeAttr('required')
                        $(this).closest('form').submit();
                    }
                }else{
                    
                    $('#postcontent').removeAttr('required')
                        $(this).closest('form').submit();
                }

            })


            $(document).on('click','.removepost', function(){

                var postid = $(this).attr('data-id');

                $.ajax({
                    url: '/post?remove=remove&postid='+postid,
                    type:"GET",
                    success: function(data){

                        UIkit.notification("<span uk-icon='icon: check'></span> Post Removed Successfully", {status:'success', timeout: 1000 }); 

                        loadfeed()
                
                    }
                })

            })


            $(document).on('click','.editpost', function(){

                $('textarea[data-holder="edit_post_textarea"][data-id="'+$(this).attr('data-id')+'"]').removeAttr('readonly')
                $('div[data-holder="edit_buttons_holder"][data-id="'+$(this).attr('data-id')+'"]').removeAttr('hidden')
                $('button[data-holder="cancel_post_button"][data-id="'+$(this).attr('data-id')+'"]').removeAttr('hidden')

            })

            $(document).on('click','button[data-holder="cancel_post_button"]',function(){

                $('textarea[data-holder="edit_post_textarea"][data-id="'+$(this).attr('data-id')+'"]').attr('readonly','readonly')
                $('div[data-holder="edit_buttons_holder"][data-id="'+$(this).attr('data-id')+'"]').attr('hidden','hidden')

            })
            
            $(document).on('click','button[data-holder="edit_post_button"]', function(){

                var postid = $(this).attr('data-id');
                
                $.ajax({
                    url: '/post?update=update&postid='+postid+'&content='+ $('textarea[data-holder="edit_post_textarea"][data-id="'+$(this).attr('data-id')+'"]').val(),
                    type:"GET",
                    success: function(data){

                        UIkit.notification("<span uk-icon='icon: check'></span> Post Update Successfully", {status:'success', timeout: 1000 }); 

                        $('textarea[data-holder="edit_post_textarea"][data-id="'+postid+'"]').attr('readonly','readonly')
                        $('div[data-holder="edit_buttons_holder"][data-id="'+postid+'"]').attr('hidden','hidden')

                    }
                })

            })

            

            $(document).on('click','.commentbutton', function(){

                    var postid = $(this).attr('data-id');
                    var commentcontent = $('input[data-id='+postid+']').val();


                    console.log(postid)
                    console.log(commentcontent)

                    
                    $.ajax({
                        url: '/teacherpostcomment',
                        type:"GET",
                        dataType:"json",
                        data:{
                            postid          :  postid,
                            commentcontent  :   commentcontent
                        },
                        success: function(data){

                            UIkit.notification("<span uk-icon='icon: check'></span> Created Successfully", {status:'success', timeout: 1000 }); 
                            console.log(data)

                            $('input[data-id='+postid+']').val('')
                            loadfeed()
                            // var poststring = '<div class="row">'+
                            //                     '<div class="col-1 col-md-1 col-lg-1 pr-0 text-center">'+
                            //                         '<img src="http://ck_lms.ck/avatar/teacher-male.png" onerror="this.onerror = null, this.src="http://ck_lms.ck/avatar/teacher-male.png" alt="" class="skill-card-icon" style="width: 30px;">'+
                            //                     '</div>'+
                            //                     '<div class="col-11 col-md-11 col-lg-11 pl-0">'+
                            //                         data[1].content+' - <small class="text-muted">'+data[1].createddatetime+'</small>'+
                            //                     '</div>'+
                            //                     '<hr>'+
                            //                 '</div>'

                            $('.commentscontainerautodisplay[postid='+postid+']').append(poststring)
                        }
                    })
                
            })


        })


    </script>

    <!-- student tab script -->
    <script>
        $(document).ready(function(){

            var selectedStudent;
            var selectStudentRoomId;

            function loadclassroomstudents(){

                $.ajax({
                    url: '/classroomstudents?student=student&classroomid='+'{{$classroominfo->id}}',
                    type:"GET",
                    success: function(data){

                        $('#studens_holder').empty()
                        $('#studens_holder').append(data)

                    }
                })

                }

            $(document).on('click','#studenttab',function(){

                loadclassroomstudents()

            })
            
            $(document).on('click','.add_student',function(e){
                  
                  $.ajax({
                        url: '/teacheraddstudent?studid='+$(this).attr('data-id')+'&classroomid='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){

                            loadclassroomstudents()

                            loadStudentList()

                            UIkit.notification("<span uk-icon='icon: check'></span> Student Added Successfully", {status:'success', timeout: 1000 }); 
                    
                        }
                  })

            
            })

            $(document).on('click','.remove_student',function(e){
                  $.ajax({
                        url: '/classroomstudents?remove=remove'+'&studentroomid='+selectStudentRoomId,
                        type:"GET",
                        success: function(data){
                         
                            UIkit.notification("<span uk-icon='icon: check'></span> Student Removed Successfully", {status:'success', timeout: 1000 }); 
                            loadclassroomstudents()
                            loadStudentList()
                      
                        }
                  })
            })
            

            $(document).on('click','.skill-card',function(){
                selectStudentRoomId = $(this).attr('data-classid')
            })


            $(document).on('input','input[name="student"]',function(e){
                loadStudentList()
            })

            function loadStudentList(){

                var searchVal = $('input[name="student"]').val();
         
                $.ajax({
                        url: '/students?list=list&search='+searchVal+'&classroomid='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){
                            $('#student_list_holder').empty()
                            $('#student_list_holder').append(data)
                        }
                })

            }
        })

        
    </script>

    <!-- student tab script -->
    <script>

        $(document).ready(function(){

            var selectedBook;

            function loadbooks(){

                var searchVal = $('input[name="student"]').val();
                console.log
                $.ajax({
                        url: '/classroombooks?table=table&classroomid='+'{{$classroominfo->id}}',
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
                        url: '/allbooks?list=list&search='+searchVal+'&classroomid='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){
                            $('#book_list_Holder').empty()
                            $('#book_list_Holder').append(data)
                        }
                })

            }

           



            $(document).on('click','#booksholdertab',function(){

                loadbooks()
                loadBookList()

            })

            $(document).on('input','input[name="booktitle"]',function(){

                loadBookList()

            })

            $(document).on('click','.add_book',function(){

                $.ajax({
                        url: '/teacheraddthisbook?classroomid='+'{{$classroominfo->id}}'+'&bookid='+$(this).attr('data-id'),
                        type:"GET",
                        success: function(data){

                            if(data == 1){

                                UIkit.notification("Added Successfully", {status:'success', timeout: 1000 }); 
                                loadBookList()
                                loadbooks()
                                

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
                
            })


            $(document).on('click','.remove_book',function(){

                $.ajax({
                        url: '/classroombooks?remove=remove&classroombookid='+selectedBook,
                        type:"GET",
                        success: function(data){

                            UIkit.notification("Removed Successfully", {status:'success', timeout: 1000 }); 
                                loadBookList()
                            loadbooks()

                        }
                })

            })

            
            
        })

        
    </script>
    <script>
        
        $(document).on('click', '.call',function(){
            var clasroomid = $(this).attr('id');
            window.open('/videoconference/start?classroomid='+clasroomid,'newwindow','width=700,height=700,top=0, left=960');
        })
    </script>

@endsection