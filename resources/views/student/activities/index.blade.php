@extends('student.layouts.app')




@section('content')

    <style>
    

        /* CSS */
        .uk-tab li.uk-active a {
        background-color: white !important;
        color: #fc6982 !important;
        }


    </style>

{{--     
    <div class="card shadow mt-5 mb-2" style="margin-left: 100px; margin-right: 30px; border-radius: 20px;">
    <div class="card-body" style="height: 100vh">
        <div class="course-details-wrapper">
            <div class="container p-sm-0">
                <div uk-grid="" class="uk-grid uk-grid-stack">
                    <div class=" w-100">
                        <nav class="responsive-tab style-5">
                            <ul uk-tab>
                                <li><a href="#ongoing_holder" aria-expanded="true" class="uk-active" id="feedtab">Ongoing</a></li>
                                <li><a href="#due_holder" aria-expanded="false" id="booksholdertab">Past Due</a></li>
                            </ul>
                            <ul class="uk-switcher uk-margin">
                                <li class="course-description-content" id="ongoing_holder">asdsadasS</li>
                                <li class="course-description-content" id="due_holder">sdasd</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}
{{-- 
        <div class="container">
            <div class="uk-grid-large mt-4 uk-grid" uk-grid="">
                <div class="uk-width-expand@m uk-first-column">
                    <ul class="uk-switcher uk-margin">
                        <li class="course-description-content uk-active" id="ongoing_holder">asdsadasS</li>
                        <li class="course-description-content" id="due_holder">sdasd</li>
                    </ul>
                </div>
            </div>
        </div> --}}
    {{-- </div>
</div> --}}
    <div class="card shadow mb-2 mt-1" style="margin-left: 100px; margin-right: 30px; border-radius: 20px;">
        <div class="card-body" style="height: 200vh">
            <div class="page-content pt-lg-5 w-100">


            <div class="">
                <div class="container">

                    <div class="subnav">

                        <ul class="mb-0 uk-tab" uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium" uk-tab="">
                            <li class=""><a href="#" aria-expanded="false"> 
                                    <span> Ongoing</span> </a>
                            </li>
                            <li><a href="#" aria-expanded="false">
                                    <span> Past Due</span></a>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="container">

                <div class="uk-grid-large mt-4 uk-grid ml-2" uk-grid="">
                        <ul id="course-intro-tab" class="uk-switcher uk-width-1-1" style="touch-action: pan-y pinch-zoom;">

                            <!-- course description -->
                            <li class="course-description-content">
                                @foreach($classrooms as $classroom)
                                    @if($classroom->joined == 1)
                                        @foreach($classroom->books as $item)
                                            @if($item->countStatusZero>0)
                                                @foreach($item->quiz as $item)
                                                    @if($item->timeline == 1)
                                                
                                                        <h5> {{$item->formattedDate}} <span class="text-muted" style="font-size: 12px"> {{$item->weekday}} </span> </h5> 
                                                        <div class="uk-card  uk-margin uk-box-shadow-large uk-box-shadow-hover-xlarge  uk-card-default uk-card-body uk-width-1-1 uk-padding-remove" style="border-radius: 20px;">
                                                                    <div class="uk-grid">
                                                                        <div class="uk-width-1-5">
                                                                            <img src="/assets/images/assignment.jpg" alt="preview">
                                                                        </div>
                                                                        <div class="uk-width-3-5 ">
                                                                            <h3 class="uk-card-title" style="margin-top: 3.5rem !important" >{{$item->title}}</h3>
                                                                            <p class="text-muted">due at {{$item->time}}  </p>
                                                                        </div>
                                                                        <div class="uk-width-1-5 uk-text-baseline" style="margin-top: 8rem !important;">
                                                                            <p class="text-muted">Book: <a href="/viewbook/{{$item->classroombooksid}}-{{$item->classroomid}}-{{$item->bookid}}" style="color:#fc6982"> {{$item->book}}</a> </p>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                
                                                    @endif
                                                @endforeach
                                                @else
                                                    <div class="text-center ml-2 h-70 w-100">
                                                        <img src="/assets/images/assignment.jpg" alt="Logo" class="mx-auto rounded d-block" style="width: 50%">
                                                        <h4> No ongoing assignment right now </h4>
                                                    </div>

                                                @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                            

                            </li>


                            <li class="course-description-content">
                                


                                @foreach($classrooms as $classroom)
                                    @if($classroom->joined == 1)
                                        @foreach($classroom->books as $item)
                                            @if($item->countStatusZero>0)
                                                @foreach($item->quiz as $item)
                                                    @if($item->timeline == 0)
                                                
                                                        <div class="uk-card  uk-margin uk-box-shadow-large uk-box-shadow-hover-xlarge  uk-card-default uk-card-body uk-width-1-1 uk-padding-remove" style="border-radius: 20px;">
                                                            <div class="uk-grid">
                                                                <div class="uk-width-1-5">
                                                                    <img src="/assets/images/assignment.jpg" alt="preview">
                                                                </div>
                                                                <div class="uk-width-3-5 ">
                                                                    <h3 class="uk-card-title" style="margin-top: 3.5rem !important" >{{$item->title}}</h3>
                                                                    <p style ="color:red">due at {{$item->time}}  </p>
                                                                </div>
                                                                <div class="uk-width-1-5 uk-text-baseline" style="margin-top: 8rem !important">
                                                                    <p class="text-muted">Book: <a href="#" style="color:#fc6982"> {{$item->book}}</a> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                    @endif
                                                @endforeach
                                                @else
                                                    <div class="text-center ml-2 h-70 w-100">
                                                        <img src="/assets/images/assignment.jpg" alt="Logo" class="mx-auto rounded d-block" style="width: 50%">
                                                        <h4> Yeyy, There nothing here. </h4>
                                                    </div>

                                                @endif
                                        @endforeach
                                    @endif
                                @endforeach

                            
    
                            </li>
                        </ul>
                    </div>
                
            </div>
        </div>











@endsection



