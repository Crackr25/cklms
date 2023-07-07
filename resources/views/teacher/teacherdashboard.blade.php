@extends('teacher.layouts.app')


@section('headercover')
    {{-- <div class="home-hero pt-2" style="background-image: url({{asset('assets/images/Header.png')}}); background-repeat:no-repeat;background-size:cover;background-position:center center; height: 130%;"> --}}
    <div class="home-hero pt-2 " style="background-color: #830c14;height: 15%; padding-bottom: 0px !important;">
        <div class="uk-width-1-1">
            <div class="page-content-inner uk-position-z-index">
                <img src="{{asset('assets/logo.png')}}" alt="Logo" class="uk-align-center" style="height: 250px; width: 250px; float: left; margin-right: 10px;">
                <h1 class="text-white pt-5" style="font-size: 50px">Liceo de Cagayan University</h1>
                <h4 class="text-white">Rodolfo N. Pelaez Blvd., Kauswagan, Cagayan de Oro City, 9000, Misamis Oriental, Philippines</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2.css')}}">
<style>

.bg-primarys {
    margin: 0;
    padding: 0;
}

.rounded-pill {
    margin: 0;
    padding: 0;
}
    


.image-wrapper {
  height: 320px; /* Set the desired height */
  overflow: hidden; /* Hide any overflowing content */
}

</style>


    <div class="container">
        <div id="modal-book-info" uk-modal> 
            <div class="uk-modal-dialog uk-modal-body"> 
                <button class="uk-modal-close-default" type="button" uk-close></button> 
                <div class="uk-margin">
                    <div class="uk-grid" uk-grid="">
                        <div class="uk-width-1-3@m">
                            <img  id="modal_book_cover" alt="">
                        </div>
                        <div class="uk-width-2-3@m">
                            <ul class="uk-list uk-list-divider text-small mt-lg-4">
                                <li>
                                    <div class="uk-grid" uk-grid="">
                                        <div class="uk-width-1-3@m">
                                            Book Title:
                                        </div>
                                        <div class="uk-width-2-3@m">
                                            <span id="modal_book_title">
                                            </span>
                                        </div>
                                    <div>
                                </li>
                                <li>
                                    <div class="uk-grid" uk-grid="">
                                        <div class="uk-width-1-3@m">
                                            Date Added:
                                        </div>
                                        <div class="uk-width-2-3@m">
                                            <span id="modal_book_added">
                                            </span>
                                        </div>
                                    <div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-margin">
                    <a href="#" target="_blank" type="button" class="btn btn-info mt-2 uk-first-column" id="modal_view_book_button">
                        <i class="icon-feather-book-open mr-2h mr-2"></i>View Book
                    </a>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mt-4" style="background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 10px;">
                    <div class="d-flex align-items-center ">
                        <div>
                            <img src="{{asset('/avatar/avatar.png')}}" alt="Logo" style="height: 100px; width: 100px;">
                        </div>
                        <div class="">
                            <span style="line-height: 13px"><span class="h6">{{ explode(' ', auth()->user()->name)[0] }}'S DASHBOARD </span> <br> {{auth()->user()->email}}</span>
                            {{-- <p class="align-items-center"></p> --}}
                        </div>
                    </div>

                    <div class="ml-5 mt-2 align-self-end">
                        <p style="font-size: 10px" class="pl-5 text-muted"><b>Teacher</b></p>
                    </div>
                </div>

                <div class="col-md-5 bg-primarys">
                        <h4 class="mb-0 mt-3">Classrooms</h4>
                        <select class="rounded-pill mt-2 p-2 select2" id="gradeSelect">
                            <option>Grade 1</option>
                            <option>Grade 2</option>
                            <option>Grade 3</option>
                            <!-- Add more grade options as needed -->
                        </select>
                </div>
                <div class="section-small" id="classroom_table_holder">

                    {{-- Classroom Table will appear here  --}}
                    
                </div>
                {{--  --}}

                <h4 class="mt-5">Book</h4>

