<?php

namespace App\Http\Controllers\GlobalController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use stdClass;
class ViewBookController extends Controller
{
    
    public function viewbook($id, Request $request)
    {
        // date_default_timezone_set('Asia/Manila');
        $ids = explode('-',$id);
        $classroombookid = $ids[0];
        $classroomid = $ids[1];
        $bookid = $ids[2];

        $bookinfo = DB::table('books')
                        ->where('id',$bookid)
                        ->select('id','title','description','picurl')
                        ->first();

        // return   collect($bookinfo);

        // $parts = Db::table('parts')
        //     ->where('bookid', $bookinfo->id)
        //     ->where('deleted','0')
        //     ->get();
        // $chapters = Db::table('chapters')
        //     ->where('bookid', $bookinfo->id)
        //     ->where('deleted','0')
        //     ->get();
        // if(count($parts)>0)
        // {
        //     foreach($parts as $part)
        //     {
        //         $chapters = Db::table('chapters')
        //             ->where('partid', $part->id)
        //             ->where('deleted','0')
        //             ->get();

        //         $part->chapters = $chapters;
        //         if(count($chapters)>0)
        //         {
        //             foreach($chapters as $chapter)
        //             {
        //                 $chaptercontents = array();

        //                 $lessons = Db::table('lessons')
        //                     ->where('chapterid', $chapter->id)
        //                     ->where('deleted','0')
        //                     ->get();
                        
        //                 if(count($lessons)>0)
        //                 {
        //                     foreach($lessons as $lesson)
        //                     {
        //                         $lessoncontents = DB::table('lessoncontents')
        //                             ->where('lessonid', $lesson->id)
        //                             ->where('deleted','0')
        //                             ->orderBy('id','asc')
        //                             ->get();

        //                         $lesson->lessoncontents = $lessoncontents;
        //                         $lesson->displaytype = 'l';
        //                         array_push($chaptercontents, $lesson);
        //                     }
        //                 }

        //                 $quizzes = Db::table('chapterquiz')
        //                     ->where('chapterid', $chapter->id)
        //                     ->where('deleted','0')
        //                     ->get();

        //                 if(count($quizzes)>0)
        //                 {
        //                     foreach($quizzes as $quiz)
        //                     {
                                
        //                         $questions = DB::table('chapterquizquestions')
        //                             ->where('headerid', $quiz->id)
        //                             ->where('deleted','0')
        //                             ->get();

        //                         $quiz->questions = collect($questions)->shuffle()->flatten();
        //                         // $quiz->questions = $questions;

        //                         $checkifschedexists = DB::table('chapterquizsched')
        //                             ->where('classroomid',$classroomid)
        //                             ->where('chapterquizid',$quiz->id)
        //                             ->where('deleted','0')
        //                             ->get();

        //                         if(count($checkifschedexists) == 0)
        //                         {
        //                             $quiz->sched = 0;
        //                         }else{
        //                             foreach($checkifschedexists as $checkifschedexist)
        //                             {
        //                                 if(date('Y-m-d H:i:s') >= $checkifschedexist->datefrom.' '.$checkifschedexist->timefrom && date('Y-m-d H:i:s') <= $checkifschedexist->dateto.' '.$checkifschedexist->timeto)
        //                                 {
        //                                     DB::table('chapterquizsched')
        //                                         ->where('id', $checkifschedexist->id)
        //                                         ->update([
        //                                             'status'    => '1'
        //                                         ]);
        //                                     $checkifschedexist->status = 1;
        //                                 }else{
        //                                     DB::table('chapterquizsched')
        //                                         ->where('id', $checkifschedexist->id)
        //                                         ->update([
        //                                             'status'    => '0'
        //                                         ]);
        //                                     $checkifschedexist->status = 0;
        //                                 }
        //                                 $checkifschedexist->datefrom = date('M d, Y',strtotime($checkifschedexist->datefrom));
        //                                 $checkifschedexist->timefrom = date('h:i:s A',strtotime($checkifschedexist->timefrom));
        //                                 $checkifschedexist->dateto   = date('M d, Y',strtotime($checkifschedexist->dateto));
        //                                 $checkifschedexist->timeto   = date('h:i:s A',strtotime($checkifschedexist->timeto));
        //                             }
        //                             $quiz->schedinfo = $checkifschedexists[0];
        //                             $quiz->sched = 1;
        //                             // return $quiz->schedinfo->id;
        //                         }

        //                         if(count($questions)>0)
        //                         {
        //                             foreach($questions as $question)
        //                             {
        //                                 $answers = DB::table('chapterquizchoices')
        //                                     ->where('questionid', $question->id)
        //                                     ->where('deleted','0')
        //                                     ->get();
        //                                 $noofanswers = count(collect($answers->where('answer','1')));

        //                                 $question->noofanswers = $noofanswers;

        //                                 if(count($answers) > 0)
        //                                 {
        //                                     $question->answers = collect($answers)->shuffle()->flatten();
        //                                 }
        //                                 else{
        //                                     $question->answers = $answers;
        //                                 }
        //                             }
        //                         }
        //                         $quiz->displaytype = 'q';

        //                         $checkattempts = Db::table('chapterquizrecords')
        //                             ->where('chapterquizid', $quiz->id)
        //                             ->where('submittedby', auth()->user()->id)
        //                             ->get();
                                
        //                         if(count($checkattempts)>0)
        //                         {
        //                             foreach($checkattempts as $checkattempt)
        //                             {
        //                                 $checkattempt->details = DB::table('chapterquizrecordsdetail')
        //                                     ->where('headerid', $checkattempt->id)
        //                                     ->get();
        //                             }
        //                         }
        //                         $quiz->records = $checkattempts;
        //                         array_push($chaptercontents, $quiz);
        //                     }
        //                 }
                        
        //                 $chapter->chaptercontents = collect($chaptercontents)->sortBy('createddatetime')->flatten();
        //             }
        //         }
        //     }
        // }else{
        //     if(count($chapters)>0)
        //     {
        //         foreach($chapters as $chapter)
        //         {
        //             $chaptercontents = array();

        //             $lessons = Db::table('lessons')
        //                 ->where('chapterid', $chapter->id)
        //                 ->where('deleted','0')
        //                 ->get();
                    
        //             if(count($lessons)>0)
        //             {
        //                 foreach($lessons as $lesson)
        //                 {
        //                     $lessoncontents = DB::table('lessoncontents')
        //                         ->where('lessonid', $lesson->id)
        //                         ->where('deleted','0')
        //                         ->orderBy('id','asc')
        //                         ->get();

        //                     $lesson->lessoncontents = $lessoncontents;
        //                     $lesson->displaytype = 'l';
        //                     array_push($chaptercontents, $lesson);
        //                 }
        //             }

        //             $quizzes = Db::table('chapterquiz')
        //                 ->where('chapterid', $chapter->id)
        //                 ->where('deleted','0')
        //                 ->get();

        //             if(count($quizzes)>0)
        //             {
        //                 foreach($quizzes as $quiz)
        //                 {
                            
        //                     $questions = DB::table('chapterquizquestions')
        //                         ->where('headerid', $quiz->id)
        //                         ->where('deleted','0')
        //                         ->get();

        //                     $quiz->questions = collect($questions)->shuffle()->flatten();
        //                     // $quiz->questions = $questions;

        //                     $checkifschedexists = DB::table('chapterquizsched')
        //                         ->where('classroomid',$classroomid)
        //                         ->where('chapterquizid',$quiz->id)
        //                         ->where('deleted','0')
        //                         ->get();

        //                     if(count($checkifschedexists) == 0)
        //                     {
        //                         $quiz->sched = 0;
        //                     }else{
        //                         foreach($checkifschedexists as $checkifschedexist)
        //                         {
        //                             if(date('Y-m-d H:i:s') >= $checkifschedexist->datefrom.' '.$checkifschedexist->timefrom && date('Y-m-d H:i:s') <= $checkifschedexist->dateto.' '.$checkifschedexist->timeto)
        //                             {
        //                                 DB::table('chapterquizsched')
        //                                     ->where('id', $checkifschedexist->id)
        //                                     ->update([
        //                                         'status'    => '1'
        //                                     ]);
        //                                 $checkifschedexist->status = 1;
        //                             }else{
        //                                 DB::table('chapterquizsched')
        //                                     ->where('id', $checkifschedexist->id)
        //                                     ->update([
        //                                         'status'    => '0'
        //                                     ]);
        //                                 $checkifschedexist->status = 0;
        //                             }
        //                             $checkifschedexist->datefrom = date('M d, Y',strtotime($checkifschedexist->datefrom));
        //                             $checkifschedexist->timefrom = date('h:i:s A',strtotime($checkifschedexist->timefrom));
        //                             $checkifschedexist->dateto   = date('M d, Y',strtotime($checkifschedexist->dateto));
        //                             $checkifschedexist->timeto   = date('h:i:s A',strtotime($checkifschedexist->timeto));
        //                         }
        //                         $quiz->schedinfo = $checkifschedexists[0];
        //                         $quiz->sched = 1;
        //                         // return $quiz->schedinfo->id;
        //                     }

        //                     if(count($questions)>0)
        //                     {
        //                         foreach($questions as $question)
        //                         {
        //                             $answers = DB::table('chapterquizchoices')
        //                                 ->where('questionid', $question->id)
        //                                 ->where('deleted','0')
        //                                 ->get();
        //                             $noofanswers = count(collect($answers->where('answer','1')));

        //                             $question->noofanswers = $noofanswers;

        //                             if(count($answers) > 0)
        //                             {
        //                                 $question->answers = collect($answers)->shuffle()->flatten();
        //                             }
        //                             else{
        //                                 $question->answers = $answers;
        //                             }
        //                         }
        //                     }
        //                     $quiz->displaytype = 'q';
        //                     array_push($chaptercontents, $quiz);
        //                 }
        //             }
                    
        //             $chapter->chaptercontents = collect($chaptercontents)->sortBy('createddatetime')->flatten();
        //         }
        //     }
        // }
        
        // $bookinfo->parts = $parts;
        // $bookinfo->chapters = $chapters;
        // $bookinfo->classroomid = $classroomid;
        return view('global.viewbook.viewbookindex')
            ->with('classroomid', $classroomid)
            ->with('bookinfo', $bookinfo);


                        
    }

