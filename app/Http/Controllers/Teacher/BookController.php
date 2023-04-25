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

    public function quizContent($quizid, $clasroomid){

        $quizInfo = DB::table('chapterquiz')
                        ->where('id',$quizid)
                        ->select('id','title')
                        ->first();

        

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

            $quizQuestions = DB::table('chapterquizquestions')
                        ->where('chapterquizquestions.deleted','0')
                        ->where('headerid', $quizInfo->id)
                        ->select(
                            'chapterquizquestions.id',
                            'chapterquizquestions.points',
                            // 'chapterquizchoices.answer',
                            'chapterquizquestions.question',
                            // 'chapterquizchoices.description',
                            'chapterquizquestions.type'
                        )
                        ->get();

            foreach($quizQuestions as $item){

                if($item->type == 1){

                    $choices = DB::table('chapterquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','answer')
                                    ->get();

                    $item->choices = $choices;

                }

            }


            $students = DB::table('classroomstudents')
                            ->where('classroomid',$clasroomid)
                            ->where('classroomstudents.deleted',0)
                            ->join('students',function($join){
                                $join->on('classroomstudents.studentid','=','students.id');
                                $join->where('students.deleted',0);
                            })
                            ->select('students.id','students.firstname','students.lastname','students.userid')
                            ->get();

            foreach($students as $student){

                $checkIfExist = DB::table('chapterquizrecords')
                                    ->where('chapterquizid',$quizInfo->id)
                                    ->where('submittedby',$student->userid)
                                    ->where('classroomid',$clasroomid)
                                    ->where('chapterquizrecords.deleted',0)
                                    ->select('quizstatus','updateddatetime','submitteddatetime','id')
                                    ->first();

                if(isset($checkIfExist->quizstatus)){

                    $student->quizstatus = $checkIfExist->quizstatus;
                    $student->updateddatetime = $checkIfExist->updateddatetime;
                    $student->submitteddatetime = $checkIfExist->submitteddatetime;
                   
                    $totalPoints = DB::table('chapterquizrecordsdetail')
                                    ->where('headerid', $checkIfExist->id)
                                    ->where('deleted',0)
                                    ->sum('points');

                    $student->points = $totalPoints;

                }else{

                    $student->quizstatus = 2;
                    $student->updateddatetime = false;
                    $student->submitteddatetime = false;
                    $student->points = 0;
                }

            }   

            $totalPoints = collect($quizQuestions)->sum('points');

            return view('global.viewbook.booklist.quizcontent')
                         ->with('quizInfo',$quizInfo)
                         ->with('students',$students)
                         ->with('chapterquizsched',$chapterquizsched)
                         ->with('totalPoints',$totalPoints)
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
