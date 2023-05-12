@extends('admin.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


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
            .col-content {
                background-color: #fff;
                }
            .select2-container .select2-selection--multiple {
                
                height: auto;
            }

            .select2-selection__choice {
                font-size: 16px; /* Change the font size */
                background-color: #5cb85c !important; /* Change the background color */
                color:rgb(255, 255, 255) !important;
                border-radius: 5px; /* Add rounded corners */
                padding: 2px 8px; /* Add some padding */
                margin-right: 5px; /* Add some space between items */
                }

            #header.col-content {
                border-top: 10px solid #673AB7  !important;
                border-radius: 10px  !important;
            }

            .editcontent{
                border-top: 8px solid black;
                border-radius: 5px;
            
                    }

            #my-card:hover {
                transform: scale(1.1); /* make the card 10% larger on hover */
                background-color: red; /* change the background color to red on hover */
                cursor: pointer; /* show a pointer cursor on hover */
            }

            #my-card:hover #lessoncardtitle {
                color: white;
            }

            .col-12 .m-2 {
                width:500px;
            }

            .selected {
                background-color: green;
            }





    </style>

<body class="dark">
            <div class="container" id="quiz-info"  data-quizid="{{ $id }}">
                <div class="row justify-content-center">
                        <div class="col-md-8">
                            
                            <div class="contentcontainer">
                                    <div class="row p-4 dragrow">
                                        <div class="col-lg-1 col-2 rowhidden d-flex align-items-center">
                                            <div class="btn-group-vertical">
                                                <a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>
                                                </a>                                            </div>
                                            </div>
                        
                                        <div class="col-lg-11 col-10 editcontent col-content" id = "header">
                                                <div class="card mt-5 shadow-none  border-0">
                                                <div class="card-header" id="quizTitle">
                                                <h3 class="text-center" contenteditable="true">{{$quiz->title}}</h3>
                                                {{-- <input type="text" class="form-control d-none" value="Untitled Quiz"> --}}
                                                @if(empty($quiz->coverage))
                                                <label>Coverage:</label>
                                                <div class="row justify-content-center">

                                                    <div class="col-10 mt-2">
                                                        {{-- <label>Coverage</label> --}}
                                                        <select class="form-control-sm select2 pr-3" id="select-lesson" multiple="multiple">
                                
                                                            </select>
                                                    
                                                    </div>
                                                </div>
                                                @else
                                                <div class="row justify-content-center">
                                                        <div class="d-flex flex-row" data-quiz="{{ $quiz->coverage }}">
                                                        @php
                                                            $lessons = explode(", ", $quiz->coverage);
                                                        @endphp
                                                        
                                                        @foreach ($lessons as $lesson)
                                                            <div class="card m-2">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">{{ $lesson }}</h5>
                                                                </div>
                                                            </div>
                                                @endforeach
                                                                <div class="card m-2" id="my-card" data-toggle="tooltip" data-placement="top" title="Delete Coverage Lesson">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title" id="lessoncardtitle">X</h5>
                                                                    </div>
                                                                </div>
                                                </div>
                                                </div>
                                                @endif
                                                </div>
                                                <div class="card-body">
                                                <form>
                    
                                                    <div class="form-group">
                                                        
                                                        {{-- <label>Coverage</label>
                                                        <select class="form-control-sm select2 pr-3" id="select-lesson" multiple="multiple">
                                                            <option>Select Student/Personnel</option>    
                                                            </select> --}}
                                                                
                                                        {{-- <label for="quiz_categories">Quiz Categories</label> --}}
                                                    <label for="description">Quiz Description:</label>
                                                    <textarea class="form-control" id="description" value= '{{$quiz->description}}' rows="1">{{$quiz->description}}</textarea>
                                                    </div>
                                                </form>
                                                </div>
                                        </div>
                                        </div>
                                        

                                                @if(count($quizquestions) > 0)
                                                @foreach($quizquestions as $question)
                                                <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                    <div class="col-lg-1 col-2 rowhidden{{$question->id}} d-flex align-items-center">
                                                    </div>


                                                    {{-- Multiple choice --}}
                                                    @if($question->typeofquiz == 1)
                                                    <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content">
                                                        <div class="card mt-5 shadow-none border-0">
                                                            <div class="card-header">
                                                                <div class="row justify-content-end">
                                                                    <div class="col-6 mr-1 quizarea">
                                                                        <select class="form-control quiztype" id="quiztype{{$question->id}}">
                                                                        <option value="multiple_choice">Multiple Choice</option>
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="short_answer">Short Answer</option>
                                                                        <option value="paragraph_answer">Paragraph</option>
                                                                        <option value="enumeration">Enumeration</option>
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        </select>
                                                                    </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12 m-2">
                                                                            <textarea class="form-control" placeholder="Untitled question" id="multiplechoice{{$question->id}}" >{{$question->question}}</textarea>
                                                                        </div>
                                                                        @php
                                                                        $quizchoices = DB::table('lessonquizchoices')
                                                                            ->where('questionid', $question->id)
                                                                            ->orderBy('sortid')
                                                                            ->get();


                                                                        @endphp
                                                                        <div class="col-12" id="list_option{{$question->id}}">
                                                                            @if(count($quizchoices) > 0)
                                                                            @foreach($quizchoices as $choice)
                                                                            <input class="form-check-input ml-2" type="radio" name="option1" value="1">
                                                                            <label class="form-check-label ml-5 option{{$question->id}}" id="option{{$question->id}}" contenteditable="true">{{$choice->description}} 
                                                                                @if($choice->answer==1)
                                                                                    <span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>
                                                                                @endif
                                                                            </label>
                                                                            
                                                                            @endforeach
                                                                            @endif
                                                                        </div>
                                                                    <button class="form-control addoption" style="margin: 20px; " id="{{$question->id}}">Add option</button>
                                                                    <div class="col-12">
                                                                        <button class="btn btn-link btn-sm answer-key" id="{{$question->id}}">Answer key</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    {{-- Short Answer --}}
                                                    @if($question->typeofquiz == 2)
                                                    <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content">
                                                        <div class="card mt-5 shadow-none border-0">
                                                            <div class="card-header">
                                                                <div class="row justify-content-end">
                                                                    <div class="col-6 mr-1 quizarea">
                                                                        <select class="form-control quiztype" id="quiztype{{$question->id}}">
                                                                        <option value="short_answer">Short Answer</option>
                                                                        <option value="paragraph_answer">Paragraph</option>
                                                                        <option value="short_answer">Short Answer</option>
                                                                        {{-- <option value="multiple_choice">Multiple Choice</option> --}}
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="enumeration">Enumeration</option>
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <textarea class="form-control m-2" placeholder="Untitled question" id="shortz_answer_question{{$question->id}}" >{{$question->question}}</textarea>
                                                                            </div>
                                                                            <div class="col-12">    
                                                                                <input type="text" class="form-control m-2" placeholder="Short answer text" disabled>
                                                                            </div>
                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    {{-- Paragraph --}}
                                                    @if($question->typeofquiz == 3)
                                                    <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content">
                                                        <div class="card mt-5 shadow-none border-0">
                                                            <div class="card-header">
                                                                <div class="row justify-content-end">
                                                                    <div class="col-6 mr-1 quizarea">
                                                                        <select class="form-control quiztype" id="quiztype{{$question->id}}">
                                                                        <option value="paragraph_answer">Paragraph</option>
                                                                        <option value="short_answer">Short Answer</option>
                                                                        {{-- <option value="multiple_choice">Multiple Choice</option> --}}
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="enumeration">Enumeration</option>
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        </select>
                                                                    </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <textarea class="form-control m-2" placeholder="Untitled question" id="long_answer_question{{$question->id}}" >{{$question->question}}</textarea>
                                                                        </div>
                                                                        <div class="col-12">    
                                                                            <input type="text" class="form-control m-2" placeholder="Long answer text" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    {{-- Instruction --}}
                                                    @if($question->typeofquiz == 4)
                                                    <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content">
                                                        <div class="card mt-5 shadow-none border-0">
                                                            <div class="card-header">
                                                                <div class="row justify-content-end">
                                                                    <div class="col-6 mr-1 quizarea">
                                                                        <select class="form-control quiztype" id="quiztype{{$question->id}}">
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="paragraph_answer">Paragraph</option>
                                                                        <option value="short_answer">Short Answer</option>
                                                                        {{-- <option value="multiple_choice">Multiple Choice</option> --}}
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="enumeration">Enumeration</option>
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        </select>
                                                                    </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <textarea class="form-control instruction" placeholder="Untitled question" id="instruction_item{{$question->id}}" >{{$question->question}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    {{-- Drag and Drop --}}
                                                    @if($question->typeofquiz == 5)
                                                    <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content">
                                                        <div class="card mt-5 shadow-none border-0">
                                                            <div class="card-header">
                                                                <div class="row justify-content-end">
                                                                    <div class="col-6 mr-1 quizarea">
                                                                        <select class="form-control quiztype" id="quiztype{{$question->id}}">
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="paragraph_answer">Paragraph</option>
                                                                        <option value="short_answer">Short Answer</option>
                                                                        {{-- <option value="multiple_choice">Multiple Choice</option> --}}
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="enumeration">Enumeration</option>
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        </select>
                                                                    </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="options p-3 mt-2" id="options{{$question->id}}" style="border:3px solid #3e416d;border-radius:6px;">
                                                                                @php
                                                                                $dragoptions = DB::table('lesson_quiz_drag_option')
                                                                                    ->where('questionid', $question->id)
                                                                                    ->orderBy('sortid')
                                                                                    ->get();
                                                                                @endphp
                                                                                @foreach($dragoptions as $item)
                                                                                <div class="drag-option btn bg-primary text-white m-1 drag{{$question->id}}" contentEditable="true" data-target="drag-1">
                                                                                    {{ $item->description }}
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="row justify-content-end p-3 mt-2">
                                                                                <button class="btn btn-success add_drag_option" id="{{$question->id}}">Add drag option</button>
                                                                            </div>

                                                                            <p><b>Note: </b>To set up the drop area, please input [~input] where you want the drop zone to appear. Ex. The planet ~input is the biggest planet in the solar system</p>
                                                                            <div id="item_question{{$question->id}}">
                                                                                @php
                                                                                $dropquestions = DB::table('lesson_quiz_drop_question')
                                                                                    ->where('questionid', $question->id)
                                                                                    ->orderBy('sortid')
                                                                                    ->get();
                                                                                @endphp
                                                                                @foreach($dropquestions as $item)
                                                                                @php
                                                                                    $inputField = '<input class="d-inline form-control q-input drop-option q-input" style="width: 200px; margin: 10px; border-color:black" type="text">';
                                                                                    $questionWithInput = str_replace('~input', $inputField, $item->question);


                                                                                @endphp
                                                                                <p>

                                                                                    {{$item->sortid}}. {!! $questionWithInput !!}

                                                                                </p>
                                                                                {{-- <input type="text" class="form-control drop{{$question->id}}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;{{ $item->sortid }}" value= "{{ $item->question}}"> --}}
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="row justify-content-end p-3 mt-2">
                                                                                <button class="btn btn-success add_drag_question"  id="{{$question->id}}">Add drop question</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                </div>    
                                                @endforeach
                                                @endif
                                                </div>      
                                                {{-- $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 shortz_answer_question"'+parentId+'" placeholder="Untitled question" style="height: 20px !important;" id="shortz_answer_question'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control m-2 mr-1" placeholder="Short answer text" disabled>');
                        --}}

                                {{-- <div class="position-fixed bg-white text-black p-3 rounded-bottom-right" style="bottom: 0; right: 0;">
                                    <p>All changes saved on drive.</p>
                                </div> --}}
                            
{{-- 
                            <div id="input-fields-container">
                                <div class="form-group">
                                    <label for="outer_field">Outer Field</label>
                                    <input type="text" name="outer_field" class="form-control">
                                </div>
                                <div class="form-group nested-input-fields-container">
                                    <label for="inner_field">Inner Field</label>
                                    <input type="text" name="inner_field[]" class="form-control">
                                    <button type="button" class="btn btn-danger remove-nested-field">Remove</button>
                                </div>
                                </div>

                                <button type="button" id="add-nested-field" class="btn btn-primary">Add Nested Field</button> --}}


    </body>

    
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>

    $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            $('.select').select2()
        
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            
        })


        
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 4000,
            });



        // Global variables for tracking click count, quiz IDs, and last quiz type
        var click = 0;
        var id;
        var last_id;
        var last_quiz_type = 'multiple_choice';
        $(document).ready(function(){
            var data = {!! json_encode($quizquestions) !!};
            console.log(data);


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
                // autoSaveAnswer(dropElement)
            }

            });

            $('.instruction').summernote({
                                height: 200,
                                toolbar: [
                                        // [groupName, [list of button]]
                                        ['style', ['bold', 'italic', 'underline', 'clear']],
                                        // ['font', ['strikethrough', 'superscript', 'subscript']],
                                        ['fontsize', ['fontsize']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        // ['height', ['height']]
                                                ]
                                });


                $(document).on('click', function(event) {
                    last_quiz_type = $('#quiztype' + last_id).val();
                    if (!$(event.target).closest('#quiztioncontent' + last_id).length) {
                        
                            console.log("Last ID: ", last_id);
                            if(last_quiz_type == 'multiple_choice'){
                                
                                const textareaValue = $('#multiplechoice' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                
                                // the textarea has some text
                                if (textareaValue.length != 0) {
                                
                                    $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/adminviewbook/createquestion",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 1,
                                            id: last_id
                                                },
                                        success: function(response) {
                                        
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'All the changes have been saved'
                                            })

                                            console.log("Question Succesfully save!");
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });
                                    var i = 1;
                                    $('.option' + last_id).each(function() {
                                            // Get the value of the current label element using its id attribute
                                            const value = $(this).text();

                                            console.log(i);
                                            
                                            $.ajax({
                                                type: "get",
                                                dataType: 'json',
                                                url: "/adminviewbook/createchoices",
                                                data: { 
                                                    questionid : last_id,
                                                    sortid: i,
                                                    description : value
                                                        },
                                                success: function(response) {

                                                    console.log("Choices Succesfully save!");
                                                    
                                                },
                                                error: function(xhr) {
                                                    // Handle error here
                                                }
                                            });

                                            i+=1;

                                            });

                                }


                                

                                }
                            else if(last_quiz_type == 'short_answer'){

                        
                                var textareaValue = $('#shortz_answer_question' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);


                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquestion",
                                    data: { 
                                        question : textareaValue,
                                        typeofquiz : 2,
                                        id: last_id
                                            },
                                    success: function(response) {

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'All the changes have been saved'
                                        })
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                                });

                                }

                            else if(last_quiz_type == 'paragraph_answer'){
                                var textareaValue = $('#long_answer_question' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquestion",
                                    data: { 
                                        question : textareaValue,
                                        typeofquiz : 3,
                                        id: last_id
                                            },
                                    success: function(response) {

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'All the changes have been saved'
                                        })
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                                });
                        
                                }
                            
                            else if(last_quiz_type == 'enumeration'){
                        
                                }

                            else if(last_quiz_type == 'instruction'){

                                var textareaValue = $('#instruction_item' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquestion",
                                    data: { 
                                        question : textareaValue,
                                        typeofquiz : 4,
                                        id: last_id
                                            },
                                    success: function(response) {

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'All the changes have been saved'
                                        })
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                                });
                                }

                            else if(last_quiz_type == 'drag_drop'){

                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquestion",
                                    data: { 
                                        question : "Drag and drop",
                                        typeofquiz : 5,
                                        id: last_id
                                            },
                                    success: function(response) {

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'All the changes have been saved'
                                        })
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                                });

                                var i = 1;
                                console.log("Drag and Drop");
                                $('.drag' + last_id).each(function() {
                                        // Get the value of the current label element using its id attribute
                                        const value = $(this).text();
                                        console.log(value)

                                        // console.log(i);
                                        
                                        $.ajax({
                                            type: "get",
                                            dataType: 'json',
                                            url: "/adminviewbook/createdragoption",
                                            data: { 
                                                questionid : last_id,
                                                sortid: i,
                                                description : value
                                                    },
                                            success: function(response) {

                                                console.log("Options Succesfully save!");
                                                
                                            },
                                            error: function(xhr) {
                                                // Handle error here
                                            }
                                        });

                                        i+=1;

                                        });

                                        var i = 1;
                                        $('.drop' + last_id).each(function() {
                                        // Get the value of the current label element using its id attribute
                                        const value = $(this).val();


                                                $.ajax({
                                                    type: "get",
                                                    dataType: 'json',
                                                    url: "/adminviewbook/createdropquestion",
                                                    data: { 
                                                        questionid : last_id,
                                                        sortid: i,
                                                        description : value
                                                            },
                                                    success: function(response) {

                                                        console.log("Drop question Succesfully save!");
                                                        
                                                    },
                                                    error: function(xhr) {
                                                        // Handle error here
                                                    }
                                                    });
                                                i+=1;


                                        });

                                        Toast.fire({
                                            type: 'success',
                                            title: 'All the changes have been saved'
                                        })
                            
                                }

                            else{
                                var quizTitle = $('#quizTitle h3').text();
                                var description = $('#description').val();                        


                                console.log(quizTitle);
                                console.log(description);
                                var quizId = $('#quiz-info').data('quizid');
                                console.log("Quiz ID: ",quizId)

                                if ($('#select-lesson').length) {
                                    // #select-lesson exists, do something with its value
                                    var selectedValues = $('#select-lesson').val();
                                    var selectedValues = ($('#select-lesson').val());
                                    var selectedValuesText = selectedValues.join(', ');
                                    console.log(selectedValuesText);

                                    } else {
                                    // #select-lesson does not exist
                                    var selectedValuesText = $('.d-flex.flex-row').data('quiz');
                                    console.log('#select-lesson does not exist');
                                    }


                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquiztitle",
                                    data: { 
                                        title : quizTitle,
                                        description : description,
                                        coverage : selectedValuesText,
                                        id: quizId
                                            },
                                    success: function(response) {

                                        // Toast.fire({
                                        //     type: 'success',
                                        //     title: 'Title successfully Save!'
                                        //})
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                            });


                            }
                        
                    


                    }
                });
                    


                $('.ui-helper-hidden-accessible').remove();
                $(document).on('click', '.editcontent', function(){
                    last_id = id;
                    $('.ui-helper-hidden-accessible').remove();
                    $('.editcontent').css({
                        "border-right": "5px solid white",
                        "border-radius": "5px"
                        // "padding": "20px",
            
                    });

                    $(this).css({
                        "border-right": "5px solid dodgerblue",
                        "border-radius": "5px"
    
                        // "padding": "20px",
                    });
                        if(id == $(this).attr('id')){
                        click+=1;
                        }else{
                        // option = 0;
                        click =0;
                        }


                        
                        id = $(this).attr('id');
                        id = parseInt(id);
                        console.log("This ID: ", id);
                        
                            $('.btn-group-vertical').remove();
                            var addrowid = $(this).attr('id');
                            
                            // console.log(click)
                            $(this).closest('.row').find('.rowhidden' + id).append(
                                    '<div class="btn-group-vertical">' +
                                        '<a class="btn btn-sm text-white gfg_tooltip delrow" id="'+id+'" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                        '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' + '</a>' + 
                                        '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                        '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                        '</a>' +                                      
                                    '</div>' +
                                    '</div>'
                            )
                    
        
                        })

                    $(document).on('click', '.delrow', function(){
                        console.log("$(this).attr('id')");
                        console.log($(this).attr('id'));
                        var rowid = $(this).attr('id');

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

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/delquestion",
                                    data: { 
                                        id: rowid
                                            },
                                    complete: function(data){
                                    $('.dragrow' + rowid).remove()
                                    Swal.fire({
                                        title: 'Deleted successfully',
                                        type: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Close',
                                        allowOutsideClick: false
                                    })
                                }
                            });
                        }
                    })

                        

                        // $('.dragrow' + rowid).remove();
                    })




                    
                    $(document).on('click', '.newrow', function(){
                        var addrow;
                        var quizId = $('#quiz-info').data('quizid');

                        $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/addquestion",
                                    data: { 
                                        quizid : quizId,
                                            },
                                    success: function(response) {

                                        addrow = response;
                                        console.log("Row ID: ", typeof addrow);
                        
                        
                                        $('.ui-helper-hidden-accessible').remove();
                                        option= 1;
                                        $('.btn-group-vertical').remove();
                                        console.log("Hello World")
                                        console.log(addrow)
                                        $(this).closest('.row').find('.rowhidden').empty()
                                        $('.contentcontainer').append(
                                            '<div id="'+addrow+'" class="row p-4 dragrow'+addrow+'">' +
                                                '<div class="col-lg-1 col-2 rowhidden d-flex align-items-center">' + 
                                                '<div class="btn-group-vertical">' +
                                                    '<a class="btn btn-sm text-white gfg_tooltip delrow" id="'+addrow+'" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                    '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' +
                                                    '</a>' + 
                                                    '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                    '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                                    '</a>' +                                      
                                                '</div>' +
                                                '</div>' +
                                                '<div id="'+addrow+'" class="col-lg-11 col-10 editcontent col-content">' +
                                                '<div class="card mt-5 shadow-none border-0">' +
                                                '<div class="card-header">' +
                                                    '<div class="row justify-content-end">' +
                                                        '<div class="col-6 mr-1 quizarea">' +
                                                            '<select class="form-control quiztype" id="quiztype'+addrow+'">' +
                                                            '<option value="multiple_choice">Multiple Choice</option>' +
                                                            '<option value="instruction">Instruction</option>' +
                                                            '<option value="short_answer">Short Answer</option>' +
                                                            '<option value="paragraph_answer">Paragraph</option>'+
                                                            '<option value="enumeration">Enumeration</option>' +
                                                            '<option value="drag_drop">Drag & drop</option>' +
                                                            '</select>' +
                                                        '</div>' +
                                                        '<div class="col-12">'+
                                                        '<div id="quiztioncontent'+addrow+'">'+
                                                            '<div class="col-12 m-2">'+
                                                                '<textarea class="form-control" placeholder="Untitled question" style="height: 20px !important;" id="multiplechoice'+addrow+'" ></textarea>'+
                                                            '</div>'+
                                                            '<div class="col-12 ml-4"  id="list_option'+addrow+'">' +
                                                                '<input class="form-check-input" type="radio" name="option1" value="1">'+
                                                                '<label class="form-check-label option'+addrow+'" id="option'+addrow+'" contenteditable="true">Option '+option+'</label>'+
                                                            '</div>' +
                                                            '<button class="form-control addoption" style="margin: 20px; " id="'+addrow+'">Add option</button>'+
                                                        '</div>' +
                                                        '</div>' +
                                                '</div>' +
                                                '</div>' +
                                                '</div>' +
                                            '</div>');


                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                        });

                            // $('#multiplechoice' + addrow).summernote({
                            //     height: 200,
                            //     toolbar: [
                            //             // [groupName, [list of button]]
                            //             ['style', ['bold', 'italic', 'underline', 'clear']],
                            //             // ['font', ['strikethrough', 'superscript', 'subscript']],
                            //             ['fontsize', ['fontsize']],
                            //             ['color', ['color']],
                            //             ['para', ['ul', 'ol', 'paragraph']],
                            //             // ['height', ['height']]
                            //                     ]
                            //     });


                            // summernote();

                    })

                    
                    var option = 0;
                    $(document).on('change', '.quiztype', function(){
                        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
                        var addrowid = $(this).attr('id');
                        var select_quiz_type = $(this).val();
                        last_quiz_type = select_quiz_type;
                        console.log(select_quiz_type);
                        console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        
                        if(select_quiz_type == 'short_answer'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 shortz_answer_question"'+parentId+'" placeholder="Untitled question" style="height: 20px !important;" id="shortz_answer_question'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control m-2 mr-1" placeholder="Short answer text" disabled>');
                        
                        }




                        if(select_quiz_type == 'multiple_choice'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="col-12 m-2">'+
                                                    '<textarea class="form-control" placeholder="Untitled question" style="height: 20px !important;" id="exampleTextarea" ></textarea>'+
                                                '</div>'+
                                                '<div class="col-12 ml-4"  id="list_option'+parentId+'">' +
                                                    '<input class="form-check-input" type="radio" name="option1" value="1">'+
                                                    '<label class="form-check-label" contenteditable="true">Option '+option+'</label>'+
                                                '</div>' +
                                                '<button class="form-control addoption" style="margin: 20px; " id="add_option'+parentId+'">Add option</button>'+
                                            '</div>')
                                            }

                        if(select_quiz_type == 'paragraph_answer'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2" placeholder="Untitled question" style="height: 20px !important;" id="long_answer_question'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control m-2" placeholder="Long answer text" disabled>');

                            // $('#long_answer_question' + parentId).summernote({
                            //     height: 200,
                            //     toolbar: [
                            //             // [groupName, [list of button]]
                            //             ['style', ['bold', 'italic', 'underline', 'clear']],
                            //             // ['font', ['strikethrough', 'superscript', 'subscript']],
                            //             ['fontsize', ['fontsize']],
                            //             ['color', ['color']],
                            //             ['para', ['ul', 'ol', 'paragraph']],
                            //             // ['height', ['height']]
                            //                     ]
                            //     });
                        }
                        
                        if(select_quiz_type == 'enumeration'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2" placeholder="Untitled question" id="exampleTextarea" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<div id="item_option'+parentId+'">' + 
                                '<input type="text" class="form-control m-2" placeholder="Item text" disabled>'+
                                '</div>');
                            $('#quiztioncontent' + parentId).append('<button class="form-control additem" style="margin: 8px; " id="add_item'+parentId+'">Add Item</button>')

                    
                        }

                        if(select_quiz_type == 'instruction'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="col-12 m-2">'+
                                                    '<textarea class="form-control" placeholder="Untitled instruction" style="height: 20px !important;" id="instruction_item'+parentId+'" ></textarea>'+
                                                '</div>'+
                                            '</div>')
                            $('#instruction_item' + parentId).summernote({
                                height: 200,
                                toolbar: [
                                        // [groupName, [list of button]]
                                        ['style', ['bold', 'italic', 'underline', 'clear']],
                                        // ['font', ['strikethrough', 'superscript', 'subscript']],
                                        ['fontsize', ['fontsize']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        // ['height', ['height']]
                                                ]
                                });

                            
                            }

                        if(select_quiz_type == 'drag_drop'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="options p-3 mt-2" id="options'+parentId+'" style="border:3px solid #3e416d;border-radius:6px;">'+
                                    '<div class="drag-option btn bg-primary text-white m-1 drag'+parentId+'" contentEditable="true" data-target="drag-1">Option &nbsp;' + option  + '</div>'+
                                    '</div>' +
                                    '<div class="row justify-content-end p-3 mt-2">' +
                                        '<button class="btn btn-success add_drag_option" id="'+parentId+'">Add drag option</button>'+
                                    '</div>'
                                );

                                // <button class="form-control add_drag_option" style="margin-top: 10px; " id="add_dragoption'+parentId+'">Add drag option</button>`
                            $('#quiztioncontent' + parentId).append('<p><b>Note: </b>To set up the drop area, please input [~input] where you want the drop zone to appear. Ex. The planet ~input is the biggest planet in the solar system</p>' +
                                                '<div id="item_question'+parentId+'">'+
                                                    '<input type="text" class="form-control drop'+parentId+'" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;'+option+'">'+
                                                '</div>'+
                                                '<div class="row justify-content-end p-3 mt-2">' +
                                                    '<button class="btn btn-success add_drag_question"  id="'+parentId+'">Add drop question</button>' +
                                                '</div>'+
                                            '</div>')
                                }


                            
                        
                        // $(this).closest('.row').find('.quizarea2').empty()
                        // $('#' + addrow).append(content)
                        // $('#' + addrow).append(button);

                    })



                    $(document).on('click', '.addoption', function(){
                        option+=1;
                        // var parentId = $(this).closest('.dragrow').attr('id');
                        var parentId = $(this).attr('id');
                        // console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        // $(this).closest('quizarea2').find('.list_option').empty()
                        $('#list_option' + parentId).append('<input class="form-check-input" type="radio" name="option1" value="1">'+
                                                    '<label class="form-check-label option'+parentId+'" contenteditable="true">Option '+option+'</label>')

                    })

                    $(document).on('click', '.add_drag_option', function(){
                        option+=1;
                        // var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
                        var parentId = $(this).attr('id');
                        var addrowid = $(this).attr('id');
                        console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        // $(this).closest('quizarea2').find('.list_option').empty()
                        $('#options' + parentId).append('<div class="drag-option btn bg-primary text-white m-1 drag'+parentId+'" contentEditable="true" data-target="drag-1">Option &nbsp;'+option+'</div>')

                    })

                    $(document).on('click', '.add_drag_question', function(){
                        option+=1;
                        var parentId = $(this).attr('id');
                        var addrowid = $(this).attr('id');
                        console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        // $(this).closest('quizarea2').find('.list_option').empty()
                        $('#item_question' + parentId).append('<input type="text" class="form-control drop'+parentId+'" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;'+option+'">')

                    })

                    $(document).on('click', '.additem', function(){
                        option+=1;
                        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
                        var addrowid = $(this).attr('id');
                        console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        // $(this).closest('quizarea2').find('.list_option').empty()
                        $('#item_option' + parentId).append('<input type="text" class="form-control m-2" placeholder="Item text" disabled>')

                    })


                    $(document).on('click', '#my-card', function(){
                        console.log("Hello")

                        var quizId = $('#quiz-info').data('quizid');
                        console.log(quizId);
                        $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/delcoverage",
                                    data: { 
                                        id: quizId
                                
                                            },
                                    success: function(response) {

                                        console.log("Not Error");

                                        // Toast.fire({
                                        //     type: 'success',
                                        //     title: 'Title successfully Save!'
                                        //})
                                        
                                    },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });

                            window.location.reload();
                        // $(this).closest('.quizarea2').find('.list_option').empty()
                    })


                    

                    $('#select-lesson').select2({
                            allowClear:true,
                            placeholder: "All",
                            "language": {
                                    "noResults": function(){
                                    }
                            },
                            escapeMarkup: function (markup) {
                                    return markup;
                            },
                            ajax: {
                                    url: "{{route('lessonSelect')}}",
                                    data: function (params) {
                                        var query = {
                                                quizId: $('#quiz-info').data('quizid'),
                                                search: params.term,
                                                page: params.page || 0
                                        }
                                        return query;
                                    },
                                    dataType: 'json',
                                    
                                    processResults: function (data, params) {
                                        params.page = params.page || 0;
                                        return {
                                                results: data.results,
                                                pagination: {
                                                    more: data.pagination.more
                                                }
                                        };
                                        
                                    },
                            }
                        })

                        
                    // Add click event listener to answer key button
                    $('.answer-key').click(function() {

                        var parentId = $(this).attr('id');


                        console.log(parentId)

                        $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/getquestion",
                                    data: { 
                                        id: parentId
                                
                                            },
                                    success: function(response) {
                                            console.log(response);

                                            $('#quiztype' + parentId).prop('disabled', true);


                                            var html = `<div class="row">
                                                            <div class="col-12 m-2">
                                                                <label>1. ${response.question}</label>`;

                                            response.choices.forEach(function(item) {
                                                html += `<div class="form-check mt-2">
                                                            <input data-question-type="${item.typeofquiz}" data-question-id="${response.id}" id="${item.id}" class="answer-field form-check-input" type="radio" name="${response.id}" value="${item.id}">
                                                            <label for="${item.id}" class="form-check-label itemchoices">
                                                                ${item.description}
                                                            </label>
                                                        </div>`;
                                            });

                                            html += `</div><div class="col-12 p-3 text-end">
                                                                        <button class="btn btn-primary btn-sm answerdone" id="${response.id}">Done</button>
                                                                    </div></div>`;

                                            $('#quiztioncontent' + parentId).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });

                        




                        })

                        $(document).on('click', '.answerdone', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/returneditquiz",
                                    data: { 
                                        id: id
                                
                                            },
                                    success: function(response) {
                                            console.log(response);

                                            $('#quiztype' + id).prop('disabled', false);


                                            var html = `<div class="row">
                                                            <div class="col-12 m-2">
                                                                <textarea class="form-control" placeholder="Untitled question" id="multiplechoice${response.id}" > ${response.question}</textarea>`;

                                            response.choices.forEach(function(item) {
                                                html += `<div class="col-12">
                                                <input class="form-check-input ml-2" type="radio" name="option${response.id}" value="${item.id}">
                                                <label class="form-check-label ml-5 option${response.id}" id="option${response.id}" contenteditable="true">
                                                ${item.description}`;
                                                
                                                if(item.answer == 1){
                                                    html +=`<span class= "ml-2"><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>`;
                                                }
                                                
                                                
                                                html += `</label>
                                                </div>`;
                                            });


                                            

                                            html += `<button class="form-control addoption" style="margin: 20px; " id="${response.id}">Add option</button>`;

                                            $('#quiztioncontent' + id).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });



                        });



                        $(document).on('click', '.itemchoices', function(){
                            var radioBtnId = $(this).attr("for");
                            var inputElement = $(`input.answer-field[id='${radioBtnId}']`);

                            inputElement.prop("checked", true);
                            autoSaveAnswer(inputElement);

                            $('.form-check-label').css({
                                "background": "white",
                                "padding": "2px"
            
                            });

                            $(this).css({
                                "background-color": "rgba(0, 128, 0, 0.5)",
                                "padding": "2px"
            
                                // "padding": "20px",
                            });
                        });

    

                        //auto save answer when switching to 
                        $(document).on('change', '.answer-field', function(){
                            autoSaveAnswer(this);
                            

                        });

                        function autoSaveAnswer(thisElement) {
                            var answer = $(thisElement).val();
                            var questionId = $(thisElement).data('question-id');

                            console.log(`student answer: ${answer}, question-id: ${questionId}`)

                            $.ajax({
                                url: '/adminviewbook/save-answer-key',
                                method: 'GET',
                                data: {
                                answer: answer,
                                question_id: questionId

                                },
                                success: function(response) {
                                    console.log(response);
                                
                                    //Handle the response from the server if needed
                                }
                            });

                        }
                    });



        </script>


@endsection