    public function viewquiz($id, Request $request)
    {
        $ids = explode('-',$id);
        $classroombookid = $ids[0];
        $classroomid = $ids[1];
        $bookid = $ids[2];
        // $quiz = DB::table('lesssonquiz')
        //     ->where('bookid',$bookid)
        //     ->where("deleted", 0)
        //     ->get();

        // foreach ($quiz as $item) {

        //     $item->chapter = DB::table('chapters')->where('id',$item->chapterid)->value('title');

        //     if(empty($item->coverage)){
        //         $item->coverage = "Coverage not defined";
        //     }

        //     $quizsched = DB::table('chapterquizsched')
        //         ->where('classroomid',$classroomid)
        //         ->where('chapterquizid',$item->id)
        //         ->get();

        //     if(count($quizsched) != 0){

        //         $item->isactivated = $quizsched[0]->status; 

        //         $allowed_students = DB::table('allowed_student_quiz')
        //             ->join('users', 'allowed_student_quiz.studentid', '=', 'users.id')
        //             ->where('allowed_student_quiz.chapterquizschedid', $quizsched[0]->id)
        //             ->where('allowed_student_quiz.deleted', 0)
        //             ->select(
        //                 'users.id',
        //                 'allowed_student_quiz.chapterquizschedid',
        //                 'users.name')
        //             ->get();

        //         if(count($allowed_students) == 0) {
        //             $item->allowed_students = null;
        //         } else {
        //             $item->allowed_students = $allowed_students;
        //         }

        //     } else {
        //         $item->allowed_students = null;
        //         $item->isactivated = null; 
        //     }

        // }

        // dd($quiz);

        return view('teacher.quiz.viewquiz')
            ->with('bookid', $bookid)
            ->with('classroomid', $classroomid);
    }

