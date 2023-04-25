@extends('admin.layouts.app')

@section('content')
            <div class="page-content-inner">

                <div class="d-flex">
                    <nav id="breadcrumbs" class="mb-3">
                        <ul>
                            <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                            <li><a href="/adminsubjects"> Subject </a></li>
                            <li>Create New Subject</li>
                        </ul>
                    </nav>
                </div>



                <div class="card">
                    <div class="card-header border-bottom-0 py-4">
                        <h5> Subject Manager </h5>
                    </div>


                    <div class="card-body">

                                <div class="row">
                                    <div class="col-xl-9 m-auto">

                                        <form action="/admincreatesubject/{{Crypt::encrypt('create')}}" method="get">

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="subject_title">Subject title<span class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="subject_title" name="subjecttitle" placeholder="Enter subject title"  required="">
                                                </div>
                                            </div>
    
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="short_description">Short
                                                    description</label>
                                                <div class="col-md-9">
                                                    <textarea name="short_description" id="short_description" class="form-control" placeholder="Enter short description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="subject_cover">Cover Photo (Optional)</label>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" id="subject_cover" name="subjectcover" >
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3" id="submitsection">
                                                <div class="col-12 my-lg-5">
                                                    <div class="text-center">
                                                        {{-- <h2 class="mt-0"><i class="icon-feather-check-circle text-success"></i></h2>
                                                        <h3 class="mt-0">Thank you !</h3> --}}
            
                                                        <p class="w-75 mb-2 mx-auto"> Submit This Subject  </p>
            
                                                        <div class="mb-3 mt-3">
                                                            <button type="submit" class="btn btn-default">Submit</button>
                                                        </div>
                                                            {{-- <button type="button" class="btn btn-default">Submit</button> --}}
                                                    </div>
                                                </div> 
                                            </div>
                                        </form>
        
                                    </div>
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