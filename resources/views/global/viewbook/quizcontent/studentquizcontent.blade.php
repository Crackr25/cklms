<div class="container quizcontent" style="background-color: #fff !important;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

<div class="card mt-5 editcontent" data-quizid= "{{$quizInfo->id}}" id="quiz-info">
                                <div class="card-body" data-headerid= "{{$headerid}}" id="roomid">
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
                            
                                                    
                                                    <p>{{$key+=1}}. {{$item->question}}</p>

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
                                                        <input data-question-id="{{  $item->id }}" id="{{ $questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{ $item->id }}" value="{{ $questioninfo->id}}">
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
                                
                                        <p>{{$key+=1}}. {{$item->question}}</p>
                                        <input type="text" data-question-id="{{ $questioninfo->id}}" id="{{ $questioninfo->id}}" class="form-control m-2" placeholder="Answer here" >

                            </div>
                        </div>
                            @endif


                            @if($item->typeofquiz == 3)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        
                                                <p>{{$key+=1}}. {{$item->question}}</p>
                                                <textarea data-question-id="{{ $questioninfo->id}}" id="{{ $questioninfo->id}}" class="answer-field form-control mt-2"type="text"></textarea>

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
                                        <p class="instruction">
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

                                            @foreach($dropquestions as $item)
                                                @php
                                                    $inputField = '<input class="d-inline form-control q-input drop-option q-input" style="width: 200px; margin: 10px; border-color:black" type="text" disabled>';
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

                        <div class="save mb-5">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="btn btn-success btn-lg" id="save-quiz">Save</div>
                            </div>
                        </div>
                        </div>

                        
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
            <button id="scroll-to-bottom" class="btn btn-dark btn-lg mb-3 mr-3" style= "
                position: fixed;
                bottom: 0px;
                right: 320px;
                padding: 9px 15px 9px 15px !important;
            }"><i class="fas fa-arrow-circle-down"></i></button>
        </div> 
        </div> 
        
        </div> 