    public function quizTable(Request $request)
    {


        $classroomid = $request->query->get('classroomid');
        $bookid = $request->get('bookid');


        $quiz = DB::table('lesssonquiz')
            ->where('bookid',$bookid)
            ->where("deleted", 0)
            ->get();

        foreach ($quiz as $item) {

            

            $item->chapter = DB::table('chapters')->where('id',$item->chapterid)->value('title');

            if(empty($item->coverage)){
                $item->coverage = "Coverage not defined";
            }

            $quizsched = DB::table('chapterquizsched')
                ->where('classroomid',$classroomid)
                ->where('chapterquizid',$item->id)
                ->get();

            if(count($quizsched) != 0){

                $item->isactivated = $quizsched[0]->status; 

                $allowed_students = DB::table('allowed_student_quiz')
                    ->join('users', 'allowed_student_quiz.studentid', '=', 'users.id')
                    ->where('allowed_student_quiz.chapterquizschedid', $quizsched[0]->id)
                    ->where('allowed_student_quiz.deleted', 0)
                    ->select(
                        'users.id',
                        'allowed_student_quiz.chapterquizschedid',
                        'users.name')
                    ->get();

                if(count($allowed_students) == 0) {
                    $item->allowed_students = null;
                } else {
                    $item->allowed_students = $student_names = $allowed_students->pluck('name')->implode(', ');;
                }

            } else {
                $item->allowed_students = null;
                $item->isactivated = 3; 
            }

            $item->search = $item->description.' '.$item->allowed_students.', '.$item->coverage.' '.$item->createddatetime.' '.$item->title.' '.$item->chapter;

        }


    
        return($quiz);


    }

    public function getActiveQuiz(Request $request)
    {
        $bookid = $request->get('bookid');
        $quiz = DB::table('chapterquizsched')
            ->where('chapterquizsched.deleted', 0)
            ->where('classroomid', $request->get('classroomid'))
            ->join('lesssonquiz', function($join) use ($bookid) {
                $join->on('chapterquizsched.chapterquizid', '=', 'lesssonquiz.id')
                    ->where('lesssonquiz.bookid', '=', $bookid);
            })
            ->where('lesssonquiz.deleted', 0)
            ->select(
                'lesssonquiz.title',
                'lesssonquiz.id',
                'datefrom',
                'timefrom',
                'dateto',
                'timeto',
                'noofattempts',
                'chapterquizsched.id as schedid',
                'chapterquizsched.status',
                'chapterquizsched.createddatetime',
                'chapterquizsched.updateddatetime'
            )
            ->orderBy('createddatetime', 'desc')
            ->orderBy('updateddatetime', 'desc')
            ->get();



        foreach($quiz as $item){
            $item->search = $item->datefrom.' '.$item->timefrom.', '.$item->dateto.' '.$item->timeto.' '.$item->title;
            if(isset($item->updateddatetime)){
                $item->activedate = $item->updateddatetime;
            }else{
                $item->activedate = $item->createddatetime;
            }
        }

        return $quiz;
    }


    public function endQuiz(Request $request)
    {
        $id = $request->get('id');

        DB::table('chapterquizsched')
            ->where('id', $id)
            ->update([
                'status'    => '1'
            ]);

        DB::table('allowed_student_quiz')
            ->where('chapterquizschedid', $id)
            ->update([
                'deleted' => '1',
            ]);

            
        return 1;
        
    }


    public function quizresponses(Request $request)
        {
            $classroomid = $request->get('classroomid');
            $chapterquizid = $request->get('chapterquizid');

            $responses = DB::table('chapterquizrecords')
                ->join('users', 'users.id', '=', 'chapterquizrecords.submittedby')
                ->where('chapterquizrecords.classroomid', $classroomid)
                ->where('chapterquizrecords.chapterquizid', $chapterquizid)
                ->where('chapterquizrecords.deleted', '0')
                ->where('chapterquizrecords.quizstatus', '1')
                ->select('chapterquizrecords.id', 'chapterquizrecords.classroomid', 'chapterquizrecords.chapterquizid', 'chapterquizrecords.submittedby', 'users.name', 'chapterquizrecords.totalscore', 'chapterquizrecords.submitteddatetime', 'chapterquizrecords.deleted', 'chapterquizrecords.quizstatus', 'chapterquizrecords.deletedby', 'chapterquizrecords.updatedby', 'chapterquizrecords.updateddatetime')
                ->get();

            $maxpoints = DB::table('lessonquizquestions')
                ->where('quizid', $chapterquizid)
                ->where('deleted', 0)
                ->where('typeofquiz', '!=', null)
                ->where('typeofquiz', '!=', 4)
                ->where('typeofquiz', '!=', 9)
                ->sum('points');

            foreach ($responses as $response) {
                $response->maxpoints = $maxpoints;
            }

            return $responses;
        }


