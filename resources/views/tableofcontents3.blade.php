<!DOCTYPE html>
<!-- saved from url=(0069)# -->
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




    <!-- Syntax Highlighter -->
    <link rel="stylesheet" type="text/css" href="{{asset('templatefiles/shCore.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('templatefiles/shCoreMidnight.css')}}" media="all">
    <style>
        .gutter,
        .toolbar {
            display: none
        }

        .syntaxhighlighter {
            padding: 15px 20px;
        }

        .syntaxhighlighter {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding: 0 !important;
            padding-top: 18px !important;
        }
    </style>
</head>

<body style="">

    <!-- class ( is-open ) is activated sidebar video lists on small devices -->
    <div id="wrapper">


       <!-- Header Container
        ================================================== -->
        <header class="header uk-hidden@l uk-sticky" uk-sticky="top:20 ; cls-active:header-sticky">

            <div class="container">
                <nav uk-navbar="" class="uk-navbar">

                    <!-- left Side Content -->
                    <div class="uk-navbar-left">

                        <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>



                        <!-- logo -->
                        <a href="#" class="logo">
                            <img src="{{asset('templatefiles/logo-dark.svg')}}" alt="">
                            <span> Courseplus</span>
                        </a>

                        <!-- breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#"> Dashboard </a></li>
                                <li><a href="#">Courses</a></li>
                                <li>Browse Web Development</li>
                            </ul>
                        </nav>


                    </div>


                    <!--  Right Side Content   -->

                    <div class="uk-navbar-right">

                        <div class="header-widget">
                            <!-- User icons close mobile-->
                            <span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"> </span>


                            <a href="#" class="header-widget-icon" uk-tooltip="title: My Courses ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-youtube-alt"></i>
                            </a>

                            <!-- courses dropdown List -->
                            <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-notifications my-courses-dropdown uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Your Courses</h4>
                                    <a href="#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
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

                                </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
                                <div class="dropdown-notifications-footer">
                                    <a href="#"> sell all</a>
                                </div>
                            </div>

                            <!-- notificiation icon  -->

                            <a href="#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-bell"></i>
                                <span>4</span>
                            </a>

                            <!-- notificiation dropdown -->
                            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small" class="dropdown-notifications uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Notifications </h4>
                                    <a href="#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Notifications settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
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

                                </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>


                            </div>


                            <!-- Message  -->

                            <a href="#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21" title="" aria-expanded="false">
                                <i class="uil-envelope-alt"></i>
                                <span>1</span>
                            </a>

                            <!-- Message  notificiation dropdown -->
                            <div uk-dropdown=" pos: top-right;mode:click" class="dropdown-notifications uk-dropdown">

                                <!-- notivication header -->
                                <div class="dropdown-notifications-headline">
                                    <h4>Messages</h4>
                                    <a href="#">
                                        <i class="icon-feather-settings" uk-tooltip="title: Message settings ; pos: left" title="" aria-expanded="false"></i>
                                    </a>
                                </div>

                                <!-- notification contents -->
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;">

                                    <!-- notiviation list -->
                                    <ul>
                                        <li class="notifications-not-read">
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
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
                                            <a href="#">
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

                                </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
                                <div class="dropdown-notifications-footer">
                                    <a href="#"> sell all <i class="icon-line-awesome-long-arrow-right"></i> </a>
                                </div>
                            </div>


                            <!-- profile-icon-->

                            <a href="#" class="header-widget-icon profile-icon" aria-expanded="false">
                                <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="" class="header-profile-icon">
                            </a>

                            <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown">

                                <!-- User Name / Avatar -->
                                <a href="#">

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
                                        <a href="#">
                                            <i class="icon-material-outline-dashboard"></i> Dashboard</a>
                                    </li>
                                    <li><a href="#">
                                            <i class="icon-feather-bookmark"></i> Bookmark </a>
                                    </li>
                                    <li><a href="#">
                                            <i class="icon-feather-settings"></i> Account Settings</a>
                                    </li>
                                    <li><a href="#" style="color:#62d76b">
                                            <i class="icon-feather-star"></i> Upgrade To Premium</a>
                                    </li>
                                    <li>
                                        <a href="#" id="night-mode" class="btn-night-mode">
                                            <i class="icon-feather-moon"></i> Night mode
                                            <span class="btn-night-mode-switch">
                                                <span class="uk-switch-button"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="menu-divider">
                                    </li><li><a href="#">
                                            <i class="icon-feather-help-circle"></i> Help</a>
                                    </li>
                                    <li><a href="#">
                                            <i class="icon-feather-log-out"></i> Sing Out</a>
                                    </li>
                                </ul>


                            </div>


                        </div>



                        <!-- icon search-->
                        <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
                            <i class="uil-search icon-small"></i>
                        </a>
                        
                        <!-- User icons -->
                            <a href="#" class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
                            </a>

                    </div>
                    <!-- End Right Side Content / End -->


                </nav>

            </div>
            <!-- container  / End -->

        </header><div class="uk-sticky-placeholder" style="height: 0px; margin: 0px;" hidden=""></div>

        <!-- overlay seach on mobile-->
        <div class="nav-overlay uk-navbar-left uk-position-relative uk-flex-1 bg-grey uk-light p-2" hidden="" style="z-index: 10000;">
            <div class="uk-navbar-item uk-width-expand" style="min-height: 60px;">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search..." autofocus="">
                </form>
            </div>
            <a class="uk-navbar-toggle uk-icon uk-close" uk-close="" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></a>
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
                <a href="#">
                    <i class=" uil-graduation-hat"></i>
                </a>
            </div>

            <ul>
                <li>
                    <a href="#"> <i class="uil-play-circle"></i> </a>
                    <div class="side-menu-slide">
                        <div class="side-menu-slide-content">
                            <ul data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden;">
                                <li>
                                    <a href="#"> <i class="uil-brush-alt "></i> Web Development </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-android-alt"></i> Mobile App </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-bag-alt"></i> Business </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-window"></i> IT Software </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-palette"></i> Desings </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-megaphone"></i> Marketing </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-life-ring"></i> Life Style </a>
                                </li>
                                <li>
                                    <a href="#"> <i class=" uil-camera"></i> Photography </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-medkit"></i> Health Fitness </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-music"></i> Music </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-shopping-cart-alt"></i> Ecommerce
                                    </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-utensils-alt "></i> Food cooking </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-lightbulb-alt"></i> Teaching academy </a>
                                </li>
                        </div></div></div><div class="simplebar-placeholder" style="width: 230px; height: 864px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></ul></div>
                    </div>
                </li>
                <li>
                    <!-- book -->
                    <a href="#"> <i class="uil-book-alt"></i> <span class="tooltips"> Book</span> </a>
                </li>
                <li>
                    <!-- Episodes -->
                    <a href="#"> <i class="uil-youtube-alt"></i> <span class="tooltips"> Episodes</span></a>
                </li>
                <li>
                    <!-- Paths-->
                    <a href="#"> <i class="uil-rss-interface"></i> <span class="tooltips">
                            Paths</span></a>
                </li>
                <li>
                    <!-- Blog-->
                    <a href="#"> <i class="uil-file-alt"></i> <span class="tooltips"> Blog</span></a>
                </li>
                <li>
                    <!--  Pages -->
                    <a href="#"> <i class="uil-layers"></i></a>
                    <div class="side-menu-slide">
                        <div class="side-menu-slide-content">
                            <ul uk-accordion="" class="uk-accordion">
                                <!-- to make it open default   class="uk-open" -->
                                <li>
                                    <a href="#" class="uk-accordion-title">
                                        <i class="uil-layers"></i> Pages </a>
                                    <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                        <a href="#"> Pricing</a>
                                        <a href="#"> faq</a>
                                        <a href="#"> term</a>
                                        <a href="#"> Privacy</a>
                                        <a href="#"> Comming soon</a>
                                        <a href="#"> Maintanence</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="uk-accordion-title">
                                        <i class="uil-sign-out-alt"></i> authentication </a>
                                    <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                        <a href="#"> Login </a>
                                        <a href="#"> Register </a>
                                        <a href="#"> Simple Register</a>
                                        <a href="#"> Simple Register</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="uk-accordion-title">
                                        <i class="uil-code"></i> Development </a>
                                    <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                        <a href="#"> Elements </a>
                                        <a href="#"> Components </a>
                                        <a href="#"> Icons </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" uk-toggle="target: #searchbox; cls: is-active"><i class="uil-search-alt"></i></a>
                </li>

            </ul>
            <ul class="uk-position-bottom">
                <li>
                    <!-- Lunch information box -->
                    <a href="#" aria-expanded="false">
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
                    <a href="#" aria-expanded="false">
                        <span class="icon-feather-user"></span>
                    </a>
                    <div uk-drop="pos: right-bottom ;mode:click ; offset: 10;animation: uk-animation-slide-right-small" class="uk-drop">
                        <div class="uk-card-default rounded p-0">
                            <a href="#" class="p-0">

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
                                    <a href="#">
                                        <i class="icon-material-outline-dashboard"></i> Dashboard</a>
                                </li>
                                <li><a href="#">
                                        <i class="icon-feather-settings"></i> Account Settings</a>
                                </li>
                                <li><a href="#" class="text-grey">
                                        <i class="icon-feather-star"></i> Upgrade To Premium</a>
                                </li>
                                <li class="menu-divider">
                                </li>
                                <li><a href="#">
                                        <i class="icon-feather-help-circle"></i> Help</a>
                                </li>
                                <li><a href="#">
                                        <i class="icon-feather-log-out"></i> Sing Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="page-content">

            <div class="uk-grid-collapse uk-grid" uk-grid="">
                <div class="uk-width-3-4@m bg-white uk-first-column">

                    <ul id="video-slider" class="uk-switcher" style="touch-action: pan-y pinch-zoom;">

                        <li class="uk-active">
                            <!-- to autoplay video uk-video="automute: true" -->
                            <div class="embed-video">
                                <iframe src="{{asset('templatefiles/9gTw2EDkaDQ.html')}}" frameborder="0" uk-video="automute: true" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                            </div>

                        </li>
                        <li>
                            <div class="embed-video">
                                <iframe src="{{asset('templatefiles/dDn9uw7N9Xg.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                            </div>
                        </li>
                        <li>
                            <div class="embed-video">
                                <iframe src="{{asset('templatefiles/CGSdK7FI9MY.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                            </div>
                        </li>
                        <li>
                            <div class="embed-video">
                                <iframe src="{{asset('templatefiles/4I1WgJz_lmA.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                            </div>
                        </li>
                        <li>
                            <div class="embed-video">
                                <iframe src="{{asset('templatefiles/dDn9uw7N9Xg.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                            </div>
                        </li>
                        <li>
                            <div class="embed-video">
                                <iframe src="{{asset('templatefiles/CPcS4HtrUEU.html')}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                            </div>
                        </li>

                    </ul>



                    <!-- video description contents -->
                    <div class="p-lg-5 p-3">

                        <h2> HTML Full Course - Build a Website Tutorial </h2>

                        <div class="uk-grid-small uk-grid" uk-grid="">
                            <div class="uk-width-auto uk-first-column">
                                <span>299 views </span> • <span> Sep 18, 2019 </span>
                            </div>
                            <div class="uk-width-expand">

                                <nav class="responsive-tab">
                                    <ul class="text-right">
                                        <li><a href="#" uk-tooltip="title: Download; pos: top" title="" aria-expanded="false">
                                                <i class="icon-feather-download"></i>
                                                <span class="uk-visible@s">Download </span> </a>
                                        </li>
                                        <li><a href="#" uk-toggle="target: #code" uk-tooltip="title: Source code; pos: top" title="" aria-expanded="false">
                                                <i class="icon-feather-code"> </i>
                                                <span class="uk-visible@s">Source code </span> </a>
                                        </li>
                                    </ul>
                                </nav>


                            </div>
                        </div>

                        <hr class="my-2">

                        <div uk-toggle="cls: uk-flex uk-flex-between@m uk-flex-middle; mode: media; media: @m" class="uk-flex uk-flex-between@m uk-flex-middle">
                            <div class="user-details-card">
                                <div class="user-details-card-avatar py-0">
                                    <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                </div>
                                <div class="user-details-card-name">
                                    Stella Johnson <span> Developer <span> 1 year ago </span> </span>
                                </div>
                            </div>
                            <div>
                                <strong class="mx-3 uk-visible@s"> Share on </strong>

                                <a href="#" class="btn btn-facebook  rounded-circle btn-icon-only uk-margin-small-top">
                                    <span class="btn-inner--icon">
                                        <i class="icon-brand-facebook-f"></i>
                                    </span>
                                </a>

                                <a href="#" class="btn btn-twitter  rounded-circle btn-icon-only uk-margin-small-top">
                                    <span class="btn-inner--icon">
                                        <i class="icon-brand-twitter"></i>
                                    </span>
                                </a>

                                <a href="#" class="btn btn-google-plus rounded-circle btn-icon-only uk-margin-small-top">
                                    <span class="btn-inner--icon">
                                        <i class="icon-brand-google-plus-g"></i>
                                    </span>
                                </a>
                                
                            </div>
                        </div>

                        <h4 class="mt-4"> Description</h4>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod
                            tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                            consequat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                            doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                        <p> Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                            ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                            amet.</p>
                        <h4>Elementum tellus id mauris faucibus</h4>
                        <p> Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                            ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                            amet.</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                            consequat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet
                            doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                        <h4> Interdum et malesuada fames ipsum</h4>
                        <p> Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                            ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                            amet.</p>
                        <h4>Maecenas dolor</h4>
                        <ul class="uk-list uk-list-bullet">
                            <li>At vero eos et accusam et justo</li>
                            <li>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing elitr</li>
                        </ul>



                        <!--  off canvas  code-->
                        <div id="code" uk-offcanvas="flip: true; overlay: true" class="uk-offcanvas">
                            <div class="uk-offcanvas-bar uk-width-xlarge p-0">

                                <div class="p-4 pb-0">
                                    <button class="uk-offcanvas-close uk-icon uk-close" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>

                                    <h3>Source code</h3>

                                    <div class="uk-flex">
                                        <nav class="responsive-tab mb-0 style-4">
                                            <ul uk-switcher="connect : #code-snipt ; animation: uk-animation-fade">
                                                <li class="uk-active"><a href="#" aria-expanded="true">JavaScript</a></li>
                                                <li><a href="#" aria-expanded="false">Html</a></li>
                                                <li><a href="#" aria-expanded="false">Css </a></li>
                                            </ul>
                                        </nav>
                                        <div class="uk-flex">

                                            <a href="#" class="iconbox iconbox-sm button circle mr-2" uk-tooltip="title: Preview; pos: top" title="" aria-expanded="false">
                                                <i class="icon-feather-eye"></i>
                                            </a>

                                            <a href="#" class="iconbox iconbox-sm button circle" uk-tooltip="title: Downlaod; pos: top" title="" aria-expanded="false">
                                                <i class="icon-feather-download"></i>
                                            </a>

                                        </div>
                                    </div>

                                </div>





                                <ul class="uk-switcher" id="code-snipt" style="touch-action: pan-y pinch-zoom;">


                                    <!-- javascript-->
                                    <li class="uk-active">

                                        <div id="starter-page"><div id="highlighter_313799" class="syntaxhighlighter  javascript"><div class="toolbar"><span><a href="#" class="toolbar_item command_help help">?</a></span></div><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="gutter"><div class="line number1 index0 alt2">1</div><div class="line number2 index1 alt1">2</div><div class="line number3 index2 alt2">3</div><div class="line number4 index3 alt1">4</div><div class="line number5 index4 alt2">5</div><div class="line number6 index5 alt1">6</div><div class="line number7 index6 alt2">7</div><div class="line number8 index7 alt1">8</div><div class="line number9 index8 alt2">9</div><div class="line number10 index9 alt1">10</div><div class="line number11 index10 alt2">11</div><div class="line number12 index11 alt1">12</div><div class="line number13 index12 alt2">13</div><div class="line number14 index13 alt1">14</div><div class="line number15 index14 alt2">15</div><div class="line number16 index15 alt1">16</div><div class="line number17 index16 alt2">17</div><div class="line number18 index17 alt1">18</div><div class="line number19 index18 alt2">19</div><div class="line number20 index19 alt1">20</div><div class="line number21 index20 alt2">21</div><div class="line number22 index21 alt1">22</div><div class="line number23 index22 alt2">23</div><div class="line number24 index23 alt1">24</div><div class="line number25 index24 alt2">25</div><div class="line number26 index25 alt1">26</div><div class="line number27 index26 alt2">27</div><div class="line number28 index27 alt1">28</div><div class="line number29 index28 alt2">29</div><div class="line number30 index29 alt1">30</div><div class="line number31 index30 alt2">31</div><div class="line number32 index31 alt1">32</div><div class="line number33 index32 alt2">33</div><div class="line number34 index33 alt1">34</div><div class="line number35 index34 alt2">35</div><div class="line number36 index35 alt1">36</div><div class="line number37 index36 alt2">37</div><div class="line number38 index37 alt1">38</div><div class="line number39 index38 alt2">39</div><div class="line number40 index39 alt1">40</div><div class="line number41 index40 alt2">41</div><div class="line number42 index41 alt1">42</div><div class="line number43 index42 alt2">43</div><div class="line number44 index43 alt1">44</div><div class="line number45 index44 alt2">45</div><div class="line number46 index45 alt1">46</div></td><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="javascript keyword">var</code> <code class="javascript plain">cont_slc = 0;</code></div><div class="line number2 index1 alt1">&nbsp;</div><div class="line number3 index2 alt2"><code class="javascript keyword">function</code> <code class="javascript plain">open_select(idx) {</code></div><div class="line number4 index3 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">var</code> <code class="javascript plain">idx1 = idx.getAttribute(</code><code class="javascript string">'data-n-select'</code><code class="javascript plain">);</code></div><div class="line number5 index4 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">var</code> <code class="javascript plain">ul_cont_li = document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"'] .cont_select_int &gt; li"</code><code class="javascript plain">);</code></div><div class="line number6 index5 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">var</code> <code class="javascript plain">hg = 0;</code></div><div class="line number7 index6 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">var</code> <code class="javascript plain">slect_open = document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"']"</code><code class="javascript plain">)[0].getAttribute(</code></div><div class="line number8 index7 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript string">'data-selec-open'</code><code class="javascript plain">);</code></div><div class="line number9 index8 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">var</code> <code class="javascript plain">slect_element_open = document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"'] select"</code><code class="javascript plain">)[0];</code></div><div class="line number10 index9 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">if</code> <code class="javascript plain">(Mobile_ || FirfoxMobile) {</code></div><div class="line number11 index10 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">if</code> <code class="javascript plain">(window.document.createEvent) { </code><code class="javascript comments">// All</code></div><div class="line number12 index11 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">var</code> <code class="javascript plain">evt = window.document.createEvent(</code><code class="javascript string">"MouseEvents"</code><code class="javascript plain">);</code></div><div class="line number13 index12 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">evt.initMouseEvent(</code><code class="javascript string">"mousedown"</code><code class="javascript plain">, </code><code class="javascript keyword">false</code><code class="javascript plain">, </code><code class="javascript keyword">true</code><code class="javascript plain">, window, 0, 0, 0, 0, 0, </code><code class="javascript keyword">false</code><code class="javascript plain">, </code><code class="javascript keyword">false</code><code class="javascript plain">, </code><code class="javascript keyword">false</code><code class="javascript plain">, </code><code class="javascript keyword">false</code><code class="javascript plain">,</code></div><div class="line number14 index13 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">0,</code></div><div class="line number15 index14 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">null</code><code class="javascript plain">);</code></div><div class="line number16 index15 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">slect_element_open.dispatchEvent(evt);</code></div><div class="line number17 index16 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">} </code><code class="javascript keyword">else</code> <code class="javascript keyword">if</code> <code class="javascript plain">(slect_element_open.fireEvent) { </code><code class="javascript comments">// IE</code></div><div class="line number18 index17 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">slect_element_open.fireEvent(</code><code class="javascript string">"onmousedown"</code><code class="javascript plain">);</code></div><div class="line number19 index18 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">}</code></div><div class="line number20 index19 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">} </code><code class="javascript keyword">else</code> <code class="javascript plain">{</code></div><div class="line number21 index20 alt2">&nbsp;</div><div class="line number22 index21 alt1">&nbsp;</div><div class="line number23 index22 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">for</code> <code class="javascript plain">(</code><code class="javascript keyword">var</code> <code class="javascript plain">i = 0; i &lt; ul_cont_li.length; i++) {</code></div><div class="line number24 index23 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">hg += ul_cont_li[i].offsetHeight;</code></div><div class="line number25 index24 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">};</code></div><div class="line number26 index25 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript keyword">if</code> <code class="javascript plain">(slect_open == </code><code class="javascript string">'false'</code><code class="javascript plain">) {</code></div><div class="line number27 index26 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"']"</code><code class="javascript plain">)[0].setAttribute(</code></div><div class="line number28 index27 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript string">'data-selec-open'</code><code class="javascript plain">,</code></div><div class="line number29 index28 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript string">'true'</code><code class="javascript plain">);</code></div><div class="line number30 index29 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"'] &gt; .cont_list_select_mate &gt; ul"</code><code class="javascript plain">)[0]</code></div><div class="line number31 index30 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">.style.height = hg + </code><code class="javascript string">"px"</code><code class="javascript plain">;</code></div><div class="line number32 index31 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"'] &gt; .icon_select_mate"</code><code class="javascript plain">)[0].style</code></div><div class="line number33 index32 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">.transform = </code><code class="javascript string">'rotate(180deg)'</code><code class="javascript plain">;</code></div><div class="line number34 index33 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">} </code><code class="javascript keyword">else</code> <code class="javascript plain">{</code></div><div class="line number35 index34 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"']"</code><code class="javascript plain">)[0].setAttribute(</code></div><div class="line number36 index35 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript string">'data-selec-open'</code><code class="javascript plain">,</code></div><div class="line number37 index36 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript string">'false'</code><code class="javascript plain">);</code></div><div class="line number38 index37 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"'] &gt; .icon_select_mate"</code><code class="javascript plain">)[0].style</code></div><div class="line number39 index38 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">.transform = </code><code class="javascript string">'rotate(0deg)'</code><code class="javascript plain">;</code></div><div class="line number40 index39 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">document.querySelectorAll(</code><code class="javascript string">"[data-indx-select='"</code> <code class="javascript plain">+ idx1 + </code><code class="javascript string">"'] &gt; .cont_list_select_mate &gt; ul"</code><code class="javascript plain">)[0]</code></div><div class="line number41 index40 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">.style.height = </code><code class="javascript string">"0px"</code><code class="javascript plain">;</code></div><div class="line number42 index41 alt1"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">}</code></div><div class="line number43 index42 alt2"><code class="javascript spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="javascript plain">}</code></div><div class="line number44 index43 alt1">&nbsp;</div><div class="line number45 index44 alt2"><code class="javascript plain">} </code><code class="javascript comments">// fin function open_select</code></div></div></td></tr></tbody></table></div></div>

                                    </li>


                                    <li>

                                        <div id="starter-page"><div id="highlighter_115989" class="syntaxhighlighter  html"><div class="toolbar"><span><a href="#" class="toolbar_item command_help help">?</a></span></div><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="gutter"><div class="line number1 index0 alt2">1</div><div class="line number2 index1 alt1">2</div><div class="line number3 index2 alt2">3</div><div class="line number4 index3 alt1">4</div><div class="line number5 index4 alt2">5</div><div class="line number6 index5 alt1">6</div><div class="line number7 index6 alt2">7</div><div class="line number8 index7 alt1">8</div><div class="line number9 index8 alt2">9</div><div class="line number10 index9 alt1">10</div><div class="line number11 index10 alt2">11</div><div class="line number12 index11 alt1">12</div><div class="line number13 index12 alt2">13</div><div class="line number14 index13 alt1">14</div><div class="line number15 index14 alt2">15</div><div class="line number16 index15 alt1">16</div><div class="line number17 index16 alt2">17</div><div class="line number18 index17 alt1">18</div><div class="line number19 index18 alt2">19</div><div class="line number20 index19 alt1">20</div><div class="line number21 index20 alt2">21</div><div class="line number22 index21 alt1">22</div><div class="line number23 index22 alt2">23</div><div class="line number24 index23 alt1">24</div><div class="line number25 index24 alt2">25</div><div class="line number26 index25 alt1">26</div><div class="line number27 index26 alt2">27</div><div class="line number28 index27 alt1">28</div><div class="line number29 index28 alt2">29</div><div class="line number30 index29 alt1">30</div><div class="line number31 index30 alt2">31</div><div class="line number32 index31 alt1">32</div><div class="line number33 index32 alt2">33</div><div class="line number34 index33 alt1">34</div><div class="line number35 index34 alt2">35</div><div class="line number36 index35 alt1">36</div><div class="line number37 index36 alt2">37</div><div class="line number38 index37 alt1">38</div><div class="line number39 index38 alt2">39</div><div class="line number40 index39 alt1">40</div></td><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="html plain">&lt;</code><code class="html keyword">html</code> <code class="html color1">lang</code><code class="html plain">=</code><code class="html string">"en"</code><code class="html plain">&gt;</code></div><div class="line number2 index1 alt1">&nbsp;</div><div class="line number3 index2 alt2"><code class="html plain">&lt;</code><code class="html keyword">head</code><code class="html plain">&gt;</code></div><div class="line number4 index3 alt1">&nbsp;</div><div class="line number5 index4 alt2"><code class="html plain">&lt;</code><code class="html keyword">meta</code> <code class="html color1">charset</code><code class="html plain">=</code><code class="html string">"utf-8"</code><code class="html plain">&gt;</code></div><div class="line number6 index5 alt1"><code class="html plain">&lt;</code><code class="html keyword">meta</code> <code class="html color1">name</code><code class="html plain">=</code><code class="html string">"viewport"</code> <code class="html color1">content</code><code class="html plain">=</code><code class="html string">"width=device-width, initial-scale=1"</code><code class="html plain">&gt; </code></div><div class="line number7 index6 alt2"><code class="html spaces">&nbsp;</code>&nbsp;</div><div class="line number8 index7 alt1"><code class="html plain">&lt;</code><code class="html keyword">link</code> <code class="html color1">rel</code><code class="html plain">=</code><code class="html string">"stylesheet"</code> <code class="html color1">href</code><code class="html plain">=</code><code class="html string">"style.css"</code><code class="html plain">&gt;</code></div><div class="line number9 index8 alt2">&nbsp;</div><div class="line number10 index9 alt1"><code class="html plain">&lt;/</code><code class="html keyword">head</code><code class="html plain">&gt;</code></div><div class="line number11 index10 alt2"><code class="html plain">&lt;</code><code class="html keyword">body</code><code class="html plain">&gt;</code></div><div class="line number12 index11 alt1">&nbsp;</div><div class="line number13 index12 alt2"><code class="html comments">&lt;!-- Wrapper --&gt;</code></div><div class="line number14 index13 alt1"><code class="html plain">&lt;</code><code class="html keyword">div</code> <code class="html color1">id</code><code class="html plain">=</code><code class="html string">"wrapper"</code><code class="html plain">&gt;</code></div><div class="line number15 index14 alt2">&nbsp;</div><div class="line number16 index15 alt1">&nbsp;</div><div class="line number17 index16 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html comments">&lt;!-- Header&nbsp;&nbsp; --&gt;</code></div><div class="line number18 index17 alt1">&nbsp;</div><div class="line number19 index18 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">div</code> <code class="html color1">class</code><code class="html plain">=</code><code class="html string">"contets"</code><code class="html plain">&gt;</code></div><div class="line number20 index19 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">h1</code><code class="html plain">&gt; Hello world &lt;/</code><code class="html keyword">h1</code><code class="html plain">&gt;</code></div><div class="line number21 index20 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">p</code><code class="html plain">&gt; Lorem ipsum dolor sit amet,&nbsp;&nbsp; ut labore et&nbsp;&nbsp; &lt;/</code><code class="html keyword">p</code><code class="html plain">&gt; </code></div><div class="line number22 index21 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">p</code><code class="html plain">&gt; nostrud exercitation ullamco laboris nisi ut &lt;/</code><code class="html keyword">p</code><code class="html plain">&gt;</code></div><div class="line number23 index22 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">br</code><code class="html plain">&gt;</code></div><div class="line number24 index23 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">a</code> <code class="html color1">href</code><code class="html plain">=</code><code class="html string">"#"</code><code class="html plain">&gt;Custom &lt;</code><code class="html keyword">link</code> <code class="html color1">rel</code><code class="html plain">=</code><code class="html string">"stylesheet"</code> <code class="html color1">href</code><code class="html plain">=</code><code class="html string">""</code><code class="html plain">&gt;&lt;/</code><code class="html keyword">a</code><code class="html plain">&gt;</code></div><div class="line number25 index24 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;/</code><code class="html keyword">div</code><code class="html plain">&gt;</code></div><div class="line number26 index25 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html comments">&lt;!-- Content&nbsp; --&gt;</code></div><div class="line number27 index26 alt2">&nbsp;</div><div class="line number28 index27 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html comments">&lt;!-- Footer --&gt;</code></div><div class="line number29 index28 alt2">&nbsp;</div><div class="line number30 index29 alt1">&nbsp;</div><div class="line number31 index30 alt2"><code class="html plain">&lt;/</code><code class="html keyword">div</code><code class="html plain">&gt;&nbsp; </code><code class="html comments">&lt;!-- Wrapper / End --&gt;</code></div><div class="line number32 index31 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>&nbsp;</div><div class="line number33 index32 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;</code><code class="html comments">&lt;!-- javaScripts</code></div><div class="line number34 index33 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;</code><code class="html comments">================================================== --&gt;</code></div><div class="line number35 index34 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">&lt;</code><code class="html keyword">script</code> <code class="html color1">src</code><code class="html plain">=</code><code class="html string">"../assets/js/jquery-3.3.1.min.js"</code><code class="html plain">&gt;&lt;/</code><code class="html keyword">script</code><code class="html plain">&gt; </code></div><div class="line number36 index35 alt1">&nbsp;</div><div class="line number37 index36 alt2"><code class="html plain">&lt;/</code><code class="html keyword">body</code><code class="html plain">&gt;</code></div><div class="line number38 index37 alt1"><code class="html plain">&lt;/</code><code class="html keyword">html</code><code class="html plain">&gt;&nbsp;&nbsp; </code></div><div class="line number39 index38 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>&nbsp;</div><div class="line number40 index39 alt1"><code class="html spaces">&nbsp;</code><code class="html plain">&lt;/</code><code class="html keyword">div</code><code class="html plain">&gt;</code></div></div></td></tr></tbody></table></div></div>

                                    </li>




                                    <!-- css tab -->

                                    <li>

                                        <div id="starter-page"><div id="highlighter_374084" class="syntaxhighlighter  html"><div class="toolbar"><span><a href="#" class="toolbar_item command_help help">?</a></span></div><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="gutter"><div class="line number1 index0 alt2">1</div><div class="line number2 index1 alt1">2</div><div class="line number3 index2 alt2">3</div><div class="line number4 index3 alt1">4</div><div class="line number5 index4 alt2">5</div><div class="line number6 index5 alt1">6</div><div class="line number7 index6 alt2">7</div><div class="line number8 index7 alt1">8</div><div class="line number9 index8 alt2">9</div><div class="line number10 index9 alt1">10</div><div class="line number11 index10 alt2">11</div><div class="line number12 index11 alt1">12</div><div class="line number13 index12 alt2">13</div><div class="line number14 index13 alt1">14</div><div class="line number15 index14 alt2">15</div><div class="line number16 index15 alt1">16</div><div class="line number17 index16 alt2">17</div><div class="line number18 index17 alt1">18</div><div class="line number19 index18 alt2">19</div></td><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="html plain">body{</code></div><div class="line number2 index1 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">background:white;</code></div><div class="line number3 index2 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">font-size:16px;</code></div><div class="line number4 index3 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">color:black ;</code></div><div class="line number5 index4 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">line-height:1.3px ;</code></div><div class="line number6 index5 alt1">&nbsp;</div><div class="line number7 index6 alt2"><code class="html plain">}</code></div><div class="line number8 index7 alt1">&nbsp;</div><div class="line number9 index8 alt2"><code class="html plain">h1 {</code></div><div class="line number10 index9 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">font-size:2rem;</code></div><div class="line number11 index10 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">line-height:1.3</code></div><div class="line number12 index11 alt1"><code class="html plain">}</code></div><div class="line number13 index12 alt2">&nbsp;</div><div class="line number14 index13 alt1"><code class="html plain">.button {</code></div><div class="line number15 index14 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">background:#f43453;</code></div><div class="line number16 index15 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">color:white;</code></div><div class="line number17 index16 alt2"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">font-size:12px;</code></div><div class="line number18 index17 alt1"><code class="html spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code class="html plain">padding: 20px 10px</code></div><div class="line number19 index18 alt2"><code class="html plain">}</code></div></div></td></tr></tbody></table></div></div>

                                    </li>



                                </ul>


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
                                        <li><a href="#"><i class="icon-brand-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-brand-dribbble"></i></a></li>
                                        <li><a href="#"><i class="icon-brand-youtube"></i></a></li>
                                        <li><a href="#"><i class="icon-brand-twitter"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div> --}}


                </div>

                <!-- sidebar -->
                <div class="uk-width-1-4@m uk-overflow-hidden vidlist-3-container">


                    <div uk-sticky="" class="uk-sticky uk-sticky-fixed" style="position: fixed; top: 0px; width: 298px;">

                        <h5 class="bg-gradient-grey text-white py-4 p-3 mb-0"> HTML Basics</h5>

                        <ul class="uk-child-width-expand mb-0 uk-tab" uk-switcher="animation: uk-animation-slide-right-small, uk-animation-slide-left-small" uk-tab="">
                            <li class=""><a href="#" aria-expanded="false"> Contents</a></li>
                            <li class="uk-active"><a href="#" aria-expanded="true"> Details</a></li>
                        </ul>

                        <ul class="uk-switcher uk-overflow-hidden" style="touch-action: pan-y pinch-zoom;">

                            <!-- first tab -->

                            <li class="" style="">

                                <div class="vidlist-3-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: auto; overflow: hidden;">

                                    <ul class="vidlist-3-section uk-accordion" uk-accordion="">


                                        <!--  section 1  -->
                                        <li class="uk-open">
                                            <a class="uk-accordion-title" href="#"> Your First webpage </a>
                                            <div class="uk-accordion-content" aria-hidden="false">
                                                <!-- vidlist -->
                                                <ul class="vidlist-3" uk-switcher="connect: #video-slider ; animation: uk-animation-slide-right-small, uk-animation-slide-left-medium">
                                                    <li class="uk-active">
                                                        <a href="#" aria-expanded="true"> Creating First Page <span> 23 min </span> </a>
                                                    </li>
                                                    <li> <a href="#" aria-expanded="false"> Headings in HTML <span> 23 min </span> </a> </li>
                                                    <li> <a href="#" aria-expanded="false"> The paragraph tag <span> 23 min </span> </a> </li>
                                                    <li> <a href="#" aria-expanded="false"> Emphasis and Strong Tag <span> 23 min </span> </a>
                                                    </li>
                                                    <li> <a href="#" aria-expanded="false"> Text Formatting <span> 23 min </span> </a> </li>
                                                    <li> <a href="#" aria-expanded="false"> Working with Images <span> 23 min </span> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <!--  section 2  -->

                                        <li>
                                            <a class="uk-accordion-title" href="#"> Getting Started with HTML5 </a>
                                            <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                <!-- vidlist -->
                                                <ul class="vidlist-3">
                                                    <li> <a href="#"> What Is HTML? <span> 2 min
                                                            </span>
                                                        </a> </li>
                                                    <li> <a href="#"> Introduction to HTML5 <span> 3
                                                                min
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li> <a href="#"> Getting the Browser <span> 5
                                                                min
                                                            </span> </a>
                                                    </li>
                                                    <li> <a href="#"> Setting Up the Editor <span> 2
                                                                min
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <!--  section 3  -->

                                        <li>
                                            <a class="uk-accordion-title" href="#"> Some Special Tags </a>
                                            <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                <!-- vidlist -->
                                                <ul class="vidlist-3">
                                                    <li> <a href="#"> Inserting Images <span> 23 min
                                                            </span> </a> </li>
                                                    <li> <a href="#"> Constructing Lists <span> 23
                                                                min </span> </a>
                                                    </li>
                                                    <li> <a href="#"> Horizontal Rule Tag <span> 23
                                                                min </span> </a>
                                                    </li>
                                                    <li> <a href="#"> Validation <span> 23 min
                                                            </span> </a> </li>
                                                    <li> <a href="#"> Comments Tag <span> 23 min
                                                            </span> </a> </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <!--  section 4  -->

                                        <li>
                                            <a class="uk-accordion-title" href="#"> HTML Advanced level </a>
                                            <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                <!-- vidlist -->
                                                <ul class="vidlist-3">
                                                    <li> <a href="#"> The Basics of Forms<span> 23
                                                                min </span> </a>
                                                    </li>
                                                    <li> <a href="#"> Link Targets <span> 23 min
                                                            </span> </a> </li>
                                                    <li> <a href="#"> HTML Iframes <span> 23 min
                                                            </span> </a> </li>
                                                    <li> <a href="#"> The End <span> 23 min </span>
                                                        </a> </li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>

                                </div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>


                            </li>


                            <!-- seccond tab -->

                            <li class="uk-active  " style="">

                                <img src="{{asset('templatefiles/8.png')}}" alt="">
                                <div class="p-3">

                                    <ul class="uk-list">
                                        <li> <i class="icon-feather-clock"></i> 2 Hours and 8 minutes </li>
                                        <li> <i class="icon-feather-users"></i> Eneroled 13 students </li>
                                    </ul>

                                    <br>

                                    <h6> Description</h6>
                                    <p>HTML is the building blocks of the web. It gives pages structure and applies
                                        meaning to content. Take this course to learn how it all works and create your
                                        own pages!</p>

                                </div>

                            </li>


                        </ul>


                    </div><div class="uk-sticky-placeholder" style="height: 595px; margin: 0px;"></div>

                </div>


                <!-- small device icon video sidebar -->
                <span class="btn-vidlist-3" uk-toggle="target: #wrapper; cls: is-open"></span>

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



    <!-- Essential JavaScript Libraries
	==============================================-->
    <script type="text/javascript" src="{{asset('templatefiles/shCore.js')}}"></script>
    <script type="text/javascript" src="{{asset('templatefiles/shBrushJScript.js')}}"></script>
    <script type="text/javascript" src="{{asset('templatefiles/shBrushXml.js')}}"></script>
    <script type="text/javascript">
        SyntaxHighlighter.all()
    </script>





<div id="backtotop" class=""><a href="#"></a></div></body></html>