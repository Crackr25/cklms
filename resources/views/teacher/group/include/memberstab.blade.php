<div class="section-header pb-0">
        <div class="section-header-left">
                <h1>Members</h1>
        </div>
        <div class="section-header-right">
                <a href="#" class="btn bs-placeholder btn-default" id="addclassroom" uk-toggle="target: #modal-student-list"> <i class="uil-plus"></i> Add Members</a>
        </div>
</div>
<div class="section-small">

                <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid-match uk-grid" uk-grid="">
                    @foreach($groupstudents as $item)
                            <div>
                                <a href="#" class="skill-card membercard" uk-toggle="target: #modal-student-info" data-id="{{$item->id}}" >
                                        @if($item->leader == 0)
                                        <i class="icon-brand-react skill-card-icon" style="color:#74defb"></i>
                                        @else
                                         <i class="fas fa-crown skill-card-icon" style="color:#74defb"></i>
                                        @endif
                                        <div>
                                            <h2 class="skill-card-title">{{$item->lastname}}</h2>
                                            <p class="skill-card-subtitle"> {{$item->firstname}}
                                            </p>
                                        </div>
                                    </a>
                            </div>
                    @endforeach
            
                </div>

</div>