    public function viewquizanalytics($quizid, $classroomid, $bookid, Request $request)
    {


        $quizInfo = DB::table('lesssonquiz')
                        ->where('id',$quizid)
                        ->select('id','title', 'coverage', 'description' )
                        ->first();

        $quizQuestions = DB::table('lessonquizquestions')
                    ->where('lessonquizquestions.deleted','0')
                    ->where('quizid', $quizid)
                    ->where('typeofquiz', '!=', null)
                    //->where('typeofquiz', '=', 1)
                    ->select(
                        'lessonquizquestions.id',
                        'lessonquizquestions.question',
                        'lessonquizquestions.typeofquiz',
                        'lessonquizquestions.item',
                        'lessonquizquestions.points',
                        'lessonquizquestions.ordered',
                        'lessonquizquestions.picurl'
                    )
                    ->get();  
                    
                    


        return view('teacher.quiz.viewquizanalytics')
        ->with('quizQuestions', $quizQuestions)
        ->with('classroomid', $classroomid)
        ->with('quizid', $quizid);

    

    }



    

    public function getChoices(Request $request)
    {      

        $id =  $request->get('id');
        $classroomid =  $request->get('classroomid');
        $quizid =  $request->get('quizid');

        $lessonchoices = DB::table('lessonquizchoices')
                    ->where('questionid', $id)
                    ->where('deleted', '0')
                    ->select(
                        'id',
                        'description',
                        'answer'
                    )
                    ->orderBy('sortid')
                    ->get();  
        
        $quizrecord = DB::table('chapterquizrecords')
                    ->where('classroomid', $classroomid)
                    ->where('chapterquizid', $quizid)
                    ->where('quizstatus', '1')
                    ->select('id')
                    ->groupBy('submittedby')
                    ->get();

        

                foreach ($lessonchoices as $choice) {
                        $choice->data = DB::table('chapterquizrecordsdetail')
                            ->where('choiceid', $choice->id)
                            ->whereIn('headerid', $quizrecord->pluck('id')->toArray()) // Use the 'id' from $quizrecord
                            ->count();
                }





        return $lessonchoices;

    

    }


    public function getShort(Request $request)
    {      

        $id =  $request->get('id');
        $classroomid =  $request->get('classroomid');
        $quizid =  $request->get('quizid');
        
        $quizrecord = DB::table('chapterquizrecords')
                    ->where('classroomid', $classroomid)
                    ->where('chapterquizid', $quizid)
                    ->where('quizstatus', '1')
                    ->select('id')
                    ->groupBy('submittedby')
                    ->get();

        

        $data = DB::table('chapterquizrecordsdetail')
            ->whereIn('headerid', $quizrecord->pluck('id')->toArray())
            ->where('typeofquestion', '=', '2')
            ->select('stringanswer')
            ->groupBy('stringanswer')
            ->get();


        $dataObject = new stdClass();
        $dataObject->answer = [];
        $dataObject->count = [];

        foreach ($data as $item) {
            $answer = $item->stringanswer;
            $count = DB::table('chapterquizrecordsdetail')
                ->whereIn('headerid', $quizrecord->pluck('id')->toArray())
                ->where('typeofquestion', '=', '2')
                ->where('stringanswer', '=', $answer)
                ->count();

            $dataObject->answer[] = $answer;
            $dataObject->count[] = $count;
        }






        return json_encode($dataObject);

    

    }



