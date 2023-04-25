@extends('admin.layouts.app')

@section('content')

            <div class="page-content-inner">

                <div class="d-flex">
                    <nav id="breadcrumbs" class="mb-3">
                        <ul>
                            <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                            <li><a href="/adminbooks/{{Crypt::encrypt('index')}}">Books</a></li>
                            <li>{{$bookdescription->booktitle}}</li>
                        </ul>
                    </nav>
                </div>
                <div class="container-small">


                    <div class="uk-grid-large mt-lg-3 uk-grid" uk-grid="">
                        <div class="uk-width-1-3@m uk-width-1-2@s uk-first-column">
                            <div uk-sticky="offset: 70 ;bottom: true ;media @s" class="uk-sticky" style="">

                                <div uk-lightbox="">
                                    <a href="{{asset('templatefiles/book-description.jpg')}}" data-caption="Caption 1">
                                        <img class="uk-box-shadow-xlarge" alt="" src="{{asset('templatefiles/book-description.jpg')}}">
                                    </a>
                                    <a href="{{asset('templatefiles/book-description.jpg')}}" data-caption="Caption 2"> </a>
                                    <a href="#" data-caption="Caption 3"> </a>
                                </div>

                                <ul class="uk-list uk-list-divider text-small mt-lg-4">
                                    <li> Visited 120 </li>
                                    <li> Publish time 12/12/2018</li>
                                    <li> Downloaded 120 </li>
                                </ul>

                                <button class="btn btn-info">
                                    <i class="icon-feather-edit mr-2"></i> Edit
                                </button>


                            </div><div class="uk-sticky-placeholder" style="height: 526px; margin: 0px;" hidden=""></div>
                        </div>

                        <div class="uk-width-2-3@m uk-width-1-2@s">
                            <h2>{{$bookdescription->booktitle}}</h2>
                            <hr class="mt-0">
                            <form action="/adminparts/{{Crypt::encrypt('lecture')}}" method="get" class="m-0 p-0" style="display: inline;">
                                @csrf
                                <input type="hidden" name="bookid"  value="{{Crypt::encrypt($bookdescription->bookid)}}"/>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-feather-list mr-2"></i> Lecture
                                </button>
                            </form>
                            <form action="/adminparts/{{Crypt::encrypt('laboratory')}}" method="get" class="m-0 p-0" style="display: inline;">
                                @csrf
                                <input type="hidden" name="bookid"  value="{{Crypt::encrypt($bookdescription->bookid)}}"/>
                                <button type="submit" class="btn btn-danger">
                                    <i class="icon-feather-list mr-2"></i> Laboratory
                                </button>
                            </form>
                            <h4> Description </h4>
                            <p>{{$bookdescription->bookdescription}}</p>
                        </div>


                    </div>

                </div>


                <!-- footer
               ================================================== -->
                <div class="footer">
                    @include('admin.inc.footer')
                </div>


            </div>
@endsection