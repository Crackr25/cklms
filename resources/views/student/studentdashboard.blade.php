@extends('student.layouts.app')


@section('headercover')
    {{-- <div class="home-hero pt-2" style="background-image: url({{asset('assets/images/Header.png')}}); background-repeat:no-repeat;background-size:cover;background-position:center center; height: 130%;"> --}}
    <div class="home-hero pt-2 " style="background-color: {{$schoolinfo->schoolcolor}};height: 15%; padding-bottom: 0px !important;">
        <div class="uk-width-1-1">
            <div class="page-content-inner uk-position-z-index">
                @if(isset($schoolinfo->picurl))
                <img src="{{$schoolinfo->picurl}}" alt="Logo" class="uk-align-center" style="height: 250px; width: 250px; float: left; margin-right: 10px;">
                @endif
                <h1 class="text-white pt-5" style="font-size: 50px">{{$schoolinfo->schoolname}}</h1>
                <h4 class="text-white">{{$schoolinfo->address}}</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
<style>


.image-wrapper {
  height: 320px; /* Set the desired height */
  overflow: hidden; /* Hide any overflowing content */
}

    .title-word {
    font-size: 48px;
    display: inline-block;
    animation: color-animation 4s linear infinite;
    }

    #hours {
    --color-1: #DF8453;
    --color-2: #3D8DAE;
    --color-3: #E4A9A8;
    }

    #minutes {
    --color-1: #DBAD4A;
    --color-2: #ACCFCB;
    --color-3: #17494D;
    }

    @keyframes color-animation {
    0%    {color: var(--color-1)}
    32%   {color: var(--color-1)}
    33%   {color: var(--color-2)}
    65%   {color: var(--color-2)}
    66%   {color: var(--color-3)}
    99%   {color: var(--color-3)}
    100%  {color: var(--color-1)}
    }


</style>


    <div class="container">
        <div id="modal-book-info" uk-modal> 
            <div class="uk-modal-dialog uk-modal-body"> 
                <button class="uk-modal-close-default" type="button" uk-close></button> 
                <div class="uk-margin">
                    <div class="uk-grid" uk-grid="">
                        <div class="uk-width-1-3@m">
                            <img  id="modal_book_cover" alt="">
                        </div>
                        <div class="uk-width-2-3@m">
                            <ul class="uk-list uk-list-divider text-small mt-lg-4">
                                <li>
                                    <div class="uk-grid" uk-grid="">
                                        <div class="uk-width-1-3@m">
                                            Book Title:
                                        </div>
                                        <div class="uk-width-2-3@m">
                                            <span id="modal_book_title">
                                            </span>
                                        </div>
                                    <div>
                                </li>
                                <li>
                                    <div class="uk-grid" uk-grid="">
                                        <div class="uk-width-1-3@m">
                                            Date Added:
                                        </div>
                                        <div class="uk-width-2-3@m">
                                            <span id="modal_book_added">
                                            </span>
                                        </div>
                                    <div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <a href="#" target="_blank" type="button" class="btn btn-info mt-2 uk-first-column" id="modal_view_book_button">
                        <i class="icon-feather-book-open mr-2h mr-2"></i>View Book
                    </a>
                    {{-- <a href="#" type="button" class="btn btn-info uk-first-column mt-2" id="modal_view_quiz_button">
                        <i class="icon-feather-book-open mr-2h mr-2"></i>Quiz Summarry
                    </a> --}}
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-8">
                {{-- <div class="row">
                    <div class="col-md-12 d-flex flex-row ">
                        <img src="{{asset('/avatar/avatar.png')}}" alt="Logo" style="height: 100px; width: 100px;">
                        <h3 class="pt-3">{{auth()->user()->name}}</h3>
                        <h3 class="pt-3">{{auth()->user()->name}}</h3>
                    </div>
                </div> --}}
                <div class="d-flex justify-content-between align-items-center mt-4" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 10px;">
                    <div class="d-flex align-items-center ">
                        <div>
                            <img src="{{asset('/avatar/avatar.png')}}" alt="Logo" style="height: 100px; width: 100px;">
                        </div>
                        <div class="">
                            <span style="line-height: 13px"><span class="h6">{{ explode(' ', auth()->user()->name)[0] }}'S DASHBOARD </span> <br> {{auth()->user()->email}}</span>
                            {{-- <p class="align-items-center"></p> --}}
                        </div>
                    </div>

                    <div class="ml-5 mt-2 align-self-end">
                        <p style="font-size: 10px" class="pl-5 text-muted"><b>Student</b></p>
                    </div>
                </div>

                <h4 class="mt-5">Book</h4>


                @foreach($classrooms as $classroom)
                    @if($classroom->joined == 1)
                        <div class="row">
                        @foreach($classroom->books as $item)
                            <div class="col-md-4">
                                <a href="#" class="uk-text-bold book_info" uk-toggle="target: #modal-book-info" data-id="{{$item->id}}" data-title="{{$item->title}}" data-cover="{{ asset($item->picurl)}}" data-added="{{\Carbon\Carbon::create($item->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}" view-book-id="{{$item->id}}-{{$item->classroomid}}-{{$item->bookid}}">
                                    <div class="image-wrapper animate-this">
                                        <img src="{{ asset($item->picurl) }}" class="mb-2 w-100 shadow rounded" alt="{{$item->title}}">
                                    </div>
                                    <div class="image-title">{{$item->title}}</div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    @endif
                @endforeach


                


                @if(count($classrooms) > 0)
                <div class="section-small ">
                    <div id="course-grid-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h4 class="mt-5">Classroom</h4>
                                <div class="row">
                                
                                    @foreach($classrooms as $classroom)
                                        @if($classroom->joined == 1)
                                            <div class="col-md-5">
                                                <div class="card classroom animate-this" classroomid="{{Crypt::encrypt($classroom->id)}}">
                                                    <a href="/studentviewclassroom?classroomid={{\Crypt::encrypt($classroom->id)}}">
                                                        <img class="card-img-top" src="{{asset('assets/images/elearning6.png')}}" alt="Classroom Thumbnail">
                                                        <div class="card-body">
                                                            <h6 class="card-title">{{$classroom->classroomname}}</h6>
                                                            <h6 class="card-text">{{$classroom->code}}</h6>
                                                            <p class="card-text"><small>Date Joined: {{$classroom->datejoined}}</small></p>
                                                            
                                                        </div>
                                                        <div class="card-footer pt-2">
                                                                <h5><i class="icon-feather-users"></i> {{$classroom->students}} Student/<span class="text-lowercase">s</span></h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#course-grid-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#course-grid-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            @endif

                
            </div>



           

            <div class="col-md-4 ">


                <div class="mt-4 p-4 bg-white text-center rounded">

                    <h4 class="">Clock</h4>
                    <hr>
                    <div id="clock" class="clock">
                        <span class= "title-word" id="hours">00 </span>
                        <span class= "title-word" id="minutes">00 </span>
                        <span class= "title-word" id="meridiem"> </span>
                    </div>

                </div>
                <div class="my-4 p-4 bg-white rounded">
                    <h4 class="">Deadline</h4>
                    <ul class="list-group rounded ">
                        @foreach($classrooms as $classroom)
                            @if($classroom->joined == 1)
                                @foreach($classroom->books as $item)
                                    @foreach($item->quiz as $quiz)
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-flush ">
                                            <div class="d-flex flex-column">
                                                <h5 class="mb-1">{{$quiz->title}}</h5>
                                                <p class="mb-1">{{$item->title}}</p>
                                                <small class="text-muted">{{ \Carbon\Carbon::create($quiz->datefrom)->isoFormat("MMMM DD, YYYY") }}</small>
                                            </div>
                                            <span class="badge {{$quiz->badge}}">{{$quiz->timeline}}</span>
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                        </ul>
                </div>
                        

