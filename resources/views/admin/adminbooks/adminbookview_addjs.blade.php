
    $(document).on('click','.add', function() {

        $('form[name=formsubmit]').attr('action','/createcontent');

        $('.heirarchyupdate').prop('disabled',false)

        var addtype = $(this).attr('addtype');

        $('.form').empty();

        if(addtype == "part" && $(this).prop('disabled',false)){

            var countparts = $('ul.heirarchy').children('li[contenttype="part"]').length;

            var nametypecount = 'part';

            var currentcount = countparts+1;

            var contenttype = 'part';

            var label = 'Part '+currentcount;

            lastpartid = currentcount;

            $('.heirarchy').append(
                '<li id="'+currentcount+'" class="draggable" contenttype="part" classification="new">'+
                    '<span class="box boxpart'+currentcount+'" contenttype="part" partid="part'+currentcount+'">'+label+' <i class="fa fa-times ml-4 removeitem" contentid="content'+nametypecount+currentcount+'"  label="'+label+'"></i></span>'+
                    '<ul class="nested part'+currentcount+' sortablechapter active" partid="part'+currentcount+'"></ul>'+
                '</li>'
            )

            var toggler = document.getElementsByClassName("boxpart"+currentcount);
            var i;

            for (i = 0; i < toggler.length; i++) {
                toggler[i].addEventListener("click", function() {
                    this.parentElement.querySelector(".nested").classList.toggle("active");
                    this.classList.toggle("check-box");
                });
            }

            $('.form').prepend(
                '<div class="col-12" style="width: 100%;">'+
                    '<label>'+label+' Title</label>'+
                    '<input type="text" class="form-control"  partnumber="'+currentcount+'" name="title" contenttype="'+contenttype+'" required/>'+
                    '<br/>'+
                    '<input type="hidden" class="form-control" name="type" contenttype="'+contenttype+'" value="'+contenttype+'"required/>'+
                    '<input type="hidden" class="form-control" name="bookid" value="{{$book->bookid}}" required/>'+
                    '<label>'+label+' Description</label>'+
                    '<textarea class="form-control"  partnumber="'+currentcount+'" name="description" contenttype="'+contenttype+'"></textarea>'+
                    '<button type="submit" class="btn btn-sm btn-success float-right">Save</button>'+
                '</div>'
            );


        }else if(addtype == "chapter"){

            if($('ul.heirarchy').children('li[contenttype="part"]').length == 0){

                var countchapters = $('ul.heirarchy').children('li[contenttype="chapter"]').length;

                var nametypecount = 'chapter';

                var currentcount = countchapters+1;

                var contenttype = 'chapter';
                
                var label = 'Chapter '+currentcount;

                lastchapterid = currentcount;

                lastpartid = 0;
                
                $(this).closest('.btn-group-horizontal').find('button[addtype="part"]').prop('disabled',true)
                
                $('.heirarchy').append(
                    '<li id="'+currentcount+'" class="liheirarchy" contenttype="chapter" partid="'+lastpartid+'" classification="new">'+
                        '<span class="box boxchapter'+currentcount+'" contenttype="chapter" chapterid="chapter'+currentcount+'">'+label+' <i class="fa fa-times ml-4 removeitem" contentid="content'+nametypecount+currentcount+'"  label="'+label+'"></i></span>'+
                        '<ul class="nested chapter'+currentcount+' partid'+lastpartid+' sortablechapter active" chapterid="chapter'+currentcount+'"></ul>'+
                    '</li>'
                )

            }else{
                
                var countchapters = $('ul.nested.part'+lastpartid).children('li[contenttype="chapter"]').length;

                var nametypecount = 'chapter';

                var currentcount = countchapters+1;

                var contenttype = 'chapter';

                var label = 'Chapter '+currentcount;

                lastchapterid = currentcount;

                $('ul.nested.part'+lastpartid).append(
                    '<li id="'+currentcount+'" class="liheirarchy" contenttype="chapter" partid="'+lastpartid+'" classification="new">'+
                        '<span class="box boxchapter'+currentcount+'" contenttype="chapter" chapterid="chapter'+currentcount+'">'+label+' <i class="fa fa-times ml-4 removeitem" chapterid="'+currentcount+'" contentid="content'+nametypecount+currentcount+'" label="'+label+'"></i></span>'+
                        '<ul class="nested active chapter'+currentcount+' partid'+lastpartid+' sortablechapter" chapterid="chapter'+currentcount+'"></ul>'+
                    '</li>'
                )

            }

            var toggler = document.getElementsByClassName("boxchapter"+currentcount);

            var i;
            
            for (i = 0; i < toggler.length; i++) {

                toggler[i].addEventListener("click", function() {
                    this.parentElement.querySelector("ul.nested.chapter"+currentcount+'.partid'+lastpartid).classList.toggle("active");
                    this.classList.toggle("check-box");
                });

            }
            
            $('button[addtype=lesson]').prop('disabled', false);

            $('button[addtype=quiz]').prop('disabled', false);

            $('.form').prepend(
                '<div class="col-12" style="width: 100%;">'+
                    '<label>'+label+' Title</label>'+
                    '<input type="text" class="form-control"  partnumber="'+currentcount+'" name="title" contenttype="'+contenttype+'" required/>'+
                    '<input type="hidden" class="form-control"  partnumber="'+currentcount+'" name="partid" value="'+lastclickedpart.attributes[3].value+'" required/>'+
                    '<br/>'+
                    '<input type="hidden" class="form-control" name="type" contenttype="'+contenttype+'" value="'+contenttype+'"required/>'+
                    '<input type="hidden" class="form-control" name="bookid" value="{{$book->bookid}}" required/>'+
                    '<label>'+label+' Description</label>'+
                    '<textarea class="form-control"  partnumber="'+currentcount+'" name="description" contenttype="'+contenttype+'"></textarea>'+
                    '<button type="submit" class="btn btn-sm btn-success float-right">Save</button>'+
                '</div>'
            );

        }else if(addtype == "lesson"){
            
            var countlessons = $('ul.nested.chapter'+lastchapterid+'.partid'+lastpartid).children('li[contenttype="lesson"]').length;
            
            var nametypecount = 'lesson';

            var currentcount = countlessons+1;

            var contenttype = 'lesson';

            var label = 'Lesson '+currentcount;

            $('ul.nested.chapter'+lastchapterid+'.partid'+lastpartid).append(
                '<li class="draggable" contenttype="lesson" classification="new">'+
                    '<span class="box boxlesson'+currentcount+'" contenttype="lesson" lessonid="lesson'+currentcount+'">'+label+' <i class="fa fa-times ml-4 removeitem" lessonid="'+currentcount+'" contentid="content'+nametypecount+currentcount+'" label="'+label+'"></i></span>'+
                    '<ul class="nested lesson'+currentcount+' active" lessonid="lesson'+currentcount+'"></ul>'+
                '</li>'
            )

            $('.form').append(
                '<div class="col-12" style="width: 100%;">'+
                    '<label>'+label+' Title</label>'+
                    '<input type="text" class="form-control"  partnumber="'+currentcount+'" name="title" contenttype="'+contenttype+'" required/>'+
                    '<input type="hidden" class="form-control"  partnumber="'+currentcount+'" name="partid" value="'+lastclickedpart.attributes[3].value+'" required/>'+
                    '<br/>'+
                    '<input type="hidden" class="form-control" name="type" contenttype="'+contenttype+'" value="'+contenttype+'"required/>'+
                    '<input type="hidden" class="form-control" name="bookid" value="{{$book->bookid}}" required/>'+
                    '<input type="hidden" class="form-control" name="chapterid" value="'+lastclickedchapter.attributes[4].value+'" required/>'+
                    '<label>'+label+' Description</label>'+
                    '<textarea class="form-control"  partnumber="'+currentcount+'" name="description" contenttype="'+contenttype+'"></textarea>'+
                    '<button type="submit" class="btn btn-sm btn-success float-right">Save</button>'+
                '</div>'
            );

        }else if(addtype == "quiz"){

            var countquizzes = $('ul.nested.chapter'+lastchapterid+'.partid'+lastpartid).children('li[contenttype="quiz"]').length;

            var nametypecount = 'quiz';

            var currentcount = countquizzes+1;

            var contenttype = 'quiz';

            var label = 'Quiz '+currentcount;

            $('ul.nested.chapter'+lastchapterid+'.partid'+lastpartid).append(
                '<li class="draggable"  contenttype="quiz" classification="new">'+
                    '<span class="box boxquiz'+currentcount+'" contenttype="quiz" quizid="quiz'+currentcount+'">'+label+' <i class="fa fa-times ml-4 removeitem" quizid="'+currentcount+'" contentid="content'+nametypecount+currentcount+'" label="'+label+'"></i></span>'+
                    '<ul class="nested quiz'+currentcount+' active" quizid="quiz'+currentcount+'"></ul>'+
                '</li>'
            )

            $('.form').prepend(
                '<div class="col-12" style="width: 100%;">'+
                    '<label>'+label+' Title</label>'+
                    '<input type="text" class="form-control"  partnumber="'+currentcount+'" name="title" contenttype="'+contenttype+'" required/>'+
                    '<input type="hidden" class="form-control"  partnumber="'+currentcount+'" name="partid" value="'+lastclickedpart.attributes[3].value+'" required/>'+
                    '<br/>'+
                    '<input type="hidden" class="form-control" name="type" contenttype="'+contenttype+'" value="'+contenttype+'"required/>'+
                    '<input type="hidden" class="form-control" name="bookid" value="{{$book->bookid}}" required/>'+
                    '<label>'+label+' Description</label>'+
                    '<textarea class="form-control"  partnumber="'+currentcount+'" name="description" contenttype="'+contenttype+'"></textarea>'+
                    '<button type="submit" class="btn btn-sm btn-success float-right">Save</button>'+
                '</div>'
            );

        }

        callTextAreaSummernote();
    })