@extends('admin.layouts.app')

@section('headercover')
    <div class="home-hero pt-2" style="background-image: url({{asset('assets/images/elearning4.jpg')}}); background-repeat:no-repeat;background-size:cover;background-position:center center; height: 130%;">
        <div class="uk-width-1-1">
            <div class="page-content-inner uk-position-z-index">
                <h1 class="text-white">CK Learning Management System</h1>
                <h4 class="my-lg-4 text-white">Your Access to Visual Learning and Integration </h4>
            </div>
        </div>
    </div>
@endsection


@section('content')


    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/croppie/croppie.css')}}">


<div class="modal fade" id="profile-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">CHANGE SCHOOL PHOTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    <div id="demo" ></div>
                    <input type="file" name="studpic" id="studpic" class="form-control" accept=".png, .jpg, .jpeg" required>
                    <span class="invalid-feedback" role="alert" hidden>
                    </span>
            </div>
            <div class="modal-footer justify-content-between">
                <button  id="updateimage" class="btn btn-info savebutton">Update</button>
            </div>
        </div>
    </div>
</div>
</section>
<section class="content pt-0 m-5">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body box-profile">
                            <div class="text-center" id="image_holder">
                            @if(isset($schoolinfo->picurl))
                                <img width="100%" src="{{$schoolinfo->picurl}}" alt="" class="img-circle img-fluid" >
                            @else
                                <img width="100%" src="/avatar/avatar.png" alt="" class="img-circle img-fluid" >
                            @endif
                            </div>
                            <p></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{auth()->user()->name}}</b> <a class="float-right" id="label_sid"></a>
                                </li>
                            </ul>
                            <button data-toggle="modal"  data-target="#profile-modal" class="btn btn-primary btn-block mt-2"><b>Update School Logo</b></button>
                    </div>
                </div>
        </div>
            <div class="col-md-9">
                    <div class="card shadow">
                        <div class="card-body">
        
                            <!-- School Information -->
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>School Name</strong>
                                    <input type="text" class="form-control profile" value="{{$schoolinfo->schoolname}}" id="school_name">
                                </div>
                                <div class="col-md-4">
                                    <strong>School ID</strong>
                                    <input type="text" class="form-control profile" value="{{$schoolinfo->schoolid}}" id="school_id">
                                </div>
                                <div class="col-md-4">
                                    <strong>Division</strong>
                                    <input type="text" class="form-control profile " value="{{$schoolinfo->division}}" id="division">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <strong><i class="fas fa-book mr-1"></i>Region</strong>
                                    <input type="text" class="form-control" id="region" value="{{$schoolinfo->region}}">
                                </div>
                                <div class="col-md-4">
                                    <strong>District</strong>
                                    <input type="text" class="form-control profile" id="district" value="{{$schoolinfo->district}}">
                                </div>
                                <div class="col-md-4">
                                    <strong><i class="fas fa-book mr-1"></i>School Color</strong>
                                    <input type="color" class="form-control" id="school_color" value="{{$schoolinfo->schoolcolor}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <strong><i class="fas fa-book mr-1"></i>Website</strong>
                                    <input type="text" class="form-control profile" id="website" value="{{$schoolinfo->websitelink}}">
                                </div> 
                                <div class="col-md-8">
                                    <strong><i class="fas fa-book mr-1"></i>Essential Link</strong>
                                    <input type="text" class="form-control profile" id="essential_link" value="{{$schoolinfo->address}}">
                                </div>
                            </div>

                            <hr class="mt-0">

                            <!-- Address -->

                            @php

                                $address = explode(' ', $schoolinfo->address);

                            @endphp

                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-book mr-1"></i>Street</strong>
                                    <input type="text" class="form-control" id="street" value="{{$schoolinfo->address}}">
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-book mr-1"></i>Barangay</strong>
                                    <input type="text" class="form-control" id="barangay" value="{{$address[1]}}">
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-book mr-1"></i>Municipality</strong>
                                    <input type="text" class="form-control" id="municipality" value="{{$address[2]}}">
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-book mr-1"></i>City</strong>
                                    <input type="text" class="form-control" id="city" value="{{$address[3]}}">
                                </div>
                            </div>


                                <hr class="mt-0">

                                <div class="row">
                                    <div class="col-md-12 mb-2 mr-2 d-flex justify-content-end">
                                        <button class="btn btn-primary updateprofile" >Update</button>
                                    </div>
                                </div>
                   </div>
            </div>
      </div>
    </div>
</section>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/croppie/croppie.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    
    
    

<script>