{{--                         
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <h5 class="mb-1">Quiz 2</h5>
                            <p class="mb-1">Science</p>
                            <small class="text-muted">July 15, 2023</small>
                        </div>
                        <span class="badge bg-info rounded-pill text-white">Upcoming</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <h5 class="mb-1">Quiz 3</h5>
                            <p class="mb-1">English</p>
                            <small class="text-muted" >July 20, 2023</small>
                        </div>
                        <span class="badge bg-info rounded-pill text-white">Upcoming</span>
                        </li>
                    </ul>
                </div> --}}

                <div class="my-3 p-4 bg-white rounded" id="calendar"></div>
                
                <div class="my-5  p-4">

                </div>
            </div>
        </div>
        {{-- @if(count($classrooms) > 0)
            <div class="section-small p-3">
                <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">
                    <div class="grid-slider-header">
                        <div class="grid-slider-header-link">
                            <a href="" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                            <a href="" class="slide-nav-next" uk-slider-item="next"></a>
                        </div>
                    </div>
                    <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(0px, 0px, 0px);" id="classroom_table">
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
                                                    <h5> <i class="icon-feather-book"></i> {{$classroom->books}} Book/s </h5>
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
                    </ul>
                </div>
            </div>
        @endif --}}
        <footer class="bg-light text-center py-4">
                        <div class="container">
                            <p class="m-0">© 2023 Powered by CK</p>
                        </div>
        </footer>

    </div>

    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var meridiem = hours >= 12 ? 'PM' : 'AM';

            // Convert hours to 12-hour format
            hours = (hours + 11) % 12 + 1;

            // Add leading zeros if necessary
            hours = hours.toString().padStart(2, '0');
            minutes = minutes.toString().padStart(2, '0');


            document.getElementById('hours').textContent = hours + ':';
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('meridiem').textContent = meridiem;
        }


            // Call the updateClock function every second to keep the clock updated
        setInterval(updateClock, 1000);


        $(document).ready(function() {

            $(document).on('click','.book_info',function(){

                    selectedBook = $(this).attr('data-id');

                    $('#modal_book_added').text($(this).attr('data-added'))
                    $('#modal_book_title').text($(this).attr('data-title'))
                    $('#modal_book_cover').attr('src',$(this).attr('data-cover'))
                    $('#modal_view_book_button').attr('href','/viewbook/'+$(this).attr('view-book-id'))
                    $('#modal_view_quiz_button').attr('data-id', $(this).attr('view-book-id'));


            })


            $('#calendar').fullCalendar({
            // Configuration options
            });
        });
    </script>

@endsection