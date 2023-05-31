@extends('teacher.layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Active Quiz</span>
                        <div>
                            {{-- <button class="btn btn-sm btn-default mr-2" type="button" data-toggle="collapse" data-target="#quizTable2" aria-expanded="false" aria-controls="quizTable2"><i class="fa fa-plus text-white"></i></button> --}}
                            <button class="btn btn-sm btn-default refresh_table">Refresh</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="quizTable2">
                        <table id="quizDataTable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Quiz Title</th>
                                    <th>Date start</th>
                                    <th>Time start</th>
                                    <th>Date end</th>
                                    <th>Time end</th>
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






<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script>
    $(document).ready(function() {

    var activequiz;

    getActiveQuiz()

    
    function getActiveQuiz() {

            $.ajax({
                type:'GET',
                url: '/teachergetactivequiz',
                success: function(data) {
                    activequiz = data
                    console.log(activequiz)
                    renderQuizDataTable()
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
                        }
                    },
                    {
                        'targets': 1,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse(rowData.datefrom));
                            var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                            var text = '<a class="mb-0">'+markdate+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 2,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse( '1970-01-01T' + rowData.timefrom));
                            const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var text = '<a class="mb-0">'+timeString+'</a>';
                            $(td)[0].innerHTML = text;
                        }
                    },
                    {
                        'targets': 3,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse(rowData.dateto));
                            var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                            var text = '<a class="mb-0">'+markdate+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 4,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse( '1970-01-01T' + rowData.timeto));
                            const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var text = '<a class="mb-0">'+timeString+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 5,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var text = '<a class="mb-0">'+rowData.noofattempts+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 6,
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
                        'targets': 7,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            // getQuizResponses(rowData.id).then(function(data) {

                            //     var latestEntries = {}

                            //     // Iterate through the data and update the latest entry for each submittedby
                            //     data.forEach(entry => {
                            //         const submittedby = entry.submittedby;
                            //         const datetime = new Date(entry.submitteddatetime);
                                    
                            //         if (!latestEntries[submittedby] || datetime > latestEntries[submittedby].datetime) {
                            //             latestEntries[submittedby] = { entry, datetime };
                            //         }
                            //     });


                            //     var buttons = '<a href="#" class="response ml-4 text-blue-500" data-id="'+rowData.id+'">Responses ('+Object.keys(latestEntries).length+')</a>';

                            //     $(td)[0].innerHTML =  buttons
                            // })

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