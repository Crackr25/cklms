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
            <a href="#" target="_blank" type="button" class="btn btn-info mt-2 uk-first-column" id="modal_view_book_button">
                <i class="icon-feather-book-open mr-2h mr-2"></i>View Book
            </a>
            <a href="#" type="button" class="btn btn-info uk-first-column mt-2" id="modal_view_quiz_button">
                <i class="icon-feather-book-open mr-2h mr-2"></i>Quiz Summarry
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
                        <li class=""><a href="#" aria-expanded="false" id="quiztab">Quiz</a></li>
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
                <li class="" style="" id="quiz_holder"></li>
            </ul>
        </div>
    </div>
</div>

{{-- <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg " style="background-color:aliceblue;" data-backdrop="static">
        <div class="modal-header">
            <h2 class="modal-title">{{ auth()->user()->name }}</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <h5 class="grades">2323</h5>
                <h5 class="percentage">2323</h5>
                <table class="table" id= "quizmodal" style=" width: 100%">
                    <thead>
                        <tr>
                            <th>Quiz Title</th>
                            <th>Date &amp; Time Submitted</th>
                            <th>No. of Attempts</th>
                            <th>Score</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary"  data-dismiss="modal">Close</button>
        </div>
    </div>
</div> --}}


    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 90%; width:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ auth()->user()->name }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        
                    <h5 class="grades">2323</h5>
                    <h5 class="percentage">2323</h5>
                    <h3> Quiz Summarry </h5>

                    <table class="table" id= "quizmodal" style=" width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Quiz Title</th>
                                <th class="text-center align-middle">Date &amp; Time Submitted</th>
                                <th class="text-center align-middle">No. of Attempts</th>
                                <th class="text-center align-middle">Score</th>
                                <th class="text-center align-middle" >Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary"  data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>










@endsection

