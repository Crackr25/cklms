
                        {{-- @if(count($bookinfo->parts) == 0)
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
                                                        {{$bookchapterinfo->description}}asdasdasdasd</textarea>
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
                                                                @if($chaptercontentinfo->sched == 0)
                                                                    <a type="button" class="btn btn-sm btn-secondary mt-2 float-right active chaptertestavailabilityset"  id="chaptertestavailability{{$chaptercontentinfo->id}}" classroomid="{{$bookinfo->classroomid}}" chaptertestid="{{$chaptercontentinfo->id}}">Inactive</a>
                                                                @else
                                                                        <a type="button" class="btn btn-sm btn-secondary mt-2 float-right active chaptertestavailabilityupdate"  id="chaptertestavailability{{$chaptercontentinfo->id}}" classroomid="{{$bookinfo->classroomid}}" chaptertestid="{{$chaptercontentinfo->id}}">[ {{$chaptercontentinfo->schedinfo->datefrom}} {{$chaptercontentinfo->schedinfo->timefrom}} - {{$chaptercontentinfo->schedinfo->dateto}} {{$chaptercontentinfo->schedinfo->timeto}} ] - Attempts: @if($chaptercontentinfo->schedinfo->noofattempts == null) 0 @else {{$chaptercontentinfo->schedinfo->noofattempts}} @endif
                                                                        </a>
                                                                @endif
                                                            </h2>
                                                            <small>Chapter Test</small>

                                                            <ul class="uk-tab" uk-switcher="connect: #component-tab-left-test{{$chaptercontentinfo->id}}; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                                                <li class="uk-active"><a href="#"> <i class="icon-feather-list mr-2"></i>Content</a>
                                                                </li>
                                                                <li><a href="#"> <i class="icon-feather-users mr-2"></i> Scoreboard</a>
                                                                </li>
                                                            </ul>
                                                        </div>


                                                        <ul class="uk-switcher uk-margin" id="component-tab-left-test{{$chaptercontentinfo->id}}">
                                                            <!-- tab 1 -->
                                                            <li>
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
                                                                    <ul class="uk-list">
                                                                        @foreach($chaptercontentinfo->questions as $questioninfo)
                                                                            <li>
                                                                                {{$itemno}}. {{$questioninfo->question}}
                                                                                @if(count($questioninfo->answers)>0)
                                                                                    @if($questioninfo->type == '1')
                                                                                        <ul class="uk-list uk-list-bullet">
                                                                                            @foreach($questioninfo->answers as $answer)
                                                                                                <li>
                                                                                                    @if($answer->answer == '1')
                                                                                                        <span class="text-success">
                                                                                                            {{$answer->description}}
                                                                                                        </span>
                                                                                                    @else
                                                                                                    {{$answer->description}}
                                                                                                    @endif
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @elseif($questioninfo->type == '2')
                                                                                        (<em>Identification</em>)
                                                                                        <ul class="uk-list uk-list-bullet">
                                                                                            @foreach($questioninfo->answers as $answer)
                                                                                                <li>
                                                                                                    @if($answer->answer == '1')
                                                                                                        <span class="text-success">
                                                                                                            {{$answer->description}}
                                                                                                        </span>
                                                                                                    @else
                                                                                                    {{$answer->description}}
                                                                                                    @endif
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @elseif($questioninfo->type == '3')
                                                                                        (<em>Short Essay</em>)
                                                                                    @endif
                                                                                @endif
                                                                            </li>
                                                                            @php
                                                                                $itemno += 1;
                                                                            @endphp
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>

                                                            <!-- tab 2 -->
                                                            <li>
                                                                &nbsp;
                                                            </li>
                                                        </ul>
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
                                        <article class="uk-card-default p-4 rounded chapterarticle " id="articlechapter{{$bookchapterinfo->id}}">
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
                                                                    @if($chaptercontentinfo->sched == 0)
                                                                        <a type="button" class="btn btn-sm btn-secondary mt-2 float-right active chaptertestavailabilityset"  id="chaptertestavailability{{$chaptercontentinfo->id}}" classroomid="{{$bookinfo->classroomid}}" chaptertestid="{{$chaptercontentinfo->id}}">Inactive</a>
                                                                    @else
                                                                            <a type="button" class="btn btn-sm btn-secondary mt-2 float-right active chaptertestavailabilityupdate"  id="chaptertestavailability{{$chaptercontentinfo->id}}" classroomid="{{$bookinfo->classroomid}}" chaptertestid="{{$chaptercontentinfo->id}}">[ {{$chaptercontentinfo->schedinfo->datefrom}} {{$chaptercontentinfo->schedinfo->timefrom}} - {{$chaptercontentinfo->schedinfo->dateto}} {{$chaptercontentinfo->schedinfo->timeto}} ] - Attempts: @if($chaptercontentinfo->schedinfo->noofattempts == null) 0 @else {{$chaptercontentinfo->schedinfo->noofattempts}} @endif
                                                                            </a>
                                                                    @endif
                                                                </h2>
                                                                <small>Chapter Test</small>

                                                                <ul class="uk-tab" uk-switcher="connect: #component-tab-left-test{{$chaptercontentinfo->id}}; animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                                                                    <li class="uk-active"><a href="#"> <i class="icon-feather-list mr-2"></i>Content</a>
                                                                    </li>
                                                                    <li><a href="#"> <i class="icon-feather-users mr-2"></i> Scoreboard</a>
                                                                    </li>
                                                                </ul>
                                                            </div>


                                                            <ul class="uk-switcher uk-margin" id="component-tab-left-test{{$chaptercontentinfo->id}}">
                                                                <!-- tab 1 -->
                                                                <li>
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
                                                                        <ul class="uk-list">
                                                                            @foreach($chaptercontentinfo->questions as $questioninfo)
                                                                                <li>
                                                                                    {{$itemno}}. {{$questioninfo->question}}
                                                                                    @if(count($questioninfo->answers)>0)
                                                                                        @if($questioninfo->type == '1')
                                                                                            <ul class="uk-list uk-list-bullet">
                                                                                                @foreach($questioninfo->answers as $answer)
                                                                                                    <li>
                                                                                                        @if($answer->answer == '1')
                                                                                                            <span class="text-success">
                                                                                                                {{$answer->description}}
                                                                                                            </span>
                                                                                                        @else
                                                                                                        {{$answer->description}}
                                                                                                        @endif
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @elseif($questioninfo->type == '2')
                                                                                            (<em>Identification</em>)
                                                                                            <ul class="uk-list uk-list-bullet">
                                                                                                @foreach($questioninfo->answers as $answer)
                                                                                                    <li>
                                                                                                        @if($answer->answer == '1')
                                                                                                            <span class="text-success">
                                                                                                                {{$answer->description}}
                                                                                                            </span>
                                                                                                        @else
                                                                                                        {{$answer->description}}
                                                                                                        @endif
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        @elseif($questioninfo->type == '3')
                                                                                            (<em>Short Essay</em>)
                                                                                        @endif
                                                                                    @endif
                                                                                </li>
                                                                                @php
                                                                                    $itemno += 1;
                                                                                @endphp
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>

                                                                <!-- tab 2 -->
                                                                <li>
                                                                    &nbsp;
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif --}}


                        <script>
                            $(document).on('click','.chaptertestavailabilityset', function(){
                                var buttonid =  $(this).attr('id');
                                var classroomid = $(this).attr('classroomid');
                                var chaptertestid = $(this).attr('chaptertestid');
                                var activityform = '<label>Activity Date & Time range</label>'+
                                                    '<input id="activitydatetimerange" class="pb-2"/>'+
                                                    '<label>No. of attempts</label>'+
                                                    '<input type="number" id="noofattempts">';

                                
                                Swal.fire({
                                    title: 'Activate Chapter Test',
                                    html: activityform,
                                    customClass: 'swal-wide',
                                    showCancelButton: true,
                                    showConfirmButton: true,
                                    confirmButtonText: 'Activate'
                                }).then((confirm) => {
                                    if (confirm.value) {
                                        $.ajax({
                                            url: '/viewbookchaptertestavailability',
                                            type:"GET",
                                            dataType:"json",
                                            data:{
                                                activitydatetimerange    :  $('#activitydatetimerange').val(),
                                                noofattempts    :  $('#noofattempts').val(),
                                                chaptertestid           :  chaptertestid,
                                                classroomid             :   classroomid 
                                            },
                                            success: function(data)
                                            {
                                                if(data.noofattempts == null)
                                                {
                                                    data.noofattempts = 0;
                                                }
                                                $('#chaptertestavailability'+chaptertestid).text('[ '+data.datefrom+' '+data.timefrom+' - '+data.dateto+' '+data.timeto+' ] - Attempts: '+data.noofattempts);
                                            }
                                        })
                                    }
                                })
                                            
                                $('#activitydatetimerange').daterangepicker({
                                    timePicker: true,
                                    timePickerIncrement: 30,
                                    locale: {
                                        format: 'MM/DD/YYYY hh:mm A'
                                    }
                                })
                            })
                                
                        </script>