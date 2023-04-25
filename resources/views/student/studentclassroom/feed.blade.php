@if(count($posts ) > 0)

      @foreach($posts as $post)
            <div class="row">
            <div class="col-md-12">
                  <div class="card rounded">
                  
                        @if($post->type == 2)
                              <div class="card-header bg-info">
                                    <div class="row">
                                          <div class="col-md-9 ">
                                                @php   
                                                if($post->usertypeid == '2'){
                                                      if(strtolower($post->gender) == 'female'){
                                                            $avatarpost = 'avatar/teacher-female.png';
                                                      }
                                                      else{
                                                            $avatarpost = 'avatar/teacher-male.png';
                                                      }
                                                }else{   
                                                      if(strtolower($post->gender) == 'female'){
                                                            $avatarpost = 'avatar/S(F) 1.png';
                                                      }
                                                      else{
                                                            $avatarpost = 'avatar/S(M) 1.png';
                                                      }
                                                }            
                                                @endphp
                                                <h5 class="text-white">
                                                <span>
                                                      <img src="{{asset($post->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarpost)}}'" alt="" class="skill-card-icon" style="width: 40px;">
                                                      {{$post->name}}
                                                </span>
                                                </h5> 
                                          </div>
                                          <div class="col-md-3">
                                                <small class="text-white float-right pt-2"> {{$post->createddatetime}}</small>
                                          </div>
                                    </div>
                              </div>
                        @else
                              <div class="card-header bg-primary">
                                    <div class="row">
                                          <div class="col-md-9 ">
                                                @php   
                                                if($post->usertypeid == '2'){
                                                      if(strtolower($post->gender) == 'female'){
                                                            $avatarpost = 'avatar/teacher-female.png';
                                                      }
                                                      else{
                                                            $avatarpost = 'avatar/teacher-male.png';
                                                      }
                                                }else{   
                                                      if(strtolower($post->gender) == 'female'){
                                                            $avatarpost = 'avatar/S(F) 1.png';
                                                      }
                                                      else{
                                                            $avatarpost = 'avatar/S(M) 1.png';
                                                      }
                                                }            
                                                @endphp
                                                <h5 class="text-white">
                                                <span>
                                                      <img src="{{asset($post->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarpost)}}'" alt="" class="skill-card-icon" style="width: 40px;">
                                                      {{$post->name}}
                                                </span>
                                                </h5> 
                                          </div>
                                          <div class="col-md-3">
                                                <small class="text-white float-right pt-2"> {{$post->createddatetime}}</small>
                                          </div>
                                    </div>
                              </div>
                        @endif
                        
                        <div class="card-body">

                        @if($post->type == 1)

                              <div class="uk-margin">
                                    {{$post->content}}
                              </div>    
                              <div class="uk-margin" data-holder="edit_buttons_holder" hidden data-id="{{$post->id}}">
                                    <button type="button" class="btn btn-success" 
                                    data-id="{{$post->id}}"
                                    data-holder="edit_post_button"
                                    >Update</button>
                                    <button type="button" class="btn btn-danger"  
                                    data-id="{{$post->id}}"
                                    data-holder="cancel_post_button"
                                    >Cancel</button>
                              </div>

                        @elseif($post->type == 2)


                              <strong class="uk-text-large">{{$post->content}}</strong>

                              
                        @elseif($post->type == 3)

                              <span class="badge badge-soft-primary mt-n1">Assignment</span>
                              <span class="badge badge-soft-primary mt-n1">Turned In ({{$post->turnedin}})</span>
                              <h4>{{$post->content}}</h4>

                        @elseif($post->type == 4)
                              <span class="badge badge-soft-warning mt-n1">Quiz</span>
                              <span class="badge badge-soft-warning mt-n1">Turned In ({{$post->turnedin}})</span>
                              <h4>{{$post->content}}</h4>
                        @endif




                        @if(count($post->attachments) > 0)
                              <div class="path-wrap">
            
                                    <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">
            
                                    <div uk-lightbox>
                                    <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-2-6@m uk-grid-match uk-grid p-2" style="transform: translate3d(0px, 0px, 0px);">
                                          @foreach($post->attachments as $attachment)
                                                <li tabindex="-1" class="uk-active ">
                                                <div class="skill-card p-1 bg-soft-dark" style="">
                                                      <a href="{{asset($attachment->filepath)}}" class="mr-2">
                                                            @if($attachment->extension == 'doc' || $attachment->extension == 'docx' )
                                                            <img src="{{asset('assets/images/doc.png')}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @elseif($attachment->extension == 'ppt' || $attachment->extension == 'pptx' )
                                                            <img src="{{asset('assets/images/ppt.png')}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @elseif($attachment->extension == 'xls' || $attachment->extension == 'xlsx' )
                                                            <img src="{{asset('assets/images/xls.jpg')}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @elseif($attachment->extension == 'pdf')
                                                            <img src="{{asset('assets/images/pdf.png')}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @elseif($attachment->extension == 'mp3' || $attachment->extension == 'm4a')
                                                            <img src="{{asset('assets/images/audio.png')}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @elseif($attachment->extension == 'mp4')
                                                            <img src="{{asset('assets/images/video.png')}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @else
                                                            <img src="{{asset($attachment->filepath)}}" alt="" class="skill-card-icon" style="width: 40px;">
                                                            @endif
                                                      </a>
                                                      <div style="display: block; width: 80%">
                                                            <p style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis !important; " > {{$attachment->filename}}</p>
                                                            <p class="skill-card-subtitle">{{strtoupper($attachment->extension)}} File
                                                            {{-- <span class="skill-card-bullet"></span> 3
                                                            bundles --}}
                                                            </p>
                                                      </div>
                                                </div>
                                                </li>
                                          @endforeach
                                    </ul>
                                    </div>
                                    <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible bg-dark" href="#" uk-slider-item="previous"></a>
                                    <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next bg-dark" href="#" uk-slider-item="next"></a>
                                    </div>
            
                              </div>
                        @endif
                        </div>
                        @if($post->type != 2)     
                              <div class="card-footer bg-soft-dark pt-2">     
                                                                        
                              <div class="commentscontainerautodisplay uk-margin" postid="{{$post->id}}">
                                    @if(count($post->comments) > 0)
                                          @foreach($post->comments as $comment)
                                          @php   
                                                if($comment->usertypeid == '2'){
                                                      if(strtolower($comment->gender) == 'female'){
                                                      $avatarcomment = 'avatar/teacher-female.png';
                                                      }
                                                      else{
                                                      $avatarcomment = 'avatar/teacher-male.png';
                                                      }
                                                }else{   
                                                      if(strtolower($comment->gender) == 'female'){
                                                      $avatarcomment = 'avatar/S(F) 1.png';
                                                      }
                                                      else{
                                                      $avatarcomment = 'avatar/S(M) 1.png';
                                                      }
                                                }            
                                          @endphp
                                          <div class="row mt-2">
                                                <div class="col-1 col-md-1 col-lg-1 pr-0 text-center">
                                                      <input type="hidden" id="commentids{{$post->id}}" name="commentids{{$post->id}}[]" class="commentids" value="{{$comment->id}}"/>
                                                      <img src="{{asset($comment->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarcomment)}}'" alt="" class="skill-card-icon" style="width: 30px;">
                                                </div>
                                                <div class="col-11 col-md-11 col-lg-11 pl-0">
                                                      {{$comment->content}} - <small class="text-muted">{{$comment->createddatetime}}</small>
                                                </div>
                                                <hr/>
                                          </div>
                                          @endforeach
                                    @endif
                              </div>
                              
                                    <div class="commentscontainer" postid="{{$post->id}}"></div>
                                          <form action="/studentpostcomment" method="get">
                                                <div class="row">
                                                      <div class="col-1 col-md-1 col-lg-1 pr-0">
                                                      </div>
                                                      <div class="col-11 col-md-9 col-lg-9 pl-0">
                                                      <input class="form-control" style="border-radius: 50px; " name="commentcontent" type="text" placeholder="Write something..."
                                                      data-id="{{$post->id}}"
                                                      >
                                                      </div> 
                                                      <div class="col-md-2 col-lg-2 pr-0 pl-0 text-center">
                                                      <button data-id="{{$post->id}}" type="button" class="btn btn-success commentbutton">Comment</button>
                                                      </div>
                                                </div>
                                          </form>
                                    </div>
                        @endif
                  </div>      
            </div>
            </div>
      @endforeach
@else
      <div>
            <div class="uk-card uk-card-primary uk-card-body bg-info">
                  <h4 class="uk-card-title">NO POST AVAILABLE!</h4>
                  <p>This room does not contain any post</p>
            </div>
      </div>
@endif
                                  