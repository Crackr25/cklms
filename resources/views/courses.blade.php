<!DOCTYPE html>
<!-- saved from url=(0062)http://demo.foxthemes.net/courseplusv3.3/default/courses.html# -->
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

<body style="">

    <div id="wrapper">

        <!-- Header Container
        ================================================== -->
        <header class="header uk-sticky" uk-sticky="top:20 ; cls-active:header-sticky" style="">

            <div class="container">
                <nav uk-navbar="" class="uk-navbar">

                    <!-- left Side Content -->
                    <div class="uk-navbar-left">

                        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>



                        <!-- logo -->
                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/dashboard.html" class="logo">
                            <img src="{{asset('templatefiles/logo-dark.svg')}}" alt="">
                            <span> Courseplus</span>
                        </a>

                        <!-- breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> Dashboard </a></li>
                                <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">Courses</a></li>
                                <li>Browse Web Development</li>
                            </ul>
                        </nav>


                    </div>


                    <!--  Right Side Content   -->

                    <div class="uk-navbar-right">

                        <div class="header-widget">
                            <!-- User icons close mobile-->
                            <span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"> </span>


                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: My Courses ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-youtube-alt"></i>
                            </a>

                            <!-- courses dropdown List -->
                            <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-notifications my-courses-dropdown uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Your Courses</h4>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                                <span class="notification-image">
                                                    <img src="{{asset('templatefiles/1.png')}}" alt=""> </span>
                                                <span class="notification-text">
                                                    <span class="course-title">Ultimate Web Designer &amp; Web Developer
                                                    </span>
                                                    <span class="course-number">6/35 </span>
                                                    <span class="course-progressbar">
                                                        <span class="course-progressbar-filler" style="width:95%"></span>
                                                    </span>
                                                </span>

                                                <!-- option menu -->
                                                <span class="btn-option" aria-expanded="false">
                                                    <i class="icon-feather-more-vertical"></i>
                                                </span>
                                                <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : hover">
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <i class="icon-material-outline-dashboard"></i>
                                                                Course Dashboard</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-video"></i>
                                                                Resume Course</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-x"></i>
                                                                Remove Course</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>

                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                                <span class="notification-image">
                                                    <img src="{{asset('templatefiles/3.png')}}" alt=""> </span>
                                                <span class="notification-text">
                                                    <span class="course-title">The Complete JavaScript Course Build Real
                                                        Projects !</span>
                                                    <span class="course-number">6/35 </span>
                                                    <span class="course-progressbar">
                                                        <span class="course-progressbar-filler" style="width:95%"></span>
                                                    </span>
                                                </span>

                                                <!-- option menu -->
                                                <span class="btn-option" aria-expanded="false">
                                                    <i class="icon-feather-more-vertical"></i>
                                                </span>
                                                <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : hover">
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <i class="icon-material-outline-dashboard"></i>
                                                                Course Dashboard</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-video"></i>
                                                                Resume Course</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-x"></i>
                                                                Remove Course</span>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                                <span class="notification-image">
                                                    <img src="{{asset('templatefiles/2.png')}}" alt=""> </span>
                                                <span class="notification-text">
                                                    <span class="course-title">Learn Angular Fundamentals From The
                                                        Beginning</span>
                                                    <span class="course-number">6/35 </span>
                                                    <span class="course-progressbar">
                                                        <span class="course-progressbar-filler" style="width:95%"></span>
                                                    </span>
                                                </span>

                                                <!-- option menu -->
                                                <span class="btn-option" aria-expanded="false">
                                                    <i class="icon-feather-more-vertical"></i>
                                                </span>
                                                <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: bottom-right ;mode : hover">
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <i class="icon-material-outline-dashboard"></i>
                                                                Course Dashboard</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-video"></i>
                                                                Resume Course</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-x"></i>
                                                                Remove Course</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                                <span class="notification-image">
                                                    <img src="{{asset('templatefiles/1.png')}}" alt=""> </span>
                                                <span class="notification-text">
                                                    <span class="course-title">Ultimate Web Designer &amp; Web Developer
                                                    </span>
                                                    <span class="course-number">6/35 </span>
                                                    <span class="course-progressbar">
                                                        <span class="course-progressbar-filler" style="width:95%"></span>
                                                    </span>
                                                </span>

                                                <!-- option menu -->
                                                <span class="btn-option" aria-expanded="false">
                                                    <i class="icon-feather-more-vertical"></i>
                                                </span>
                                                <div class="dropdown-option-nav uk-dropdown" uk-dropdown="pos: top-right ;mode : hover">
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <i class="icon-material-outline-dashboard"></i>
                                                                Course Dashboard</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-video"></i>
                                                                Resume Course</span>
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="icon-feather-x"></i>
                                                                Remove Course</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 808px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 122px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
                                <div class="dropdown-notifications-footer">
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> sell all</a>
                                </div>
                            </div>

                            <!-- notificiation icon  -->

                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-bell"></i>
                                <span>4</span>
                            </a>

                            <!-- notificiation dropdown -->
                            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Notifications </h4>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-icon btn btn-soft-danger disabled">
                                                    <i class="icon-feather-thumbs-up"></i></span>
                                                <span class="notification-text">
                                                    <strong>Adrian Mohani</strong> Like Your Comment On Course
                                                    <span class="text-primary">Javascript Introduction </span>
                                                    <br> <span class="time-ago"> 9 hours ago </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-icon btn btn-soft-primary disabled">
                                                    <i class="icon-feather-message-circle"></i></span>
                                                <span class="notification-text">
                                                    <strong>Stella Johnson</strong> Replay Your Comments in
                                                    <span class="text-primary">Programming for Games</span>
                                                    <br> <span class="time-ago"> 12 hours ago </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-icon btn btn-soft-success disabled">
                                                    <i class="icon-feather-star"></i></span>
                                                <span class="notification-text">
                                                    <strong>Alex Dolgove</strong> Added New Review In Course
                                                    <span class="text-primary">Full Stack PHP Developer</span>
                                                    <br> <span class="time-ago"> 19 hours ago </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="notifications-not-read">
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-icon btn btn-soft-danger disabled">
                                                    <i class="icon-feather-share-2"></i></span>
                                                <span class="notification-text">
                                                    <strong>Jonathan Madano</strong> Shared Your Discussion On Course
                                                    <span class="text-primary">Css Flex Box </span>
                                                    <br> <span class="time-ago"> Yesterday </span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 454px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 218px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>


                            </div>


                            <!-- Message  -->

                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-envelope-alt"></i>
                                <span>1</span>
                            </a>

                            <!-- Message  notificiation dropdown -->
                            <div uk-dropdown=" pos: top-right;mode:click" class="dropdown-notifications uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Messages</h4>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Message settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Jonathan Madano</strong>
                                                    <p>Okay.. Thanks for The Answer I will be waiting for your...
                                                    </p>
                                                    <span class="time-ago"> 2 hours ago </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-3.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Stella Johnson</strong>
                                                    <p> Alex will explain you how to keep the HTML structure and all
                                                        that...</p>
                                                    <span class="time-ago"> 7 hours ago </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-1.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Alex Dolgove</strong>
                                                    <p> Alia Joseph just joined Messenger! Be the first to send a
                                                        welcome message..</p>
                                                    <span class="time-ago"> 19 hours ago </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                                <span class="notification-avatar">
                                                    <img src="{{asset('templatefiles/avatar-4.jpg')}}" alt="">
                                                </span>
                                                <div class="notification-text notification-msg-text">
                                                    <strong>Adrian Mohani</strong>
                                                    <p> Okay.. Thanks for The Answer I will be waiting for your...
                                                    </p>
                                                    <span class="time-ago"> Yesterday </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 463px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 214px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
                                <div class="dropdown-notifications-footer">
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> sell all <i class="icon-line-awesome-long-arrow-right"></i> </a>
                                </div>
                            </div>


                            <!-- profile-icon-->

                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon profile-icon" aria-expanded="false">
                                <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="" class="header-profile-icon">
                            </a>

                            <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown">

                                <!-- User Name / Avatar -->
                                <a href="http://demo.foxthemes.net/courseplusv3.3/default/profile-1.html">

                                    <div class="dropdown-user-details">
                                        <div class="dropdown-user-avatar">
                                            <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                        </div>
                                        <div class="dropdown-user-name">
                                            Richard Ali <span>Students</span>
                                        </div>
                                    </div>

                                </a>

                                <!-- User menu -->

                                <ul class="dropdown-user-menu">
                                    <li>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                            <i class="icon-material-outline-dashboard"></i> Dashboard</a>
                                    </li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                            <i class="icon-feather-bookmark"></i> Bookmark </a>
                                    </li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/profile-edit.html">
                                            <i class="icon-feather-settings"></i> Account Settings</a>
                                    </li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" style="color:#62d76b">
                                            <i class="icon-feather-star"></i> Upgrade To Premium</a>
                                    </li>
                                   
                                    <li class="menu-divider">
                                    </li><li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                            <i class="icon-feather-help-circle"></i> Help</a>
                                    </li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/page-login.html">
                                            <i class="icon-feather-log-out"></i> Sing Out</a>
                                    </li>
                                </ul>


                            </div>


                        </div>



                        <!-- icon search-->
                        <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                            <i class="uil-search icon-small"></i>
                        </a>
                        
                        <!-- User icons -->
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
                            </a>

                    </div>
                    <!-- End Right Side Content / End -->


                </nav>

            </div>
            <!-- container  / End -->

        </header><div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>

        <!-- overlay seach on mobile-->
        <div class="nav-overlay uk-navbar-left uk-position-relative uk-flex-1 bg-grey uk-light p-2" hidden="" style="z-index: 10000;">
            <div class="uk-navbar-item uk-width-expand" style="min-height: 60px;">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search..." autofocus="">
                </form>
            </div>
            <a class="uk-navbar-toggle uk-icon uk-close" uk-close="" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></a>
        </div>

        <!-- search overlay-->
        <div id="searchbox">

            <div class="search-overlay"></div>

            <div class="search-input-wrapper">
                <div class="search-input-container">
                    <div class="search-input-control">
                        <span class="icon-feather-x btn-close uk-animation-scale-up" uk-toggle="target: #searchbox; cls: is-active"></span>
                        <div class=" uk-animation-slide-bottom">
                            <input type="text" name="search" autofocus="" required="">
                            <p class="search-help">Type the name of the Course and book you are looking for</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- side nav-->
        <div class="side-nav uk-animation-slide-left-medium">


            <div class="side-nav-bg"></div>

            <!-- logo -->
            <div class="logo uk-visible@s">
                <a href="http://demo.foxthemes.net/courseplusv3.3/default/dashboard.html">
                    <i class=" uil-graduation-hat"></i>
                </a>
            </div>

            <ul>
                <li>
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> <i class="uil-play-circle"></i> </a>
                    <div class="side-menu-slide">
                        <div class="side-menu-slide-content">
                            <ul data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden;">
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-brush-alt "></i> Web Development </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-android-alt"></i> Mobile App </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-bag-alt"></i> Business </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-window"></i> IT Software </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-palette"></i> Desings </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-megaphone"></i> Marketing </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-life-ring"></i> Life Style </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class=" uil-camera"></i> Photography </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-medkit"></i> Health Fitness </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-music"></i> Music </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-shopping-cart-alt"></i> Ecommerce
                                    </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-utensils-alt "></i> Food cooking </a>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html"> <i class="uil-lightbulb-alt"></i> Teaching academy </a>
                                </li>
                        </div></div></div><div class="simplebar-placeholder" style="width: 230px; height: 864px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></ul></div>
                    </div>
                </li>
                <li>
                    <!-- book -->
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/book.html"> <i class="uil-book-alt"></i> <span class="tooltips"> Book</span> </a>
                </li>
                <li>
                    <!-- Episodes -->
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/episode.html"> <i class="uil-youtube-alt"></i> <span class="tooltips"> Episodes</span></a>
                </li>
                <li>
                    <!-- Paths-->
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-path.html"> <i class="uil-rss-interface"></i> <span class="tooltips">
                            Paths</span></a>
                </li>
                <li>
                    <!-- Blog-->
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/blog-1.html"> <i class="uil-file-alt"></i> <span class="tooltips"> Blog</span></a>
                </li>
                <li>
                    <!--  Pages -->
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> <i class="uil-layers"></i></a>
                    <div class="side-menu-slide">
                        <div class="side-menu-slide-content">
                            <ul uk-accordion="" class="uk-accordion">
                                <!-- to make it open default   class="uk-open" -->
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="uk-accordion-title">
                                        <i class="uil-layers"></i> Pages </a>
                                    <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/page-pricing.html"> Pricing</a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/page-faq.html"> faq</a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/page-term.html"> term</a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/page-privacy.html"> Privacy</a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/specialty-comming-soon.html"> Comming soon</a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/specialty-maintanence.html"> Maintanence</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="uk-accordion-title">
                                        <i class="uil-sign-out-alt"></i> authentication </a>
                                    <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/form-login.html"> Login </a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/form-register.html"> Register </a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/form-modern-login.html"> Simple Register</a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/form-modern-singup.html"> Simple Register</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="uk-accordion-title">
                                        <i class="uil-code"></i> Development </a>
                                    <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/development-elements.html"> Elements </a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/development-compounents.html"> Components </a>
                                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/development-icons.html"> Icons </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" uk-toggle="target: #searchbox; cls: is-active"><i class="uil-search-alt"></i></a>
                </li>

            </ul>
            <ul class="uk-position-bottom">
                <li>
                    <!-- Lunch information box -->
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" aria-expanded="false">
                        <i class="uil-paint-tool"></i>
                    </a>
                    <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small" class="uk-drop">
                        <div class="uk-card-default rounded p-0">
                            <h5 class="mb-0 p-3 px-4  bg-light"> Night mode</h5>
                            <div class="p-3 px-4">
                                <p>Turns the light surfaces of the page dark, creating an experience ideal for night.
                                </p>
                                <div class="uk-flex">
                                    <p class="uk-text-small text-muted">DARK THEME </p>
                                    <!-- night mode button -->
                                    <span href="#" id="night-mode" class="btn-night-mode">
                                        <label class="btn-night-mode-switch">
                                            <span class="uk-switch-button"></span>
                                        </label>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" aria-expanded="false">
                        <span class="icon-feather-user"></span>
                    </a>
                    <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small" class="uk-drop">
                        <div class="uk-card-default rounded p-0">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/user-profile.html" class="p-0">

                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-avatar">
                                        <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                    </div>
                                    <div class="dropdown-user-name">
                                        Richard Ali <span>Students</span>
                                    </div>
                                </div>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                        <i class="icon-material-outline-dashboard"></i> Dashboard</a>
                                </li>
                                <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/user-profile-edit.html">
                                        <i class="icon-feather-settings"></i> Account Settings</a>
                                </li>
                                <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="text-grey">
                                        <i class="icon-feather-star"></i> Upgrade To Premium</a>
                                </li>
                                <li class="menu-divider">
                                </li>
                                <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
                                        <i class="icon-feather-help-circle"></i> Help</a>
                                </li>
                                <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/page-login.html">
                                        <i class="icon-feather-log-out"></i> Sing Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


        <!-- content -->
        <div class="page-content">


            <div class="container">

                <h1>Courses</h1>

                <h4> Browse Web Development <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">Courses</a> </h4>

                <nav class="responsive-tab style-2">
                    <ul>
                        <li class="uk-active"><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">Most popular</a></li>
                        <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">New</a></li>
                        <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">Intermediate </a></li>
                        <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">advanced</a></li>
                    </ul>
                </nav>

                <div class="section-small">
                    <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid" uk-grid="">
                        <div class="uk-first-column">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/2.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">Angular</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>
                                        <h4>Learn Angular Fundamentals </h4>
                                        <p> Learn how to build launch React web applications using .. </p>
                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 12 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 64 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/3.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">JavaScript</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>
                                        <h4>The Complete JavaScript </h4>
                                        <p> JavaScript is how you build interactivity on the web.. </p>
                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 14 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 55 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/1.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>

                                        <h4>Ultimate Web Developer Course </h4>
                                        <p> HTML is the building blocks of the web. It gives pages structure</p>

                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 33 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 26 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/5.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>

                                        <h4>Ultimate Web Developer Course </h4>
                                        <p> HTML is the building blocks of the web. It gives pages structure</p>

                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 34 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 54 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="section-header pb-0 mt-5">
                    <div class="section-header-left">
                        <h4> Most popular <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html">Courses</a> </h4>
                    </div>
                    <div class="section-header-right">

                        <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="btn-filter" uk-tooltip="title: Course Filter ; pos:  top-right" uk-toggle="target: #course-filter" title="" aria-expanded="false">
                            <i class="icon-feather-filter"></i>
                        </a>
                        <div class="display-as">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses-list.html" uk-tooltip="title: Course list; pos: top-right" title="" aria-expanded="false">
                                <i class="icon-feather-grid"></i></a>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="active" uk-tooltip="title: Course Grid; pos: top-right" title="" aria-expanded="false">
                                <i class="icon-feather-list"></i></a>
                        </div>
 
                        <div class="btn-group bootstrap-select ml-3"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="Newest"><span class="filter-option pull-left"> Newest </span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text"> Newest </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Popular</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Free</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Premium</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker ml-3" tabindex="-98">
                            <option value=""> Newest </option>
                            <option value="1">Popular</option>
                            <option value="2">Free</option>
                            <option value="3">Premium</option>
                        </select></div>

                    </div>
                </div>

                <div class="section-small">

                    <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid-match uk-grid" uk-grid="">

                        <div class="uk-first-column">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/1.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>

                                        <h4>Ultimate Web Developer Course </h4>
                                        <p> HTML is the building blocks of the web. It gives pages structure</p>

                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 33 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 26 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/3.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">JavaScript</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>
                                        <h4>The Complete JavaScript From </h4>
                                        <p> JavaScript is how you build interactivity on the web...
                                            learn </p>
                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 12 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 25 Hours </h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/2.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">Angular</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>

                                        <h4>Learn Angular Fundamentals </h4>
                                        <p> Learn how to build and launch React web applications using .. </p>
                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 14 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 55 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div>
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/6.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>
                                        <h4>Learn Modern HTML &amp; CSS </h4>
                                        <p> HTML is the building blocks of the web. It gives pages structure</p>

                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 16 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 52 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/5.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>

                                        <h4>Ultimate Web Developer Course </h4>
                                        <p> HTML is the building blocks of the web. It gives pages structure</p>

                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 34 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 54 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="uk-grid-margin">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/4.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">Angular</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>
                                        <h4>Learn Angular Fundamentals </h4>
                                        <p> Learn how to build and launch React web applications using .. </p>
                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 12 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 64 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="uk-grid-margin">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/7.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>
                                        <h4>Bootstrap Introduction</h4>
                                        <p> Learn how to build your website using latest Bootstrap Modern ..</p>
                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 33 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 26 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="uk-grid-margin">
                            <a href="http://demo.foxthemes.net/courseplusv3.3/default/course-intro.html">
                                <div class="course-card">
                                    <div class="course-card-thumbnail ">
                                        <img src="{{asset('templatefiles/1.png')}}">
                                        <span class="play-button-trigger"></span>
                                    </div>
                                    <div class="course-card-body">
                                        <div class="course-card-info">
                                            <div>
                                                <span class="catagroy">HTML</span>
                                            </div>
                                            <div>
                                                <i class="icon-feather-bookmark icon-small"></i>
                                            </div>
                                        </div>

                                        <h4>Ultimate Web Developer Course </h4>
                                        <p> HTML is the building blocks of the web. It gives pages structure</p>

                                        <div class="course-card-footer">
                                            <h5> <i class="icon-feather-film"></i> 33 Lectures </h5>
                                            <h5> <i class="icon-feather-clock"></i> 26 Hours </h5>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>

                </div>


                <!-- pagination menu -->
                <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
                    <li class="uk-first-column"><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><span uk-pagination-previous="" class="uk-icon uk-pagination-previous"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-previous"><polyline fill="none" stroke="#000" stroke-width="1.2" points="6 1 1 6 6 11"></polyline></svg></span></a></li>
                    <li class="uk-disabled"><span>...</span></li>
                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">4</a></li>
                    <li class="uk-active"><span>7</span></li>
                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">8</a></li>
                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">10</a></li>
                    <li class="uk-disabled"><span>...</span></li>
                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-next"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"></polyline></svg></span></a></li>
                </ul>

                <div id="course-filter" uk-offcanvas="flip: true; overlay: true" class="uk-offcanvas">
                    <div class="uk-offcanvas-bar">

                        <!-- close button -->
                        <button class="uk-offcanvas-close uk-icon uk-close" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>

                        <div class="sidebar-filter">

                            <div class="sidebar-filter-contents">


                                <h4> Filter By </h4>

                                <ul class="sidebar-filter-list uk-accordion" uk-accordion="multiple: true">

                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> Skill Levels </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio1">
                                                    <span class="test"> Beginner <span> (25) </span> </span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio1">
                                                    <span class="test"> Entermidate<span> (32) </span></span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio1">
                                                    <span class="test"> Expert <span> (12) </span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> Course type </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio2">
                                                    <span class="test"> Free (42) </span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio2">
                                                    <span class="test"> Paid </span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"> Duration time </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio3">
                                                    <span class="test"> +5 Hourse (23) </span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio3">
                                                    <span class="test"> +10 Hourse (12)</span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio3">
                                                    <span class="test"> +20 Hourse (5)</span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="radio3">
                                                    <span class="test"> +30 Hourse (2)</span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>


                                </ul>



                            </div>

                        </div>

                    </div>
                </div>



                {{-- <!-- footer
               ================================================== -->
                <div class="footer">
                    <div class="uk-grid-collapse uk-grid" uk-grid="">
                        <div class="uk-width-expand@s uk-first-column">
                            <p>© 2019 <strong>Courseplus</strong>. All Rights Reserved. </p>
                        </div>
                        <div class="uk-width-auto@s">
                            <nav class="footer-nav-icon">
                                <ul>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><i class="icon-brand-facebook"></i></a></li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><i class="icon-brand-dribbble"></i></a></li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><i class="icon-brand-youtube"></i></a></li>
                                    <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"><i class="icon-brand-twitter"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> --}}


            </div>

        </div>

    </div>

    <!-- For Night mode -->
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
 
 

    <!-- javaScripts
    ================================================== -->
    <script src="{{asset('templatefiles/framework.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('templatefiles/simplebar.js')}}"></script>
    <script src="{{asset('templatefiles/main.js')}}"></script>
    <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>




<div id="backtotop" class=""><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#"></a></div></body></html>