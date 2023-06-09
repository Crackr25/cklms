<!DOCTYPE html>
<!-- saved from url=(0062)http://demo.foxthemes.net/courseplusv3.3/admin/add-course.html -->
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
                            <li><a href="#"> Course </a></li>
                            <li>Create New Course</li>
                        </ul>
                    </nav>
                </div>



                <div class="card">
                    <div class="card-header border-bottom-0 py-4">
                        <h5> Course Manager </h5>
                    </div>


                    <ul class="uk-child-width-expand uk-tab" uk-switcher="connect: #course-edit-tab ; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                        <li class="uk-active"><a href="#" aria-expanded="true"> Basic</a></li>
                        <li><a href="#" aria-expanded="false"> Curriculum</a></li>
                        <li><a href="#" aria-expanded="false">Meta data</a></li>
                        <li><a href="#" aria-expanded="false">Requirements</a></li>
                        <li><a href="#" aria-expanded="false">Pricing</a></li>
                        <li><a href="#" aria-expanded="false">Finish</a></li>
                    </ul>

                    <div class="card-body">

                        <ul class="uk-switcher uk-margin" id="course-edit-tab" style="touch-action: pan-y pinch-zoom;">

                            <li class="uk-active">

                                <div class="row">
                                    <div class="col-xl-9 m-auto">


                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="course_title">Course title<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="course_title" name="title" placeholder="Enter course title" value="Learn CSS Fundamentals ..." required="">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="short_description">Short
                                                description</label>
                                            <div class="col-md-9">
                                                <textarea name="short_description" id="short_description" class="form-control">CSS is what makes the web beautiful. It describes how HTML should be displayed and how to layout elements. Take this class and get familiar with CSS!.</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="course_title"> Category <span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button" title="Mobile App"><span class="filter-option pull-left"><i class="glyphicon uil-android-alt"></i>  Mobile App </span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="glyphicon uil-android-alt"></span> <span class="text"> Mobile App </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="glyphicon uil-bag-alt"></span> <span class="text">Business</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="glyphicon uil-palette"></span> <span class="text">Desings</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="glyphicon uil-camera"></span> <span class="text">Photography</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="glyphicon uil-medkit"></span> <span class="text">Health Fitness</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker" tabindex="-98">
                                                    <option data-icon="uil-android-alt" selected=""> Mobile App </option>
                                                    <option data-icon="uil-bag-alt">Business</option>
                                                    <option data-icon="uil-palette">Desings</option>
                                                    <option data-icon="uil-camera">Photography</option>
                                                    <option data-icon="uil-medkit">Health Fitness</option>
                                                </select></div>
                                                
                                            </div>
                                        </div>



                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="course_title"> Language <span class="required">*</span></label>
                                            <div class="col-md-9">

                                                <div class="btn-group bootstrap-select"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="Beginner"><span class="filter-option pull-left"> Beginner </span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text"> Beginner </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text"> Intermediate </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text"> Advanced</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker" tabindex="-98">
                                                    <option value=""> Beginner </option>
                                                    <option value="1"> Intermediate </option>
                                                    <option value="2"> Advanced</option>
                                                </select></div>

                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </li>

                            <li>


                                <div class="row">
                                    <div class="col-xl-10 m-auto">
                                        <ul class="c-curriculum uk-accordion" uk-accordion="">
                                            <li class="uk-open">
                                                <a class="uk-accordion-title" href="#"> <i class="uil-folder">
                                                    </i>Section titile 1</a>
                                                <div class="action-btn">
                                                    <a href="#"> <i class="uil-plus">  </i> Add Lacture </a>
                                                    <a href="#"> <i class="uil-plus">  </i> Add link </a>
                                                    <a href="#"> <i class="uil-plus">  </i>  Add quiz </a>
                                                </div>
                                                <div class="uk-accordion-content" aria-hidden="false">
                                                    <ul class="sec-list uk-sortable" uk-sortable="handle: .uk-sortable-handle">
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                         
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#"> <i class="uil-folder">
                                                    </i>Section titile 2</a>
                                                <div class="action-btn">
                                                    <a href="#"> <i class="uil-plus">  </i> Add Lacture </a>
                                                    <a href="#"> <i class="uil-plus">  </i> Add link </a>
                                                    <a href="#"> <i class="uil-plus">  </i>  Add quiz </a>
                                                </div>
                                                <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                    <ul class="sec-list uk-sortable" uk-sortable="handle: .uk-sortable-handle">
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                         
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#"> <i class="uil-folder">
                                                    </i>Section titile 3 </a>
                                                <div class="action-btn">
                                                    <a href="#"> <i class="uil-plus">  </i> Add Lacture </a>
                                                    <a href="#"> <i class="uil-plus">  </i> Add link </a>
                                                    <a href="#"> <i class="uil-plus">  </i>  Add quiz </a>
                                                </div>
                                                <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                    <ul class="sec-list uk-sortable" uk-sortable="handle: .uk-sortable-handle">
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                         
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#"> <i class="uil-folder">
                                                    </i>Section titile 4</a>
                                                <div class="action-btn">
                                                    <a href="#"> <i class="uil-plus">  </i> Add Lacture </a>
                                                    <a href="#"> <i class="uil-plus">  </i> Add link </a>
                                                    <a href="#"> <i class="uil-plus">  </i>  Add quiz </a>
                                                </div>
                                                <div class="uk-accordion-content" hidden="" aria-hidden="true">
                                                    <ul class="sec-list uk-sortable" uk-sortable="handle: .uk-sortable-handle">
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="sec-list-item">
                                                                <div> <i class="uil-list-ul uk-sortable-handle" style="touch-action: none; user-select: none;"></i>
                                                                    <label class="mb-0 mx-2">
                                                                        <input class="uk-checkbox" type="checkbox"> 
                                                                    </label>
                                                                    <p> Course Simple Content   </p>
                                                                </div>
                                                                <div>
                                                                    <div class="btn-act"> <a href="#">
                                                                        <i class="uil-cloud-download"></i></a> 
                                                                        <a href="#"><i class="uil-eye"></i></a> 
                                                                        <a href="#"><i class="icon-feather-x"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                         
                                                    </ul>
                                                </div>
                                            </li>
                                            
                                             
                                        </ul>


                                    </div>
                                </div>






                            </li>

                            <li>

                                <div class="row justify-content-center">
                                    <div class="col-xl-9">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="website_keywords">Meta
                                                keywords</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control bootstrap-tag-input" id="meta_keywords" name="meta_keywords" data-role="tagsinput" style="width: 100%; display: none;">
                                                <div class="bootstrap-tagsinput"><input size="1" type="text" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-xl-9">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="meta_description">Meta
                                                description</label>
                                            <div class="col-md-9">
                                                <textarea name="meta_description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>


                            </li>

                            <li>


                                <script type="text/JavaScript">
                                    function createNewElement() {
                            // First create a DIV element.
                            var txtNewInputBox = document.createElement('div');
                        
                            // Then add the content (a new input box) of the element.
                            txtNewInputBox.innerHTML = "<input type='text' class='uk-input'>";
                        
                            // Finally put it where it is supposed to appear.
                            document.getElementById("newElementId").appendChild(txtNewInputBox);
                        }
                        </script>

                                <div class="row justify-content-center">
                                    <div class="col-xl-9">

                                        <button class="btn btn-default mb-3" onclick="createNewElement();"> <i class="uil-plus"></i> Requirements </button>

                                        <div id="newElementId"> </div>

                                        <input type="text" class="uk-input" placeholder="Any computer will work: Windows, macOS or Linux">
                                        <input type="text" class="uk-input" placeholder="Basic programming HTML and CSS.">
                                        <input type="text" class="uk-input" placeholder="Basic/Minimal understanding of JavaScript">
                                    </div>
                                </div>
                            </li>

                            <li>

                                <div class="row justify-content-center">

                                    <div class="col-xl-9">

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label">Course price ($)</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" placeholder="Enter  price">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-9">

                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label">Discounted
                                                price ($)</label>
                                            <div class="col-md-9">
                                                <input class="form-control">
                                                <small class="text-muted">This course has <span class="text-danger">10%</span> </small>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </li>

                            <li>

                                <div class="row">
                                    <div class="col-12 my-lg-5">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                            <h3 class="mt-0">Thank you !</h3>

                                            <p class="w-75 mb-2 mx-auto"> Submit This Course For Reweiw  </p>

                                            <div class="mb-3 mt-3">
                                                <button type="button" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>


                            </li>

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





</div><div id="backtotop"><a href="#"></a></div></body></html>