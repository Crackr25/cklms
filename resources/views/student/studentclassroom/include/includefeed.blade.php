

                            <h4> Create Post </h4>
                            <form action="/studentpost" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="classroomid" value="{{$classroominfo->id}}"/>
                                <textarea class="" style="min-height: 10px; !important" placeholder="Write something..." name="postcontent" id="postcontent" required></textarea>    
                                <div class="row">
                                    <div class="col-md-12" style="width: 100%;overflow-x : scroll;">
                                        <input id='fileid' type='file' name="files[]" multiple accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*,video/*,audio/*" hidden/>
                                    </div>    
                                </div> 
                                <div class="uk-flex">
                                    <button type="button" class="btn btn-sm btn-warning m-1" id="addattachment"><i class="fa fa-plus"></i> Attachment</button>
                                    {{-- <button class="btn btn-sm btn-warning m-1">Document</button> --}}
                                    <button type="button" class="btn btn-sm btn-success m-1 float-right" id="submitform"><i class="icon-brand-telegram-plane"></i> Post</button>
                                </div>
                            </form>
                            <br/>
                            <div class="postscontainer">
                                @if(count($posts)>0)
                                    @foreach($posts as $post)
                                        @if($post->type == 1 ||$post->type == 3 ||$post->type == 4)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card rounded">
                                                        <div class="card-header pb-0">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <input class="postids" type="hidden" value="{{$post->id}}"/>
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
                                                                                <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only ">
                                                                                    <small><i class="uil-edit-alt"></i></small>
                                                                                </button>
                                                                                <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only ">
                                                                                    <small><i class="uil-trash-alt"></i></small>
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
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="card-body pb-0">
                                                            @if($post->type == 1)
                                                            {{$post->content}}
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
                                                        <div class="card-footer bg-soft-dark pt-2">                    
                                                            <div class="commentscontainerautodisplay" postid="{{$post->id}}">
                                                                @if(count($post->comments) > 0)
                                                                    @foreach($post->comments as $comment)
                                                                        @php   
                                                                            if($comment->usertypeid == '2'){
                                                                                if(strtolower($post->gender) == 'female'){
                                                                                    $avatar = 'avatar/teacher-female.png';
                                                                                }
                                                                                else{
                                                                                    $avatar = 'avatar/teacher-male.png';
                                                                                }
                                                                            }else{   
                                                                                if(strtolower($comment->gender) == 'female'){
                                                                                    $avatar = 'avatar/S(F) 1.png';
                                                                                }
                                                                                else{
                                                                                    $avatar = 'avatar/S(M) 1.png';
                                                                                }
                                                                            }            
                                                                        @endphp
                                                                        <div class="row">
                                                                            <div class="col-1 col-md-1 col-lg-1 pr-0 text-center">
                                                                                <input type="hidden" id="commentids{{$post->id}}" class="commentids" name="commentids{{$post->id}}[]" value="{{$comment->id}}"/>
                                                                                <img src="{{asset($comment->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatar)}}'" alt="" class="skill-card-icon" style="width: 30px;">
                                                                            </div>
                                                                            <div class="col-11 col-md-11 col-lg-11 pl-0">
                                                                                {{$comment->content}} - <small class="text-muted">{{$comment->createddatetime}}</small>
                                                                            </div>
                                                                            <hr/>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <script>
                                                                // $(document).ready(function(){
                                                                    
                                                                //     functions['refresh{{$post->id}}'] = function()
                                                                //         {
                                                                //             var commentids = [];
                                                                //             $.each($('.commentscontainerautodisplay[postid="{{$post->id}}"] .commentids'), function(){
                                                                //                 commentids.push($(this).val())
                                                                //             })
                                                                //             $.ajax({
                                                                //                 url: '/studentrefreshcomments',
                                                                //                 type: 'GET',
                                                                //                 dataType:"json",
                                                                //                 data:{
                                                                //                     postid          :  '{{$post->id}}',
                                                                //                     commentids      :   commentids
                                                                //                 },
                                                                //                 success: function(data){
                                                                //                     $.each(data[1], function(key, value){
                                                                //                         $('div.commentscontainerautodisplay[postid="'+data[0]+'"]').append(
                                                                //                             '<div class="row">'+
                                                                //                                 '<div class="col-1 col-md-1 col-lg-1 pr-0 text-center">'+
                                                                //                                     '<input type="hidden" id="commentids'+data[0]+'" class="commentids" name="commentids'+data[0]+'[]" value="'+value.id+'"/>'+
                                                                //                                     '<img src="'+value.picurl+'" onerror="this.onerror = null, this.src='+value.avatar+'" alt=""  class="skill-card-icon" style="width: 30px;">'+
                                                                //                                 '</div>'+
                                                                //                                 '<div class="col-11 col-md-11 col-lg-11 pl-0">'+
                                                                //                                     value.content+' - <small class="text-muted">'+value.createddatetime+'</small>'+
                                                                //                                 '</div>'+
                                                                //                                 '<hr/>'+
                                                                //                             '</div>'
                                                                //                         )
                                                                //                     })
                                                                //                 }
                                                                //             })
                                                                //         }
                                                                //     setInterval(function(){
                                                                //         functions['refresh{{$post->id}}']();
                                                                //     }, 2000);
                                                                })
                                                            </script>
                                                            <div class="commentscontainer" postid="{{$post->id}}"></div>
                                                            <form action="/studentpostcomment" method="get">
                                                                <input type="hidden" name="postid" value="{{$post->id}}"/>
                                                                <div class="row">
                                                                    <div class="col-1 col-md-1 col-lg-1 pr-0">
                                                                        {{-- <img src="{{asset($post->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarpost)}}'" alt="" class="skill-card-icon" style="width: 40px;"> --}}
                                                                    </div>
                                                                    <div class="col-11 col-md-9 col-lg-9 pl-0">
                                                                        <input class="form-control" style="border-radius: 50px; " name="commentcontent" type="text" placeholder="Write something...">
                                                                    </div> 
                                                                    <div class="col-md-2 col-lg-2 pr-0 pl-0 text-center">
                                                                        <button type="button" class="btn btn-success commentbutton">Comment</button>
                                                                    </div>
                                                                </div>
                                                            </form>
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
                                                                <div class="col-md-9">
                                                                    <input class="postids" type="hidden" value="{{$post->id}}"/>
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
                                                                            <img src="{{asset($post->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatarpost)}}'" alt="" class="skill-card-icon" style="width: 40px;background-color: #FFC198">
                                                                            @if($post->mine == '1')
                                                                                Me <small class="text-muted">({{$post->name}})</small>
                                                                                <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only ">
                                                                                    <small><i class="uil-edit-alt"></i></small>
                                                                                </button>
                                                                                <button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only ">
                                                                                    <small><i class="uil-trash-alt"></i></small>
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
                                                            </div>
                                                            <strong><h4 class="text-center">A N N O U N  C E M E N T</h4></strong>
                                                            <small class="text-muted text-center"> {{$post->createddatetime}}</small>
    
                                                            <br>
                                                            {{$post->content}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <script>
                                // $(document).ready(function(){
                                //     functions['refreshpost'] = function()
                                //         {
                                //             var postids = [];
                                //             $.each($('.postscontainer .postids'), function(){
                                //                 postids.push($(this).val())
                                //             })
                                //             $.ajax({
                                //                 url: '/studentrefreshposts',
                                //                 type: 'GET',
                                //                 dataType:"json",
                                //                 data:{
                                //                     classroomid  :  '{{$classroominfo->id}}',
                                //                     postids      :   postids
                                //                 },
                                //                 success: function(data){
                                //                     if(data.length > 0){
                                //                         $.each(data, function(key, value){
                                //                             $('.postscontainer').prepend(value)
                                //                         })
                                //                     }
                                //                 }
                                //             })
                                //         }
                                //     setInterval(function(){
                                //         functions['refreshpost']();
                                //     }, 5000);
                                // })
                            </script>