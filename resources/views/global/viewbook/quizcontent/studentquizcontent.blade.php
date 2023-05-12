<div class="container quizcontent" style="background-color: #fff !important;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

<div class="card mt-5 editcontents" data-quizid= "{{$quizInfo->id}}" id="quiz-info">
                                <div class="card-body" data-headerid= "{{$headerid}}" id="headerid">
                                    <h1 class="card-title">
                                        {{$quizInfo->title}}
                                    </h1>

                            <div class="lessons pb-4">
                                <h4>Coverage: </h4>
                                @if(!empty($quizInfo->coverage))
                                @php
                                    $lessons = explode(", ", $quizInfo->coverage);
                                @endphp

                                @foreach ($lessons as $lesson)
                                <div class="btn bg-primary text-white m-1">{{$lesson}}</div>
                                @endforeach
                                @endif
                                {{-- <div class="btn bg-success text-white m-1">Lesson 2: VLAN</div>
                                <div class="btn bg-success text-white m-1">Lesson 3: Inter VLAN</div>
                                <div class="btn bg-success text-white m-1">Lesson 4: OSI Model</div>
                                <div class="btn bg-success text-white m-1">Lesson 5: TCP/IP</div> --}}
                            </div>

                            <p class="card-text">{{$quizInfo->description}}</p>

            
                        </div>
                    </div>
                
                    @foreach($quizQuestions as $key=>$item)
                        @if($item->typeofquiz == 1)

                                <!-- multiple choice -->
                                
                                    <div class="card mt-5 editcontent" id="quiz-question-{{$item->id}}">
                                        <div class="card-body ">
                            
                                                    
                                                    <p class="question" data-question-type="{{$item->typeofquiz}}">{{$key+=1}}. {{$item->question}}</p>

                                                    @php


                                                    $choices = DB::table('lessonquizchoices')
                                                        ->where('questionid',$item->id)
                                                        ->where('deleted',0)
                                                        ->select('description','id','answer', 'sortid')
                                                        ->orderBy('sortid')
                                                        ->get();


                                                    @endphp
                                                    

                                                    @foreach ($choices as $questioninfo)
                                                    <div class="form-check mt-2">
                                                        <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{  $item->id }}" id="{{ $questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{ $item->id }}" value="{{ $questioninfo->id}}">
                                                        <label for="{{ $item->id }}" class="form-check-label">
                                                            {{$questioninfo->description}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                
                                            
                                        </div>
                                    </div>
                            @endif
                        

                            @if($item->typeofquiz == 2)
                        <div class="card mt-5 editcontent">
                            <div class="card-body">
                                
                                        <p class="question" data-question-type="{{$item->typeofquiz}}">{{$key+=1}}. {{$item->question}}</p>
                                        <input type="text" data-question-type="{{$item->typeofquiz}}" data-question-id="{{ $item->id}}" id="{{ $questioninfo->id}}" class="answer-field form-control mt-2" placeholder="Answer here" >

                            </div>
                        </div>
                            @endif


                            @if($item->typeofquiz == 3)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        
                                                <p class="question" data-question-type="{{$item->typeofquiz}}">{{$key+=1}}. {{$item->question}}</p>
                                                <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{ $item->id}}" id="{{ $questioninfo->id}}" class="answer-field form-control mt-2"type="text"></textarea>

                                    </div>
                                </div>
                            @endif


                            @if($item->typeofquiz == 4)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        
                                                <p>Instruction. {!! $item->question !!}</p>

                                    </div>
                                </div>
                            @endif

                        


                            @if($item->typeofquiz == 5)
                                <!-- drag and drop -->
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        <p class="question" data-question-type="{{$item->typeofquiz}}">
                                            Drag the correct option and drop it onto the corresponding box. 
                                        </p>

                                        <div class="options p-3 mt-2" style="border:3px solid #3e416d;border-radius:6px;">
                                            @foreach ($item->drag as $questioninfo)
                                                <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">{{$questioninfo->description}}</div>
                                            @endforeach
                                        </div>

                                            @php
                                            $dropquestions = DB::table('lesson_quiz_drop_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();
                                            @endphp

                                            @foreach($dropquestions as $items)
                                                @php
                                                    $inputField = '<input class="d-inline form-control q-input drop-option q-input" data-question-type="'.$item->typeofquiz.'" data-question-id="'.$items->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" disabled>';
                                                    $questionWithInput = str_replace('~input', $inputField, $items->question);
                                                @endphp
                                        
                                                <p>

                                                    {{$items->sortid}}. {!! $questionWithInput !!}

                                                </p>
                                            @endforeach

                                        </div>
                                    </div>
                            @endif
                        @endforeach

                        <div class="save mb-5">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="btn btn-success btn-lg" id="save-quiz">Save</div>
                            </div>
                        </div>
                        </div>
                    
                    <button id="scroll-to-bottom" class="btn btn-dark btn-lg mb-3 mr-3" style= "

                        position: fixed;
                        bottom: 0px;
                        left: 10px;
                        padding: 9px 15px 9px 15px !important;
                    }"><i class="fas fa-arrow-circle-down"></i></button>
        </div> 
        </div> 
        
        </div> 

<script>

    $(document).ready(function(){

                console.log("hello world")

                var STUDENT_ID = 2;

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                    function previewImage(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#preview').attr('src', e.target.result);
                                $('#preview').show();
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                function autoSaveAnswer(thisElement) {
                    // Get the answer data
                    var quizId = $('#quiz-info').data('quizid');
                    var headerId = $('.card-body').data('headerid');
                    var answer = $(thisElement).val();
                    var questionId = $(thisElement).data('question-id');
                    var questionType = $(thisElement).data('question-type');


                    

                    console.log(`student answer: ${answer}, question-id: ${questionId}, question-type: ${questionType}`)

                    //Send an AJAX request to save the answer data
                    $.ajax({
                        url: '/save-answer',
                        method: 'GET',
                        data: {
                        chapterquizid : quizId,
                        answer: answer,
                        headerId: headerId,
                        questionType: questionType,
                        question_id: questionId

                        },
                        success: function(response) {
                            if (response == 1){
                                console.log("Answer Inserted successfully");
                            }else{
                                console.log("Answer Updated successfully");
                            }
                        
                            //Handle the response from the server if needed
                        }
                    });
                }

                // drag and drop
                $( ".drag-option" ).draggable({
                    helper: "clone",
                    revertDuration: 100,
                    revert: 'invalid'
                });

                $( ".drop-option" ).droppable({
                    drop: function(event, ui) {

                        var dragElement = $(ui.draggable)
                        var dropElement = $(this)

                        dropElement.val(dragElement.text())
                        dropElement.addClass('bg-primary text-white')
                        dropElement.prop( "disabled", true );

                        dragElement.removeClass('bg-primary')
                        dragElement.addClass('bg-dark')

                        // auto save answer
                        autoSaveAnswer(dropElement)
                    }
                });

        // select choice by clicking label
        $("label").click(function() {
            var radioBtnId = $(this).attr("for");
            var inputElement = $(`input.answer-field[id='${radioBtnId}']`);

            inputElement.prop("checked", true);
            autoSaveAnswer(inputElement);
        });

        // auto save answer when switching to 
        $(document).on('change', '.answer-field', function(){
            autoSaveAnswer(this);
        });

        // save all answers quiz

        $('#save-quiz').on('click', function() {
            var isvalid = true

            $('.answer-field').each(function() {
                $(this).removeClass('error-input')
                $(this).removeClass('is-invalid')

                if ($(this).val() == "" ) {
                    
                    if ($(this).prop("disabled")) {
                        $(this).prop('disabled', false);
                        $(this).focus();
                        $(this).prop('disabled', true);
                    } else {
                        $(this).focus();
                    }
                    
                    
                    $(this).addClass('error-input')
                    isvalid = false
                }

                if ($(this).is(":radio")) {
                    
                    if (!$("input[name='" + $(this).attr("name") + "']:checked").length) {

                        $(this).focus();
                        $(this).addClass('is-invalid')

                        isValid = false;
                    }
                }

            })

            if (isvalid) {
                Toast.fire({
                    icon: 'success',
                    title: 'Quiz submitted successfully.'
                })
                // set quiz status as finished
                // disable retake of quiz
                // show quiz complete form
            } else {
                // Swal.fire({
                //     // template: '#my-template'
                //     titleText: 'Unanswered items detected!',
                //     html: '<p class="text-center" style="font-size:1rem;">Are you sure you want to continue and submit the quiz?</p>',
                //     icon: 'error',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Save'
                // })
                // .then((result) => {
                //     if (result.value) {
                //         event.preventDefault();
                //         Toast.fire({
                //             icon: 'success',
                //             title: 'Quiz w/ unanswered items submitted successfully.'
                //         })
                //     }
                // })
            }
        })

        // show the button when the user scrolls past a certain point
        $(window).scroll(function() {
            if ($(this).scrollTop() > 700) {
                $('#scroll-to-bottom').fadeIn();
            } else {
                $('#scroll-to-bottom').fadeOut();
            }
        });
        
        // scroll to the bottom of the page when the button is clicked
        $('#scroll-to-bottom').click(function() {
            $('html, body').animate({
                scrollTop: $(document).height(),
            }, 'slow', function() {
                $('#scroll-to-bottom').fadeOut();
            });
            return false;
        });

        // show preview image

        $(document).on('change', '#imageInput', function(){
			previewImage(this);
        });



        $(document).on('click', '.editcontent', function(){
                    $('.ui-helper-hidden-accessible').remove();
                    $('.editcontent').css({
                        "border": "2px solid white",
                        "border-radius": "5px"
                        // "padding": "20px",
            
                    });

                    $(this).css({
                        "border": "2px solid dodgerblue",
                        "border-radius": "5px"
    
                        // "padding": "20px",
                    });

                });
    })
    </script>
