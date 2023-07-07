@extends('student.layouts.app')

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



<div class="modal fade" id="profile-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title">CHANGE STUDENT PHOTO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
            <div class="modal-body">
                    <div id="demo"></div>
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
                            <img width="100%" src="/avatar/avatar.png" alt="" class="img-circle img-fluid" >
                            </div>
                            <p></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{auth()->user()->name}}</b> <a class="float-right" id="label_sid"></a>
                                </li>
                            </ul>
                            <button data-toggle="modal"  data-target="#profile-modal" class="btn btn-primary btn-block mt-2"><b>Update Student Photo</b></button>
                    </div>
                </div>
        </div>
            <div class="col-md-9">
                    <div class="card shadow">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Grade Information</h5>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-3 gradelevel">
                                        <strong><i class="fas fa-book mr-1"></i>Grade Level <i class="fas fa-pencil-alt ml-2 editgradelevel"> </i></strong>
                                        <input type="text" class="form-control" id="gradelevel" value="{{$studentinfo->grade}}" disabled>
                                    </div>
                                </div>

                                <hr  class="mt-0">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h5>Personal Information  <i class="fas fa-pencil-alt ml-2 profileedit" data-toggle="tooltip" title="Click to edit profile"></i> </i></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong>First Name</strong>
                                        <input type="text" class="form-control profile" id="first_name"  value="{{$studentinfo->firstname}}">
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Middle Name</strong>
                                        <input type="text" class="form-control profile" id="middle_name" value="{{$studentinfo->middlename}}">
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Last Name</strong>
                                        <input type="text" class="form-control profile" id="last_name" value="{{$studentinfo->lastname}}">
                                    </div>
                                    <div class="col-md-1">
                                        <strong>Suffix</strong>
                                        <input type="text" class="form-control profile" id="suffix" value="{{$studentinfo->suffix}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <strong>Date of birth</strong>
                                        <p class="text-muted" id="dob">--</p>
                                    </div>
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-book mr-1"></i>Gender <i class="fas fa-pencil-alt ml-2 editgender"> </i> </strong>
                                        <div class="gender">
                                        <input type="text" class="form-control" id="gender" value="{{$studentinfo->gender}}" disabled>
                                        </div>
                                        {{-- <select class="form-control" id="grade_level">
                                            <option value="">Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <!-- Add more options as needed -->
                                        </select> --}}
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Nationality</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Mobile Number</strong>
                                        <input type="text" class="form-control profile" id="contact_number" value="{{$studentinfo->mobilenum}}">
                                    </div> 
                                    <div class="col-md-8">
                                        <strong><i class="fas fa-book mr-1"></i>Email Address</strong>
                                        <input type="text" class="form-control profile" id="email" value="{{$studentinfo->email}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-2 mr-2 d-flex justify-content-end">
                                        <button class="btn btn-primary updateprofile" disabled>Update</button>
                                    </div>
                                </div>




                                <hr  class="mt-0">

                        

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Address</h5>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i>Street</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i>Barangay</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i>City/Municipality</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <strong><i class="fas fa-book mr-1"></i>City</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                </div>
                                <hr   class="mt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="mb-3">Parent / Guardian Information</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Father's Full Name</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Father's Occupation</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Father's Contact Number</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                              </div>
                              <hr class="mt-0">
                              <div class="row">
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Mother's Full Maiden Name</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Mother's Occupation</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Mother's Contact Number</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                </div>
                                <hr  class="mt-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Guardian's Full Name</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Relationship to Student</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <strong><i class="fas fa-book mr-1"></i>Guardian's Contact Number</strong>
                                        <input type="text" class="form-control" id="disable" value="" disabled>
                                    </div>
                                </div>
                                <hr  class="mt-0">
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

    $('.profile').prop('disabled', true);






    function gradeselect(){

        
        $('#gradeSelect').select2({
                            width: '100%',
                            allowClear: true,
                            placeholder: "All",
                            language: {
                                noResults: function () {
                                    return "No results found";
                                }
                            },
                            escapeMarkup: function (markup) {
                                return markup;
                            },
                            ajax: {
                                url: "{{ route('gradeSelect') }}",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                    var query = {
                                        search: params.term,
                                        page: params.page || 0
                                    }
                                    return query;
                                },
                                processResults: function (data, params) {
                                    params.page = params.page || 0;
                                    return {
                                        results: data.results,
                                        pagination: {
                                            more: data.pagination.more
                                        }
                                    };
                                },
                                cache: true
                            }
        });


                

    }

    $(document).on('click','.profileedit', function(){


                $('.profile').prop('disabled', false).css('border-color', '#007BFF');
                $('.updateprofile').prop('disabled', false);

            
            
    })

    $(document).on('click','.editgradelevel', function(){


                console.log('grade');

                $('.gradelevel').empty();
                $('.gradelevel').append(`<strong><i class="fas fa-book mr-1"></i>Grade Level <i class="fas fa-pencil-alt ml-2 editgradelevel"> </i></strong>
                                            <select class="form-control select2 m-2" id="gradeSelect"></select>`);
            

                


                gradeselect();
            
            
    })



    $(document).on('click','.editgender', function(){


                console.log('grade');

                $('.gender').empty();
                $('.gender').append(`<select class="form-control m-2" id="genderselect"><option value="MALE">Male</option><option value="FEMALE">Female</option></select>`);
            

                


                gradeselect();
            
            
    })


    $(document).on('change','#gradeSelect', function(){

            var gradeid =  $(this).val();

            console.log(gradeid);

            var formData = new FormData();
            formData.append('gradeid', gradeid);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

             // AJAX POST Request
            $.ajax({
                url: '/student/updateprofilegrades',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert('Grade Has Been Updated')
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    alert('Something went wrong')
                }
            });
            
            
    })

    $(document).on('change','#genderselect', function(){

            var gender =  $(this).val();

            console.log(gender);

            var formData = new FormData();
            
            
            formData.append('gender', gender);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

             // AJAX POST Request
            $.ajax({
                url: '/student/updateprofilegender',
                type: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert('Gender Has Been Updated')
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    alert('Something went wrong')
                }
            });
            
            
    })


    $(document).on('click','.updateprofile', function(){


                console.log('updateprofile');
                
                var firstname = $('#first_name').val();
                var middlename = $('#middle_name').val();
                var lastname = $('#last_name').val();
                var suffix = $('#suffix').val();
                var contactnum = $('#contact_number').val();
                var email = $('#email').val();
                var valid = true;

                console.log(firstname + ' ' + middlename );

                // Remove existing error labels
                $('.error-label').remove();

                // Validation
                if (firstname.trim() === '') {
                    $('#first_name').css('border-color', 'red');
                    $('#first_name').after('<label class="error-label" style="color:red">This is a required field</label>');
                    valid = false;
                }
                if (lastname.trim() === '') {
                    $('#last_name').css('border-color', 'red');
                    $('#last_name').after('<label class="error-label" style="color:red">This is a required field</label>');
                    valid = false;
                }
                if (email.trim() === '') {
                    valid = false;
                    $('#email').css('border-color', 'red');
                    $('#email').after('<label class="error-label" style="color:red">This is a required field</label>');
                }


                if(valid){
                    $('.profile').css('border-color', '#007BFF');
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    // Create FormData object and append data
                    var formData = new FormData();
                    formData.append('firstname', firstname);
                    formData.append('middlename', middlename);
                    formData.append('lastname', lastname);
                    formData.append('suffix', suffix);
                    formData.append('contactnum', contactnum);
                    formData.append('email', email);

                    // AJAX POST Request
                    $.ajax({
                        url: '/student/updateprofile',
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
                }



            
            
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

    // $(document).on('click','#updateimage', function (ev) {
    //         $uploadCrop.croppie('result', {
    //             type: 'canvas',
    //             size: 'viewport'
    //         }).then(function (resp) {
    //             $.ajax({
    //                 url: "/student/enrollment/record/profile/update/photo",
    //                 type: "POST",
    //                 data: {
    //                         "image"     :   resp,
    //                     },
    //                 success: function (data) {
    //                     if(data[0].status == 0){
    //                         $('#studpic').addClass('is-invalid')
    //                         $('.invalid-feedback').removeAttr('hidden')
    //                         $('.invalid-feedback')[0].innerHTML = '<strong>'+data[0].errors.image[0]+'</strong>'
    //                     }
    //                     else{
    //                         window.location.reload(true);
    //                     }
    //                 },
    //             });
    //         });
    //     });









})



</script>

@endsection

