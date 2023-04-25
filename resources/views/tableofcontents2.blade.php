<!DOCTYPE html>
<!-- saved from url=(0069)http://demo.foxthemes.net/courseplusv3.3/default/course-lesson-2.html -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="http://demo.foxthemes.net/courseplusv3.3/assets/images/favicon.png')}}" rel="icon" type="image/png">

    <!-- CSS 
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/style.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/night-mode.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/framework.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/bootstrap.css')}}"> 

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">

 
</head>


<body class="course-watch-page">

        <!-- Wrapper -->
        <div id="wrapper">
    
            <div class="course-layouts">
    
                <div class="course-content bg-dark">
    
                    <div class="course-header">
    
                        <h4 class="text-white"> Build Responsive Websites </h4>
    
                        <div>
    
                            <a href="#" aria-expanded="false">
                                <i class="icon-feather-help-circle btns"></i>
                            </a>
                            <div uk-drop="pos: bottom-right;mode : click" class="uk-drop">
                                <div class="uk-card-default p-4">
                                    <h4> Elementum tellus id mauris faucibuss soluta nobis </h4>
                                    <p class="mt-2 mb-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                        diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                        volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam liber tempor cum
                                        soluta nobis eleifend option congue nihil imperdiet</p>
                                </div>
                            </div>
    
                            <a hred="#" aria-expanded="false">
                                <i class="icon-feather-more-vertical btns"></i>
                            </a>
                            <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : click">
                                <ul>
    
                                    <li><a href="#">
                                            <i class="icon-feather-bookmark"></i>
                                            Add To Bookmarks</a></li>
                                    <li><a href="#">
                                            <i class="icon-feather-share-2"></i>
                                            Share With Friend </a></li>
    
                                    <li>
                                        <a href="#" id="night-mode" class="btn-night-mode">
                                            <i class="icon-line-awesome-lightbulb-o"></i> Night mode
                                            <label class="btn-night-mode-switch">
                                                <div class="uk-switch-button"></div>
                                            </label>
                                        </a>
                                    </li>
                                </ul>
                            </div>
    
                            <a href="#" class="uk-visible@s" uk-toggle="target: .course-layouts; cls: course-sidebar-collapse">
                                <i class="btns icon-feather-chevron-right"></i>
                            </a>
    
                        </div>
    
                    </div>
    
                    <div class="course-content-inner">
    
                        <ul id="video-slider" class="uk-switcher" style="touch-action: pan-y pinch-zoom;">
    
    
                            <li class="uk-active">
                                <!-- to autoplay video uk-video="automute: true" -->
                                <div class="video-responsive">
                                    <iframe src="{{asset('templatefiles/9gTw2EDkaDQ.html')}}" frameborder="0" uk-video="automute: true" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                </div>
                            </li>
                            <li>
                                <div class="video-responsive">
                                    <iframe src="{{asset('templatefiles/CGSdK7FI9MY.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                </div>
                            </li>
                            <li>
                                <div class="video-responsive">
                                    <iframe src="{{asset('templatefiles/4I1WgJz_lmA.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                </div>
                            </li>
                            <li>
                                <div class="video-responsive">
                                    <iframe src="{{asset('templatefiles/dDn9uw7N9Xg.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                </div>
                            </li>
                            <li>
                                <div class="video-responsive">
                                    <iframe src="{{asset('templatefiles/CPcS4HtrUEU.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                </div>
                            </li>
    
                        </ul>
    
                    </div>
    
                </div>
    
                <!-- course sidebar -->
    
                <div class="course-sidebar uk-flex-last">
                    <div class="course-sidebar-title">
                        <h3> Table of Contents </h3>
                    </div>
                    <div class="course-sidebar-container" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">
    
                        <ul class="course-video-list-2" uk-switcher=" connect: #video-slider ; animation: uk-animation-slide-right-small, uk-animation-slide-left-medium">
                            <li class="uk-active">
                                <a href="#" aria-expanded="true">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title"> What Is HTML? </span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title"> Introduction to HTML5 </span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title"> Getting the Browser </span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title"> Setting Up the Editor </span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title"> Headings in HTML</span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title">The paragraph tag</span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title">Emphasis and Strong Tag</span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title"> Text Formatting</span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title">Working with Images</span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-expanded="false">
                                    <img src="{{asset('templatefiles/8.png')}}" alt="">
                                    <span class="now-playing">Now Playing</span>
                                    <span class="video-title">The paragraph tag</span>
                                    <time>2 min. 46 sec.</time>
                                </a>
                            </li>
                        </ul>
    
    
                    </div></div></div><div class="simplebar-placeholder" style="width: 320px; height: 800px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 790px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
    
                </div>
    
            </div>
    
    
    
        </div>
    
    
        <script>
            (function (window, document, undefined) {
                'use strict';
                if (!('localStorage' in window)) return;
                var nightMode = localStorage.getItem('gmtNightMode');
                if (nightMode) {
                    document.documentElement.className += ' night-mode';
                }
            })(window, document);
    
    
            (function (window, document, undefined) {
    
                'use strict';
    
                // Feature test
                if (!('localStorage' in window)) return;
    
                // Get our newly insert toggle
                var nightMode = document.querySelector('#night-mode');
                if (!nightMode) return;
    
                // When clicked, toggle night mode on or off
                nightMode.addEventListener('click', function (event) {
                    event.preventDefault();
                    document.documentElement.classList.toggle('night-mode');
                    if (document.documentElement.classList.contains('night-mode')) {
                        localStorage.setItem('gmtNightMode', true);
                        return;
                    }
                    localStorage.removeItem('gmtNightMode');
                }, false);
    
            })(window, document);
        </script>
    
        <script src="{{asset('templatefiles/jquery-2.2.4.min.js')}}"></script>
        <script>
            function make_button_active(tab) {
                //Get item siblings
                var siblings = tab.siblings();
    
                /* Remove active class on all buttons
                siblings.each(function(){
                    $(this).removeClass('active');
                }) */
    
                //Add the clicked button class
                tab.addClass('watched');
            }
    
            //Attach events to highlight-watched
            $(document).ready(function () {
    
                if (localStorage) {
                    var ind = localStorage['tab']
                    make_button_active($('.highlight-watched li').eq(ind));
                }
    
                $(".highlight-watched li").click(function () {
                    if (localStorage) {
                        localStorage['tab'] = $(this).index();
                    }
                    make_button_active($(this));
                });
    
            });
        </script>

    <!-- javaScripts
    ================================================== -->
    <script src="{{asset('templatefiles/framework.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('templatefiles/simplebar.js')}}"></script>
    <script src="{{asset('templatefiles/main.js')}}"></script>
    <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>

    


<div id="backtotop"><a href="#"></a></div></body></html>