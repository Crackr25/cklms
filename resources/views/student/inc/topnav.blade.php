<link rel="stylesheet" href="{{asset('templatefiles/night-mode.css')}}">
<header class="header uk-sticky" uk-sticky="top:20 ; cls-active:header-sticky" style="">

    <div class="container">
        <nav uk-navbar="" class="uk-navbar">

            <!-- left Side Content -->
            <div class="uk-navbar-left">

                <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: mobile-active"></span>



                <!-- logo -->
              

            @yield('breadcrumbs')


            </div>


            <!--  Right Side Content   -->

            <div class="uk-navbar-right gg-white">

                <div class="header-widget">
                    <!-- User icons close mobile-->
                    <span class="icon-feather-x icon-small uk-hidden@s" uk-toggle="target: .header-widget ; cls: is-active"> </span>


                    {{-- <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: My Courses ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-youtube-alt"></i>
                    </a> --}}
                    <!-- notificiation icon  -->

                    {{-- <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: Notificiation ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-bell"></i>
                        <span>4</span>
                    </a> --}}

                    

                    <!-- Message  -->

                    {{-- <a href="http://demo.foxthemes.net/courseplusv3.3/default/courses.html#" class="header-widget-icon" uk-tooltip="title: Message ; pos: bottom ;offset:21" title="" aria-expanded="false">
                        <i class="uil-envelope-alt"></i>
                        <span>1</span>
                    </a> --}}

        


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
                                <a href="/studentprofile">
                                    <i class="icon-feather-user"></i>Profile</a>

                                    
                                <a href="#" id="logout">
                                    <i class="icon-feather-log-out"></i>Log Out</a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                            
                            <li>

                                    <a href="h#" id="night-mode" class="btn-night-mode">
                                        <i class="icon-feather-moon"></i> Night mode
                                        <span class="btn-night-mode-switch">
                                            <span class="uk-switch-button"></span>
                                        </span>
                                    </a>

            

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

