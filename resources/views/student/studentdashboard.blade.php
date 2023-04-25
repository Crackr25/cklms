@extends('student.layouts.app')


@section('headercover')
    <div class="home-hero pt-2" style="background-image: url({{asset('assets/images/elearning4.jpg')}}); background-repeat:no-repeat;background-size:cover;background-position:center center; height: 130%;">
        <div class="uk-width-1-1">
            <div class="page-content-inner uk-position-z-index">
                <h1 class="text-white">CK Learning Management System</h1>
                <h4 class="my-lg-4 text-white">Your Access to Visual Learning and Integration </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        @if(count($classrooms) > 0)
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
        @endif
    </div>
@endsection