@extends('teacher.layouts.app')

@section('content')
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
    }
    .points h4 {
        color: #fff;
        padding: 0;
        margin: 0;
    }
</style>
    
    <div class="container quizcontent" style="background-color: #fff !important;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 editcontents" data-quizid="{{$quizInfo->id}}" id="quiz-info">
                    <div class="card-body" data-headerid="{{$headerid}}" id="headerid">
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
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="points">
                                            <h4>1</h4>
                                        </div>
                                    </div>
                                </div>

                                <p class="question" data-question-type="{{$item->typeofquiz}}">
                                    {{$key+=1}}. {{$item->question}}
                                </p>
                                @foreach ($item->choices as $questioninfo)
                                    <div class="form-check mt-2">
                                        @if($questioninfo->id == $item->answer)
                                            <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}" checked>
                                        @else
                                            <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}">
                                        @endif
                                        <label for="{{$item->id}}" class="form-check-label">
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
                                <p class="question" data-question-type="{{$item->typeofquiz}}">
                                    {{$key+=1}}. {{$item->question}}
                                </p>
                                <input type="text" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-control mt-2" placeholder="Answer here" value="{{$item->answer}}">
                            </div>
                        </div>
                    @endif

                    @if($item->typeofquiz == 3)
                        <div class="card mt-5 editcontent">
                            <div class="card-body">
                                <p class="question" data-question-type="{{$item->typeofquiz}}">
                                    {{$key+=1}}. {{$item->question}}
                                </p>
                                <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-control mt-2" type="text" value="{{$item->answer}}">{{$item->answer}}</textarea>
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
                <button id="scroll-to-bottom" class="btn btn-dark btn-lg mb-3 mr-3" style="position: fixed; bottom: 0px; left: 10px; padding: 9px 15px 9px 15px !important;">
                    <i class="fas fa-arrow-circle-down"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('input').prop("disabled", true);
            $('textarea').prop("disabled", true);
        })
    </script>
@endsection

