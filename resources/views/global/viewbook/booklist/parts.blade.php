<ul class="vidlist-3-section uk-accordion" uk-accordion="">

      @if($type == 1)
            @foreach ($parts as $item)
                  <li class="" data-id="{{$item->id}}" book="part">
                        <a class="uk-accordion-title view_chapter text-danger" 
                        href="#" data-id="{{$item->id}}"> {{$item->title}} </a>
                        <div class="uk-accordion-content" holder="chapter" hidden="" aria-hidden="true" data-id="{{$item->id}}">
                        </div>
                  </li>
            @endforeach
      @elseif($type == 2)
            @foreach ($parts as $item)
                  <li class="" data-id="{{$item->id}}" book="lesson">
                        <a class="uk-accordion-title view_lesson text-info" 
                        href="#" data-id="{{$item->id}}"> {{$item->title}} </a>
                        <div class="uk-accordion-content" holder="chapter" hidden="" aria-hidden="true" data-id="{{$item->id}}">
                        </div>
                  </li>
            @endforeach

      @endif
</ul>