    public function viewquizresponse($classroomId, $quizId, $recordId, Request $request)
    {

        $recordid = $recordId;
        $quizid = $quizId;
        $classroomid = $classroomId;

        $studinfo = DB::table('chapterquizrecords')
            ->where('id',$recordId)
            ->value('studname');

        $quizInfo = DB::table('lesssonquiz')
                        ->where('id',$quizid)
                        ->select('id','title', 'coverage', 'description' )
                        ->first();



        $quizQuestions = DB::table('lessonquizquestions')
                    ->where('lessonquizquestions.deleted','0')
                    ->where('quizid', $quizInfo->id)
                    ->where('typeofquiz', '!=', null)
                    ->select(
                        'lessonquizquestions.id',
                        'lessonquizquestions.question',
                        'lessonquizquestions.typeofquiz',
                        'lessonquizquestions.item',
                        'lessonquizquestions.points',
                        'lessonquizquestions.ordered',
                        'lessonquizquestions.picurl'
                    )
                    ->get();

        $isAnswered = false;




            foreach($quizQuestions as $item){

                if($item->typeofquiz == 1){

                    $choices = DB::table('lessonquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id','answer', 'sortid')
                                    ->orderBy('sortid')
                                    ->get();

                    $item->choices = $choices;

                    $answer = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('choiceid');

                    $check = DB::table('lessonquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('id', $answer)
                                    ->where('deleted',0)
                                    ->value('answer');

                    if(isset($answer)){
                        $item->answer = $answer;
                        $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');
                            
                        $item->detailsid = $chapterdetailsid;
                        if($check == 1){


                            $item->check = 1;
                            //update points value
                            DB::table('chapterquizrecordsdetail')

                            ->where('id', $chapterdetailsid)
                            ->where('deleted', 0)
                            ->update([
                                'points' => 1


                            ]);
                            



                        }else{
                            $item->check = 0;
                        }
                        
                    }else{
                        $item->detailsid = -1;
                        $item->answer = 0;
                        $item->check = 0;

                    }


                }


                if($item->typeofquiz == 10){

                    $choices = DB::table('lessonquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id','answer', 'sortid')
                                    ->orderBy('sortid')
                                    ->get();

                    $item->choices = $choices;

                    $answer = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('choiceid');

                    $check = DB::table('lessonquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('id', $answer)
                                    ->where('deleted',0)
                                    ->value('answer');

                    if(isset($answer)){
                        $item->answer = $answer;
                        $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');
                            
                        $item->detailsid = $chapterdetailsid;
                        if($check == 1){


                            $item->check = 1;
                            //update points value
                            DB::table('chapterquizrecordsdetail')

                            ->where('id', $chapterdetailsid)
                            ->where('deleted', 0)
                            ->update([
                                'points' => 1


                            ]);
                            



                        }else{
                            $item->check = 0;
                        }
                        
                    }else{
                        $item->detailsid = -1;
                        $item->answer = 0;
                        $item->check = 0;

                    }


                }

                if($item->typeofquiz == 2 || $item->typeofquiz == 3 ){

                    $answer = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('stringanswer');


                    if(isset($answer)){

                        $item->answer = $answer;

                        $item->detailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');

                        $item->pointsgiven = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('points');





                    }else{

                        $item->detailsid = -1;
                        $item->answer = "";
                        $item->pointsgiven = 0;

                    }

                    
                }

                if($item->typeofquiz == 7 ){

                    $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');
                            
                    $item->detailsid = $chapterdetailsid;


                    $fillquestions = DB::table('lesson_fill_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();

                    $item->fill = $fillquestions;

                    $score = 0;


                    foreach ($item->fill as $index => $fillItem) {
                        $key = 0;
                        $answercount = DB::table('chapterquizrecordsdetail')
                            ->where('questionid', $fillItem->id)
                            ->where('headerid', $recordid)
                            ->where('deleted', 0)
                            ->count();

                        if ($answercount == 1) {
                            $fillItem->answer  = DB::table('chapterquizrecordsdetail')
                                ->where('questionid', $fillItem->id)
                                ->where('headerid', $recordid)
                                ->where('deleted', 0)
                                ->value('stringanswer');


                            $checkanswer = DB::table('lesson_quiz_fill_answer')
                                    ->where('headerid',$fillItem->id)
                                    ->where('sortid', 1)
                                    ->value('answer');

                            $check='';

                            if (strtolower($checkanswer) == strtolower($fillItem->answer)) {


                                $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$fillItem->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', 1)
                                    ->where('deleted',0)
                                    ->value('id');

                                //update points value
                                DB::table('chapterquizrecordsdetail')

                                ->where('id', $chapterdetailsid)
                                ->where('deleted', 0)
                                ->where('sortid', 1)
                                ->update([
                                    'points' => 1


                                ]);

                                $score+= 1;

                                $check = '<span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>';
                            
                            }else{
                                $check = '<span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>';
                            }

                            $questionWithInputs = preg_replace_callback('/~input/', function ($matches) use ($fillItem, &$inputCounter, &$key, &$check) {
                                $inputField = '<input class="answer-field d-inline form-control q-input" data-question-type="7" data-sortid="' . ++$inputCounter . '" data-question-id="' . $fillItem->id . '" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-' . $fillItem->id . '" value="' . $fillItem->answer . '">'.$check;
                                return $inputField;
                            }, $fillItem->question);
                            $inputCounter = 0;

                            $fillItem->question = $questionWithInputs;
                        } else if ($answercount > 1) {

                            $answer = DB::table('chapterquizrecordsdetail')
                                ->where('questionid', $fillItem->id)
                                ->where('headerid', $recordid)
                                ->select('stringanswer', 'sortid')
                                ->orderBy('sortid', 'asc')
                                ->get();

                            foreach($answer as $ans){

                                $checkanswer = DB::table('lesson_quiz_fill_answer')
                                    ->where('headerid',$fillItem->id)
                                    ->where('sortid', $ans->sortid)
                                    ->value('answer');

                                if(strtolower($checkanswer) == strtolower($ans->stringanswer)){
                    
                                    $score+= 1;

                                    $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$fillItem->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $ans->sortid)
                                    ->where('deleted',0)
                                    ->value('id');

                                    //update points value
                                    DB::table('chapterquizrecordsdetail')
                                    ->where('id', $chapterdetailsid)
                                    ->where('sortid', $ans->sortid)
                                    ->where('deleted', 0)
                                    ->update([
                                        'points' => 1


                                    ]);

                                    $ans->check = '<span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>';
                                }else{
                                    $ans->check = '<span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>'; 
                                }
                                

                            } 

                            

                            $sort = -1;
                            $questionWithInputs = preg_replace_callback('/~input/', function ($matches) use ($fillItem, &$inputCounter, &$key, &$sort, &$answer) {
                                $inputField = '<input class="answer-field d-inline form-control q-input" data-question-type="7" data-sortid="' . ++$inputCounter . '" data-question-id="' . $fillItem->id . '" value="' . $answer[++$sort]->stringanswer . '" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-' . $fillItem->id . '">'.$answer[$sort]->check;
                                return $inputField;
                            }, $fillItem->question);
                            $inputCounter = 0;

                            $fillItem->answer = $answer;
                            $fillItem->question = $questionWithInputs;
                        } else {
                            $questionWithInputs = preg_replace_callback('/~input/', function ($matches) use ($fillItem, &$inputCounter, &$key) {
                                $inputField = '<input class="answer-field d-inline form-control q-input" data-question-type="7" data-sortid="' . ++$inputCounter . '" data-question-id="' . $fillItem->id . '" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-' . $fillItem->id . '">';
                                return $inputField;
                            }, $fillItem->question);
                            $inputCounter = 0;

                            $fillItem->question = $questionWithInputs;
                        }
                    }

                    $item->score = $score;

                                            

                }


                if($item->typeofquiz == 6 ){

                    $protocol = $request->getScheme();
                    $host = $request->getHost();

                    $rootDomain = $protocol . '://' . $host;

                    $answer = DB::table('chapterquizrecordsdetail')
                        ->where('questionid',$item->id)
                        ->where('headerid', $recordid)
                        ->where('deleted',0)
                        ->value('picurl');

                    if(isset($answer)){
                        $item->picurl = $rootDomain.'/'.$answer;

                        $item->detailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');

                        $item->pointsgiven = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('points');
                    }else{
                        $item->picurl = "";
                        $item->detailsid = -1;
                        $item->pointsgiven = 0;
                    }
                }


                if($item->typeofquiz == 11 ){

                    $protocol = $request->getScheme();
                    $host = $request->getHost();

                    $rootDomain = $protocol . '://' . $host;

                    $answer = DB::table('chapterquizrecordsdetail')
                        ->where('questionid',$item->id)
                        ->where('headerid', $recordid)
                        ->where('deleted',0)
                        ->value('fileurl');

                    if(isset($answer)){
                        $item->fileurl = $rootDomain.'/'.$answer;

                        $item->detailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');

                        $item->pointsgiven = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('points');
                    }else{
                        $item->fileurl = "";
                        $item->detailsid = -1;
                        $item->pointsgiven = 0;
                    }
                }

                if($item->typeofquiz == 9 ){

                    $protocol = $request->getScheme();
                    $host = $request->getHost();

                    $rootDomain = $protocol . '://' . $host;

        
                    $item->image = $rootDomain.'/'.$item->picurl;

                    
                }


                if($item->typeofquiz == 8){


                    $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');
                            
                    $item->detailsid = $chapterdetailsid;
                

                    $numberOfTimes = $item->item;


                    $newArray = []; // Declare an empty array

                    for ($i = 0; $i < $numberOfTimes; $i++) {

                        $answer  = DB::table('chapterquizrecordsdetail')
                                        ->where('questionid',$item->id)
                                        ->where('headerid', $recordid)
                                        ->where('sortid', $i+1)
                                        ->where('deleted',0)
                                        ->value('stringanswer');
                        $newArray[] = $answer;
                    }

                    $answerArray = [];

                    $score = 0;

                    foreach($newArray as $key=>$new) {
                        

                        if($item->ordered == 1){
                            $countval = DB::table('lesson_quiz_enum_answer')
                                            ->whereRaw('LOWER(answer) = ?', strtolower($new))
                                            ->where('headerid', $item->id)
                                            ->count();


                            if($countval > 0){
                                $answerArray[] = 1;
                                $score+=1;

                                $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $key + 1)
                                    ->where('deleted',0)
                                    ->value('id');

                                    //update points value
                                    DB::table('chapterquizrecordsdetail')

                                    ->where('id', $chapterdetailsid)
                                    ->where('deleted', 0)
                                    ->update([
                                        'points' => 1


                                    ]);
                            }else{
                                $answerArray[] = 0;
                            }
                        }else{

                            $countval = DB::table('lesson_quiz_enum_answer')
                                        ->whereRaw('LOWER(answer) = ?', strtolower($new))
                                        ->where('headerid', $item->id)
                                        ->where('sortid', $key + 1)
                                        ->count();


                            if($countval > 0){
                                $answerArray[] = 1;
                                $score+=1;

                                $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $key)
                                    ->where('deleted',0)
                                    ->value('id');

                                //update points value
                                DB::table('chapterquizrecordsdetail')
                                ->where('id', $chapterdetailsid)
                                ->where('deleted', 0)
                                ->update([
                                    'points' => 1


                                ]);

                            }else{
                                $answerArray[] = 0;
                            }

                        }
                    }


                    $item->answer = $newArray;
                    $item->check =  $answerArray;
                    $item->score =  $score;


                }

                if($item->typeofquiz == 5){

                    $chapterdetailsid = DB::table('chapterquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');
                            
                    $item->detailsid = $chapterdetailsid;

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


                    $score = 0;

                    

                    
                    foreach($dropquestions as $index => $drop) {
                        $key = 0;
                        $answercount = DB::table('chapterquizrecordsdetail')
                            ->where('questionid', $drop->id)
                            ->where('headerid', $recordid)
                            ->where('deleted', 0)
                            ->count();

                        if ($answercount == 1) {
                            $drop->answer = DB::table('chapterquizrecordsdetail')
                                ->where('questionid', $drop->id)
                                ->where('headerid', $recordid)
                                ->where('deleted', 0)
                                ->value('stringanswer');

                            $checkanswer = DB::table('lesson_quiz_drop_answer')
                                ->where('headerid', $drop->id)
                                ->where('sortid', 1)
                                ->value('answer');

                            if ($checkanswer == $drop->answer) {
                                $score += 1;
                                $check = '<span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>';
                            } else {
                                $check = '<span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>';
                            }
                            
                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($drop, &$inputCounter, &$key, &$check) {
                                $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable bg-primary text-white answer-field" data-question-type="5" data-sortid="'.(++$inputCounter).'" data-question-id="'.$drop->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$drop->id.'" value="'.$drop->answer.'" disabled>'.$check;
                                return $inputField;
                            }, $drop->question);
                            $inputCounter = 0;
                            
                            $drop->question = $questionWithInputs;
                        } else if ($answercount > 1) {
                            $answer = DB::table('chapterquizrecordsdetail')
                                ->where('questionid', $drop->id)
                                ->where('headerid', $recordid)
                                ->select('stringanswer', 'sortid')
                                ->orderBy('sortid', 'asc')
                                ->get();
                            
                            foreach ($answer as $ans) {
                                $checkanswer = DB::table('lesson_quiz_drop_answer')
                                    ->where('headerid', $drop->id)
                                    ->where('sortid', $ans->sortid)
                                    ->value('answer');

                                if ($checkanswer == $ans->stringanswer) {
                                    $score += 1;
                                    $ans->check = '<span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>';
                                } else {
                                    $ans->check = '<span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>'; 
                                }
                            } 

                            $sort = -1;
                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($drop, &$inputCounter, &$key, &$sort, &$answer) {
                                $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable bg-primary text-white answer-field" data-question-type="5" data-sortid="'.++$inputCounter.'" data-question-id="'.$drop->id.'" value="'.$answer[++$sort]->stringanswer.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$drop->id.'" disabled>'.$answer[$sort]->check;
                                return $inputField;
                            }, $drop->question);
                            $inputCounter = 0;

                            $drop->answer = $answer;
                            $drop->question = $questionWithInputs;
                        } else {
                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($drop, &$inputCounter, &$key) {
                                $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable answer-field" data-question-type="5" data-sortid="'.++$inputCounter.'" data-question-id="'.$drop->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$drop->id.'" disabled>';
                                return $inputField;
                            }, $drop->question);
                            $inputCounter = 0;

                            $drop->question = $questionWithInputs;
                        }
                    }

