@extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li>Books</li>
    </ul>
</nav>
@endsection
@section('content')

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        /* .swal-wide{
        width:80%;
    } */
    .swal2-header{
        border: none;
    }
    
    .select2-container {
            z-index: 9999;
            margin: 0px;
        }
        .select2-search__field{
            margin: 0px;
        }
    </style>
    <div class="page-content-inner">

        {{-- <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                    <li>Books</li>
                </ul>
            </nav>
        </div> --}}
        <div class="d-flex justify-content-between mb-3">
            <h3> Books ({{$countbooks}}) </h3>

            <div>
                <a href="#" class="btn btn-default" id="createnewbookbutton">
                    <i class="fa fa-plus"> </i> Book
                </a>
            </div>
            {{-- <div>
                <a href="#" class="btn btn-default" id="createnewbookbutton">
                    <i class="uil-plus"> </i> New Book
                </a>
            </div> --}}
        </div>
        
        <div >
    
                <div class="section-small" >
    
                    <div class="uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid" uk-grid="" id="bookscontainer">
                        
                            @if(count($books) == 0)
                                <div class="uk-first-column text-center">
                                    <p class="uk-text-muted ">No books yet!</p>
                                </div>
                            @else
                                @foreach($books as $book)
                                    <div class="uk-first-column">
                                        {{-- <div class="uk-first-column"> --}}
                                        <a href="/adminviewbook/index?id={{$book->bookid}}" class="uk-text-bold">
                                            <img src="{{asset($book->picurl)}}" onerror="this.onerror = null, this.src='{{asset('/altimages/temp-book-cover.png')}}'"  class="mb-2 w-100 shadow rounded">
                                            {{$book->booktitle}}
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                    </div>
    
                </div>
        </div>
                <!-- footer
               ================================================== -->
        <div class="footer">
            @include('admin.inc.footer')
        </div>


    </div>
            
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script>
        
        $(document).on('click','#createnewbookbutton', function() {
            Swal.fire({
                title: 'Create New Book',
                html:
                    '<div class="row">'+
                        '<div class="col-md-12 m-auto">'+
                            '<form name="createbook" action="/admincreatebooks/{{Crypt::encrypt("create")}}" method="post" enctype="multipart/form-data">'+
                            '@csrf'+
                                '<div class="form-group row mb-3 ">'+
                                    '<label class="col-md-3 col-form-label" for="book_title"  style="font-size: 13px;">Book title<span class="required">*</span></label>'+
                                    '<div class="col-md-9">'+
                                        '<input type="text" class="form-control" id="book_title" name="title" placeholder="Enter subject title"  required="">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row mb-3">'+
                                    '<label class="col-md-3 col-form-label" for="book_description" style="font-size: 13px;">Description</label>'+
                                    '<div class="col-md-9">'+
                                        '<textarea name="description" id="book_description" class="form-control" placeholder="Enter the book\'s description..."></textarea>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="form-group row mb-3 ">'+
                                    '<label class="col-md-3 col-form-label" for="book_cover"  style="font-size: 13px;">Cover Photo</label>'+
                                    '<div class="col-md-9">'+
                                        '<input type="file" class="form-control" id="book_cover" name="cover" required="">'+
                                    '</div>'+
                                '</div>'+
                                '</div>'+
                            '</form>'+
                        '</div>'+
                    '</div>',
                confirmButtonText: 'Create',
                showCancelButton: true,
                allowOutsideClick: false,
                onOpen: function () {
                    $('.select2').select2({
                        minimumResultsForSearch: 15,
                    });
                },
                preConfirm: () => {
                    if($("#book_title").val() == "" || $('#book_subject').val() == ""){
                        Swal.showValidationMessage(
                            "Please fill in the required section!"+
                            "<br>"+
                            "Book title is required"
                        );
                    }else{
                        $('form[name=createbook]').submit();
                        // $.ajax({
                        //     url: '/admincreatebooks/{{Crypt::encrypt("create")}}',
                        //     type:"GET",
                        //     dataType:"json",
                        //     data:{
                        //         book_subject      : $('#book_subject').val(),
                        //         book_title        : $('#book_title').val(),
                        //         book_description  : $('#book_description').val(),
                        //         book_cover        : $('#book_cover').val()
                        //     },
                        //     // headers: { 'X-CSRF-TOKEN': token },,
                        //     complete: function(){
                        //         Swal.fire({
                        //             title: 'Book created successfully!',
                        //             type: 'success',
                        //             confirmButtonColor: '#3085d6',
                        //             confirmButtonText: 'OK!',
                        //             allowOutsideClick: false
                        //         }).then((confirm) => {
                        //             if (confirm.value) {
                        //                 window.location.reload();
                        //             }
                        //         })
                        //     }
                        // })

                    }
                }
            })
        })

        $(document).on('click','.selectacademicprogram', function() {
            var acadprogid = $(this).attr('academicprogramid');
            $('.selectacademicprogram').removeClass('uk-active');
            $(this).addClass('uk-active');
            $('#bookscontainer').empty()
            $.ajax({
                url: '/adminbooks/select',
                type:"GET",
                dataType:"json",
                data:{
                    acadprogid      : acadprogid
                },
                // headers: { 'X-CSRF-TOKEN': token },,
                success: function(data){
                    console.log(data)
                    $('#bookscontainer').append(data)
                },
                error: function(e) {
                    console.log(e.responseText);
                                $('#bookscontainer').append(e.responseText)
                }
            })
        });
    </script>
@endsection