@extends('teacher.layouts.app')


<style>
    .points {
        width: 60px;
        height: 60px;
        background-color: #4d4d99;
        border-radius: 50%;
        position: relative;
        top: -50px;
        left: -50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        padding: 0;
        margin: 0;
        font-size: 15pt;
        font-weight: 600;
    }

    .circle-points {
        position: relative;
        top: -50px;
        left: -50px;
        z-index: 9;
    }

    .menu_opener {
        display: none !important;
    }

    .menu_opener_label {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size:15pt;
        cursor: pointer;
        color: #000;
        background: rgb(247 103 0);
    }

    .menu_opener:checked ~ .link_one { 
        top: 65px;
    }
    .menu_opener:checked ~ .link_two {
        left: -65px;
    }
    .menu_opener:checked ~ .link_three {
        top: -65px;
    }

    .menu_opener:checked ~ .link_four {
        left: 65px;
    }

    .link_general {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: 600;
        font-size:15pt;
        /* background: #4d4d99; */
        background: #606060;
        color: #fff;
        cursor: pointer;
    }

    .link_one, .link_two,
    .link_three, .link_four {
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        position: absolute;
        top: 1px;
        left: 1px;
        z-index: -1;
    }

    .chart{

        max-height: 75%
    }

    
</style>





@section('content')




<div class="container quizcontent" style="background-color: #fff !important;">
    <div class="row justify-content-center">
        <div class="col-md-8">


            @foreach($quizQuestions as $key=>$item)
                @if($item->typeofquiz == 1)
                    <!-- multiple choice -->
                    <div class="card mt-5 ml-3 editcontent" id="quiz-question-{{$item->id}}">
                        <div class="card-body">

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            <canvas id="myChart{{$item->id}}" class= "chart"></canvas>

                        </div>
                    </div>
                @endif

            @endforeach

            @foreach($quizQuestions as $key=>$item)
                @if($item->typeofquiz == 2)
                    <!-- multiple choice -->
                    <div class="card mt-5 ml-3 editcontent" id="quiz-question-{{$item->id}}">
                        <div class="card-body">

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            <canvas id="barChart{{$item->id}}" class= "chart"></canvas>

                        </div>
                    </div>
                @endif

            @endforeach


@endsection



<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
   // var dataFromBlade = {!! json_encode($quizQuestions) !!};
</script>






<script>

    $(document).ready(function() {
        



        var dataFromBlade = {!! json_encode($quizQuestions) !!};
        var classroomidFromBlade = {!! json_encode($classroomid) !!};
        var quizidFromBlade = {!! json_encode($quizid) !!};

        console.log(dataFromBlade)


        var type1quiz = dataFromBlade.filter(function(obj) {
                        return obj.typeofquiz === 1;
        });

        $.each(type1quiz, function(index, row) {
        // Access each row's properties
            // Make an AJAX request to fetch the data
                $.ajax({
                    url: '/analytics/get-answer',
                    data: {
                        id: row.id,
                        classroomid: classroomidFromBlade,
                        quizid: quizidFromBlade
                    },
                    method: 'GET',
                    success: function(response) {
                        var dataFromAjax = response;

                        //console.log(dataFromAjax);
                        var labels = [];
                        var data = [];
                        var backgroundColor = [];
                        var borderColor = [];

                        // Iterate over the data from the AJAX response
                        $.each(dataFromAjax, function(index, row) {
                            // Access each row's properties
                            var label = row.description;
                            var value = row.data; // Generate a random value


                            if(row.answer == 1){
                                label += '(Answer)';

                            }
                            // Add label and value to respective arrays
                            labels.push(label);
                            data.push(value);

                            // Generate random colors for background and border
                            var randomColor = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', 0.5)';
                            backgroundColor.push(randomColor);
                            borderColor.push(randomColor);
                        });

                        // Create the chart using Chart.js once the data is available
                        var canvasId = 'myChart' + (row.id);
                        var ctx = document.getElementById(canvasId).getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Data',
                                    data: data,
                                    backgroundColor: backgroundColor,
                                    borderColor: borderColor,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                cutout: '80%', // Adjust the size of the donut hole
                                plugins: {
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        });
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });



        });



        var type2quiz = dataFromBlade.filter(function(obj) {
                        return obj.typeofquiz === 2;
        });


        $.each(type2quiz, function(index, row) {

                var canvasId = 'barChart' + (row.id);
                // Make an AJAX request to fetch the data
                $.ajax({
                    url: '/analytics/get-shortanswer',
                    datatype: 'json',
                    data: {
                        id: row.id,
                        classroomid: classroomidFromBlade,
                        quizid: quizidFromBlade
                    },
                    method: 'GET',
                    success: function(response) {
                        var dataFromAjax = JSON.parse(response);
                        console.log(typeof(dataFromAjax));
                        var labels = [];
                        var data = [];
                        var backgroundColor = [];
                        var borderColor = [];


                        

                        // Iterate over the data from the AJAX response
                        $.each(dataFromAjax.answer, function(key, value) {
                            var label = value;
                            labels.push(label);

                            var randomColor = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', 0.5)';
                            backgroundColor.push(randomColor);
                            borderColor.push(randomColor);
                        
                        });


                        $.each(dataFromAjax.count, function(key, value) {
                            var value = value; // Generate a random valuue
                            // Add label and value to respective arrays
                            data.push(value);

                        
                        
                        });


                        // Create the chart using Chart.js once the data is available
                        
                        var ctx = document.getElementById(canvasId).getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Data',
                                    data: data,
                                    backgroundColor: backgroundColor,
                                    borderColor: borderColor,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                plugins: {
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }
                        });
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });

        });

    });








</script>