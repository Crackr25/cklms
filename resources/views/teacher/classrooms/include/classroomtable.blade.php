@if(count($data[0]->data) > 0)
    <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid" uk-grid=""  >
        @foreach($data[0]->data as $classroom)
            <div class="roomCount">
                    
                        <div class="course-card animate-this">
                            <div class="course-card">
                                <div class="uk-animation-toggle" tabindex="0">
                                    <button class="close-button uk-animation-shake" data-id="{{$classroom->id}}"><span>&times;</span></button>
                                </div>
                                <div class="course-card-thumbnail">
                                    @if(isset($classroom->picurl))
                                        <img src="{{$classroom->picurl}}" alt="Preview" style="max-width: 100%; max-height: 100%;">
                                    @else
                                        <img src="{{asset('assets/images/elearning6.png')}}">
                                    @endif
                                    <span class="play-button-trigger"></span>
                                </div>
                            <a href="/teacherclassroomview?classroomview={{$classroom->id}}">
                                <div class="course-card-body">
                                    <h4>{{$classroom->classroomname}}</h4>
                                    <p>{{$classroom->code}}</p>
                                    <div class="course-card-footer">
                                        <h5> <i class="icon-feather-film"></i> {{$classroom->students}} Students </h5>
                                        {{-- <h5> <i class="icon-feather-clock"></i>{{$classroom->books}} Books</h5> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

        @endforeach
    </div>
@elseif($data[0]->filtertype == 2 && $data[0]->count == 0)
    <div>
        <div class="uk-card uk-card-primary uk-card-body bg-grey">
            <h5>NO CLASSROOM FOUND!</h5>
        </div>
    </div>
@else
    <div id="max_reach"></div>
@endif