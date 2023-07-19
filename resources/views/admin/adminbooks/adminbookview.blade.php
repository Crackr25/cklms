@extends('admin.layouts.app')

@section('content')
    <!-- Font Awesome -->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
    <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">

    <style>
        .swal2-header{ border: none; }

        .form-group {
        /* border: 1px solid black; */
        padding: 20px;
        /* border-radius: 10px; */
        }
        #modalviewquiz .uk-modal-footer {
        height: auto;
        padding: 20px;
        box-sizing: border-box;
        }


        
        ul, #myUL { list-style-type: none; }

        #myUL { margin: 0; padding: 0; }

        .box { cursor: pointer; -webkit-user-select: none; /* Safari 3.1+ */ -moz-user-select: none; /* Firefox 2+ */ -ms-user-select: none; /* IE 10+ */ user-select: none; }

        .box::before { content: "\229F"; color: black; display: inline-block; margin-right: 6px; }

        .check-box::before { content: "\229E";  color: dodgerblue; }

        /* .nested {
        display: none;
        } */

        .active { display: block;  }

        html::-webkit-scrollbar-track, html::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        html::-webkit-scrollbar-track, html::-webkit-scrollbar
        {
            width: 6px;
            background-color: #F5F5F5;
        }

        html::-webkit-scrollbar-track, html::-webkit-scrollbar-thumb
        {
            background-color: gray;
        }
    .select2-container {
            z-index: 9999;
            margin: 0px;
        }
        .select2-search__field{
            margin: 0px;
        }
    </style>
    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                </ul>
            </nav>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row uk-flex uk-flex-center">
                                    <div class="col-12 uk-flex uk-flex-center">
                                        <div uk-lightbox="" class="uk-flex uk-flex-center">
                                            <a href="{{asset($book->picurl)}}" data-caption="{{$book->booktitle}}" draggable="false" class="uk-flex uk-flex-center">
                                                <img class="uk-box-shadow-xlarge" alt="" src="{{asset($book->picurl)}}" style="width: 50%;" draggable="false">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row mt-2">
                                    @php
                                        if($book->status == 0)
                                        {
                                            $bookstatusactive = '';
                                            $bookstatusinactive = 'checked';

                                        }elseif($book->status == 1)
                                        {
                                            $bookstatusactive = 'checked';
                                            $bookstatusinactive = '';
                                            
                                        }else{

                                            $bookstatusactive = '';
                                            $bookstatusinactive = 'checked';
                                        }
                                    @endphp
                                    <div class="col-6">
                                        <div class="form-group clearfix ">
                                            <div class="icheck-primary d-inline">
                                            <input type="radio" id="bookstatus1" class="bookstatus" name="bookstatus"  bookid="{{$book->bookid}}" value="1" {{$bookstatusactive}}> 
                                            <label for="bookstatus1" style="font-size: 100% !important;">
                                                Active
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group clearfix ">
                                            <div class="icheck-primary d-inline">
                                            <input type="radio" id="bookstatus2" class="bookstatus" name="bookstatus"  bookid="{{$book->bookid}}" {{$bookstatusinactive}} value="0"> 
                                            <label for="bookstatus2" style="font-size: 100% !important;">
                                                Inactive
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <ul class="uk-list uk-list-divider text-small mt-1" style="font-size: 90%">
                                    <li> Title: {{$book->booktitle}}  </li>
                                    <li id="gradeid" data-toggle="modal" data-target="#gradeModal">Grade level:
                                        @if(isset($book->grade))


                                        {{$book->grades}}

                                        
                                        @else


                                        <u>Grade Not Assigned</u>
                                        

                                        @endif
                                        
                                        <i class="fas fa-pencil-alt ml-2"></i></li>
                            
                                        {{-- <li> Academic Programs: 
                                        <div class="text-left mt-2 mb-2">
                                            @if(count($academicprograms)>0 )
                                                @foreach($academicprograms as $academicprogram)
                                                    @if($academicprogram->selected == 1)
                                                        <button type="button" class="btn btn-sm btn-default">{{$academicprogram->programname}}&nbsp;&nbsp; <i class="fa fa-times removeacademicprogram removeacademicprogram{{$academicprogram->id}}" id="{{$academicprogram->id}}"></i></button>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </li> --}}
                                    <li> Publish time 12/12/2018</li>

                                </ul>
                                <div class="row mt-2">
                                    <div class="col-md-12 col-12">
                                        {{-- <button type="button" class="btn btn-warning" id="buttonaddlinks" uk-toggle="target: #modallinks"><i class="fa fa-plus"></i> Links</button> --}}
                                        <button type="button" class="btn btn-warning" id="buttonupdateinfo">Book info</button>
                                        <button type="button" class="btn btn-info" id="classroomassigned">Classroom Assigned</button>
                                        <button type="button" class="btn btn-soft-danger" id="buttondeletebook"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="uk-accordion-content">
            <div class="card mb-2"  bookid="{{$book->bookid}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="btn-group-horizontal float-right">
                                @if(count($book->chapters)==0)
                                <button type="button" class="btn btn-sm btn-info" id="addpart" uk-toggle="target: #modaladdpart" uk-tooltip="title: New Part; pos: bottom" bookid="{{$book->bookid}}" >
                                    <i class="fa fa-plus"></i> Part
                                </button>
                                <button type="button" class="btn btn-sm btn-info" id="addchapter" uk-toggle="target: #modaladdchapter" uk-tooltip="title: New Chapter; pos: bottom" bookid="{{$book->bookid}}"  >
                                    <i class="fa fa-plus"></i> Chapter / Unit
                                </button>
                                @else
                                
                                <button type="button" class="btn btn-sm btn-info" id="addchapter" uk-toggle="target: #modaladdchapter" uk-tooltip="title: New Chapter; pos: bottom" bookid="{{$book->bookid}}"  >
                                    <i class="fa fa-plus"></i> Chapter / Unit
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="uk-flex uk-flex-center">
                                <strong>Table of Contents</strong>
                            </label>

                            <div class="row"   style="border: 1px solid;">
                                
                                <ul id="heirarchytree">
                                    @if(count($book->parts)==0)
                                        @if(count($book->chapters) > 0)
                                            <li>
                                                <ul id="ulpart0">
                                                    @php
                                                        $chapternumber = 0;
                                                        $partnumber = 0;
                                                    @endphp
                                                    @foreach($book->chapters as $chapter)   
                                                        @php
                                                            $chapternumber+=1;;
                                                        @endphp
                                                        <li id="{{$chapter->id}}" contenttype="chapter" partid="0"  class="lichapter">
                                                            <span class="right badge badge-success">{{$chapter->sortid}}</span><span class="box boxchapter{{$chapter->id}} boxchapter">Chapter: {{$chapter->title}}</span>
                                                            <ul class="nested active ulchapter" id="ulchapter{{$chapter->id}}">
                                                            </ul>
                                                        </li>  
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @else
                                        @foreach($book->parts as $part)
                                            <li id="{{$part->id}}"  contenttype="part" class="lipart">
                                                <span class="right badge badge-success">{{$part->sortid}}</span><span class="box boxpart{{$part->id}} boxpart" >Part: {{$part->title}}</span>
                                                <ul class="nested active ulpart" id="ulpart{{$part->id}}">
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            @include('admin.inc.footer')
        </div>
    </div>
    <div id="modaladdpart" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
                <h2 class="uk-modal-title">Add new Part</h2>
                <label>Title</label>
                <input type="text" id="newparttitle" name="newparttitle">
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close newpart" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary newpart" type="button" id="submitnewpart">Save</button>
                </p>
            </form>
        </div>
    </div>
    <div id="modaladdchapter" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
            <h2 class="uk-modal-title">Add new Chapter</h2>
            <label>Title</label>
            <input type="text" id="newchaptertitle">
            <label>Description (Optional)</label>
            <textarea id="newchapterdescription" class="form-control"></textarea>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close newchapter" type="button">Cancel</button>
                <button class="uk-button uk-button-primary newchapter" type="button" id="submitnewchapter">Save</button>
            </p>
            </form>
        </div>
    </div>
    <div id="modaladdlesson" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
            <h2 class="uk-modal-title">Add new Lesson</h2>
            <label>Title</label>
            <input type="text" id="newlessontitle">
            <label>Type</label>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label>
                    <input class="uk-radio" type="radio" name="lessontype" value="1" checked> Content
                </label>
                <label>
                    <input class="uk-radio" type="radio" name="lessontype" value="2"> External Link
                </label>
            </div>

            <label>Description (Optional)</label>
            <textarea id="newlessondescription"class="form-control"></textarea>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close newlesson" type="button">Cancel</button>
                <button class="uk-button uk-button-primary newlesson" type="button" id="submitnewlesson">Save</button>
            </p>
            </form>
        </div>
    </div>
    <div id="modaladdquiz" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
            <h2 class="uk-modal-title">Add new Chapter Test</h2>
            <label>Quiz Type</label>
            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label>
                    <input class="uk-radio" type="radio" name="quiztype" value="1" checked=""> Custom
                </label>
                <label>
                    <input class="uk-radio" type="radio" name="quiztype" value="2"> Upload a file
                </label>
            </div>
            <label>Title</label>
            <input type="text" id="newquiztitle">

            <label>Instructions (Optional)</label>
            <textarea id="newquizdescription" class="form-control"></textarea>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close newquiz" type="button">Cancel</button>
                <button class="uk-button uk-button-primary newquiz" type="button" id="submitnewquiz">Save</button>
            </p>
            </form>
        </div>
    </div>

    <div id="modalviewupdate" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
                <input type="hidden" id="updateid" >
                <input type="hidden" id="updatetype" >
                <h2 class="uk-modal-title">Title</h2>
                <input type="text" id="updatetitle">
                <label>Description</label>
                <textarea id="updatedescription" class="form-control"></textarea>
                <div class="form-group row" id="sortidcontainer">
                    
                    <label for="updatesortid" class="col-sm-2 col-form-label">Sortid</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="updatesortid" style="border: 1px solid #ddd" disabled>
                    </div>
                    </div>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close modalviewupdate" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary modalviewupdate" type="button" id="updateinfo">Update</button>
                </p>
            </form>
        </div>
    </div>




    <div id="modalviewupdatequiz" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
                <input type="hidden" id="updateidquiz" >
                <input type="hidden" id="updatetype" >
                <h2 class="uk-modal-title">Title</h2>
                <input type="text" id="updatetitlequiz">
                <label>Description</label>
                <textarea id="updatedescriptionquiz" class="form-control"></textarea>
                <label>Quiz points</label>
                <input type="text" id="updatequizpoints">
                <label>Quiz Cover</label> <span class="imageholder"> </span>
                <input type="file" name="editcoverphoto" class="form-control form-control-sm" accept="image/x-png,image/gif,image/jpeg" >
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close modalviewupdate" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary modalviewupdatequiz" type="button" id="updatequizinfo">Update</button>
                </p>
            </form>
        </div>
    </div>
    {{-- <div id="modallinks" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <form>
                <h2 class="uk-modal-title">External links</h2>
                
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close modalviewupdate" type="button">Cancel</button>
                    <button class="uk-button uk-button-primary modalviewupdate" type="button" id="updateinfo">Update</button>
                </p>
            </form>
        </div>
    </div> --}}

    <div id="modalviewquiz" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <label for="quiztype">Quiz</label> 
            </div>
        <div class="uk-modal-dialog uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close modalviewupdate" type="button">Cancel</button>
                <button class="uk-button uk-button-primary modalviewupdate" type="button" id="proceedbtn">Proceed</button>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="classroomModal" tabindex="-1" role="dialog" aria-labelledby="classroomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classroomModalLabel">Classroom Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style= "width:100%" id = "classroomtable">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center" >Classroom Name</th>
                                <th class="text-center" >Classroom Code</th>
                                <th class="text-center">Teacher</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gradeModalLabel">Select Grade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="gradeSelect">Grade:</label>
                    <select class="form-control select2" id="gradeSelect">
                    <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="saveChanges" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    




    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
    
    
    
    <script>

        


        $(document).ready(function(){







            function classroomFunction() {
                var bookid =  '{{$book->bookid}}';

                $.ajax({
                    type:'GET',
                    url: '/classroomassignedtable',
                    data:{

                        bookid:    bookid
                    },
                    success: function(data) {
                        console.log(data);
                        classroomTable = data
                        renderClassroomDataTable1();
                    }
                })

            }


            
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




            var classroomTable;
            $(document).on('click', '#classroomassigned', function(){
                
                classroomFunction();
                $('#classroomModal').modal('show');

            });


            $(document).on('click', '#saveChanges', function(){
                
                var gradeid = $('#gradeSelect').val();
                console.log('Grade ID:', gradeid);

                $.ajax({
                    url: '/adminviewbook/assigngradelevel',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        bookid      :   '{{$book->bookid}}',
                        gradeid  :   gradeid
                    }
                })


                UIkit.notification("<span uk-icon='icon: check' style=\'font-size: 15px;\'></span> Updated successfully", {pos: 'top-right',status:'success', timeout: 4000 });
            });



            // Get the input field and the button
            var inputField = document.getElementById("updatetitle");
            var button = document.getElementById("updateinfo");

            // Execute a function when the Enter key is pressed
            inputField.addEventListener("keyup", function(event) {
                // Check if the Enter key (key code 13) is pressed
                if (event.keyCode === 13) {
                // Trigger the button click event
                button.click();
                }
            });




        

            $('#newlessontitle').on('keyup', function() {
                var inputText = $(this).val();
                console.log(inputText);

                var text = "This is a sample text: with a colon.";

                if (inputText.indexOf(":") !== -1) {


                console.log("The text contains a colon.");
                
                } else {
                
                console.log("The text does not contain a colon.");
                
                }
                // You can perform further actions with the captured inputText here
            });
            @if(count($book->parts) == 0)
                var clickedpart = 0;
            @else
                var clickedpart = 0;
                $('#addchapter').prop('disabled',true)
            @endif
            var clickedchapter;
            var clickedlesson;
            var clickedquiz;
            $(document).on('click','.bookstatus', function(){
                var bookstatus = $(this).val();
                $.ajax({
                    url: '/adminviewbook/updatebookstatus',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        bookid      :   '{{$book->bookid}}',
                        bookstatus  :   bookstatus
                    }
                })
            })

            $(document).on('click','.newquizselection', function(){
                $(this).find('input[type=radio]').prop('checked', true);
                $('.newquizselection').css({
                "border-left": "2px solid white",
                "padding": "20px",
                });

                $(this).css({
                    "border-left": "2px solid dodgerblue",
                    "padding": "20px",
                });
                })

                $(document).on('click','#proceedbtn', function(){

                    var quizType = $('input[name="createquiz"]:checked').val();
                        
                    if (quizType === undefined) {
                            alert("Please select a quiz type");
                            return;
                        }
                    console.log("Quiztype: ", quizType);
                    console.log("Chapterid: ", clickedchapter );
                    console.log("Bookid: ", '{{$book->bookid}}' )

                        //Redirect to the appropriate page based on the quiz type
                        if (quizType === "blank-quiz") {
                            $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/createquiz",
                                    data: { 
                                        chapterid : clickedchapter,
                                        bookid : '{{$book->bookid}}'
                                            },
                                    success: function(response) {

                                        const id = response;
                                        window.open(`/adminviewbook/addquiz/${id}`, '_blank');
                                        
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                            });

                        }else{
                            var quizType = $('input[name="createquiz"]:checked').val();
                            window.open(`/adminviewbook/addquiz/${quizType}`, '_blank');

                        
                        }
                        // } else if (quizType === "select-answer") {
                        //     window.location.href = "/select-answer-quiz-page";
                        // } else {
                        //     // Handle other quiz types here
                        // }


                    // quizcreate
                    
                    // window.location.href = '/adminviewbook/addquiz';
                    console.log("Hello from New Zealand")
                });
                



            $(document).on('click','#buttonupdateinfo', function(){
                var updatebookinfoform ='<form action="/adminviewbook/updatebookinfo" method="post" id="bookinfoupdate"  enctype="multipart/form-data">'+
                                        '@csrf'+
                                        '<label class="text-left">Cover Photo</label>'+
                                        '<input type="file" name="editcoverphoto" class="form-control form-control-sm" accept="image/x-png,image/gif,image/jpeg" >'+
                                        '<br/>'+
                                        '<label class="text-left">Book title</label>'+
                                        '<input type="hidden" name="editbookid" value="{{$book->bookid}}" style="border: 1px solid #ddd;">'+
                                        '<input type="title" name="editbooktitle" value="{{$book->booktitle}}" style="border: 1px solid #ddd;">'+
                                        '<br/>'+
                                        '<label class="text-left">Book description</label>'+
                                        '<textarea name="editbookdescription"  id="editbookdescription" style="border: 1px solid #ddd;">{{$book->bookdescription}}</textarea>'+
                                        '</form>';
                Swal.fire({
                    title: 'Book Info',
                    html: updatebookinfoform,
                    customClass: 'swal-wide',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Update',
                    onOpen: function () {
                        $('.select2').select2({
                            minimumResultsForSearch: 15,
                        });
                        // $('#editbookdescription').summernote({
                        //     height: 250,
                        //     toolbar: [
                        //         ['style', ['bold', 'italic', 'underline', 'clear']],
                        //         ['font', ['strikethrough', 'superscript', 'subscript']],
                        //         ['fontsize', ['fontsize']],
                        //         ['color', ['color']],
                        //         ['para', ['ul', 'ol', 'paragraph']],
                        //         ['height', ['height']]
                        //     ]
                        // })
                    },
                    preConfirm: () => {
                        if($('input[name="editbooktitle"]').val().replace(/^\s+|\s+$/g, "").length == 0){
                            Swal.showValidationMessage(
                                "Book title is required!"
                            );
                        }
                    }
                }).then((confirm) => {
                    if (confirm.value) {
                        $('#bookinfoupdate').submit()
                    }
                })
            })
            $(document).on('click', '.boxpart', function(){
                var id = $(this).closest('li').attr('id');
                clickedpart = id;
                $('#addchapter').removeAttr('disabled')
                $('.lipart span.boxpart').css('background-color','unset')
                $('.boxpart'+id).css('background-color','#a4ffd8')
                $.ajax({
                    url: '/adminviewbook/getchapters',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   id
                    },
                    success: function(data)
                    {
                        $('.ulpart').empty();
                        $.each(data, function(key, value){
                            $('#ulpart'+id).append(
                                '<li id="'+value.id+'"  contenttype="chapter" class="lichapter">'+
                                    '<span class="right badge badge-warning"  contenteditable="true">'+value.sortid+'</span><span class="box boxchapter'+value.id+' boxchapter" >Chapter: '+value.title+'</span>'+
                                    '<ul class="nested active ulchapter" id="ulchapter'+value.id+'"></ul>'+
                                '</li>'
                            )
                        })
                        $('.btn-group-horizontal').empty();
                        $('.btn-group-horizontal').append(
                            '<button type="button" class="btn btn-sm btn-info mr-2 viewinfo" id="viewpartinfo" partid="'+id+'" uk-toggle="target: #modalviewupdate"><i class="fa fa-question"></i> View info</button>'+
                            '<button type="button" class="btn btn-sm btn-info mr-2" id="addpart" uk-toggle="target: #modaladdpart" ><i class="fa fa-plus"></i> Part</button>'+
                            '<button type="button" class="btn btn-sm btn-info" id="addchapter" uk-toggle="target: #modaladdchapter"><i class="fa fa-plus"></i> Chapter / Unit</button>'
                        );
                        $('.boxpart'+id+' i').remove()
                        $('.boxpart'+id).append('<i class="fa fa-times ml-2 removeitem"></i>')

                    }
                })
            })


            $(document).on('input', '#lessonsortid', function() {
                    var sortid = $(this).text();
                    var type = $(this).data('span');
                    var id = $(this).data('id');



                    console.log("Sort: " ,sortid, "Type: " , type ,"ID: " , id);

                    $.ajax({
                                type: "GET",
                                url: "/adminviewbook/updatesort",
                                data: { 
                                    sortid : sortid,
                                    type : type,
                                    id      : id
                                        }
                        });


            });

                
            $(document).on('click', '.boxchapter', function(){
                var id = $(this).closest('li').attr('id');
                clickedchapter = id;
                $('.lichapter span.boxchapter').css('background-color','unset')
                $('.boxchapter'+id).css('background-color','#ffffb3')
                console.log($('.boxchapter'+id))

                $.ajax({
                    url: '/adminviewbook/getlessons',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   id
                    },
                    success: function(data)
                    {
                        $('.ulchapter').empty();
                        $.each(data, function(key, value){
                            if(value.type == 'l')
                            {
                                $('#ulchapter'+id).append(
                                    '<li id="'+value.id+'"  contenttype="lesson" class="lilesson">'+
                                        '<span class="right badge badge-info" id ="lessonsortid" data-id="'+value.id+'" data-span="lesson" contenteditable="true" >'+value.sortid+'</span><span class="box boxlesson'+value.id+' boxlesson">Lesson: '+value.title+' <i class="fa fa-times ml-2 removeitem"></i></span>'+
                                        '<ul class="nested active ullesson" id="lesson'+value.id+'"></ul>'+
                                    '</li>'
                                )
                            }
                            else if(value.type == 'q'){
                                $('#ulchapter'+id).append(
                                    '<li id="'+value.id+'"  contenttype="quiz" class="liquiz">'+
                                        '<span class="right badge badge-info" id ="lessonsortid" data-id="'+value.id+'" data-span="quiz" contenteditable="true">'+value.sortid+'</span><span class="box boxquiz'+value.id+' boxquiz">Quiz: '+value.title+' <i class="fa fa-times ml-2 removeitem"></i></span>'+
                                        '<ul class="nested active ulquiz" id="quiz'+value.id+'"></ul>'+
                                    '</li>'
                                )
                            }
                        })
                        $('.btn-group-horizontal').empty();
                        $('.btn-group-horizontal').append(
                            '<button type="button" class="btn btn-sm btn-info mr-2 viewinfo" id="viewchapterinfo" uk-toggle="target: #modalviewupdate" chapterid="'+id+'" ><i class="fa fa-question"></i> View info</button>'+
                            '<button type="button" class="btn btn-sm btn-info mr-2" id="addchapter" uk-toggle="target: #modaladdchapter"><i class="fa fa-plus"></i> Chapter / Unit</button>'+
                            '<button type="button" class="btn btn-sm btn-info mr-2" id="addlesson" uk-toggle="target: #modaladdlesson"><i class="fa fa-plus"></i> Lesson</button>'+
                            '<button type="button" class="btn btn-sm btn-info mr-2 selectQuiz" uk-toggle="target: #modalviewquiz"><i class="fa fa-plus"></i> Quiz</button>'
                            // '<a href="/adminviewbook/addquiz" type="button" class="btn btn-sm btn-info mr-2" target="_blank" id="addquiz" > Quiz</a>'
                        );
                        $('.boxchapter'+id+' i').remove()
                        $('.boxchapter'+id).append('<i class="fa fa-times ml-2 removeitem"></i>')

                    }
                })
            })
            $(document).on('click', '.boxlesson', function(){
                var id = $(this).closest('li').attr('id');
                clickedlesson = id;
                $('.lilesson span.boxlesson').css('background-color','unset')
                $('.boxlesson'+id).css('background-color','#bdf5ff')
                $('.btn-group-horizontal').empty();
                $('.btn-group-horizontal').append(
                    '<button type="button" class="btn btn-sm btn-info mr-2 viewinfo" id="viewlessoninfo" uk-toggle="target: #modalviewupdate" lessonid="'+id+'" ><i class="fa fa-question"></i> View info</button>'+
                    '<a href="/adminviewbook/lessoncontents?formlessonid='+id+'" type="button" class="btn btn-sm btn-warning mr-2 viewinfo" target="_blank" id="viewlessoncontent" > View Contents</a>'
                );
                

            })

            $(document).on('click', '.selectQuiz', function(){
                console.log("Hello From Philippines");

                $.ajax({
                                    type: "get",
                                    dataType: 'json',
                                    url: "/adminviewbook/getquizlist",
                                    data: { 
                                        chapterid : clickedchapter,
                                        bookid : '{{$book->bookid}}'
                                            },
                                    success: function(response) {

                                        $('#modalviewquiz .uk-modal-body .newquizselection').remove();
                                        console.log(response);
                                        $('#modalviewquiz .uk-modal-body').append(
                                        '<div class="form-group newquizselection">'+
                                        '<label for="blank-quiz" class="uk-flex uk-flex-middle">'+
                                            '<input type="radio" name="createquiz" id="blank-quiz" value="blank-quiz" class="uk-radio uk-margin-small-right quizcreate">'+ 
                                            '<i class="fa fa-file-word mr-2" style="font-size: 24px; color: gray "></i><span>Create New Quiz</span>'+
                                        '</label>' +
                                        '</div>');

                                        // Loop through the response and append quiz selections to the modal body
                                        // for (var i = 0; i < response.length; i++) {
                                        // var quiz = response[i];
                                        // var quizHtml = '<div class="form-group newquizselection">'+
                                        //     '<label for="quiz-'+ quiz.id +'">'+
                                        //     '<input type="radio" name="createquiz" id="quiz-'+ quiz.id +'" value="'+ quiz.id +'" class="uk-radio uk-margin-small-right">' +
                                        //     '<i class="fa fa-file-word mr-2" style="font-size: 24px; color: gray "></i>'+
                                        //     '<span style="font-size: 18px; color: black">'+ quiz.title +'</span><br/>' +
                                        //     '<span style="padding-left: 55px; padding-top:-5px; color: gray ">'+ quiz.description +'</span>' +
                                        //     '</label>'+
                                        //     '</div>';
                                        // $('#modalviewquiz .uk-modal-body').append(quizHtml);
                                        // }
                                    },
                                    error: function(xhr) {
                                        // Handle error here
                                    }
                    });
                

            })
            $(document).on('click', '.boxquiz', function(){
                var id = $(this).closest('li').attr('id');
                clickedquiz = id;
                $('.liquiz span.boxquiz').css('background-color','unset')
                $('.boxquiz'+id).css('background-color','#ffcce6')
                $('.btn-group-horizontal').empty();
                $('.btn-group-horizontal').append(
                    '<button type="button" class="btn btn-sm btn-info mr-2 viewinfoquiz" id="viewquizinfo" uk-toggle="target: #modalviewupdatequiz" quizid="'+id+'" ><i class="fa fa-question"></i> View info</button>'+
                    '<a href="/adminviewbook/addquiz/'+id+'" type="button" class="btn btn-sm btn-warning mr-2 viewinfo" target="_blank" id="viewlessoncontent" > View Contents</a>'
                );

                window.open(`/adminviewbook/addquiz/${quizType}`, '_blank');

            })
            $(document).on('click', '#viewpartinfo', function(){
                $.ajax({
                    url: '/adminviewbook/getpartinfo',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   clickedpart
                    },
                    success: function(data)
                    {
                        $('#updatesortid').attr('disabled', false)
                        $('#modalviewupdate').removeClass('uk-modal-close')
                        $('#updatesortid').val(data.sortid)
                        $('#updateid').val(data.id)
                        $('#updatetype').val('part')
                        $('#updatetitle').val(data.title)
                        $('#updatedescription').val(data.description)
                    }
                })
            })
            $(document).on('click', '#viewchapterinfo', function(){
                $.ajax({
                    url: '/adminviewbook/getchapterinfo',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   clickedchapter
                    },
                    success: function(data)
                    {
                        $('#updatesortid').attr('disabled', false)
                        $('#modalviewupdate').removeClass('uk-modal-close')
                        $('#updatesortid').val(data.sortid)
                        $('#updateid').val(data.id)
                        $('#updatetype').val('chapter')
                        $('#updatetitle').val(data.title)
                        $('#updatedescription').val(data.description)
                    }
                })
            })
            $(document).on('click', '#viewlessoninfo', function(){
                $.ajax({
                    url: '/adminviewbook/getlessoninfo',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   clickedlesson
                    },
                    success: function(data)
                    {
                        $('#updatesortid').attr('disabled', false)
                        $('#modalviewupdate').removeClass('uk-modal-close')
                        $('#updatesortid').val(data.sortid)
                        $('#updateid').val(data.id)
                        $('#updatetype').val('lesson')
                        $('#updatetitle').val(data.title)
                        $('#updatedescription').val(data.description)
                    }
                })
            })
            $(document).on('click', '#viewquizinfo', function(){




                console.log('Hello World');

                console.log(clickedquiz)



                $.ajax({
                    url: '/adminviewbook/getquizinfo',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   clickedquiz
                    },
                    success: function(data)
                    {

                        console.log(data);

                        $('#modalviewupdatequiz').removeClass('uk-modal-close')
                        $('#updateidquiz').val(data.id)
                        $('#updatedescriptionquiz').val(data.description)
                        $('.imageholder').text(data.picurl)
                        $('#updatetitlequiz').val(data.title)
                        $('#updatedescription').val(data.description)
                    }
                })
            })



            $(document).on('click', '#updateinfo', function(){




                $.ajax({
                    url: '/adminviewbook/updateinfo',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id      :   $('#updateid').val(),
                        contentsortid      :   $('#updatesortid').val(),
                        type      :   $('#updatetype').val(),
                        title      :   $('#updatetitle').val(),
                        description      :   $('#updatedescription').val()
                    },
                    success: function(data)
                    {
                        var updatelabel = (data.type).charAt(0).toUpperCase() + (data.type).slice(1)
                        $('.box'+data.type+data.id).closest('li').find('.badge').text(data.contentsortid)
                        $('.box'+data.type+data.id).empty();
                        $('.box'+data.type+data.id).append(
                            updatelabel+': '+data.title+' <i class="fa fa-times ml-4 removeitem"></i>'
                        );
                        UIkit.notification("<span uk-icon='icon: check' style=\'font-size: 15px;\'></span> Updated successfully", {pos: 'top-right',status:'success', timeout: 4000 });
                        $('#modalviewupdate').removeClass('uk-open')
                        $('#modalviewupdate').addClass('uk-modal-close')
                        $('#modalviewupdate form')[0].reset();
                    }
                })
            })




            $(document).on('click', '#updatequizinfo', function(){

                var id = $('#updateidquiz').val()

                console.log('id:');
                console.log(id);
                var selectedFile = $('input[name=editcoverphoto]')[0].files[0];
                var title = $('#updatetitlequiz').val();
                var description = $('#updatedescriptionquiz').val();
                var points = $('#updatequizpoints').val();


                var formData = new FormData();
                formData.append('selectedFile', selectedFile);
                formData.append('id', id);
                formData.append('title', title);
                formData.append('description', description);
                formData.append('points', points);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                console.log(csrfToken);

                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                    });


                $.ajax({
                    url: '/adminviewbook/quiz/updateinfo',
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function() {
                        UIkit.notification("<span uk-icon='icon: check'></span> Updated Successfully!", { status: 'success', timeout: 1000 });
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.log(xhr.responseText); // Log the error response
                        UIkit.notification("<span uk-icon='icon: warning'></span> Error occurred during update!", { status: 'danger', timeout: 1000 });
                    }
                });




            })



            $(document).on('click','#submitnewpart', function(){
                var newparttitle = $('#newparttitle').val();
                $.ajax({
                    url: '/adminviewbook/addpart',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        title      :   newparttitle,
                        bookid      : '{{$book->bookid}}'
                    },
                    success: function(data)
                    {
                        $('#heirarchytree').append(
                            '<li id="'+data.id+'"  contenttype="part" class="lipart">'+
                                '<span class="box boxpart'+data.id+' boxpart" >Part '+data.title+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                                '<ul class="nested active ulpart" id="ulpart'+data.id+'"> </ul>'+
                            '</li>'
                        )
                        UIkit.notification("<span uk-icon='icon: check' style=\'font-size: 15px;\'></span> Part: "+data.title+" added successfully", {pos: 'top-right',status:'success', timeout: 4000 });
                        $('#modaladdpart').removeClass('uk-open')
                        $('#modaladdpart').addClass('uk-modal-close')
                        $('#modaladdpart').removeClass('uk-modal-close')
                        $('#modaladdpart form')[0].reset();

                    }
                })
            })
            $(document).on('click','#submitnewchapter', function(){
                var newchaptertitle = $('#newchaptertitle').val();
                var newchapterdescription = $('#newchapterdescription').val();
                $.ajax({
                    url: '/adminviewbook/addchapter',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        title      :   newchaptertitle,
                        description      :   newchapterdescription,
                        bookid      : '{{$book->bookid}}',
                        partid      : clickedpart
                    },
                    success: function(data)
                    {
                        $('#ulpart'+clickedpart).append(
                            '<li id="'+data.id+'"  contenttype="chapter" class="lichapter">'+
                                '<span class="box boxchapter'+data.id+' boxchapter" >Chapter: '+data.title+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                                '<ul class="nested active ulchapter" id="ulchapter'+data.id+'"></ul>'+
                            '</li>'
                        )
                        UIkit.notification("<span uk-icon='icon: check' style=\'font-size: 15px;\'></span> Chapter: "+data.title+" added successfully", {pos: 'top-right',status:'success', timeout: 4000 });
                        $('#modaladdchapter').removeClass('uk-open')
                        $('#modaladdchapter').addClass('uk-modal-close')
                        $('#modaladdchapter').removeClass('uk-modal-close')
                        $('#modaladdchapter form')[0].reset();

                    }
                })
            })
            $(document).on('click','#submitnewlesson', function(){
                // console.log($('input[name="lessontype"]').val())
                var newlessontitle = $('#newlessontitle').val();
                var newlessontype = $('input[name="lessontype"]:checked').val();
                var newlessondescription = $('#newlessondescription').val();
                $.ajax({
                    url: '/adminviewbook/addlesson',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        title      :   newlessontitle,
                        description      :   newlessondescription,
                        lessontype      : newlessontype,
                        chapterid      : clickedchapter
                    },
                    success: function(data)
                    {
                        $('#ulchapter'+clickedchapter).append(
                            '<li id="'+data.id+'"  contenttype="lesson" class="lilesson">'+
                                '<span class="box boxlesson'+data.id+' boxlesson" >Lesson: '+data.title+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                                '<ul class="nested active ullesson" id="lesson'+data.id+'"></ul>'+
                            '</li>'
                        )
                        UIkit.notification("<span uk-icon='icon: check' style=\'font-size: 15px;\'></span> Chapter: "+data.title+" added successfully", {pos: 'top-right',status:'success', timeout: 4000 });
                        $('#modaladdlesson').removeClass('uk-open')
                        $('#modaladdlesson').addClass('uk-modal-close')
                        $('#modaladdlesson').removeClass('uk-modal-close')
                        $('#modaladdlesson form')[0].reset();

                    }
                })
            })
            $(document).on('click','#submitnewquiz', function(){
                var newquiztitle = $('#newquiztitle').val();
                var newquizdescription = $('#newquizdescription').val();
                var newquiztype = $('input[name="quiztype"]:checked').val();
                $.ajax({
                    url: '/adminviewbook/addquiz',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        title      :   newquiztitle,
                        description    :   newquizdescription,
                        type      : newquiztype,
                        chapterid      : clickedchapter
                    },
                    success: function(data)
                    {
                        $('#ulchapter'+clickedchapter).append(
                            '<li id="'+data.id+'"  contenttype="quiz" class="liquiz">'+
                                '<span class="box boxquiz'+data.id+' boxquiz" >Quiz: '+data.title+' <i class="fa fa-times ml-4 removeitem"></i></span>'+
                                '<ul class="nested active ulquiz" id="quiz'+data.id+'"></ul>'+
                            '</li>'
                        )
                        UIkit.notification("<span uk-icon='icon: check' style=\'font-size: 15px;\'></span> Quiz: "+data.title+" added successfully", {pos: 'top-right',status:'success', timeout: 4000 });
                        
                        $('#modaladdquiz').removeClass('uk-open')
                        $('#modaladdquiz').addClass('uk-modal-close')
                        $('#modaladdquiz').removeClass('uk-modal-close')
                        $('#modaladdquiz form')[0].reset();

                    }
                })
            })
            $(document).on('click', '.removeitem', function(){
                var classification = $(this).closest('li').attr('contenttype');
                var id = $(this).closest('li').attr('id');
                var updatelabel = classification.charAt(0).toUpperCase() + classification.slice(1)
                var removeelem = $(this).closest('li');
                if($(this).closest('li').find('ul').children().length == 0){
                    Swal.fire({
                        title: 'Are you sure you want to delete selected content?',
                        text: $(this).attr('label'),
                        type: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Delete',
                        showCancelButton: true,
                        allowOutsideClick: false
                    }).then((confirm) => {
                        if (confirm.value) {

                            $.ajax({
                                url: '/adminviewbook/deletebycontenttype',
                                type: 'get',
                                dataType: 'json',
                                data: {
                                    contenttype :   classification,
                                    id          :   id
                                },
                                complete: function(data){
                                    removeelem.remove()
                                    Swal.fire({
                                        title: 'Deleted successfully',
                                        type: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Close',
                                        allowOutsideClick: false
                                    })
                                }
                            })
                        }
                    })
                }else{
                    
                    Swal.fire({
                        title: 'This '+updatelabel+' is not empty!',
                        type: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Close',
                        allowOutsideClick: false
                    })
                }
                
                $('.swal2-textarea').remove()
                
            })
            $(document).on('click', '#buttondeletebook', function(){
                var bookid = '{{$book->bookid}}';
                Swal.fire({
                    title: 'Are you sure you want to delete this book?',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Yes',
                    showCancelButton: true,
                    allowOutsideClick: false
                }).then((confirm) => {
                    if (confirm.value) {

                        Swal.fire({
                            title: 'Authorized personnel only',
                            type: 'warning',
                            input: 'password',
                            inputAttributes: {
                                id: 'passworddelete'
                            },
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Delete',
                            showCancelButton: true,
                            allowOutsideClick: false,
                            preConfirm: () => {
                                if($('#passworddelete').val().replace(/^\s+|\s+$/g, "").length == 0){
                                    Swal.showValidationMessage(
                                        "Password is required!"
                                    );
                                }
                            }
                        }).then((confirm) => {
                            if (confirm.value) {
                                $.ajax({
                                    url: '/adminviewbook/deletebook',
                                    type: 'get',
                                    dataType: 'json',
                                    data: {
                                        bookid           :   bookid,
                                        password         :   $('#passworddelete').val()
                                    },
                                    success: function(data){
                                        // console.log(data)
                                        if(data == 0)
                                        {
                                            Swal.fire({
                                                title: 'Cannot be deleted!',
                                                type: 'error',
                                                confirmButtonColor: '#3085d6',
                                                confirmButtonText: 'Close',
                                                allowOutsideClick: false
                                            })
                                        }
                                        else if(data == 1)
                                        {
                                            Swal.fire({
                                                title: 'Book deleted successfully!',
                                                type: 'success',
                                                confirmButtonColor: '#3085d6',
                                                confirmButtonText: 'Close',
                                                allowOutsideClick: false
                                            }).then((confirm) => {
                                                window.location.href = "{{URL::to('/adminbooks/index')}}"
                                            })
                                        }
                                    }
                                })
                            }
                        })
                    }
                })
                
                
            })


            function renderClassroomDataTable1(){
                $("#classroomtable").DataTable({
                    responsive: true,
                    autowidth: false,
                    destroy: true,
                    searching: false,
                    //scrollX: true,
                    data:classroomTable,
                    order: [[0, 'asc']],
                    lengthChange: false,
                    ordering: false,
                    columns: [
                        { "data": null},
                        { "data": null},
                        { "data": null},
                        { "data": null},
                    ],
                    columnDefs: [
                        {
                            'targets': 0,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {
                                    var text = '<a class="mb-0">'+(row + 1)+'</a>'
                                    $(td)[0].innerHTML =  text
                                    $(td).addClass('text-center')
                                    $(td).addClass('align-middle')
                            }
                        },
                    
                    
                        {
                            'targets': 1,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {
                                    var text = '<a class="mb-0">'+rowData.classroomname +'</a>'
                                    $(td)[0].innerHTML =  text
                                    $(td).addClass('text-center')
                                    $(td).addClass('align-middle')
                            }
                        },
                        {
                            'targets': 2,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {
                                var text = '<a class="mb-0">'+rowData.code+'</a>'
                                $(td)[0].innerHTML =  text
                                $(td).addClass('text-center')
                                $(td).addClass('align-middle')
                            }
                        },
                        {
                            'targets': 3,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {
                                var text = '<a class="mb-0">'+ rowData.teacher +'</a>'
                                $(td)[0].innerHTML =  text
                                $(td).addClass('text-center')
                                $(td).addClass('align-middle')
                            }
                        },
                    ]
                });
        }
        })
                                                        
    </script>
@endsection