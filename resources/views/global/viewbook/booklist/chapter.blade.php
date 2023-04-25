{{-- <ul class="vidlist-3">
    
      @foreach ($chapters as $item)
            <li>  
                  <a href="#" class="part_li" style="white-space:normal"><i class="icon-material-outline-folder-shared"></i> <span></span>{{$item->title}}</span></a>
            </li>
      @endforeach
    
</ul> --}}

@if(count($chapters) > 0)
    <ul class="vidlist-3-section uk-accordion" uk-accordion="" book="chapter">
        @foreach ($chapters as $item)
            <li class="" data-id="{{$item->id}}" book="lesson">
                    <a class="uk-accordion-title view_lesson text-info" href="#" data-id="{{$item->id}}"> {{$item->title}} </a>
                    <div class="uk-accordion-content" holder="chapter" hidden="" aria-hidden="true" data-id="{{$item->id}}">
                    </div>
            </li>
        @endforeach
    </ul>
@endif