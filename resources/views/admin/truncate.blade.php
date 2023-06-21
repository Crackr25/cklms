@extends('admin.layouts.app')




@section('content')



<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Truncate Table</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div id="quizTable2">
                        <table id="quizDataTable2" class="table table-striped" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Module name</th>
                                    <th>Row Count</th>
                                    <th>Truncate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Quiz Record</td>
                                    <td>{{count($data)}}</td>
                                    <td><button class="btn btn-danger quizrecord" data-type="1">Truncate</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Record Details</td>
                                    <td>{{count($datarecorddetails)}}</td>
                                    <td><button class="btn btn-danger quizrecord" data-type="2">Truncate</button></td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>






<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>



<script>


        $(document).ready(function() {

            $("#quizDataTable2").DataTable({
                responsive: true,
                destroy: true,
                scrollX: true,
                searching: true,
                lengthChange: true
            });


            $(document).on('click', '.quizrecord', function(){
                
                
                console.log("Button Clicked");
                var type = $(this).data('type');
                console.log(type);


                Swal.fire({
                    title: 'Password is required',
                    input: 'password',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Proceed',
                }).then((result) => {

                    console.log(result);
                    if (result.value == 'Admin') {
                        

                        $.ajax({
                            type:'GET',
                            url: '/truncate/quizrecord',
                            data:{
                                type: type,
                            },
                            success: function(data) {

                                console.log(data);
                               // window.location.reload();
                                Swal.fire({
                                    title: 'Success',
                                    text: 'Record has been cleared',
                                    type: 'success'
                                });
                            }
                        })



                    }else{
                        Swal.fire({
                            title: 'Error',
                            text: 'Password not matched!',
                            type: 'error'
                        });

                    }
                });
            });
        });




</script>



@endsection