
<div class="uk-grid-small uk-child-width-expand@s uk-text-center uk-grid" uk-grid="">
      <div class="uk-first-column">
      </div>
      <div>
            <div tabindex="-1" class="uk-active classroom" classroomid="{{Crypt::encrypt($classroom->id)}}">
                  <a id="join_classroom"
                  {{-- href="/studentjoinclassroom?classroomid={{\Crypt::encrypt($classroom->id)}}" --}}
                  >
                      <div class="course-card h-100">
                          <div class="course-card-body">
                              <h4>{{$classroom->classroomname}}</h4>
                              <h4>{{$classroom->code}}</h4>
                              <p>Teacher: {{$classroom->firstname}}</p>
                              <div class="course-card-footer">
                                    <button class="btn btn-success btn-block">Join Room</button>
                              </div>
                          </div>
                      </div>
                  </a>
            </div>
      </div>
      <div class="uk-width-1-3@m">
      </div>
</div>
<script>
      $(document).ready(function(){

            function studentloadclassroomstable(){

                  $.ajax({
                        url: '/loadclassroomtable',
                        type:"GET",
                        success: function(data){
                             $('#classroom_table').empty()
                             $('#classroom_table').append(data)
                        }
                  })

            }

            $(document).on('click','#join_classroom',function(e){

                  $.ajax({
                        url: '/studentjoinclassroom?classroomid='+'{{\Crypt::encrypt($classroom->id)}}',
                        type:"GET",
                        success: function(data){
                              if(data == 1){

                                    UIkit.notification("<span uk-icon='icon: check'></span>You have joined a classroom.", {status:'success', timeout: 1000 }); 
                                    studentloadclassroomstable()
                                    $('.search-help').text('You already joined this classroom!')

                              }
                              else if(data == 0){

                                    UIkit.notification("<span uk-icon='icon: check'></span>Something went wrong!", {status:'success', timeout: 1000 }); 
                              }
                             
                        }
                  })

                  e.preventDefault();
            })
            
      })
</script>

