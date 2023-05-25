@extends('teacher.layouts.app')

<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li><a href="/teacherclassrooms?blade=blade"> Classrooms </a></li>
            <li>Quiz</li>
        </ul>
    </nav>

@endsection


@section('content')

<!-- Modal -->
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

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Active Quiz</span>
                        <div>
                
                            <button class="btn btn-sm btn-default refresh_table">Refresh</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive" id="quizTable2">
                        <table id="quizDataTable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Quiz Title</th>
                                    <th>Quiz start</th>
                                    <th>Quiz end</th>
                                    <th>Attempts</th>
                                    <th>Activated on</th>
                                    <th>Response</th>
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

<div class="container-fluid classroom" data-id="{{$classroomid}}">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Quiz Table</span>
                        
                    </div>
                </div>

                <div class="card-body">
                    <div id="quizTable">
                        <table id="quizDataTable" class="table table-bordered" style="max-width: 100%;">
                            <thead>
                                <tr>
                                    <th>Chapter</th>
                                    <th>Lesson</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Activate</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{ $quiz->chapter}}</td>
                                <td>{{ $quiz->coverage }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ strip_tags($quiz->description) }}</td>
                                <td>
                                    <button type="button" class="btn btn-success modal_activate" data-id="{{$quiz->id}}" data-toggle="modal" data-target="#activateQuizModal">
                                        Activate
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="activateQuizModal" tabindex="-1" aria-labelledby="activateQuizModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header " style="background-color: #673AB7 ">
            <h5 class="modal-title" id="activateQuizModalLabel" style="color:white" >Activate Quiz</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="was-validated">
                <div class="form-group">
                    <label for="attempts">Activate for</label>
                    <select id="mySelect" class="select2" multiple>
                        <option value="0">All</option>
                        <option value="0">2</option>
                        <option value="0">3</option>
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
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary activate">Activate</button>
        </div>
        </div>
    </div>
</div>

@endsection

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('templatefiles/framework.js')}}"></script>
<script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>

