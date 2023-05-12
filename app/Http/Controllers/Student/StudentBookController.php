<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentBookController extends Controller
{
    public function submitanswers(Request $request)
    {

    
        $headerid = Db::table('chapterquizrecords')
            ->insertGetId([
                'chapterquizid'         =>  $request->get('chapterquizid'),
                'submittedby'           =>  auth()->user()->id,
                'submitteddatetime'     =>  date('Y-m-d H:i:s'),
                'classroomid'           =>  $request->get('roomid')
            ]);

        if(count($request->except('studentuserid', 'chapterquizid','recordid'))>0)
        {
            foreach($request->except('studentuserid', 'chapterquizid','recordid','roomid','_token') as $answersetkey => $answersetvalue)
            {
                $getquestioninfo = explode('_', $answersetkey);
                $questionid = trim(str_replace('questionid','',$getquestioninfo[1]));
                // return $questionid;
                if($questionid != 'token'){

                    $questiontype=$getquestioninfo[2];
                    // return $questiontype;
                    if(count($answersetvalue)>0)
                    {
                        foreach($answersetvalue as $ansval)
                        {
                            if(strtolower($questiontype) == 'multiple')
                            {
                                DB::table('chapterquizrecordsdetail')
                                    ->insert([
                                        'headerid'      => $headerid,
                                        'questionid'    => $questionid,
                                        'choiceid'      => $ansval
                                    ]);
                            }else{
                                DB::table('chapterquizrecordsdetail')
                                    ->insert([
                                        'headerid'      => $headerid,
                                        'questionid'    => $questionid,
                                        'description'   => $ansval
                                    ]);
                            }
                        }
                    }
                }
            }
        }

        $quizinfo = Db::table('chapterquiz')
            ->where('id',$request->get('chapterquizid'))
            ->first();

        $checkifschedexists = DB::table('chapterquizsched')
            ->where('classroomid',$request->get('classroomid'))
            ->where('chapterquizid',$request->get('chapterquizid'))
            ->where('deleted','0')
            ->get();

        return '1';
        // return view('global.viewbook.studentview.testtaken')
        //     ->with('quizinfo', $quizinfo);
    }
    public function studentQuizContentattempt(Request $request , $quizid, $classroomid){


        $recordid = $request->get('recordid');

        $quizInfo = DB::table('lesssonquiz')
                        ->where('id',$quizid)
                        ->select('id','title', 'coverage', 'description' )
                        ->first();



            $quizQuestions = DB::table('lessonquizquestions')
                        ->where('lessonquizquestions.deleted','0')
                        ->where('quizid', $quizInfo->id)
                        ->select(
                            'lessonquizquestions.id',
                            'lessonquizquestions.question',
                            'lessonquizquestions.typeofquiz'
                        )
                        ->get();

            foreach($quizQuestions as $item){

                // if($item->typeofquiz == 1){

                //     $choices = DB::table('lessonquizchoices')
                //                     ->where('questionid',$item->id)
                //                     ->where('deleted',0)
                //                     ->select('description','id','answer', 'sortid')
                //                     ->orderBy('sortid')
                //                     ->get();

                //     $item->choices = $choices;

                // }


                if($item->typeofquiz == 5){

                    $dragoption = DB::table('lesson_quiz_drag_option')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id')
                                    ->get();

                    $item->drag = $dragoption;

                    $dropquestion = DB::table('lesson_quiz_drop_question')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('question','id','sortid')
                                    ->get();

                    $item->drop = $dropquestion;



                }

            }


            // $isAnswered = false;

            // $numberOfAttempts =  DB::table('chapterquizrecords')
            //                         ->where('submittedby',auth()->user()->id)
            //                         ->where('chapterquizid',$quizid)
            //                         ->count();
            
            // $checkIfAnswered = DB::table('chapterquizrecords')
            //                     ->where('submittedby',auth()->user()->id)
            //                     ->where('chapterquizid',$quizid)
            //                     ->where('deleted',0)
            //                     ->select('id','submitteddatetime','quizstatus','updateddatetime')
            //                     ->first();

            // $attemptsLeft = 0;

            // if(isset($chapterquizsched->noofattempts)){

            //     $attemptsLeft = $chapterquizsched->noofattempts - $numberOfAttempts;

            // }

            // if(isset($checkIfAnswered->id)){
            //     $isAnswered = true;
            // }

            // $quizAnswersInfo = DB::table('chapterquizrecords')
            //                     ->where('submittedby',auth()->user()->id)
            //                     ->where('chapterquizid',$quizid)
            //                     ->where('chapterquizrecords.deleted',0)
            //                     ->join('chapterquizrecordsdetail',function($join){
            //                         $join->on('chapterquizrecords.id','=','chapterquizrecordsdetail.headerid');
            //                         $join->where('chapterquizrecordsdetail.deleted',0);
            //                     })
            //                     ->join('chapterquizquestions',function($join){
            //                         $join->on('chapterquizrecordsdetail.questionid','=','chapterquizquestions.id');
            //                     })
            //                     ->select(
            //                         'choiceid',
            //                         'questionid',
            //                         'question',
            //                         'type',
            //                         'description',
            //                         'chapterquizrecordsdetail.points as studPoints',
            //                         'chapterquizquestions.points'
            //                         )
            //                     ->get();

   
            
            // foreach($quizAnswersInfo as $item){

            //     if($item->type == 1){

            //         $choices = DB::table('chapterquizchoices')
            //                         ->where('id',$item->choiceid)
            //                         ->where('deleted',0)
            //                         ->select('description','id','answer')
            //                         ->first();

            //         if(isset($choices->id)){

            //             $item->description = $choices->description;

            //         }

            //     }

            // }
            



            // $quizAnswersInfo = collect( $quizAnswersInfo)->groupBy('questionid');

            // return $quizAnswersInfo;

            return view('global.viewbook.quizcontent.studentquizcontent')
                        ->with('quizInfo',$quizInfo)
                        ->with('headerid',$recordid)
                        ->with('classroomid',$classroomid)
                        ->with('quizQuestions',$quizQuestions);

        }

    public function studentQuizContent($quizid, $clasroomid){



            $chapterquizsched = DB::table('chapterquizsched')
                            ->where('chapterquizid',$quizid)
                            ->where('classroomid',$clasroomid)
                            ->select(
                                'classroomid',
                                'datefrom',
                                'dateto',
                                'timefrom',
                                'timeto',
                                'noofattempts',
                                'status',
                                'createddatetime',
                                'updateddatetime',
                                'id'
                            )
                            ->where('deleted',0)
                            ->first();

            


            // $isAnswered = false;

            $numberOfAttempts =  DB::table('chapterquizrecords')
                                    ->where('submittedby',auth()->user()->id)
                                    ->where('chapterquizid',$quizid)
                                    ->count();
            
            // $checkIfAnswered = DB::table('chapterquizrecords')
            //                     ->where('submittedby',auth()->user()->id)
            //                     ->where('chapterquizid',$quizid)
            //                     ->where('deleted',0)
            //                     ->select('id','submitteddatetime','quizstatus','updateddatetime')
            //                     ->first();

            if($numberOfAttempts == 0){
                $chapterquizsched->btn = "Attempt Quiz";
            }else{
                $chapterquizsched->btn = "Retake Quiz";
            }

            $attemptsLeft = 0;

            if(isset($chapterquizsched->noofattempts)){
                
                $attemptsLeft = $chapterquizsched->noofattempts - $numberOfAttempts;

            }

            // if(isset($checkIfAnswered->id)){
            //     $isAnswered = true;
            // }

            // $quizAnswersInfo = DB::table('chapterquizrecords')
            //                     ->where('submittedby',auth()->user()->id)
            //                     ->where('chapterquizid',$quizid)
            //                     ->where('chapterquizrecords.deleted',0)
            //                     ->join('chapterquizrecordsdetail',function($join){
            //                         $join->on('chapterquizrecords.id','=','chapterquizrecordsdetail.headerid');
            //                         $join->where('chapterquizrecordsdetail.deleted',0);
            //                     })
            //                     ->join('chapterquizquestions',function($join){
            //                         $join->on('chapterquizrecordsdetail.questionid','=','chapterquizquestions.id');
            //                     })
            //                     ->select(
            //                         'choiceid',
            //                         'questionid',
            //                         'question',
            //                         'type',
            //                         'description',
            //                         'chapterquizrecordsdetail.points as studPoints',
            //                         'chapterquizquestions.points'
            //                         )
            //                     ->get();

   
            
            // foreach($quizAnswersInfo as $item){

            //     if($item->type == 1){

            //         $choices = DB::table('chapterquizchoices')
            //                         ->where('id',$item->choiceid)
            //                         ->where('deleted',0)
            //                         ->select('description','id','answer')
            //                         ->first();

            //         if(isset($choices->id)){

            //             $item->description = $choices->description;

            //         }

            //     }

            // }
            



            // $quizAnswersInfo = collect( $quizAnswersInfo)->groupBy('questionid');

            // return $quizAnswersInfo;

            return view('global.viewbook.quizcontent.studentquiz')
                        // ->with('quizInfo',$quizInfo)
                        ->with('chapterquizsched',$chapterquizsched)
                        //  ->with('isAnswered',$isAnswered)
                        //  ->with('quizRecord',$checkIfAnswered)
                        //  ->with('clasroomid',$clasroomid)
                        ->with('attemptsLeft',$attemptsLeft);
                        //  ->with('quizAnswersInfo',$quizAnswersInfo)
                        // ->with('quizQuestions',$quizQuestions);

        }

    public function retakeQuiz($id){

        DB::table('chapterquizrecords')
            ->where('id',$id)
            ->update([
                'deleted'=>1
            ]);
                            
        DB::table('chapterquizrecordsdetail')
            ->where('headerid',$id)
            ->update([
                'deleted'=>1
            ]);

    }

    public function attemptQuiz(Request $request){

        date_default_timezone_set('Asia/Manila');
        $headerid = Db::table('chapterquizrecords')
            ->insertGetId([
                'chapterquizid'         =>  $request->get('quizid'),
                'submittedby'           =>  auth()->user()->id,
                'submitteddatetime'     =>  date('Y-m-d H:i:s'),
                'classroomid'           =>  $request->get('classroomid')
            ]);

    return $headerid;


    }


    public function saveAnswer(Request $request){

        $checkIfexist =  DB::table('chapterquizrecordsdetail')
            ->where('headerid',$request->get('headerId'))
            ->where('questionid',$request->get('question_id'))
            ->count();


        if ($checkIfexist == 0) {
                $data = [
                    'headerid' => $request->get('headerId'),
                    'questionid' => $request->get('question_id'),
                    'typeofquestion' => $request->get('questionType'),
                ];

                if ($request->get('questionType') != 1) {
                    $data['stringanswer'] = $request->get('answer');
                } else {
                    $data['choiceid'] = $request->get('answer');
                }

                DB::table('chapterquizrecordsdetail')->insert($data);

                return 1;
        }else{

                if ($request->get('questionType') != 1) {
                    $data['stringanswer'] = $request->get('answer');
                } else {
                    $data['choiceid'] = $request->get('answer');
                }

                DB::table('chapterquizrecordsdetail')
                ->where('headerid', $request->get('headerId'))
                ->where('questionid',$request->get('question_id'))
                ->update($data);

                return 0;


        }

    }

}
