



<div class="section-header mb-lg-2 border-0 uk-flex-middle">
      <div class="section-header-left">
          <h2 class="uk-heading-line text-left"><span>Classmates</span></h2>
      </div>
      
</div>
<div class="section-small">
      <div class="uk-child-width-1-4@m uk-child-width-1-3@s course-card-grid uk-grid-match uk-grid" uk-grid="">
            @foreach($classroomstudents as $item)
                  <div>
                        <a href="#" class="skill-card" >
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
