   <script>
       @if(isset($bookinformation->title) && isset($bookinformation->id))
            $(document).on('click','#createnewpartbutton', function() {
                Swal.fire({
                    title: 'Create New Part',
                    text: 'Book: {{$bookinformation->title}}',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off',
                        name: 'part'
                    },
                    inputPlaceholder: 'Enter part',
                    confirmButtonText: 'Create',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value == "") {
                                resolve('Please enter a part first!')
                            }else{
                                $.ajax({
                                    url: '/admincreateparts',
                                    type:"GET",
                                    dataType:"json",
                                    data:{
                                        part: $('input[name=part]').val(),
                                        bookid: '{{$bookinformation->id}}'
                                    },
                                    // headers: { 'X-CSRF-TOKEN': token },,
                                    complete: function(){
                                        Swal.fire({
                                            title: 'Created Successfully!',
                                            type: 'success',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK!',
                                            allowOutsideClick: false
                                        }).then((confirm) => {
                                            if (confirm.value) {
                                                window.location.reload();
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    }
                })
            })
            $(document).on('click','.createnewchapterbutton', function() {
                Swal.fire({
                    title: 'Create New Chapter',
                    text: 'Part: {{$bookinformation->title}}',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off',
                        name: 'chapter'
                    },
                    inputPlaceholder: 'Enter part',
                    confirmButtonText: 'Create',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    inputValidator: (value) => {
                        return new Promise((resolve) => {
                            if (value == "") {
                                resolve('Please enter a part first!')
                            }else{
                                $.ajax({
                                    url: '/admincreatechapters',
                                    type:"GET",
                                    dataType:"json",
                                    data:{
                                        chapter: $('input[name=chapter]').val(),
                                        partid: $(this).attr('id')
                                    },
                                    // headers: { 'X-CSRF-TOKEN': token },,
                                    complete: function(){
                                        Swal.fire({
                                            title: 'Created Successfully!',
                                            type: 'success',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK!',
                                            allowOutsideClick: false
                                        }).then((confirm) => {
                                            if (confirm.value) {
                                                window.location.reload();
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    }
                })
            })
        @endif
        $(document).on('click','.createnewlesson', function() {
            Swal.fire({
                title: 'Create New Lesson',
                text: 'Chapter: '+$(this).attr('chapter'),
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                    name: 'lesson'
                },
                inputPlaceholder: 'Enter title',
                confirmButtonText: 'Create',
                showCancelButton: true,
                allowOutsideClick: false,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value == "") {
                            resolve('Please enter a lesson title first!')
                        }else{
                            $.ajax({
                                url: '/admincreatelessons',
                                type:"GET",
                                dataType:"json",
                                data:{
                                    lesson: $('input[name=lesson]').val(),
                                    chapterid: $(this).attr('chapterid')
                                },
                                // headers: { 'X-CSRF-TOKEN': token },,
                                complete: function(){
                                    Swal.fire({
                                        title: 'Created Successfully!',
                                        type: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK!',
                                        allowOutsideClick: false
                                    }).then((confirm) => {
                                        if (confirm.value) {
                                            window.location.reload();
                                        }
                                    })
                                }
                            })
                        }
                    })
                }
            })
        })
        // $(document).on('click','.createnewcontent', function() {
        //     $('textarea').summernote();
        //     Swal.fire({
        //         title: 'Create New Content',
        //         html: '<textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>',
        //         customClass: 'swal-wide',
        //         confirmButtonText: 'Create',
        //         showCancelButton: true,
        //         allowOutsideClick: false,
        //         preConfirm: () => {
        //             if($('#deductiondescription').val() == ""){
        //                 Swal.showValidationMessage(
        //                     "Please fill in the required section!"+
        //                     "<br>"+
        //                     "Description is required"
        //                 );
        //             }else{
        //                 $.ajax({
        //                     url: '/newdeductionsetup/{{Crypt::encrypt("adddeduction")}}',
        //                     type:"GET",
        //                     dataType:"json",
        //                     data:{
        //                         type: $("#deductiontype").val(),
        //                         deductiondescription: $("#deductiondescription").val()
        //                     },
        //                     // headers: { 'X-CSRF-TOKEN': token },,
        //                     success: function(data){
        //                         if(data == '0'){
        //                             Swal.fire({
        //                                 text: "New deduction has been added successfully!",
        //                                 type: 'success',
        //                                 confirmButtonColor: '#3085d6',
        //                                 confirmButtonText: 'OK!',
        //                                 allowOutsideClick: false
        //                             }).then((confirm) => {
        //                                 if (confirm.value) {
        //                                     window.location.reload();
        //                                 }
        //                             })
        //                         }else{
        //                             Swal.fire({
        //                                 text: "New deduction already exists!",
        //                                 type: 'danger',
        //                                 confirmButtonColor: '#3085d6',
        //                                 confirmButtonText: 'OK!',
        //                                 allowOutsideClick: false
        //                             }).then((confirm) => {
        //                                 if (confirm.value) {
        //                                     window.location.reload();
        //                                 }
        //                             })
        //                         }
        //                     }
        //                 })
        //             }
        //         }
        //     })
        // })
        $(document).on('click', '#addinstructor', function(){
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
                    // Swal.showValidationMessage(
                    //         "Please fill in the required section!"+
                    //         "<br>"+
                    //         "Description is required"
                    //     );
                    // $.ajax({
                    //     url: '/deductiondetails/'+action,
                    //     type:"GET",
                    //     dataType:"json",
                    //     data:{
                    //         deductiontypeid: deductiontypeid,
                    //         deductiondetaildescription: deductiondetaildescription,
                    //         deductiondetailmonthlyamount: deductiondetailmonthlyamount,
                    //         deductiondetailpercentage: deductiondetailpercentage
                    //     },
                    //     // headers: { 'X-CSRF-TOKEN': token },,
                    //     complete: function(data){
                    //         Swal.fire({
                    //             title: 'Added Successfully!',
                    //             // text: "Your file has been deleted.",
                    //             type: 'success',
                    //             confirmButtonColor: '#3085d6',
                    //             confirmButtonText: 'OK!'
                    //         }).then((confirm) => {
                    //             if (confirm.value) {
                    //                 window.location.reload();
                    //             }
                    //         })
                    //     }
                    // })

        })
                            // $.ajax({
                            //     url: '/admincreatelessons',
                            //     type:"GET",
                            //     dataType:"json",
                            //     data:{
                            //         lesson: $('input[name=lesson]').val(),
                            //         chapterid: $(this).attr('chapterid')
                            //     },
                            //     // headers: { 'X-CSRF-TOKEN': token },,
                            //     complete: function(){
                            //         Swal.fire({
                            //             title: 'Created Successfully!',
                            //             type: 'success',
                            //             confirmButtonColor: '#3085d6',
                            //             confirmButtonText: 'OK!',
                            //             allowOutsideClick: false
                            //         }).then((confirm) => {
                            //             if (confirm.value) {
                            //                 window.location.reload();
                            //             }
                            //         })
                            //     }
                            // })

    </script>