<!DOCTYPE html>

<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>CK-LMS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- Favicon -->

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



    <!-- Content
    ================================================== -->
    <div uk-height-viewport="" class="uk-flex uk-flex-middle" style="min-height: calc(100vh);">
        <div class="uk-width-2-3@m uk-width-2-2@s m-auto rounded">
            <div class="uk-child-width-1-2@m uk-grid-collapse bg-white uk-grid" uk-grid="">

                <!-- column one -->
                <div class="uk-margin-auto-vertical uk-text-center uk-animation-scale-up p-3 uk-light uk-first-column" style="background-color: white">
                    {{-- <i class=" uil-graduation-hat icon-large"></i>
                    <h3 class="mb-4"> Courseplus</h3> --}}
                    <p>
                        {{-- style="background-image:url('assets/images/elearning7.jpg');background-repeat:no-repeat;background-size:contain;background-position:center;" --}}
                        <img alt="Image placeholder" src="{{asset('/altimages/ck_login.png')}}" draggable="false">    
                    </p>
                    <p>
                        {{-- style="background-image:url('assets/images/elearning7.jpg');background-repeat:no-repeat;background-size:contain;background-position:center;" --}}
                        <img alt="Image placeholder" src="{{asset('/assets/images/banner.png')}}" draggable="false">    
                    </p>
                </div>

                <!-- column two -->
                <div class="uk-card-default p-5 rounded">
                    <div class="mb-4 uk-text-center">
                        <h3 class="mb-0"> Welcome</h3>
                        <p class="my-2">Login to manage your account.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="uk-form-group">
                            <label class="uk-form-label"> Username</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-mail"></i>
                                </span>
                                <input class="uk-input @error('email') is-invalid @enderror"  name="email" type="text" required  autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>AADASDAS</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="uk-form-group">
                            <label class="uk-form-label"> Password</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-lock"></i>
                                </span>
                                <input class="uk-input @error('password') is-invalid @enderror" name="password" type="password" placeholder="********" required >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>password</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        {{-- <div class="uk-form-group">
                            <label class="uk-form-label"> Confirm password</label>

                            <div class="uk-position-relative w-100">
                                <span class="uk-form-icon">
                                    <i class="icon-feather-lock"></i>
                                </span>
                                <input class="uk-input" type="password" placeholder="********">
                            </div>

                        </div> --}}

                        <div class="mt-4 uk-flex-middle uk-grid-small uk-grid" uk-grid="">
                            <div class="uk-width-expand@s uk-first-column">
                                 <p> <small>Don't have an account yet?</small> <a href="/register">Sign up <small>(Students only)</small></a></p> 
                            </div>
                            <div class="uk-width-auto@s">
                                <button type="submit" class="btn btn-default">Login</button>
                            </div>
                        </div>

                    </form>
                </div><!--  End column two -->

            </div>
        </div>
    </div>

    <!-- Content -End
    ================================================== -->


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




<div id="backtotop"><a href="http://demo.foxthemes.net/courseplusv3.3/default/form-modern-login.html#"></a></div></body></html>