                    $item->score = $score;

                    


                }


            }


            

            return view('teacher.quiz.viewquizresponse')
                ->with('quizInfo',$quizInfo)
                ->with('headerid',$recordid)
                ->with('classroomid',$classroomid)
                ->with('studinfo',$studinfo)
                ->with('quizQuestions',$quizQuestions);

    }

    public function updatescore(Request $request)
    {

        try {
            $recordId = $request->get('detailsid');
            $score = $request->get('score');
    
            DB::table('chapterquizrecordsdetail')
                ->where('id', $recordId)
                ->update([
                    'points'=> $score,
                ]);

            return 1;
        } catch (\Exception $e) {
            return 0;
        }

    }

    public function doneCheck(Request $request)
    {

        try {
            $headerid = $request->get('headerid');

            $sum = DB::table('chapterquizrecordsdetail')
                ->where('headerid', $headerid)
                ->sum('points');

            DB::table('chapterquizrecords')
                ->where('id', $headerid)
                ->update([
                    'checked'=> 1,
                    'totalscore' => $sum
                ]);

            

            return 1;
        } catch (\Exception $e) {
            return 0;
        }

    }


    public function getclassroomstudents(Request $request)
    {
        try {
            $classroomid = $request->get('classroomid');
    
            $students = DB::table('classroomstudents')
                ->join('students', 'students.id', '=', 'classroomstudents.studentid')
                ->join('users', 'students.userid', '=', 'users.id')
                ->select('classroomstudents.*', 'users.name')
                ->where('classroomstudents.classroomid', $classroomid)
                ->where('classroomstudents.deleted', 0)
                ->get();
    
            // Transform the data into the expected format
            $formattedData = $students->map(function ($student) {
                return [
                    'id' => $student->id,
                    'text' => $student->name
                ];
            });
    
            return response()->json($formattedData);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve students'], 500);
        }
    }


    public function chaptertestavailability(Request $request)
    {

        $allowed_students = $request->get('allowed_students');
        $randomize = $request->get('randomize');
        
        $checkifexists = DB::table('chapterquizsched')
            ->where('chapterquizid', $request->get('quizId'))
            ->where('classroomid', $request->get('classroomId'))
            ->where('deleted','0')
            ->get();

        $status = null;
        $quizschedid = null;

        if(count($checkifexists) == 0) {
            $createdsched = DB::table('chapterquizsched')
                ->insertGetId([
                    'chapterquizid'         => $request->get('quizId'),
                    'classroomid'           => $request->get('classroomId'),
                    'datefrom'              => $request->get('dateFrom'),
                    'timefrom'              => $request->get('timeFrom'),
                    'dateto'                => $request->get('dateTo'),
                    'timeto'                => $request->get('timeTo'),
                    'noofattempts'          => $request->get('attempts'),
                    'randomize'             => $randomize,
                    'createdby'             => auth()->user()->id,
                    'createddatetime'       => \Carbon\Carbon::now('Asia/Manila')
                ]);

                $status = 1;
                $quizschedid = $createdsched;

        } else {
            DB::table('chapterquizsched')
                ->where('id', $checkifexists[0]->id)
                ->update([
                    'chapterquizid'         => $request->get('quizId'),
                    'classroomid'           => $request->get('classroomId'),
                    'datefrom'              => $request->get('dateFrom'),
                    'timefrom'              => $request->get('timeFrom'),
                    'dateto'                => $request->get('dateTo'),
                    'timeto'                => $request->get('timeTo'),
                    'noofattempts'          => $request->get('attempts'),
                    'randomize'             => $randomize,
                    'status'                => $request->get('status'),
                    'updateddatetime'       => \Carbon\Carbon::now('Asia/Manila')
                ]);

            $status = 0;
            $quizschedid = $checkifexists[0]->id;
        }

        if (isset($allowed_students)) {
            foreach ($allowed_students as $student_id) {
                $countStudent = DB::table('allowed_student_quiz')
                    ->where('studentid', $student_id)
                    ->where('chapterquizschedid', $quizschedid)
                    ->where('deleted', 0)
                    ->get();

            
                // only add new entry if it does not exists
                if (count($countStudent) == 0) {
                    DB::table('allowed_student_quiz')
                        ->insert([
                            'chapterquizschedid'    => $quizschedid,
                            'studentid'             => $student_id,
                            'createdby'             => auth()->user()->id,
                            'createddatetime'       => \Carbon\Carbon::now('Asia/Manila'),
                        ]);
                }
            }
        }

        return $status;

    }

    public function takethetest(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        
        // $headerid = Db::table('chapterquizrecords')
        //     ->insertGetId([
        //         'chapterquizid'         =>  $request->get('chapterquizid'),
        //         'submittedby'           => auth()->user()->id,
        //         'submitteddatetime'     => date('Y-m-d H:i:s')
        //     ]);

        $quizinfo = Db::table('chapterquiz')
            ->where('id',$request->get('chapterquizid'))
            ->first();
        
        $questions = DB::table('chapterquizquestions')
            ->where('headerid', $request->get('chapterquizid'))
            ->where('deleted','0')
            ->get();
            
        $quizinfo->questions = $questions;

        $checkifschedexists = DB::table('chapterquizsched')
            ->where('classroomid',$request->get('classroomid'))
            ->where('chapterquizid',$request->get('chapterquizid'))
            ->where('deleted','0')
            ->get();

        if(count($checkifschedexists) == 0)
        {
            $quizinfo->sched = 0;
        }else{
            $quizinfo->sched = 1;
            foreach($checkifschedexists as $checkifschedexist)
            {
                if(date('Y-m-d H:i:s') >= $checkifschedexist->datefrom.' '.$checkifschedexist->timefrom && date('Y-m-d H:i:s') <= $checkifschedexist->dateto.' '.$checkifschedexist->timeto)
                {
                    DB::table('chapterquizsched')
                        ->where('id', $checkifschedexist->id)
                        ->update([
                            'status'    => '1'
                        ]);
                    $checkifschedexist->status = 1;
                }else{
                    DB::table('chapterquizsched')
                        ->where('id', $checkifschedexist->id)
                        ->update([
                            'status'    => '0'
                        ]);
                    $checkifschedexist->status = 0;
                }
                $checkifschedexist->datefrom = date('M d, Y',strtotime($checkifschedexist->datefrom));
                $checkifschedexist->timefrom = date('h:i:s A',strtotime($checkifschedexist->timefrom));
                $checkifschedexist->dateto   = date('M d, Y',strtotime($checkifschedexist->dateto));
                $checkifschedexist->timeto   = date('h:i:s A',strtotime($checkifschedexist->timeto));
            }
            $quizinfo->schedinfo = $checkifschedexists[0];
            $quizinfo->noofattempts = $checkifschedexists[0]->noofattempts;
        }
        // return collect($quizinfo);
        if(count($questions)>0)
        {
            foreach($questions as $question)
            {
                $answers = DB::table('chapterquizchoices')
                    ->where('questionid', $question->id)
                    ->where('deleted','0')
                    ->get();
                $noofanswers = count(collect($answers->where('answer','1')));

                $question->noofanswers = $noofanswers;

                if(count($answers) > 0)
                {
                    $question->answers = collect($answers)->shuffle()->flatten();
                }
                else{
                    $question->answers = $answers;
                }
            }
        }
        $quizinfo->displaytype = 'q';

        $checkattempts = Db::table('chapterquizrecords')
            ->where('chapterquizid', $request->get('chapterquizid'))
            ->where('submittedby', auth()->user()->id)
            ->get();
        
        if(count($checkattempts)>0)
        {
            foreach($checkattempts as $checkattempt)
            {
                $checkattempt->details = DB::table('chapterquizrecordsdetail')
                    ->where('headerid', $checkattempt->id)
                    ->get();
            }

        }else{
            
            $headerid = Db::table('chapterquizrecords')
                ->insertGetId([
                    'chapterquizid'         =>  $request->get('chapterquizid'),
                    'submittedby'           => auth()->user()->id,
                    'submitteddatetime'     => date('Y-m-d H:i:s')
                ]);
            $checkattempts = Db::table('chapterquizrecords')
                ->where('chapterquizid', $request->get('chapterquizid'))
                ->where('submittedby', auth()->user()->id)
                ->get();

            if(count($checkattempts)>0)
            {
                foreach($checkattempts as $checkattempt)
                {
                    $checkattempt->details = DB::table('chapterquizrecordsdetail')
                        ->where('headerid', $checkattempt->id)
                        ->get();
                }
            }
        }
        $quizinfo->records = $checkattempts;
        return view('global.viewbook.studentview.studentviewtaketest')
            ->with('quizinfo', $quizinfo);
        
    }
}
