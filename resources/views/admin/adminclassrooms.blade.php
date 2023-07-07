  @extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li>Classrooms</li>
    </ul>
</nav>
@endsection
@section('content')
    <style>
        .swal2-header{
            border:none;
        }
        .swal2-content{
            text-align: left;
        }
        .changestatusactive{
            filter: none;
        }
        .changestatusinactive{
            filter: grayscale(100%);
        }
    </style>
    <div class="page-content-inner">
        {{-- <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
                    <li>Classrooms</li>
                </ul>
            </nav>
        </div> --}}
        <div class="section-header mb-lg-2 border-0 uk-flex-middle">
            <div class="section-header-left">
                <h2 class="uk-heading-line text-left"><span> Classrooms </span></h2>
            </div>
            <div class="section-header-right">
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search-input" placeholder="Search" aria-label="Search" aria-describedby="search-button">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="search-button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
            </div>
            {{-- <div class="section-header-right">
                <a href="#" class="btn btn-default uk-visible@s" id="addinstructor"> <i class="uil-plus"></i> Add teacher</a>
            </div> --}}
        </div>
        
        <div class="section-small">

            <div class="row">
                @foreach($classrooms as $classroom)
                    <div class="col-md-3 col-4 mb-3">
                        <a href="#modal-full{{$classroom->id}}" class="classroom" id="{{$classroom->id}}" uk-toggle>
                            <div class="course-card animate-this">
                                <div class="course-card-thumbnail ">
                                    @if(isset($classroom->picurl))
                                        <img src="{{$classroom->picurl}}"/>
                                    
                                    @else
                                        <img src="{{asset('assets/images/elearning6.png')}}"/>
                                        <span class="play-button-trigger"></span>
                                    @endif
                                </div>
                                <div class="course-card-body">
                                    <h4>{{$classroom->classroomname}} </h4>
                                    <p> Date created: {{$classroom->createddatetime}} </p>
                                    <p> Code: <b> {{$classroom->code}} </b> </p>
                                    <p> Grade: {{$classroom->grade}} </p>
                
                                    <div class="course-card-footer">
                                        <h5> <i class="icon-feather-book"></i> {{$classroom->countbooks}} Books </h5>
                                        <h5> <i class="icon-feather-user"></i> {{$classroom->countstudents}} Students </h5>
                                    </div>
                                    <div class="course-card-footer">
                                        <h5> <i class="icon-feather-user"></i> {{$classroom->adviser}} </h5>
                                    </div>
                                </div>

                            </div>
                        </a>
                        <div id="modal-full{{$classroom->id}}" class="uk-modal-full" uk-modal>
                            <div class="uk-modal-dialog">
                                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                                <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
                                        <div class="uk-background-cover uk-padding-large" uk-height-viewport id="booksconatainer{{$classroom->id}}">
                                        <h1 class="text-center">Books</h1>
                                        <div class="uk-child-width-1-1@m uk-grid-small uk-grid-match" uk-grid id="bookscontainer{{$classroom->id}}">
                                        </div>
                                    </div>
                                    <div class="uk-padding-large" uk-height-viewport>
                                        <h1 class="text-center">Students</h1>
                                        <div id="studentscontainer{{$classroom->id}}"></div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                @endforeach
            </div>      
        </div>
        {{-- <ul class="uk-pagination my-5 uk-flex-center" uk-margin="">
            <li class="uk-active uk-first-column"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="uk-disabled"><span>...</span></li>
            <li><a href="#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-next"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"></polyline></svg></span></a></li>
        </ul> --}}
        <!-- footer
        ================================================== -->
        <div class="footer">
            @include('admin.inc.footer')
        </div>
    </div>
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <!-- DataTables -->
    <script>

        $('#search-input').on('input', function() {
                var searchText = $(this).val();
                
                // Perform your search logic or update the UI based on the search text
                console.log('Search Text:', searchText);

                searchVal = searchText;

                $.ajax({
                    url: '/teacherclassrooms?table=table'+'&search='+searchVal+'&skip='+skip,
                    type:"GET",
                    success: function(data){
                        $('#classroom_table_holder').empty();
                        $('#classroom_table_holder').append(data)
                        //console.log(data);
                
                    }
                })



        });
        
        $(document).on('click','.classroom', function(){
            var id = $(this).attr('id');
            $.ajax({
                url: '/adminclassrooms/getdetails',
                type:"GET",
                dataType:"json",
                data:{
                    id      : id
                },
                // headers: { 'X-CSRF-TOKEN': token },,
                success: function(data){
                    $('#bookscontainer'+id).empty()
                    $('#studentscontainer'+id).empty();


                    if(data[0].length == 0)
                    {
                        $('#bookscontainer'+id).append(
                            '<div class="alert alert-danger alert-dismissible mt-2 " id="alert'+id+'">'+
                                '<h6 class="m-0" style="height: 20px;"><i class="icon fas fa-exclamation-triangle"></i> No books yet!</h6>'+
                            '</div>'
                        );
                    }else{
                        $.each(data[0], function(key, value){
                            $('#bookscontainer'+id).append(
                                '<div>'+
                                    '<a href="#" class="skill-card" style="border: 1px solid #ddd">'+
                                        "<img src='"+value.picurl+"' class='skill-card-icon' style='color:#dd0031; width: 15%'/>"+
                                        '<div>'+
                                            '<h2 class="skill-card-title">'+value.title+'</h2>'+
                                            '<p class="skill-card-subtitle"> Date added '+value.dateaddedd+' </p>'+
                                        '</div>'+
                                    '</a>'+
                                '</div>'
                            )                            
                        })
                    }
                    if(data[1].length == 0)
                    {
                        $('#studentscontainer'+id).append(
                            '<div class="alert alert-danger alert-dismissible mt-2 " id="alert'+id+'">'+
                                '<h6 class="m-0" style="height: 20px;"><i class="icon fas fa-exclamation-triangle"></i> No students yet!</h6>'+
                            '</div>'
                        );
                    }else{
                        
                        var tabletodisplay ='<input type="text" id="searchclassroominput'+id+'" name="search" autofocus required placeholder="">';
                        tabletodisplay += '<table class="table" id="studentstable'+id+'">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th>&nbsp;</th>'+
                                                        '<th>&nbsp;</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody>';
                                            
                                $.each(data[1], function(key, value){
                                    tabletodisplay+='<tr>'+
                                                        '<td>'+value.lastname+', '+value.firstname+' </td>'+
                                                        '<td>'+value.email+'</td>'+
                                                    '</tr>';
                                });


                            tabletodisplay      +='</tbody>'+
                                            '</table>';
                        $('#studentscontainer'+id).append(tabletodisplay);
                        var thistable = $('#studentstable'+id).DataTable({
                            pageLength : 3,
                            // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Show All']]
                            // "paging": false,
                            // dom: 'lifrtp'
                            "bFilter": false,
                            searching: true,
                            dom: 't'      
                            // "dom": '<"toolbar">frtip'
                        })
                        $('#searchclassroominput'+id).keyup(function(){
                            thistable.search($(this).val()).draw() ;
                        })
                    }
                }
            })
        })
    </script>
@endsection