$(document).ready(function(){





    $(document).on('click','.editgender', function(){


                console.log('grade');

                $('.gender').empty();
                $('.gender').append(`<select class="form-control m-2" id="genderselect"><option value="MALE">Male</option><option value="FEMALE">Female</option></select>`);
            

                


                gradeselect();
            
            
    })






    $(document).on('click','.updateprofile', function(){


                console.log($('#school_color').val());
                
                var schoolname = $('#first_name').val();
                var schoolid = $('#middle_name').val();
                var division = $('#last_name').val();
                var region = $('#suffix').val();
                var district = $('#contact_number').val();
                var schoolcolor = $('#email').val();
                var website = $('#email').val();
                var essentiel_link = $('#email').val();

                //address
                var street = $('#email').val();
                var barangay = $('#email').val();
                var municipality = $('#email').val();
                var city = $('#email').val();
                var valid = true;

                // console.log(firstname + ' ' + middlename );

                // Remove existing error labels
                $('.error-label').remove();

                // Validation
                // if (firstname.trim() === '') {
                //     $('#first_name').css('border-color', 'red');
                //     $('#first_name').after('<label class="error-label" style="color:red">This is a required field</label>');
                //     valid = false;
                // }
                // if (lastname.trim() === '') {
                //     $('#last_name').css('border-color', 'red');
                //     $('#last_name').after('<label class="error-label" style="color:red">This is a required field</label>');
                //     valid = false;
                // }
                // if (email.trim() === '') {
                //     valid = false;
                //     $('#email').css('border-color', 'red');
                //     $('#email').after('<label class="error-label" style="color:red">This is a required field</label>');
                // }


                // if(valid){
                    $('.profile').css('border-color', '#007BFF');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Create FormData object and append data
                    var formData = new FormData();

                    var schoolname = $('#school_name').val();
                    var schoolid = $('#school_id').val();
                    var division = $('#division').val();
                    var region = $('#region').val();
                    var district = $('#district').val();
                    var schoolcolor = $('#school_color').val();
                    var website = $('#website').val();
                    var essentiel_link = $('#essentiel_link').val();

                    //address
                    var street = $('#street').val();
                    var barangay = $('#barangay').val();
                    var municipality = $('#municipality').val();
                    var city = $('#city').val();
                    var valid = true;

                    formData.append('schoolname', schoolname);
                    formData.append('schoolid', schoolid);
                    formData.append('division', division);
                    formData.append('region', region);
                    formData.append('district', district);
                    formData.append('schoolcolor', schoolcolor);
                    formData.append('website', website);
                    formData.append('essentiel_link', essentiel_link);
                    
                    //address
                    formData.append('street', street);
                    formData.append('barangay', barangay);
                    formData.append('municipality', municipality);
                    formData.append('city', city);





                    // AJAX POST Request
                    $.ajax({
                        url: '/admin/updateschoolinfo',
                        type: 'POST',
                        headers: {
                            'X-CSRF-Token': csrfToken
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            window.location.reload();
                            // Handle success response
                            console.log(response);
                        },
                        error: function (xhr, status, error) {
                            // Handle error response
                            alert('Something went wrong!')
                            console.log(error);
                        }
                    });
                



            
            
    })




    $uploadCrop = $('#demo').croppie({
            enableExif: true,
            viewport: {
                width: 304,
                height: 289,
            },

            boundary: {
                width: 304,
                height: 289
            }
    });




    $("#studpic").change(function(){
            var selectedFile = this.files[0];
            var idxDot = selectedFile.name.lastIndexOf(".") + 1;
            var extFile = selectedFile.name.substr(idxDot, selectedFile.name.length).toLowerCase();
            if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                Swal.fire({
                    title: 'INVALID FORMAT',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
                $(this).val('')
            }
        });

    $(document).on('click','#updateimage', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {

                    var img = new Image();
                    img.onload = function() {
                    // Create a canvas element
                    var canvas = document.createElement('canvas');
                    var ctx = canvas.getContext('2d');

                    // Set the canvas size to match the cropped image size
                    canvas.width = img.width;
                    canvas.height = img.height;

                    // Draw the image onto the canvas
                    ctx.drawImage(img, 0, 0);

                    // Convert the canvas data to a base64 encoded string
                    var shortenedURI = canvas.toDataURL(); // The shortened URI

                    console.log(shortenedURI);
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');




                    // Rest of your code for AJAX request and handling the response

                        $.ajax({
                                url: "/admin/updateschoolinfo/logo",
                                type: "post",
                                headers: {
                                        'X-CSRF-Token': csrfToken
                                    },
                                data: {
                                        "image"     :   shortenedURI,
                                    },
                                success: function () {
                                        window.location.reload(true);
                                    
                                },
                            });
                };

                img.src = resp;
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

            
            });
        });









})



</script>

@endsection

