{{-- @if(count($lessons) > 0)
    <ul class="vidlist-3-section uk-accordion" uk-accordion="" book="chapter">
        @foreach ($lessons as $item)
            <li >
                    <a class="uk-accordion-title view_lesson text-info" href="#" data-id="{{$item->id}}"><i class="icon-material-address-book"></i> {{$item->title}} </a>
                    <div class="uk-accordion-content" holder="chapter" hidden="" aria-hidden="true" data-id="{{$item->id}}">
                    </div>
            </li>
        @endforeach
    </ul>
@endif --}}

<div class="uk-accordion-content" aria-hidden="false" book="lesson">
      <ul class="vidlist-3" uk-switcher="connect: #video-slider ; animation: uk-animation-slide-right-small, uk-animation-slide-left-medium">
            @foreach ($lessons as $item)
                  <li class="">
                        @if($item->type == 2)
                              <a href="{{$item->description}}" class="link_content"> {{$item->title}} </a>
                        @else
                              @if(isset($item->quiz) && $item->quiz )
                                    <a href="#" aria-expanded="true" data-id="{{$item->id}}" class="view_quiz_content"> {{$item->title}} </a>
                              @else
                                    <a href="#" aria-expanded="true" data-id="{{$item->id}}" class="view_lesson_content"> {{$item->title}} </a>
                              @endif
                        @endif
                  </li>
            @endforeach
      </ul>
</div>


<script>
      $(document).ready(function(){
            $(document).on('click','.link_content',function(){
                  window.open($(this).attr('href'), '_blank')
            })
      })
</script>