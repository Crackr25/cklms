@extends('teacher.layouts.app')

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

            .border-red {
                border-color: red;
            }

            .form-check-label.choice {
                border: none;
                background-color: transparent;
                font-size: inherit;
                font-family: inherit;
                cursor: pointer;
                padding: 0;
            }






    </style>

<body class="dark">
            <div class="container" id="quiz-info"  data-quizid="{{ $id }}">
                <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="contentcontainer">
                                <div class="row p-4 dragrow">
                                    <div class="col-lg-1 col-2 rowhidden d-flex align-items-center">
                                        <div class="btn-group-verticals">
                                            <a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                <i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>
                                            </a>                                            
                                        </div>
                                    </div>
                    
                                    <div class="col-lg-11 col-10 editcontent col-content" id = "header">
                                        <div class="card mt-5 shadow-none  border-0">
                                            <div class="card-header" id="quizTitle">
                                                <h3 class="text-center" contenteditable="true" >{{$quiz->title}}</h3>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group">
                                                    <label for="description">Quiz Description:</label>
                                                    <textarea class="form-control description" id="description" data-id ="{{ $id }}" value= '{{$quiz->description}}' rows="1">{{$quiz->description}}</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                    

                                    @if(count($quizquestions) > 0)
                                        @foreach($quizquestions as $question)


                                            {{-- Multiple choice --}}

                                            @if($question->typeofquiz == 1)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    <option value="enumeration">Enumeration</option>
                                                                    
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row ml-2">
                                                                        <div class="col-12">
                                                                            <textarea class="form-control question" placeholder="Untitled question" data-id ="{{$question->id}}" data-question-type ="1" id="multiplechoice{{$question->id}}" >{{$question->question}}</textarea>
                                                                        </div>
                                                                        @php
                                                                        $quizchoices = DB::table('teacherquizchoices')
                                                                            ->where('questionid', $question->id)
                                                                            ->where('deleted', 0)
                                                                            ->orderBy('sortid')
                                                                            ->get();


                                                                        @endphp
                                                                        <div class="col-12" id="list_option{{$question->id}}">
                                                                            @if(count($quizchoices) > 0)
                                                                            @foreach($quizchoices as $choice)
                                                                            <div id="containerchoices{{$question->id}}">
                                                                                <input class="form-check-input ml-2" type="radio" name="option1" value="1">
                                                                                <label class="form-check-label ml-5 option{{$question->id}}" id="option{{$question->id}}" contenteditable="true">{{$choice->description}} 
                                                                                    @if($choice->answer==1)
                                                                                        <span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                    <span id= "deletechoice" data-id= "{{$choice->id}}" class = "pl-1"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                                                </label>
                                                                                
                                                                            
                                                                            </div>
                                                                            
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
                                                </div>
                                            </div>
                                        
                                            
                    

                                            {{-- Short Answer --}}

                                            @elseif($question->typeofquiz == 2)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    <option value="enumeration">Enumeration</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h6><label class= "ml-2" for="number_question' + parentId + '">Points:</label></h6>
                                                                            <input type="number" class="form-control m-2 addpoints" placeholder="Required" data-id= "{{$question->id}}" id="Required{{$question->id}}" value="{{$question->points}}">
                                                                            <textarea class="form-control m-2 question" placeholder="Untitled question" data-id ="{{$question->id}}" data-question-type ="2" id="shortz_answer_question{{$question->id}}" >{{$question->question}}</textarea>
                                                                            <h6><label class= "ml-2" for="shortz_answer_answer{{$question->id}}">Guide answer:</label></h6>
                                                                            <textarea class="form-control m-2 setanswer" data-id="{{$question->id}}" placeholder="Set Guide Answer" style="height: 20px !important;" id="shortz_answer_answer{{$question->id}}" >{{$question->guideanswer}}</textarea>
                                                                        </div>
                                                                        <div class="col-12">    
                                                                            <input type="text" class="form-control mt-2 ml-2" placeholder="Short answer text" disabled>
                                                                        </div>                                                
                                                                    </div>
                                                                </div>
                                                            </div>        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                        

                                            {{-- Paragraph --}}
                                            
                                            @elseif($question->typeofquiz == 3)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    <option value="enumeration">Enumeration</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 mt-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h6><label class= "ml-2" for="number_question' + parentId + '">Points:</label></h6>
                                                                            <input type="number" class="form-control m-2 addpoints" placeholder="Required" data-id= "{{$question->id}}" id="Required{{$question->id}}" value="{{$question->points}}">
                                                                            <textarea class="form-control m-2 question" placeholder="Untitled question" data-id ="{{$question->id}}" data-question-type ="3" id="long_answer_question{{$question->id}}" >{{$question->question}}</textarea>
                                                                            <h6><label class= "ml-2" for="long_answer_answer{{$question->id}}">Guide answer: </label></h6>
                                                                            <textarea class="form-control m-2 setanswer" data-id="{{$question->id}}" placeholder="Set Guide Answer" style="height: 20px !important;" id="long_answer_answer{{$question->id}}" >{{$question->guideanswer}}</textarea>
                                                                        </div>
                                                                        <div class="col-12">    
                                                                            <input type="text" class="form-control mt-2 ml-2" placeholder="Long answer text" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    

                                            {{-- Instruction --}}

                                            @elseif($question->typeofquiz == 4)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    <option value="enumeration">Enumeration</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 mt-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <textarea class="form-control m-2 instruction" placeholder="Untitled question" id="instruction_item{{$question->id}}">{{$question->question}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                            
                                            
                                            {{-- Drag and Drop --}}
                                            @elseif($question->typeofquiz == 5)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id="{{$question->id}}" class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-body">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                        <option value="drag_drop">Drag & drop</option>
                                                                        <option value="multiple_choice">Multiple Choice</option>
                                                                        <option value="short_answer">Short Answer</option>
                                                                        <option value="paragraph_answer">Essay</option>
                                                                        <option value="instruction">Instruction</option>
                                                                        <option value="image">Image Answer</option>
                                                                        <option value="fill_n_blanks">Fill in the blanks</option>
                                                                        <option value="enumeration">Enumeration</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="options p-3 mt-2" id="options{{$question->id}}" style="border:3px solid #3e416d;border-radius:6px;">
                                                                                @php
                                                                                $dragoptions = DB::table('teacher_quiz_drag_option')
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
                                                                            @php
                                                                            $dropquestions = DB::table('teacher_quiz_drop_question')
                                                                                ->where('questionid', $question->id)
                                                                                ->orderBy('sortid')
                                                                                ->get();

                                                                            foreach($dropquestions as $item){
                                                                                $answer = DB::table('teacher_quiz_drop_answer')
                                                                                    ->where('headerid', $item->id)
                                                                                    ->orderBy('sortid')
                                                                                    ->pluck('answer');

                                                                                $answerString = implode(',', $answer->toArray());

                                                                                $item->answer = $answerString;
                                                                            }
                                                                            @endphp
                                                                            @foreach($dropquestions as $item)
                                                                            <div id="item_question{{$question->id}}">
                                                                                <input type="text" class="form-control drop{{$question->id}}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text" value="{{$item->question}}">
                                                                                <span>Answer is 
                                                                                    @if(empty($item->answer))
                                                                                    <em>undefined</em>
                                                                                    @else
                                                                                    <em>{{$item->answer}}</em>.
                                                                                    @endif
                                                                                </span>
                                                                            </div>
                                                                            @endforeach
                                                                            <div class="row justify-content-end p-3 mt-2">
                                                                                <button class="btn btn-success add_drag_question" id="{{$question->id}}">Add drop question</button>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <button class="btn btn-link btn-sm answer-key-drag" id="{{$question->id}}">Answer key</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                    
                                        

                                            {{-- Image answer --}}

                                            @elseif($question->typeofquiz == 6)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    <option value="enumeration">Enumeration</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12 m-2">
                                                                            <h6><label class= "ml-2" for="number_question{{$question->id}}">Points:</label></h6>
                                                                            <input type="number" class="form-control m-2 addpoints" placeholder="Required" data-id= "{{$question->id}}" id="Required{{$question->id}}" value="{{$question->points}}">
                                                                            <textarea class="form-control imageanswer" placeholder="Untitled instruction" style="height: 20px !important;" id="image_item{{$question->id}}">{{$question->question}}</textarea>
                                                                            <input type="file" class="mt-2" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    

                                            {{-- Fill in the blanks --}}
                                            @elseif($question->typeofquiz ==7)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="enumeration">Enumeration</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12 m-2">
                                                                            <p><b>Note: </b>To set up the blanks, please input [~input] where you want the blank to appear. Ex. The planet ~input is the biggest planet in the solar system</p>
                                                                            @php
                                                                                $fillquestions = DB::table('teacher_quiz_fill_question')
                                                                                    ->where('questionid', $question->id)
                                                                                    ->orderBy('sortid')
                                                                                    ->get();

                                                                                foreach($fillquestions as $item){

                                                                                    $answer = DB::table('teacher_quiz_fill_answer')
                                                                                        ->where('headerid', $item->id)
                                                                                        ->orderBy('sortid')
                                                                                        ->pluck('answer');

                                                                                    if(isset($answer)){
                                                                                    $answerString = implode(',', $answer->toArray());

                                                                                    $item->answer = $answerString;
                                                                                        }
                                                                                    }
                                                                            @endphp

                                                                            <div id="item_fill{{$question->id}}">
                                                                                @foreach($fillquestions as $item)
                                                                                    <input type="text" class="form-control fill{{$question->id}}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text" value="{{$item->question}}">
                                                                                
                                                                                    <span>Answer is 
                                                                                                @if(empty($item->answer))
                                                                                                    <em>undefined</em>
                                                                                                @else
                                                                                                    <em>{{$item->answer}}</em>.
                                                                                                @endif
                                                                                                
                                                                                    </span>
                                                                                @endforeach
                                                                            </div>
                                                                        
                                                                            
                                                                            <div class="row justify-content-end p-3 mt-2">
                                                                                <button class="btn btn-success add_fill_question"  id="{{$question->id}}">Add fill question</button>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <button class="btn btn-link btn-sm answer-key-fill" id="{{$question->id}}">Answer key</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                        


                                            

                                            {{-- Enumerations --}}

                                            @elseif($question->typeofquiz == 8)
                                            <div id={{$question->id}} class="row p-4 dragrow{{$question->id}}">
                                                <div class="col-lg-1 col-2 rowhidden buttonholder{{$question->id}} d-flex align-items-center">
                                                </div>
                                                <div id={{$question->id}} class="col-lg-11 col-10 editcontent col-content identifier{{$question->id}}">
                                                    <div class="card mt-5 shadow-none border-0">
                                                        <div class="card-header">
                                                            <div class="row justify-content-end">
                                                                <div class="col-6 mr-1 quizarea">
                                                                    <select class="form-control quiztype" data-id="{{$question->id}}" id="quiztype{{$question->id}}">
                                                                    <option value="enumeration">Enumeration</option>
                                                                    <option value="multiple_choice">Multiple Choice</option>
                                                                    <option value="short_answer">Short Answer</option>
                                                                    <option value="paragraph_answer">Essay</option>
                                                                    <option value="instruction">Instruction</option>
                                                                    <option value="drag_drop">Drag & drop</option>
                                                                    <option value="image">Image Answer</option>
                                                                    <option value="fill_n_blanks">Fill in the blanks</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 m-2" id="quiztioncontent{{$question->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <textarea class="form-control enumeration mt-2 ml-2" placeholder="Untitled question" data-id ="{{$question->id}}" data-question-type ="1" id="enumerationquestion{{$question->id}}" >{{$question->question}}</textarea>
                                                                            <h5><label class= "ml-2 mt-2" for="itemcount">Item:</label></h5>
                                                                            <input type="number" class="form-control mt-2 ml-2 itemcount" placeholder="Item count" data-id= "{{$question->id}}" id="enumerationitem{{$question->id}}" value= "{{$question->item}}">
                                                                            <div id="item_option{{$question->id}}">
                                                                                @php

                                                                                $numberOfTimes = $question->item;

                                                                                $answer = DB::table('teacher_quiz_enum_answer')
                                                                                    ->where('headerid', $question->id)
                                                                                    ->where('deleted', 0)
                                                                                    ->orderBy('sortid')
                                                                                    ->pluck('answer');

                                                                                if(isset($answer)){
                                                                                $answerString = implode(',', $answer->toArray());

                                                                                $answerarray = $answerString;
                                                                                    }
                                                                                    


                                                                                @endphp

                                                                                <span class ="ml-2 mt-2"><b>Answer is  </b>
                                                                                                @if($question->ordered == 0)
                                                                                                        [IN ORDER]
                                                                                                @else
                                                                                                        [RANDOM]
                                                                                                @endif

                                                                                                @if(empty($answerarray))
                                                                                                    <em>undefined</em>
                                                                                                @else
                                                                                                    <em>{{$answerarray}}</em>.
                                                                                                @endif
                                                                                                
                                                                                </span>

                                                                                @for ($i = 0; $i < $numberOfTimes; $i++)
                                                                                    <div class="input-group mt-2">
                                                                                        <input type="text" class="form-control mt-2 ml-2" placeholder="Item text &nbsp;{{$i+1}}" disabled>
                                                                                    </div>
                                                                                @endfor
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 mt-2">
                                                                            <button class="btn btn-link btn-sm ml-2 answer-key-enum" id="{{$question->id}}">Answer key</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                    @endforeach
                                @endif
                            </div>

                        <div class="save mb-5">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <div class="btn btn-success mr-2  btn-lg"  id="save-quiz-score">Save</div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div> 

    </body>

    
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('templatefiles/framework.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
<script>
        
        



        // Global variables for tracking click count, quiz IDs, and last quiz type
        var click = 0;
        var option = 0;
        var id;
        var last_id;
        var last_quiz_type = 'multiple_choice';



        $(document).ready(function(){
            
            
            const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 4000,
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

                $('.imageanswer').summernote({
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

                $(document).on('change', '.description', function() {
                    var description = $(this).val();
                    var quizId = $('#quiz-info').data('quizid');
                    console.log("Description: " ,description, "ID: " , quizId);

                    $.ajax({
                                type: "GET",
                                url: "/teacherquiz/quiz/description",
                                data: { 
                                    description : description,
                                    quizId: quizId
                                        },
                                success: function(response) {

                                    Toast.fire({
                                        type: 'success',
                                        title: 'Description successfully Save!'
                                    })
                                    
                                },
                                error: function(xhr) {
                                    // Handle error here
                                }
                        });


                });

                    $(document).on('click', '.newrow', function(){
                        var addrow;
                        var quizId = $('#quiz-info').data('quizid');

                        $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/addquestion",
                                    data: { 
                                        quizid : quizId,
                                            },
                                    success: function(response) {

                                        addrow = response;
                                        console.log("Row ID: ", typeof addrow);
                        
                        
                                        $('.ui-helper-hidden-accessible').remove();
                                        option= 1;
                                        $('.btn-group-vertical').remove();
                                        $(this).closest('.row').find('.rowhidden').empty()
                                        $('.contentcontainer').append(
                                            '<div id="'+addrow+'" class="row p-4 dragrow'+addrow+'">' +
                                                '<div class="col-lg-1 col-2 rowhidden d-flex align-items-center buttonholder'+addrow+'">' + 
                                                '<div class="btn-group-vertical">' +
                                                    '<a class="btn btn-sm text-white gfg_tooltip delrow" id="'+addrow+'" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                    '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' +
                                                    '</a>' + 
                                                    '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                    '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                                    '</a>' +                                      
                                                '</div>' +
                                                '</div>' +
                                                '<div id="'+addrow+'" class="col-lg-11 col-10 editcontent col-content identifier'+addrow+'">' +
                                                '<div class="card mt-5 shadow-none border-0">' +
                                                '<div class="card-header">' +
                                                    '<div class="row ml-2 justify-content-end">' +
                                                        '<div class="col-6 mr-1 quizarea">' +
                                                            '<select class="form-control quiztype" data-id="'+addrow+'" id="quiztype'+addrow+'">' +
                                                            '<option value="multiple_choice">Multiple Choice</option>' +
                                                            '<option value="instruction">Instruction</option>' +
                                                            '<option value="short_answer">Short Answer</option>' +
                                                            '<option value="paragraph_answer">Essay</option>'+
                                                            '<option value="enumeration">Enumeration</option>' +
                                                            '<option value="fill_n_blanks">Fill in the blanks</option>' +
                                                            '<option value="drag_drop">Drag & drop</option>' +
                                                            '<option value="image">Image Answer</option>' +
                                                            '</select>' +
                                                        '</div>' +
                                                        '<div class="col-12">'+
                                                        '<div id="quiztioncontent'+addrow+'">'+
                                                            '<div class="row">' +  
                                                            '<div class="col-12 m-2">'+
                                                                '<textarea class="form-control question" placeholder="Untitled question" data-id ="'+addrow+'" data-question-type ="1" style="height: 20px !important;" id="multiplechoice'+addrow+'" ></textarea>'+
                                                            '</div>'+
                                                            '<div class="col-12"  id="list_option'+addrow+'">' +
                                                                '<input class="form-check-input ml-2" type="radio" name="option1" value="1">'+
                                                                '<label class="form-check-label option'+addrow+' ml-5" id="option'+addrow+'" contenteditable="true">Option '+option+'</label>'+
                                                            '</div>' +
                                                            '<button class="form-control addoption" style="margin: 20px; " id="'+addrow+'">Add option</button>'+
                                                        '</div>' +
                                                        '<div class="col-12">' +
                                                            '<button class="btn btn-link btn-sm answer-key" id="'+addrow+'">Answer key</button>'+
                                                        '</div>'+
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


                    })


                    $(document).on('change', '.question', function(){
                            var dataid = $(this).data('id');
                            var type = $(this).data('question-type');
                            var question = $(this).val();





                            //check if Question has value
                            if (question.length != 0) {
                            
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/createquestion",
                                    data: { 
                                        question : question,
                                        typeofquiz : type,
                                        id: dataid
                                            },
                                    success: function(response) {

                                        if (response == 1){
                                    
                                        Toast.fire({
                                            type: 'success',
                                            title: 'All the changes have been saved'
                                        })

                                        }

                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                                });
                            }
                            
    

                        });

                        $(document).on('click', '.addoption', function(){
                            option+=1;
                            var parentId = $(this).attr('id');
                            console.log("ID: ", parentId)
                            $('#list_option' + parentId).append(`<input class="form-check-input ml-2" type="radio" name="option1" value="1">
                            <label class="form-check-label ml-5  option${parentId}" contenteditable="true">Option ${option}</label>`)
                        
                        })


                        $(document).on('click', '#save-quiz-score', function(){
                            
                            UIkit.notification({
                                        message: '<span uk-type="type: check"></span> All changes has been save!',
                                        status: 'success',
                                        timeout: 1000
                                        });
                        })



                    
                        $(document).on('click', '.editcontent', function(){
                            last_id = id;
                            $('.editcontent').css({
                                "border-right": "5px solid white",
                                "border-radius": "5px"                    
                            });

                            $(this).css({
                                "border-right": "5px solid dodgerblue",
                                "border-radius": "5px"
                            });
                                


                                
                                id = $(this).attr('id');
                                console.log("This ID: ", id);

                                $('.btn-group-vertical').remove();

                                $(this).closest('.row').find('.buttonholder' + id).append(
                                            '<div class="btn-group-vertical">' +
                                                '<a class="btn btn-sm text-white gfg_tooltip delrow" id="'+id+'" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' + '</a>' + 
                                                '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                                '</a>' +                                      
                                            '</div>' +
                                            '</div>'
                                    );
                                
                                    
                            
                
                                })




                            $(document).on('click', '.delrow', function(){
                                console.log("$(this).attr('id')");
                                console.log($(this).attr('id'));
                                var rowid = $(this).attr('id');

                                $('.dragrow' + rowid).remove()

                                        $.ajax({
                                                type: "get",
                                                dataType: 'json',
                                                url: "/teacherquiz/delquestion",
                                                data: { 
                                                    id: rowid
                                                        },
                                                complete: function(data){
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









                                


                $(document).on('click', function(event) {
                    last_quiz_type = $('#quiztype' + last_id).val();

                    if (!$(event.target).closest('.dragrow' + last_id).length || $(event.target).hasClass('delrow')) {
                        
                            console.log("Last ID: ", last_id);
                            
                            if(last_quiz_type == 'multiple_choice'){
                                
                                const textareaValue = $('#multiplechoice' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                
                                // the textarea has some text
                                if (textareaValue.length != 0) {
                                
                                    var i = 1;
                                    $('.option' + last_id).each(function() {
                                            // Get the value of the current label element using its id attribute
                                            const value = $(this).text().trim();

                                            console.log(i);
                                            
                                            $.ajax({
                                                type: "get",
                                                dataType: 'json',
                                                url: "/teacherquiz/createchoices",
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


                            
                            else if(last_quiz_type == 'enumeration'){

                                var textareaValue = $('#enumerationquestion' + last_id).val();
                                var itemval = $('#enumerationitem' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                console.log("Enumeration ITEM: ", itemval);


                                if (itemval !== '' && itemval !== undefined && itemval > 0) {
                                    console.log("Has value");
                                    $('#enumerationitem' + last_id).css('border-color', 'black');
                                    $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/teacherquiz/createquestionitem",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 8,
                                            item : itemval,
                                            id: last_id
                                                },
                                        success: function(response) {

                                            if (response == 1){

                                        
                                            Toast.fire({
                                                type: 'success',
                                                title: 'All the changes have been saved'
                                                
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });

                                }else{
                                    UIkit.notification({
                                        message: '<span uk-type="type: close"></span> Item Required!',
                                        status: 'error',
                                        timeout: 1000
                                        });

                                    $('#enumerationitem' + last_id).css('border-color', 'red');
                                    $('#enumerationitem' + last_id).focus();



                                }


                        
                                }

                            else if(last_quiz_type == 'instruction'){

                                var textareaValue = $('#instruction_item' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                
                                if (textareaValue.length != 0) {
                                    $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/teacherquiz/createquestion",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 4,
                                            id: last_id
                                                },
                                        success: function(response) {

                                            if (response == 1){
                                        
                                            Toast.fire({
                                                type: 'success',
                                                title: 'All the changes have been saved'
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });
                                }
                            }

                            else if(last_quiz_type == 'drag_drop'){

                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/createquestion",
                                    data: { 
                                        question : "Drag and drop",
                                        typeofquiz : 5,
                                        id: last_id
                                            },
                                    success: function(response) {

                                        if (response == 1){
                                        
                                            Toast.fire({
                                                type: 'success',
                                                title: 'All the changes have been saved'
                                            })

                                            }
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                                });

                                var i = 1;
                                console.log("Drag and Drop");
                                $('.drag' + last_id).each(function() {
                                        // Get the value of the current label element using its id attribute
                                        const value = $(this).text().trim();
                                        console.log(value)

        
                                        
                                        $.ajax({
                                            type: "get",
                                            dataType: 'json',
                                            url: "/teacherquiz/createdragoption",
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
                                console.log(value);

                                        $.ajax({
                                            type: "get",
                                            dataType: 'json',
                                            url: "/teacherquiz/createdropquestion",
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

                            else if(last_quiz_type == 'image'){

                                var textareaValue = $('#image_item' + last_id).val();
                                var points = $('#Required' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);


                                if(points !== '' && points !== undefined && textareaValue.length != 0) {
                                    $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/teacherquiz/createquestion",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 6,
                                            id: last_id
                                                },
                                        success: function(response) {

                                            if (response == 1){
                                        
                                            Toast.fire({
                                                type: 'success',
                                                title: 'All the changes have been saved'
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });
                                }else{


                                    UIkit.notification({
                                        message: '<span uk-type="type: close"></span> Points Required!',
                                        status: 'error',
                                        timeout: 1000
                                        });

                                    $('#Required' + last_id).focus();


                                }
                                
                                }

                            else if(last_quiz_type == 'short_answer' || last_quiz_type == 'paragraph_answer')
                            {

                                var points = $('#Required' + last_id).val();
                                console.log("points: ", points);
                                console.log("Quiztype: ", last_quiz_type);


                                if(points === ''){

                                    UIkit.notification({
                                        message: '<span uk-type="type: close"></span> Points Required!',
                                        status: 'error',
                                        timeout: 1000
                                        });

                                    $('#Required' + last_id).focus();
                                
                                }


                            }

                            else if(last_quiz_type == 'fill_n_blanks'){


                                    var i = 1;
                                    var validation = true;
                                    

                                    $('.fill' + last_id).each(function() {
                                            // Get the value of the current label element using its id attribute
                                            const value = $(this).val();

                                            console.log(i);
                                            console.log(value);


                                            if (value.length != 0) {

                                                if(i==1){

                                                    $.ajax({
                                                        type: "get",
                                                        url: "/teacherquiz/createquestion",
                                                        data: { 
                                                            question : "Fill in the blanks",
                                                            typeofquiz : 7,
                                                            id: last_id
                                                                },
                                                        success: function(response) {

                                                            if (response == 1){
                                                        
                                                            Toast.fire({
                                                                type: 'success',
                                                                title: 'All the changes have been saved'
                                                            })

                                                            }
                                                            
                                                        },
                                                        error: function(xhr) {
                                                            // Handle error here
                                                        }
                                                    });
                                                }

                                                $.ajax({
                                                        type: "get",
                                                        url: "/teacherquiz/createfillquestion",
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

                                            }
                                        

                                            

                                            });

                                }
                    }
                });
                    



            
                    
                    var option = 0;
                    var enumerationitem = 1;
                    $(document).on('change', '.quiztype', function(){
                        var parentId = $(this).attr('data-id');
                        var addrowid = $(this).attr('id');
                        var select_quiz_type = $(this).val();
                        last_quiz_type = select_quiz_type;
                        console.log(select_quiz_type);
                        console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        
                        if(select_quiz_type == 'short_answer'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="number_question' + parentId + '">Points:</label></h6>');
                            $('#quiztioncontent' + parentId).append('<input type="number" class="form-control m-2 addpoints" placeholder="Required" data-id= "' + parentId + '" id="Required' + parentId + '">');
                            $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="shortz_answer_question' + parentId + '">Question:</label></h6>');
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 question shortz_answer_question"'+parentId+'" data-id ="'+parentId+'" data-question-type ="2" placeholder="Untitled question" style="height: 20px !important;" id="shortz_answer_question'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="shortz_answer_answer' + parentId + '">Guide answer</label></h6>');
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 setanswer" data-id="'+parentId+'" placeholder="Set Guide Answer:" style="height: 20px !important;" id="shortz_answer_answer'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control mt-2 ml-2" placeholder="Short answer text" disabled>');
                        
                        }


                        if(select_quiz_type == 'multiple_choice'){
                            option = 1;
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="row">'+
                                                                        '<div class="col-12 m-2">'+
                                                                            '<textarea class="form-control question" placeholder="Untitled question" data-id ="'+parentId+'" data-question-type ="1" id="exampleTextarea" ></textarea>'+
                                                                        '</div>'+
                                                                        '<div class="col-12 ml-4"  id="list_option'+parentId+'">' +
                                                                            '<input class="form-check-input" type="radio" name="option1" value="1">'+
                                                                            '<label class="form-check-label" contenteditable="true">Option '+option+'</label>'+
                                                                        '</div>' +
                                                                        '<button class="form-control addoption" style="margin: 20px;" data-id="'+parentId+'" id="'+parentId+'">Add option</button>'+
                                                                        '</div>' +
                                                                        '<div class="col-12">' +
                                                                            '<button class="btn btn-link btn-sm answer-key" id="'+addrow+'">Answer key</button>'+
                                                                        '</div>')
                                            }

                        if(select_quiz_type == 'paragraph_answer'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="number_question' + parentId + '">Points:</label></h6>');
                            $('#quiztioncontent' + parentId).append('<input type="number" class="form-control m-2 addpoints" placeholder="Required" data-id= "' + parentId + '" id="Required' + parentId + '">');
                            $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="long_answer_question' + parentId + '">Question:</label></h6>');
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 question" placeholder="Untitled question" data-id ="'+parentId+'" data-question-type ="3" style="height: 20px !important;" id="long_answer_question'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="Long_answer_answer' + parentId + '">Guide answer:</label></h6>');
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 setanswer"'+parentId+'" placeholder="Set Guide Answer:" style="height: 20px !important;" id="long_answer_answer'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control mt-2 ml-2" placeholder="Long answer text" disabled>');

                            
                        }
                        
                        if(select_quiz_type == 'enumeration'){
                            enumerationitem = 1;
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="row">'+
                                                                    '<div class="col-12 m-2">')
                            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2" placeholder="Untitled question" data-id ="'+parentId+'" data-question-type ="8" id="enumerationquestion'+parentId+'" ></textarea>');
                            $('#quiztioncontent' + parentId).append('<input type="number" class="form-control mt-2 ml-2" placeholder="Item count" data-id= "' + parentId + '" id="enumerationitem' + parentId + '">');
                            $('#quiztioncontent' + parentId).append('</div>' +
                                                                    '</div>');
                            $('#quiztioncontent' + parentId).append('<div class="col-12">'+
                                '<button class="btn btn-link btn-sm ml-2 answer-key-enum" id="'+parentId+'">Answer key</button>'+
                            '</div>')

                    
                        }



                        if(select_quiz_type == 'instruction'){
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="row">'+
                            '                                           <div class="col-12 m-2">'+
                                                                            '<textarea class="form-control mt-2 question" placeholder="Untitled instruction" style="width: 100% !important;" data-id ="'+parentId+'" data-question-type ="1" id="instruction_item'+parentId+'" ></textarea>'+
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


                            if(select_quiz_type == 'fill_n_blanks'){
                                var option = 0;
                                $('#quiztioncontent' + parentId).empty();
                                $('#quiztioncontent' + parentId).append(`<div class="row">
                                                                        <div class="col-12 m-2">
                                                                        <p><b>Note: </b>To set up the blanks, please input [~input] where you want the blank to appear. Ex. The planet ~input is the biggest planet in the solar system</p>
                                                                        <div id="item_fill${parentId}">
                                                                        <input type="text" class="form-control fill${parentId}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;${option}">
                                                                        </div>
                                                                        <div class="row justify-content-end p-3 mt-2">
                                                                        <button class="btn btn-success add_fill_question"  id="${parentId}">Add fill question</button>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <button class="btn btn-link btn-sm answer-key-fill" id="${parentId}">Answer key</button>
                                                                        </div>
                                                                        </div>
                                                                        </div>`);
                            
                            }       

                            
                            

                        if(select_quiz_type == 'drag_drop'){
                            var option = 0;
                            $('#quiztioncontent' + parentId).empty();
                            $('#quiztioncontent' + parentId).append('<div class="row">'+
                                                                    '<div class="col-12 m-2">'+
                                                                    '<div class="options p-3 mt-2" id="options'+parentId+'" style="border:3px solid #3e416d;border-radius:6px;">'+
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
                                                '<div class="col-12">'+
                                                    '<button class="btn btn-link btn-sm answer-key-drag" id="'+parentId+'"">Answer key</button>'+
                                                '</div>'+
                                                '</div>'+ 
                                                '</div>'+
                                                '</div>')
                                }

                            if(select_quiz_type == 'image'){
                                $('#quiztioncontent' + parentId).empty();
                                
                                $('#quiztioncontent' + parentId).append(`<div class="row">
                                                                            <div class="col-12 m-2">`);
                                $('#quiztioncontent' + parentId).append('<h6><label class= "ml-2" for="number_question' + parentId + '">Points:</label></h6>');
                                $('#quiztioncontent' + parentId).append('<input type="number" class="form-control m-2 addpoints" placeholder="Required" data-id= "' + parentId + '" id="Required' + parentId + '">');
                                                                                
                                $('#quiztioncontent' + parentId).append(`<textarea class="form-control question" placeholder="Untitled instruction" data-id ="${parentId}" data-question-type ="6"  style="height: 20px !important;"  id="image_item${parentId}" ></textarea>
                                                                                <input type="file" class="mt-2" disabled>
                                                                            </div>
                                                                        </div>`);
                                $('#image_item' + parentId).summernote({
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

                    })


                    $(document).on('click', '#deletechoice', function(){

                            console.log("Delete button clicked!");

                            var id = $(this).data('id');
                            $(this).parent().parent().remove();


                            

                            $.ajax({
                                url: '/teacherquiz/del-choices',
                                method: 'GET',
                                data: {
                                id: id

                                },
                                success: function(response) {
                                    console.log(response);
                                    
                                
                                    //Handle the response from the server if needed
                                }
                            });
                    
                    });



                        // Add click event listener to answer key button
                    $(document).on('click', '.answer-key', function(){

                        var parentId = $(this).attr('id');
                        console.log(parentId)
                        
                        const textareaValue = $('#multiplechoice' + parentId).val();
                        console.log("Question: ", textareaValue);

                        var i = 1;
                        $('.option' + parentId).each(function() {
                                // Get the value of the current label element using its id attribute
                                const value = $(this).text();

                                console.log(i);
                                
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/createchoices",
                                    data: { 
                                        questionid : parentId,
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

                            getQuestion(parentId);
                        
                            });


                        function getQuestion(parentId){

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/getquestion",
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
                                                            <input data-question-type="${item.typeofquiz}" data-question-id="${response.id}" id="${item.id}" class="answer-field form-check-input" type="radio" data-type="1" name="${response.id}" value="${item.id}">
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
                        }


                        function autoSaveAnswer(thisElement) {
                            var answer = $(thisElement).val();
                            var questionId = $(thisElement).data('question-id');
                            var questiontype = $(thisElement).data('type');
                            var sortid = $(thisElement).data('sortid');
                            
                            console.log(sortid)

                            console.log(`student answer: ${answer}, question-id: ${questionId}, question type: ${questiontype}`)

                            $.ajax({
                                url: '/teacherquiz/save-answer-key',
                                method: 'GET',
                                data: {
                                answer: answer,
                                question_id: questionId,
                                sortid : sortid,
                                questiontype: questiontype

                                },
                                success: function(response) {
                                    console.log(response);
                                
                                    //Handle the response from the server if needed
                                }
                            });

                        }


                
                        $(document).on('click', '.answerdone', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/returneditquiz",
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
                                                html += `<div class="col-12" id="list_option${response.id}">
                                                <input class="form-check-input ml-2" type="radio" name="option${response.id}" value="${item.id}">
                                                <label class="form-check-label ml-5 option${response.id}" id="option${response.id}" contenteditable="true">
                                                ${item.description}`;
                                                
                                                if(item.answer == 1){
                                                    html +=`<span class= "ml-2"><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>`;
                                                }
                                                
                                                
                                                html += `<span id= "deletechoice" data-id= "${item.id}" class = "pl-1"><i class="fa fa-trash" aria-hidden="true"></i></span></label>
                                                </div>`;
                                            });


                                            

                                            html += `<button class="form-control addoption" style="margin: 20px; " id="${response.id}">Add option</button>`;
                                            html += `<div class="col-12">
                                                    <button class="btn btn-link btn-sm answer-key" id="${response.id}">Answer key</button>
                                                    </div>`;

                                            $('#quiztioncontent' + id).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });
                        });

                        
                        $(document).on('change', '.addpoints', function(){

                            var dataid = $(this).data('id');
                            var points = $(this).val();


                            console.log("ID: ", dataid,"Points:", points);

                            $.ajax({
                                url: '/teacherquiz/setpoints',
                                method: 'GET',
                                data: {
                                dataid : dataid,
                                points : points

                                },
                                success: function(response) {

                                    console.log("Done")
                                    
                                
                                    //Handle the response from the server if needed
                                }
                            });

                            

                        });

                $(document).on('change', '.setanswer', function(){
                            var dataid = $(this).data('id');
                            var answer = $(this).val();
                            console.log("ID: ", dataid,"Answer:", answer);

                            $.ajax({
                                url: '/teacherquiz/setguideanswer',
                                method: 'GET',
                                data: {
                                dataid : dataid,
                                answer : answer

                                },
                                success: function(response) {

                                    console.log("Done")
                                    
                                
                                    //Handle the response from the server if needed
                                }
                            });
                            

                        });


                        $(document).on('click', '.answer-key-enum', function(){
                            var parentId = $(this).attr('id');
                            console.log(parentId)

                            var itemval = $('#enumerationitem' + parentId).val();


                            var textareaValue = $('#enumerationquestion' + parentId).val();
                            console.log("Question: ", parentId);
                            console.log("Quiztype: ", parentId);
                            console.log("Enumeration ITEM: ", itemval);

                                if (textareaValue.length != 0) {
                                    $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/teacherquiz/createquestionitem",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 8,
                                            item : itemval,
                                            id: parentId
                                                },
                                        success: function(response) {

                                            if (response == 1){

                
                                        
                                            Toast.fire({
                                                type: 'success',
                                                title: 'All the changes have been saved'
                                                
                                            })

                                            getenum(parentId)

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });

                                }

                        });

                        function getenum(parentId){

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/getenumquestion",
                                    data: { 
                                        id: parentId
                                
                                            },
                                    success: function(response) {
                                            console.log(response);

                                            $('#quiztype' + parentId).prop('disabled', true);
                                            

                                            var html = `<div class="form-check mt-2 ml-4 border border-4 p-3 pl-2">
                                                            <input data-type="16" data-question-id="${response.id}" class="answer-field form-check-input" type="radio" name="${response.id}" value="0">
                                                            <label for="0" class="form-check-label">
                                                                Order answer
                                                            </label>
                                                        `
                                            html += `
                                                            <input data-type="16" data-question-id="${response.id}" class="answer-field form-check-input" type="radio" name="${response.id}" value="1">
                                                            <label for="1" class="form-check-label">
                                                                Random
                                                            </label>
                                                        </div>`

                                            html +=`<p class="ml-4 mt-2 mb-2">A. ${response.question} </p>`
                                            html +=`<ol>`

                                            for (var i = 0; i < response.item; i++){

                                            html +=   `<div class="row">
                                                    <div class="col-md-12">
                                                        <li>
                                                            <p class="ml-2 d-inline">
                                                                
                                                                <input
                                                                    data-question-id="${response.id}"
                                                                    data-sortid="${i + 1}"
                                                                    data-question-type="8"
                                                                    data-type="8"
                                                                    id="enumerationfield"
                                                                    class="answer-field d-inline form-control q-input"`
                                                            

                                            if (response.answer.length !== 0 && i < response.answer.length) {
                                                                    html += `value="${response.answer[i].answer}"`;
                                            }


                                            html +=         `type="text">  
                                                            </li>
                                                        </p>
                                                    </div>
                                                </div>`
                                            }

                                            html +=`</ol>`

                                            html += `</div><div class="col-12 p-3 text-end">
                                                                        <button class="btn btn-dark btn-sm answerdoneenum" id="${response.id}">Done</button>
                                                                        <button class="btn btn-dark btn-sm clearanswer" id="${response.id}">Clear all Answer</button>
                                                                    </div></div>`;

                                            $('#quiztioncontent' + parentId).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                                    })

                        }



                        //auto save answer when switching to 
                        $(document).on('change', '.answer-field', function(){
                            autoSaveAnswer(this);
                            

                        });




                        $(document).on('click', '.answerdoneenum', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/returneditquizenum",
                                    data: { 
                                        id: id
                                
                                            },
                                    success: function(response) {
                                            console.log(response);


                                            $('#quiztype' + id).prop('disabled', false);


                                            var html = `<div class="row">
                                                            <div class="col-12 m-2">
                                                                <textarea class="form-control enumeration mt-2 ml-2" placeholder="Untitled question" id="enumerationquestion${response.id}" > ${response.question}</textarea>
                                                                <h5><label class= "ml-2 mt-2" for="itemcount">Item:</label></h5>
                                                                <input type="number" class="form-control mt-2 ml-2 itemcount" placeholder="Item count" data-id= "${response.id}" id="enumerationitem${response.id}" value= "${response.item}">`;
                                            html += `<div id="item_option${response.id}}">
                                            <span class ="ml-2 mt-2"><b>Answer is  </b>`;

                                            
                                            if(response.ordered == 0){
                                            html +=` [IN ORDER]`;
                                            }else{
                                            html += `[RANDOM]`;
                                            }
                    

                                            if(response.answer.length < 0){
                                            
                                            html += `<em>undefined</em>`;
                                            
                                            }else{
                                            
                                            html +=    `<em>${response.answer}</em>.`;
                                        
                                            }
                                                                                    
                                            html+= `</span>`;


                                            for (var i = 0; i < response.item; i++) {

                                                html += `<div id="item_option${response.id}}">
                                                            <div class="input-group mt-2">
                                                                <input type="text" class="form-control mt-2 ml-2" placeholder="Item text &nbsp;${i+1}" disabled>
                                                            </div>`;


                                            }

                                            html+=       `</div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                <button class="btn btn-link btn-sm answer-key-enum" id="${response.id}">Answer key</button>
                                            </div>
                                        </div>`;

                                            
                                            
                                            $('#quiztioncontent' + id).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });


                        

                        



                        });

                        $(document).on('click', '.clearanswer', function(){

                            var parentId = $(this).attr("id");


                            $.ajax({
                                                type: "get",
                                                url: "/teacherquiz/clearanswerenum",
                                                data: { 
                                                    parentId : parentId,
                                                        },
                                                success: function(response) {

                                                    UIkit.notification({
                                                    message: '<span uk-type="type: check"></span> The answer has been cleared!',
                                                    status: 'success',
                                                    timeout: 1000
                                                    });
                                                    
                                                    
                                                },
                                                error: function(xhr) {
                                                    // Handle error here
                                                }

                                    
                            });

                            $('.answerdoneenum').click();
                            
                            
                            console.log("Done clearing answer")
                            

                        });

                        $(document).on('click', '.add_fill_question', function(){
                            option+=1;
                            var parentId = $(this).attr('id');
                            console.log("IDs: ", parentId)
                            $('#item_fill' + parentId).append(`<input type="text" class="form-control fill${parentId}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;${option}">`)
                        
                        })




                        
                        $(document).on('click', '.answer-key-fill', function(){
                            var parentId = $(this).attr('id');

                            var i = 1;
                            var validation = true;
                            

                            $('.fill' + parentId).each(function() {
                                    // Get the value of the current label element using its id attribute
                                    const value = $(this).val();

                                    console.log(i);
                                    console.log(value);


                                    if (value.length != 0) {

                                        if(i==1){

                                            $.ajax({
                                                type: "get",
                                                url: "/teacherquiz/createquestion",
                                                data: { 
                                                    question : "Fill in the blanks",
                                                    typeofquiz : 7,
                                                    id: parentId
                                                        },
                                                success: function(response) {

                                                    if (response == 1){
                                                
                                                    Toast.fire({
                                                        type: 'success',
                                                        title: 'All the changes have been saved'
                                                    })

                                                    }
                                                    
                                                },
                                                error: function(xhr) {
                                                    // Handle error here
                                                }
                                            });
                                        }

                                        $.ajax({
                                                type: "get",
                                                url: "/teacherquiz/createfillquestion",
                                                data: { 
                                                    questionid : parentId,
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

                                    }
                                

                                    

                                    });

                            getfillquestion(parentId)



                            


                            console.log(parentId);



                        });

                        function getfillquestion(parentId){

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/getfillquestion",
                                    data: { 
                                        id: parentId
                                
                                            },
                                    success: function(response) {
                                            console.log(response);

                                            $('#quiztype' + parentId).prop('disabled', true);
                                            var html ='';

                                            response.fill.forEach(function(item) {
                                                html += `<p class="ml-2">${item.sortid}. ${item.question} </p>`;
                                            
                                            });


                                            html += `</div><div class="col-12 p-3 text-end">
                                                                        <button class="btn btn-dark btn-sm answerdonefill" id="${response.id}">Done</button>
                                                                    </div></div>`;

                                            $('#quiztioncontent' + parentId).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                                    })

                        }


                        $(document).on('click', '.answerdonefill', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/returneditquizfill",
                                    data: { 
                                        id: id
                                
                                            },
                                    success: function(response) {
                                            console.log(response);


                                            $('#quiztype' + id).prop('disabled', false);
                                            var html = ` <p><b>Note: </b>To set up the blanks, please input [~input] where you want the blank to appear. Ex. The planet ~input is the biggest planet in the solar system</p>
                                            <div id="item_fill${response.id}">`
                                
                                            response.fill.forEach(function(item){
                                            html += ` <input type="text" class="form-control fill${response.id}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text" value="${item.question}">
                                            <span>Answer is `
                                                if (!item.answer || item.answer.length === 0) {
                                                    html += `<em>undefined</em>`;
                                                    } else {
                                                    html += `<em>${item.answer}</em>.</span>`;
                                                    }

                                            });

                                            html += `</div>
                                                    <div class="row justify-content-end p-3 mt-2">
                                                    <button class="btn btn-success add_fill_question"  id="${response.id}">Add fill question</button>
                                                    </div>
                                                    <div class="col-12">
                                                    <button class="btn btn-link btn-sm answer-key-fill" id="${response.id}">Answer key</button>
                                                    </div>`

                                        $('#quiztioncontent' + id).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });

                        });


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
                        
                        $('#item_question' + parentId).append('<input type="text" class="form-control drop'+parentId+'" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;'+option+'">')

                    })

                    
                        

                        $(document).on('click', '.answer-key-drag', function(){
                                var parentId = $(this).attr('id');

                                var i = 1;
                                console.log("Drag and Drop");
                                $('.drag' + parentId).each(function() {
                                        // Get the value of the current label element using its id attribute
                                        const value = $(this).text();
                                        console.log(value)

                                        // console.log(i);
                                        
                                        $.ajax({
                                            type: "get",
                                            dataType: 'json',
                                            url: "/teacherquiz/createdragoption",
                                            data: { 
                                                questionid : parentId,
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
                                $('.drop' + parentId).each(function() {
                                // Get the value of the current label element using its id attribute
                                const value = $(this).val();
                                console.log(value);

                                        $.ajax({
                                            type: "get",
                                            dataType: 'json',
                                            url: "/teacherquiz/createdropquestion",
                                            data: { 
                                                questionid : parentId,
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

                            //get drop question
                                $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/teacherquiz/createquestion",
                                        data: { 
                                            question : "Drag and drop",
                                            typeofquiz : 5,
                                            id: parentId
                                                },
                                        success: function(response) {

                                            if (response == 1){
                                            
                                                console.log("Question Save!")

                                                }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });

                            
                             //get drop question question
                            getDropQuestion(parentId);

                        

                        });

                        function getDropQuestion(parentId){

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/getdropquestion",
                                    data: { 
                                        id: parentId
                                
                                            },
                                    success: function(response) {
                                            console.log(response);

                                            $('#quiztype' + parentId).prop('disabled', true);

                                            var html = `<div class="options p-3 mt-2" style="border:3px solid #3e416d;border-radius:6px;">`;
                                            
                                            

                                            response.drag.forEach(function(item) {
                                                html += `<div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">${item.description}</div>`;
                                            
                                            });

                                            html += `</div>`

                                            response.drop.forEach(function(item) {
                                                html += `<p class="ml-2">${item.sortid}. ${item.question} </p>`;
                                            
                                            });

                                            

                                            html += `</div><div class="col-12 p-3 text-end">
                                                                        <button class="btn btn-dark btn-sm answerdonedrag" id="${response.id}">Done</button>
                                                                    </div></div>`;

                                            $('#quiztioncontent' + parentId).empty().append(html);


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

                                                console.log("Ambot what to say")


                                                autoSaveAnswerdragandrop(dropElement)

                                                // auto save answer
                                                // autoSaveAnswer(dropElement)
                                            }

                                            });
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            })
                        }


                        function autoSaveAnswerdragandrop(thisElement) {
                            var answer = $(thisElement).val();
                            var questionId = $(thisElement).data('question-id');
                            var sortId = $(thisElement).data('sortid');

                            console.log(`student answer: ${answer}, question-id: ${questionId}, sort-id: ${sortId}`)

                            $.ajax({
                                url: '/teacherquiz/save-answer-drop',
                                method: 'GET',
                                data: {
                                answer: answer,
                                question_id: questionId,
                                sortId: sortId

                                },
                                success: function(response) {
                                    console.log(response);
                                
                                    //Handle the response from the server if needed
                                }
                            });

                        }

                        $(document).on('click', '.answerdonedrag', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/teacherquiz/returneditquizdrag",
                                    data: { 
                                        id: id
                                
                                            },
                                    success: function(response) {
                                            console.log(response);


                                            $('#quiztype' + id).prop('disabled', false);
                                            var html = `<div class="row">
                                                            <div class="col-12">
                                                                <div class="options p-3 mt-2" id="options${response.id}" style="border:3px solid #3e416d;border-radius:6px;">`
                                            
                                            response.drag.forEach(function(item) {
                                            html += `<div class="drag-option btn bg-primary text-white m-1 drag${response.id}" contentEditable="true" data-target="drag-1">
                                                                                    ${ item.description }
                                                                                </div>`
                                                                            });
                                            
                                            html += `</div>
                                            <div class="row justify-content-end p-3 mt-2">
                                                <button class="btn btn-success add_drag_option" id="${response.id}">Add drag option</button>
                                            </div>

                                            <p><b>Note: </b>To set up the drop area, please input [~input] where you want the drop zone to appear. Ex. The planet ~input is the biggest planet in the solar system</p>
                                            <div id="item_question${response.id}">`
                                
                                            response.drop.forEach(function(item){
                                            html += `<input type="text" class="form-control drop${response.id}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text" value = "${item.question}">
                                            <span>Answer is `
                                                if (!item.answer || item.answer.length === 0) {
                                                    html += `<em>undefined</em>`;
                                                    } else {
                                                    html += `<em>${item.answer}</em>.</span>`;
                                                    }

                                            });

                                            html += `</div>
                                                    <div class="row justify-content-end p-3 mt-2">
                                                        <button class="btn btn-success add_drag_question"  id="${response.id}">Add drop question</button>
                                                    </div>
                                                <div class="col-12">
                                                    <button class="btn btn-link btn-sm answer-key-drag" id="${response.id}">Answer key</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>`

                                        $('#quiztioncontent' + id).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });

                        



                        });


                    });



        </script>


@endsection