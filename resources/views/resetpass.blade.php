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
                <div class="col-md-5" style="background-image:url('assets/images/elearning9.jpg');background-repeat:no-repeat;background-size:contain;background-position:center;">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4 uk-text-center">
                                <h3 class="mb-0"> Reset Password</h3>
                                {{-- <p class="my-2">Login to manage your account.</p> --}}
                            </div>
                        </div>
                    </div>
                    <form action="/changepass" method="GET">
                            @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="uk-form-group">
                                    <label class="uk-form-label"> New Password</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-lock"></i>
                                        </span>
                                        <input id="password" type="password" class="uk-input form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{old('password')}}">
                                        {{-- <input class="uk-input @error('password') is-invalid @enderror"   name="newpassword" type="password" id="newpassword" required  autofocus> --}}
                                        {{-- @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
        
                                </div>
                                <div class="uk-form-group">
                                    <label class="uk-form-label">Confirm New Password</label>
        
                                    <div class="uk-position-relative w-100">
                                        <span class="uk-form-icon">
                                            <i class="icon-feather-lock"></i>
                                        </span>
                                        <input type="password" class="uk-input form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmation')}}">
                                        {{-- <input class="uk-input"  name="confirmpassword" id="confirmpassword" type="password" value="{{old('password_confirmation')}}" autofocus> --}}
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                @error('wrong')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <span class="invalid-feedback" id="incorrect-password" role="alert">
                                    <strong>Incorrect Password</strong>
                                </span>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-4 uk-flex-middle uk-grid-small uk-grid" uk-grid="">
                                    <div class="uk-width-auto@s">
                                        <button type="submit" class="btn btn-default" id="btn-reset">Reset Password</button>
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



    <!-- javaScripts
    ================================================== -->
    <script src="{{asset('templatefiles/framework.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('templatefiles/simplebar.js')}}"></script>
    <script src="{{asset('templatefiles/main.js')}}"></script>
    <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>


        <script>
            $(document).ready(function(){
                // $('#incorrect-password').hide();
                // $('#btn-reset').on('click', function(){
                //     var newpassword = $('#newpassword').val();
                //     var confirmpassword = $('#confirmpassword').val();
                //     var checkvalidation = 0;
                //     if(newpassword.replace(/^\s+|\s+$/g, "").length == 0)
                //     {
                //         checkvalidation = 1;
                //         $('#newpassword').css('border','1px solid red')
                //     }else{
                //         $('#newpassword').removeAttr('style')
                //     }
                //     if(confirmpassword.replace(/^\s+|\s+$/g, "").length == 0)
                //     {
                //         checkvalidation = 1;
                //         $('#confirmpassword').css('border','1px solid red')
                //     }else{
                //         $('#confirmpassword').removeAttr('style')
                //     }
                //     if(checkvalidation == 0)
                //     {
                //         if (confirmpassword == newpassword) {
                //             window.open('/changepass')
                //         } else { 
                //             $('#confirmpassword').css('border','1px solid red')
                //             $('#incorrect-password').show();
                //         };
                //     }else{
                //         Toast.fire({
                //             type: 'error',
                //             title: 'Fill in important fields!'
                //         })
                //     }
                // })
            })
// confirmpassword
        </script>

</body>
</html>