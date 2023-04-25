

                        @if(count($books) == 0)
                        <p class="text-center">No book results</p>
                        @else
                            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                                <div class="grid-slider-header">
                                    {{-- <div>
                                        <h4 class="uk-text-truncate"> Newst videos </h4>
                                    </div> --}}
                                    <div class="grid-slider-header-link">
    
                                        <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
                                        <a href="#" class="slide-nav-next uk-invisible" uk-slider-item="next"></a>
        
                                    </div>
                                </div>
        
                                <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" style="transform: translate3d(-288.25px, 0px, 0px);">
                                    @foreach($books as $book)
                                        <li tabindex="-1" class="">
                                            <a href="#">
                                                <div class="course-card episode-card animate-this">
                                                    <div class="course-card-thumbnail ">
                                                        <span class="item-tag">{{$book->title}}</span>
                                                        <img src="{{asset($book->picurl)}}">
                                                        <span class="play-button-trigger"></span>
                                                    </div>
                                                    <div class="course-card-body">
                                                        <button type="button" class="btn btn-sm btn-block btn-light assignbook" id="{{$book->id}}">Add</button>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
        
                            </div>
                        @endif
                        <script>
                            // $(document).on('click','.assignbook', function(){
                            //     var id = $(this).attr('id')
                                
                            //     $.ajax({
                            //         url: '/adminteachers/assignthisbook',
                            //         type: 'GET',
                            //         datatype: 'json',
                            //         data: {
                            //             id : id,
                            //             teacherid : '{{$teacherid}}'
                            //         },
                            //         complete: function(){
                            //             $('#'+id).attr('disabled');
                            //             $('#'+id).text('Book added');
                            //         }
                            //     })
                            // })
                        </script>