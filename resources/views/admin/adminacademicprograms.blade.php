@extends('admin.layouts.app')

@section('breadcrumbs')

<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li>Academic Programs</li>
    </ul>
</nav>
@endsection
@section('content')
<style>
    /* .swal-wide{
    width:80%;
} */
.swal2-header{
    border: none;
}
</style>

{{-- <style type="text/css')}}">
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style> --}}
            <div class="page-content-inner">
{{-- 
                <div class="d-flex">
                    <nav id="breadcrumbs" class="mb-3">
                        <ul>
                            <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                            <li>Books</li>
                        </ul>
                    </nav>
                </div> --}}
                <div class="d-flex justify-content-between mb-3 mt-2">
                    <h3>Academic Programs</h3>
        
                    <div>
                        <a href="#" class="btn btn-default" id="createnewacadprogbutton">
                            <i class="fa fa-plus"> </i> Academic Program
                        </a>
                    </div>
                    {{-- <div>
                        <a href="#" class="btn btn-default" id="createnewbookbutton">
                            <i class="uil-plus"> </i> New Book
                        </a>
                    </div> --}}
                </div>
                    <div class="uk-child-width-1-3@s uk-child-width-5-5@m uk-grid pt-3" uk-grid="" id="academicprogramcontainer">
                        @if(count($academicprograms)>0)
                        @foreach($academicprograms as $academicprogram)
                        <div id="{{$academicprogram->id}}">
                            {{-- <a href="#" class="skill-card">
                                <div>
                                    <h2 class="skill-card-title"> {{$academicprogram->programname}}</h2>
                                    <p class="skill-card-subtitle"> {{$academicprogram->programcode}} <span class="skill-card-bullet"></span> 3
                                        books
                                    </p>
                                </div>
                            </a> --}}
                            {{-- <a href="#"> --}}
                                <div class="course-path-card">
                                    <div class="course-path-card-contents">
                                        <h3 id="programname{{$academicprogram->id}}"> {{$academicprogram->programname}} </h3>
                                        <p id="programcode{{$academicprogram->id}}"> Code: {{$academicprogram->programcode}}
                                        </p>
                                        {{-- <div class="course-progressbar mt-3">
                                            <div class="course-progressbar-filler" style="width:25%"></div>
                                        </div> --}}
                                    </div>
                                    <div class="course-path-card-footer">
                                        <h5> <i class="icon-feather-film mr-1"></i><a href="#">View 24 Books</a></h5>
                                        <div>
                                            <h5>
                                                <a href="#" class="acadprogedit" progid="{{$academicprogram->id}}"><i class="icon-feather-edit mr-1"></i></a>
                                            </h5>
                                        </div>
                                        {{-- <div> --}}
                                            <h5>
                                                <a href="#" class="acadprogdelete" progid="{{$academicprogram->id}}"><i class="icon-feather-trash mr-1 text-danger"></i></a>
                                            </h5>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            {{-- </a> --}}
                            {{-- <a href="#">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="uk-flex-middle uk-grid" uk-grid="">
                                            <div class="uk-width-auto uk-first-column">
                                                <h6 class="mb-2">{{$academicprogram->programname}}</h6>
                                                <p> {{$academicprogram->programcode}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-between py-2">
                                        <a href="#" class=" "> Veiw report</a>
                                    </div>
                                </div>
                            </a> --}}
                        </div>
                        @endforeach
                        @endif
                    </div>

            </div>
            <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script>
    $(document).on('click','#createnewacadprogbutton', function() {
        Swal.fire({
            title: 'Create New Program',
            html:
                '<div class="row">'+
                    '<div class="col-md-12 m-auto">'+
                            '<div class="form-group row mb-3 ">'+
                                '<label class="col-md-3 col-form-label" for="prog_title"  style="font-size: 13px;">Program Title<span class="required">*</span></label>'+
                                '<div class="col-md-9">'+
                                    '<input type="text" class="form-control" id="prog_title" name="title" placeholder="Enter subject title"  required="">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group row mb-3 ">'+
                                '<label class="col-md-3 col-form-label" for="prog_code"  style="font-size: 13px;">Program Code<span class="required">*</span></label>'+
                                '<div class="col-md-9">'+
                                    '<input type="text" class="form-control" id="prog_code" name="code" placeholder="Enter subject title"  required="">'+
                                '</div>'+
                            '</div>'+
                    '</div>'+
                '</div>',
            confirmButtonText: 'Create',
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: () => {
                if($("#prog_title").val().replace(/^\s+|\s+$/g, "").length == 0 || $('#prog_code').val().replace(/^\s+|\s+$/g, "").length == 0){
                    Swal.showValidationMessage(
                        "Please fill in the required section!"
                    );
                }else{
                    // $('form[name=createbook]').submit();
                    $.ajax({
                        url: '/adminacademicprogram/create',
                        type:"GET",
                        dataType:"json",
                        data:{
                            prog_title      : $('#prog_title').val(),
                            prog_code        : $('#prog_code').val()
                        },
                        // headers: { 'X-CSRF-TOKEN': token },,
                        success: function(data){
                            console.log(data)
                            $('#academicprogramcontainer').append(data)
                            Swal.fire({
                                title: 'Academic Program created successfully!',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK!',
                                allowOutsideClick: false
                            })
                        }
                    })

                }
            }
        })
    })
    $(document).on('click','.acadprogedit', function(){
        var id = $(this).attr('progid');
        $.ajax({
            url: '/adminacademicprogram/getinfo',
            type:"GET",
            dataType:"json",
            data:{
                id      : id,
            },
            // headers: { 'X-CSRF-TOKEN': token },,
            success: function(data){
                Swal.fire({
                    title: 'Edit Program',
                    html:
                        '<div class="row">'+
                            '<div class="col-md-12 m-auto">'+
                                    '<div class="form-group row mb-3 ">'+
                                        '<label class="col-md-3 col-form-label" for="editprog_title"  style="font-size: 13px;">Program Title<span class="required">*</span></label>'+
                                        '<div class="col-md-9">'+
                                            '<input type="text" class="form-control" id="editprog_title" name="title" placeholder="Enter subject title"  required="" value="'+data.programname+'">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group row mb-3 ">'+
                                        '<label class="col-md-3 col-form-label" for="editprog_code"  style="font-size: 13px;">Program Code<span class="required">*</span></label>'+
                                        '<div class="col-md-9">'+
                                            '<input type="text" class="form-control" id="editprog_code" name="code" value="'+data.programcode+'" placeholder="Enter subject title"  required="">'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'+
                        '</div>',
                    confirmButtonText: 'Create',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    preConfirm: () => {
                        if($("#editprog_title").val().replace(/^\s+|\s+$/g, "").length == 0 || $('#editprog_code').val().replace(/^\s+|\s+$/g, "").length == 0){
                            Swal.showValidationMessage(
                                "Please fill in the required section!"
                            );
                        }else{
                            // $('form[name=createbook]').submit();
                            $.ajax({
                                url: '/adminacademicprogram/update',
                                type:"GET",
                                dataType:"json",
                                data:{
                                    id      : id,
                                    prog_title      : $('#editprog_title').val(),
                                    prog_code        : $('#editprog_code').val()
                                },
                                // headers: { 'X-CSRF-TOKEN': token },,
                                success: function(data){
                                    $('#programname'+id).text(data.programname)
                                    $('#programcode'+id).text('Code: '+data.programcode)
                                    Swal.fire({
                                        title: 'Academic Program updated successfully!',
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK!',
                                        allowOutsideClick: false
                                    })
                                }
                            })

                        }
                    }
                })
            }
        })

    })
    $(document).on('click','.acadprogdelete', function(){
        var id = $(this).attr('progid');
        Swal.fire({
            title: 'Are you sure you want to delete this Academic Program?',
            type: 'warning',
            confirmButtonText: 'Delete',
            showCancelButton: true,
            allowOutsideClick: false
        }).then((confirm) => {
            $.ajax({
                url: '/adminacademicprogram/delete',
                type:"GET",
                dataType:"json",
                data:{
                    id      : id
                },
                // headers: { 'X-CSRF-TOKEN': token },,
                success: function(data){
                    if(data.deleted == '1')
                    {
                        $('#'+data.id).remove();
                        Swal.fire({
                            title: 'Academic Program deleted successfully!',
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!',
                            allowOutsideClick: false
                        })
                    }else{
                        Swal.fire({
                            title: 'Unable to delete Academic Program!',
                            type: 'danger',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK!',
                            allowOutsideClick: false
                        })
                    }
                }
            })
        })
    })
</script>
      @endsection