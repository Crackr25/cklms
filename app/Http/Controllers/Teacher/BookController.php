<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Crypt;
use DB;
class BookController extends Controller
{
    public function index($id, Request $request)
    {
        $subjects = DB::table('subjects')
            ->where('deleted','0')
            ->get();
            
        $createdby = DB::table('teachers')
            ->where('userid', auth()->user()->id)
            ->first()
            ->id;

        $mybooks =  Db::table('books')
            ->select(
                'books.id',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.picurl'
            )
            ->where('deleted', '0')
            ->where('createdby',$createdby)
            ->get();
            
        if(Crypt::decrypt($id) == 'index'){

            if(count($subjects)>0){

                $first = 0;

                foreach($subjects as $subject){

                    if($first == 0){
                        $subject->selected = 1;
                        $first+=1;
                    }else{
                        $subject->selected = 0;
                    }

                    $booksunder = Db::table('books')
                        ->select(
                            'books.id',
                            'books.title as booktitle',
                            'books.description as bookdescription',
                            'books.picurl'
                        )
                        ->where('subjectid', $subject->id)
                        ->where('isactive', '1')
                        ->where('deleted', '0')
                        // ->where('createdby','!=', $createdby)
                        // ->where('createdby','!=', null)
                        ->get();

                    $subject->books = $booksunder;
                }

            }

        }else{

            if(count($subjects) > 0){

                foreach($subjects as $subject){

                    if($request->get('selectedsubjectid') == $subject->id){
                        $subject->selected = 1;
                    }else{
                        $subject->selected = 0;
                    }

                    $booksunder = Db::table('books')
                        ->select(
                            'books.id',
                            'books.title as booktitle',
                            'books.description as bookdescription',
                            'books.picurl'
                        )
                        ->where('subjectid', $subject->id)
                        ->where('isactive', '1')
                        ->where('deleted', '0')
                        // ->where('createdby','!=', $createdby)
                        // ->where('createdby','!=', null)
                        ->get();

                    $subject->books = $booksunder;
                }

            }

        }
        return view('teacher.books.teacherbookindex')
            ->with('subjects', $subjects)
            ->with('mybooks', $mybooks);
    }
    public function viewbook($id, Request $request)
    {

        $bookinfo = Db::table('books')
                    ->where('id', $id)
                    ->select('id','title')
                    ->first();

        $parts = Db::table('parts')
                    ->where('bookid', $id)
                    ->select('id','title')
                    ->get();

        if(count($parts)>0){
            foreach($parts as $part){

                $chapters = DB::table('chapters')
                    ->where('partid', $part->id)
                    ->select('id','title')
                    ->get();

                if(count($chapters)>0){

                    foreach($chapters as $chapter){
                        $lessons = DB::table('lessons')
                            ->where('chapterid', $chapter->id)
                            ->select('id','title')
                            ->get();

                        $chapter->lessons = $lessons;
                    }

                }
                $part->chapters = $chapters;
            }
        }
        return view('teacher.books.teacherbookview')
            ->with('parts', $parts)
            ->with('bookinfo', $bookinfo);
            // ->with('mybooks', $mybooks);
    }

    public function lessonContent($lessonid){

        $lessonInfo = DB::table('lessons')
                        ->where('id',$lessonid)
                        ->first();

        if(isset($lessonInfo->id)){

                $lessoncontent = DB::table('lessoncontents')
                                ->where('lessonid',$lessonid)
                                ->where('lessoncontents.deleted',0)
                                ->get();

                return view('global.viewbook.booklist.lessoncontent')
                            ->with('lessoncontent',$lessoncontent);

        }

    }

