<!DOCTYPE html>
<!-- saved from url=(0061)# -->
<html lang="en" class="">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic Page Needs
    ================================================== -->
    <title>CK-LMS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="description" content="Courseplus - Professional Learning Management HTML Template">-->


    <!-- CSS 
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('templatefiles/night-mode.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('templatefiles/framework.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<!-- summernote -->

<!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">

    <!-- Import SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- Import SweetAlert and Toast libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    
    <style>
        .gutter,
        .toolbar {
            display: none
        }

        .syntaxhighlighter {
            padding: 15px 20px;
        }

        .syntaxhighlighter {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding: 0 !important;
            padding-top: 18px !important;
        }
        .btn-vidlist-3{            
            display:none; 
        }
        @media screen and (max-width: 500px) {
            .btn-vidlist-3 { 
                display:block; 
                z-index: 999 !important;
            }
            .vidlist-3-container {
                z-index: 999 !important;
                height: 400px !important;
                overflow-y: auto !important;
            }
            #contentdesktopview {
                width: 95%;
                height: 32vh;
                background-color: transparent;
                z-index: 99;
                position: absolute;
                overflow: hidden;
            }


            .swal-wide{
            width:850px !important;
        }
        iframe {
            width: 100%;
            height: 100%;
        }
        .options {
            position: relative;
            z-index: 1;
        }
        .drop-option {
            position: relative;
            z-index: 0;
        }
        .instruction {
            font-weight:600;
            font-size:1.0pc;
        }
        .q-input {
            border:1px solid #b6b6b6 !important;
            border-radius:6px !important;
            width:200px !important;
        }
        .error-input {
            border-color: #dc3545 !important;
        }
        #scroll-to-bottom {
            position: fixed;
            bottom: 0px;
            right: 0px;
            padding: 9px 15px 9px 15px !important;
        }
        .list-group li {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        
        }
        
        div::-webkit-scrollbar-track, html::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        div::-webkit-scrollbar-track, html::-webkit-scrollbar
        {
            width: 6px;
            background-color: #F5F5F5;
        }

        div::-webkit-scrollbar-track, html::-webkit-scrollbar-thumb
        {
            background-color: gray;
        }
        .hourselect, .minuteselect, .ampmselect{
            margin: 0px;
            display: inline;
        }
        .uk-slideshow-items{
            min-height: 450px !important;
        }
        .chapterarticle, .containerlessonsview{
            display:none;
        }
        #contentdesktopview{
            width: 74%;
            height: 105vh;
            background-color: transparent;
            z-index: 99;
            position: absolute;
            overflow: hidden 
        }



    </style>

    <style>
            
        .part_li{
            white-space: normal;
            float: left;
            width: 100%;
            height: auto;
            word-wrap: break-word;
        }

        [class~=vidlist-3] li>a {
            white-space: normal;
        }

        iframe {
            overflow: hidden;
        }

        #lesson_content_holder{

            height: 100%;

            background-image: url('{{asset($bookinfo->picurl)}}');
            background-repeat: repeat-y;
            background-size:contain;
            background-position: center;
        
        }

        .simplebar-content:hover {
            overflow: auto !important;
        }


    </style>
</head>

