{{-- @if(count($data[0]->data) > 0)
    <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid" uk-grid=""  >
        @foreach($data[0]->data as $classroom)
            <div class="quizCount">
                <a href="/teacherquizview?quizviewview=12">
                    <div class="course-card">
                        <div class="course-card-thumbnail ">
                            <img src="{{asset('assets/images/elearning8.jpg')}}">
                            <span class="play-button-trigger"></span>
                        </div>
                        <div class="course-card-body">
                            <h4>Quiz 1</h4>
                            <p></p>
                            <div class="course-card-footer">
                                <h5> <i class="icon-feather-calendar"></i> Created: June 12, 2023 </h5>
                                <h5> <i class="icon-feather-clock"></i>Active</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div> --}}
@if(isset($data[0]->count) == 0)
    <div>
        <div class="uk-card uk-card-primary uk-card-body bg-grey">
            <h5>NO QUIZ FOUND!</h5>
        </div>
    </div>
@else
    <div id="max_reach"></div>
@endif