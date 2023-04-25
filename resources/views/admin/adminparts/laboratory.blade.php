@extends('admin.layouts.app')

@section('content')

    <style>
            /* .swal-wide{
            width:80%;
        } */
        .swal2-header{
            border: none;
        }
    </style>
    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                    <li><a href="/adminbookdescription/{{Crypt::encrypt('index')}}/{{$bookinformation->id}}">{{$bookinformation->title}}</a></li>
                    <li>Laboratory</li>
                </ul>
            </nav>
        </div>
        <br>
        <div class="container">
            <div class="uk-container-xsmall uk-margin-auto">
                @if(count($parts) == 0)
                @else
                    @foreach($parts as $part)
                        <h4>
                            <form action="/adminparts/view/" method="get" class="m-0 p-0"></form>
                            <span>{{$part->parttitle}}</span>
                        </h4>
                        @if(count($part->chapters)> 0)
                            <article class="uk-card-default p-4 rounded">
                                <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion="">
                                    @foreach($part->chapters as $chapter)
                                        <li>
                                            
                                            <i class="uil-edit float-left mr-1"></i> 
                                            <a class="uk-accordion-title mb-1" href="#">
                                                 {{$chapter->description}} 
                                            </a>
                                            <div class="uk-accordion-content" hidden="" aria-hidden="true">
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
                                                                    <a href="/adminlessons/{{Crypt::encrypt('view')}}"> {{$lesson->title}} </a>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <small class="text-muted float-right">{{$lesson->lastupdated}}</small> 
                                                                </div>
                                                            </div>
                                                            
                                                        </p>
                                                    @endforeach
                                                @endif
                                            </div>
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
    <script>
    </script>
@endsection