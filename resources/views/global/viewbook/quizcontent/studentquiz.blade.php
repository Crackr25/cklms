<Style>



</Style>



    <div class="container quizcontent" style="background-color: #fff !important;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
            @if(!isset($chapterquizsched->status))


            <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                            border-radius: 10px  !important;" id="quiz-info">
                                    <div class="card-header">
                                        <h1 class="card-title">
                                            Quiz Status
                                        </h1>
                                    </div>
                                    
                                    
                                <div class="card-body">
                                    <h4><span> Status: </span> <b>Inactive</b> </h4>
                                    <p>Please contact your teacher to open this quiz.</p>
                                    {{-- <ul class="list-unstyled">
                                        <li class="border-bottom py-2"><span>Quiz Result:</span> 80%</li>
                                        <li class="border-bottom py-2"><span>Attempts:</span> 2/5</li>
                                        <li class="border-bottom py-2"><span>Time from:</span> March 20 2023 10 AM</li>
                                        <li class="border-bottom py-2"><span>Deadline:</span> March 21 2023 10 AM</li>
                                    </ul> --}}
                                    {{-- <div class="card-footer border-top-0 text-center">
                                        <button class="btn btn-success mt-3">Attempt Quiz</button>
                                    </div> --}}
                                </div>
                </div>            

            {{-- <div>
                <div class="uk-card uk-card-primary uk-card-body bg-info">
                    <h4 class="uk-card-title">THIS QUIZ IS NOT YET ACTIVATED!</h4>
                    <p>Please contact your teacher to open this quiz.</p>
                </div>
            </div> --}}

            @else
                
                @if($chapterquizsched->status == 1)

                    <div>
                        <div class="uk-card uk-card-primary uk-card-body bg-info">
                            <h4 class="uk-card-title">THIS QUIZ HAS ENDED!</h4>
                            <p>Your teacher ended this quiz last {{\Carbon\Carbon::create($chapterquizsched->updateddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}.</p>
                        </div>
                    </div>

                @elseif(\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto) <= \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))

                    <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                            border-radius: 10px  !important;" id="quiz-info">
                                    <div class="card-header">
                                        <h1 class="card-title">
                                            Quiz Status
                                        </h1>
                                    </div>
                                    
                                    
                                <div class="card-body">
                                    <h4><span> Status: </span> <b>Overdue</b> </h4>
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-2"><span>Quiz Ended:</span> {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}</li>
                                    </ul>
                                </div>

                    </div> 
                

                @elseif(\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom) > \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))

                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">QUIZ IS NOT YET STARTED!</h4>
                        <p>This quiz Will start on {{\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom)->isoFormat('MMMM DD, YYYY hh:mm A')}}</p>
                    </div>

                @else
                            
                            <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                            border-radius: 10px  !important;" id="quiz-info">
                                    <div class="card-header">
                                        <h1 class="card-title">
                                            Quiz Status
                                        </h1>
                                    </div>
                                    
                                    
                                <div class="card-body">
                                    <h4><span> Status: </span> <b>Active</b> </h4>
                                    <ul class="list-unstyled">
                                        <li class=""><span>Deadline:</span> {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}</li>
                                        <li class=""><span>Attempts:</span> {{$attemptsLeft}} / {{$chapterquizsched->noofattempts}} </li>
                                        <li class="border-bottom"><span>Score:</span> Not yet Graded </li>
                                    </ul>
                                    <div class="card-footer border-top-0 text-center">
                                        @if(!empty($continuequiz))
                                        <button class="btn btn-success mt-3" data-id= "{{ $continuequiz }}" id="btn-continue">Continue</button>
                                        @else
                                        <button class="btn btn-success mt-3"id="btn-attemptquiz">{{$chapterquizsched->btn}}</button>
                                        @endif
                                    </div>
                                </div>
                            </div>            
                            
                            
                @endif


            @endif
        </div>
    </div>
</div>

</body>



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}

    {{-- <script>

            $(document).ready(function(){

                var data = {!! json_encode($quizQuestions) !!};
                console.log(data);

                console.log("Hello");

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
                    var roomid = $('#roomid').data('roomid');
                    var answer = $(thisElement).val();
                    var questionId = $(thisElement).data('question-id');


                    

                    console.log(`student answer: ${answer}, question-id: ${questionId}, student-id: ${STUDENT_ID}`)

                    // Send an AJAX request to save the answer data
                    $.ajax({
                        url: '/save-answer',
                        method: 'POST',
                        data: {
                        chapterquizid : quizId,
                        answer: answer,
                        question_id: questionId,

                        },
                        success: function(response) {
                        // Handle the response from the server if needed
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
        $('.answer-field').on('change', function() {
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
        $("#imageInput").change(function() {
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
    </script> --}}