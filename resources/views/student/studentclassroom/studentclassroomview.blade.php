@extends('student.layouts.app')

@section('breadcrumbs')
<style>
    .push {
    height: 25px;
    }

    .jiggle {
    animation: jiggle 4s forwards ease-in-out;
    }

    @keyframes shrink {
    0% { }
    100% { transform: scale(.9); } 
    }
    
    @keyframes jiggle {
    0% { transform: scale(.9); }
    10% { transform: scale(1.1); }
    20% { transform: scale(.9); }
    30% { transform: scale(1.05); }
    40% { transform: scale(.95); }
    50% { transform: scale(1.025); }
    60% { transform: scale(.975); }
    70% { transform: scale(1.02); }
    80% { transform: scale(.985); }
    90% { transform: scale(1.01); }
    100% { transform: scale(1); }
    }

</style>
    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li>{{$classroominfo->classroomname}}</li>
        </ul>
    </nav>

@endsection

@section('content')

<div id="modal-book-info" uk-modal> 
    <div class="uk-modal-dialog uk-modal-body"> 
        <button class="uk-modal-close-default" type="button" uk-close></button> 
        <div class="uk-margin">
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
        </div>
    </div> 
</div>
<div class="course-details-wrapper topic-1 uk-light pt-5 bg-success">
    <div class="container p-sm-0">
        <div uk-grid="" class="uk-grid uk-grid-stack">
            <div class="uk-width-2-3@m uk-first-column">
                <div class="course-details">
                    <h1> {{$classroominfo->classroomname}}</h1>
                    <div class="course-details-info">
                        <ul>
                            <li> Created by <a href="#"> {{$teacherinfo->firstname.' '.$teacherinfo->lastname}}</a> </li>
                            <li> Created last {{\Carbon\Carbon::create($classroominfo->createddatetime)->isoFormat('MM/DD/YYYY')}}</li>
                        </ul>
                        
                       {{-- <button type="button" class="btn btn-icon-label mt-2 call button-2" id="{{$classroominfo->id}}" disabled="disabled">
                            <span class="btn-inner--icon">
                                <i class="icon-feather-video"></i>
                            </span>
                            <span class="btn-inner--text" id="buttontext">Teacher is not yet calling</span>
                          </button>--}}
                    </div>
                </div>
                <nav class="responsive-tab style-5">
                    <ul uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li class="uk-active"><a href="#" aria-expanded="true" id="feetab">Feed</a></li>
                        <li class=""><a href="#" aria-expanded="false" id="booksholdertab">Books</a></li>
                        <li class=""><a href="#" aria-expanded="false" id="studenttab">Classmates</a></li>
                    </ul>
                </nav>

            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="uk-grid-large mt-4 uk-grid" uk-grid="">
        <div class="uk-width-expand@m uk-first-column">
            <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">
                <li class="course-description-content uk-active  " style="" id="feed_holder"></li>
                <li class="" style="" id="books_holder"></li>
                <li class="" style="" id="studens_holder"></li>
            </ul>
        </div>
    </div>
</div>


    
   

  


@endsection

@section('footerscript')

        <script>
              $(document).ready(function(){


                $(document).on('click','.book_info',function(){

                    selectedBook = $(this).attr('data-id');

                    $('#modal_book_added').text($(this).attr('data-added'))
                    $('#modal_book_title').text($(this).attr('data-title'))
                    $('#modal_book_cover').attr('src',$(this).attr('data-cover'))
                    $('#modal_view_book_button').attr('href','/viewbook/'+$(this).attr('view-book-id'))

                })

                function loadfeed(){

                    $.ajax({
                        url: '/studentfeed?classroomview='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){

                            $('#feed_holder').empty()
                            $('#feed_holder').append(data)
                    
                        }
                    })

                }

                function loadclassmates(){

                    $.ajax({
                        url: '/studentclassmates?classroomview='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){

                            $('#studens_holder').empty()
                            $('#studens_holder').append(data)
                    
                        }
                    })


                }


                function loadBooks(){

                    $.ajax({
                        url: '/studentbooks?classroomview='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){

                            $('#books_holder').empty()
                            $('#books_holder').append(data)
                    
                        }
                    })

                }

                
                $(document).on('click','.commentbutton', function(){

                    var postid = $(this).attr('data-id');
                    var commentcontent = $('input[data-id='+postid+']').val();


                    console.log(postid)
                    console.log(commentcontent)


                    $.ajax({
                        url: '/studentpostcomment',
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

                            var poststring = '<div class="row">'+
                                                '<div class="col-1 col-md-1 col-lg-1 pr-0 text-center">'+
                                                    '<img src="http://ck_lms.ck/avatar/teacher-male.png" onerror="this.onerror = null, this.src="http://ck_lms.ck/avatar/teacher-male.png" alt="" class="skill-card-icon" style="width: 30px;">'+
                                                '</div>'+
                                                '<div class="col-11 col-md-11 col-lg-11 pl-0">'+
                                                    data[1].content+' - <small class="text-muted">'+data[1].createddatetime+'</small>'+
                                                '</div>'+
                                                '<hr>'+
                                            '</div>'

                            $('.commentscontainerautodisplay[postid='+postid+']').append(poststring)
                        }
                    })

                })


                loadfeed()

                // setInterval(loadfeed, 5000);

                $('#studenttab').on('click',function(){
                    loadclassmates()
                })
                $('#booksholdertab').on('click',function(){
                    loadBooks()
                })

              })
        </script>

   <script>
       
       $(document).ready(function() {
           
            // $('.button-2').mousedown(function() {
            //     $(this).removeClass('jiggle').addClass('shrink')
            // })
            // $('.button-2').mouseup(function() {
            //     $(this).removeClass('shrink').addClass('jiggle')
            // })
            setInterval(function(){ 
                $('.button-2').removeClass('jiggle').addClass('shrink')
                $.ajax({
                    url: '/videoconference/checkifcallisrunning',
                    type:"GET",
                    dataType:"json",
                    data:{
                        classroomid    :  '{{$classroominfo->id}}'
                    },
                    success: function(data){
                        console.log(data)
                        if(data == 1)
                        {
                            $('#buttontext').text('Join call')
                            $('.button-2').removeAttr('disabled')
                            $('.button-2').removeClass('shrink').addClass('jiggle')
                        }else{
                            $('.button-2').removeClass('jiggle')
                            $('#buttontext').text('Teacher is not yet calling')
                            $('.button-2').attr('disabled', true)
                        }
                    }
                })
            }, 5000);
            $(document).on('click', '.button-2',function(){
                var clasroomid = '{{$classroominfo->id}}';
                window.open('/videoconference/join?classroomid='+clasroomid,'newwindow','width=700,height=700,top=0, left=960');
            })
        
        })
   </script>

@endsection