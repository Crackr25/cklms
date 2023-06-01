@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li>View Response</li>
        </ul>
    </nav>

@endsection

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row m-2 mb-4">
                        <div class="col-md-4 form-group">
                            <label for="classroom"><b>Classroom:</b></label>
                            <select class="form-control select2" id="classroom">
                                <option value="">Select Classroom</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="classroom"><b>Quiz:</b></label>
                            <select class="form-control select2" id="quiz">
                                <option value="">Select Quiz</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="classroom"><b>Student:</b></label>
                            <select class="form-control select2" id="student">
                                <option value="">Select Student</option>
                            </select>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><b>Active Quiz</b></span>
                        <div>
                            <button class="btn btn-sm btn-default refresh_table">Refresh</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="quizTable2">
                        <table id="quizDataTable2" class="table table-striped" style="width:100%">
                            <thead class ="thead-dark">
                                <tr>
                                    <th>Quiz Title</th>
                                    <th>Date</th>
                                    <th>Attempts</th>
                                    <th>Activated on</th>
                                    <th class="text-center align-middle ">Response</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {

    $('#classroom').select2({
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
        $('#quiz').select2({
                            width: '100%',
                            allowClear: true,
                            placeholder: "All",
                            "language": {
                                "noResults": function () {}
                            },
                            escapeMarkup: function (markup) {
                                return markup;
                            },
                            ajax: {
                                url: "{{route('quizSelect')}}",
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
                                error: function (xhr, textStatus, errorThrown) {
                                    console.log("Error:", errorThrown);
                                    // Handle the error here (e.g., show an error message to the user)
                                }
                            }
        });



    $('#student').select2({
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
                                                classroomid: $('#classroom').val(),
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

    var activequiz;

    getActiveQuiz()

    
    function getActiveQuiz() {

            $.ajax({
                type:'GET',
                url: '/teachergetactivequiz',
                data:{
                    classroom    : $('#classroom').val(),
                    student      : $('#student').val(),
                    quiz         : $('#quiz').val(),
                },
                success: function(data) {
                    activequiz = data
                    console.log(activequiz)
                    renderQuizDataTable()
                }
            })

    }

    $(document).on('change','#classroom',function(){

            getActiveQuiz()

    })


    $(document).on('change','#quiz',function(){

            getActiveQuiz()

        })

    $(document).on('change','#student',function(){

            getActiveQuiz()

        })
    $(document).on('click','.refresh_table',function(){
                console.log("Refreshed")
                getActiveQuiz()
    })

    function getQuizResponses(quizID) {
            return $.ajax({
                type:'GET',
                url: 'teacher/quizresponses',
                data:{
                    classroom    : $('#classroom').val(),
                    student      : $('#student').val(),
                    quizID       : quizID,
                }
            })
    }




    function renderQuizDataTable(){
            $("#quizDataTable2").DataTable({
                responsive: true,
                destroy: true,
                data:activequiz,
                order: [[0, 'asc']],
                lengthChange: false,
                ordering: false,
                columns: [
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": "search"}
                ],
                columnDefs: [
                    {
                        'targets': 0,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                                var text = '<a class="mb-0">'+rowData.title+'</a>'
                                $(td)[0].innerHTML =  text
                                $(td).addClass('text-center')
                                $(td).addClass('align-middle')
                        }
                    },
                    {
                        'targets': 1,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse(rowData.datefrom));
                            var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                            var date3 =  new Date(Date.parse( '1970-01-01T' + rowData.timefrom));
                            const timeString = date3.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var date4 =  new Date(Date.parse(rowData.dateto));
                            var markdate2 = date4.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                            var date5 =  new Date(Date.parse( '1970-01-01T' + rowData.timeto));
                            const timeString2 = date5.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var text = '<a class="mb-0">'+markdate+' '+timeString+ ' - ' +markdate2+' '+timeString2+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 2,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var text = '<a class="mb-0">'+rowData.noofattempts+'</a>'
                            $(td)[0].innerHTML =  text
                            $(td).addClass('text-center')
                            $(td).addClass('align-middle')
                        }
                    },
                    {
                        'targets': 3,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 = new Date(Date.parse(rowData.createddatetime));
                            const dateString = date2.toLocaleDateString("en-US", { year: "numeric", month: "long", day: "numeric" });
                            const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var text = '<a class="mb-0">'+ dateString + ' ' + timeString +'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 4,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            getQuizResponses(rowData.id).then(function(data) {

                                var latestEntries = {}

                                // Iterate through the data and update the latest entry for each submittedby
                                data.forEach(entry => {
                                    const submittedby = entry.submittedby;
                                    const datetime = new Date(entry.submitteddatetime);
                                    
                                    if (!latestEntries[submittedby] || datetime > latestEntries[submittedby].datetime) {
                                        latestEntries[submittedby] = { entry, datetime };
                                    }
                                });


                                var buttons = '<a href="#" class="response ml-4 text-blue-500" data-id="'+rowData.id+'">Responses ('+Object.keys(latestEntries).length+')</a>';

                                $(td)[0].innerHTML =  buttons
                            })

                            $(td).addClass('text-center')
                            $(td).addClass('align-middle')
                        }
                    }
                ]
            });
        }




    });


</script>


@endsection