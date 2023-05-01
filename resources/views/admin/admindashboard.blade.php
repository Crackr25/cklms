@extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
    </ul>
</nav>
@endsection
@section('content')

{{-- <style type="text/css')}}">
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style> --}}
            <div class="page-content-inner pt-lg-0  pr-2">

                <div class="row pt-4">
                    <div class="col-3">
                        <a href="/adminstudents">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="uk-flex-middle uk-grid" uk-grid="">
                                        {{-- <div class="uk-width-auto uk-first-column">
                                            <h6 class="mb-2">No of Classrooms</h6>
                                            <h2> {{count($classrooms)}}</h2>
                                        </div>
                                        <div class="uk-width-expand">
                                            <i class="fa fa-door-open fa-1x"></i>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-2">No of Students</h6>
                                            </div>
                                            <div class="col-6">
                                                <h2> {{count($students)}}</h2>
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-user fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between py-2">
                                    <a href="/adminstudents" class=" "> View</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/adminteachers">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="uk-flex-middle uk-grid" uk-grid="">
                                        {{-- <div class="uk-width-auto uk-first-column">
                                            <h6 class="mb-2">No of Classrooms</h6>
                                            <h2> {{count($classrooms)}}</h2>
                                        </div>
                                        <div class="uk-width-expand">
                                            <i class="fa fa-door-open fa-1x"></i>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-2">No of Teachers</h6>
                                            </div>
                                            <div class="col-6">
                                                <h2> {{count($teachers)}}</h2>
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-users fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between py-2">
                                    <a href="/adminteachers" class=" "> View</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/adminbooks/index">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="uk-flex-middle uk-grid" uk-grid="">
                                        {{-- <div class="uk-width-auto uk-first-column">
                                            <h6 class="mb-2">No of Classrooms</h6>
                                            <h2> {{count($classrooms)}}</h2>
                                        </div>
                                        <div class="uk-width-expand">
                                            <i class="fa fa-door-open fa-1x"></i>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-2">No of Books</h6>
                                            </div>
                                            <div class="col-6">
                                                <h2> {{count($books)}}</h2>
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-book fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between py-2">
                                    <a href="/adminbooks/index" class=" "> View</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="/adminclassrooms">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="uk-flex-middle uk-grid" uk-grid="">
                                        {{-- <div class="uk-width-auto uk-first-column">
                                            <h6 class="mb-2">No of Classrooms</h6>
                                            <h2> {{count($classrooms)}}</h2>
                                        </div>
                                        <div class="uk-width-expand">
                                            <i class="fa fa-door-open fa-1x"></i>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-2">No of Classrooms</h6>
                                            </div>
                                            <div class="col-6">
                                                <h2> {{count($classrooms)}}</h2>
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-door-open fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-between py-2">
                                    <a href="/adminclassrooms" class=" "> View</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!--<div class="uk-child-width-1-4@s uk-child-width-2-5@m uk-grid pt-3" uk-grid="">-->
                <!--    <div class="uk-first-column">-->
                <!--        <a href="/adminstudents">-->
                            
                <!--            <div class="card">-->
                <!--                <div class="card-body">-->
                <!--                    <div class="uk-flex-middle uk-grid" uk-grid="">-->
                <!--                        {{-- <div class="uk-width-auto uk-first-column">-->
                <!--                            <h6 class="mb-2">No of Classrooms</h6>-->
                <!--                            <h2> {{count($classrooms)}}</h2>-->
                <!--                        </div>-->
                <!--                        <div class="uk-width-expand">-->
                <!--                            <i class="fa fa-door-open fa-1x"></i>-->
                <!--                        </div> --}}-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-12">-->
                <!--                                <h6 class="mb-2">No of Students</h6>-->
                <!--                            </div>-->
                <!--                            <div class="col-6">-->
                <!--                                <h2> {{count($students)}}</h2>-->
                <!--                            </div>-->
                <!--                            <div class="col-6 text-center">-->
                <!--                                <i class="fa fa-user fa-2x"></i>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="card-footer d-flex justify-content-between py-2">-->
                <!--                    <a href="/adminstudents" class=" "> Veiw</a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--    <div>-->
                <!--        <a href="/adminteachers">-->
                            
                <!--            <div class="card">-->
                <!--                <div class="card-body">-->
                <!--                    <div class="uk-flex-middle uk-grid" uk-grid="">-->
                <!--                        {{-- <div class="uk-width-auto uk-first-column">-->
                <!--                            <h6 class="mb-2">No of Classrooms</h6>-->
                <!--                            <h2> {{count($classrooms)}}</h2>-->
                <!--                        </div>-->
                <!--                        <div class="uk-width-expand">-->
                <!--                            <i class="fa fa-door-open fa-1x"></i>-->
                <!--                        </div> --}}-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-12">-->
                <!--                                <h6 class="mb-2">No of Teachers</h6>-->
                <!--                            </div>-->
                <!--                            <div class="col-6">-->
                <!--                                <h2> {{count($teachers)}}</h2>-->
                <!--                            </div>-->
                <!--                            <div class="col-6 text-center">-->
                <!--                                <i class="fa fa-users fa-2x"></i>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="card-footer d-flex justify-content-between py-2">-->
                <!--                    <a href="/adminteachers" class=" "> Veiw</a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--    <div>-->
                <!--        <a href="/adminbooks/index">-->
                            
                <!--            <div class="card">-->
                <!--                <div class="card-body">-->
                <!--                    <div class="uk-flex-middle uk-grid" uk-grid="">-->
                <!--                        {{-- <div class="uk-width-auto uk-first-column">-->
                <!--                            <h6 class="mb-2">No of Classrooms</h6>-->
                <!--                            <h2> {{count($classrooms)}}</h2>-->
                <!--                        </div>-->
                <!--                        <div class="uk-width-expand">-->
                <!--                            <i class="fa fa-door-open fa-1x"></i>-->
                <!--                        </div> --}}-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-12">-->
                <!--                                <h6 class="mb-2">No of Books</h6>-->
                <!--                            </div>-->
                <!--                            <div class="col-6">-->
                <!--                                <h2> {{count($books)}}</h2>-->
                <!--                            </div>-->
                <!--                            <div class="col-6 text-center">-->
                <!--                                <i class="fa fa-book fa-2x"></i>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="card-footer d-flex justify-content-between py-2">-->
                <!--                    <a href="/adminbooks/index" class=" "> Veiw</a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--    <div>-->
                <!--        <a href="/adminclassrooms">-->
                            
                <!--            <div class="card">-->
                <!--                <div class="card-body">-->
                <!--                    <div class="uk-flex-middle uk-grid" uk-grid="">-->
                <!--                        {{-- <div class="uk-width-auto uk-first-column">-->
                <!--                            <h6 class="mb-2">No of Classrooms</h6>-->
                <!--                            <h2> {{count($classrooms)}}</h2>-->
                <!--                        </div>-->
                <!--                        <div class="uk-width-expand">-->
                <!--                            <i class="fa fa-door-open fa-1x"></i>-->
                <!--                        </div> --}}-->
                <!--                        <div class="row">-->
                <!--                            <div class="col-12">-->
                <!--                                <h6 class="mb-2">No of Classrooms</h6>-->
                <!--                            </div>-->
                <!--                            <div class="col-6">-->
                <!--                                <h2> {{count($classrooms)}}</h2>-->
                <!--                            </div>-->
                <!--                            <div class="col-6 text-center">-->
                <!--                                <i class="fa fa-door-open fa-2x"></i>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <!--                <div class="card-footer d-flex justify-content-between py-2">-->
                <!--                    <a href="/adminclassrooms" class=" "> Veiw</a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--</div>-->

                {{-- <div class="ro uk-grid" uk-grid="">
                    <div class="uk-width-expand@m uk-first-column">


                        <div class="section-small">

                            <h3> Welcome Richard  ! </h3>

                            <div class="uk-position-relative uk-visible-toggle uk-slider uk-slider-container" tabindex="-1" uk-slider="finite: true">

                                <ul class="uk-slider-items uk-child-width-1-2@m uk-child-width-1-2@s uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                                    <li tabindex="-1" class="uk-active">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="uk-flex-middle uk-grid" uk-grid="">
                                                    <div class="uk-width-auto uk-first-column">
                                                        <h5 class="mb-2"> Total sales </h5>
                                                        <h1> 220.9$</h1>
                                                        <span class="badge badge-soft-success mt-n1"> +12.9$</span>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <img src="{{asset('templatefiles/d-sales.png')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer d-flex justify-content-between py-2">
                                                <p class="mb-0"> 124 total sales </p>
                                                <a href="#" class=" "> Veiw report</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li tabindex="-1" class="uk-active">

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="uk-flex-middle uk-grid" uk-grid="">
                                                    <div class="uk-width-auto uk-first-column">
                                                        <h5 class="mb-2"> Total Students </h5>
                                                        <h1> 2900</h1>
                                                        <span class="badge badge-soft-primary mt-n1"> +56.6%</span>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <img src="{{asset('templatefiles/d-student.png')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer d-flex justify-content-between py-2">
                                                <p class="mb-0"> 120 New Student </p>
                                                <a href="#" class=" "> Veiw report</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li tabindex="-1" class="">

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="uk-flex-middle uk-grid" uk-grid="">
                                                    <div class="uk-width-auto uk-first-column">
                                                        <h5 class="mb-2"> Total Courses </h5>
                                                        <h1> 190</h1>
                                                        <span class="badge badge-soft-success mt-n1"> +16</span>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <img src="{{asset('templatefiles/d-graduation.png')}}" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer d-flex justify-content-between py-2">
                                                <p class="mb-0"> 230 total Courses </p>
                                                <a href="#" class=" "> Veiw report</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>


                                <ul class="uk-slider-nav uk-dotnav uk-flex-center mt-3"><li uk-slider-item="0" class="uk-active"><a href="#"></a></li><li uk-slider-item="1"><a href="#"></a></li><li uk-slider-item="2" class="uk-hidden"><a href="#"></a></li></ul>

                            </div>

                            <div class="uk-child-width-1-2@m uk-grid uk-grid-stack" uk-grid="">

                                <div>

                                </div>

                                <div>

                                </div>



                            </div>

                        </div>


                    </div>
                    
                </div> --}}








                <!-- footer
                ================================================== -->

            </div>


      @endsection