



{{-- <div class="section-header mb-lg-2 border-0 uk-flex-middle">
      <div class="section-header-left">
          <h2 class="uk-heading-line text-left"><span> Students </span></h2>
      </div>
      <div class="section-header-right">
            <a href="#" class="btn btn-default uk-visible@s" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add Student</a>
      </div>
</div> --}}

<div class="section-header pb-0">
      <div class="section-header-left">
          <h1>Students</h1>
      </div>
      <div class="section-header-right">
          <a href="#" class="btn bs-placeholder btn-default" id="addclassroom" uk-toggle="target: #modal-close-default"> <i class="uil-plus"></i> Add Student</a>
      </div>
  </div>
<div class="section-small">

            <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid-match uk-grid" uk-grid="">
                  @foreach($classroomstudents as $item)
                        <div>
                              <a href="#" class="skill-card" uk-toggle="target: #modal-student-info" data-id="{{$item->id}}" data-classid="{{$item->classid}}" >
                                    <i class="icon-brand-react skill-card-icon" style="color:#74defb"></i>
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
