<style>


    .points {
        width: 60px;
        height: 60px;
        background-color: #4d4d99;
        border-radius: 50%;
        position: relative;
        top: -50px;
        left: -50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        padding: 0;
        margin: 0;
        font-size: 15pt;
        font-weight: 600;
    }


</style>

<div class="container quizcontent" style="background-color: #fff !important;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                    <div class="card mt-5 editcontents" data-quizid= "{{$quizInfo->id}}" id="quiz-info">
                                <div class="card-body">
                                    <h1 class="card-title">
                                        {{$quizInfo->title}}
                                    </h1>

                            <div class="pb-4 inline-block">
                                @if(isset($chapterquisched))
                                    <h4>Status: {{$chapterquizsched->status}} </h4>
                                @endif
                                    <h4>Status: Quiz Not Activated </h4>
                                    <a href="/quiz/167-{{$classroomid}}-{{$bookid}}" target="_blank" type="button" class="btn btn-info uk-first-column" id="modal_view_quiz_button">Click here to Activate</a>

                            </div>
                        </div>
                    </div>







                    <div class="card mt-5 editcontents" data-quizid= "{{$quizInfo->id}}" id="quiz-info">
                                <div class="card-body">
                                    {{-- <h1 class="card-title">
                                        {{$quizInfo->title}}
                                    </h1> --}}

                            <div class="lessons pb-4">
                                <h3>Answer Key</h3>   
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



                    @if(isset($quizInfo->image))

                        <div class="card mt-5 editcontents" data-quizid="{{$quizInfo->id}}" id="quiz-info">
                            <div class="card-body position-relative">
                                <img src="{{$quizInfo->image}}" class="img-fluid w-100 h-100 rounded-top border-0 m-0" alt="Image">
                            </div>
                        </div>

                    @endif



                
                    @foreach($quizQuestions as $key=>$item)
                        @if($item->typeofquiz == 1)

                                <!-- multiple choice -->
                                
                                    <div class="card mt-5 editcontent" id="quiz-question-{{$item->id}}">
                                        <div class="card-body ">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="points student-score">
                                                        {{$key+=1}}
                                                    </div>
                                                </div>
                                            </div>
                            
                                                    
                                                    <p class="question" data-question-type="{{$item->typeofquiz}}">{{$item->question}}</p>

                                                    @foreach ($item->choices as $questioninfo)
                                                    <div class="form-check mt-2">
                                                        @if($questioninfo->answer == 1)

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

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Points. </b> {{$item->points}}</p>
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> {{$item->question}}</p>
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Explanation: </b> </p>
                                                @if(isset($item->quideanswer))
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> {!! $item->quideanswer !!} </p>
                                                @else
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Answer may vary. </b> </p>
                                                @endif
                                                <input type="text" data-question-type="{{$item->typeofquiz}}" data-question-id="{{ $item->id}}" class="answer-field form-control mt-2" placeholder="Answer here" >

                                    </div>
                                </div>
                            @endif


                            @if($item->typeofquiz == 3)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Points. </b> {{$item->points}}</p>
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> {{$item->question}}</p>
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Explaination:  </b></p>
                                                @if(isset($item->quideanswer))
                                                <p class="question" data-question-type="{{$item->typeofquiz}}">  {!! $item->quideanswer !!} </p>
                                                @else
                                                <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Answer may vary. </b></p>
                                                @endif
                                                
                                                <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{ $item->id}}" class="answer-field form-control mt-2"type="text"></textarea>

                                    </div>
                                </div>
                            @endif


                            @if($item->typeofquiz == 4)
                            
                                

                                <div class="card mt-5 editcontent">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                                <p>Instruction. {!! $item->question !!}</p>

                                    </div>
                                </div>
                            @endif

                        


                            @if($item->typeofquiz == 5)
                                <!-- drag and drop -->
                                

                                <div class="card mt-5 editcontent">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>


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

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>

                                        <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Points. </b> {{$item->points}}</p>
                                        <p>{!! $item->question !!}</p>
                                        <div class="form-group">
                                            <input class="answer-field form-control-file imageInput" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" type="file" accept="image/*">
                                            <a id="preview-link" href="{{$item->picurl}}" target="_blank">
                                                <img id="preview" src="#" alt="Preview" style="max-width: 250px; max-height: 250px;display:none;">
                                            </a>
                                    

                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($item->typeofquiz == 7)
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>

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

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>

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
                                                    <p><input data-question-id="{{ $item->id }}" data-sortid={{ $i+1 }} data-question-type="8" class="answer-field d-inline form-control q-input" type="text"></p>
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


                        @if($item->typeofquiz == 9)
                            
                                

                                <div class="card mt-5 editcontent">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                                <a id="preview-links" href="{{$item->image}}" target="_blank">
                                                    <img id="previews" src="{{$item->image}}" alt="Preview" style="width: 100%; height: 100%;">
                                                </a>

                                    </div>
                                </div>
                        @endif

                        @if($item->typeofquiz == 10)

                                <!-- multiple choice -->
                                
                                    <div class="card mt-5 editcontent" id="quiz-question-{{$item->id}}">
                                        <div class="card-body ">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="points student-score">
                                                        {{$key+=1}}
                                                    </div>
                                                </div>
                                            </div>
                            
                                                    
                                                    <p >{!! $item->question !!} </p>

                                                    @foreach ($item->choices as $questioninfo)
                                                    <div class="form-check mt-2">
                                                        @if($questioninfo->answer == 1)

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

                            @if($item->typeofquiz == 11)
                                <!-- upload file -->
                                <div class="card mt-5 editcontent">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="points student-score">
                                                    {{$key+=1}}
                                                </div>
                                            </div>
                                        </div>

                                        <p class="question" data-question-type="{{$item->typeofquiz}}"> <b> Points. </b> {{$item->points}}</p>
                                        <p>{!! $item->question !!}</p>
                                        <div class="form-group">
                                            <input class="answer-field form-control-file fileInput" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" type="file">
                                        </div>
                                    </div>
                                </div>
                            @endif



                        @endforeach
                    
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


    $(document).ready(function() {

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

        //initial state
        $('input').prop("disabled", true);
        

    })
</script>


