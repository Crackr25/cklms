
<div class="row">
    <div class="col-md-12">
        <article class="uk-card-default p-2 rounded" >
            <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                @if(count($chaptertestinfo->questions)>0)
                    @foreach($chaptertestinfo->questions as $question)
                        <li chaptertestid="{{$chaptertestinfo->id}}" class="" id="eachquestion{{$question->id}}">
                            <a class="uk-accordion-title" href="#">
                                {{$question->num}}. <span id="qtitle{{$question->id}}">{{$question->question}} ( {{$question->points}} pts )</span>
                            </a>
                            <div class="uk-accordion-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if($question->type == 1)
                                            <button type="button" class="btn btn-sm btn-soft-success addanswer" questionid="{{$question->id}}" questiontype="{{$question->type}}" question="{{$question->question}}"  points="{{$question->points}}"><i class="fa fa-plus"></i> Answers</button>
                                        @else
                                            @if(count($question->answers) == 0)
                                                <button type="button" class="btn btn-sm btn-soft-success addanswer" questionid="{{$question->id}}" questiontype="{{$question->type}}" question="{{$question->question}}"><i class="fa fa-plus"></i> Answer</button>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <button type="button" class="btn btn-sm btn-soft-link buttoneditquestion" questionid="{{$question->id}}" question="{{$question->question}}" questiontype="{{$question->type}}">Edit Question</button>
                                        <button type="button" class="btn btn-sm btn-soft-link buttondeletequestion" questionid="{{$question->id}}" question="{{$question->question}}" questiontype="{{$question->type}}">Delete Question</button>
                                    </div>
                                </div>
                                <div class="row" id="question{{$question->id}}">
                                    @if(count($question->answers) >0)
                                    <div class="col-md-12">
                                        @if($question->type == 1)
                                            <small>Answers</small>
                                            @foreach($question->answers as $answer)
                                                <div class="input-group input-group-sm" id="answercontainer{{$answer->answerid}}">
                                                    <input type="text" class="form-control" id="answer{{$answer->answerid}}" value="{{$answer->description}}" disabled>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <div class="icheck-primary d-inline">
                                                                @if($answer->answer == 0)
                                                                    <input type="checkbox" id="{{$answer->answerid}}">
                                                                @else
                                                                    <input type="checkbox" id="{{$answer->answerid}}" checked>
                                                                @endif
                                                                <label for="{{$answer->answerid}}">
                                                                    
                                                                </label>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-sm btn-soft-warning editanswer" answerid="{{$answer->answerid}}" answer="{{$answer->description}}"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-sm btn-soft-danger deleteanswer" answer="{{$answer->description}}" answerid="{{$answer->answerid}}"questiontype="{{$question->type}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <small>Answer</small>
                                            <br/>
                                            @foreach($question->answers as $answer)
                                                <div id="answercontainer{{$answer->answerid}}">
                                                    <u id="answer{{$answer->answerid}}">{{$answer->description}}</u>
                                                    <br/>
                                                    <button type="button" class="btn btn-sm btn-soft-warning editanswer" answerid="{{$answer->answerid}}" answer="{{$answer->description}}"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-sm btn-soft-danger deleteanswer" answer="{{$answer->description}}" answerid="{{$answer->answerid}}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </article>
    </div>
</div>