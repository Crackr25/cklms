
@if(count($books) > 0)
      <ul class="uk-list uk-list-striped"> 
            @foreach ($books as $item)
                  <li>{{$item->title}} 
                        @if($item->classroomid == null)
                              <button type="button" class="btn btn-info btn-sm uk-first-column float-right add_book" data-id="{{$item->id}}">
                                    Add Book
                              </button>
                        @else
                              <button type="button" class="btn btn-danger btn-sm uk-first-column float-right">
                                    Book already added
                              </button>
                        @endif
                  </li> 
            @endforeach
      </ul>
@else
      <ul class="uk-list uk-list-striped"> 
            <li>No Results Found</li> 
      </ul>
@endif