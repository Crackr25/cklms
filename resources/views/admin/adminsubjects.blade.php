@extends('admin.layouts.app')

@section('content')
<style>
    /* .swal-wide{
    width:80%;
} */
.swal2-header{
    border: none;
}
.responsive-tab ul {
    overflow-x: unset !important;
}
</style>
    <div class="page-content-inner">
        <div class="d-flex">
            <nav id="breadcrumbs" class="mb-3">
                <ul>
                    <li><a href="/admindashboard"> <i class="uil-home-alt"></i> </a></li>
                    <li><a href="/adminsubjects"> Subjects </a></li>
                    {{-- <li> Web Development</li> --}}
                </ul>
            </nav>
        </div>



        <div uk-grid="" class="uk-grid">
            <div class="uk-width-1-3@m uk-first-column">

                <nav class="responsive-tab style-3 setting-menu card uk-sticky" uk-sticky="top:30 ; offset:100; media:@m ;bottom:true; animation: uk-animation-slide-top" style="">
                    <h5 class="mb-0 p-3 uk-visible@m"> Subjects ({{count($subjects)}})</h5>
                    <hr class="m-0 uk-visible@m">
                    <br>
                    <ul>
                        {{-- <li class="uk-active"> --}}
                        <li>
                            <a href="#"><button type="button" class="btn btn-default btn-block" id="createnewsubjectbutton"><i class="fa fa-plus"></i> Create New Subject</button></a>
                        </li>
                        @if(count($subjects) > 0)
                            @foreach($subjects as $subject)
                                @if(isset($subject->subjectfirst))
                                    <li class="uk-active subjectselect" id="{{$subject->id}}">
                                @else
                                <li class="subjectselect" id="{{$subject->id}}">
                                @endif
                                    <a href="#"> <i class="uil-book-alt "></i> {{$subject->title}} 
                                        {{-- <span class="badge badge-light ml-2 badge-sm"> 21</span>  --}}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav><div class="uk-sticky-placeholder" style="height: 734px; margin: 0px 0px 20px;" hidden=""></div>

            </div>

            <div class="uk-width-2-3@m">

                <div class="card rounded">
                    <div class="p-3 d-flex align-items-center justify-content-between">
                        <h5 class="mb-0"> Subject Details </h5> 
                    </div>
                    <hr class="m-0">
                    
                    @foreach($subjects as $subject)
                        @if(isset($subject->subjectfirst))
                            {{-- <input type="hidden" name="subjectid" id="subjectid" value="{{$subject->id}}"/> --}}
                            <div class="uk-grid-small p-4 uk-grid" uk-grid="" id="subjectdetails">
                                <div class="uk-width-expand">
                                    <h5 class="mb-2" id="subjecttitle"> {{$subject->title}} </h5>
                                    {{-- <p class="uk-text-small mb-2"> Created by <a href="#" > {{$subject->createdby}} </a> </p> --}}
                                    <p class="uk-text-small mb-2"> Created on <a href="#"  id="subjectcreateddatetime"> {{$subject->createddatetime}} </a> </p>
                                    <p class="mb-0 uk-text-small mt-3">
                                        {{-- <span class="mr-3 bg-light p-2 mt-1"> Existing in 16 Classrooms</span><span> Last updated --}}
                                            {{-- 10/2019 </span> --}}
                                    </p>
                                    <button type="button" id="buttonedit" class="btn btn-sm btn-soft-warning" subjectid="{{$subject->id}}">Edit</button>
                                    <button type="button" id="buttondelete" class="btn btn-sm btn-soft-danger" subjectid="{{$subject->id}}"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>



                {{-- <ul class="uk-pagination mt-5 uk-flex-center" uk-margin="">
                    <li class="uk-active uk-first-column"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="uk-disabled"><span>...</span></li>
                    <li><a href="#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"><svg width="7" height="12" viewBox="0 0 7 12" xmlns="http://www.w3.org/2000/svg" data-svg="pagination-next"><polyline fill="none" stroke="#000" stroke-width="1.2" points="1 1 6 6 1 11"></polyline></svg></span></a></li>
                </ul> --}}



            </div>


        </div>


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
<script>
    $(document).on('click','#createnewsubjectbutton', function() {
        Swal.fire({
            title: 'Create New Subject',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off',
                name: 'subjecttitle'
            },
            inputPlaceholder: 'Enter subject title',
            confirmButtonText: 'Create',
            showCancelButton: true,
            allowOutsideClick: false,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    if (value == "") {
                        resolve('Please enter a subject title first!')
                    }else{
                        $.ajax({
                            url: '/admincreatesubject/{{Crypt::encrypt("create")}}',
                            type:"GET",
                            dataType:"json",
                            data:{
                                subjecttitle: $('input[name=subjecttitle]').val()
                            },
                            // headers: { 'X-CSRF-TOKEN': token },,
                            complete: function(){
                                Swal.fire({
                                    title: 'Created Successfully!',
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK!',
                                    allowOutsideClick: false
                                }).then((confirm) => {
                                    if (confirm.value) {
                                        window.location.reload();
                                    }
                                })
                            }
                        })
                    }
                })
            }
        })
    });
    $(document).on('click','.subjectselect', function(){
        $('#subjectdetails').show()
        $('.subjectselect').removeClass('uk-active');
        $(this).addClass('uk-active');
        var subjectid = $(this).attr('id')
        $.ajax({
            url: '/adminsubjects/view',
            type:"GET",
            dataType:"json",
            data:{
                subjectid   : subjectid
            },
            // headers: { 'X-CSRF-TOKEN': token },,
            success: function(data){
                $('#buttonedit').attr('subjectid',data.id);
                $('#buttondelete').attr('subjectid',data.id);
                $('#subjecttitle').text(data.title)
                $('#subjectcreateddatetime').text(data.createddatetime)
            }
        })
    })
    $(document).on('click','#buttonedit', function(){
        var subjecttitle = $('#subjecttitle').text();
        var editsubjectid = $(this).attr('subjectid');
        Swal.fire({
            title: 'Edit subject',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off',
                name: 'subjecttitle',
                id: 'editsubjecttitle'
            },
            inputValue: subjecttitle,
            inputPlaceholder: 'Enter subject title',
            confirmButtonText: 'Update',
            showCancelButton: true,
            allowOutsideClick: false,
            preConfirm: () => {
                if($("#editsubjecttitle").val().replace(/^\s+|\s+$/g, "").length == 0){
                    Swal.showValidationMessage(
                        "Please fill in the required section!"+
                        "<br>"+
                        "Book title is required"
                    );
                }
            }
        }).then((result) => {
            if(result.value){
                
                $.ajax({
                            url: '/adminsubjects/edit',
                            type:"GET",
                            dataType:"json",
                            data:{
                                editsubjecttitle: $('input[name=subjecttitle]').val(),
                                editsubjectid: editsubjectid
                            },
                            // headers: { 'X-CSRF-TOKEN': token },,
                            success: function(data){
                                console.log(data)
                                $('#subjecttitle').text(data);
                                $('.subjectselect#'+editsubjectid).empty()
                                $('.subjectselect#'+editsubjectid).append(
                                    '<a href="#"> <i class="uil-book-alt "></i> '+data+'</a>'
                                )
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Subject updated successfully!'
                                })
                            }
                        })
            }
        })
    })
    $(document).on('click','#buttondelete', function(){
        var subjecttitle = $('#subjecttitle').text();
        var deletesubjectid = $(this).attr('subjectid');
        Swal.fire({
            title: 'Are you sure you want to delete this subject?',
            text: 'Subject: '+subjecttitle,
            confirmButtonText: 'Delete',
            showCancelButton: true,
            allowOutsideClick: false
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url: '/adminsubjects/delete',
                    type:"GET",
                    dataType:"json",
                    data:{
                        deletesubjectid: deletesubjectid
                    },
                    // headers: { 'X-CSRF-TOKEN': token },,
                    success: function(data){
                        $('#subjectdetails').hide()
                        $('#subjecttitle').text(data);
                        $('.subjectselect#'+data).remove()
                        Swal.fire({
                            icon: 'success',
                            title: 'Subject deleted successfully!'
                        })
                    }
                })
            }
        })
    })
</script>
@endsection