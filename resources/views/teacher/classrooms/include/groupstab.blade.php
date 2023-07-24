    <div class="section-header pb-0">
        <div class="section-header-left">
                <h1>Groups</h1>
        </div>
        <div class="section-header-right">
                <a href="#" class="btn bs-placeholder btn-default" id="addclassroom" uk-toggle="target: #modal-groups-create"> <i class="uil-plus"></i> Add Group</a>
        </div>
    </div>


    <div class="section-small">

        <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid-match uk-grid" uk-grid="">
                @foreach($groups as $item)
                    <div>
                            <a href="/teachergroupview?groupview={{$item->id}}&classroomid={{$item->classroomid}}" class="skill-card" >
                                <i class="fas fa-robot skill-card-icon" style="color:#74defb"></i>
                                <div>
                                    <h2 class="skill-card-title">{{$item->name}}</h2>
                                    </p>
                                </div>
                            </a>
                    </div>
                @endforeach
        
        </div>   
    </div>   