@extends('teacher.layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <style>
        .swal2-header{
            border: none;
        }
    </style>
    
    <div class="page-content-inner pt-lg-0  pr-lg-0">

        <div class="d-flex mt-3">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
                    <li>Books</li>
                </ul>
            </nav>
        </div>

        <div class="container">


            <div class="section-header  border-0 uk-flex-middle">
                <div class="section-header-left">
                    <h2 class="uk-heading-line text-left"><span> Books </span></h2>
                </div>
                {{-- <div class="section-header-right">
                    <a href="#" class="btn btn-default uk-visible@s" id="addclassroom"> <i class="uil-plus"></i> Add book</a>
                </div> --}}
            </div>


            <div class="uk-grid" uk-grid="">
                @if(count($mybooks) > 0)
                    <div class="uk-width-4-4@m uk-first-column">

                        <h4> Your Books </h4>

                        <div class="uk-position-relative uk-slider uk-slider-container" tabindex="-1" uk-slider="autoplay: true">

                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(-216.188px, 0px, 0px);">
                                <li tabindex="-1" class="uk-active" style="order: 1;">
                                    <a href="#">
                                        <div class="book-card">
                                            <div class="book-cover">
                                                <img src="{{asset('templatefiles/vue-2-basics-.jpg')}}" alt="">
                                            </div>
                                            <div class="book-content">
                                                <h5>Vue.js Basics</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li tabindex="-1" class="">
                                    <a href="#">
                                        <div class="book-card">
                                            <div class="book-cover">
                                                <img src="{{asset('templatefiles/php.jpg')}}" alt="">
                                            </div>
                                            <div class="book-content">
                                                <h5> PHP for Beginners </h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <a href="#">
                                        <div class="book-card">
                                            <div class="book-cover">
                                                <img src="{{asset('templatefiles/html5.jpg')}}" alt="">
                                            </div>
                                            <div class="book-content">
                                                <h5>HTML5 Brick Breaker</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <a href="#">
                                        <div class="book-card">
                                            <div class="book-cover">
                                                <img src="{{asset('templatefiles/win8.jpg')}}" alt="">
                                            </div>
                                            <div class="book-content">
                                                <h5>WIN8 App Development</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <a href="#">
                                        <div class="book-card">
                                            <div class="book-cover">
                                                <img src="{{asset('templatefiles/vue-2-basics-.jpg')}}" alt="">
                                            </div>
                                            <div class="book-content">
                                                <h5>Vue.js Basics</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>


                            <div class="uk-flex uk-flex-center mt-2">
                                <ul class="uk-slider-nav uk-dotnav"><li uk-slider-item="0" class=""><a href="#"></a></li><li uk-slider-item="1" class=""><a href="#"></a></li><li uk-slider-item="2" class="uk-active"><a href="#"></a></li><li uk-slider-item="3"><a href="#"></a></li><li uk-slider-item="4"><a href="#"></a></li></ul>
                            </div>

                        </div>

                    </div>
                @endif

                {{-- <div class="uk-width-1-4@m">
                    <h4> Popular books </h4>
                    <div id="book-popular">
                        <div class="book-popular-card">
                            <img src="{{asset('templatefiles/css3.jpg')}}" alt="" class="cover-img">
                            <div class="book-details">
                                <a href="#">
                                    <h4>CSS3 Web Development</h4>
                                </a>
                                <p>Richard Ali </p>
                            </div>
                            <a href="#"> <i class="icon-feather-bookmark icon-small"></i></a>
                        </div>
                        <div class="book-popular-card">
                            <img src="{{asset('templatefiles/vue-2-basics-.jpg')}}" alt="" class="cover-img">
                            <div class="book-details">
                                <a href="#">
                                    <h4>Vue.js Basics</h4>
                                </a>
                                <p>John smith </p>
                            </div>
                            <a href="#"> <i class="icon-feather-bookmark icon-small"></i></a>
                        </div>
                        <div class="book-popular-card">
                            <img src="{{asset('templatefiles/php.jpg')}}" alt="" class="cover-img">
                            <div class="book-details">
                                <a href="#">
                                    <h4>PHP for Beginners</h4>
                                </a>
                                <p>Richard Ali </p>
                            </div>
                            <a href="#"> <i class="icon-feather-bookmark icon-small"></i></a>
                        </div>
                    </div>
                </div> --}}

            </div>

            @if(count($subjects)> 0)
                <br/>
                <h3> Subject</h3>
                <form action="/teacherbooks/{{Crypt::encrypt('select')}}" method="get" class="m-0 p-0" id="selectsubjectform">
                    <input type="hidden" name="selectedsubjectid"/>
                </form>
                <nav class="responsive-tab style-1 ">
                    <ul>
                        @foreach($subjects as $subject)
                            @if($subject->selected == 1)
                                <li class="uk-active selectsubject" subjectid="{{$subject->id}}">
                            @else
                                <li class="selectsubject" subjectid="{{$subject->id}}">
                            @endif
                                <a href="#">{{$subject->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <div class="section-small">
                    <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid="">
                        @foreach($subjects as $subject)
                            @if($subject->selected == 1)
                                @if(count($subject->books) == 0)
                                    <div class="uk-first-column text-center">
                                        <p class="uk-text-muted ">No books yet!</p>
                                    </div>
                                @else
                                    @foreach($subject->books as $subjectbook)
                                        <div class="uk-first-column">
                                            <a href="/teacherviewbook/{{$subjectbook->id}}" class="uk-text-bold">
                                                <img src="{{asset($subjectbook->picurl)}}" class="mb-2 w-100 shadow rounded">
                                                {{$subjectbook->booktitle}}
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif


            <!-- pagination-->
            {{-- <ul class="uk-pagination uk-flex-center uk-margin-medium">
                <li class="uk-active">
                    <span>1</span>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#"><i class="icon-feather-chevron-right uk-margin-small-top"></i></a>
                </li>
                <li>
                    <a href="#">12</a>
                </li>
            </ul> --}}


            <!-- footer
           ================================================== -->
            <div class="footer">
                @include('admin.inc.footer')
            </div>


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