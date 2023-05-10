@extends('teacher.layouts.app')

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


{{-- <div uk-grid="" class="uk-grid uk-grid-stack">
    <div class="uk-width-2-3@m uk-first-column">

    </div>
</div> --}}
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Active Quiz</span>
                        <div>
                            <button class="btn btn-sm btn-default mr-2" type="button" data-toggle="collapse" data-target="#quizTable2" aria-expanded="false" aria-controls="quizTable2"><i class="fa fa-plus text-white"></i></button>
                            <button class="btn btn-sm btn-default">Refresh</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="collapse" id="quizTable2">
                        <table id="quizDataTable2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Chapter</th>
                                    <th>Lesson</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Response</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chapter 1</td>
                                    <td>Lesson 1</td>
                                    <td>Description 1</td>
                                </tr>
                                <tr>
                                    <td>Chapter 1</td>
                                    <td>Lesson 2</td>
                                    <td>Description 2</td>
                                </tr>
                                <tr>
                                    <td>Chapter 2</td>
                                    <td>Lesson 1</td>
                                    <td>Description 3</td>
                                </tr>
                                <tr>
                                    <td>Chapter 2</td>
                                    <td>Lesson 2</td>
                                    <td>Description 4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                        <span>Quiz Table</span>
                        <div>
                            <button class="btn btn-sm btn-default mr-2" type="button" data-toggle="collapse" data-target="#quizTable" aria-expanded="false" aria-controls="quizTable"><i class="fa fa-plus"></i></button>
                            <button class="btn btn-sm btn-default">Refresh</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="collapse" id="quizTable">
                        <table id="quizDataTable" class="table table-bordered">
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
                                <td>{{ $quiz->title}}</td>
                                <td>{{ $quiz->coverage }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ strip_tags($quiz->description) }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-id="{{$quiz->id}}" data-toggle="modal" data-target="#activateQuizModal">
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

{{-- 
@push('scripts')

@endpush --}}

<script>
    $(document).ready(function() {

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

        var quizId = $("button[data-target='#activateQuizModal']").data("id");

        // Set the data-id attribute of the second button when it is clicked
        $("button[type='submit']").click(function(event) {

            event.preventDefault();
            $(this).attr("data-id", quizId);

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
            console.log(dateFrom);
        });


    });
</script>