<script src="{{asset('templatefiles/chart.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}
<script src="{{asset('templatefiles/chart-custom.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Select2 -->
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#mySelect').select2();

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        // globals
        var CLASSROOM_ID;
        var QUIZ_RESPONSES;

        var activequiz;

        getactivequiz()

        // target the modal element
        var myModal = $('#activateQuizModal');

        // listen for the modal's hidden.bs.modal event
        myModal.on('hidden.bs.modal', function (event) {
            // clear the form fields
            $('#date-from').val('');
            $('#time-from').val('');
            $('#date-to').val('');
            $('#time-to').val('');
            $('#attempts').val('');
        });


        // Set the data-id attribute of the second button when it is clicked
        $("button[type='submit']").click(function(event) {

            event.preventDefault();
            var quizid = $(this).attr('data-id');

            var classroomId = $('.container-fluid.classroom').data('id');
            CLASSROOM_ID = classroomId

            var dateFrom = $('#date-from').val();
            var timeFrom = $('#time-from').val();
            var dateTo = $('#date-to').val();
            var timeTo = $('#time-to').val();
            var attempts = $('#attempts').val();

            if (!dateFrom || !timeFrom || !dateTo || !timeTo || !attempts) {
                alert('Please fill in all fields.');
                return;
            }
            // check if the date and time inputs are valid
            if (new Date(dateFrom + 'T' + timeFrom + ':00') >= new Date(dateTo + 'T' + timeTo + ':00')) {
                alert('The date and time inputs are not valid.');
                return;
            }
            // if the form inputs are valid, submit the form
            $.ajax({
					type:'GET',
					url: '/viewbookchaptertestavailability',
                    data:{

                        dateFrom : dateFrom,
                        timeFrom : timeFrom,
                        dateTo   : dateTo,
                        timeTo   : timeTo,
                        attempts : attempts,
                        quizId   : quizid,
                        classroomId : classroomId
                    },
                    success:function(data) {
                        if(data ==1){
                            $('.close').click();
                            Toast.fire({
                                    type: 'success',
                                    title: 'Added successfully!'
                                })

                            getactivequiz()
                        }

                        if(data ==0){
                            $('.close').click();
                            Toast.fire({
                                    type: 'success',
                                    title: 'The quiz has been reactivated successfully!'
                                })

                            getactivequiz()
                        }
                    
                    }

                    })
        });

        $(document).on('click','.modal_activate',function(){
            var quizid = $(this).attr('data-id');
            $('.activate').attr('data-id', quizid)

        })
        
        $(document).on('click','.refresh_table',function(){
                console.log("Refreshed")
                getactivequiz()
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
                        <td>${data.length} / ${filteredQuiz[0].noofattempts}</td>
                        <td>${entry.totalscore ? entry.totalscore : 'Not yet scored.'} / ${entry.maxpoints}</td>
                        <td><button class="btn btn-primary view-response" data-quiz-id="${filteredQuiz[0].id}" data-record-id="${entry.id}">View Response</button></td>
                        </tr>
                    `;
                }).join('');

                $(latestEntriesHtml).appendTo('#quizResponseDetails');

            })

            $('#responseModal').modal()

        })

        $(document).on('click', '.view-response', function() {

            var recordId = $(this).data('record-id')
            var selectedQuizId = $(this).data('quiz-id')
            var url = `/viewquizresponse/${CLASSROOM_ID}/${selectedQuizId}/${recordId}`;

            window.open(url, '_blank');
        })

        function getactivequiz(){

            var classroomid = $('.container-fluid.classroom').data('id');
            CLASSROOM_ID = classroomid
            
            $.ajax({
                type:'GET',
                url: '/getactivequiz',
                data:{
                    classroomid: classroomid
                },

                success:function(data) {
                    activequiz = data
                    loaddatatable()
                }
            })
        }

        function getQuizResponses(chapterquizid) {
            return $.ajax({
                type:'GET',
                url: '/quizresponses',
                data:{
                    classroomid: CLASSROOM_ID,
                    chapterquizid: chapterquizid
                }
            })
        }

        function loaddatatable(){
            $("#quizDataTable2").DataTable({
                        destroy: true,
                        data:activequiz,
                        order: [[0, 'asc']],
                        lengthChange: false,
                        responsive: false,
                        ordering: false,
                        columns: [
                            { "data": null},
                            { "data": null},
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
                                                    var text = '<a class="mb-0">'+(row + 1)+'</a>'
                                                    $(td)[0].innerHTML =  text
                                                    
                            }
                                    },
                                        {
                            'targets': 1,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {
                                                    var text = '<a class="mb-0">'+rowData.title+'</a>'
                                                    $(td)[0].innerHTML =  text
                                                    
                            }
                                    },
                                        {
                            'targets': 2,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {

                                                    var date2 =  new Date(Date.parse(rowData.datefrom));
                                                    var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                                                    var date3 =  new Date(Date.parse( '1970-01-01T' + rowData.timefrom));
                                                    const timeString1 = date3.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                                                    var date4 =  new Date(Date.parse(rowData.dateto));
                                                    var markdate2 = date4.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                                                    var date5 =  new Date(Date.parse( '1970-01-01T' + rowData.timeto));
                                                    const timeString2 = date5.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                                                    var text = '<a class="mb-3"><span class="badge badge-info mt-2"> <b> Start: </b>  '+markdate+' at '+timeString1+'</span></a>'
                                                    $(td)[0].innerHTML =  text
                                                    
                            }
                                    },
                                    {
                            'targets': 3,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {

                                                    var date2 =  new Date(Date.parse(rowData.datefrom));
                                                    var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                                                    var date3 =  new Date(Date.parse( '1970-01-01T' + rowData.timefrom));
                                                    const timeString1 = date3.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                                                    var date4 =  new Date(Date.parse(rowData.dateto));
                                                    var markdate2 = date4.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                                                    var date5 =  new Date(Date.parse( '1970-01-01T' + rowData.timeto));
                                                    const timeString2 = date5.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                                                    var text = '<a class="mb-3"><span class="badge badge-danger m-2"> <b> End: </b> '+markdate2+' at '+timeString2+' </span></a>'
                                                    $(td)[0].innerHTML =  text
                                                    
                            }
                                    },
                                        {
                            'targets': 4,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {
                                                    var text = '<a class="mb-0">'+rowData.noofattempts+'</a>'
                                                    $(td)[0].innerHTML =  text
                            }
                                    },
                        {
                            'targets': 5,
                            'orderable': false, 
                            'createdCell':  function (td, cellData, rowData, row, col) {

                                                    var date2 = new Date(Date.parse(rowData.createddatetime));
                                                    const dateString = date2.toLocaleDateString("en-US", { year: "numeric", month: "2-digit", day: "2-digit" });
                                                    const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit", second: "2-digit" });
                                                    var text = '<a class="mb-0">'+ dateString + ' ' + timeString +'</a>'
                                                    $(td)[0].innerHTML =  text
                            }
                                    },
                                        {
                            'targets': 6,
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
                        },

                    ]                                                      
            });        
        }

    });
</script>