@section('footerscript')



        <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

        <!-- Bootstrap JavaScript -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
       

        
        <script>

            var quiztable;

            $(document).ready(function(){


                $(document).on('click','.book_info',function(){

                    selectedBook = $(this).attr('data-id');

                    $('#modal_book_added').text($(this).attr('data-added'))
                    $('#modal_book_title').text($(this).attr('data-title'))
                    $('#modal_book_cover').attr('src',$(this).attr('data-cover'))
                    $('#modal_view_book_button').attr('href','/viewbook/'+$(this).attr('view-book-id'))
                    $('#modal_view_quiz_button').attr('data-id', $(this).attr('view-book-id'));


                })

                

                $(document).on('click','#modal_view_quiz_button',function(){

                    var selectedBook = $(this).attr('data-id');

                    console.log(selectedBook);

    

                    var sum = 0;
                    getQuizResponses(selectedBook).then(function(data) {
                        console.log(data);

                        quiztable = data;
                        

                        let sum = 0; // Variable to store the sum of scores
                        let maxpointstotal = 0; // Variable to store the sum of scores


                        const entriesHtml = data.map(entry => {
                            let options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                            let formattedDate = new Date(entry.date).toLocaleDateString('en-US', options);

                            if (entry.score) {
                                sum += entry.score; // Add the score to the sum
                                maxpointstotal += parseInt(entry.maxpoints);
                            }

                        });

                        
                        // Update the grades element with the sum of scores
                        $('.grades').text('Partial Total Score: '+ sum + '/' + maxpointstotal); // Replace `maxPoints` with the maximum points possible for the quiz
                        
                        //Calculate the tital percentage of grades
                        let average = Math.round((sum/maxpointstotal) * 100)

                        $('.percentage').text('Partial Average : '+ average  + '%'); 

                        renderQuizDataTable1();
                        $('#myModal').modal('show');
                    });



                    

                })



                function getQuizResponses(selectedBook) {
                    return $.ajax({
                        type:'GET',
                        url: '/student/quizsummarry',
                        data:{
                            selectedBook: selectedBook,
                        }
                    })
                }

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


                function loadQuiz(){

                    $.ajax({
                        url: '/studentquiz?classroomview='+'{{$classroominfo->id}}',
                        type:"GET",
                        success: function(data){

                            $('#quiz_holder').empty()
                            $('#quiz_holder').append(data)
                    
                        }
                    })


                }


                function renderQuizDataTable1(){

                
                    $("#quizmodal").DataTable({
                        responsive: false,
                        autowidth: false,
                        destroy: true,
                        //scrollX: true,
                        data:quiztable,
                        searching: true,
                        order: [[0, 'asc']],
                        lengthChange: false,
                        ordering: false,
                        columns: [
                            { "data": null},
                            { "data": null},
                            { "data": null},
                            { "data": null},
                            { "data": null},
                        ],
                        columnDefs: [
                            {
                                'targets': 0,
                                'orderable': false, 
                                'createdCell':  function (td, cellData, rowData, row, col) {
                                        var text = '<a class="mb-0">'+rowData.title+'</a>'
                                        $(td)[0].innerHTML =  text
                                        $(td).addClass('text-center')
                                        $(td).addClass('align-middle')
                                }
                            },
                        
                        
                            {
                                'targets': 1,
                                'orderable': false, 
                                'createdCell':  function (td, cellData, rowData, row, col) {
                                        let options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                                        let formattedDate = rowData.date ?  new Date(rowData.date).toLocaleDateString('en-US', options): '';
                                        var text = rowData.date ? '<a class="mb-0">'+formattedDate +'</a>' : '- - -';
                                        $(td)[0].innerHTML =  text
                                        $(td).addClass('text-center')
                                        $(td).addClass('align-middle')

                                }
                            },


                            {
                                'targets': 2,
                                'orderable': false, 
                                'createdCell':  function (td, cellData, rowData, row, col) {
                                        var text = rowData.attempt ? '<a class="mb-0">'+rowData.attempt+'</a>' : 'Not yet Taken';
                                        $(td)[0].innerHTML =  text
                                        $(td).addClass('text-center')
                                        $(td).addClass('align-middle')


                
                                    
                                }
                            },

        
                            {
                                'targets': 3,
                                'orderable': false, 
                                'createdCell':  function (td, cellData, rowData, row, col) {
                                    if(rowData.score != '' || rowData.score != null){
                                        var text = rowData.score ?  '<a class="mb-0">'+rowData.score+' / '+rowData.maxpoints+'</a>' : 'Not yet taken';
                                        $(td)[0].innerHTML =  text
                                        $(td).addClass('text-center')
                                        $(td).addClass('align-middle')


                                    }else{

                                        var text = '<a class="mb-0">Not yeat scored</a>'
                                        $(td)[0].innerHTML =  text
                                        $(td).addClass('text-center')
                                        $(td).addClass('align-middle')




                                    }
                                    
                                }
                            },
                            {
                                'targets': 4,
                                'orderable': false, 
                                'createdCell':  function (td, cellData, rowData, row, col) {
                                        var num = Math.round((rowData.score/rowData.maxpoints) * 100);
                                        var text = rowData.score ? '<a class="mb-0">'+num+' % </a>' : '-'
                                        $(td)[0].innerHTML =  text
                                        $(td).addClass('text-center')
                                        $(td).addClass('align-middle')

                                }
                            },
                        ]
                    });
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


                $(document).on('click','#quizheader', function(){
                    var id = $(this).data('id');

                    var classroomid = '{{$classroominfo->id}}';




                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: true
                    })
                    swalWithBootstrapButtons.fire({
                            title: 'Attempt Quiz',
                            type: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, Atempt now!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true
                    }).then((result) => {
                        if (result.value == true) {
                            window.open(`/student/attemptquiz/${id}/${classroomid}`, '_blank');
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
                $('#quiztab').on('click',function(){
                    loadQuiz()
                    
                })

            })
        </script>
{{-- 
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
   </script> --}}

@endsection