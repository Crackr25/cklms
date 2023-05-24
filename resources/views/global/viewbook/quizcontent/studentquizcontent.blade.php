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

                                                    @foreach ($item->choices as $questioninfo)
                                                    <div class="form-check mt-2">
                                                        @if($questioninfo->id == $item->answer)
                                                            <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{  $item->id }}" id="{{ $questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{ $item->id }}" value="{{ $questioninfo->id}}" checked>
                                                        @else
                                                            <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{  $item->id }}" id="{{ $questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{ $item->id }}" value="{{ $questioninfo->id}}">
                                                        @endif
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
                                        <input type="text" data-question-type="{{$item->typeofquiz}}" data-question-id="{{ $item->id}}" id="{{ $questioninfo->id}}" class="answer-field form-control mt-2" placeholder="Answer here" value="{{$item->answer}}" >

                            </div>
                        </div>
                            @endif


                            @if($item->typeofquiz == 3)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        
                                                <p class="question" data-question-type="{{$item->typeofquiz}}">{{$key+=1}}. {{$item->question}}</p>
                                                <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{ $item->id}}" id="{{ $questioninfo->id}}" class="answer-field form-control mt-2"type="text" value="{{$item->answer}}">{{$item->answer}}</textarea>

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

                                            @foreach($item->drop as $items)
                                        
                                                <p>

                                                    {{$items->sortid}}. {!! $items->question !!}

                                                </p>
                                            @endforeach

                                        </div>
                                    </div>
                            @endif

                            @if($item->typeofquiz == 6)
                                <!-- upload image -->
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        <p>{!! $item->question !!}</p>
                                        <div class="form-group">
                                            <input class="answer-field form-control-file imageInput" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" type="file" accept="image/*">
                                            
                                            @if($item->picurl != '')
                                                <a id="preview-link" href="{{$item->picurl}}" target="_blank">
                                                    <img id="preview" src="{{$item->picurl}}" alt="Preview" style="max-width: 250px; max-height: 250px;">
                                                </a>
                                            @else
                                                <a id="preview-link" href="#" target="_blank">
                                                    <img id="preview" src="#" alt="Preview" style="max-width: 250px; max-height: 250px;display:none;">
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($item->typeofquiz == 7)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        <span style="font-weight:600;font-size:1.0pc">
                                            Fill in the blanks
                                        </span>
                
                                        
                
                                        @foreach($item->fill as $items)
                                        
                                                <p>
                                                    {{$items->sortid}}. {!! $items->question !!}
                
                                                </p>
                                            @endforeach
                
                                    </div>
                                </div>
                            @endif

                            @if($item->typeofquiz == 8)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        <span style="font-weight:600;font-size:1.0pc">
                                            Enumeration
                                        </span>
                
                                        <ol class="list-group list-group-numbered p-3" type="A">
                                        <li>
                                            <p>{{$item->question}}</p>
                                        <ol>
                
                                        @php
                
                                            $numberOfTimes = $item->item
                
                                        @endphp
                                        
                                        @for ($i = 0; $i < $numberOfTimes; $i++)
                
                                        <div class="row">
                                            <div class="col-md-12">
                                                <li>
                                                    <p><input data-question-id="{{ $item->id }}" data-sortid={{ $i+1 }} data-question-type="8" class="answer-field d-inline form-control q-input" value="{{$item->answer[$i]}}" type="text"></p>
                                                </li>
                                            </div>
                                        </div>
                                        
                                        @endfor
                                        
                                        </ol>
                                        
                                        </li>
                                    </ol>
                                        
                
                                    </div>
                                </div>
                            @endif


                        @endforeach

                        <div class="save mb-5">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="btn btn-success btn-lg" data-id="{{$headerid}}" id="save-quiz">Save</div>
                            </div>
                        </div>
                        </div>
                    
                    <button id="scroll-to-bottom" class="btn btn-dark btn-lg mb-3 mr-3" style= "position: fixed;bottom: 0px;left: 10px;padding: 9px 15px 9px 15px !important;"><i class="fas fa-arrow-circle-down"></i></button>
        </div> 
        </div> 
        
        </div> 

<script>

    $(document).ready(function(){

                console.log("hello world")

                var data = {!! json_encode($quizQuestions) !!};
                console.log(data);

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
                    var sortId = $(thisElement).data('sortid');


                    

                    console.log(`student answer: ${answer}, sortid: ${sortId}, question-id: ${questionId}, question-type: ${questionType}`)

                    //Send an AJAX request to save the answer data


                    if (questionType !== 6) {
                    //Send an AJAX request to save the answer data
                        $.ajax({
                            url: '/save-answer',
                            method: 'GET',
                            data: {
                            chapterquizid : quizId,
                            answer: answer,
                            headerId: headerId,
                            questionType: questionType,
                            sortId: sortId,
                            question_id: questionId
                            },
                            success: function(response) {
                                if (response == 1){
                                    console.log("Answer Inserted successfully");
                                }else{
                                    console.log("Answer Updated successfully");
                                }

                                //Handle the response from the server if needed
                                // Update the href attribute of the <a> tag with the uploaded image URL
                                var uploadedImageUrl = response['picurl']; // Replace this with the actual uploaded image URL from the server
                                $('#preview-link').attr('href', uploadedImageUrl);
                            }
                        });
                    }
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

        $(document).on('change', '.imageInput', function(){
            // Get the answer data
            var quizId = $('#quiz-info').data('quizid');
            var headerId = $('.card-body').data('headerid');
            var questionId = $(this).data('question-id');
            var questionType = $(this).data('question-type');

            console.log(questionId, questionType)

            // Get the file input element
            var fileInput = $(this)[0];
            var file = fileInput.files[0];

            // Create a FormData object to store the file data
            var formData = new FormData();
            formData.append('chapterquizid', quizId);
            formData.append('answer', file);
            formData.append('headerId', headerId);
            formData.append('questionType', questionType);
            formData.append('question_id', questionId);


            // Get the CSRF token value
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Set the CSRF token in the request headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            // Send an AJAX request to save the answer data
            $.ajax({
                url: '/save-image',
                method: 'POST', // Use POST method instead of GET
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type
                success: function(response) {
                    if (response == 1) {
                        console.log("Answer inserted successfully");
                    } else {
                        console.log("Answer updated successfully");
                    }
                    // Handle the response from the server if needed
                    // Update the href attribute of the <a> tag with the uploaded image URL
                    var uploadedImageUrl = response['picurl']; // Replace this with the actual uploaded image URL from the server
                    $('#preview-link').attr('href', uploadedImageUrl);
                }
            });

			previewImage(this);
        });

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
