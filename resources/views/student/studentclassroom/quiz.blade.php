@if(count($sched) > 0)
    <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid" uk-grid=""  >
        @foreach($sched as $quiz)

                @if(\Carbon\Carbon::create($quiz->dateto.' '.$quiz->timeto) <= \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))
                <div class="quizCount">
                    <div class="course-card">
                            
                            <div class="course-card-thumbnail ">
                                <img src="{{asset('assets/images/elearning8.jpg')}}">
                                <span class="play-button-trigger"></span>
                            </div>
                            <div class="course-card-body">
                                <h4>{{$quiz->title}}</h4>
                                <p>Score: 25 / 30</p>
                                
                            
                                <div class="course-card-footer">
                                        <h5><i class="icon-feather-calendar"></i> Status: <span class="badge ml-1 badge-warning">Overdue</span></h5>
                                    <button class="btn btn-dark infobtn" data-id = "{{$quiz->id}}" >Info</button>
                                </div>
                            </div>
                    </div>    
                </div>

                @elseif(\Carbon\Carbon::create($quiz->datefrom.' '.$quiz->timefrom) > \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS'))
                <div class="quizCount">
                    <div class="course-card">
                            
                            <div class="course-card-thumbnail ">
                                <img src="{{asset('assets/images/elearning8.jpg')}}">
                                <span class="play-button-trigger"></span>
                            </div>
                            <div class="course-card-body">
                                <h4>{{$quiz->title}}</h4>
                                <p>Score: 25 / 30</p>
                                
                            
                                <div class="course-card-footer">
                                        <h5><i class="icon-feather-calendar"></i> Status: <span class="badge ml-1 badge-warning">In Active</span></h5>
                                    <button class="btn btn-dark infobtn" data-id = "{{$quiz->id}}" >Info</button>
                                </div>
                            </div>
                    </div>    
                </div>

                @else
                <div class="quizCount">
                    <div class="course-card">
                            <a href="#" id="quizheader" data-id="{{$quiz->teacherquizid}}">
                            <div class="course-card-thumbnail ">
                                <img src="{{asset('assets/images/elearning8.jpg')}}">
                                <span class="play-button-trigger"></span>
                            </div>
                            <div class="course-card-body">
                                <h4>{{$quiz->title}}</h4>
                                <p>Not Yet Graded</p>
                                
                            </a>
                                <div class="course-card-footer">
                                        <h5><i class="icon-feather-calendar"></i> Status: <span class="badge ml-1 badge-success">Active</span></h5>
                                    <button class="btn btn-dark infobtn" data-id = "{{$quiz->id}}" >Info</button>
                                </div>
                            </div>
                    </div>    
                </div>
                @endif
        @endforeach
        
    </div>
@elseif(count($data) == 0)
    <div>
        <div class="uk-card uk-card-primary uk-card-body bg-grey">
            <h5>NO QUIZ FOUND!</h5>
        </div>
    </div>
@endif


    <!-- UK Modal -->
    <div class="modal fade" id="ukModal" tabindex="-1" role="dialog" aria-labelledby="ukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
            <h5 class="modal-title" id="ukModalLabel">UK Modal Title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <ul class="list-unstyled">
            
            </ul>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>






@section('footerscript')

        <script>
            $(document).ready(function(){


                $(document).on('click','.infobtn', function(){
                    
                    var dataid =  parseInt($(this).attr('data-id'));

                    var schedData = @json($sched); // Assuming $sched contains the JSON data

                    var filteredData = schedData.filter(function(item) {
                        return item.id === dataid;
                    });

                    // Access the modal elements
                    var modalTitle = $('#ukModalLabel');
                    var modalBody = $('#ukModal .modal-body ul');


                    // Update the modal content with the data from schedData
                    modalTitle.text(filteredData[0].title);
                    modalBody.empty(); // Clear any existing content

                    console.log(filteredData)

                    // Loop through the data and append each item as a list item in the modal body

                    var dateString = filteredData[0].datefrom;
                    var dateString2 = filteredData[0].dateto;
                    var date = new Date(dateString);
                    var date2 = new Date(dateString2);

                    var options = { year: 'numeric', month: 'long', day: 'numeric' };
                    var formattedDate = date.toLocaleDateString('en-US', options);
                    var formattedDate2 = date2.toLocaleDateString('en-US', options);

                    var timeString = filteredData[0].timefrom;
                    var timeParts = timeString.split(':');
                    var hour = parseInt(timeParts[0]);
                    var minute = parseInt(timeParts[1]);

                    var timeString2 = filteredData[0].timeto;
                    var timeParts2 = timeString2.split(':');
                    var hour2 = parseInt(timeParts2[0]);
                    var minute2 = parseInt(timeParts2[1]);

                    var formattedTime = hour > 12 ? (hour - 12) + ':' + minute + ' PM' : hour + ':' + minute + ' AM';
                    var formattedTime2 = hour2 > 12 ? (hour2 - 12) + ':' + minute2 + ' PM' : hour2 + ':' + minute2 + ' AM';
                    
                    if (filteredData.hasOwnProperty(0)) {
                        var listItem = $('<li>').html('<strong>' + 'Started' + ':</strong> ' + formattedDate + '&nbsp; at &nbsp;' + formattedTime );
                        modalBody.append(listItem);
                        var listItem2 = $('<li>').html('<strong>' + 'End' + ':</strong> ' + formattedDate2 + '&nbsp; at &nbsp;' + formattedTime2 );
                        modalBody.append(listItem2);
                        var listItem3 = $('<li>').html('<strong>' + 'Attempt Allowed' + ':</strong> ' + filteredData[0].noofattempts );
                        modalBody.append(listItem3);
                    }

                    // Show the modal
                    $('#ukModal').modal('show');





                });
                



            });


</script>