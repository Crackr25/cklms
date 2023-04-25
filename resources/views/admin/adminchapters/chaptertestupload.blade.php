
                        <form action="/adminviewbook/chaptertestcontents/uploadfiles" method="POST"   enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="chapterid" value="{{$chapterinfo->id}}">
                                <input type="hidden" name="chaptertestid" value="{{$chaptertestinfo->id}}">
                                <input type="file" id="fileid" name="files[]" multiple accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*,video/*,audio/*" hidden>
                            </div>
                            <button type="submit" class="btn btn-success" id="submitfiles">Submit files</button>
                        </form>
                        <div class="section-small">
                            <div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" uk-grid="">
                                @foreach($chaptertestinfo->attachments as $attachment)
                                    <div id="eachattachment{{$attachment->id}}">
                                        <a href="#viewattachment{{$attachment->id}}" uk-toggle>
                                            <div class="course-card episode-card animate-this">
                                                <div class="course-card-thumbnail ">
                                                    {{-- <span class="item-tag">CSS</span>
                                                    <span class="duration">3:39</span> --}}
                                                    @if($attachment->extension == 'pdf')
                                                        <embed src="{{asset($attachment->filepath)}}#toolbar=0"/>
                                                    @elseif($attachment->extension == 'jpg' || $attachment->extension == 'png' || $attachment->extension == 'gif')
                                                        <img src="{{asset($attachment->filepath)}}"/>
                                                    @endif
                                                    <span class="play-button-trigger"></span>
                                                </div>
                                                {{-- <div class="course-card-body">
                                                    <h4 class="mb-0">
                                                    </h4>
                                                </div> --}}
                                            </div>
                                        </a>
                                        
                                        <div id="viewattachment{{$attachment->id}}" class="uk-flex-top" uk-modal >
                                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical" id="modalview{{$attachment->id}}">
                                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                                @if($attachment->extension == 'pdf')
                                                    <embed src="{{asset($attachment->filepath)}}#toolbar=0" style="width: 100%; height: 500px"/>
                                                @elseif($attachment->extension == 'jpg' || $attachment->extension == 'png' || $attachment->extension == 'gif')
                                                    <img src="{{asset($attachment->filepath)}}"style="width: 100%;"/>
                                                @endif
                                                <button type="button" class="btn btn-sm btn-danger mt-2 deleteattachment deleteattachment{{$attachment->id}}" id="{{$attachment->id}}"><i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>        
                        </div>
