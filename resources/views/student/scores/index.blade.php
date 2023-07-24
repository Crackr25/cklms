@extends('student.layouts.app')




@section('content')

    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    <style>
    

        /* CSS */
        .uk-tab li.uk-active a {
        background-color: white !important;
        color: #fc6982 !important;
        }

        /* Align the datatable search box to the right */
        div.dataTables_wrapper div.dataTables_filter label {
            text-align: right !important;
        }



    </style>

    <div class="card shadow mb-2 mt-1" style="margin-left: 100px; margin-right: 30px; border-radius: 20px;">
        <div class="card-body p-5" style="height: 100%">
            <div class="page-content pt-lg-5 w-100">


            <div class="">
                <div class="container">

                    <div class="subnav">

                        <ul class="mb-0 uk-tab" uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium" uk-tab="">
                            <li class=""><a href="#" aria-expanded="false"> 
                                    <span> Grades</span> </a>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="container">

                <div class="uk-grid-large mt-4 uk-grid ml-2" uk-grid="">
                        
                        <ul id="course-intro-tab" class="uk-switcher uk-width-1-1" style="touch-action: pan-y pinch-zoom;">
                            
                            <li class="course-description-content ">
                            @foreach ($myCollection  as $innerCollection)
                                @foreach($innerCollection as $book)
                                    <div class="uk-card  uk-margin uk-card-body uk-width-1-1" style="border-radius: 20px;">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-5 uk-padding">
                                                <img src="{{ asset($book->picurl) }}" alt="preview">
                                                <div class="text-center">
                                                    <h6>{{$book->title}} <br> <span style="font-size: 10px"> Grade 10</span></h6>
                                                </div>
                                            </div>
                                            <div class="uk-width-4-5 uk-box-shadow-large uk-padding-small uk-box-shadow-hover-xlarge">
                                                    <div class="uk-card  uk-margin uk-padding-small uk-width-1-1 " style="border-radius: 20px;">
                                                        <div class="uk-grid">
                                                            <div class="uk-width-1-5 text-center" style="margin-top: 3rem !important">
                                                                <img src="{{asset('/avatar/avatar.png')}}" alt="Logo" style="height: 150px; width: 150px;">
                                                            </div>
                                                            <div class="uk-width-2-5" style="margin-top: 5rem !important">
                                                                <span style="line-height: 13px;"><span class="h6" style="font-size: 30px">{{auth()->user()->name}} </span> <br> Student</span>
                                                            </div>

                                                            <div class="uk-width-2-5" style="margin-top: 6rem !important">
                                                                <p style="font-size: 15px" ><b>Partial Total Score: </b> {{$book->score}}/{{$book->maxpointtotal}}</p>
                                                                @php
                                                                    if($book->score != 0 &&  $book->maxpointtotal !=0){
                                                                        $average = round(($book->score / $book->maxpointtotal) * 100);
                                                                    }else{
                                                                        $average = 0;
                                                                    }
                                                                @endphp
                                                                <p style="font-size: 15px" ><b>Partial Average: </b> {{$average}}%</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                
                                                    <table class="uk-table search-score-student uk-padding" id="search-score-student">
                                                        
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">Quiz Title</th>
                                                                <th width="30%">Date and time Submitted</th>
                                                                <th width="20%">No. of Attempts</th>
                                                                <th width="20%">Score</th>
                                                                <th width="10%">Percentage</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($book->quiz as $item)
                                                                <tr>
                                                                    <td>{{$item->title}}</td>
                                                                    <td class="text-center">{{$item->date}}</td>
                                                                    <td class="text-center">{{$item->attempt}}</td>
                                                                    <td>{{$item->score}} / {{$item->maxpoints}}</td>
                                                                    @if($item->percentage != "-")

                                                                        <td class="text-center" >{{$item->percentage}} %</td>

                                                                    @else

                                                                        <td class="text-center">{{$item->percentage}} </td>

                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                            </li>
                            


                        </ul>
                    </div>
                
            </div>
        </div>



        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>


<script>

    
    $(document).ready(function(){

        $(".search-score-student").DataTable({
                        
                        "bFilter": false,
                        "lengthChange": false,
                        "ordering": false,
                        "searching": true

        });

    

    })


</script>



@endsection



