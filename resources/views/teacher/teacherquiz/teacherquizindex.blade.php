@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li>Quiz</li>
        </ul>
    </nav>

@endsection


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
                    <a href="#" class="btn bs-placeholder btn-default" id="addquiz" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add Quiz</a>
                </div>
            </div>
            <div class="section-small" id="quiz_table_holder">
            </div>
    </div>
            




    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script>


        $(document).ready(function(){

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
        })

    </script>


@endsection