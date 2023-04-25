<!DOCTYPE html>
<!-- saved from url=(0067)http://demo.foxthemes.net/courseplusv3.3/default/course-resume.html -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="http://demo.foxthemes.net/courseplusv3.3/assets/images/favicon.png')}}" rel="icon" type="image/png')}}">

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
        <header class="header header-transparent uk-sticky header-sticky uk-sticky-fixed uk-sticky-below" uk-sticky="top:20 ; cls-active:header-sticky ; cls-inactive: uk-light" style="position: fixed; top: 0px; width: 1263px;">

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
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

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

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 716px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 138px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
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
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

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

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 412px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 240px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>


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
                                <div class="dropdown-notifications-content" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden scroll;">

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

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 463px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 214px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
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

        </header><div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;"></div>

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


        <!-- content -->
        <div class="page-content pt-lg-5">


            <div class="course-resume-wrapper topic-1">
                <div class="container">

                    <div class="uk-grid-large uk-light mt-lg-3 uk-grid" uk-grid="">

                        <div class="uk-width-1-2@m uk-first-column">
                            <div class="course-thumbnail m-lg-4 p-lg-3">
                                <img src="{{asset('templatefiles/1.png')}}" alt="">
                                <a class="play-button-trigger show" href="#trailer-modal" uk-toggle=""> </a>
                            </div>

                            <!-- video demo model -->
                            <div id="trailer-modal" uk-modal="" class="uk-modal">
                                <div class="uk-modal-dialog">
                                    <button class="uk-modal-close-default mt-2 mr-1 uk-icon uk-close" type="button" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></button>
                                    <div class="uk-modal-header">
                                        <h4> Trailer video </h4>
                                    </div>
                                    <div class="video-responsive">
                                        <iframe src="{{asset('templatefiles/nOCXXHGMezU.html')}}" class="uk-padding-remove uk-responsive-width" uk-video="automute: true" frameborder="0" allowfullscreen="" uk-responsive=""></iframe>
                                    </div>

                                    <div class="uk-modal-body">
                                        <h3>Build Responsive Websites </h3>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu
                                            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                            in
                                            culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="uk-width-1-2@m course-details">
                            <h2> Learn JavaScript From Scratch</h2>
                            <p> Master JavaScript with the most complete course! Projects Excellent course. we explain
                                the
                                core concepts in javascript that are usually glossed over in other courses.
                            </p>

                            <div class="course-details-info mt-5">
                                <ul>
                                    <li>
                                        <div class="star-rating"><span class="avg"> 4.9 </span> <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                                        </div>
                                    </li>
                                    <li> <i class="icon-feather-users"></i> 1200 Enerolled </li>
                                </ul>
                            </div>
                            <div class="course-details-info">

                                <ul>
                                    <li> Created by <a href="#"> Jonathan Madano </a> </li>
                                    <li> Last updated 10/2019</li>
                                    <li> English </li>
                                </ul>

                            </div>

                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <div class=" uk-visible@m">
                                    <a hred="#" uk-tooltip="title: Add to your Bookmarks ; pos: top" title="" aria-expanded="false">
                                        <i class="icon-feather-bookmark icon-small"></i> </a>
                                    <a hred="#" uk-tooltip="title: Add to wishlist ; pos: top" title="" aria-expanded="false">
                                        <i class="icon-feather-heart icon-small ml-3 text-danger"></i> </a>
                                </div>
                                <a href="#" class="btn-course-start-2 my-lg-4 mt-3"> Start Learning
                                    <i class="icon-feather-chevron-right"></i> </a>
                            </div>


                        </div>

                    </div>

                    <div class="subnav">

                        <ul class="uk-child-width-expand mb-0 uk-tab" uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium" uk-tab="">
                            <li class=""><a href="#" aria-expanded="false"> <i class="uil-file-alt"></i>
                                    <span> Description</span> </a>
                            </li>
                            <li><a href="#" aria-expanded="false"> <i class="uil-film"></i>
                                    <span> Curriculum</span></a>
                            </li>
                            <li class="uk-active"><a href="#" aria-expanded="true"> <i class="uil-comment-lines"></i>
                                    <span> FAQ</span></a>
                            </li>
                            <li class=""><a href="#" aria-expanded="false"> <i class="uil-envelope-info"></i>
                                    <span> Announcement</span></a>
                            </li>
                            <li><a href="#" aria-expanded="false"> <i class="uil-star"></i>
                                    <span> Reviews</span></a>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="container">

                <div class="uk-grid-large mt-4 uk-grid" uk-grid="">
                    <div class="uk-width-2-3@m uk-first-column">
                        <ul id="course-intro-tab" class="uk-switcher" style="touch-action: pan-y pinch-zoom;">

                            <!-- course description -->
                            <li class="course-description-content" style="">

                                <h4> Description </h4>
                                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                    minim laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                                    quis
                                    nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea
                                    commodo
                                    consequat</p>
                                <p> consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet
                                    dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
                                    exerci</p>


                                <h4> What you’ll learn </h4>
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
                                        ea commodo consequat.</p>


                            </li>

                            <!-- course Curriculum-->
                            <li>
                                <h4> Course Curriculum </h4>

                                <ul class="course-curriculum uk-accordion" uk-accordion="multiple: true">

                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#"> Html Introduction <span class="duration">
                                                02:42 </span> </a>
                                        <div class="uk-accordion-content" aria-hidden="false">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                <li> What is HTML <span> 23 min </span>
                                                </li><li> What is a Web page? <span> 23 min </span> </li>
                                                <li> Your First Web Page <a href="#trailer-modal" uk-toggle=""> Preview
                                                    </a> <span> 23 min </span>
                                                </li>
                                                <li> Brain Streak <span> 23 min </span> </li>
                                            </ul>

                                        </div>
                                    </li>

                                    <li>
                                        <a class="uk-accordion-title" href="#"> Your First webpage <span class="duration">
                                                02:12 </span> </a>
                                        <div class="uk-accordion-content" hidden="" aria-hidden="true">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                <li> Headings <span> 23 min </span>
                                                </li><li> Paragraphs <span> 23 min </span> </li>
                                                <li> Emphasis and Strong Tag <a href="#trailer-modal" uk-toggle="">
                                                        Preview
                                                    </a> <span> 23 min
                                                    </span>
                                                </li>
                                                <li> Brain Streak <span> 23 min </span> </li>
                                                <li> Live Preview Feature <span> 23 min </span> </li>
                                            </ul>

                                        </div>
                                    </li>

                                    <li>
                                        <a class="uk-accordion-title" href="#"> Some Special Tags <span class="duration">
                                                02:12 </span> </a>
                                        <div class="uk-accordion-content" hidden="" aria-hidden="true">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                <li> The paragraph tag <span> 23 min </span> </li>
                                                <li> The break tag <a href="#trailer-modal" uk-toggle=""> Preview </a>
                                                    <span> 23 min </span> </li>
                                                <li> Headings in HTML <span> 23 min </span> </li>
                                                <li> Bold, Italics Underline <span> 23 min </span>
                                                </li>
                                            </ul>

                                        </div>
                                    </li>

                                    <li>
                                        <a class="uk-accordion-title" href="#"> HTML Advanced level <span class="duration">
                                                02:12 </span> </a>
                                        <div class="uk-accordion-content" hidden="" aria-hidden="true">

                                            <!-- course-video-list -->
                                            <ul class="course-curriculum-list">
                                                <li> Something to Ponder<span> 23 min </span> </li>
                                                <li> Tables <span> 23 min </span> </li>
                                                <li> HTML Entities <a href="#trailer-modal" uk-toggle=""> Preview
                                                    </a><span> 23 min </span> </li>
                                                <li> HTML Iframes <span> 23 min </span> </li>
                                                <li> Some important things <span> 23 min </span> </li>
                                            </ul>

                                        </div>
                                    </li>

                                </ul>

                            </li>

                            <!-- course Faq-->
                            <li class="uk-active  " style="">

                                <h4 class="my-4"> Course Faq</h4>

                                <ul class="course-faq uk-accordion" uk-accordion="">

                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#"> Html Introduction </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <p> The primary goal of this quick start guide is to introduce you to
                                                Unreal
                                                Engine 4`s (UE4) development environment. By the end of this guide,
                                                you`ll
                                                know how to set up and develop C++ Projects in UE4. This guide shows
                                                you
                                                how
                                                to create a new Unreal Engine project, add a new C++ class to it,
                                                compile
                                                the project, and add an instance of a new class to your level. By
                                                the
                                                time
                                                you reach the end of this guide, you`ll be able to see your
                                                programmed
                                                Actor
                                                floating above a table in the level. </p>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="uk-accordion-title" href="#"> Your First webpage</a>
                                        <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                            <p> The primary goal of this quick start guide is to introduce you to
                                                Unreal
                                                Engine 4`s (UE4) development environment. By the end of this guide,
                                                you`ll
                                                know how to set up and develop C++ Projects in UE4. This guide shows
                                                you
                                                how
                                                to create a new Unreal Engine project, add a new C++ class to it,
                                                compile
                                                the project, and add an instance of a new class to your level. By
                                                the
                                                time
                                                you reach the end of this guide, you`ll be able to see your
                                                programmed
                                                Actor
                                                floating above a table in the level. </p>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="uk-accordion-title" href="#"> Some Special Tags </a>
                                        <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                            <p> The primary goal of this quick start guide is to introduce you to
                                                Unreal
                                                Engine 4`s (UE4) development environment. By the end of this guide,
                                                you`ll
                                                know how to set up and develop C++ Projects in UE4. This guide shows
                                                you
                                                how
                                                to create a new Unreal Engine project, add a new C++ class to it,
                                                compile
                                                the project, and add an instance of a new class to your level. By
                                                the
                                                time
                                                you reach the end of this guide, you`ll be able to see your
                                                programmed
                                                Actor
                                                floating above a table in the level. </p>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="uk-accordion-title" href="#"> Html Introduction </a>
                                        <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                            <p> The primary goal of this quick start guide is to introduce you to
                                                Unreal
                                                Engine 4`s (UE4) development environment. By the end of this guide,
                                                you`ll
                                                know how to set up and develop C++ Projects in UE4. This guide shows
                                                you
                                                how
                                                to create a new Unreal Engine project, add a new C++ class to it,
                                                compile
                                                the project, and add an instance of a new class to your level. By
                                                the
                                                time
                                                you reach the end of this guide, you`ll be able to see your
                                                programmed
                                                Actor
                                                floating above a table in the level. </p>
                                        </div>
                                    </li>

                                </ul>

                            </li>

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
                                        congue imperdiet doming id quod mazim placerat facer possim assum.</p>

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
                            <li>

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
                                            <div class="avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
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
                                            <div class="avatar"><img src="{{asset('templatefiles/avatar-3.jpg')}}" alt="">
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
                                            <div class="avatar"><img src="{{asset('templatefiles/avatar-3.jpg')}}" alt="">
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
                                            <div class="avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
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

                                <div class="comments">
                                    <h3>Submit Review </h3>
                                    <ul>
                                        <li>
                                            <div class="avatar"><img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                            </div>
                                            <div class="comment-content">
                                                <form class="uk-grid-small uk-grid" uk-grid="">
                                                    <div class="uk-width-1-2@s">
                                                        <label class="uk-form-label">Name</label>
                                                        <input class="uk-input" type="text" placeholder="Name">
                                                    </div>
                                                    <div class="uk-width-1-2@s">
                                                        <label class="uk-form-label">Email</label>
                                                        <input class="uk-input" type="text" placeholder="Email">
                                                    </div>
                                                    <div class="uk-width-1-1@s">
                                                        <label class="uk-form-label">Comment</label>
                                                        <textarea class="uk-textarea" placeholder="Enter Your Comments her..." style=" height:160px"></textarea>
                                                    </div>
                                                    <div class="uk-grid-margin">
                                                        <input type="submit" value="submit" class="button grey">
                                                    </div>
                                                </form>

                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </li>

                        </ul>
                    </div>


                    <!-- sidebar -->
                    <div class="uk-width-1-3@m">

                        <h4 class="mt-lg-4"> Related Courses</h4>
                        <div class="uk-child-width-1-1 uk-grid uk-grid-stack" uk-grid="">
                            <div class="uk-first-column">
                                <a href="#">
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
                                            <p> Learn how to build and launch React web applications using React </p>
                                            <div class="course-card-footer">
                                                <h5> <i class="icon-feather-film"></i> 14 Lectures </h5>
                                                <h5> <i class="icon-feather-clock"></i> 55 Hours </h5>
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>
                            <div class="uk-grid-margin uk-first-column">
                                <a href="#">
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
                            <div class="uk-grid-margin uk-first-column">
                                <a href="#">
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
                                            <p> HTML is the building blocks of the web. It gives pages structure and ..
                                            </p>

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

                    {{-- <!-- footer
               ================================================== -->
                    <div class="footer uk-grid-margin uk-first-column">
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




</div></div><div id="backtotop" class="visible uk-animation-slide-bottom"><a href="#"></a></div></body></html>