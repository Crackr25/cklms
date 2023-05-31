@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li>Quiz</li>
        </ul>
    </nav>

@endsection

<style>

    .randomize-checkbox {
        display: inline !important;
        width: 21px !important;
        padding: 0 !important;
        border: 0 !important;
        height: 21px !important;
        margin-bottom: 0 !important;
    }
    .randomize-label {
        margin: 0 !important;
        padding: 0 !important;
        display: inline !important;
    }
    /* CSS */
    .select2-container {
    width: 100%;
    }

</style>


@section('content')


<div id="modal-close-default" uk-modal> 
        <div class="uk-modal-dialog uk-modal-body"> 
            <button class="uk-modal-close-default" type="button" uk-close></button> 
            <h2 class="uk-modal-title">Create New Quiz</h2> 

            <div class="uk-margin">
                <label class="uk-form-label" for="form-horizontal-text">Quiz Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="quizname" type="text" placeholder="Quiz Title" autocomplete="off">
                </div>
            </div>
            <div class="uk-margin">
                <a href="#" type="button" class="btn btn-success uk-first-column" id="create_quiz" >
                    Create Quiz
                </a>
            </div>
        </div> 
    </div>




    <div class="container">
            <div class="section-header pb-0">
                <div class="section-header-left">
                    <h1>Quiz</h1>
                </div>
                <div class="section-header-right">
                    <a href="/teacherviewresponse" target="_blank" class="btn bs-placeholder btn-default" id="viewresponse"> <i class="fas fa-eye mr-1"></i> View Response</a>
                    <a href="#" class="btn bs-placeholder btn-default" id="addquiz" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add Quiz</a>
                </div>
            </div>
            <div class="section-small" id="quiz_table_holder">
            </div>
    </div>


    <div class="modal fade" id="activateQuizModal" tabindex="-1" aria-labelledby="quizModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activateQuizModalLabel" style="color:white" >Activate Quiz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="was-validated">
                        <div class="form-group">
                            <label for="attempts">Select Classroom</label>
                            <select id="select-classroom" class="select-classroom select2" name="classroom">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="attempts">Select Students</label>
                            <select id="select-students" class="select-students select2" name="students[]" multiple="multiple">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dateFrom">Date From</label>
                            <input type="date" class="form-control" id="date-from" name="dateFrom" required>
                        </div>
                        <div class="form-group">
                            <label for="timeFrom">Time From</label>
                            <input type="time" class="form-control" id="time-from" name="timeFrom" required>
                        </div>
                        <div class="form-group">
                            <label for="dateTo">Date To</label>
                            <input type="date" class="form-control" id="date-to" name="dateTo" required>
                        </div>
                        <div class="form-group">
                            <label for="timeTo">Time To</label>
                            <input type="time" class="form-control" id="time-to" name="timeTo" required>
                        </div>
                        <div class="form-group">
                            <label for="attempts">Number of Attempts</label>
                            <input type="number" class="form-control" id="attempts" name="attempts" required>
                        </div>
                        <div class="form-group">
                            <input class="randomize-checkbox" type="checkbox" value="" id="randomizeQuestion">
                            <label class="randomize-label" for="randomizeQuestion">
                                Randomize Quiz Questions
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success activate">Save</button>
                </div>
            </div>
        </div>
    </div>
            




    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script>


        $(document).ready(function(){

            //quizid
            var selectedQuizId;

            $('#select-classroom').select2({
                
            });
            

            loadquiz()

            function loadquiz(){

                console.log('loading');

                $.ajax({
                    url: "/teacherquizzes?table=table",
                    type:"GET",
                    success: function(data){

                        $('#quiz_table_holder').append(data)
                
                    }
                })
                
            }

            

        $(document).on('click','#create_quiz',function(){

            var validInput = true

            if($('input[name=quizname]').val() == ''){

                UIkit.notification("<span uk-icon='icon: check'></span> Quiz title is required!", {status:'success', timeout: 1500 });

                validInput = false
                console.log('invalid')
            }
            
            if(validInput){

                $.ajax({
                        url: '/teacherquiz/create',
                        type:"GET",
                        data:{
                            quizname: $('input[name=quizname]').val(),
                        },
                        success: function(data){
                            skip = null
                            UIkit.notification("<span uk-icon='icon: check'></span> Created Successfully!", {status:'success', timeout: 1000 });

                            window.location.href = `/teacherquiz/quiz/${data}`;
                        }
                })

            }

        })

        $(document).on('click','.activatequiz',function(){

            $('#activateQuizModal').modal('show');
            selectedQuizId = $(this).data('id');
            console.log(selectedQuizId);

        })

        $(document).on('change','#select-classroom',function(){

            console.log($(this).val());

        })




        $('#select-classroom').select2({
                            width: '100%',
                            allowClear:true,
                            placeholder: "All",
                            "language": {
                                    "noResults": function(){
                                    }
                            },
                            escapeMarkup: function (markup) {
                                    return markup;
                            },
                            ajax: {
                                    url: "{{route('classroomSelect')}}",
                                    data: function (params) {
                                        var query = {
                                                search: params.term,
                                                page: params.page || 0
                                        }
                                        return query;
                                    },
                                    dataType: 'json',
                                    
                                    processResults: function (data, params) {
                                        params.page = params.page || 0;
                                        return {
                                                results: data.results,
                                                pagination: {
                                                    more: data.pagination.more
                                                }
                                        };
                                        
                                    },
                            }
        })

        $('#select-students').select2({
                            width: '100%',
                            allowClear:true,
                            placeholder: "All",
                            "language": {
                                    "noResults": function(){
                                    }
                            },
                            escapeMarkup: function (markup) {
                                    return markup;
                            },
                            ajax: {
                                    url: "{{route('studentSelect')}}",
                                    data: function (params) {
                                        var query = {
                                                classroomid: $('#select-classroom').val(),
                                                search: params.term,
                                                page: params.page || 0
                                        }
                                        return query;
                                    },
                                    dataType: 'json',
                                    
                                    processResults: function (data, params) {
                                        params.page = params.page || 0;
                                        return {
                                                results: data.results,
                                                pagination: {
                                                    more: data.pagination.more
                                                }
                                        };
                                        
                                    },
                            }

        });

        $("button[type='submit']").click(function(event) {

            event.preventDefault();

            var dateFrom = $('#date-from').val();
            var timeFrom = $('#time-from').val();
            var dateTo = $('#date-to').val();
            var timeTo = $('#time-to').val();
            var attempts = $('#attempts').val();
            var students = $('#select-students').val();
            var isRandomize;
            var quizSchedStat = 0;
            var classroom = $('#select-classroom').val();

            if (!dateFrom || !timeFrom || !dateTo || !timeTo || !attempts || !classroom ) {
                alert('Please fill in all fields.');
                return;
            }



            // check if the date and time inputs are valid
            if (new Date(dateFrom + 'T' + timeFrom + ':00') >= new Date(dateTo + 'T' + timeTo + ':00')) {
                alert('The date and time inputs are not valid.');
                return;
            }

            // check if randomize button is checked
            if ($('#randomizeQuestion').prop('checked')) {
                isRandomize = 1
            } else {
                isRandomize = 0
            }

            // if the form inputs are valid, submit the form
            $(".activate").prop('disabled', true)
            $.ajax({
                type:'GET',
                url: '/teachertestavailability',
                data:{
                    dateFrom    : dateFrom,
                    timeFrom    : timeFrom,
                    dateTo      : dateTo,
                    timeTo      : timeTo,
                    attempts    : attempts,
                    quizId      : selectedQuizId,
                    classroomId : classroom,
                    allowed_students: students,
                    status      : quizSchedStat,
                    randomize   : isRandomize
                },
                success: function(data) {

                    // enable back the save button
                    $(".activate").prop('disabled', false)

                    // hide modal
                    $("#activateQuizModal").modal('hide');
                }
            })


        });

        })

    </script>


@endsection