    public function quizContent($quizid, $clasroomid, Request $request){

        $quizInfo = DB::table('lesssonquiz')
                        ->where('id',$quizid)
                        ->select('id','title', 'description', 'coverage' , 'picurl')
                        ->first();

        // Make the complete path of image
        $protocol = $request->getScheme();
        $host = $request->getHost();

        $rootDomain = $protocol . '://' . $host;


        if(isset($quizInfo->picurl)){

        $quizInfo->image = $rootDomain . '/' . $quizInfo->picurl;

        }
        $bookid = $request->get('bookid');

        $classroomid = $clasroomid;



        

        if(isset($quizInfo->id) > 0){

            $chapterquizsched = DB::table('chapterquizsched')
                            ->where('chapterquizid',$quizid)
                            ->where('classroomid',$clasroomid)
                            ->select(
                                'id',
                                'datefrom',
                                'dateto',
                                'timefrom',
                                'timeto',
                                'noofattempts',
                                'status',
                                'createddatetime',
                                'updateddatetime'
                            )
                            ->where('deleted',0)
                            ->first();

        if(isset($chapterquizsched)){


            if($chapterquizsched->status == 1){

                $chapterquizsched->status = 'The quiz has Ended';


            }else if(\Carbon\Carbon::create($chapterquizsched->dateto.' '.$chapterquizsched->timeto) <= \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS')){


                $chapterquizsched->status = 'The quiz has not started';

            }else if(\Carbon\Carbon::create($chapterquizsched->datefrom.' '.$chapterquizsched->timefrom) > \Carbon\Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:MM:SS')){

                $chapterquizsched->status = 'Overdue';

            }else{

                $chapterquizsched->status = 'Active';


            }
        }

            $quizQuestions = DB::table('lessonquizquestions')
                    ->where('lessonquizquestions.deleted','0')
                    ->where('quizid', $quizInfo->id)
                    ->where('typeofquiz', '!=', null)
                    ->select(
                        'lessonquizquestions.id',
                        'lessonquizquestions.question',
                        'lessonquizquestions.typeofquiz',
                        'lessonquizquestions.item',
                        'lessonquizquestions.picurl',
                        'lessonquizquestions.points',
                        'lessonquizquestions.quideanswer'
                    )
                    // ->inRandomOrder()
                    ->orderBy('lessonquizquestions.id')
                    ->get();

            foreach($quizQuestions as $item){

                if($item->typeofquiz == 1){

                    $choices = DB::table('lessonquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id','answer', 'sortid')
                                    ->orderBy('sortid')
                                    ->get();

                    $item->choices = $choices;



                }


                if($item->typeofquiz == 7 ){


                    $fillquestions = DB::table('lesson_fill_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();

                    $item->fill = $fillquestions;


                    foreach ($item->fill as $index => $fillItem) {
                            $questionWithInputs = preg_replace_callback('/~input/', function ($matches) use ($fillItem, &$inputCounter, &$key) {
                                $inputField = '<input class="answer-field d-inline form-control q-input" data-question-type="7" data-sortid="' . ++$inputCounter . '" data-question-id="' . $fillItem->id . '" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-' . $fillItem->id . '">';
                                return $inputField;
                            }, $fillItem->question);
                            $inputCounter = 0;

                            $fillItem->question = $questionWithInputs;
                    }

                                            

                }

                if($item->typeofquiz == 9 ){

                    $protocol = $request->getScheme();
                    $host = $request->getHost();

                    $rootDomain = $protocol . '://' . $host;


                    $item->image = $rootDomain.'/'.$item->picurl;
                }

                



                if($item->typeofquiz == 5){

                    $dragoption = DB::table('lesson_quiz_drag_option')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id')
                                    ->get();

                    $item->drag = $dragoption;

                    $dropquestions = DB::table('lesson_quiz_drop_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();

                    $item->drop = $dropquestions;

                    
                    foreach($dropquestions as $index => $item){

                        $key = 0;


                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($item, &$inputCounter, &$key) {
                            $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable answer-field" data-question-type="5" data-sortid="'.++$inputCounter.'" data-question-id="'.$item->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$item->id.'" disabled>';
                            return $inputField;
                            }, $item->question);
                            $inputCounter = 0;

                            $item->question = $questionWithInputs;

                    }


                }

            }
            



            return view('global.viewbook.booklist.quizcontent')
                        ->with('quizInfo',$quizInfo)
                        ->with('chapterquizsched',$chapterquizsched)
                        ->with('bookid',$bookid)
                        ->with('classroomid',$classroomid)
                        ->with('quizQuestions',$quizQuestions);

        }

        

    

    }

    public function updateQuizSched(Request $request){

        DB::table('chapterquizsched')
                ->where('id', $request->get('quizschedid'))
                ->update([
                    'chapterquizid'         => $request->get('chaptertestid'),
                    'classroomid'           => $request->get('classroomid'),
                    'datefrom'              => $request->get('datestart'),
                    'timefrom'              => $request->get('timestart'),
                    'dateto'                => $request->get('dateend'),
                    'timeto'                => $request->get('timeend'),
                    'noofattempts'          => $request->get('noofattempts'),
                    'status'=>0,
                    'updatedby'=>auth()->user()->id,
                    'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila')
                ]);

    }

