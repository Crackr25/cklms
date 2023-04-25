@extends('admin.layouts.app')

@section('content')
    <style>
        .course-card h4{
            text-overflow: unset !important;
            white-space: unset !important;
        }
    </style>

    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                    <li><a href="/adminbookdescription/{{Crypt::encrypt('index')}}/{{$bookid}}">{{$booktitle}}</a></li>
                    <li>
                        <form action="/adminparts/{{Crypt::encrypt($manualselection)}}" method="get" class="m-0 p-0" style="display: inline;">
                            @csrf
                            <input type="hidden" name="bookid"  value="{{Crypt::encrypt($bookid)}}"/>
                            <a class="lecturelink">Lecture Manual</a>
                        </form>
                    </li>
                    <li>Lessons</li>
                </ul>
            </nav>
        </div>
        <div class="mt-lg-4 uk-grid" uk-grid="">
            <div class="uk-width-1-4@m uk-first-column">
                <img src="{{asset('altimages/default.png')}}" alt="" class="rounded shadow">
            </div>
            <div class="uk-width-expand">
                <p class="my-0 uk-text-small">Chapter Title</p>
                <h3 class="mt-0"> {{$chapterinfo->description}} </h3>
                {{-- <p> CSS is what makes the web beautiful. It describes how HTML should be displayed and how to
                    layout elements. Take this class and get familiar with CSS!
                    <a href="#">Read more</a></p> --}}
            </div>
        </div>
        <div class="course-path-info my-4 my-lg-5">
            {{-- <h4 class="uk-text-bold"> What you will learn </h4>
            <ul>
                <li>Basics of programming </li>
                <li>Built-in types</li>
                <li>JavaScript operators</li>
                <li>Applying CSS Filters</li>
                <li>Flexible Box</li>
                <li>Floating and Clearing Elements</li>
                <li>Grid </li>
                <li>CSS Variables</li>
                <li>How Elements are Rendered</li>
                <li>CSS Grid Layout </li>
            </ul>
            <hr/> --}}
            <p>
                <a href="#" class="btn createnewlesson text-white" style="background-color: #3175c2;">
                    <i class="uil-plus"> </i> New Lesson
                </a>
            </p>
        </div>
        <div class="path-wrap">
            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">
                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-5@m uk-grid-match uk-grid" style="transform: translate3d(0px, 0px, 0px);">
                    @if(count($lessons) > 0)
                        @foreach($lessons as $lesson)
                            <li tabindex="-1" class="uk-active">
                                <div class="course-card">
                                    <form action="/adminlessons" method="get">
                                        <div class="course-card-thumbnail lessonselect">
                                            <img src="{{asset('altimages/default.png')}}">
                                        </div>
                                        <div class="course-card-body lessonselect">
                                            <h4> {{$lesson->title}} </h4>
                                            <input type="hidden" name="lessonid" value="{{$lesson->id}}"/>
                                            <input type="hidden" name="chapterid" value="{{$chapterinfo->id}}"/>
                                            <input type="hidden" name="bookid" value="{{$bookid}}"/>
                                            <input type="hidden" name="booktitle" value="{{$booktitle}}"/>
                                            <input type="hidden" name="manualselection" value="{{$manualselection}}"/>
                                            <input type="hidden" name="manualselectionlink" value="Lecture Manual"/>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible" href="#" uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>
            </div>
        </div>
        <!-- footer
        ================================================== -->
        <div class="footer">
            @include('admin.inc.footer')
        </div>
    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).on('click', '.lecturelink', function(){
            $(this).closest('form').submit();
        });
        $(document).on('click','.lessonselect', function(){
            $(this).closest('form').submit();
        });
    </script>
@endsection