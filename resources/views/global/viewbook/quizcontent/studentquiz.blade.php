<div class="container quizcontent" style="background-color: #fff !important;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(!isset($chapterquizsched))
            <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                            border-radius: 10px  !important;" id="quiz-info">
                <div class="card-header">
                    <h1 class="card-title">
                        Quiz Status {{$allowedstudents == ''}}
                    </h1>
                </div>
                <div class="card-body">
                    <h4><span>Status: </span> <b>Inactive</b> </h4>
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

                    <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                            border-radius: 10px  !important;" id="quiz-info">
                                    <div class="card-header">
                                        <h1 class="card-title">
                                            Quiz Status
                                        </h1>
                                    </div>
                                    
                                    
                                <div class="card-body">
                                    <h4><span> Status: </span> <b>Overdue</b> </h4>
                                    <ul class="list-unstyled">
                                        @if(isset($score) && $score->checked == 1)
                                            <li ><span><b>Score:</b></span> {{$score->totalscore}} / {{$score->maxpoints}}</li>
                                        @else
                                            <li ><span><b>Score:</b></span> Not yet graded</li>
                                        @endif
                                        <li class="border-bottom py-2"><span>Quiz Ended:</span> {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}</li>
                                    </ul>
                                </div>
                    </div> 
                

                @elseif(\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom) > \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))

                    <div class="uk-card uk-card-primary uk-card-body bg-info">
                        <h4 class="uk-card-title">QUIZ HAS NOT YET STARTED!</h4>
                        <p>This quiz will start on {{\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom)->isoFormat('MMMM DD, YYYY hh:mm A')}}</p>
                    </div>
                @else


                    @if(count($allowedstudents) == 0 || $allowedstudents->contains('studentid', auth()->user()->id))

                        <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                        border-radius: 10px  !important;" id="quiz-info">
                                <div class="card-header">
                                    <h1 class="card-title">
                                        Quiz Status
                                    </h1>
                                </div>

                            <div class="card-body">
                                <h4><span> Status: </span> <b>Active</b> </h4>
                                <ul class="list-unstyled">
                                    <li class=""><span>Deadline:</span> {{\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto)->isoFormat('MMMM DD, YYYY hh:mm A')}}</li>
                                    <li class=""><span>Attempts:</span> {{$attemptsLeft}} / {{$chapterquizsched->noofattempts}} </li>
                                    @if(!empty($lastattempt))
                                        @if(isset($score) && $score->checked == 1)
                                            <li ><span><b>Score:</b></span> {{$score->totalscore}} / {{$score->maxpoints}}</li>
                                        @else
                                            <li ><span><b>Score:</b></span> Not yet graded</li>
                                        @endif
                                        <li class=""><span>Last Attempt:</span> {{\Carbon\Carbon::create($lastattempt)->isoFormat('MMMM DD, YYYY hh:mm A')}}</li>
                                    @endif
                                </ul>
                                <div class="card-footer border-top-0 text-center">
                                        @if(!empty($continuequiz))
                                        <button class="btn btn-success mt-3" data-id= "{{ $continuequiz }}" id="btn-continue">Continue</button>
                                        @else
                                        @if($attemptsLeft > 0)
                                        <button class="btn btn-success mt-3"id="btn-attemptquiz">{{$chapterquizsched->btn}}</button>
                                        @else
                                        <span>No attempts left</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>

                    @else

                        <div class="card mt-5" style= "border-top: 10px solid #673AB7  !important;
                        border-radius: 10px  !important;" id="quiz-info">
                            <div class="card-header">
                                <h1 class="card-title">
                                    Quiz Status
                                </h1>
                            </div>
                            <div class="card-body">
                                <h4><span>Status: </span> <b>Restricted</b> </h4>
                                <p>This quiz has been restricted to several students only. Please contact your teacher to allow this quiz for you.</p>
                            </div>
                        </div>

                    @endif



                @endif
            @endif

        </div>
    </div>
</div>

</body>