{{-- 
                @foreach($classrooms as $classroom)
                    @if($classroom->joined == 1)
                        <div class="row">
                        @foreach($classroom->books as $item)
                            <div class="col-md-4">
                                <a href="#" class="uk-text-bold book_info" uk-toggle="target: #modal-book-info" data-id="{{$item->id}}" data-title="{{$item->title}}" data-cover="{{ asset($item->picurl)}}" data-added="{{\Carbon\Carbon::create($item->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}" view-book-id="{{$item->id}}-{{$item->classroomid}}-{{$item->bookid}}">
                                    <div class="image-wrapper">
                                        <img src="{{ asset($item->picurl) }}" class="mb-2 w-100 shadow rounded" alt="{{$item->title}}">
                                    </div>
                                    <div class="image-title">{{$item->title}}</div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    @endif
                @endforeach --}}


                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="uk-text-bold book_info" uk-toggle="target: #modal-book-info" data-id="1" data-title="Book 1" data-cover="path/to/book1.jpg" data-added="July 1, 2023 10:00 AM" view-book-id="1-1-1">
                            <div class="image-wrapper">
                                <img src="books/Animation/anime cover (Medium).jpg" class="mb-2 w-100 shadow rounded" alt="Book 1">
                            </div>
                            <div class="image-title">Book 1</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="uk-text-bold book_info" uk-toggle="target: #modal-book-info" data-id="2" data-title="Book 2" data-cover="path/to/book2.jpg" data-added="July 2, 2023 11:00 AM" view-book-id="2-1-2">
                            <div class="image-wrapper">
                                <img src="books/Animation/anime cover (Medium).jpg" class="mb-2 w-100 shadow rounded" alt="Book 2">
                            </div>
                            <div class="image-title">Book 2</div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="uk-text-bold book_info" uk-toggle="target: #modal-book-info" data-id="3" data-title="Book 3" data-cover="path/to/book3.jpg" data-added="July 3, 2023 12:00 PM" view-book-id="3-1-3">
                            <div class="image-wrapper">
                                <img src="books/Animation/anime cover (Medium).jpg" class="mb-2 w-100 shadow rounded" alt="Book 3">
                            </div>
                            <div class="image-title">Book 3</div>
                        </a>
                    </div>
                </div>



                


                {{-- @if(count($classrooms) > 0)
                <div class="section-small ">
                    <div id="course-grid-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h4 class="mt-5">Classroom</h4>
                                <div class="row">
                                
                                    @foreach($classrooms as $classroom)
                                        @if($classroom->joined == 1)
                                            <div class="col-md-5">
                                                <div class="card classroom" classroomid="{{Crypt::encrypt($classroom->id)}}">
                                                    <a href="/studentviewclassroom?classroomid={{\Crypt::encrypt($classroom->id)}}">
                                                        <img class="card-img-top" src="{{asset('assets/images/elearning6.png')}}" alt="Classroom Thumbnail">
                                                        <div class="card-body">
                                                            <h6 class="card-title">{{$classroom->classroomname}}</h6>
                                                            <h6 class="card-text">{{$classroom->code}}</h6>
                                                            <p class="card-text"><small>Date Joined: {{$classroom->datejoined}}</small></p>
                                                            
                                                        </div>
                                                        <div class="card-footer pt-2">
                                                                <h5><i class="icon-feather-users"></i> {{$classroom->students}} Student/<span class="text-lowercase">s</span></h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#course-grid-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#course-grid-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                @endif --}}


                



                
            </div>



            

            <div class="col-md-4 ">
                {{-- <div class="my-4 p-4 bg-white rounded">
                    <h4 class="">Timeline</h4>
                    <ul class="list-group rounded ">
                        @foreach($classrooms as $classroom)
                            @if($classroom->joined == 1)
                                @foreach($classroom->books as $item)
                                    @foreach($item->quiz as $quiz)
                                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-flush ">
                                            <div class="d-flex flex-column">
                                                <h5 class="mb-1">{{$quiz->title}}</h5>
                                                <p class="mb-1">{{$item->title}}</p>
                                                <small class="text-muted">{{ \Carbon\Carbon::create($quiz->datefrom)->isoFormat("MMMM DD, YYYY") }}</small>
                                            </div>
                                            <span class="badge bg-info rounded-pill text-white">Upcoming</span>
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                        </ul>
                </div> --}}

                <div class="my-4 p-4 bg-white rounded">
                    <h4 class="">Timeline</h4>
                    <ul class="list-group rounded">
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-flush">
                            <div class="d-flex flex-column">
                                <h5 class="mb-1">Quiz 1</h5>
                                <p class="mb-1">Book 1</p>
                                <small class="text-muted">July 1, 2023</small>
                            </div>
                            <span class="badge bg-info rounded-pill text-white">Upcoming</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center list-group-flush">
                            <div class="d-flex flex-column">
                                <h5 class="mb-1">Quiz 2</h5>
                                <p class="mb-1">Book 2</p>
                                <small class="text-muted">July 2, 2023</small>
                            </div>
                            <span class="badge bg-info rounded-pill text-white">Upcoming</span>
                        </li>
                    </ul>
                </div>

                        



                <div class="my-3 p-4 bg-white rounded" id="calendar"></div>
                <div class="my-5 p-4 bg-white text-center rounded">
                    <h4 class="">Clock</h4>
                    <hr>
                    <div id="clock" class="display-4"></div>
                </div>
                <div class="my-5  p-4">

                </div>
            </div>
        </div>

        <footer class="bg-light text-center py-4">
                        <div class="container">
                            <p class="m-0">© 2023 Powered by CK</p>
                        </div>
        </footer>

    </div>

    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Add leading zeros if necessary
            hours = hours.toString().padStart(2, '0');
            minutes = minutes.toString().padStart(2, '0');
            seconds = seconds.toString().padStart(2, '0');

            var timeString = hours + ':' + minutes + ':' + seconds;
            document.getElementById('clock').textContent = timeString;
        }

            // Update the clock every second
            setInterval(updateClock, 1000);

        var gradeid;
        var take=0;
        $(document).ready(function() {

            $(document).on('click','.book_info',function(){

                    selectedBook = $(this).attr('data-id');

                    $('#modal_book_added').text($(this).attr('data-added'))
                    $('#modal_book_title').text($(this).attr('data-title'))
                    $('#modal_book_cover').attr('src',$(this).attr('data-cover'))
                    $('#modal_view_book_button').attr('href','/viewbook/'+$(this).attr('view-book-id'))
                    $('#modal_view_quiz_button').attr('data-id', $(this).attr('view-book-id'));


            })


            $(document).on('change','#gradeSelect', function(){


                gradeid = $('#gradeSelect').val();

                loadClassroom()


             
            })


            $('#calendar').fullCalendar({
            // Configuration options
            });


            loadClassroom()

            

            function loadClassroom(){

                $('#classroom_table_holder').empty();

                $.ajax({
                    url: '/teacherclassrooms?table=table&gradeid=' + gradeid + '&take=' + take,
                    type:"GET",
                    success: function(data){

                        $('#classroom_table_holder').append(data)
                
                    }
                })
                
            }

            gradeselect();

            function gradeselect(){

                $('#gradeSelect').select2({
                        width: '70%',
                        allowClear: false,
                        placeholder: "All",
                        language: {
                            noResults: function () {
                                return "No results found";
                            }
                        },
                        escapeMarkup: function (markup) {
                            return markup;
                        },
                        ajax: {
                            url: "{{ route('gradeSelect') }}",
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                                var query = {
                                    search: params.term,
                                    page: params.page || 0
                                }
                                return query;
                            },
                            processResults: function (data, params) {
                                params.page = params.page || 0;
                                return {
                                    results: data.results,
                                    pagination: {
                                        more: data.pagination.more
                                    }
                                };
                            },
                            cache: true
                        }
                });

            }


            
        });
    </script>

@endsection
