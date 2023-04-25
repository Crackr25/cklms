<!DOCTYPE html>
<!-- saved from url=(0058)http://demo.foxthemes.net/courseplusv3.3/default/book.html -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">


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
                        <a href="#" class="logo">
                            <img src="{{asset('templatefiles/logo-dark.svg')}}" alt="">
                            <span> Courseplus</span>
                        </a>

                        <!-- breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#"> Dashboard </a></li>
                                <li> Books </li>
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

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 808px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 122px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>
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

                                </div></div></div><div class="simplebar-placeholder" style="width: 338px; height: 454px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 218px; transform: translate3d(0px, 0px, 0px); visibility: visible;"></div></div></div>


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

        </header><div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>

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
                        </div></div></div><div class="simplebar-placeholder" style="width: 230px; height: 913px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></ul></div>
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
        <div class="page-content">


            <div class="container">


                <h1> Books </h1>


                <div class="mt-lg-5 uk-grid" uk-grid="">

                    <div class="uk-width-3-4@m uk-first-column">

                        <h4> Featured books </h4>

                        <div class="uk-position-relative uk-slider uk-slider-container" tabindex="-1" uk-slider="autoplay: true">

                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(-216.188px, 0px, 0px);">
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

                    <div class="uk-width-1-4@m">
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
                    </div>

                </div>

                <h3> Category</h3>

                <nav class="responsive-tab style-1 ">
                    <ul>
                        <li class="uk-active"><a href="#">JavaScript</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">Coding</a></li>
                    </ul>
                </nav>

                <div class="section-small">

                    <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid="">
                        <div class="uk-first-column">
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/html5.jpg')}}" class="mb-2 w-100 shadow rounded">
                                HTML5 Brick Breaker
                            </a>
                        </div>
                        <div>
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/css3.jpg')}}" class="mb-2 w-100 shadow rounded">
                                CSS3 Web Development
                            </a>
                        </div>
                        <div>
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/vue-2-basics-.jpg')}}" class="mb-2 w-100 shadow rounded">
                                Vue.js 2 Basics
                            </a>
                        </div>
                        <div>
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/php.jpg')}}" class="mb-2 w-100 shadow rounded">
                                PHP for Beginners
                            </a>
                        </div>
                        <div>
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/win8.jpg')}}" class="mb-2 w-100 shadow rounded">
                                WIN8 App Development
                            </a>
                        </div>
                        <div class="uk-grid-margin uk-first-column">
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/win8.jpg')}}" class="mb-2 w-100 shadow rounded">
                                WIN8 App Development
                            </a>
                        </div>
                        <div class="uk-grid-margin">
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/vue-2-basics-.jpg')}}" class="mb-2 w-100 shadow rounded">
                                Vue.js 2 Basics
                            </a>
                        </div>
                        <div class="uk-grid-margin">
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/php.jpg')}}" class="mb-2 w-100 shadow rounded">
                                PHP for Beginners
                            </a>
                        </div>
                        <div class="uk-grid-margin">
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/html5.jpg')}}" class="mb-2 w-100 shadow rounded">
                                HTML5 Brick Breaker
                            </a>
                        </div>
                        <div class="uk-grid-margin">
                            <a href="#" class="uk-text-bold">
                                <img src="{{asset('templatefiles/css3.jpg')}}" class="mb-2 w-100 shadow rounded">
                                CSS3 Web Development
                            </a>
                        </div>
                    </div>

                </div>


                <!-- pagination-->
                <ul class="uk-pagination uk-flex-center uk-margin-medium">
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
                </ul>


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




<div id="backtotop" class=""><a href="#"></a></div></body></html>