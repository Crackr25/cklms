
<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Courseplus Learning HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CK-LMS">


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

        <div uk-height-viewport="expand: true" class="uk-flex uk-flex-middle">
            <div class="uk-width-1-2@m uk-width-1-2@s m-auto text-center">

                <img src="{{asset('templatefiles/maintenance.png')}}" alt="" class="my-3" style="width: 200px;">

                <h3>We're making some improvements</h3>
                <p class="mb-0"> We apologize for the inconvenience but CK-LMS is currently <br> undergoing planned
                    maintenance.</p>

            </div>
        </div>




        <!-- This is the modal with the default close button -->
        <div id="modal-close-default" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-width-1-3@m uk-text-center bg-gradient-grey uk-light rounded">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="my-3">
                    <i class="icon-feather-mail icon-large"></i>
                </div>
                <h4>Notify me when is lanch</h4>
                <p class="mb-4"> Become first one know when we Lanch our site </p>

                <form action="">

                    <input type="text" class="uk-input mb-4" placeholder="Your name">
                    <input type="email" class="uk-input mb-4" placeholder="Email Address">
                    <input type="submit" class="button white block large mb-0" value="Subscribe">
                    <p class="uk-text-small mt-2">No Spam, we promise .</p>

                </form>


            </div>
        </div>

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


</body>

</html>