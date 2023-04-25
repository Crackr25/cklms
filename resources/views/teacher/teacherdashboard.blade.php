@extends('teacher.layouts.app')

@section('content')

{{-- <style type="text/css')}}">
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style> --}}
            <div class="page-content-inner pt-lg-0  pr-lg-0">



                <div class="row" >
                    <div class="col-md-12 p-0" >

                        <div class="home-hero p-0" style="background-image: url({{asset('assets/images/elearning4.jpg')}}); background-repeat:no-repeat;background-size:cover;background-position:center center; height: 130%;">
                            
                            <div class="uk-width-1-1">
                                <div class="page-content-inner uk-position-z-index">
                                    <h1 class="text-white">CK Learning Management System</h1>
                                    <h4 class="my-lg-4 text-white"> Your access to visual learning and integration </h4>
                                    {{-- <a href="" class="btn btn-default">About</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="home-hero" data-src="../assets/images/home-hero3.png')}}" uk-img="" style="background-image: url({{asset('assets/images/elearning3.jpg')}}); background-repeat:no-repeat;background-size:cover;background-position:center;">
                    <div class="uk-width-1-1">
                        <div class="page-content-inner uk-position-z-index">
                            <h1>CK Learning Management System</h1>
                            <h4 class="my-lg-4"> Your virtual access to learning and integration </h4>
                            <a href="" class="btn btn-default">About</a>
                        </div>
                    </div>
                </div> --}}
    
                {{-- <div class="container">
                    @if(count($books) > 0)
                        <br/>
                        <div class="section-small">
                            <div uk-slider="finite: true" class="course-grid-slider uk-slider uk-slider-container">
                                <div class="grid-slider-header">
                                    <div>
                                        <h4 class="uk-text-truncate"> Progress Courses
                                        </h4>
                                    </div>
                                    <div class="grid-slider-header-link">
                                        <a href="" class="button transparent uk-visible@m"> View all </a>
                                        <a href="" class="slide-nav-prev uk-invisible" uk-slider-item="previous"></a>
                                        <a href="" class="slide-nav-next" uk-slider-item="next"></a>
                                    </div>
                                </div>
                                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-grid" style="transform: translate3d(0px, 0px, 0px);">
                                    @foreach($books as $book)
                                        <li tabindex="-1" class="uk-active">
                                            <a href="#">
                                                <div class="course-card-resume">
                                                    <div class="course-card-resume-thumbnail">
                                                        <img src="{{asset('templatefiles/2.png')}}">
                                                    </div>
                                                    <div class="course-card-resume-body">
                                                        <h5>Angular Fundamentals From Scratch To Experts</h5>
                                                        <span class="number"> 3/20 </span>
                                                        <div class="course-progressbar">
                                                            <div class="course-progressbar-filler" style="width:65%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
    
                <div class="footer">
                    
                    @include('admin.inc.footer')
                </div>

            </div> --}}
        </div>

            <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
            <!-- SweetAlert2 -->
        <script>
            $(document).ready(function(){
                $('.page-menu').addClass('menu-large');
            })
        </script>
      @endsection