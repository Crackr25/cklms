
        $(document).on('click', 'li.liheirarchy', function(e){
            // console.log($(this))
            if($(this).attr('contenttype') == 'part'){
                lastclickedpart = $(this);
                lastpartid = $(this).attr('id');
                var datarequest = $(this).attr('bookpartid');
                var labeltype = "Part";
                var contenttype = "part";
            }else if($(this).attr('contenttype') == 'chapter'){
                lastchapterid = $(this).attr('id');
                lastpartid =  $(this).attr('partid');
                lastclickedchapter = $(this)[0];
                console.log(lastclickedchapter)
                var datarequest = $(this).attr('bookchapterid');
                var labeltype = "Chapter";
                var contenttype = "chapter";
            }else if($(this).attr('contenttype') == 'lesson'){
                lastchapterid = $(this).attr('chapterid');
                lastpartid =  $(this).attr('partid');
                var datarequest = $(this).attr('booklessonid');
                var labeltype = "Lesson";
                var contenttype = "lesson";
            }else{
                e.preventDefault();
            }
            e.stopPropagation();
            
            if($(this).attr('classification') == 'old'){
                $('form[name=formsubmit]').attr('action','/editbookupdate');
                $.ajax({
                    url: '/editbookgetinfo',
                    type:"GET",
                    dataType:"json",
                    data:{
                        datarequestid: datarequest,
                        datarequesttype: contenttype
                    },
                    // headers: { 'X-CSRF-TOKEN': token },,
                    success: function(data){
                        $('.form').empty();
                        if(data.length == 0){

                        }else{
                            $('.form').append(
                                '<div id="formdiv" class="col-12" style="width: 100%;">'+
                                        '<label>'+labeltype+' Title</label>'+
                                        '<input type="text" class="form-control" name="title" contenttype="'+contenttype+'" value="'+data[0].title+'"required/>'+
                                        '<input type="hidden" class="form-control" name="id" contenttype="'+contenttype+'" value="'+data[0].id+'"required/>'+
                                        '<input type="hidden" class="form-control" name="type" contenttype="'+contenttype+'" value="'+contenttype+'"required/>'+
                                        '<br/>'+
                                        '<label>'+labeltype+' Description</label>'+
                                        '<textarea class="form-control" name="description" contenttype="'+contenttype+'">'+data[0].description+'</textarea>'+
                                        '<button type="submit" class="btn btn-sm btn-warning float-right">Update</button>'+
                                '</div>'
                            );
                            callTextAreaSummernote();
                        }
                    }
                })
                if($(this).attr('contenttype') == 'lesson'){
                    $('#formdiv').append(
                        '<a class="btn btn-sm btn-primary float-right">View</a>'
                    )
                }
            }else{
                $('form[name=formsubmit]').attr('action','/createcontent');
                $('.form').empty();
                $('.form').append(
                    '<div class="col-12" style="width: 100%;">'+
                            '<label>Part '+$(this).attr('id')+' Title</label>'+
                            '<input type="text" class="form-control"  name="title" contenttype="part" required/>'+
                            // '<input type="hidden" class="form-control" name="id" contenttype="'+contenttype+'" value="'+data[0].id+'"required/>'+
                            '<input type="hidden" class="form-control" name="type" contenttype="'+contenttype+'" value="'+contenttype+'"required/>'+
                            '<input type="hidden" class="form-control" name="bookid" value="{{$book->bookid}}" required/>'+
                            '<br/>'+
                            '<label>Part '+$(this).attr('id')+' Description</label>'+
                            '<textarea class="form-control"  partnumber="'+$(this).attr('id')+'" name="description" contenttype="part"></textarea>'+
                            '<button type="submit" class="btn btn-sm btn-success float-right">Save</button>'+
                    '</div>'
                );
                callTextAreaSummernote();
            }
        })