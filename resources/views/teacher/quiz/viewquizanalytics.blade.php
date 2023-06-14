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

                        </div>
                    </div>
                @endif

                {{-- @if($item->typeofquiz == 2)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">

                            <div class="circle-points" >
                                <input type="checkbox" id="menu_opener_id_{{$item->id}}" class="menu_opener">
                                <label for="menu_opener_id_{{$item->id}}" data-detailsid = "{{ $item->detailsid }}" data-maxpoint="{{$item->points }}" data-points-edit="{{$item->id}}" class="menu_opener_label student-score">{{$item->pointsgiven}}</label>

                                <div class="link_one" data-detailsid = "{{ $item->detailsid  }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        0
                                    </div>
                                </div>

                                <div class="link_two" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        {{$item->points /2}}
                                    </div>
                                </div>

                                <div class="link_three" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        {{$item->points}}
                                    </div>
                                </div>

                                <div class="link_four" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            <input type="text" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-control mt-2" placeholder="Answer here" value="{{$item->answer}}">
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 3)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">

                            <div class="circle-points" >
                                <input type="checkbox" id="menu_opener_id_{{$item->id}}" class="menu_opener">
                                <label for="menu_opener_id_{{$item->id}}" data-maxpoint="{{$item->points}}" data-detailsid = "{{ $item->detailsid }}" data-points-edit="{{$item->id}}" class="menu_opener_label student-score">{{$item->pointsgiven}}</label>

                                <div class="link_one" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        0
                                    </div>
                                </div>

                                <div class="link_two" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        {{$item->points /2}}
                                    </div>
                                </div>

                                <div class="link_three" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        {{$item->points}}
                                    </div>
                                </div>

                                <div class="link_four" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" data-detailsid = "{{ $item->detailsid }}"  id="{{$questioninfo->id}}" class="answer-field form-control mt-2" type="text" value="{{$item->answer}}">{{$item->answer}}</textarea>
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 4)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">
                            <p>Instruction. {!! $item->question !!}</p>
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 5)
                    <!-- drag and drop -->
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="points student-score">
                                        {{$item->score}}
                                    </div>
                                </div>
                            </div>

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                Drag the correct option and drop it onto the corresponding box.
                            </p>
                            <div class="options p-3 mt-2" style="border:3px solid #3e416d;border-radius:6px;">
                                @foreach ($item->drag as $questioninfo)
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">{{$questioninfo->description}}</div>
                                @endforeach
                            </div>
                            @foreach($item->drop as $items)
                                <p>
                                    {{$items->sortid}}. {!! $items->question !!}
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 6)
                    <!-- upload image -->
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">
                            <div class="circle-points" >
                                <input type="checkbox" id="menu_opener_id_{{$item->id}}" class="menu_opener">
                                <label for="menu_opener_id_{{$item->id}}" data-maxpoint="{{$item->points}}" data-detailsid = "{{ $item->detailsid }}" data-points-edit="{{$item->id}}" class="menu_opener_label student-score">{{$item->pointsgiven}}</label>

                                <div class="link_one" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        0
                                    </div>
                                </div>

                                <div class="link_two" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        {{$item->points /2}}
                                    </div>
                                </div>

                                <div class="link_three" data-detailsid = "{{ $item->detailsid }}"  data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        {{$item->points}}
                                    </div>
                                </div>

                                <div class="link_four" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <p>{!! $item->question !!}</p>
                            <div class="form-group">
                                <input class="answer-field form-control-file imageInput" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" type="file" accept="image/*">
                                @if($item->picurl != '')
                                    <a id="preview-link" href="{{$item->picurl}}" target="_blank">
                                        <img id="preview" src="{{$item->picurl}}" alt="Preview" style="max-width: 250px; max-height: 250px;">
                                    </a>
                                @else
                                    <a id="preview-link" href="#" target="_blank">
                                        <img id="preview" src="#" alt="Preview" style="max-width: 250px; max-height: 250px;display:none;">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 7)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="points student-score">
                                        {{$item->score}}
                                    </div>
                                </div>
                            </div>

                            <span style="font-weight:600;font-size:1.0pc">
                                Fill in the blanks
                            </span>
    
                            @foreach($item->fill as $items)
                                    <p>
                                        {{$items->sortid}}. {!! $items->question !!}
    
                                    </p>
                            @endforeach
    
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 8)
                        <div class="card mt-5 ml-3 editcontent">
                            <div class="card-body">



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="points student-score">
                                        {{$item->score}}
                                    </div>
                                </div>
                            </div>

                                <span style="font-weight:600;font-size:1.0pc">
                                    Enumeration
                                </span>
        
                                <ol class="list-group list-group-numbered p-3" type="A">
                                    <li>
                                        <p>{{$item->question}}</p>
                                    <ol>
        
                                    @php
            
                                        $numberOfTimes = $item->item
            
                                    @endphp
                                    
                                    @for ($i = 0; $i < $numberOfTimes; $i++)
            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <li>
                                                <div class="input-group mt-2">
                                                    <input data-question-id="{{ $item->id }}" data-sortid="{{ $i+1 }}" data-question-type="8" class="answer-field d-inline form-control q-input" value="{{$item->answer[$i]}}" type="text">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                        @if($item->check[$i] == 1)
                                                            <span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>
                                                        @endif
                                                        
                                                        @if($item->check[$i] == 0)
                                                            <span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                @endfor
                                
                                </ol>
                                </li>
                            </ol>
                                
        
                            </div>
                        </div>
                    @endif

                    @if($item->typeofquiz == 9)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">
                            <a id="preview-link" href="{{$item->image}}" target="_blank">
                                        <img id="preview" src="{{$item->image}}" alt="Preview" style="width: 100%; height: 100%;">
                            </a>
                        </div>
                    </div>
                    @endif --}}


            @endforeach


@endsection



<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/flot/jquery.flot.js')}}"></script>

<script>
    var dataFromBlade = {!! json_encode($quizQuestions) !!};
</script>






<script>

    $(document).ready(function() {
    // Access the data passed from Blade
        var myData = dataFromBlade;

        // Use the data in your jQuery logic
        // For example, log the data to the console
        console.log(myData);

        // You can perform other operations with the data here
    });





</script>