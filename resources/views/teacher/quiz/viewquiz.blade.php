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
                                <td>{{ $quiz->chapterid}}</td>
                                <td>{{ $quiz->coverage }}</td>
                                <td>{{ strip_tags($quiz->description) }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#activateQuizModal">
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

@endsection
{{-- 
@push('scripts')
<script>
    $(document).ready(function() {
        $('#quizTable').DataTable();
    });
</script>
@endpush --}}
