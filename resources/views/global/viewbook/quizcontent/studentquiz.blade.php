



<style>

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
        .mutiple-choice > div > ol > li {
            margin-top: 1.7em;
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
        .quizcontent{
            background-color: #fff !important;
        }
    </style>


</head>



    <div class="container quizcontent">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-body">
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
                            <div class="btn bg-success text-white m-1">{{$lesson}}</div>
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
                <div id="questions">

                    <!-- multiple choice -->
                    
                        <div class="card mt-5 mutiple-choice">
                            <div class="card-body">
                
                                        
                                        <p>{{$key+=1}}. {{$item->question}}</p>

                                        @foreach ($item->choices as $questioninfo)
                                        <div class="form-check mt-2">
                                            <input data-question-id="{{ $questioninfo->id}}" id="{{ $questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{ $item->id}}" value="{{ $questioninfo->id}}">
                                            <label for="{{ $questioninfo->id}}" class="form-check-label">
                                                {{$questioninfo->description}}
                                            </label>
                                        </div>
                                        @endforeach
                    
                                
                        </div>
                    </div>
                        @endif
                    

                        @if($item->typeofquiz == 2)
                    <div class="card mt-5">
                        <div class="card-body">
                            
                                    <p>{{$key+=1}}. {{$item->question}}</p>
                                    <input type="text" data-question-id="{{ $questioninfo->id}}" id="{{ $questioninfo->id}}" class="form-control m-2" placeholder="Answer here" >

                        </div>
                    </div>
                        @endif


                        @if($item->typeofquiz == 3)
                            <div class="card mt-5">
                                <div class="card-body">
                                    
                                            <p>{{$key+=1}}. {{$item->question}}</p>
                                            <textarea data-question-id="{{ $questioninfo->id}}" id="{{ $questioninfo->id}}" class="answer-field form-control mt-2"type="text"></textarea>

                                </div>
                            </div>
                        @endif

                    


                        @if($item->typeofquiz == 5)
                            <!-- drag and drop -->
                            <div class="card mt-5">
                                <div class="card-body">
                                    <p class="instruction">
                                        Drag the correct option and drop it onto the corresponding box. 
                                    </p>

                                    <div class="options p-3 mt-2" style="border:3px solid #3e416d;border-radius:6px;">
                                        @foreach ($item->drag as $questioninfo)
                                            <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">{{$questioninfo->description}}</div>
                                        @endforeach
                                    </div>

                                        @foreach($item->drop as $item)
                                            @php
                                                $inputField = '<input class="d-inline form-control q-input drop-option q-input" style="width: 200px; margin: 10px; border-color:black" type="text">';
                                                $questionWithInput = str_replace('~input', $inputField, $item->question);
                                            @endphp
                                    
                                            <p>

                                                {{$item->sortid}}. {!! $questionWithInput !!}

                                            </p>
                                        @endforeach

                                    </div>
                                </div>
                        @endif
                    @endforeach

                    
                    {{-- <!-- fill in the blanks -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <span style="font-weight:600;font-size:1.0pc">
                                Instruction for fill in the blanks
                            </span>

                            <ol class="list-group list-group-numbered p-3">
                                <li>
                                    <div class="row align-items-center form-inline">
                                        <div class="col-md-12">
                                            <p>The <input data-question-id="14" class="answer-field d-inline form-control q-input" type="text"> is the largest organ in the human body.</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <p><input data-question-id="15" class="answer-field d-inline form-control q-input" type="text"> is the process by which a gas turns into a liquid.</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <p>The two main components of the central nervous system are the <input data-question-id="16" class="answer-field d-inline form-control q-input" type="text"></p> and the <input data-question-id="16" class="answer-field d-inline form-control q-input" type="text">. Please answer in lowercase.
                                        </div>
                                    </div>
                                </li>
                            </ol>

                        </div>
                    </div>

                    <!-- enumeration -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <p class="instruction">
                                List all the correct answers
                            </p>

                            <ol class="list-group list-group-numbered p-3" type="A">
                                <li>
                                    <p>Enumerate the colors of the rainbow.</p>
                                    <ol>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
    
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
                                            </div>
    
                                            <div class="col-md-4">
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
                                            </div>
    
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </ol>
                                </li>
                            </ol>

                        </div>
                    </div>

                    <!-- essay -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <p class="instruction">
                                Write a well-organized and thoughtful response to the question provided. 
                            </p>

                            <ol>
                                <li>
                                    <p>What are the potential benefits and drawbacks of using genetically modified organisms (GMOs) in agriculture?</p>
                                    <textarea data-question-id="25" class="answer-field form-control mt-2"type="text"></textarea>
                                </li>
                                <li>
                                    <p>How does climate change affect marine biodiversity and what can be done to mitigate its impacts?</p>
                                    <textarea data-question-id="26" class="answer-field form-control mt-2"type="text"></textarea>
                                </li>
                            </ol>

                        </div>
                    </div>


                    <!-- upload image -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <p class="instruction">
                                Follow the steps below and upload a screenshot of your work.
                            </p>

                            <ol>
                                <li>
                                    <p>Click on the Windows Start Menu (located in the bottom left-hand corner of your screen).</p>
                                </li>
                                <li>
                                    <p>Scroll through the list of installed applications until you find Adobe Photoshop. Click on Photoshop to launch the program.</p>
                                </li>
                                <li>
                                    <p>Wait for Photoshop to load. It may take a few seconds to launch, especially if you have a slower computer.</p>
                                </li>
                            </ol>

                            <div class="mt-4">
                                <input data-question-id="27" class="answer-field form-control" style="height:100%;" type="file" id="imageInput" accept="image/*">
                                <img class="img-thumbnail" style="display:none;width:300px" id="preview" src="#" alt="Preview">
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="save mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="btn btn-success btn-lg" id="save-quiz">Save</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end main row --> --}}
    </div> <!-- end container quizcontent -->
    <button id="scroll-to-bottom" class="btn btn-dark btn-lg mb-3 mr-3"><i class="fas fa-arrow-circle-down"></i></button>
</body>



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}

        <script>

            $(document).ready(function(){

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
                    var answer = $(thisElement).val();
                    var questionId = $(thisElement).data('question-id');
                    var studentId = STUDENT_ID

                    console.log(`student answer: ${answer}, question-id: ${questionId}, student-id: ${STUDENT_ID}`)

                    // // Send an AJAX request to save the answer data
                    // $.ajax({
                    //     url: '/save-answer',
                    //     method: 'POST',
                    //     data: {
                    //     answer: answer,
                    //     question_id: questionId,
                    //     student_id: studentId
                    //     },
                    //     success: function(response) {
                    //     // Handle the response from the server if needed
                    //     }
                    // });
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
    })
</script>