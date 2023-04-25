
<div class="section-header mb-lg-2 border-0 uk-flex-middle">
      <div class="section-header-left">
          <h2 class="uk-heading-line text-left"><span> Books </span></h2>
      </div>
    
</div>
<div class="section-small">
      <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid="">
            @foreach ($classroombooks as $item)
                  <div class="uk-first-column">
                        <a href="#" class="uk-text-bold book_info"  uk-toggle="target: #modal-book-info" data-id="{{$item->id}}"  data-title="{{$item->title}}" data-cover="{{ asset($item->picurl)}}" data-added="{{\Carbon\Carbon::create($item->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}" view-book-id="{{$item->id}}-{{$item->classroomid}}-{{$item->bookid}}">
                        <img src="{{ asset($item->picurl) }}" class="mb-2 w-100 shadow rounded" >
                              {{$item->title}}
                        </a>
                  </div>
            @endforeach
      </div>
  </div>