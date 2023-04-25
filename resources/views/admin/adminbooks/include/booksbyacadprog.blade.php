
                            @if(count($booksunder) == 0)
                                <div class="uk-first-column text-center">
                                    <p class="uk-text-muted ">No books yet!</p>
                                </div>
                            @else
                            
                                @foreach($booksunder as $bookunder)
                                    <div class="uk-first-column">
                                        <a href="/adminviewbook/index?id={{$bookunder->id}}" class="uk-text-bold">
                                            <img src="{{asset($bookunder->picurl)}}" onerror="this.onerror = null, this.src='{{asset('/altimages/temp-book-cover.png')}}'"  class="mb-2 w-100 shadow rounded">
                                            {{$bookunder->booktitle}}
                                        </a>
                                    </div>
                                @endforeach
                            @endif