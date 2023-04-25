@extends('admin.layouts.app')

@section('content')
    <!-- Font Awesome -->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">

    <style>
        .swal2-header{
            border: none;
        }
        .course-card h4{
            text-overflow: unset !important;
            white-space: unset !important;
        }
        .imageThumb {
        max-height: 75px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
        }
        .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
        }
        .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
        }
        .remove:hover {
        background: white;
        color: black;
        }
    </style>

    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                    <li><a href="/adminviewbook/index?id={{$bookinfo->id}}">Book: {{$bookinfo->title}}</a></li>
                    <li>{{$pagetitle}} : {{$chaptertestinfo->title}}</li>
                </ul>
            </nav>
        </div>
        <div class="uk-child-width-2-2@s uk-grid-match uk-grid" uk-grid="">
            {{-- <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <form action="/adminchaptertest/updatebasicdetails" method="GET">
                        <input type="hidden" name="chapterid" value="{{$chapterinfo->id}}"/>
                        <input type="hidden" name="quiztype" value="{{$quiztype}}"/>
                        <input type="hidden" name="chaptertestid" value="{{$chaptertestinfo->id}}"/>
                        <label>Title</label>
                        <input type="text" id="chaptertesttitle" name="chaptertesttitle" value="{{$chaptertestinfo->title}}" class="form-control" placeholder="Title" required/>
                        <label>Description (Optional</label>
                        <textarea id="chaptertestdescription" name="chaptertestdescription" class="form-control">{{$chaptertestinfo->description}}</textarea>
                        <button type="button" class="btn btn-info btn-sm float-right"><i class="icon-feather-navigation"></i> Update</button>
                    </form>
                </div>
            </div> --}}
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <small> Developer's note :
                            <ol>
                                <li>Edit question (selection)</li>
                                <li>Show +Answer button when identification answer is deleted</li>
                                <li style="text-decoration: line-through;">Select answers (multiple choices) by clicking checkboxes</li>
                            </ol>
                    </small>
                    <h4 class="uk-card-title">Questionnaire</h4>
                    @if($quiztype == 1)
                        <button type="button" class="btn btn-sm btn-info mb-2" id="addquestion"><i class="fa fa-plus"></i> Question</button>
                        @include('admin.adminchapters.chaptertestcustom')
                    @else
                        <button type="button" class="btn btn-sm btn-info mb-2" id="uploadquestion"><i class="fa fa-plus"></i> Upload Questionnaire</button>
                        @include('admin.adminchapters.chaptertestupload')

                        {{-- <div class="row">
                            @foreach($chaptertestinfo->attachments as $attachment)
                                <div class="col-md-4">
                                    @if($attachment->extension == 'pdf')
                                        <embed src="{{asset($attachment->filepath)}}#toolbar=0"/>
                                    @elseif($attachment->extension == 'jpg' || $attachment->extension == 'png' || $attachment->extension == 'gif')
                                        <img src="{{asset($attachment->filepath)}}"/>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-warning"> View </button>
                                </div>
                            @endforeach
                        </div> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
        <!-- footer
        ================================================== -->
    {{-- <div class="footer">
        @include('admin.inc.footer')
    </div> --}}
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        $('#submitfiles').hide()
        $('.page-menu').addClass(' menu-large');
        $(document).on('click', '.lecturelink', function(){
            $(this).closest('form').submit();
        });
        $(document).on('click','.lessonselect', function(){
            $(this).closest('form').submit();
        });
        $(document).ready(function(){
            $('#chaptertestdescription').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            })
        })
        $(document).on('click', '#addquestion', function(){
            var chaptertesttitle        = $('#chaptertesttitle').val();
            var chaptertestdescription  = $('#chaptertestdescription').val();
            Swal.fire({
                title:  'Create Question',
                html:   '<div class="row p-3">'+
                            '<label>Question</label>'+
                            '<textarea name="question" id="formquestion" class="form-control"/></textarea>'+
                            '<label>Question type</label>'+
                            '<select name="questiontype" id="formquestiontype" class="form-control">'+
                                '<option value="1">Multiple Choice</option>'+
                                '<option value="2">Identification</option>'+
                                '<option value="3">Essay</option>'+
                            '</select>'+
                            '<label>Points</label>'+
                            '<input type="number" step="any" id="points"/>'+
                        '</div>',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Create',
                preConfirm: () => {
                    if($('#formquestion').val().replace(/^\s+|\s+$/g, "").length == 0){
                        Swal.showValidationMessage(
                            "This field is required!"
                        );
                    }
                }
            }).then((confirm) => {
                if (confirm.value) {
                    
                    @if($chaptertestinfo->status == 1)
                        $.ajax({
                            url: '/admincreatechaptertest/createquestion',
                            type: 'GET',
                            datatype: 'json',
                            data: {
                                question            : $('#formquestion').val(),
                                points              : $('#points').val(),
                                questiontype        : $('#formquestiontype').val(),
                                chaptertestid       : '{{$chaptertestinfo->id}}'
                            },
                            success: function(data){
                                var questionnum = $('.uk-accordion').find('li').length+1;
                                if(data.type == 1)
                                {
                                    var buttontype = '<button type="button" class="btn btn-sm btn-soft-success addanswer" questionid="'+data.id+'" questiontype="'+data.type+'" question="'+data.question+'"><i class="fa fa-plus"></i> Answers</button>';

                                }else if(data.type == 2)
                                {
                                    var buttontype = '<button type="button" class="btn btn-sm btn-soft-success addanswer" questionid="'+data.id+'" questiontype="'+data.type+'" question="'+data.question+'"><i class="fa fa-plus"></i> Answer</button>';
                                }else if(data.type == 3)
                                {
                                    var buttontype = '<button type="button" class="btn btn-sm btn-soft-success addanswer" questionid="'+data.id+'" questiontype="'+data.type+'" question="'+data.question+'"><i class="fa fa-plus"></i> Answer</button>';
                                }
                                
                                $('.uk-accordion').prepend(
                                    '<li chaptertestid="'+data.headerid+'" questionid="'+data.id+'" question="'+data.question+'"  id="eachquestion'+data.id+'">'+
                                        '<a class="uk-accordion-title" href="#">'+
                                            questionnum+'. '+data.question+ ' ( '+data.points+' pts )'+
                                        '</a>'+
                                        '<div class="uk-accordion-content">'+
                                            '<div class="row">'+
                                                '<div class="col-md-4">'+
                                                    buttontype+
                                                '</div>'+
                                                '<div class="col-md-8 text-right">'+
                                                    '<button type="button" class="btn btn-sm btn-soft-link buttoneditquestion" questionid="'+data.id+'" question="'+data.question+'" questiontype="'+data.type+'">Edit Question</button>'+
                                                    '<button type="button" class="btn btn-sm btn-soft-link buttondeletequestion" questionid="'+data.id+'" question="'+data.question+'" questiontype="'+data.type+'">Delete Question</button>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="row" id="question'+data.id+'">'+
                                            '</div>'+
                                        '</div>'+
                                    '</li>'
                                );
                            }
                        })
                    @endif
                }
            })
        })
        var addattachment;
        function openDialog() {
            // addattachment+=1;
            document.getElementById('fileid').click();
        }

        $(document).on('click', '#uploadquestion', function(){
            openDialog()
        })
        if (window.File && window.FileList && window.FileReader) {
            $("#fileid").on("change", function(e) {
                var clickedButton = this;
                var files = e.target.files,
                filesLength = files.length;
                if(filesLength==0){
                    addattachment=0;
                }else{
                    addattachment+=1;
                }
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileextension = f.name.split('.').pop()
                    var fileReader = new FileReader();
                    fileReader.fileName = f.name 
                    fileReader.onload = (function(e) {
                        var file = e.target;
                    // console.log((f.name)..split('.').pop())
                        $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + e.target.fileName + "\"/>" +
                        "<br/><span class=\"remove\"><i class='fa fa-trash'></i></span>" +
                        "</span>").insertAfter(clickedButton);
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                // $('#submitfiles').append('<button></button>')
                $('#submitfiles').show()
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
        @if($chaptertestinfo->status == 1)
            $(document).on('click','.buttoneditquestion', function(){
                var question = $(this).attr('question');
                var questionid = $(this).attr('questionid');
                var type = $(this).attr('questiontype');
                var points = $(this).attr('points');
                Swal.fire({
                    title:  'Edit Question',
                    html:   '<div class="row p-3">'+
                                '<label>Question</label>'+
                                '<textarea name="question" id="formquestion" class="form-control"/>'+question+'</textarea>'+
                                '<label>Question type</label>'+
                                '<select name="questiontype" id="formquestiontype" class="form-control">'+
                                    '<option value="1" >Multiple Choice</option>'+
                                    '<option value="2" >Identification</option>'+
                                    '<option value="3" >Essay</option>'+
                                '</select>'+
                            '<label>Points</label>'+
                            '<input type="number" step="any" id="formpoints" value="'+points+'"/>'+
                            '</div>',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Update',
                    preConfirm: () => {
                        if($('#formquestion').val().replace(/^\s+|\s+$/g, "").length == 0){
                            Swal.showValidationMessage(
                                "This field is required!"
                            );
                        }
                    }
                }).then((confirm) => {
                    if (confirm.value) {
                        $.ajax({
                            url: '/admincreatechaptertest/editquestion',
                            type: 'GET',
                            datatype: 'json',
                            data: {
                                question            : $('#formquestion').val(),
                                points              : $('#formpoints').val(),
                                questionid          : questionid,
                                type                : $('#formquestiontype').val(),
                                chaptertestid       : '{{$chaptertestinfo->id}}'
                            },
                            success: function(data){
                                $('#qtitle'+questionid).text(data.question + '( '+data.editedpoints+' pts )')
                            }
                        })
                    }
                })
                $("#formquestiontype option").each(function(){
                    if($(this).val()==type){ // EDITED THIS LINE
                        $(this).attr("selected","selected");    
                    }
                });
            })
            $(document).on('click','.addanswer', function(){
                var questionid = $(this).attr('questionid');
                var questiontype = $(this).attr('questiontype');
                if($(this).attr('questiontype') == '1')
                {
                    var displayheader   =   "Add answers";
                    var displaycontent  =   '<label class="text-left">'+$(this).attr('question')+'</label>'+
                                            '<input type="number" name="noofchoices" id="noofchoices" placeholder="No. of choices" style="border: 1px solid gray"/>'+
                                            '<div id="choicescontainer"></div>';
                }else{
                    var displayheader   =   "Add answer";
                    var displaycontent  =   '<label class="text-left">'+$(this).attr('question')+'</label>'+
                                            '<textarea name="choices[]" id="answerchoice"></textarea>';
                }

                Swal.fire({
                    title:  displayheader,
                    html:   displaycontent,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Add',
                    preConfirm: () => {
                        if(questiontype == 1)
                        {
                            if($('input[name="choices[]"]').val().replace(/^\s+|\s+$/g, "").length == 0){
                                Swal.showValidationMessage(
                                    "This field is required!"
                                );

                            }
                        }else{
                            if($('textarea[name="choices[]"]').val().replace(/^\s+|\s+$/g, "").length == 0){
                                Swal.showValidationMessage(
                                    "This field is required!"
                                );

                            }
                        }
                    }
                }).then((confirm) => {
                    if (confirm.value) {
                        if(questiontype == 1)
                        {
                            var values = $('#choicescontainer').find('input[name="choices[]"]').map(function(){
                                return this.value
                            }).get()
                        }else{
                            var values = [];
                            values.push($('#answerchoice').val());
                            
                        }
                        $.ajax({
                            url: '/admincreatechaptertest/addanswers',
                            type: 'GET',
                            datatype: 'json',
                            data: {
                                choices         : values,
                                questionid      : questionid
                            },
                            success: function(data){
                                    console.log(data)
                                var appenddisplay = '<div class="col-md-12">';
                                    if(data.type == 1)
                                    {
                                        appenddisplay+= '<small>Answers</small>';
                                        $.each(data.answers, function(key, value){
                                            appenddisplay+='<div class="input-group input-group-sm" id="answercontainer'+value.id+'">'+
                                                                '<input type="text" class="form-control" id="answer'+value.id+'" value="'+value.description+'" disabled>'+
                                                                '<div class="input-group-append">'+
                                                                    '<span class="input-group-text">'+
                                                                        '<div class="icheck-primary d-inline">';

                                                                            if(value.answer == 0){
                                                                                appenddisplay+='<input type="checkbox" id="'+value.id+'">';
                                                                            }else{
                                                                                appenddisplay+='<input type="checkbox" id="'+value.id+'" checked>';
                                                                            }
                                                                            appenddisplay+='<label for="'+value.id+'"></label>'+
                                                                        '</div>'+
                                                                    '</span>'+
                                                                '</div>'+
                                                                '<div class="input-group-append">'+
                                                                    '<button type="button" class="btn btn-sm btn-soft-warning editanswer" answer="'+value.description+'" answerid="'+value.id+'"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-sm btn-soft-danger deleteanswer" answer="'+value.description+'" answerid="'+value.id+'"><i class="fa fa-trash"></i></button>'+
                                                                '</div>'+
                                                            '</div>';
                                        });
                                    }else{
                                        appenddisplay+='<small>Answer</small>'+
                                                        '<br/>';
                                                        $.each(data.answers, function(key, value){
                                                            appenddisplay+='<div id=" id="answercontainer'+value.id+'">'+
                                                                '<u id="answer'+value.id+'">'+value.description+'</u>'+
                                                            '<br/>'+
                                                            '<button type="button" class="btn btn-sm btn-soft-warning editanswer" answer="'+value.description+'" answerid="'+value.id+'"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-sm btn-soft-danger deleteanswer" answer="'+value.description+'" answerid="'+value.id+'"><i class="fa fa-trash"></i></button></div>';
                                                        });
                                    }
                                    appenddisplay+='</div>';
                                    console.log(appenddisplay)
                                    $('#question'+data.id).append(appenddisplay);
                            }
                        })
                    }
                })
                $('#noofchoices').on('input', function(){
                    
                    if($(this).val().replace(/^\s+|\s+$/g, "").length == 0){
                        $('#choicescontainer').empty()
                    }else{
                        var noofcurrentchocies = parseInt($('#choicescontainer').find('input[name="choices[]"]').length);
                        var noofchoices        = $(this).val();                        
                        if(noofchoices>noofcurrentchocies)
                        {
                            var noofchoicestodisplay = noofchoices-noofcurrentchocies;
                            if(noofcurrentchocies == 0)
                            {
                                var countinput = 1;
                            }else{
                                var countinput = noofcurrentchocies+1;
                            }
                            for(var x=0; x<noofchoicestodisplay; x++)
                            {
                                $('#choicescontainer').append('<input type="text" id="'+countinput+'" name="choices[]"  placeholder="" style="border: 1px solid gray"/>')
                                countinput+=1;
                            }
                        }else if(noofchoices<noofcurrentchocies){
                            $('input[name="choices[]"]').filter(function(i) {
                                return (this.id > noofchoices);
                            }).remove();
                        }
                    }
                })
            })
            $(document).on('click','.buttondeletequestion', function(){
                var questionid = $(this).attr('questionid');
                var question = $(this).attr('question');
                Swal.fire({
                    title:  'Are you sure you want to delete selected question?',
                    text:   'Question: '+question,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then((confirm) => {
                    if (confirm.value) {
                        $.ajax({
                            url: '/adminchaptertest/deletequestion',
                            type: 'GET',
                            datatype: 'json',
                            data: {
                                questionid      : questionid
                            },
                            success: function(data){
                                $('#eachquestion'+data).remove()
                            }
                        });
                    }
                })
            })
            $(document).on('click','.editanswer', function(){
                var answerid = $(this).attr('answerid');
                var answer = $(this).attr('answer');
                Swal.fire({
                    title:  'Edit choice',
                    input: 'text',
                    inputAttributes: {
                        id: 'newanswer'
                    },
                    inputValue: answer,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Update'
                }).then((confirm) => {
                    if (confirm.value) {
                        console.log($('#newanswer').val())
                        $.ajax({
                            url: '/adminchaptertest/editanswer',
                            type: 'GET',
                            datatype: 'json',
                            data: {
                                answerid      : answerid,
                                newanswer     : $('#newanswer').val()
                            },
                            success: function(data){
                        console.log(data)
                                $('#answer'+data.answerid).val(data.newanswer)
                                $('#answer'+data.answerid).text(data.newanswer)
                            }
                        });
                    }
                })
            })
            $(document).on('click','.deleteanswer', function(){
                var answerid = $(this).attr('answerid');
                var answer = $(this).attr('answer');
                Swal.fire({
                    title:  'Delete choice',
                    input: 'text',
                    inputAttributes: {
                        id: 'newanswer',
                        disabled: 'disabled'
                    },
                    inputValue: answer,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then((confirm) => {
                    if (confirm.value) {
                        console.log($('#newanswer').val())
                        $.ajax({
                            url: '/adminchaptertest/deleteanswer',
                            type: 'GET',
                            datatype: 'json',
                            data: {
                                answerid      : answerid
                            },
                            success: function(data){
                                    $('#answercontainer'+data.answerid).remove()
                            }
                        });
                    }
                })
            })
            $(document).on('click','input[type="checkbox"]', function(){
                if($(this).prop('checked') == true)
                {
                    var answer = 1; 
                }else{
                    var answer = 0; 
                }
                    $.ajax({
                        url: '/adminchaptertest/updateanswer',
                        type: 'GET',
                        datatype: 'json',
                        data: {
                            answerid        : $(this).attr('id'),
                            answer          : answer
                        }
                    });
            })
        @endif
        $(document).on('click','.deleteattachment', function(){
            var id = $(this).attr('id');
            $(this).hide();
            $('#modalview'+id).append(
                '<div class="alert alert-danger alert-dismissible mt-2" id="alert'+id+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                    '<h6 class="m-0" style="height: 20px;"><i class="icon fas fa-exclamation-triangle"></i> <span id="countdown'+id+'">Deleting in 6 ...</span></h6>'+
                '</div>'
            )
            var timeleft = 5;

            var countdown = setInterval(function countdowntimer(){
                $('span#countdown'+id).text("Deleting in " +timeleft + " ...");
                timeleft -= 1;
                if(timeleft == 0){
                    clearInterval(countdown);
                    $('#viewattachment'+id).removeClass('uk-open')
                    $('#viewattachment'+id).addClass('uk-modal-close')
                    $('#viewattachment'+id).removeClass('uk-modal-close')
                    $('#eachattachment'+id).remove()
                    // $('div#'+$(this).attr('id')+'.row').remove();
                    $.ajax({
                        url: '/adminviewbook/chaptertestcontents/deletefile',
                        type:"GET",
                        dataType:"json",
                        data:{
                            id: id
                        },
                        // headers: { 'X-CSRF-TOKEN': token },,
                        complete: function(){
                            Swal.fire({
                                title: 'File deleted successfully!',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK!',
                                allowOutsideClick: false
                            })
                        }
                    })
                }else{
                    $('button.close').on('click', function(){
                        $('span#countdown'+id).remove();
                        $('#alert'+id).remove();
                        clearInterval(countdown);
                        $('.deleteattachment'+id).show();
                        console.log($('.deleteattachment'+id))
                    })
                }
            }, 1000);
        })
    </script>
@endsection