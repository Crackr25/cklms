@extends('teacher.layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <style>
        .swal2-header{
            border: none;
        }
        .container-small{
            width: 100%;
            max-width: none;
        }
    </style>
    

    <div class="page-content-inner">

        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
                    <li>Books</li>
                </ul>
            </nav>
        </div>
        <div class="container-small m-0">


            <div class="uk-grid-large mt-lg-3 uk-grid" uk-grid="">
                <div class="uk-width-1-4@m uk-width-1-3@s uk-first-column">
                    <div uk-sticky="offset: 80 ;bottom: true ;media @s" class="uk-sticky" style="">

                        <div uk-lightbox="">
                            <a href="{{asset($bookinfo->picurl)}}" data-caption="Book cover">
                                {{-- <br/> --}}
                                <img class="uk-box-shadow-xlarge" alt="" src="{{asset($bookinfo->picurl)}}">
                            </a>
                        </div>

                        <ul class="uk-list uk-list-divider text-small mt-lg-4">
                            <li> Visited 120 </li>
                            <li> Publish time 12/12/2018</li>
                            <li> Downloaded 120 </li>
                        </ul>

                        {{-- <button class="btn btn-info btn-block">
                            <i class="icon-feather-book-open mr-2"></i> Read
                        </button> --}}
                        <button class="btn btn-danger btn-block"> Add to classroom
                        </button>

                    </div><div class="uk-sticky-placeholder" style="height: 526px; margin: 0px;" hidden=""></div>
                </div>

                <div class="uk-width-3-4@m uk-width-2-3@s">
                    <div class="course-details-wrapper topic-1 uk-light">
        
                        <div class="container p-sm-0">
        
                            <div uk-grid="" class="uk-grid uk-grid-stack">
                                <div class="uk-width-3-3@m uk-first-column">
                                    <div class="course-details m-0">
                                        <h1>{{$bookinfo->title}}</h1>
        
                                        <div class="course-details-info mt-4">
                                            <ul>
                                                <li>
                                                    <div class="star-rating"><span class="avg"> 4.9 </span> <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                                    </div>
                                                </li>
                                                {{-- <li> <i class="icon-feather-users"></i> 3 </li> --}}
                                            </ul>
                                        </div>
        
                                        <div class="course-details-info">
        
                                            <ul>
                                                <li> Created by <a href="#"> Jonathan Madano </a> </li>
                                                <li> Last updated 10/2019</li>
                                            </ul>
        
                                        </div>
                                    </div>
                                    <nav class="responsive-tab style-5">
                                        <ul uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                                            <li class="uk-active"><a href="#" aria-expanded="true">Overview</a></li>
                                            <li class=""><a href="#" aria-expanded="false">Curriculum</a></li>
                                            <li class=""><a href="#" aria-expanded="false">Announcement</a></li>
                                            <li class=""><a href="#" aria-expanded="false">Reviews</a></li>
                                        </ul>
                                    </nav>
        
                                </div>
                            </div>
        
                        </div>
                    </div>
        
                    <div class="container">
        
                        <div class="uk-grid-large mt-4 uk-grid" uk-grid="">
                            <div class="uk-width-3-3@m uk-first-column">
                                <ul id="course-intro-tab" class="uk-switcher mt-4" style="touch-action: pan-y pinch-zoom;">
        
                                    <!-- course description -->
                                    <li class="course-description-content uk-active  " style="">
        
                                        <h4> Description </h4>
                                        <p> {{$bookinfo->description}}</p>
        
        
                                        {{-- <h4> What you’ll learn </h4>
                                        <div class="uk-child-width-1-2@s uk-grid" uk-grid="">
                                            <div class="uk-first-column">
                                                <ul class="list-2">
                                                    <li>Setting up the environment </li>
                                                    <li>Advanced HTML Practices</li>
                                                    <li>Build a portfolio website</li>
                                                    <li>Responsive Designs</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <ul class="list-2">
                                                    <li>Understand HTML Programming</li>
                                                    <li>Code HTML</li>
                                                    <li>Start building beautiful websites</li>
                                                </ul>
                                            </div>
                                        </div>
    
    
                                        <h4> Requirements </h4>
                                        <ul class="list-1">
                                            <li>Any computer will work: Windows, macOS or Linux</li>
                                            <li>Basic programming HTML and CSS.</li>
                                            <li>Basic/Minimal understanding of JavaScript</li>
                                        </ul>
    
                                        <h4> Here is exactly what we cover in this course: </h4>
                                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                            nibh
                                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                            enim ad
                                            minim laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim
                                            veniam,
                                            quis
                                            nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea
                                            commodo
                                            consequat</p>
    
                                        <p> consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                            laoreet
                                            dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                                            nostrud
                                            exerci</p>
    
                                        <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                            nibh
                                            euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                            enim ad
                                            minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                            ut
                                            aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend
                                            option
                                            congue nihil imperdiet doming id quod mazim placerat facer possim assum.
                                            Lorem
                                            ipsum
                                            dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                            minim
                                            veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                            aliquip
                                            ex
                                            ea commodo consequat.</p> --}}
        
        
                                    </li>
                                    @if(count($parts) > 0)
                                        <!-- course Curriculum-->
                                        <li class="" style="">

                                            @foreach($parts as $part)
                                                <h4>{{$part->title}}</h4>
                                                @if(count($part->chapters)>0)
                                                    <ul class="course-curriculum uk-accordion mb-4" uk-accordion="multiple: true">
                                                        @foreach($part->chapters as $chapter)
                                                            <li>
                                                                <a class="uk-accordion-title" href="#">  {{$chapter->title}}  </a>
                                                                <div class="uk-accordion-content" hidden="" aria-hidden="true">
                        
                                                                    @if(count($chapter->lessons)>0)
                                                                        <ul class="course-curriculum-list">
                                                                            @foreach($chapter->lessons as $lesson)
                                                                                <li> {{$lesson->title}} 
                                                                                    {{-- <span> 23 min </span> --}}
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endforeach
            
                                        </li>
                                    @endif
        
        
                                    <!-- course Announcement-->
                                    <li class="" style="">
                                        <h4> Announcement </h4>
        
                                        <div class="user-details-card">
                                            <div class="user-details-card-avatar">
                                                <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                            </div>
                                            <div class="user-details-card-name">
                                                Stella Johnson <span> Instructor <span> 1 year ago </span> </span>
                                            </div>
                                        </div>
        
        
        
                                        <article class="uk-article">
        
                                            <p class="lead"> Nam liber tempor cum soluta nobis eleifend option
                                                congue  imperdiet doming id quod mazim placerat facer possim assum.</p>
        
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                                aute
                                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                nulla
                                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                officia
                                                deserunt mollit anim id est laborum.</p>
        
                                            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                                nibh
                                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                                enim ad
                                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                                ut
                                                aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend
                                                option congue nihil imperdiet doming id quod mazim placerat facer possim
                                                assum.
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                                nibh
                                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                                enim ad
                                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                                ut
                                                aliquip ex ea commodo consequat.</p>
        
        
                                        </article>
                                    </li>
        
                                    <!-- course Reviews-->
                                    <li class="" style="">
        
                                        <div class="review-summary">
                                            <h4 class="review-summary-title"> Student feedback </h4>
                                            <div class="review-summary-container">
                                                <div class="review-summary-avg">
                                                    <div class="avg-number">
                                                        4.8
                                                    </div>
                                                    <div class="review-star">
                                                        <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star half"></span></div>
                                                    </div>
                                                    <span>Course Rating</span>
                                                </div>
        
        
                                                <div class="review-summary-rating">
                                                    <div class="review-summary-rating-wrap">
                                                        <div class="review-bars">
                                                            <div class="full_bar">
                                                                <div class="bar_filler" style="width:95%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="review-stars">
                                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                                        </div>
                                                        <div class="review-avgs">
                                                            95 %
                                                        </div>
                                                    </div>
                                                    <div class="review-summary-rating-wrap">
                                                        <div class="review-bars">
                                                            <div class="full_bar">
                                                                <div class="bar_filler" style="width:80%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="review-stars">
                                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span>
                                                            </div>
                                                        </div>
                                                        <div class="review-avgs">
                                                            80 %
                                                        </div>
                                                    </div>
                                                    <div class="review-summary-rating-wrap">
                                                        <div class="review-bars">
                                                            <div class="full_bar">
                                                                <div class="bar_filler" style="width:60%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="review-stars">
                                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span>
                                                            </div>
                                                        </div>
                                                        <div class="review-avgs">
                                                            60 %
                                                        </div>
                                                    </div>
                                                    <div class="review-summary-rating-wrap">
                                                        <div class="review-bars">
                                                            <div class="full_bar">
                                                                <div class="bar_filler" style="width:45%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="review-stars">
                                                            <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star empty"></span><span class="star empty"></span><span class="star empty"></span>
                                                            </div>
                                                        </div>
                                                        <div class="review-avgs">
                                                            45 %
                                                        </div>
                                                    </div>
                                                    <div class="review-summary-rating-wrap">
                                                        <div class="review-bars">
                                                            <div class="full_bar">
                                                                <div class="bar_filler" style="width:25%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="review-stars">
                                                            <div class="star-rating"><span class="star"></span><span class="star empty"></span><span class="star empty"></span><span class="star empty"></span><span class="star empty"></span>
                                                            </div>
                                                        </div>
                                                        <div class="review-avgs">
                                                            25 %
                                                        </div>
                                                    </div>
        
        
                                                </div>
        
                                            </div>
                                        </div>
        
                                        <div class="comments">
                                            <h4>Reviews <span class="comments-amount"> (4610) </span> </h4>
        
                                            <ul>
                                                <li>
                                                    <div class="comments-avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-by">Stella Johnson<span>Student</span>
                                                            <div class="comment-stars">
                                                                <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                                            </div>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                                            diam
                                                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                            erat
                                                            volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                                            tation
                                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                                            consequat.
                                                        </p>
                                                        <div class="comment-footer">
                                                            <span> Was this review helpful? </span>
                                                            <button> Yes </button>
                                                            <button> No </button>
                                                            <a href="#"> Report</a>
                                                        </div>
                                                    </div>
        
                                                </li>
        
                                                <li>
                                                    <div class="comments-avatar"><img src="{{asset('templatefiles/avatar-3.jpg')}}" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-by"> Adrian Mohani <span>Instructor </span>
                                                            <div class="comment-stars">
                                                                <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star half"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                            ullamcorper
                                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam
                                                            liber
                                                            tempor cum soluta nobis eleifend
                                                        </p>
                                                        <div class="comment-footer">
                                                            <span> Was this review helpful? </span>
                                                            <button> Yes </button>
                                                            <button> No </button>
                                                            <a href="#"> Report</a>
                                                        </div>
                                                    </div>
        
                                                </li>
        
                                                <li>
                                                    <div class="comments-avatar"><img src="{{asset('templatefiles/avatar-3.jpg')}}" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-by"> Adrian Mohani <span>Student</span>
                                                            <div class="comment-stars">
                                                                <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                                            </div>
                                                        </div>
                                                        <p> Nam liber tempor cum soluta nobis eleifend option congue nihil
                                                            imperdiet doming id quod mazim placerat facer possim assum.
                                                            Lorem
                                                            ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                            nonummy
                                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                            volutpat.
                                                        </p>
                                                        <div class="comment-footer">
                                                            <span> Was this review helpful? </span>
                                                            <button> Yes </button>
                                                            <button> No </button>
                                                            <a href="#"> Report</a>
                                                        </div>
                                                    </div>
        
                                                </li>
        
                                                <li>
                                                    <div class="comments-avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-by">Stella Johnson<span>Student</span>
                                                            <div class="comment-stars">
                                                                <div class="star-rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
                                                            </div>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                                            diam
                                                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                            erat
                                                            volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                                            tation
                                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                                            consequat.
                                                        </p>
                                                        <div class="comment-footer">
                                                            <span> Was this review helpful? </span>
                                                            <button> Yes </button>
                                                            <button> No </button>
                                                            <a href="#"> Report</a>
                                                        </div>
                                                    </div>
        
                                                </li>
        
                                            </ul>
        
                                        </div>
        
                                    </li>
        
                                </ul>
                            </div>
        
                        </div>
                    </div>
                </div>


            </div>

        </div>


        <!-- footer
       ================================================== -->
        <div class="footer">
            @include('admin.inc.footer')
        </div>

    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    {{-- @include('teacher.ajax.ajaxforms') --}}
    <script>
        $(document).ready(function(){
            $('.page-menu').addClass('menu-large');
            $(document).on('click','.selectsubject', function() {
                $('input[name=selectedsubjectid]').val($(this).attr('subjectid'));
                $('#selectsubjectform').submit();

            });
        })
    </script>
@endsection