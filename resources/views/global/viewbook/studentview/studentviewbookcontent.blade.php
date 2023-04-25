
                        @if(count($bookinfo->parts) == 0)
                            @if(count($bookinfo->chapters)>0)
                                @foreach($bookinfo->chapters as $bookchapterinfo)
                                    <article class="uk-card-default p-4 rounded chapterarticle" id="articlechapter{{$bookchapterinfo->id}}">
                                        <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                                            <li>
                                                <a class="uk-accordion-title" href="#">
                                                    {{$bookchapterinfo->title}}
                                                </a>
                                                <div class="uk-accordion-content">
                                                    <textarea class="otherinfo">
                                                        {{$bookchapterinfo->description}}</textarea>
                                                </div>
                                            </li>
                                        </ul>
                                    </article>
                                    
                                    <ul id="chapter-video-slider-{{$bookchapterinfo->id}}" class="uk-switcher containerlessonsview p-3" style="touch-action: pan-y pinch-zoom;">


                                        @if(count($bookchapterinfo->chaptercontents)>0)
                                            @foreach($bookchapterinfo->chaptercontents as $chaptercontentinfo)
                                                @if($chaptercontentinfo->displaytype == 'l')
                                                    <li>
                                                        <div class="bg-grey uk-light uk-padding pb-0 rounded shadow">
                                                            <h2><strong>{{$chaptercontentinfo->title}}</strong> </h2>
                                                            <small>Lesson</small>
                                                        </div>
                                                        <br/>
                                                        <textarea class="lessondescription">{{$chaptercontentinfo->description}}</textarea>
                                                        <br/>
                                                        @if(count($chaptercontentinfo->lessoncontents)>0)
                                                            @foreach($chaptercontentinfo->lessoncontents as $lessoncontent)
                                                                @if($lessoncontent->type == '1')
                                                                    <h4><strong>{{$lessoncontent->content}}</strong></h4>
                                                                @elseif($lessoncontent->type == '2')
                                                                    <br/>
                                                                    <textarea class="lessondescription">{{$lessoncontent->content}}</textarea>
                                                                @elseif($lessoncontent->type == '3')
                                                                    <br/>
                                                                    @if($lessoncontent->extension == 'pdf')
                                                                        <div class="embed-video">
                                                                            <iframe src="{{asset($lessoncontent->filepath)}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                                                        </div>
                                                                    @endif
                                                                @elseif($lessoncontent->type == '4')
                                                                    <br/>
                                                                    <div class="embed-video">
                                                                        @php
                                                                            echo htmlspecialchars_decode(stripslashes($lessoncontent->content))
                                                                        @endphp
                                                                    </div>
                                                                @elseif($lessoncontent->type == '5')
                                                                    <br/>
                                                                    <img src="{{$lessoncontent->filepath}}" alt="">
                                                                @elseif($lessoncontent->type == '6')
                                                                    <br/>
                                                                    <div class="embed-video">
                                                                        <iframe src="{{$lessoncontent->filepath}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </li>
                                                @else
                                                    <li>
                                                        <div class="bg-info uk-light uk-padding pb-0 rounded shadow">
                                                            <h2><strong>{{$chaptercontentinfo->title}}</strong>
                                                            
                                                            @if($chaptercontentinfo->sched == 1)
                                                                @if($chaptercontentinfo->schedinfo->noofattempts == null)
                                                                @else
                                                                    <button type="button" class="btn btn-secondary btn-icon-label active mb-2 float-right">
                                                                        Attempts: {{$chaptercontentinfo->schedinfo->noofattempts}}
                                                                    </button>
                                                                @endif
                                                            @endif
                                                            </h2>
                                                            <small>Chapter Test</small>

                                                            <ul class="uk-tab"
                                                                uk-switcher="connect: #component-tab-left-test{{$chaptercontentinfo->id}}; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                                                <li class="uk-active"><a href="#"> <i class="icon-feather-list mr-2"></i>Content</a>
                                                                </li>
                                                                @if($chaptercontentinfo->sched == 1)
                                                                <li class="uk-disabled"><a href="#" id="datefrom{{$chaptercontentinfo->id}}">From: {{$chaptercontentinfo->schedinfo->datefrom}} {{$chaptercontentinfo->schedinfo->timefrom}}</a></li>
                                                                <li class="uk-disabled"><a href="#" id="dateto{{$chaptercontentinfo->id}}">To: {{$chaptercontentinfo->schedinfo->dateto}} {{$chaptercontentinfo->schedinfo->timeto}}</a></li>
                                                                @endif

                                                            </ul>
                                                        </div>
                                                        
                                                        @if($chaptercontentinfo->sched == 0)
                                                            <br/>
                                                            <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                <div> 
                                                                    <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                        <h3 class="uk-card-title">Not yet activated</h3> 
                                                                        <p>Contact your instructor!</p> 
                                                                    </div> 
                                                                </div> 
                                                            </div>

                                                        @else
                                                            <ul class="uk-switcher uk-margin" id="component-tab-left-test{{$chaptercontentinfo->id}}">
                                                                <!-- tab 1 -->
                                                                <li id="chaptertest{{$chaptercontentinfo->id}}container">
                                                                    @if($chaptercontentinfo->schedinfo->status == 1)
                                                                        <div class="uk-alert-primary" uk-alert>
                                                                            <div class="row text-center">
                                                                                <div class="col-4">
                                                                                    <small>Hours</small>
                                                                                    <label id="hour{{$chaptercontentinfo->id}}deadline"></label>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <small>Minutes</small>
                                                                                    <label id="minute{{$chaptercontentinfo->id}}deadline"></label>
                                                                                </div>
                                                                                <div class="col-4">
                                                                                    <small>Seconds</small>
                                                                                    <label id="second{{$chaptercontentinfo->id}}deadline"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <script>
                                                                            $(document).ready(function(){
                                                                                var deadline = new Date("{{$chaptercontentinfo->schedinfo->dateto.' '.date('H:i:s', strtotime($chaptercontentinfo->schedinfo->timeto))}}").getTime(); 

                                                                                var x = setInterval(function() { 
                                                                                
                                                                                var now = new Date().getTime(); 
                                                                                var t = deadline - now; 
                                                                                var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
                                                                                var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
                                                                                var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
                                                                                var seconds = Math.floor((t % (1000 * 60)) / 1000); 
                                                                                // document.getElementById("day{{$chaptercontentinfo->id}}").innerHTML =days ; 
                                                                                document.getElementById("hour{{$chaptercontentinfo->id}}deadline").innerHTML =hours; 
                                                                                document.getElementById("minute{{$chaptercontentinfo->id}}deadline").innerHTML = minutes;  
                                                                                document.getElementById("second{{$chaptercontentinfo->id}}deadline").innerHTML =seconds;  
                                                                                // if (t < 0) { 
                                                                                //         clearInterval(x); 
                                                                                //         document.getElementById("demo{{$chaptercontentinfo->id}}").innerHTML = "TIME UP"; 
                                                                                //         document.getElementById("day{{$chaptercontentinfo->id}}").innerHTML ='0'; 
                                                                                //         document.getElementById("hour{{$chaptercontentinfo->id}}").innerHTML ='0'; 
                                                                                //         document.getElementById("minute{{$chaptercontentinfo->id}}").innerHTML ='0' ;  
                                                                                //         document.getElementById("second{{$chaptercontentinfo->id}}").innerHTML = '0'; } 
                                                                                }, 1000);

                                                                            })
                                                                        </script>
                                                                        <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                                                                            <li>
                                                                                <a class="uk-accordion-title" href="#">
                                                                                    Instructions (<i>Click here to view instructions</i>)
                                                                                </a>
                                                                                <div class="uk-accordion-content">
                                                                                    <textarea class="quizdescription">{{$chaptercontentinfo->description}}</textarea>
                                                                                </div>
                                                                            </li>
                                                                        </ul>

                                                                        @if(count($chaptercontentinfo->questions)>0)
                                                                            @php
                                                                                $itemno = 1;
                                                                            @endphp
                                                                            <form id="chaptertestform{{$chaptercontentinfo->id}}" class="mb-5 pb-3">
                                                                                <div uk-slideshow="animation: push">
                                                                                    <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                                                                                        <ul class="uk-slideshow-items">
                                                                                            @foreach($chaptercontentinfo->questions as $questioninfo)
                                                                                                <li>
                                                                                                    <div class="uk-card-hover uk-card-body h-100 uk-text-secondary bg-secondary" style="overflow-y: auto;">
                                                                                                        {{$itemno}}. {{$questioninfo->question}} 
                                                                                                        {{-- @if(count($questioninfo->answers)>0) --}}
                                                                                                            @if($questioninfo->type == '1')
                                                                                                                <ul class="uk-list pl-4">
                                                                                                                    @foreach($questioninfo->answers as $answer)
                                                                                                                        <li>
                                                                                                                            <div class="form-group clearfix">
                                                                                                                                @if($questioninfo->noofanswers == 1)
                                                                                                                                    <div class="icheck-primary d-inline">
                                                                                                                                        <input type="radio"     name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}     "id="answer{{$answer->id}}" class="answervalue"value="{{$answer->id}}" >
                                                                                                                                        <label for="answer{{$answer->id}}">
                                                                                                                                            {{$answer->description}}
                                                                                                                                        </label>
                                                                                                                                    </div>
                                                                                                                                @else
                                                                                                                                    <div class="icheck-primary d-inline">
                                                                                                                                        <input type="checkbox" id="answer{{$answer->id}}" name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}[]" value="{{$answer->id}}" class="answervalue">
                                                                                                                                        <label for="answer{{$answer->id}}">
                                                                                                                                            {{$answer->description}}
                                                                                                                                        </label>
                                                                                                                                    </div>
                                                                                                                                @endif
                                                                                                                            </div>
                                                                                                                        </li>
                                                                                                                    @endforeach
                                                                                                                </ul>
                                                                                                            @elseif($questioninfo->type == '2')
                                                                                                                (<em>Identification</em>)
                                                                                                                <input name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}" class="answervalue" style="border: 1px solid black;"/>
                                                                                                            @elseif($questioninfo->type == '3')
                                                                                                                (<em>Short Essay</em>)
                                                                                                                <textarea name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}" class="answervalue" style="border: 1px solid black;"></textarea>
                                                                                                            @endif
                                                                                                        {{-- @endif --}}
                                                                                                    </div>
                                                                                                </li>
                                                                                                @php
                                                                                                    $itemno += 1;
                                                                                                @endphp
                                                                                            @endforeach
                                                                                        </ul>
                                                                                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                                                                                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                                                                                    </div>
                                                                                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                                                                                </div>
                                                                                <button type="button" class="btn btn-success float-right submitanswers">Submit Answers</button>
                                                                            </form>
                                                                        @endif
                                                                    @else
                                                                        @if(strtotime(date('M d, Y h:i:s A')) < strtotime($chaptercontentinfo->schedinfo->datefrom.' '.$chaptercontentinfo->schedinfo->timefrom))
                                                                            <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                                <div> 
                                                                                    <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                                        <h3 class="uk-card-title">Not yet activated</h3> 
                                                                                        <p>Contact your instructor!</p> 
                                                                                    </div> 
                                                                                </div> 
                                                                            </div>
                                                                        @elseif(strtotime(date('M d, Y h:i:s A')) > strtotime($chaptercontentinfo->schedinfo->dateto.' '.$chaptercontentinfo->schedinfo->timeto))
                                                                            <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                                <div> 
                                                                                    <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                                        <h3 class="uk-card-title">Chapter test is closed</h3> 
                                                                                        <p>Deadline reached.</p> 
                                                                                    </div> 
                                                                                </div> 
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                @endforeach
                            @endif
                        @else
                            @foreach($bookinfo->parts as $bookpartinfo)
                                @if(count($bookpartinfo->chapters)>0)
                                    @foreach($bookpartinfo->chapters as $bookchapterinfo)
                                        <article class="uk-card-default p-4 rounded chapterarticle" id="articlechapter{{$bookchapterinfo->id}}">
                                            <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                                                <li>
                                                    <a class="uk-accordion-title" href="#">
                                                        {{$bookchapterinfo->title}}
                                                    </a>
                                                    <div class="uk-accordion-content">
                                                        <textarea class="otherinfo">
                                                            {{$bookchapterinfo->description}}</textarea>
                                                    </div>
                                                </li>
                                            </ul>
                                        </article>
                                        
                                        <ul id="chapter-video-slider-{{$bookchapterinfo->id}}" class="uk-switcher containerlessonsview p-3" style="touch-action: pan-y pinch-zoom;">


                                            @if(count($bookchapterinfo->chaptercontents)>0)
                                                @foreach($bookchapterinfo->chaptercontents as $chaptercontentinfo)
                                                    @if($chaptercontentinfo->displaytype == 'l')
                                                        <li>
                                                            <div class="bg-grey uk-light uk-padding pb-0 rounded shadow">
                                                                <h2><strong>{{$chaptercontentinfo->title}}</strong> </h2>
                                                                <small>Lesson</small>
                                                            </div>
                                                            <br/>
                                                            <textarea class="lessondescription">{{$chaptercontentinfo->description}}</textarea>
                                                            <br/>
                                                            @if(count($chaptercontentinfo->lessoncontents)>0)
                                                                @foreach($chaptercontentinfo->lessoncontents as $lessoncontent)
                                                                    @if($lessoncontent->type == '1')
                                                                        <h4><strong>{{$lessoncontent->content}}</strong></h4>
                                                                    @elseif($lessoncontent->type == '2')
                                                                        <br/>
                                                                        <textarea class="lessondescription">{{$lessoncontent->content}}</textarea>
                                                                    @elseif($lessoncontent->type == '3')
                                                                        <br/>
                                                                        @if($lessoncontent->extension == 'pdf')
                                                                            <div class="embed-video">
                                                                                <iframe src="{{asset($lessoncontent->filepath)}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                                                            </div>
                                                                        @endif
                                                                    @elseif($lessoncontent->type == '4')
                                                                        <br/>
                                                                        <div class="embed-video">
                                                                            @php
                                                                                echo htmlspecialchars_decode(stripslashes($lessoncontent->content))
                                                                            @endphp
                                                                        </div>
                                                                    @elseif($lessoncontent->type == '5')
                                                                        <br/>
                                                                        <img src="{{$lessoncontent->filepath}}" alt="">
                                                                    @elseif($lessoncontent->type == '6')
                                                                        <br/>
                                                                        <div class="embed-video">
                                                                            <iframe src="{{$lessoncontent->filepath}}" frameborder="0" allowfullscreen="" uk-responsive="" class="uk-responsive-width"></iframe>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </li>
                                                    @else
                                                        <li>
                                                            <div class="bg-info uk-light uk-padding pb-0 rounded shadow">
                                                                <h2><strong>{{$chaptercontentinfo->title}}</strong>
                                                                
                                                                @if($chaptercontentinfo->sched == 1)
                                                                    @if($chaptercontentinfo->schedinfo->noofattempts == null)
                                                                    @else
                                                                        <button type="button" class="btn btn-secondary btn-icon-label active mb-2 float-right">
                                                                            Attempts: {{$chaptercontentinfo->schedinfo->noofattempts}}
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                                </h2>
                                                                <small>Chapter Test</small>

                                                                <ul class="uk-tab"
                                                                    uk-switcher="connect: #component-tab-left-test{{$chaptercontentinfo->id}}; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                                                    <li class="uk-active"><a href="#"> <i class="icon-feather-list mr-2"></i>Content</a>
                                                                    </li>
                                                                    @if($chaptercontentinfo->sched == 1)
                                                                    <li class="uk-disabled"><a href="#" id="datefrom{{$chaptercontentinfo->id}}">From: {{$chaptercontentinfo->schedinfo->datefrom}} {{$chaptercontentinfo->schedinfo->timefrom}}</a></li>
                                                                    <li class="uk-disabled"><a href="#" id="dateto{{$chaptercontentinfo->id}}">To: {{$chaptercontentinfo->schedinfo->dateto}} {{$chaptercontentinfo->schedinfo->timeto}}</a></li>
                                                                    @endif

                                                                </ul>
                                                            </div>
                                                            
                                                            @if($chaptercontentinfo->sched == 0)
                                                                <br/>
                                                                <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                    <div> 
                                                                        <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                            <h3 class="uk-card-title">Not yet activated</h3> 
                                                                            <p>Contact your instructor!</p> 
                                                                        </div> 
                                                                    </div> 
                                                                </div>

                                                            @else
                                                                @if(count($chaptercontentinfo->records) == 0)
                                                                
                                                                @if($chaptercontentinfo->schedinfo->status == 1)
                                                                    <div class="uk-alert-primary p-0 rounded" uk-alert>
                                                                        <div class="row text-center">
                                                                            <div class="col-3">
                                                                                <small>Days</small>
                                                                                <label id="day{{$chaptercontentinfo->id}}deadline"></label>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <small>Hours</small>
                                                                                <label id="hour{{$chaptercontentinfo->id}}deadline"></label>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <small>Minutes</small>
                                                                                <label id="minute{{$chaptercontentinfo->id}}deadline"></label>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <small>Seconds</small>
                                                                                <label id="second{{$chaptercontentinfo->id}}deadline"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <script>
                                                                        $(document).ready(function(){
                                                                            var deadline = new Date("{{$chaptercontentinfo->schedinfo->dateto.' '.date('H:i:s', strtotime($chaptercontentinfo->schedinfo->timeto))}}").getTime(); 

                                                                            var x = setInterval(function() { 
                                                                            
                                                                            var now = new Date().getTime(); 
                                                                            var t = deadline - now; 
                                                                            var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
                                                                            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
                                                                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
                                                                            var seconds = Math.floor((t % (1000 * 60)) / 1000); 
                                                                            document.getElementById("day{{$chaptercontentinfo->id}}deadline").innerHTML =days ; 
                                                                            document.getElementById("hour{{$chaptercontentinfo->id}}deadline").innerHTML =hours; 
                                                                            document.getElementById("minute{{$chaptercontentinfo->id}}deadline").innerHTML = minutes;  
                                                                            document.getElementById("second{{$chaptercontentinfo->id}}deadline").innerHTML =seconds;  
                                                                            // if (t < 0) { 
                                                                            //         clearInterval(x); 
                                                                            //         document.getElementById("demo{{$chaptercontentinfo->id}}").innerHTML = "TIME UP"; 
                                                                            //         document.getElementById("day{{$chaptercontentinfo->id}}").innerHTML ='0'; 
                                                                            //         document.getElementById("hour{{$chaptercontentinfo->id}}").innerHTML ='0'; 
                                                                            //         document.getElementById("minute{{$chaptercontentinfo->id}}").innerHTML ='0' ;  
                                                                            //         document.getElementById("second{{$chaptercontentinfo->id}}").innerHTML = '0'; } 
                                                                            }, 1000);

                                                                        })
                                                                    </script>
                                                                @endif
                                                                <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                    <div> 
                                                                        <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                            <h3 class="uk-card-title">Are you ready to take the test?</h3>
                                                                                <form action="/chaptertesttakethetest" method="get" target="_blank">
                                                                                    <input type="hidden" name="classroomid" value="{{$bookinfo->classroomid}}"/>
                                                                                    <input type="hidden" name="chapterquizid" value="{{$chaptercontentinfo->id}}"/>
                                                                                    <button type="button" noofattempts="{{$chaptercontentinfo->schedinfo->noofattempts}}" class="btn btn-sm btn-secondary active buttontakethetest" >Take the test</button>
                                                                                </form>
                                                                        </div> 
                                                                    </div> 
                                                                </div>
                                                                    {{-- <ul class="uk-switcher uk-margin" id="component-tab-left-test{{$chaptercontentinfo->id}}">
                                                                        <!-- tab 1 -->
                                                                        <li id="chaptertest{{$chaptercontentinfo->id}}container">
                                                                            @if($chaptercontentinfo->schedinfo->status == 1)
                                                                                <div class="uk-alert-primary p-0 rounded" uk-alert>
                                                                                    <div class="row text-center">
                                                                                        <div class="col-3">
                                                                                            <small>Days</small>
                                                                                            <label id="day{{$chaptercontentinfo->id}}deadline"></label>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <small>Hours</small>
                                                                                            <label id="hour{{$chaptercontentinfo->id}}deadline"></label>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <small>Minutes</small>
                                                                                            <label id="minute{{$chaptercontentinfo->id}}deadline"></label>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <small>Seconds</small>
                                                                                            <label id="second{{$chaptercontentinfo->id}}deadline"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <script>
                                                                                    $(document).ready(function(){
                                                                                        var deadline = new Date("{{$chaptercontentinfo->schedinfo->dateto.' '.date('H:i:s', strtotime($chaptercontentinfo->schedinfo->timeto))}}").getTime(); 
        
                                                                                        var x = setInterval(function() { 
                                                                                        
                                                                                        var now = new Date().getTime(); 
                                                                                        var t = deadline - now; 
                                                                                        var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
                                                                                        var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
                                                                                        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
                                                                                        var seconds = Math.floor((t % (1000 * 60)) / 1000); 
                                                                                        document.getElementById("day{{$chaptercontentinfo->id}}deadline").innerHTML =days ; 
                                                                                        document.getElementById("hour{{$chaptercontentinfo->id}}deadline").innerHTML =hours; 
                                                                                        document.getElementById("minute{{$chaptercontentinfo->id}}deadline").innerHTML = minutes;  
                                                                                        document.getElementById("second{{$chaptercontentinfo->id}}deadline").innerHTML =seconds;  
                                                                                        // if (t < 0) { 
                                                                                        //         clearInterval(x); 
                                                                                        //         document.getElementById("demo{{$chaptercontentinfo->id}}").innerHTML = "TIME UP"; 
                                                                                        //         document.getElementById("day{{$chaptercontentinfo->id}}").innerHTML ='0'; 
                                                                                        //         document.getElementById("hour{{$chaptercontentinfo->id}}").innerHTML ='0'; 
                                                                                        //         document.getElementById("minute{{$chaptercontentinfo->id}}").innerHTML ='0' ;  
                                                                                        //         document.getElementById("second{{$chaptercontentinfo->id}}").innerHTML = '0'; } 
                                                                                        }, 1000);

                                                                                    })
                                                                                </script>
                                                                                <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                                                                                    <li>
                                                                                        <a class="uk-accordion-title" href="#">
                                                                                            Instructions (<i>Click here to view instructions</i>)
                                                                                        </a>
                                                                                        <div class="uk-accordion-content">
                                                                                            <textarea class="quizdescription">{{$chaptercontentinfo->description}}</textarea>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                                
                                                                                @if(count($chaptercontentinfo->questions)>0)
                                                                                    @php
                                                                                        $itempageno = 1;
                                                                                    @endphp
                                                                                    @foreach($chaptercontentinfo->questions as $questioninfo)
                                                                                        <button type="button" id="status{{$itempageno}}"  class="btn btn-sm btn-secondary active btn-statuspage">
                                                                                            <span class="btn-inner--icon">
                                                                                            Q{{$itempageno}}
                                                                                            </span>
                                                                                        </button>
                                                                                        @php
                                                                                            $itempageno += 1;
                                                                                        @endphp
                                                                                    @endforeach
                                                                                    @php
                                                                                        $itemno = 1;
                                                                                    @endphp
                                                                                    <form id="chaptertestform{{$chaptercontentinfo->id}}" action="/chaptertestsubmitanswers" method="get" class="mb-5 pb-3">
                                                                                        <input type="hidden" name="studentuserid" value="{{Crypt::encrypt(auth()->user()->id)}}"/>
                                                                                        <input type="hidden" name="chapterquizid" value="{{$chaptercontentinfo->id}}"/>
                                                                                        <div uk-slideshow="animation: push">
                                                                                            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                                                                                                <ul class="uk-slideshow-items">
                                                                                                    @foreach($chaptercontentinfo->questions as $questioninfo)
                                                                                                        <li>
                                                                                                            <div class="uk-card-hover uk-card-body h-100 uk-text-secondary bg-secondary" style="overflow-y: auto;">
                                                                                                                {{$itemno}}. {{$questioninfo->question}} 
                                                                                                                    @if($questioninfo->type == '1')
                                                                                                                        <ul class="uk-list pl-4">
                                                                                                                            @foreach($questioninfo->answers as $answer)
                                                                                                                                <li>
                                                                                                                                    <div class="form-group clearfix">
                                                                                                                                        @if($questioninfo->noofanswers == 1)
                                                                                                                                            <div class="icheck-primary d-inline">
                                                                                                                                                <input type="radio"     name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}_multiple[]"id="answer{{$answer->id}}" class="answervalue"value="{{$answer->id}}" item="{{$itemno}}">
                                                                                                                                                <label for="answer{{$answer->id}}">
                                                                                                                                                    {{$answer->description}}
                                                                                                                                                </label>
                                                                                                                                            </div>
                                                                                                                                        @else
                                                                                                                                            <div class="icheck-primary d-inline">
                                                                                                                                                <input type="checkbox" id="answer{{$answer->id}}" name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}_multiple[]" value="{{$answer->id}}" class="answervalue" item="{{$itemno}}">
                                                                                                                                                <label for="answer{{$answer->id}}">
                                                                                                                                                    {{$answer->description}}
                                                                                                                                                </label>
                                                                                                                                            </div>
                                                                                                                                        @endif
                                                                                                                                    </div>
                                                                                                                                </li>
                                                                                                                            @endforeach
                                                                                                                        </ul>
                                                                                                                    @elseif($questioninfo->type == '2')
                                                                                                                        (<em>Identification</em>)
                                                                                                                        <input type="text" name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}_ident[]" class="answervalue" style="border: 1px solid black;" item="{{$itemno}}"/>
                                                                                                                    @elseif($questioninfo->type == '3')
                                                                                                                        (<em>Short Essay</em>)
                                                                                                                        <textarea name="chapterid{{$bookchapterinfo->id}}_questionid{{$questioninfo->id}}_essay[]" class="answervalue" style="border: 1px solid black;" item="{{$itemno}}"></textarea>
                                                                                                                    @endif
                                                                                                            </div>
                                                                                                        </li>
                                                                                                        @php
                                                                                                            $itemno += 1;
                                                                                                        @endphp
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                                                                                                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                                                                                            </div>
                                                                                            <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                                                                                        </div>
                                                                                        <button type="button" class="btn btn-success float-right submitanswers">Submit Answers</button>
                                                                                    </form>
                                                                                @endif
                                                                            @else
                                                                                @if(strtotime(date('M d, Y h:i:s A')) < strtotime($chaptercontentinfo->schedinfo->datefrom.' '.$chaptercontentinfo->schedinfo->timefrom))
                                                                                    <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                                        <div> 
                                                                                            <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                                                <h3 class="uk-card-title">Not yet activated</h3> 
                                                                                                <p>Contact your instructor!</p> 
                                                                                            </div> 
                                                                                        </div> 
                                                                                    </div>
                                                                                @elseif(strtotime(date('M d, Y h:i:s A')) > strtotime($chaptercontentinfo->schedinfo->dateto.' '.$chaptercontentinfo->schedinfo->timeto))
                                                                                    <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                                        <div> 
                                                                                            <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                                                <h3 class="uk-card-title">Chapter test is closed</h3> 
                                                                                                <p>Deadline reached.</p> 
                                                                                            </div> 
                                                                                        </div> 
                                                                                    </div>
                                                                                @endif
                                                                            @endif
                                                                        </li>
                                                                    </ul> --}}
                                                                @else
                                                                    <br/>
                                                                    <div class="uk-child-width-1-1@s uk-grid-match" uk-grid>
                                                                        <div> 
                                                                            <div class="uk-card uk-card-primary bg-warning uk-card-hover uk-card-body rounded uk-light"> 
                                                                                <h3 class="uk-card-title">You have already taken the test.</h3>
                                                                                <p>Date taken:  {{date('M d, Y h:i:s A',strtotime($chaptercontentinfo->records[0]->submitteddatetime))}}</p> 
                                                                                @if($chaptercontentinfo->schedinfo->noofattempts > count($chaptercontentinfo->records))
                                                                                    You have {{$chaptercontentinfo->schedinfo->noofattempts - count($chaptercontentinfo->records)}} attempts.
                                                                                    <button type="button" class="btn btn-sm btn-secondary">Retake</button>
                                                                                @endif
                                                                            </div> 
                                                                        </div> 
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                        <script>
                            function disableF5(e) {
                                if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82)
                                {
                                    e.preventDefault()

                                    Swal.fire({
                                        title:  'Warning',
                                        text: 'Note: Once you reload the page, your answers will not be saved.',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Submit',
                                    }).then((confirm) => {
                                        if (confirm.value) {
                                            window.location.reload();
                                        }
                                    })

                                }//e.preventDefault();
                            };
                            
                            $(document).on('click','input[type="radio"]', function(){
                                
                                var itemno = $(this).attr('item')
                                if($('input[type="radio"][item="'+itemno+'"]:checked').length == 0)
                                {
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).removeClass('btn-success')
                                    $('#status'+itemno).addClass('btn-secondary')
                                    
                                }else{
                                    $('#status'+itemno).removeClass('btn-secondary')
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).addClass('btn-success')
                                    $(document).on("keydown", disableF5);
                                }
                            })
                            $(document).on('click','input[type="checkbox"]', function(){
                                var itemno = $(this).attr('item')
                                if($('input[type="checkbox"][item="'+itemno+'"]:checked').length == 0)
                                {
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).removeClass('btn-success')
                                    $('#status'+itemno).addClass('btn-secondary')
                                    
                                }else{
                                    $('#status'+itemno).removeClass('btn-secondary')
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).addClass('btn-success')
                                    $(document).on("keydown", disableF5);
                                }
                                // $(this).closest('form').find('input.answervalue[type="checkbox"]:checked')
                            })
                            $(document).on('input','input[type="text"]', function(){
                                var itemno = $(this).attr('item')
                                if($(this).val().replace(/^\s+|\s+$/g, "").length == 0)
                                {
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).removeClass('btn-success')
                                    $('#status'+itemno).addClass('btn-secondary')
                                    
                                }else{
                                    $('#status'+itemno).removeClass('btn-secondary')
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).addClass('btn-success')
                                    $(document).on("keydown", disableF5);
                                }
                            })
                            $(document).on('input','textarea', function(){
                                var itemno = $(this).attr('item')
                                if($(this).val().replace(/^\s+|\s+$/g, "").length == 0)
                                {
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).removeClass('btn-success')
                                    $('#status'+itemno).addClass('btn-secondary')
                                    
                                }else{
                                    $('#status'+itemno).removeClass('btn-secondary')
                                    $('#status'+itemno).removeClass('btn-danger')
                                    $('#status'+itemno).addClass('btn-success')
                                    $(document).on("keydown", disableF5);
                                }
                            })
                            $(document).on('click','.submitanswers', function(){
                                // var answers = [];
                                // var checkboxesans = $(this).closest('form').find('input.answervalue[type="checkbox"]:checked');
                                // $.each(checkboxesans, function(){
                                //     console.log($(this).val())
                                // })
                                var thisform = $(this).closest('form');
                                Swal.fire({
                                    title:  'Warning',
                                    text: 'Note: Once you submit your test, you won\'t be able to revert it.',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Reload',
                                }).then((confirm) => {
                                    if (confirm.value) {
                                        thisform.submit();
                                    }
                                })
                            })
                            $(document).on('click','.buttontakethetest', function(e){
                                    var noofattempts = $(this).attr('noofattempts');
                                    var formtaketest = $(this).closest('form');
                                    Swal.fire({
                                        title: 'Are you sure you want to take the test?',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Submit',
                                    }).then((confirm) => {
                                        if (confirm.value) {
                                            formtaketest.submit();
                                            // e.preventDefault();
                                            if(noofattempts.replace(/^\s+|\s+$/g, "").length > 0)
                                            {
                                                window.location.reload();
                                            }
                                        }
                                    })
                            })
                        </script>