
@if(count($students) > 0)
    <ul class="uk-list uk-list-striped"> 
            @foreach ($students as $item)
                <li>{{$item->lastname.', '.$item->firstname}} 
                    
                        @if($item->member == 0)
                            <button type="button" class="btn btn-info btn-sm uk-first-column float-right add_student" data-id="{{$item->id}}">
                                    Add Student
                            </button>
                        @elseif($item->member == 1)
                            <button type="button" class="btn btn-danger btn-sm uk-first-column float-right">
                                    Student Already a Member
                            </button>
                        @else

                            <button type="button" class="btn btn-danger btn-sm uk-first-column float-right">
                                    Member of Another Group
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