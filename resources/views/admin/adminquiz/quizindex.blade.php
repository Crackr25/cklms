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

            .border-red {
                border-color: red;
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
                                                <h3 class="text-center" contenteditable="true">{{$quiz->title}}</h3>
                                                @if(empty($quiz->coverage))
                                                    <h4>Coverage:</h3>
                                                    <div class="row justify-content-center">

                                                        <div class="col-10 mt-2">
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
                                                    <label for="description">Quiz Description:</label>
                                                    <textarea class="form-control" id="description" value= '{{$quiz->description}}' rows="1">{{$quiz->description}}</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                    

                                    @if(count($quizquestions) > 0)
                                        @foreach($quizquestions as $question)


                                            {{-- Multiple choice --}}
                                        @switch($question->typeofquiz )
                                            @case(1)
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
                                                                        $quizchoices = DB::table('lessonquizchoices')
                                                                            ->where('questionid', $question->id)
                                                                            ->where('deleted', 0)
                                                                            ->orderBy('sortid')
                                                                            ->get();


                                                                        @endphp
                                                                        <div class="col-12" id="list_option{{$question->id}}">
                                                                            @if(count($quizchoices) > 0)
                                                                            @foreach($quizchoices as $choice)
                                                                            <div id="containerchoices">
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
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-end p-3 mt-2">
                                                                                    <button class="btn btn-success addoption" id="{{$question->id}}">Add option</button>
                                                                            </div>
                                                                            <button class="btn btn-primary btn-sm answer-key" id="{{$question->id}}">Answer key</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @break
                                        
                                            
                    

                                            {{-- Short Answer --}}

                                            @case(2)
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
                                                                            <textarea class="form-control m-2 setanswer" data-id="{{$question->id}}" placeholder="Set Guide Answer" style="height: 20px !important;" id="shortz_answer_answer{{$question->id}}" >{{$question->quideanswer}}</textarea>
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
                                            @break
                                            
                                            
                                            
                        

                                            {{-- Paragraph --}}
                                            
                                            @case(3)
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
                                                                            <textarea class="form-control m-2 setanswer" data-id="{{$question->id}}" placeholder="Set Guide Answer" style="height: 20px !important;" id="long_answer_answer{{$question->id}}" >{{$question->quideanswer}}</textarea>
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
                                            @break
                    

                                            {{-- Instruction --}}

                                            @case(4)
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
                                            @break
                                            
                                            
                            
                                            
                                            {{-- Drag and Drop --}}
                                            @case(5)
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
                                                                                $dragoptions = DB::table('lesson_quiz_drag_option')
                                                                                    ->where('questionid', $question->id)
                                                                                    ->where('deleted', 0)
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
                                                                            $dropquestions = DB::table('lesson_quiz_drop_question')
                                                                                ->where('questionid', $question->id)
                                                                                ->orderBy('sortid')
                                                                                ->get();

                                                                            foreach($dropquestions as $item){
                                                                                $answer = DB::table('lesson_quiz_drop_answer')
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
                                                                                <button class="btn btn-primary btn-sm answer-key" id="{{$question->id}}">Answer key</button>
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

                                            @case(6)
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
                                            @case(7)
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
                                                                                $fillquestions = DB::table('lesson_fill_question')
                                                                                    ->where('questionid', $question->id)
                                                                                    ->where('deleted', 0)
                                                                                    ->orderBy('sortid')
                                                                                    ->get();

                                                                                foreach($fillquestions as $item){

                                                                                    $answer = DB::table('lesson_quiz_fill_answer')
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

                                            @case(8)
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

                                                                                $answer = DB::table('lesson_quiz_enum_answer')
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
                                            @break
                                        @endswitch
                                    @endforeach
                                @endif
                            </div>
                        </div> 
                    </div>
                </div> 

    </body>

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('templatefiles/framework.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
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


                $(document).on('click', function(event) {
                    last_quiz_type = $('#quiztype' + last_id).val();

                    if (!$(event.target).closest('.dragrow' + last_id).length || $(event.target).hasClass('delrow')) {
                        
                            console.log("Last ID: ", last_id);
                        switch (last_quiz_type) {
                            case 'multiple_choice':
                                
                                var textareaValue = $('#multiplechoice' + last_id).val();
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
                                            break;

                                            
                            case 'enumeration':

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
                                        url: "/adminviewbook/createquestionitem",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 8,
                                            item : itemval,
                                            id: last_id
                                                },
                                        success: function(response) {

                                            if (response == 1){

                                        
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'All the changes have been saved'
                                                
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                             // Handle error here
                                            Toast.fire({
                                                type: 'error',
                                                title: 'Something went wrong'
                                            })
                                        }
                                        });

                                        }else{
                                                    Toast.fire({
                                                        icon: 'error',
                                                        title: 'Item is required'
                                                    })
                                        $('#enumerationitem' + last_id).css('border-color', 'red');
                                        $('#enumerationitem' + last_id).focus();
                                        }


                        
                                        break;

                            case 'instruction':
                                var textareaValue = $('#instruction_item' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                
                                if (textareaValue.length != 0) {
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

                                            if (response == 1){
                                        
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'All the changes have been saved'
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                            Toast.fire({
                                                type: 'error',
                                                title: 'Something went wrong'
                                            })
                                        }
                                        });
                                        }
                                        break;
                            

                            case 'drag_drop':

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

                                        if (response == 1) {
                                        console.log(response);
                                        }
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                        Toast.fire({
                                            type: 'error',
                                            title: 'Something went wrong'
                                        })
                                    }
                                });

                                var i = 1;
                                console.log("Drag and Drop");
                                $('.drag' + last_id).each(function() {
                                        // Get the value of the current label element using its id attribute
                                        const value = $(this).text().trim();
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
                                                Toast.fire({
                                                    type: 'error',
                                                    title: 'Something went wrong'
                                                })
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
                                                        Toast.fire({
                                                            type: 'error',
                                                            title: 'Something went wrong'
                                                        })
                                                    }
                                                });
                                                i+=1;


                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: 'All the changes have been saved'
                                        })
                            
                                        break;

                            case 'image':

                                var textareaValue = $('#image_item' + last_id).val();
                                console.log("Question: ", textareaValue);
                                console.log("Quiztype: ", last_quiz_type);
                                if (points !== '' && points !== undefined && textareaValue.length != 0) {
                                    $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/adminviewbook/createquestion",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 6,
                                            id: last_id
                                                },
                                        success: function(response) {

                                            if (response == 1){
                                        
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'All the changes have been saved'
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            Toast.fire({
                                                type: 'error',
                                                title: 'File is too large'
                                            });
                                        }
                                    });
                                } else {
                                    UIkit.notification({
                                        message: '<span uk-type="type: close"></span> Points Required!',
                                        status: 'error',
                                        timeout: 1000
                                    });
                                    $('#Required' + last_id).focus();
                                }
                                break;


                            case 'short_answer':
                            case 'paragraph_answer':
                                    var points = $('#Required' + last_id).val();
                                    console.log("points: ", points);
                                    console.log("Quiztype: ", last_quiz_type);

                                    if (points === '') {
                                    UIkit.notification({
                                        message: '<span uk-type="type: close"></span> Points Required!',
                                        status: 'error',
                                        timeout: 1000
                                    });
                                    $('#Required' + last_id).focus();
                                    }

                                    break;

                            case 'fill_n_blanks':


                                    var i = 1;
                                    var validation = true;
                                    

                                    $('.fill' + last_id).each(function() {
                                            // Get the value of the current label element using its id attribute
                                            const value = $(this).val();

                                            console.log(i);
                                            console.log(value);

                                                if(i==1){

                                                    $.ajax({
                                                        type: "get",
                                                        url: "/adminviewbook/createquestion",
                                                        data: { 
                                                            question : "Fill in the blanks",
                                                            typeofquiz : 7,
                                                            id: last_id
                                                                },
                                                        success: function(response) {

                                                            if (response == 1){
                                                        
                                                            Toast.fire({
                                                                icon: 'success',
                                                                title: 'All the changes have been saved'
                                                            })

                                                            }
                                                            
                                                        },
                                                        error: function(xhr) {
                                                            Toast.fire({
                                                                type: 'error',
                                                                title: 'Something went wrong'
                                                            })
                                                        }
                                                    });
                                                }

                                                $.ajax({
                                                        type: "get",
                                                        url: "/adminviewbook/createfillquestion",
                                                        data: { 
                                                            questionid : last_id,
                                                            sortid: i,
                                                            description : value
                                                                },
                                                        success: function(response) {

                                                            console.log("Fill question Succesfully save!");
                                                            
                                                            
                                                        },
                                                        error: function(xhr) {
                                                            // Handle error here
                                                            Toast.fire({
                                                                type: 'error',
                                                                title: 'Something went wrong'
                                                            })
                                                        }
                                                        });

                                                            i+=1;
                                                        });

                                                        break;

                            default:
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

                            break;
                        }
                        
                    


                    }
                });
                    



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
                        console.log("Thiss ID: ", id);

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
                        
                            
                            // console.log(click)
                            
                    
        
                })

                $(document).on('click', '.delrow', function(){
                    console.log("$(this).attr('id')");
                    console.log($(this).attr('id'));
                    var rowid = $(this).attr('id');
                    $('.dragrow' + rowid).remove()

                        $.ajax({
                                type: "get",
                                dataType: 'json',
                                url: "/adminviewbook/delquestion",
                                data: { 
                                    id: rowid
                                        },
                                complete: function(data){
                            }
                        });

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
                                                        '<div class="col-sm-6 col-md-10 col-lg-6 mr-1 quizarea">' +
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
                                                            '</div>' +
                                                            '<div class="col-12">' +
                                                                '<div class="row justify-content-end p-3 mt-2">'+
                                                                    '<button class="btn btn-success addoption" id="'+addrow+'">Add option</button>'+
                                                                '</div>'+
                                                                ' <button class="btn btn-primary btn-sm answer-key" id="'+addrow+'">Answer key</button>'+
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
                                        Toast.fire({
                                            type: 'error',
                                            title: 'Something went wrong'
                                        })

                                    }
                        });


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



                        switch (select_quiz_type) {
                            case 'multiple_choice':
                                option = 1;
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<div class="row">' +
                                    '<div class="col-12 m-2">' +
                                    '<textarea class="form-control question" placeholder="Untitled question" data-id="' + parentId + '" data-question-type="1" style="height: 20px !important;" id="multiplechoice' + parentId + '"></textarea>' +
                                    '</div>' +
                                    '<div class="col-12" id="list_option' + parentId + '">' +
                                    '<input class="form-check-input ml-2" type="radio" name="option1" value="1">' +
                                    '<label class="form-check-label option' + parentId + ' ml-5" id="option' + parentId + '" contenteditable="true">Option ' + option + '</label>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-12">' +
                                    '<div class="row justify-content-end p-3 mt-2">' +
                                    '<button class="btn btn-success addoption" id="' + parentId + '">Add option</button>' +
                                    '</div>' +
                                    '<button class="btn btn-link btn-sm answer-key" id="' + parentId + '">Answer key</button>' +
                                    '</div>'
                                );
                                break;

                            case 'short_answer':
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<h6><label class="ml-2" for="number_question' + parentId + '">Points:</label></h6>' +
                                    '<input type="number" class="form-control m-2 addpoints is-invalid" placeholder="Required" data-id="' + parentId + '" id="Required' + parentId + '">' +
                                    '<h6><label class="ml-2" for="shortz_answer_question' + parentId + '">Question:</label></h6>' +
                                    '<textarea class="form-control m-2 question shortz_answer_question"' + parentId + '" data-id="' + parentId + '" data-question-type="2" placeholder="Untitled question" style="height: 20px !important;" id="shortz_answer_question' + parentId + '"></textarea>' +
                                    '<h6><label class="ml-2" for="shortz_answer_answer' + parentId + '">Guide answer</label></h6>' +
                                    '<textarea class="form-control m-2 setanswer" data-id="' + parentId + '" placeholder="Set Guide Answer:" style="height: 20px !important;" id="shortz_answer_answer' + parentId + '"></textarea>' +
                                    '<input type="text" class="form-control mt-2 ml-2" placeholder="Short answer text" disabled>'
                                );
                                break;

                            case 'paragraph_answer':
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<h6><label class="ml-2" for="number_question' + parentId + '">Points:</label></h6>' +
                                    '<input type="number" class="form-control m-2 addpoints is-invalid" placeholder="Required" data-id="' + parentId + '" id="Required' + parentId + '">' +
                                    '<h6><label class="ml-2" for="long_answer_question' + parentId + '">Question:</label></h6>' +
                                    '<textarea class="form-control m-2 question" placeholder="Untitled question" data-id="' + parentId + '" data-question-type="3" style="height: 20px !important;" id="long_answer_question' + parentId + '"></textarea>' +
                                    '<h6><label class="ml-2" for="Long_answer_answer' + parentId + '">Guide answer:</label></h6>' +
                                    '<textarea class="form-control m-2 setanswer"' + parentId + '" placeholder="Set Guide Answer:" style="height: 20px !important;" id="long_answer_answer' + parentId + '"></textarea>' +
                                    '<input type="text" class="form-control mt-2 ml-2" placeholder="Long answer text" disabled>'
                                );
                                break;

                            case 'enumeration':
                                enumerationitem = 1;
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<div class="row">' +
                                    '<div class="col-12 m-2">' +
                                    '<textarea class="form-control m-2" placeholder="Untitled question" data-id="' + parentId + '" data-question-type="8" id="enumerationquestion' + parentId + '"></textarea>' +
                                    '<input type="number" class="form-control mt-2 ml-2" placeholder="Item count" data-id="' + parentId + '" id="enumerationitem' + parentId + '">' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-12">' +
                                    '<button class="btn btn-link btn-sm ml-2 answer-key-enum" id="' + parentId + '">Answer key</button>' +
                                    '</div>'
                                );
                                break;

                            case 'instruction':
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<div class="row">' +
                                    '<div class="col-12 m-2">' +
                                    '<textarea class="form-control mt-2 question" placeholder="Untitled instruction" style="width: 100% !important;" data-id="' + parentId + '" data-question-type="1" id="instruction_item' + parentId + '"></textarea>' +
                                    '</div>' +
                                    '</div>'
                                );
                                $('#instruction_item' + parentId).summernote({
                                    height: 200,
                                    toolbar: [
                                        ['style', ['bold', 'italic', 'underline', 'clear']],
                                        ['fontsize', ['fontsize']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']]
                                    ]
                                });
                                break;

                            case 'fill_n_blanks':
                                var option = 0;
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<div class="row">' +
                                    '<div class="col-12 m-2">' +
                                    '<p><b>Note: </b>To set up the blanks, please input [~input] where you want the blank to appear. Ex. The planet ~input is the biggest planet in the solar system</p>' +
                                    '<div id="item_fill' + parentId + '">' +
                                    '<input type="text" class="form-control fill' + parentId + '" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;' + option + '">' +
                                    '</div>' +
                                    '<div class="row justify-content-end p-3 mt-2">' +
                                    '<button class="btn btn-success add_fill_question"  id="' + parentId + '">Add fill question</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-12">' +
                                    '<button class="btn btn-link btn-sm answer-key-fill" id="' + parentId + '">Answer key</button>' +
                                    '</div>' +
                                    '</div>'
                                );
                                break;

                            case 'drag_drop':
                                var option = 0;
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<div class="row">' +
                                    '<div class="col-12 m-2">' +
                                    '<div class="options p-3 mt-2" id="options' + parentId + '" style="border:3px solid #3e416d;border-radius:6px;">' +
                                    '<div class="drag-option btn bg-primary text-white m-1 drag' + parentId + '" contentEditable="true" data-target="drag-1">Option &nbsp;' + option + '</div>' +
                                    '</div>' +
                                    '<div class="row justify-content-end p-3 mt-2">' +
                                    '<button class="btn btn-success add_drag_option" id="' + parentId + '">Add drag option</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<p><b>Note: </b>To set up the drop area, please input [~input] where you want the drop zone to appear. Ex. The planet ~input is the biggest planet in the solar system</p>' +
                                    '<div id="item_question' + parentId + '">' +
                                    '<input type="text" class="form-control drop' + parentId + '" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;' + option + '">' +
                                    '</div>' +
                                    '<div class="row justify-content-end p-3 mt-2">' +
                                    '<button class="btn btn-success add_drag_question"  id="' + parentId + '">Add drop question</button>' +
                                    '</div>' +
                                    '<div class="col-12">' +
                                    '<button class="btn btn-primary btn-sm answer-key" id="' + parentId + '">Answer key</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                );
                                break;

                            case 'image':
                                $('#quiztioncontent' + parentId).empty().append(
                                    '<div class="row">' +
                                    '<div class="col-12 m-2">' +
                                    '<h6><label class="ml-2" for="number_question' + parentId + '">Points:</label></h6>' +
                                    '<input type="number" class="form-control m-2 addpoints is-invalid" placeholder="Required" data-id="' + parentId + '" id="Required' + parentId + '">' +
                                    '<textarea class="form-control question" placeholder="Untitled instruction" data-id="' + parentId + '" data-question-type="6"  style="height: 20px !important;"  id="image_item' + parentId + '"></textarea>' +
                                    '<input type="file" class="mt-2" disabled>' +
                                    '</div>' +
                                    '</div>'
                                );
                                $('#image_item' + parentId).summernote({
                                    height: 200,
                                    toolbar: [
                                        ['style', ['bold', 'italic', 'underline', 'clear']],
                                        ['fontsize', ['fontsize']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']]
                                    ]
                                });
                                break;
                        }


                    });



                    $(document).on('click', '.addoption', function(){

                        option+=1;
                        var parentId = $(this).attr('id');
                        console.log("ADD OPTION ID: ", parentId)
                        $('#list_option' + parentId).append(`<input class="form-check-input ml-2" type="radio" name="option1" value="1">
                        <label class="form-check-label ml-5  option${parentId}" contenteditable="true">Option ${option}</label>`)
                    
                    })

                    $(document).on('click', '.add_fill_question', function(){
                        option+=1;
                        var parentId = $(this).attr('id');
                        console.log("IDs: ", parentId)
                        $('#item_fill' + parentId).append(`<input type="text" class="form-control fill${parentId}" style="margin-top: 10px; border: 2px solid dodgerblue; color: black;" placeholder="Item text &nbsp;${option}">`)
                        
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
                        enumerationitem+= 1;

                        console.log("Item Count:", enumerationitem);
                        var quizId = $(this).data('id');

                        console.log("Add question ID: ", quizId)
                        var parentId = $(this).data('id');
                        var addrowid = $(this).attr('id');
                        
                        console.log("Add row ID: ", addrowid)
                        console.log("ID: ", parentId)
                        
                        $('#item_option' + parentId).append('<input type="text" class="form-control mt-2 ml-2" placeholder="Item text'+enumerationitem+'" disabled>')

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
                    $(document).on('click', '.answer-key', function(){
                        

                        var parentId = $(this).attr('id');
                        var question = $('#multiplechoice' + parentId).val();
                        console.log(question);
                        
                        if(question.length > 0){
                            function saveChoices(parentId) {
                                    var promises = []; // Array to store the promises

                                    var i = 1;
                                    $('.option' + parentId).each(function() {
                                        const value = $(this).text();
                                        console.log(i);
                                        
                                        var promise = $.ajax({
                                            type: "get",
                                            dataType: 'json',
                                            url: "/adminviewbook/createchoices",
                                            data: { 
                                                questionid : parentId,
                                                sortid: i,
                                                description : value
                                            }
                                        });

                                        promises.push(promise); // Add the promise to the array
                                        i += 1;
                                    });

                                    return Promise.all(promises); // Return a promise that resolves when all AJAX requests are completed
                            }


                            saveChoices(parentId)
                                .then(function() {
                                    getQuestion(parentId); // Call getQuestion function after all saveChoices AJAX requests are completed
                                })
                                .catch(function(error) {
                                    // Handle error here
                                });

                            }else{
                                UIkit.notification({
                                        message: '<span uk-type="type: close"></span> Question Required!',
                                        status: 'error',
                                        timeout: 1000
                                    });
                            }

                        });
                        
                        

                        function getQuestion(parentId){

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
                                        console.log("error");
                                        // Handle error here
                                    }

                                    });
                        }
                        

                        $(document).on('click', '.answer-key-drag', function(){
                                var parentId = $(this).attr('id');
            
                                var i = 1;
                            var dragPromises = [];
                            console.log("Drag and Drop");
                            $('.drag' + parentId).each(function() {
                                const value = $(this).text();
                                console.log(value);

                                var dragPromise = $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createdragoption",
                                    data: {
                                        questionid: parentId,
                                        sortid: i,
                                        description: value
                                    }
                                });

                                dragPromises.push(dragPromise);
                                i += 1;
                            });

                            var dropPromises = [];
                            i = 1;
                            $('.drop' + parentId).each(function() {
                                const value = $(this).val();
                                console.log(value);

                                var dropPromise = $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createdropquestion",
                                    data: {
                                        questionid: parentId,
                                        sortid: i,
                                        description: value
                                    }
                                });

                                dropPromises.push(dropPromise);
                                i += 1;
                            });

                            Promise.all([...dragPromises, ...dropPromises])
                                .then(function() {
                                    Toast.fire({
                                        type: 'success',
                                        title: 'All the changes have been saved'
                                    });

                                    var questionPromise = $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/adminviewbook/createquestion",
                                        data: {
                                            question: "Drag and drop",
                                            typeofquiz: 5,
                                            id: parentId
                                        }
                                    });

                                    return questionPromise;
                                })
                                .then(function() {
                                    getDropQuestion(parentId);
                                })
                                .catch(function(error) {
                                    // Handle error here
                                });

                        

                        });

                        function getDropQuestion(parentId){

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/getdropquestion",
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


                        $(document).on('click', '.answer-key-fill', function(){
                            var parentId = $(this).attr('id');
                            
                            var i = 1;
                            var validation = true;

                            var promises = []; // Array to store the promises

                            $('.fill' + parentId).each(function() {
                                const value = $(this).val();
                                console.log(i);
                                console.log(value);

                                    if (i == 1) {
                                        var questionPromise = $.ajax({
                                            type: "get",
                                            url: "/adminviewbook/createquestion",
                                            data: {
                                                question : "Fill in the blanks",
                                                typeofquiz : 7,
                                                id: parentId
                                            }
                                        });
                                        promises.push(questionPromise); // Add the promise to the array
                                    }

                                    var fillPromise = $.ajax({
                                        type: "get",
                                        url: "/adminviewbook/createfillquestion",
                                        data: {
                                            questionid: parentId,
                                            sortid: i,
                                            description: value
                                        }
                                    });
                                    promises.push(fillPromise); // Add the promise to the array

                                    i += 1;
                    
                            });

                            Promise.all(promises)
                                .then(function() {
                                    getfillquestion(parentId);
                                })
                                .catch(function(error) {
                                    // Handle error here
                                });

                            console.log(parentId);



                        });

                        function getfillquestion(parentId){

                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/getfillquestion",
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
                                        url: "/adminviewbook/createquestionitem",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 8,
                                            item : itemval,
                                            id: parentId
                                                },
                                        success: function(response) {

                                            if (response == 1){

                
                                        
                                            Toast.fire({
                                                icon: 'success',
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
                                    url: "/adminviewbook/getenumquestion",
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
                                                                    class="answer-field d-inline form-control q-input"
                                                                    type="text"
                                                                >
                                                            </li>
                                                            </p>
                                                        
                                                    </div>
                                                </div>`
                                            }

                                            html +=`</ol>`

                                            html += `</div><div class="col-12 p-3 text-end">
                                                                        <button class="btn btn-dark btn-sm answerdoneenum" id="${response.id}">Done</button>
                                                                    </div></div>`;

                                            $('#quiztioncontent' + parentId).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                                    })

                        }

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
                                    success: function(response)  {
                                            console.log(response);

                                            $('#quiztype' + id).prop('disabled', false);



                                            var html = `<div class="row">
                                                            <div class="col-12 m-2">
                                                                <textarea class="form-control" placeholder="Untitled question" id="multiplechoice${response.id}" > ${response.question}</textarea>
                                                            </div>
                                                        <div class="col-12" id="list_option${response.id}">`;

                                            response.choices.forEach(function(item) {
                                                html += `<div id="containerchoices${response.id}">
                                                            <input class="form-check-input ml-2" type="radio" name="option${response.id}" value="${item.id}">
                                                            <label class="form-check-label ml-5 option${response.id}" id="option${response.id}" contenteditable="true">
                                                                ${item.description}`;
                                                                
                                                                if(item.answer == 1){
                                                                    html +=`<span class="ml-2"><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>`;
                                                                }
                                                                
                                                                html += `<span id="deletechoice" data-id="${item.id}" class="pl-1"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                                            </label>
                                                        </div>`;
                                            });


                                            html += `</div>
                                                    <div class="col-12">
                                                        <div class="row justify-content-end p-3 mt-2">
                                                            <button class="btn btn-success addoption" id="${response.id}">Add option</button>
                                                        </div>
                                                        <button class="btn btn-primary btn-sm answer-key" id="${response.id}">Answer key</button>
                                                    </div>`;

                                            $('#quiztioncontent' + id).empty().append(html);
                                        },
                                    error: function(xhr) {
                                        console.log("Error");
                                        // Handle error here
                                    }
                            });

                        



                        });



                        $(document).on('click', '.answerdonedrag', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/returneditquizdrag",
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
                                                    <button class="btn btn-primary btn-sm answer-key" id="${response.id}">Answer key</button>
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


                        $(document).on('click', '.answerdonefill', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/returneditquizfill",
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


                        $(document).on('click', '.answerdoneenum', function(){

                            var id = $(this).attr("id");
                            console.log(id);


                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/returneditquizenum",
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
                                                            <div class="col-12  mt-2">
                                                                <button class="btn btn-link btn-sm answer-key-enum" id="${response.id}">Answer key</button>
                                                            </div>
                                                        </div>
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

                        $(document).on('click', '#deletechoice', function(){
                            // Perform delete functionality here
                            console.log("Delete button clicked!");

                            var id = $(this).data('id');
                            $(this).parent().parent().remove();
                            //$(this).parent().remove();


                            // Example: Remove the parent element of the deletechoice span
                            

                            $.ajax({
                                url: '/adminviewbook/del-choices',
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

                        $(document).on('click', '#deleteenum', function(){
                            // Perform delete functionality here
                            console.log("Delete button clicked!");
                            enumerationitem -= 1;
                        

                            var id = $(this).data('id');
                            $(this).parent().parent().parent().remove();

                            var textareaValue = $('#enumerationquestion' + id).val();

                            $.ajax({
                                        type: "get",
                                        dataType: 'json',
                                        url: "/adminviewbook/createquestionitem",
                                        data: { 
                                            question : textareaValue,
                                            typeofquiz : 8,
                                            item : enumerationitem,
                                            id: id
                                                },
                                        success: function(response) {

                                            if (response == 1){

                                            enumerationitem = 1;
                                        
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'All the changes have been saved'
                                                
                                            })

                                            }
                                            
                                        },
                                        error: function(xhr) {
                                            // Handle error here
                                        }
                                    });



                        });



    

                        //auto save answer when switching to 
                        $(document).on('change', '.answer-field', function(){
                            autoSaveAnswer(this);
                            

                        });

                        $(document).on('change', '.question', function(){
                            var dataid = $(this).data('id');
                            var type = $(this).data('question-type');
                            var question = $(this).val();

                            console.log("ID: ", dataid,"Question:", question, "Type:" , type);

                            //check if Question has value
                            if (question.length != 0) {
                            
                                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquestion",
                                    data: { 
                                        question : question,
                                        typeofquiz : type,
                                        id: dataid
                                            },
                                    success: function(response) {

                                        if (response == 1){
                                    
                                        Toast.fire({
                                            icon: 'success',
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


                        $(document).on('change', '.setanswer', function(){
                            var dataid = $(this).data('id');
                            var answer = $(this).val();
                            console.log("ID: ", dataid,"Answer:", answer);

                            $.ajax({
                                url: '/adminviewbook/setguideanswer',
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




                        $(document).on('change', '.addpoints', function(){

                            var dataid = $(this).data('id');
                            var points = $(this).val();
                            console.log("ID: ", dataid,"Points:", points);

                            $.ajax({
                                url: '/adminviewbook/setpoints',
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

                        function autoSaveAnswer(thisElement) {
                            var answer = $(thisElement).val();
                            var questionId = $(thisElement).data('question-id');
                            var questiontype = $(thisElement).data('type');
                            var sortid = $(thisElement).data('sortid');
                            
                            console.log(sortid)

                            console.log(`student answer: ${answer}, question-id: ${questionId}, question type: ${questiontype}`)

                            $.ajax({
                                url: '/adminviewbook/save-answer-key',
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


                        function autoSaveAnswerdragandrop(thisElement) {
                            var answer = $(thisElement).val();
                            var questionId = $(thisElement).data('question-id');
                            var sortId = $(thisElement).data('sortid');

                            console.log(`student answer: ${answer}, question-id: ${questionId}, sort-id: ${sortId}`)

                            $.ajax({
                                url: '/adminviewbook/save-answer-drop',
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
                    });



        </script>


@endsection