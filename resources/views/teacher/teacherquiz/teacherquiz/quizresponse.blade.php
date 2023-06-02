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

<style>


    .clickable {
    cursor: pointer;
    }

    .tooltip-td {
    padding: 0;
    }


</style>
</head>

@section('content')

<!-- Modals -->
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Responses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date &amp; Time Submitted</th>
                <th>No. of Attempts</th>
                <th>Score</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="quizResponseDetails">
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="responseModalstudent" tabindex="-1" aria-labelledby="responseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ModalLabelstudent">Responses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date &amp; Time Submitted</th>
                <th>No. of Attempts</th>
                <th>Score</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="quizResponseDetailstudent">
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

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

    $('.tooltip-td').tooltip();

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


    $(document).on('click', '.clickable', function() {

                var studentid = $(this).data('student-id');
                var quizid = $(this).data('quiz-id');
                var modalTitle = $('#ModalLabelstudent');


                console.log("Student ID: ", studentid , "Quiz ID: ", quizid);

                $('#quizResponseDetailstudent').empty();

                getQuizResponses(quizid).then(function(data) {
                    // Create an object to store the filtered entries for each submittedby
                    const filteredEntries = {};

                    // Iterate through the data and filter the entries for each submittedby
                    data.forEach(entry => {
                        modalTitle.text(entry.name);
                        const submittedby = entry.submittedby;

                        if (!filteredEntries[submittedby]) {
                            filteredEntries[submittedby] = [];
                        }

                        filteredEntries[submittedby].push(entry);
                    });

                    // Create the HTML for the filtered entries
                    let filteredEntriesHtml = '';

                    Object.entries(filteredEntries).forEach(([submittedby, entries]) => {
                        const entriesHtml = entries.map(entry => {
                            let options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                            let formattedDate = new Date(entry.submitteddatetime).toLocaleDateString('en-US', options);

                            return `
                                <tr>
                                    <td>${entry.name}</td>
                                    <td>${formattedDate}</td>
                                    <td>${entry.totalscore ? entry.totalscore : 'Not yet scored.'}</td>
                                    <td><button class="btn btn-primary view-response" data-quiz-id="${quizid}" data-record-id="${entry.id}" data-classroom-id="${entry.classroomid}">View Response</button></td>
                                </tr>
                            `;
                        }).join('');

                        filteredEntriesHtml += entriesHtml;
                    });

                    $(filteredEntriesHtml).appendTo('#quizResponseDetailstudent');
                });

                $('#responseModalstudent').modal();
    });

    $(document).on('click', '.closemodal', function() {
                
                $('#responseModal').modal('show');


    });

    $(document).on('click', '.view-response', function() {

            var recordId = $(this).data('record-id')
            var selectedQuizId = $(this).data('quiz-id')
            var classroomid = $(this).data('classroom-id')

            console.log("quizid", selectedQuizId ,"recordId", recordId ,"classroom", classroomid);
            var url = `/teacherquiz/viewquizresponse/${classroomid}/${selectedQuizId}/${recordId}`;

            window.open(url, '_blank');
    })



    $(document).on('click', '.response', function() {

            var chapterquizid = $(this).data('id')
            var studentEntryHtml;

            $('#quizResponseDetails').empty()

            getQuizResponses(chapterquizid).then(function(data) {

                // Create an object to store the latest entries for each submittedby
                const latestEntries = {};

                // Iterate through the data and update the latest entry for each submittedby
                data.forEach(entry => {

                    const submittedby = entry.submittedby;
                    const datetime = new Date(entry.submitteddatetime);
                    
                    if (!latestEntries[submittedby] || datetime > latestEntries[submittedby].datetime) {
                        latestEntries[submittedby] = { entry, datetime };
                    }
                });

                // Create the HTML for the latest entries
                const latestEntriesHtml = Object.values(latestEntries).map(({ entry, datetime }) => {
                    let options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                    let formattedDate = datetime.toLocaleDateString('en-US', options);


                    // Calculate no. of attempts
                    var filteredQuiz = activequiz.filter(function(quiz) {
                        if (quiz.id == chapterquizid) {
                            return quiz
                        }
                    });

                    console.log('filtered-quiz', filteredQuiz)
                    console.log('entry', entry)
                

                    return `
                        <tr>
                        <td>${entry.name}</td>
                        <td>${formattedDate}</td>
                        <td class="tooltip-td clickable" data-quiz-id="${filteredQuiz[0].id}" data-student-id="${entry.submittedby}"  data-toggle="tooltip" title="View All Student Responses">
                            <button type="button" class="btn btn-link">${data.length} / ${filteredQuiz[0].noofattempts}</button>
                        </td>
                        <td>${entry.totalscore ? entry.totalscore : 'Not yet scored.'}</td>
                        <td><button class="btn btn-primary view-response" data-quiz-id="${filteredQuiz[0].id}" data-record-id="${entry.id}" data-classroom-id="${entry.classroomid}">View Response</button></td>
                        </tr>
                    `;
                }).join('');

                $(latestEntriesHtml).appendTo('#quizResponseDetails');

            })

            $('#responseModal').modal()

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