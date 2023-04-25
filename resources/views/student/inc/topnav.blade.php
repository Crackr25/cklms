<header class="header uk-sticky" uk-sticky="top:20 ; cls-active:header-sticky" style="">

    <div class="container">
        <nav uk-navbar="" class="uk-navbar">

            <!-- left Side Content -->
            <div class="uk-navbar-left">

                <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>



                <!-- logo -->
                <a href="#" class="logo">
                    <img src="./Courseplus Learning HTML Template Light_files/logo-dark.svg" alt="">
                    <span> Courseplus</span>
                </a>

               @yield('breadcrumbs')


            </div>


            <!--  Right Side Content   -->

            <div class="uk-navbar-right">

                <div class="header-widget">
                    <!-- User icons close mobile-->
                    <span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"> </span>


                    {{-- <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: My Courses ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-youtube-alt"></i>
                    </a> --}}

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
                                            <img src="./Courseplus Learning HTML Template Light_files/1.png" alt=""> </span>
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
                                            <img src="./Courseplus Learning HTML Template Light_files/3.png" alt=""> </span>
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
                                            <img src="./Courseplus Learning HTML Template Light_files/2.png" alt=""> </span>
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
                                            <img src="./Courseplus Learning HTML Template Light_files/1.png" alt=""> </span>
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

                    {{-- <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-bell"></i>
                        <span>4</span>
                    </a> --}}

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

                    {{-- <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-envelope-alt"></i>
                        <span>1</span>
                    </a> --}}

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
                                            <img src="./Courseplus Learning HTML Template Light_files/avatar-2.jpg" alt="">
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
                                            <img src="./Courseplus Learning HTML Template Light_files/avatar-3.jpg" alt="">
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
                                            <img src="./Courseplus Learning HTML Template Light_files/avatar-1.jpg" alt="">
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
                                            <img src="./Courseplus Learning HTML Template Light_files/avatar-4.jpg" alt="">
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
                            <a href="h#"> sell all <i class="icon-line-awesome-long-arrow-right"></i> </a>
                        </div>
                    </div>


                    <!-- profile-icon-->

                    <a href="#" class="header-widget-icon profile-icon" aria-expanded="false">
                        <i class="icon-material-outline-account-circle"></i>
                    </a>

                    <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown">

                        <!-- User Name / Avatar -->
                        <a href="#">

                            <div class="dropdown-user-details">
                                {{-- <div class="dropdown-user-avatar">
                                    <img src="./Courseplus Learning HTML Template Light_files/avatar-2.jpg" alt="">
                                </div> --}}
                                <div class="dropdown-user-name">
                                    {{auth()->user()->name}} <span>Student</span>
                                </div>
                            </div>

                        </a>

                        <!-- User menu -->

                        <ul class="dropdown-user-menu">
                            <li>
                                <a href="/messages">
                                    <i class="icon-feather-message-square"></i>Chat</a>
                            </li>
                            {{-- <li><a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#">
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
                            </li> --}}
                            <li>
                                <a href="#" id="logout">
                                    <i class="icon-feather-log-out"></i>Log Out</a>
                                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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

</header>
<div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>

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
                    <p class="search-help">Type the code of the classroom you are looking for</p>
                </div>
            </div>
        </div>
    </div>
</div>

