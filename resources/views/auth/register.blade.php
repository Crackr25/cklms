<!DOCTYPE html>

<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>e-LMS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

    <!-- Favicon -->
    <link href="http://demo.foxthemes.net/courseplusv3.3/assets/images/favicon.png" rel="icon" type="image/png">

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
<style>
    body {
        /* background-color: white; */
        /* background-image:url('assets/images/elearning12.jpg');
        background-repeat:no-repeat;
        background-size:contain;
        background-position:center; */
    }
</style>

<body>



    <!-- Content
    ================================================== -->
    <div uk-height-viewport="" class="uk-flex uk-flex-middle" style="min-height: calc(100vh); ">
        <div class="uk-width-3-3@m uk-width-2-2@s m-auto rounded ">
            
            <div class="row m-5 uk-card-default p-5">
                <div class="col-md-5" style="background-image:url('assets/images/elearning7.jpg');background-repeat:no-repeat;background-size:contain;background-position:center;">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4 uk-text-center">
                                <h3 class="mb-0"> Create Account</h3>
                                {{-- <p class="my-2">Login to manage your account.</p> --}}
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="/registeraccount">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> First Name</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-user"></i>
                                        </span>
                                        <input class="uk-input"  name="firstname" type="text" required  autofocus>
                                        {{-- @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>firstname</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Middle Name</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-user"></i>
                                        </span>
                                        <input class="uk-input"  name="middlename" type="text"  autofocus>
                                        {{-- @error('middlename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>middlename</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Last Name</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-user"></i>
                                        </span>
                                        <input class="uk-input"  name="lastname" type="text" required  autofocus>
                                        {{-- @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>lastname</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Suffix</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-user"></i>
                                        </span>
                                        <input class="uk-input"  name="suffix" type="text"   autofocus>
                                        {{-- @error('suffix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>suffix</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Gender</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-user"></i>
                                        </span>
                                        {{-- <input class="uk-input @error('suffix') is-invalid @enderror"  name="suffix" type="email" required  autofocus> --}}
                                        <select class="uk-select" name="gender">
                                            <option value="male">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male</option>
                                            <option value="female">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female</option>
                                        </select>
                                    </div>
        
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Email</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-mail"></i>
                                        </span>
                                        <input class="uk-input"  name="email" type="email" required  autofocus>
                                        {{-- @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>email</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
        
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Password</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-lock"></i>
                                        </span>
                                        <input class="uk-input" name="password" type="password" placeholder="********" required autofocus>
                                        {{-- @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>password</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
        
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> Confirm password</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-lock"></i>
                                        </span>
                                        <input class="uk-input" type="password" placeholder="********" required autofocus>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-4 uk-flex-middle uk-grid-small uk-grid" uk-grid="">
                                    <div class="uk-width-expand@s uk-first-column">
                                        <p> <small>Already have an account?</small> <a href="/">Sign in</a></p>
                                    </div>
                                    <div class="uk-width-auto@s">
                                        <button type="submit" class="btn btn-default">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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