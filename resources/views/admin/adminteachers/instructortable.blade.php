@if(count($teachers) > 0)
    @foreach($teachers as $teacher)
        <div class="col-md-3 col-3 mb-4">
            <div class="card  h-100 animate-this">
                <div class="card-body text-center">
                    <div class="avatar-parent-child">
                    @php
                        if($teacher->isActive == 1)
                        {
                            $classstatus = "changestatusactive";
                        }else{
                            $classstatus = "changestatusinactive";
                        }
                    @endphp
                    @php                  
                            if(strtolower($teacher->gender) == 'female'){
                                $avatar = 'avatar/teacher-female.png';
                            }
                            else{
                                $avatar = 'avatar/teacher-male.png';
                            }
                    @endphp
                    <img alt="Image placeholder" src="{{asset($teacher->picurl)}}" onerror="this.onerror = null, this.src='{{asset($avatar)}}'" class="avatar  rounded-circle avatar-lg {{$classstatus}}" id="profpic{{$teacher->userid}}">
                    @if($teacher->isActive == 1)
                    <span class="avatar-child avatar-badge bg-success" id="buttonstatus{{$teacher->userid}}"></span>
                    @else
                    <span class="avatar-child avatar-badge bg-dark" id="buttonstatus{{$teacher->userid}}"></span>
                    @endif
                    </div>
                    <h5 class="h6 mt-4 mb-0" id="fullname{{$teacher->teacherid}}"> {{$teacher->firstname}} {{$teacher->middlename}} {{$teacher->lastname}} {{$teacher->suffix}} </h5>
                    <a href="#" class="d-block text-sm text-muted mb-3">
                        <small id="email{{$teacher->teacherid}}">{{$teacher->email}}</small>
                    </a>
                    @php
                        if($teacher->isActive == 1)
                        {
                            $strstatus = "Active";
                        }else{
                            $strstatus = "Inactive";
                        }
                    @endphp
                    <div class="d-flex justify-content-between px-4">
                        <a href="#" class="btn btn-icon btn-hover btn-circle buttoneditstatus" id="{{$teacher->userid}}" currentstat="{{$teacher->isActive}}" uk-tooltip="{{$strstatus}}" title="" aria-expanded="false">
                            @if($teacher->isActive == 1)
                                <i class="uil-user-check" id="buttonchangestatus{{$teacher->userid}}"></i> 
                            @else
                                <i class="uil-user-times" id="buttonchangestatus{{$teacher->userid}}"></i> 
                            @endif
                        </a>
                        <a href="#edit-modal{{$teacher->teacherid}}" class="btn btn-icon btn-hover btn-circle buttoneditinfo" id="{{$teacher->teacherid}}" uk-tooltip="Edit"  uk-toggle  title="" aria-expanded="false">
                            <i class="uil-edit-alt"></i> </a>                                        
                            <div id="edit-modal{{$teacher->teacherid}}" class="uk-flex-top" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                    <h2 class="uk-modal-title">Edit Teacher</h2>
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <label>First Name</label>
                                    <input type="text" class="teacherinput" id="firstname{{$teacher->teacherid}}"/>
                                    <label>Middle Name</label>
                                    <input type="text" class="teacherinput"   id="middlename{{$teacher->teacherid}}"/>
                                    <label>Last Name</label>
                                    <input type="text" class="teacherinput"  id="lastname{{$teacher->teacherid}}"/>
                                    <label>Gender</label>
                                    <select id="gender{{$teacher->teacherid}}">
                                        <option value="male">MALE</option>
                                        <option value="female">FEMALE</option>
                                    </select>
                                    <label>Username</label>
                                    <input type="text" class="teacherinput"  id="username{{$teacher->teacherid}}"/>
                                    <button type="button" class="btn btn-warning uk-modal-close-default buttonupdateinfo" id="{{$teacher->teacherid}}" disabled>Update</button>
                                </div>
                            </div>
                            
                        <a href="#modal-full{{$teacher->teacherid}}" class="btn btn-icon btn-hover btn-circle buttonbooksassigned" id="{{$teacher->teacherid}}" uk-tooltip="Books Assigned"  title="" aria-expanded="false" uk-toggle>
                            <i class="uil-books"></i>
                        </a>
                        <div id="modal-full{{$teacher->teacherid}}" class="uk-modal-full" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-grid-collapse uk-child-width-1-1@s uk-flex-middle" uk-grid>
                                    <div class="uk-background-cover uk-padding-large" uk-height-viewport id="booksconatainer{{$teacher->teacherid}}">
                                        <h1 class="text-center">Books</h1>
                                        <h3 class="text-center teachername"></h3>
                                        <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <label class="text-center">Assign more books</label>
                                                        <input type="text" id="searchclassroominput" name="search" teacherid="{{$teacher->teacherid}}" autofocus required   placeholder="Title of the book">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                        
                                        <div id="bookscontainer{{$teacher->teacherid}}">
                                            <div class="row">
                                                <div class="col-12" >
                                                    <p class="text-center" id="searchbookscontainerresponse{{$teacher->teacherid}}"></p>
                                                    
                                                    <div class="section-small">

                                                        <div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" uk-grid=""id="searchbooksresults{{$teacher->teacherid}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p id="booksassignedcontainer{{$teacher->teacherid}}" style="text-align:center;"></p>
                                                <div class="row pl-2"id="booksassignedcontainerul{{$teacher->teacherid}}">
                                                </div>
                                                <br/>
                                                
                                        </div>
                                    </div>
                                    {{-- <div class="uk-padding-large" uk-height-viewport>
                                        <h1 class="text-center">Students</h1>
                                        <div id="studentscontainer{{$teacher->userid}}"></div>
                                    </div> --}}
                                </div>
                            </div> 
                        </div>
                        {{-- <a href="#" class="btn btn-icon btn-hover btn-circle buttonsendmessage" id="{{$teacher->userid}}" uk-tooltip="Send Message"  title="" aria-expanded="false">
                            <i class="uil-envelope"></i>
                        </a> --}}
                        {{-- <a href="#" class="btn btn-icon btn-hover btn-circle buttondeleteuser" id="{{$teacher->userid}}" uk-tooltip="Delete" title="" aria-expanded="false">
                            <i class="uil-trash-alt"></i>
                        </a> --}}
                    </div>
                </div>
                <div class="card-footer text-center py-2">
                    {{-- <a href="#" class="text-muted uk-text-small"> 13 Courses </a> --}}
                </div>
            </div>
        </div>
    @endforeach
@endif