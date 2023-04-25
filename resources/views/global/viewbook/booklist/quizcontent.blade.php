<div class="bg-grey uk-light uk-padding pb-0">
    <h2>{{$quizInfo->title}}</h2>
    <p>Status: @if(isset($chapterquizsched->datefrom)) ACTIVATED @endif</p>
    <input type="hidden" name="quiz_id" id="quiz_id" value="{{$quizInfo->id}}">
    <ul class="uk-tab" uk-switcher="connect: #component-tab-left; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
        <li class="uk-active" data-value="teacher"><a href="#" aria-expanded="true"> <i class="icon-feather-home mr-2"></i>Content</a>
        </li>
        <li class=""  data-value="teacher"><a href="#" aria-expanded="false"> <i class="icon-feather-message-square mr-2"></i>Scoreboard</a>
        </li>
        <li class=""  data-value="teacher"><a href="#" aria-expanded="false"> <i class="icon-feather-settings mr-2"></i>Schedule</a></li>
        <li class="" id="student_answer_tab"  data-value="teacher"><a href="#" aria-expanded="false"> <i class="icon-feather-settings mr-2"></i>Check Answer</a></li>
    </ul>
</div>
<ul class="uk-switcher uk-margin p-3" id="component-tab-left" style="touch-action: pan-y pinch-zoom;">
    <!-- tab 1 -->
    <li class="uk-active" data-value="teacher">
        
        <table class="uk-table uk-table-divider"> 
            @foreach ($quizQuestions as $key=>$item)
                <tr class="bg-info">
                    <th class=" text-white">{{$key+1}}. {{$item->question}}
                        <em><span class="uk-text-emphasis">(@if($item->type == 1)
                           Multiple Choice
                        @elseif($item->type == 2)
                            Identification
                        @elseif($item->type == 3)
                            Essay
                        @endif)</span></em>
                    </th>
                
                </tr>
                @if($item->type == 1)
                    @foreach ($item->choices as $questionitem)
                        <tr class="{{$questionitem->answer == 1?'bg-success text-white':''}}">
                        
                            <td class="pl-5">
                                {{$questionitem->description}}
                                    {{-- <li class="{{$questionitem->answer == 1?'uk-text-success':''}}">
                                        {{$questionitem->description}} {{$questionitem->answer == 1?'- Answer':''}}
                                    </li> --}}
                            </td>
                            {{-- <td>
                                {{$questionitem->answer == 1?'Answer':''}}
                            </td> --}}
                        
                        </tr>
                    @endforeach
                @endif
            @endforeach
           
                {{-- @if($item->type == 1)
                    <p class="mb-4 uk-text-large">{{$key+1}}. {{$item->question}}</p>
                    <ul class="uk-list uk-list-bullet mb-4">
                        @foreach ($item->choices as $questionitem)
                            <li class="{{$questionitem->answer == 1?'uk-text-success':''}}">
                            {{$questionitem->description}} {{$questionitem->answer == 1?'- Answer':''}}
                            </li>
                        @endforeach
                    </ul>
                @elseif($item->type == 2)
                    <p class="mb-4 uk-text-large">{{$key+1}}. {{$item->question}} <i class="text-info uk-text-small">Identification</i></p> 
                @elseif($item->type == 3)
                    <p class="mb-4 uk-text-large">{{$key+1}}. {{$item->question}} <i class="text-info uk-text-small">Essay</i></p>
                @endif --}}
            {{-- @endforeach --}}
        </table>
    </li>

    <!-- tab 2 -->
    <li class="" style="" data-value="teacher">
        <div class="uk-overflow-auto">
            <table class="uk-table uk-table-divider"> 
                <thead> 
                    <tr> 
                        <th width="40%">Student</th> 
                        <th width="20%">Status</th> 
                        <th width="15%">Score</th> 
                        <th width="25%"></th> 
                    </tr> 
                </thead> 
                <tbody> 
                    @foreach ($students as $item)
                        @if($item->quizstatus == 0)
                            <tr  class="bg-info text-white"> 
                                <td class="align-middle">{{$item->lastname.', '.$item->firstname}} </td> 
                                <td class="align-middle">ANSWERED</td> 
                                <td class="align-middle"> 0 / {{$totalPoints}}</td> 
                                <td class="align-middle">
                                    <button type="button" class="btn btn-icon-label btn-warning" id="view_answers" data-id="{{$item->userid}}">
                                        <span class="btn-inner--icon">
                                            <i class="icon-feather-check"></i>
                                        </span>
                                        <span class="btn-inner--text">VIEW ANSWERS</span>
                                    </button>
                            </td> 
                            </tr>
                        @elseif($item->quizstatus == 1)
                            <tr  class="bg-success text-white"> 
                                <td class="align-middle">{{$item->lastname.', '.$item->firstname}} </td> 
                                <td class="align-middle">GRADED</td> 
                                <td class="align-middle">{{$item->points}} / {{$totalPoints}}</td> 
                                <td class="align-middle"><button type="button" class="btn btn-icon-label btn-warning" id="view_answers" data-id="{{$item->userid}}">
                                    <span class="btn-inner--icon">
                                        <i class="icon-feather-check"></i>
                                    </span>
                                    <span class="btn-inner--text">VIEW ANSWERS</span>
                                </button></td> 
                            </tr>
                        @elseif( $item->quizstatus == 2)
                            <tr  class="bg-success text-white"> 
                                <td class="align-middle">{{$item->lastname.', '.$item->firstname}} </td> 
                                <td class="align-middle">NOT ANSWERED</td> 
                                <td class="align-middle"> 0 / {{$totalPoints}}</td> 
                                <td class="align-middle"></td> 
                            </tr>
                        @endif
                    @endforeach
                </tbody> 
            </table>
        </div>
    </li>

    <!-- tab 3 -->
    <li class="" style="" data-value="teacher">
        @if(isset($chapterquizsched->datefrom))
            @if($chapterquizsched->status == 1)
                <div class="pricing-plans-container">
                    <div class="pricing-plan">
                        <div class="recommended-badge">Quiz Overdue </div>
                        <h3>Quiz Ended last {{\Carbon\Carbon::create($chapterquizsched->updateddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}</h3>
                        <a id="update_quiz_sched" uk-toggle="target: #sched_modal" id="update_quiz_sched" data-quiz_sched_id="{{$chapterquizsched->id}}" class="btns" >Re-open Quiz</a>
                    </div>
                </div>
            @elseif(\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto) <= \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))
                <div class="pricing-plans-container">
                    <div class="pricing-plan">
                        <div class="recommended-badge">Quiz Overdue </div>
                        <h3>Quiz Ended last {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}</h3>
                        {{-- <button type="button" class="btn btn-success" uk-toggle="target: #sched_modal" id="update_quiz_sched" data-quiz_sched_id="{{$chapterquizsched->id}}">
                            Reo Quiz Schedule
                        </button> --}}

                        <a id="update_quiz_sched" uk-toggle="target: #sched_modal" id="update_quiz_sched" data-quiz_sched_id="{{$chapterquizsched->id}}" class="btns" >Re-open Quiz</a>
                    </div>
                </div>
            @else
                <div class="uk-margin">
                        <label for="">Date Start</label>
                        <input class="uk-input" type="date" value="{{$chapterquizsched->datefrom}}" disabled id="d_date_start"> 
                </div>
                <div class="uk-margin">
                    <label for="">Start time</label>
                    <input class="uk-input" type="time" value="{{$chapterquizsched->timefrom}}" disabled id="d_time_start"> 
                </div>
                <div class="uk-margin">
                    <label for="">Date End</label>
                    <input class="uk-input" type="date" value="{{$chapterquizsched->dateto}}" disabled id="d_date_end"> 
                </div>
                <div class="uk-margin">
                        <label for="">End time</label>
                        <input class="uk-input" type="time" value="{{$chapterquizsched->timeto}}" disabled id="d_time_end"> 
                </div>
                <div class="uk-margin">Number of attempts</label>
                    <input class="uk-input" type="text" value="{{$chapterquizsched->noofattempts}}" disabled id="d_attempts"> 
                </div>
                <div class="uk-margin">
                    <button type="button" class="btn btn-danger float-right" id="end_quiz" data-id="{{$chapterquizsched->id}}">
                        End Quiz
                    </button>
                    <button type="button" class="btn btn-success btns" uk-toggle="target: #sched_modal" id="update_quiz_sched" data-quiz_sched_id="{{$chapterquizsched->id}}">
                        Update Quiz Schedule
                    </button>
                </div>
            @endif
        @else
            <p>Please set schedule to activate quiz. </p>
            <div class="uk-margin">
                <a href="#" class="btn btn-default uk-visible@s" id="addclassroom" uk-toggle="target: #sched_modal"> <i class="uil-plus"></i> Set Quiz Schedule</a>
            </div>
            
        @endif
    </li>

    <!-- tab 4 -->
    <li id="student_answer" data-value="teacher">
        <div id="no_selected_student">
            <div class="uk-card uk-card-primary uk-card-body bg-info">
                <h4 class="uk-card-title">NO STUDENT SELECTED!</h4>
                <p>Please select student from the Scoreboard</p>
            </div>
        </div>
    </li>
</ul>

<script>
    $(document).ready(function(){
        $(document).on('change','#date_start',function(){
            $('#date_end').val($(this).val())
        })
        $(document).on('change','#time_start',function(){
            $('#time_end').val($(this).val())
        })
    })
  
</script>