<!DOCTYPE html>
<!-- saved from url=(0076)http://demo.foxthemes.net/courseplusv3.3/default/specialty-comming-soon.html -->
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




    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Content
        ================================================== -->

        <!-- Content / End -->

        <div uk-height-viewport="offset-top: true; offset-bottom: true" class="uk-flex uk-flex-middle bg-gradient-grey uk-text-center  px-4" style="min-height: calc(100vh - 0px);">
            <div class="container-small m-auto ">

                <div class="uk-light mb-lg-8">
                    <h1>We're coming <strong>soon</strong></h1>
                    <p class="mb-0"> We apologize for the inconvenience but Masterkit is currently <br class="uk-visible@s">
                        undergoing
                        planned maintenance.</p>
                </div>

                <div class="uk-grid-small uk-child-width-auto@s uk-child-width-1-4 uk-margin countdown uk-grid uk-countdown" uk-grid="" uk-countdown="date: 2020-09-07T08:32:06+00:00">
                    <div class="uk-first-column">
                        <div class="box">
                            <div class="uk-countdown-number uk-countdown-days"><span>1</span><span>4</span><span>3</span></div>
                            <div class="countdown-text">
                                <p> DAYS</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="uk-countdown-number uk-countdown-hours"><span>2</span><span>3</span></div>
                            <div class="countdown-text">
                                <p> HOURS</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="uk-countdown-number uk-countdown-minutes"><span>5</span><span>9</span></div>
                            <div class="countdown-text">
                                <p> MINUTES</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="box">
                            <div class="uk-countdown-number uk-countdown-seconds"><span>0</span><span>9</span></div>
                            <div class="countdown-text">
                                <p> SECONDS</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="uk-grid-small uk-width-4-5@m m-auto mt-lg-6 mt-4 countdown-form uk-grid" uk-grid="">
                    <div class="uk-width-expand pl-0 uk-first-column">
                        <input type="text" class="uk-input uk-form-small" style="border:0" placeholder="Your email address">
                    </div>
                    <div class="uk-width-1-3@s uk-width-auto pl-1">
                        <input type="submit" value="Subscribe" class="button circle block">
                    </div>
                </form>

            </div>
        </div>
        <!-- Footer
        ================================================== -->



    </div>
    <!-- Wrapper / End -->

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




<div id="backtotop">
    <a href="#">
    </a>
</div>

</body>
</html>