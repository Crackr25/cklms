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

    public function studentQuizContent($quizid, $clasroomid){

        $quizInfo = DB::table('chapterquiz')
                        ->where('id',$quizid)
                        ->select('id','title')
                        ->first();

        if(isset($quizInfo->id) > 0){

            $chapterquizsched = DB::table('chapterquizsched')
                            ->where('chapterquizid',$quizid)
                            ->where('classroomid',$clasroomid)
                            ->select(
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

            $quizQuestions = DB::table('chapterquizquestions')
                        ->where('chapterquizquestions.deleted','0')
                        ->where('headerid', $quizInfo->id)
                        ->select(
                            'chapterquizquestions.id',
                            'chapterquizquestions.question',
                            'chapterquizquestions.type'
                        )
                        ->get();

            foreach($quizQuestions as $item){

                if($item->type == 1){

                    $choices = DB::table('chapterquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id','answer')
                                    ->get();

                    $item->choices = $choices;

                }

            }

            $isAnswered = false;

            $numberOfAttempts =  DB::table('chapterquizrecords')
                                    ->where('submittedby',auth()->user()->id)
                                    ->where('chapterquizid',$quizid)
                                    ->count();
            
            $checkIfAnswered = DB::table('chapterquizrecords')
                                ->where('submittedby',auth()->user()->id)
                                ->where('chapterquizid',$quizid)
                                ->where('deleted',0)
                                ->select('id','submitteddatetime','quizstatus','updateddatetime')
                                ->first();

            $attemptsLeft = 0;

            if(isset($chapterquizsched->noofattempts)){

                $attemptsLeft = $chapterquizsched->noofattempts - $numberOfAttempts;

            }

            if(isset($checkIfAnswered->id)){
                $isAnswered = true;
            }

            $quizAnswersInfo = DB::table('chapterquizrecords')
                                ->where('submittedby',auth()->user()->id)
                                ->where('chapterquizid',$quizid)
                                ->where('chapterquizrecords.deleted',0)
                                ->join('chapterquizrecordsdetail',function($join){
                                    $join->on('chapterquizrecords.id','=','chapterquizrecordsdetail.headerid');
                                    $join->where('chapterquizrecordsdetail.deleted',0);
                                })
                                ->join('chapterquizquestions',function($join){
                                    $join->on('chapterquizrecordsdetail.questionid','=','chapterquizquestions.id');
                                })
                                ->select(
                                    'choiceid',
                                    'questionid',
                                    'question',
                                    'type',
                                    'description',
                                    'chapterquizrecordsdetail.points as studPoints',
                                    'chapterquizquestions.points'
                                    )
                                ->get();

   
            
            foreach($quizAnswersInfo as $item){

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
            

      

            $quizAnswersInfo = collect( $quizAnswersInfo)->groupBy('questionid');

            // return $quizAnswersInfo;

            return view('global.viewbook.quizcontent.studentquizcontent')
                         ->with('quizInfo',$quizInfo)
                         ->with('chapterquizsched',$chapterquizsched)
                         ->with('isAnswered',$isAnswered)
                         ->with('quizRecord',$checkIfAnswered)
                         ->with('clasroomid',$clasroomid)
                         ->with('attemptsLeft',$attemptsLeft)
                         ->with('quizAnswersInfo',$quizAnswersInfo)
                         ->with('quizQuestions',$quizQuestions);

        }
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

}