    public function endQuiz($id){

        DB::table('chapterquizsched')
            ->where('id',$id)
            ->where('createdby',auth()->user()->id)
            ->update([
                'status'=>1,
                'updatedby'=>auth()->user()->id,
                'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila')
            ]);


    }

    public function viewStudentAnswers($quizid, $classroomid, $studid){

        $quizAnswers = DB::table('chapterquizrecords')
                    ->where('submittedby',$studid)
                    ->where('chapterquizid',$quizid)
                    ->where('chapterquizrecords.deleted',0)
                    ->join('chapterquizrecordsdetail',function($join){
                        $join->on('chapterquizrecords.id','=','chapterquizrecordsdetail.headerid');
                        $join->where('chapterquizrecordsdetail.deleted',0);
                    })
                    ->join('chapterquizquestions',function($join){
                        $join->on('chapterquizrecordsdetail.questionid','=','chapterquizquestions.id');
                        $join->where('chapterquizrecordsdetail.deleted',0);
                    })
                    ->select(
                        'chapterquizrecordsdetail.id',
                        'chapterquizrecordsdetail.questionid',
                        'chapterquizquestions.question',
                        'chapterquizrecordsdetail.choiceid',
                        'chapterquizrecordsdetail.description',
                        'chapterquizquestions.type',
                        'chapterquizquestions.points',
                        'chapterquizrecordsdetail.points as studPoints'
                    )
                    ->get();

        $quizInfo =  DB::table('chapterquizrecords')
                                ->where('submittedby',$studid)
                                ->where('chapterquizid',$quizid)
                                ->first();

        foreach($quizAnswers as $item){

            if($item->type == 1){

                $choices = DB::table('chapterquizchoices')
                                ->where('id',$item->choiceid)
                                ->where('deleted',0)
                                ->select('description','id','answer')
                                ->first();

                if(isset($choices->id)){

                    $item->description = $choices->description;

                }

            }

        }

        $quizAnswers = collect($quizAnswers)->groupBy('question');

        return view('global.viewbook.teacherview.viewStudentAnswers')
                    ->with('quizInfo',$quizInfo)
                    ->with('quizAnswers',$quizAnswers);
       


    }

    public function submitStudentScore($id,Request $request){

        DB::table('chapterquizrecords')
                    ->where('id',$id)
                    ->update([
                        'quizstatus'=>1,
                        'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila'),
                        'updatedby'=>auth()->user()->id
                    ]);

        foreach($request->get('points') as $item){

            DB::table('chapterquizrecordsdetail')
                ->where('id',$item['id'])
                ->where('deleted',0)
                ->update([
                    'points'=>$item['value'],
                    'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila'),
                    'updatedby'=>auth()->user()->id
                ]);
        }

    }

    public function removeGrade($id){

        DB::table('chapterquizrecords')
            ->where('id',$id)
            ->update([
                'quizstatus'=>0,
                'updatedby'=>auth()->user()->id,
                'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila')
            ]);

        DB::table('chapterquizrecordsdetail')
                ->where('headerid',$id)
                ->update([
                    'points'=>0,
                    'updatedby'=>auth()->user()->id,
                    'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila')
                ]);

    }


}
