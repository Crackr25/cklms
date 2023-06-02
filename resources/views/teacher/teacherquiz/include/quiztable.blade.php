@if(count($data) > 0)
    <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid" uk-grid=""  >
        @foreach($data as $quiz)


                
                <div class="quizCount">
                    <div class="course-card">
                        <div class="course-card-thumbnail">
                            <img src="{{asset('assets/images/elearning8.jpg')}}">
                            <span class="play-button-trigger"></span>
                            <button class="close-button" data-id="{{$quiz->id}}">×</button> <!-- Add the close button -->
                        </div>
                        <a href="/teacherquiz/quiz/{{$quiz->id}}">
                            <div class="course-card-body">
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle dropdown-title" type="button" id="quizDropdown{{$quiz->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$quiz->title}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="quizDropdown{{$quiz->id}}">
                                        <p class="dropdown-item quiz-description">{{$quiz->description}}</p>
                                    </div>
                        </a>
                                </div>
                                <div class="course-card-footer">
                                    <h5><i class="icon-feather-calendar"></i> Created: {{\Carbon\Carbon::create($quiz->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}</h5>
                                    <button class="btn btn-dark activatequiz" data-id="{{$quiz->id}}">Activate</button>
                                </div>
                            </div>
                    
                    </div>
                </div>



        @endforeach
    </div>
@elseif(count($data) == 0)
    <div>
        <div class="uk-card uk-card-primary uk-card-body bg-grey">
            <h5>NO QUIZ FOUND!</h5>
        </div>
    </div>
@else
    <div id="max_reach"></div>
@endif