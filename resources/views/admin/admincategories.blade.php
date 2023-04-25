<!DOCTYPE html>
<!-- saved from url=(0062)# -->
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

<body>

    <div id="wrapper" class="admin-panel">

        <!-- menu -->
        <div class="page-menu">
            <!-- btn close on small devices -->
            <span class="btn-menu-close" uk-toggle="target: #wrapper ; cls: mobile-active"></span>
            <!-- traiger btn -->
            <span class="btn-menu-trigger" uk-toggle="target: .page-menu ; cls: menu-large"></span>

            <!-- logo -->
            <div class="logo uk-visible@s">
                <a href="#"> <i class=" uil-graduation-hat"></i> <span> Courseplus</span> </a>
            </div>
            <div class="page-menu-inner" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content" style="padding: 0px; height: 100%; overflow: hidden;">
                <ul class="mt-0">
                    <li><a href="#"><i class="uil-home-alt"></i> <span> Dashboard</span></a> </li>
                    <li><a href="#"><i class="uil-youtube-alt"></i> <span> Courses</span></a> </li>
                    <li><a href="#"><i class="uil-envelope-alt"></i> <span> Message</span></a> </li>
                    <li><a href="#"><i class="uil-users-alt"></i> <span> students</span></a> </li>
                    <li><a href="#"><i class="uil-graduation-hat"></i> <span> Instructers</span></a>
                    </li>
                    <li><a href="#"><i class="uil-tag-alt"></i> <span> Catagories</span></a> </li>
                    <li><a href="#"><i class="uil-file-alt"></i> <span> Blogs</span></a> </li>
                    <li><a href="#"><i class="uil-layers"></i> <span> Pages</span></a> </li>
                    <li><a href="#"><i class="uil-chart-line"></i> <span> Report</span></a> </li>
                    <li><a href="#"><i class="uil-question-circle"></i> <span> Help</span></a> </li>
                </ul>

                <ul data-submenu-title="Setting">
                    <li><a href="#"><i class="uil-cog"></i> <span> General </span></a> </li>
                    <li><a href="#"><i class="uil-edit-alt"></i> <span> Site </span></a> </li>
                    <li class="#"><a href="#"><i class="uil-layers"></i> <span> simple link
                            </span></a>
                        <ul>
                            <li><a href="#"> simple link <span class="nav-tag">3</span></a>
                            </li>
                            <li><a href="#"> simple link </a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="uil-sign-out-alt"></i> <span> Sign-out</span></a> </li>
                </ul>

            </div></div></div><div class="simplebar-placeholder" style="width: 250px; height: 794px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); visibility: hidden;"></div></div></div>
        </div>

        <!-- Header Container
        ================================================== -->
        <header class="header uk-light">

            <div class="container">
                <nav uk-navbar="" class="uk-navbar">

                    <!-- left Side Content -->
                    <div class="uk-navbar-left">

                        <!-- menu icon -->
                        <span class="mmenu-trigger" uk-toggle="target: #wrapper ; cls: mobile-active">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </span>


                        <!-- logo -->
                        <a href="#" class="logo">
                            <img src="{{asset('templatefiles/logo-dark.svg')}}" alt="">
                            <span> Courseplus</span>
                        </a>

                        <div class="searchbox uk-visible@s" aria-expanded="false">

                            <input class="uk-search-input" type="search" placeholder="Search...">
                            <button class="btn-searchbox"> </button>

                        </div>
                        <!-- Search box dropdown -->
                        <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small" class="dropdown-search uk-dropdown">
                            <div class="erh BR9 MIw" style="top: -26px;position: absolute ; left: 24px;fill: currentColor;height: 24px;pointer-events: none;color: #f5f5f5;">
                                <svg width="22" height="22">
                                    <path d="M0 24 L12 12 L24 24"></path>
                                </svg></div>
                            <!-- User menu -->

                            <ul class="dropdown-search-list">
                                <li class="list-title">
                                    Recent Searches
                                </li>
                                <li>
                                    <a href="#">
                                        Ultimate Web Designer And Developer Course</a>
                                </li>
                                <li><a href="#">
                                        The Complete Ruby on Rails Developer Course </a>
                                </li>
                                <li><a href="#">
                                        Bootstrap 4 From Scratch With 5 Real Projects </a>
                                </li>
                                <li> <a href="#">
                                        The Complete 2020 Web Development Bootcamp </a>
                                </li>
                                <li class="menu-divider">
                                </li><li><a href="#">
                                        Bootstrap 4 From Scratch With 5 Real Projects </a>
                                </li>
                                <li> <a href="#">
                                        The Complete 2020 Web Development Bootcamp </a>
                                </li>
                            </ul>

                        </div>
                    </div>


                    <!--  Right Side Content   -->

                    <div class="uk-navbar-right">



                        <div class="header-widget">

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

                            <div class="dropdown-user-details" aria-expanded="false">
                                <div class="dropdown-user-avatar">
                                    <img src="{{asset('templatefiles/avatar-2.jpg')}}" alt="">
                                </div>
                                <div class="dropdown-user-name">
                                    Richard Ali <span>Adminstrator</span>
                                </div>
                            </div>


                            <div uk-dropdown="pos: top-right ;mode:click" class="dropdown-notifications small uk-dropdown">

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
                                    <ul class="menu-divider">
                                        <li><a href="#">
                                                <i class="icon-feather-help-circle"></i> Help</a>
                                        </li>
                                        <li><a href="#">
                                                <i class="icon-feather-log-out"></i> Sing Out</a>
                                        </li>
                                    </ul>


                            </ul></div>


                        </div>



                        <!-- icon search-->
                        <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#">
                            <i class="uil-search icon-small"></i>
                        </a>
                        <!-- User icons -->
                        <span class="uil-user icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active">
                            

                    </span></div>
                    <!-- End Right Side Content / End -->


                </nav>

            </div>
            <!-- container  / End -->

        </header>

        <!-- content -->
        <div class="page-content">
            <div class="page-content-inner">

                <div class="d-flex">
                    <nav id="breadcrumbs" class="mb-3">
                        <ul>
                            <li><a href="#"> <i class="uil-home-alt"></i> </a></li>
                            <li><a href="#"> Categories </a></li>
                            <li> Web Development</li>
                        </ul>
                    </nav>
                </div>



                <div uk-grid="" class="uk-grid">
                    <div class="uk-width-1-3@m uk-first-column">

                        <nav class="responsive-tab style-3 setting-menu card uk-sticky" uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top" style="">
                            <h5 class="mb-0 p-3 uk-visible@m"> Catagries </h5>
                            <hr class="m-0 uk-visible@m">
                            <ul>
                                <li class="uk-active">
                                    <a href="#"> <i class="uil-brush-alt "></i> Web Development 
                                        <span class="badge badge-light ml-2 badge-sm"> 21</span> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-android-alt"></i> Mobile App <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-bag-alt"></i> Business 
                                        <span class="badge badge-light ml-2 badge-sm">8</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-window"></i> IT Software
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-palette"></i> Desings 
                                        <span class="badge badge-light ml-2 badge-sm"> 14</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-megaphone"></i> Marketing 
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-life-ring"></i> Life Style 
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class=" uil-camera"></i> Photography 
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-medkit"></i> Health Fitness
                                         <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-music"></i> Music <span class="badge badge-light ml-2 badge-sm"> 12</span> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-shopping-cart-alt"></i> Ecommerce 
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-utensils-alt "></i> Food cooking 
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                                <li>
                                    <a href="#"> <i class="uil-lightbulb-alt"></i> Teaching academy 
                                        <span class="badge badge-light ml-2 badge-sm"> 12</span></a>
                                </li>
                            </ul>
                        </nav><div class="uk-sticky-placeholder" style="height: 734px; margin: 0px 0px 20px;" hidden=""></div>

                    </div>

                    <div class="uk-width-2-3@m">

                        <div class="card rounded">
                            <div class="p-3 d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"> Web Development </h5> <span> 16 Courses </span>
                            </div>
                            <hr class="m-0">

                            <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m uk-first-column">
                                    <img src="{{asset('templatefiles/2.png')}}" class="  rounded" alt="">
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class="mb-2"> Learn Anglular Fonduments </h5>
                                    <p class="uk-text-small mb-2"> Created by <a href="#"> Jonathan Madano </a>
                                    </p>
                                    <p class="mb-0 uk-text-small mt-3">
                                        <span class="mr-3 bg-light p-2 mt-1"> 16 Enerolled</span><span> Last updated
                                            10/2019 </span>
                                    </p>
                                </div>
                            </div>

                            <hr class="m-0">

                            <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m uk-first-column">
                                    <img src="{{asset('templatefiles/5.png')}}" class="  rounded" alt="">
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class="mb-2"> Ultimate Web Developer Course </h5>
                                    <p class="uk-text-small mb-2"> Created by <a href="#"> Jonathan Madano </a>
                                    </p>
                                    <p class="mb-0 uk-text-small mt-3">
                                        <span class="mr-3 bg-light p-2 mt-1"> 16 Enerolled</span><span> Last updated
                                            10/2019 </span>
                                    </p>
                                </div>
                            </div>

                            <hr class="m-0">

                            <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m uk-first-column">
                                    <img src="{{asset('templatefiles/1.png')}}" class="  rounded" alt="">
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class="mb-2"> Ultimate Web Developer Course </h5>
                                    <p class="uk-text-small mb-2"> Created by <a href="#"> Jonathan Madano </a>
                                    </p>
                                    <p class="mb-0 uk-text-small mt-3">
                                        <span class="mr-3 bg-light p-2 mt-1"> 16 Enerolled</span><span> Last updated
                                            10/2019 </span>
                                    </p>
                                </div>
                            </div>

                            <hr class="m-0">

                            <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m uk-first-column">
                                    <img src="{{asset('templatefiles/2.png')}}" class="  rounded" alt="">
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class="mb-2"> Learn Anglular Fonduments </h5>
                                    <p class="uk-text-small mb-2"> Created by <a href="#"> Jonathan Madano </a>
                                    </p>
                                    <p class="mb-0 uk-text-small mt-3">
                                        <span class="mr-3 bg-light p-2 mt-1"> 16 Enerolled</span><span> Last updated
                                            10/2019 </span>
                                    </p>
                                </div>
                            </div>

                            <hr class="m-0">

                            <div class="uk-grid-small p-4 uk-grid" uk-grid="">
                                <div class="uk-width-1-3@m uk-first-column">
                                    <img src="{{asset('templatefiles/3.png')}}" class="  rounded" alt="">
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class="mb-2"> The Complete JavaScript </h5>
                                    <p class="uk-text-small mb-2"> Created by <a href="#"> Jonathan Madano </a>
                                    </p>
                                    <p class="mb-0 uk-text-small mt-3">
                                        <span class="mr-3 bg-light p-2 mt-1"> 16 Enerolled</span><span> Last updated
                                            10/2019 </span>
                                    </p>
                                </div>
                            </div>

                        </div>



                        <ul class="uk-pagination mt-5 uk-flex-center" uk-margin="">
                            <li class="uk-active uk-first-column"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="uk-disabled"><span>...</span></li>
                            <li><a href="#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-next"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"></polyline></svg></span></a></li>
                        </ul>



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





</div><div id="backtotop" class=""><a href="#"></a></div></body></html>