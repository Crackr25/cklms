<div class="section-header pb-0">
    <div class="section-header-left">
        <h1>Books</h1>
    </div>
    <div class="section-header-right">
        <a href="#" class="btn bs-placeholder btn-success" id="addclassroom" uk-toggle="target: #modal-book-list"> <i class="uil-plus"></i>  Add Books</a>
    </div>
</div>

<div class="section-small mt-3">
    <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid="">
        @foreach ($classroombooks as $item)
                
                <div class="uk-first-column animate-this">
                    <a href="#" class="uk-text-bold book_info"  uk-toggle="target: #modal-book-info" data-id="{{$item->id}}"  data-title="{{$item->title}}" data-cover="{{ asset($item->picurl)}}" data-added="{{\Carbon\Carbon::create($item->createddatetime)->isoFormat('MMMM DD, YYYY hh:mm A')}}" view-book-id="{{$item->id}}-{{$item->classroomid}}-{{$item->bookid}}-{{$item->groupid}}">
                    <img src="{{ asset($item->picurl) }}" class="mb-2 w-100 shadow rounded">
                            {{$item->title}}
                    </a>
                </div>
        @endforeach
    </div>
</div>