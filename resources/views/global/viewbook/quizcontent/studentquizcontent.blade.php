

<div class="bg-info uk-light uk-padding pb-0">
      <h2>{{$quizInfo->title}}</h2>
      <p>Status: {{isset($chapterquizsched->datefrom)? 'ACTIVATED':'NOT ACTIVATED'}}</p>
      <input type="hidden" name="quiz_id" id="quiz_id" value="{{$quizInfo->id}}">
      <ul class="uk-tab" uk-switcher="connect: #component-tab-left; animation: uk-animation-slide-right-medium, uk-animation-slide-right-medium">
          <li class="uk-active"><a href="#" aria-expanded="true"> <i class="icon-feather-home mr-2"></i>Content</a>
          </li>
          <li><a href="#" aria-expanded="false"> <i class="icon-feather-message-square mr-2" id="quizResult"></i>Quiz Result</a>
          </li>
          <li class=""><a href="#" aria-expanded="false"> <i class="icon-feather-settings mr-2"></i>Schedule</a></li>
      </ul>
</div>
  <ul class="uk-switcher uk-margin p-3" id="component-tab-left" style="touch-action: pan-y pinch-zoom;">
     
      <li class="uk-active">


        @if(!isset($chapterquizsched->status))

            <div>
                <div class="uk-card uk-card-primary uk-card-body bg-info">
                    <h4 class="uk-card-title">THIS QUIZ IS NOT YET ACTIVATED!</h4>
                    <p>Please contact your teacher to open this quiz.</p>
                </div>
            </div>

        @else
      
            
            
            @if($chapterquizsched->status == 1)

                <div>
                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">THIS QUIZ HAS ENDED!</h4>
                        <p>Your teacher ended this quiz last {{\Carbon\Carbon::create($chapterquizsched->updateddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}.</p>
                    </div>
                </div>

            @elseif(\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto) <= \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))

                <div class="uk-card uk-card-primary uk-card-body bg-info">
                    <h4 class="uk-card-title">QUIZ OVERDUE!</h4>
                    <p>Quiz Ended last {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}</p>
                </div>

            @elseif(\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom) > \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))

                <div class="uk-card uk-card-primary uk-card-body bg-info">
                    <h4 class="uk-card-title">QUIZ IS NOT YET STARTED!</h4>
                    <p>This quiz Will start on {{\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom)->isoFormat('MMMM DD, YYYY hh:mm A')}}</p>
                </div>

                
            @elseif($isAnswered && $chapterquizsched->status == 0)
                @if($quizRecord->quizstatus == 1)
                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">THIS QUIZ HAS BEEN GRADED</h4>
                        <p>This quiz has been graded last {{\Carbon\Carbon::create($quizRecord->updateddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}. Visit Quiz Result tab to view graded quiz.</p>
                    </div>
                @else
                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">QUIZ ANSWERS HAS BEEN SUBMITTED!</h4>
                        <p>You submitted your quiz answers last {{\Carbon\Carbon::create($quizRecord->submitteddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}. You have {{$attemptsLeft}} / {{$chapterquizsched->noofattempts}} attempts left.</p>
                        @if($attemptsLeft != 0 || $attemptsLeft > 0)
                            <button type="button" class="btn btn-icon-label btn-warning" id="retakeQuiz" data-id="{{$quizRecord->id}}">
                                <span class="btn-inner--icon">
                                    <i class="icon-feather-edit"></i>
                                </span>
                                <span class="btn-inner--text">RETAKE QUIZ ( {{$attemptsLeft}} )</span>
                            </button>
                        @endif
                    </div>
                @endif
            @else
                  
                <div>
                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">THIS QUIZ IS ACTIVATED!</h4>
                        <p>This quiz will end on {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}. You have {{$attemptsLeft}} / {{$chapterquizsched->noofattempts}} attempts left.</p>

                        {{-- <button type="button" class="btn btn-success float-right" id="submitAnswers">Submit Answers</button> --}}
                    </div>
                </div>
                <form id="answerForm" data-id="chaptertestform{{$quizInfo->id}}"  class="mb-5 pb-3" method="POST" 
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="studentuserid" value="{{Crypt::encrypt(auth()->user()->id)}}"/>
                    <input type="hidden" name="chapterquizid" value="{{$quizInfo->id}}"/>
                    <input type="hidden" name="recordid" value="{{$quizInfo->id}}"/>
                    <input type="hidden" name="roomid" value="{{$clasroomid}}"/>
                    <div uk-slideshow="animation: push">
                        <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                            <ul class="uk-slideshow-items">
                                @foreach ($quizQuestions as $key=>$item)
                                    <li>
                                        <div class="uk-card-hover  h-100 uk-text-secondary bg-white" style="overflow-y: auto;padding: 2rem 5rem  !important">
                                            <p>{{$key+1}}. {{$item->question}} 

                                                    @if($item->type == '1')
                                                        (<em>Multiple Choice</em>)
                                                    @elseif($item->type == '2')
                                                        (<em>Identification</em>)
                                                    @elseif($item->type == '3')
                                                        (<em>Essay</em>)
                                                    @endif
                                            </p>
                                                @if($item->type == '1')
                                                    <ul class="uk-list pl-4">
                                                        @foreach ($item->choices as $questioninfo)
                                                            <li>
                                                                <div class="uk-margin uk-grid-small                 uk-child-width-auto uk-grid ">
                                                                    
                                                                    @if(collect($item->choices)->where('answer',1)->count() == 1)
                                                                            <label>
                                                                            <input 
                                                                                type="radio"     
                                                                                name="chapterid{{$quizInfo->id}}_questionid{{$item->id}}_multiple[]" 
                                                                                id="answer{{$questioninfo->id}}" 
                                                                                class="answervalue uk-radio"
                                                                                value="{{$questioninfo->id}}" 
                                                                                item="{{$key+1}}"
                                                                                >
                                                                            {{$questioninfo->description}}
                                                                            </label>
                                                                    @else
                                                                            <label>
                                                                            <input 
                                                                                style="padding:0 9px !important"
                                                                                type="checkbox"     
                                                                                name="chapterid{{$quizInfo->id}}_questionid{{$item->id}}_multiple[]" 
                                                                                id="answer{{$questioninfo->id}}" 
                                                                                class="answervalue uk-checkbox mr-2"
                                                                                value="{{$questioninfo->id}}" 
                                                                                item="{{$key+1}}"
                                                                                
                                                                                >
                                                                            {{$questioninfo->description}}
                                                                            </label>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @elseif($item->type == '2')
                                                    <input type="text" name="chapterid{{$quizInfo->id}}_questionid{{$item->id}}_ident[]" class="answervalue uk-input"  item="{{$key+1}}" row="5"  placeholder="Answer..."/>
                                                @elseif($item->type == '3')
                                                    <textarea name="chapterid{{$quizInfo->id}}_questionid{{$item->id}}_essay[]" class="answervalue uk-text-area"  item="{{$key+1}}" row="6" style="resize:none">Answer...</textarea>
                                                @endif
                                        </div>
                                    </li>
                                    
                                @endforeach
                            </ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                        </div>
                        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                    </div>
                    <button class="btn btn-success float-right submitanswers" id="submitAnswers">Submit Answers</button>
                </form>
                {{-- <button type="button" class="btn btn-success float-right" id="submitAnswers" record-id="{{$quizInfo->id}}" chapquizid="{{$quizInfo->id}}">Submit Answers</button> --}}
            @endif
        @endif
      </li>
  
      <li class="" style="">
            @if(count($quizAnswersInfo) == 0)
                <div>
                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">YOU HAVEN'T SUBMITTED YOUR ANSWERS FOR THIS QUIZ!</h4>
                        <p>Please take the quiz to view quiz result.</p>
                    </div>
                </div>
            @else
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-divider"> 
                        @php
                            $QuestionCount = 1; 
                            $totaPoints = 0;
                            $studentTotalPoints = 0;      
                        @endphp
                        @foreach ($quizAnswersInfo as $key=>$item)
                            <tr class="bg-info ">
                                <th class="text-white">{{$QuestionCount}}. {{$item[0]->question}}</th>
                            </tr>
                            @if($item[0]->type == 1)
                               
                                <tr>
                                    <td >
                                        <div class="uk-card uk-card-default uk-card-body pb-3 pt-3">
                                                <h5>Question Point: <span>{{$item[0]->points}}</span></h5>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body pb-3 pt-3 mt-3">
                                            <h6 id="introduction">Your Answer : </h6>
                                            @foreach ($item as $answeritem)
                                                <p class="pl-4">{{$answeritem->description}}</p>
                                            @endforeach
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body pb-3 mt-3">
                                                <h5>Your Point: <span>{{$item[0]->studPoints}}</span></h5>
                                        </div>
                                       
                                    </td>
                                </tr>
                            @elseif($item[0]->type == 2 || $item[0]->type == 3)
                                <tr>
                                    <td colspan="pl-5">
                                        <div class="uk-card uk-card-default uk-card-body pb-3 pt-3">
                                                <h5>Question Point: <span>{{$item[0]->points}}</span></h5>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body pb-3 pt-3 mt-3">
                                            <h6 id="introduction">Your Answer : </h6>
                                            <p class="pl-4">{{$item[0]->description}}</p>
                                        </div>
                                        <div class="uk-card uk-card-default uk-card-body pb-3 mt-3">
                                                <h5>Your Point: <span>{{$item[0]->studPoints}}</span></h5>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            @php
                                $studentTotalPoints += $item[0]->studPoints;    
                                $totaPoints += $item[0]->points;
                                $QuestionCount += 1;   
                            @endphp
                        @endforeach
                        <tr class="bg-info ">
                            <td class="p-0">&nbsp;</td>
                      </tr>
                        <tr>
                                <td>
                                    <div class="uk-card uk-card-default uk-card-body mt-2">
                                            <div class="uk-child-width-expand@s  uk-grid" uk-grid="">
                                                <div class="uk-first-column">
                                                        <h5>Total Quiz Points : </h5>
                                                </div>
                                                <div>
                                                        <h5>{{$totaPoints }}</h5>
                                                </div>
                                                
                                                </div>
                                    </div>
                                    <div class="uk-card uk-card-default uk-card-body mt-2">
                                            <div class="uk-child-width-expand@s  uk-grid" uk-grid="">
                                                <div class="uk-first-column">
                                                        <h5>Your Total Points : </h5>
                                                </div>
                                                <div>
                                                        <h5>{{$studentTotalPoints}}</h5>
                                                </div>
                                            </div>
                                    </div>
                                </td>
                        </tr>
                    </table>
                </div>
            @endif
      </li>
  
      <li>

            @if(isset($chapterquizsched->status) && $chapterquizsched->status == 0)

                <div class="uk-margin">
                        <label for="">Date Start</label>
                        <input class="uk-input" type="date" value="{{$chapterquizsched->datefrom}}" disabled> 
                </div>
                <div class="uk-margin">
                        <label for="">End time</label>
                        <input class="uk-input" type="time" value="{{$chapterquizsched->timeto}}" disabled> 
                </div>
                <div class="uk-margin">
                    <label for="">Date End</label>
                    <input class="uk-input" type="date" value="{{$chapterquizsched->dateto}}" disabled> 
                </div>
                <div class="uk-margin">
                        <label for="">Start time</label>
                        <input class="uk-input" type="time" value="{{$chapterquizsched->timefrom}}" disabled> 
                </div>
                <div class="uk-margin">Number of attempts</label>
                    <input class="uk-input" type="text" value="{{$chapterquizsched->noofattempts}}" disabled> 
                </div>

            @else

                <div>
                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">NO AVAILABLE SCHEDULE FOR THIS QUIZ!</h4>
                        <p></p>
                    </div>
                </div>
          
            @endif
      </li>
  </ul>






  