<body style="">

    <div id="wrapper">
        @if(auth()->user()->type == 2)
            <div id="sched_modal" uk-modal> 
                <div class="uk-modal-dialog uk-modal-body"> 
                    <button class="uk-modal-close-default" type="button" uk-close></button> 
                    <div class="uk-margin">
                            <label for="">Date Start</label>
                            <input class="uk-input" type="date" placeholder="Input" id="date_start" name="date_start"> 
                    </div>
                    <div class="uk-margin">
                        <label for="">Date End</label>
                        <input class="uk-input" type="date" placeholder="Input" id="date_end" name="date_end"> 
                    </div>

                    <div class="uk-margin">
                            <label for="">Start time</label>
                            <input class="uk-input" type="time" placeholder="Input" id="time_start" name="time_start"> 
                    </div>
                    <div class="uk-margin">
                            <label for="">End time</label>
                            <input class="uk-input" type="time" placeholder="Input" id="time_end" name="time_end"> 
                    </div>
                    <div class="uk-margin">Number of attempts</label>
                        <input class="uk-input" type="text" placeholder="Input" id="nubmer_of_attempts" name="nubmer_of_attempts" placeholder="Number of attempts"> 
                    </div>
                    <div class="uk-margin">
                        <button type="button" class="btn btn-success" id="submit_classsched">
                            Create Quiz Schedule
                        </button>
                    </div>
                </div> 
            </div>
        @endif

        {{-- <div class="page-content"> --}}
            <div class="uk-grid-collapse uk-grid" uk-grid="">
                <div class="uk-width-3-4@m bg-white uk-first-column" id="lesson_content_holder">
                        {{-- <img src="{{asset($bookinfo->picurl)}}" alt="" > --}}
                </div>

                <div id="contentdesktopview">
                    &nbsp;
                </div>
                
                <div class="uk-width-1-4@m vidlist-3-container">
                    <div uk-sticky="" class="uk-sticky uk-sticky-fixed" style="position: fixed; top: 0px; width: 298px;">
                        <h5 class="bg-gradient-grey text-white py-4 p-3 mb-0"> {{$bookinfo->title}}</h5>
                        <ul class="uk-child-width-expand mb-0 uk-tab" uk-switcher="animation: uk-animation-slide-right-small, uk-animation-slide-left-small" uk-tab="">
                            <li class="uk-active"><a href="#" aria-expanded="true"> Contents</a></li>
                            {{-- <li><a href="#" aria-expanded="false"> Details</a></li> --}}
                        </ul>
                        <ul class="uk-switcher" style="touch-action: pan-y pinch-zoom;">
                            <li class="uk-active" style="">
                                <div class="vidlist-3-content" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content  p-2" style="padding: 0px; height: auto; overflow: hidden;" id="book_part_holder">
                                                    {{-- <img src="{{asset($bookinfo->picurl)}}" alt=""> --}}
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;">
                                        </div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;">
                                        </div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div><div class="uk-sticky-placeholder" style="height: 595px; margin: 0px;"></div>
                </div>
                <span class="btn-vidlist-3" uk-toggle="target: #wrapper; cls: is-open"></span>
            </div>
        {{-- </div> --}}
    </div>

    {{-- <i class="fas fa-spinner fa-spin"></i> --}}


        <!-- javaScripts
    ================================================== -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('templatefiles/framework.js')}}"></script>
        <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>

        <script src="{{asset('templatefiles/chart.min.js')}}"></script>
        {{-- <script type="text/javascript" src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
        <script src="{{asset('templatefiles/chart-custom.js')}}"></script>
        <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Select2 -->
        <!-- SweetAlert2 -->
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>


    <script>

        
        $(document).ready(function(){

            var heightwindow = $(document).height();
            console.log(heightwindow);

            $('#lesson_content_holder').css('height', heightwindow+'px');

            
            $("body").on("contextmenu",function(e){
                return false;
            });
            loadParts()
            var selectedPart
            var selectedPartElement
            var selectedChapter
            var selectedLesson
            var selectedQuiz
            var selectedChapterElement

            function loadParts(){

                $.ajax({
                    url: '/allbooks?parts=parts&bookid='+'{{$bookinfo->id}}',
                    type:"GET",
                    success: function(data){
                        $('#book_part_holder').empty()
                        console.log(data);
                        $('#book_part_holder').append(data)
                    }
                })

            }


            function loadChapters(){

                $.ajax({
                    url: '/allbooks?chapters=chapters&bookid='+'{{$bookinfo->id}}'+'&partid='+selectedPart,
                    type:"GET",
                    success: function(data){

                        $(data).insertAfter(selectedPartElement)
                
                    }
                })

            }

            function loadlesson(){

                $.ajax({
                    url: '/allbooks?lessons=lessons&bookid='+'{{$bookinfo->id}}'+'&chapterid='+selectedChapter,
                    type:"GET",
                    success: function(data){

                        $(data).insertAfter(selectedChapterElement)
                        $("Quiz").insertAfter(selectedChapterElement)
                    }
                })

            }

            function loadlessonContent(){

                $.ajax({
                    url: '/lessonContent/'+selectedLesson,
                    type:"GET",
                    success: function(data){

                        $('#lesson_content_holder').append(data)
                
                    }
                })

            }


            @if(auth()->user()->type == 2)

                //student
                function loadQuizContent(){

                    $.ajax({
                        url: '/quizContent/'+selectedQuiz+'/'+'{{$classroomid}}',
                        type:"GET",
                        success: function(data){
                            console.log(data)
                            $('#lesson_content_holder').append(data)
                        }
                    })

                }

                var selectedStudent;

                function loadStudentAnswer(){

                    $.ajax({
                        url: '/viewStudentAnswers/'+selectedQuiz+'/'+'{{$classroomid}}'+'/'+selectedStudent,
                        type:"GET",
                        success: function(data){
                            $('#student_answer').empty()
                            $('#student_answer').append(data)

                            $('li[data-value="teacher"]').removeClass('uk-active')
                            $('#student_answer_tab').addClass('uk-active')
                            $('#student_answer').addClass('uk-active')

                            $('#student_answer_tab').trigger( "click" )
                        }
                    })

                }

                $(document).on('click','#remove_grade',function(){

                    $.ajax({
                        url: '/removeGrade/'+$(this).attr('data-id'),
                        type:"GET",
                        success: function(data){

                                UIkit.notification("<span uk-icon='icon: check'></span> Post Removed Successfully", {status:'success', timeout: 1000 }); 

                                loadStudentAnswer()
                    
                        }
                    })
                })


                $(document).on('click','#view_answers',function(){

                    selectedStudent = $(this).attr('data-id')
                    loadStudentAnswer()

                })


                $(document).on('click','#submit_quiz_score',function(){

                    var data = []

                    $('.points').each(function(){
                        data.push({
                                value:$(this).val(),
                                id:$(this).attr('data-id')
                        })
                    })

                    $.ajax({
                        url: '/submitStudentScore/'+$(this).attr('data-id'),
                        type:"GET",
                        data:{points:data},
                        success: function(data){
                            UIkit.notification("<span uk-icon='icon: check'></span>Graded Successfully", {status:'success'});
                            loadQuizContent()
                            loadStudentAnswer()

                        }
                    })
                })

            //teacher
            @elseif(auth()->user()->type == 3)

                $(document).on('submit', '#answerForm', function(e) {

                    var inputs = new FormData(this)

                    $.ajax( {
                        url: '/chaptertestsubmitanswers',
                        type: 'POST',
                        data: inputs,
                        processData: false,
                        contentType: false,
                        success:function(data) {
                            UIkit.notification("<span uk-icon='icon: check'></span> Submitted successfully", {status:'success'});
                            loadQuizContent()
                            $('#lesson_content_holder').empty()
                            loadQuizContent()
                        }
                    })

                    e.preventDefault();
                });


                function loadQuizContent(){


                    $('#lesson_content_holder').css('background-image', 'none');

                    async function loadData() {
                            try {
                                const data = await $.ajax({
                                    url: '/studentQuizContent/' + selectedQuiz + '/' + '{{$classroomid}}',
                                    type: 'GET'
                                });
                                $('#contentdesktopview').remove();
                                $('#lesson_content_holder').prepend(data);
                            } catch (error) {
                                console.log(error);
                            }
                        }

                        loadData();


                }  
                
                function loadQuizContentattempt(){


                    $('#lesson_content_holder').css('background-image', 'none');

                    async function loadData() {
                            try {
                                const data = await $.ajax({
                                url: '/studentQuizContentattempt/' + selectedQuiz + '/' + '{{$classroomid}}',
                                data: {recordid : recordid},
                                type: 'GET'
                            });

                                $('#contentdesktopview').remove();
                                $('#lesson_content_holder').empty()
                                $('#lesson_content_holder').prepend(data);
                            } catch (error) {
                                console.log(error);
                            }
                        }

                        loadData();


                } 

                $(document).on('click','#retakeQuiz',function(){
                        $.ajax({
                            url: '/retakeQuiz/'+$(this).attr('data-id'),
                            type:"GET",
                            success: function(data){
                                $('#lesson_content_holder').empty()
                                loadQuizContent()
                        
                            }
                        })
                    })
                    


            @endif


            $(document).on('click','.view_chapter',function(e){

                selectedPart = $(this).attr('data-id')
                selectedPartElement = $(this)
                clearSchedModal()

                $('ul[book="chapter"]').remove()
                
                if($('li[data-id="'+selectedPart+'"][book="part"]').hasClass('uk-open')){
                    loadChapters()
                }
                else{
                }

            })

            $(document).on('click','#end_quiz',function(){
                $.ajax({
                    url: '/endQuiz/'+$(this).attr('data-id'),
                    type:"GET",
                    success: function(data){
                        $('#lesson_content_holder').empty()
                        loadQuizContent()
                
                    }
                })
            })

            $(document).on('click','.view_lesson',function(e){

                // $('.spinner').show();

                selectedChapter = $(this).attr('data-id')
                selectedChapterElement = $(this)
                clearSchedModal()

                $('div[book="lesson"]').remove()

                if($('li[data-id="'+selectedChapter+'"][book="lesson"]').hasClass('uk-open')){
                    console.log("Hello");
                    loadlesson()
                    // $('.spinner').hide();

                }
                else{

                }

            })

            
            $(document).on('click','.view_lesson_content',function(e){

                selectedLesson = $(this).attr('data-id')

                $('#lesson_content_holder').empty()
                loadlessonContent()

            })

            var selectQuizSchedId

            $(document).on('click','.view_quiz_content',function(e){

                selectedQuiz = $(this).attr('data-id')



                $('#lesson_content_holder').empty()
                loadQuizContent()

            })

            var dataproccess = 1;

            $(document).on('click','#update_quiz_sched',function(e){

                selectQuizSchedId = $(this).attr('data-quiz_sched_id')

                $('#date_start').val($('#d_date_start').val())
                $('#date_end').val($('#d_date_end').val())
                $('#time_start').val($('#d_time_start').val())
                $('#time_end').val($('#d_time_end').val())
                $('#nubmer_of_attempts').val($('#d_attempts').val())

                $('#submit_classsched').text( 'Update Quiz Schedule')
                dataproccess = 2;

                

            })

            

            function clearSchedModal(){

                $('#date_start').val('')
                $('#date_end').val('')
                $('#time_start').val('')
                $('#time_end').val('')
                $('#nubmer_of_attempts').val('')
                $('.uk-close').click()

                $('.uk-close').trigger( "click" )
            }

            $(document).on('click','.uk-close',function(){
                $('#submit_classsched').text( 'Create Quiz Schedule')
            })


            var recordid;
            $(document).on('click','#btn-attemptquiz',function(){
                console.log("Hi car");

                console.log("selectedQuiz: ", selectedQuiz )
                console.log("classroomid: ",'{{$classroomid}}' )

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

                    console.log(result.value)
                if (result.value == true) {
                    $.ajax({
                        url: '/attempt-quiz',
                        type: 'get',
                        data: {

                            quizid: selectedQuiz,
                            classroomid: '{{$classroomid}}'

                        },
                        success:function(data) {

                            recordid = data;
                            loadQuizContentattempt();

                        }
                    })
                }
                })

            });


            $(document).on('click','#btn-continue',function(){
                console.log("Hi car");

                console.log("selectedQuiz: ", selectedQuiz )
                console.log("classroomid: ",'{{$classroomid}}' )

                id = $(this).attr('data-id');



                $.ajax({
                        url: '/attempt-quiz',
                        type: 'get',
                        data: {

                            quizid: selectedQuiz,
                            classroomid: '{{$classroomid}}',
                            id : id

                        },
                        success:function(data) {

                            recordid = id;
                            loadQuizContentattempt();

                        }
                    })

            });


            $(document).on('click','#submit_classsched',function(){

                if(dataproccess == 1){
                    var url = '/viewbookchaptertestavailability'
                }
                else if(dataproccess == 2){
                    var url = '/updatequizschedule'
                }

                $.ajax({
                    url: url,
                    data:{
                        quizschedid : selectQuizSchedId,
                        noofattempts:$('#nubmer_of_attempts').val(),
                        chaptertestid:$('#quiz_id').val(),
                        classroomid:'{{$classroomid}}',
                        datestart:$('#date_start').val(),
                        dateend:$('#date_end').val(),
                        timestart:$('#time_start').val(),
                        timeend:$('#time_end').val(),
                    },
                    type:"GET",
                    success: function(data){
                        if(dataproccess == 2){
                            UIkit.notification("<span uk-icon='icon: check'></span> Quiz schedule is updated", {status:'success'});
                            loadQuizContent()
                        }
                        else if(dataproccess == 1){
                            UIkit.notification("<span uk-icon='icon: check'></span> Quiz is activated", {status:'success'});
                            loadQuizContent()
                        }
                        selectQuizSchedId = null;
                        dataproccess = 1
                        $('#lesson_content_holder').empty()
                        $('#submit_classsched').text( 'Create Quiz Schedule')
                        $('.uk-modal').removeClass('uk-open')
                        $('.uk-modal').removeAttr('style')
                        
                    }
                })

            })

        });

    </script>





