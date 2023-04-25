@foreach($classrooms as $classroom)
      @if($classroom->joined == 1)
      <li tabindex="-1" class="uk-active classroom" classroomid="{{Crypt::encrypt($classroom->id)}}">
            <a href="/studentviewclassroom?classroomid={{\Crypt::encrypt($classroom->id)}}" cl>
                  <div class="course-card h-100">
                  <div class="course-card-thumbnail ">
                        <img src="{{asset('assets/images/elearning6.png')}}">
                        <span class="play-button-trigger"></span>
                  </div>
                  <div class="course-card-body">
                        <h4>{{$classroom->classroomname}}</h4>
                        <h4>{{$classroom->code}}</h4>
                        <p><small>Date Joined: {{$classroom->datejoined}}</small> </p>
                  
                        <div class="course-card-footer">
                              <h5> <i class="icon-feather-users"></i> {{$classroom->students}} Student/<span class="text-lowercase">s</span> </h5>
                              <h5> <i class="icon-feather-book"></i> {{$classroom->books}} Book/<span class="text-lowercase">s</span> </h5>
                        </div>
                        <div class="course-card-footer">
                              <h5> <i class="icon-feather-user"></i> {{$classroom->firstname}} {{$classroom->lastname}} {{$classroom->suffix}}</h5>
                        </div>
                  </div>
                  </div>
            </a>
      </li>
      @endif
@endforeach