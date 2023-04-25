<script>
    $(document).ready(function(){
        $(document).on('click', '#addclassroom', function(){
            console.log('asd');
            Swal.fire({
                title: 'Create New Instructor',
                html:   '<label><strong>First Name</strong></label>'+
                        '<input type="text" class="form-control mb-2" name="firstname" id="firstname"/>'+
                        '<label><strong>Middle Name</strong></label>'+
                        '<input type="text" class="form-control mb-2" name="middlename" id="middlename"/>'+
                        '<label><strong>Last Name</strong></label>'+
                        '<input type="text" class="form-control mb-2" name="lastname" id="lastname"/>'+
                        '<label><strong>Suffix</strong></label>'+
                        '<input type="text" class="form-control mb-2" name="suffix" id="suffix"/>'+
                        '<label><strong>Email Address</strong></label>'+
                        '<input type="email" class="form-control mb-2" name="email" id="email" placeholder="example: jane@gmail.com"/>'+
                        '<label><strong>Gender</strong></label>'+
                        '<select class="form-control" name="gender" id="gender">'+
                            '<option value="male">Male</option>'+
                            '<option value="female">Female</option>'+
                        '</select>',
                customClass: 'swal-wide',
                confirmButtonText: 'Create',
                showCancelButton: true,
                allowOutsideClick: false,
                preConfirm: () => {
                    if($('#firstname').val() == ""){
                        Swal.showValidationMessage(
                            "First Name is required!"
                        );
                        $('#firstname').css('border','1px solid red');
                    }
                    else if($('#lastname').val() == ""){
                        Swal.showValidationMessage(
                            "Last Name is required!"
                        );
                        $('#lastname').css('border','1px solid red');
                    }else if($('#email').val() == ""){
                        Swal.showValidationMessage(
                            "Email is required!"
                        );
                        $('#email').css('border','1px solid red');
                    }else{
                        $.ajax({
                            url: '/adminteachers/create',
                            type:"GET",
                            dataType:"json",
                            data:{
                                firstname: $('#firstname').val(),
                                middlename: $('#middlename').val(),
                                lastname: $('#lastname').val(),
                                suffix: $('#suffix').val(),
                                gender: $('#gender').val(),
                                email: $('#email').val()
                            },
                            // headers: { 'X-CSRF-TOKEN': token },,
                            success: function(data){
                                if(data == 0){
                                    Swal.fire({
                                        title: 'New teacher added successfully!',
                                        text: $('#firstname').val()+' '+$('#middlename').val()+' '+$('#middlename').val()+' '+$('#middlename').val(),
                                        type: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK!'
                                    }).then((confirm) => {
                                        if (confirm.value) {
                                            window.location.reload();
                                        }
                                    })
                                }
                                Swal.fire({
                                    title: 'Added Successfully!',
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK!'
                                }).then((confirm) => {
                                    if (confirm.value) {
                                        window.location.reload();
                                    }
                                })
                            }
                        })
                    }
                }
            })
        })
    })
</script>