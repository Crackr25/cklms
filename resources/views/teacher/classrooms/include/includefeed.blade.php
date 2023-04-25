
                            {{-- #17A48D --}}
                            <form action="/teacherpost" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="uk-flex">
                                    <h3>Create</h3>
                                    <div class="uk-margin-left">
                                        <select name="posttype" class="uk-select">
                                            <option value="1">Post</option>    
                                            <option value="2">Announcement</option>    
                                            {{-- <option value="3">Assignment</option>    
                                            <option value="4">Quiz</option>     --}}
                                        </select>     
                                    </div> 
                                </div>
                                <input type="hidden" name="classroomid"/>
                                <div class="uk-margin">
                                    <textarea class="uk-textarea" style="min-height: 10px; !important"  rows="6" placeholder="Write something..." name="postcontent" id="postcontent" required></textarea> 
                                </div>
                                   
                                {{-- <div class="row">
                                    <div class="col-md-12" style="width: 100%;overflow-x : scroll;">
                                        <input id='fileid' type='file' name="files[]" multiple accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*,video/*,audio/*" hidden/>
                                    </div>    
                                </div>  --}}


                                <div class="uk-flex">
                                    <button type="button" class="btn btn-sm btn-warning m-1" id="addattachment"><i class="fa fa-plus"></i> Attachment</button>
                                    <button type="button" class="btn btn-sm btn-success m-1 float-right" id="submitform"><i class="icon-brand-telegram-plane"></i> Post</button>
                                </div>
                            </form>
                            @if(count($posts)>0)
                                <br/>
                                 {{-- <a class="uk-button uk-button-default" href="images/photo.jpg" data-caption="Image">Image</a> <a class="uk-button uk-button-default" href="https://quirksmode.org/html5/videos/big_buck_bunny.mp4" data-caption="Video">Video</a> <a class="uk-button uk-button-default" href="https://www.youtube.com/watch?v=YE7VzlLtp-4" data-caption="YouTube">YouTube</a> <a class="uk-button uk-button-default" href="https://vimeo.com/1084537" data-caption="Vimeo">Vimeo</a> <a class="uk-button uk-button-default" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4740.819266853735!2d9.99008871708242!3d53.550454675412404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3f9d24afe84a0263!2sRathaus!5e0!3m2!1sde!2sde!4v1499675200938" data-caption="Google Maps" data-type="iframe">Google Maps</a> </div> --}}

                                @foreach($posts as $post)
                                    @if($post->type == 1 ||$post->type == 3 ||$post->type == 4)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card p-0 rounded">
                                                    <div class="card-header">
                                                        {{-- <div class="row">
                                                            <div class="col-md-9">
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
                                                                <h5 class="uk-heading-line">
                                                                    <span>
                                                                        <img src="{{asset($post->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarpost)}}'" alt="" class="skill-card-icon" style="width: 40px;">
                                                                        @if($post->mine == '1')
                                                                            Me <small class="text-muted">({{$post->name}})</small>
                                                                            <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only editpost" data-id="{{$post->id}}">
                                                                                <small><i class="uil-edit-alt"></i></small>
                                                                            </button>
                                                                            <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only removepost" data-id="{{$post->id}}" >
                                                                                <i class="uil-trash-alt"></i>
                                                                            </button>
                                                                        @else
                                                                            {{$post->name}}
                                                                        @endif
                                                                    </span>
                                                                </h5> 
                                                            </div>
                                                            <div class="col-md-3">
                                                                <small class="text-muted float-right pt-2"> {{$post->createddatetime}}</small>
                                                            </div>
                                                        </div> --}}
                                                      
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
                                                            <div class="uk-width-expand pl-0 uk-first-column">
                                                                <div class="user-details-card p-0">
                                                                    <div class="user-details-card-avatar">
                                                                        <img src="{{asset($avatarpost)}}" alt="">
                                                                    </div>
                                                                    <div class="user-details-card-name">
                                                                       {{$post->name}} <span> {{\Carbon\Carbon::create($post->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}} 
                                                                    </span>
                                                                    @if($post->mine == '1')
                                                                        <span>
                                                                            {{-- <button type="button" class="btn btn-success btn-sm editpost" >
                                                                                <i class="uil-edit-alt"></i> Edit
                                                                            </button>
                                                                            <button type="button" class="btn btn-sm  btn-danger">
                                                                                <i class="uil-trash-alt"></i> Delete
                                                                            </button> --}}
                                                                        </span>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         
                                                    </div>
                                                    
                                                    <div class="card-body">

                                                        @if($post->type == 1)
                                                            <p class="lead"> {{$post->content}}</p>

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


                                                            <strong><h4>{{$post->content}}</h4></strong>

                                                            
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
                                                    <div class="card-footer">                                                    
                                                        <div class="commentscontainerautodisplay uk-margin comments mt-2" postid="{{$post->id}}">
                                                            <h4>Comments</h4>
                                                            <ul>
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
                                                                        {{-- <div class="row mt-2">
                                                                            <div class="col-1 col-md-1 col-lg-1 pr-0 text-center">
                                                                                <input type="hidden" id="commentids{{$post->id}}" name="commentids{{$post->id}}[]" class="commentids" value="{{$comment->id}}"/>
                                                                                <img src="{{asset($comment->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarcomment)}}'" alt="" class="skill-card-icon" style="width: 30px;">
                                                                            </div>
                                                                            <div class="col-11 col-md-11 col-lg-11 pl-0">
                                                                                {{$comment->content}} - <small class="text-muted">{{$comment->createddatetime}}</small>
                                                                            </div>
                                                                            <hr/>
                                                                        </div> --}}
                                                                        
                                                                            <li>
                                                                                <div class="comments-avatar"><img src="{{asset($avatarcomment)}}" alt="">
                                                                                </div>
                                                                                <div class="comment-content">
                                                                                    <div class="comment-by">{{$comment->name}}<span>{{\Carbon\Carbon::create($comment->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}</span>
                                                                                    </div>
                                                                                    <p>{{$comment->content}}
                                                                                    </p>
                                                                                </div>
                                                                            </li>
                                                                        
                                                                    
                                                                    @endforeach
                                                                
                                                                @endif
                                                            </ul>
                                                        </div>
                                                      
                                                        <div class="commentscontainer" postid="{{$post->id}}"></div>
                                                        <div class="uk-grid-small uk-width-5-6@m m-auto mt-lg-6 mt-4 pb-3 " uk-grid="">
                                                            <div class="uk-width-expand pl-0 uk-first-column">
                                                                <input type="text" class="uk-input uk-form-small"  name="commentcontent"  style="border:0;height:39px" placeholder="Write something..."  data-id="{{$post->id}}">
                                                            </div>
                                                            <div class="uk-width-1-6@s uk-width-auto pl-3">
                                                                <button data-id="{{$post->id}}" type="button" class="btn btn-success commentbutton">Comment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card rounded p-3" style="background-color: #FFC198">
                                                    {{-- <div class="card-header pb-0"> --}}
                                                        <div class="row">
                                                            <div class="col-md-12">
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
                                                                <h5 class="uk-heading-line">
                                                                    <span>
                                                                        {{-- <img src="{{asset($post->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarpost)}}'" alt="" class="skill-card-icon" style="width: 40px;"> --}}
                                                                        @if($post->mine == '1')
                                                                            {{-- Me <small class="text-muted">({{$post->name}})</small> --}}
                                                                            <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only editpost" data-id="{{$post->id}}">
                                                                                <small><i class="uil-edit-alt"></i></small>
                                                                            </button>
                                                                            <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only removepost" data-id="{{$post->id}}">
                                                                                <span class="btn-inner--icon">
                                                                                    <i class="uil-trash-alt"></i>
                                                                                  </span>
                                                                            </button>
                                                                        @else
                                                                            {{-- {{$post->name}} --}}
                                                                        @endif
                                                                    </span>
                                                                </h5> 
                                                            </div>
                                                            {{-- <div class="col-md-3">
                                                                <small class="text-muted float-right pt-2"> {{$post->createddatetime}}</small>
                                                            </div> --}}
                                                        </div>
                                                    {{-- </div> --}}
                                                    
                                                    {{-- <div class="card-body pb-0"> --}}
                                                        <strong><h4 class="text-center">A N N O U N  C E M E N T</h4></strong>
                                                        <small class="text-muted text-center"> {{$post->createddatetime}}</small>

                                                        <br>
                                                            <textarea class="uk-textarea " style="min-height: 10px; !important" placeholder="Write something..." rows="3" name="postcontent" readonly data-id="{{$post->id}}" data-holder="edit_post_textarea">{{$post->content}}</textarea> 
                                                   
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
                                                        {{-- {{$post->content}} --}}
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
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif