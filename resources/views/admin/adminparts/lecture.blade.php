@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <style>
            /* .swal-wide{
            width:80%;
        } */
        .swal2-header{
            border: none;
        }
        /* #swal2-content{
            text-align: left;
        } */
        .list-style{
            display: block;
            font-size: 1rem;
            line-height: 1.4;
            color: #333;
            overflow: hidden;
            font-weight: 600
        }
    </style>
    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                    <li><a href="/adminbookdescription/{{Crypt::encrypt('index')}}/{{$bookinformation->id}}">{{$bookinformation->title}}</a></li>
                    <li>Lecture Manual</li>
                </ul>
            </nav>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <h3> &nbsp; </h3>

            <div>
                <a href="#" class="btn btn-default" id="createnewpartbutton">
                    <i class="uil-plus"> </i> New Part
                </a>
            </div>
        </div>
        <div class="container">
            <div class="uk-container-xsmall uk-margin-auto">
                @if(count($parts) == 0)
                @else
                    @foreach($parts as $part)
                        <h4>
                            <form action="/adminparts/view/" method="get" class="m-0 p-0"></form>
                            <span>{{$part->parttitle}}</span>
                            <a href="#" class="btn btn-light editpart">
                                <i class="uil-edit"> </i>
                            </a>
                            <a href="#" class="btn btn-light createnewchapterbutton" id="{{$part->partid}}">
                                <i class="uil-plus"> </i> Chapter
                            </a>
                        </h4>
                        @if(count($part->chapters)> 0)
                            <article class="uk-card-default p-4 rounded">
                                {{-- <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion=""> --}}
                                <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion="false">
                                    @foreach($part->chapters as $chapter)
                                        <li>
                                            
                                            <i class="uil-edit float-left mr-1"></i> 
                                            <form action="/adminchapter" method="get">
                                                <a href="#" class="list-style mb-1">
                                                     {{$chapter->description}} 
                                                </a>
                                                <input type="hidden" name="chapterid" value="{{$chapter->id}}"/>
                                                <input type="hidden" name="bookid" value="{{$bookinformation->id}}"/>
                                                <input type="hidden" name="bookname" value="{{$bookinformation->title}}"/>
                                                <input type="hidden" name="manualselection" value="lecture"/>
                                            </form>
                                            Lessons: {{count($chapter->lessons)}}
                                            {{-- <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                <p>
                                                    <a href="#" class="btn btn-light float-right createnewlesson" chapter="{{$chapter->description}}" chapterid="{{$chapter->id}}" >
                                                        <i class="uil-plus"> </i> New Lesson
                                                    </a>
                                                </p>
                                                @if(count($chapter->lessons)> 0)
                                                <br>
                                                    @foreach($chapter->lessons as $lesson)
                                                        <p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <a href="/adminlessons/{{Crypt::encrypt($lesson->id)}}"> {{$lesson->title}} </a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted float-right">{{$lesson->lastupdated}}</small> 
                                                                </div>
                                                            </div>
                                                            
                                                        </p>
                                                    @endforeach
                                                @endif
                                            </div> --}}
                                        </li>
                                    @endforeach
                                </ul>
                            </article>
                        @endif
                        <br>
                    @endforeach
                @endif
            </div>



            <!-- footer
            ================================================== -->
            <div class="footer">
                @include('admin.inc.footer')
            </div>
        </div>
    </div>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    @include('admin.sweetalerts.swalmanuallecture')
    <script>
        $(document).on('click','.list-style', function(){
            $(this).closest('form').submit();
        })
    </script>
@endsection