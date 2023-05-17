<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentBookController extends Controller
{
    public function submitanswers(Request $request)
    {

    
        DB::table('chapterquizrecords')
            ->where('id', $request->get('dataId'))
            ->update([
                'quizstatus'=>1
            ]);

        // if(count($request->except('studentuserid', 'chapterquizid','recordid'))>0)
        // {
        //     foreach($request->except('studentuserid', 'chapterquizid','recordid','roomid','_token') as $answersetkey => $answersetvalue)
        //     {
        //         $getquestioninfo = explode('_', $answersetkey);
        //         $questionid = trim(str_replace('questionid','',$getquestioninfo[1]));
        //         // return $questionid;
        //         if($questionid != 'token'){

        //             $questiontype=$getquestioninfo[2];
        //             // return $questiontype;
        //             if(count($answersetvalue)>0)
        //             {
        //                 foreach($answersetvalue as $ansval)
        //                 {
        //                     if(strtolower($questiontype) == 'multiple')
        //                     {
        //                         DB::table('chapterquizrecordsdetail')
        //                             ->insert([
        //                                 'headerid'      => $headerid,
        //                                 'questionid'    => $questionid,
        //                                 'choiceid'      => $ansval
        //                             ]);
        //                     }else{
        //                         DB::table('chapterquizrecordsdetail')
        //                             ->insert([
        //                                 'headerid'      => $headerid,
        //                                 'questionid'    => $questionid,
        //                                 'description'   => $ansval
        //                             ]);
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        // $quizinfo = Db::table('chapterquiz')
        //     ->where('id',$request->get('chapterquizid'))
        //     ->first();

        // $checkifschedexists = DB::table('chapterquizsched')
        //     ->where('classroomid',$request->get('classroomid'))
        //     ->where('chapterquizid',$request->get('chapterquizid'))
        //     ->where('deleted','0')
        //     ->get();

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

        $isAnswered = false;

            
        $checkIfAnswered = DB::table('chapterquizrecords')
                            ->where('submittedby',auth()->user()->id)
                            ->where('chapterquizid',$quizid)
                            ->where('deleted',0)
                            ->select('id','submitteddatetime','quizstatus','updateddatetime')
                            ->first();

        

        if(isset($checkIfAnswered->id)){
            $isAnswered = true;
        }



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

                    if(isset($answer)){
                        $item->answer = $answer;
                    }else{

                        $item->answer = 0;

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
                    }else{

                        $item->answer = "";

                    }


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


                    foreach ($item->drop as $index => $item) {
                    }


                    
                    foreach($dropquestions as $index => $item){

                        $key = 0;
                        $answercount = DB::table('chapterquizrecordsdetail')
                                        ->where('questionid',$item->id)
                                        ->where('headerid', $recordid)
                                        ->where('deleted',0)
                                        ->count();

                        if($answercount == 1){
                            $item->answer  = DB::table('chapterquizrecordsdetail')
                                        ->where('questionid',$item->id)
                                        ->where('headerid', $recordid)
                                        ->where('deleted',0)
                                        ->value('stringanswer');
                            
                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($item, &$inputCounter, &$key) {
                            $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable bg-primary text-white answer-field" data-question-type="5" data-sortid="'.++$inputCounter.'" data-question-id="'.$item->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$item->id.'" value="'.$item->answer.'" disabled>';
                            return $inputField;
                            }, $item->question);
                            $inputCounter = 0;

                            $item->question = $questionWithInputs;

                        }

                        else if($answercount > 1){

                            $answer = DB::table('chapterquizrecordsdetail')
                                        ->where('questionid',$item->id)
                                        ->where('headerid', $recordid)
                                        ->select('stringanswer')
                                        ->orderby('sortid', 'asc')
                                        ->get();

                            $sort = -1;
                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($item, &$inputCounter, &$key , &$sort , &$answer) {
                            $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable bg-primary text-white answer-field" data-question-type="5" data-sortid="'.++$inputCounter.'" data-question-id="'.$item->id.'" value="'.$answer[++$sort]->stringanswer.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$item->id.'" disabled>';
                            return $inputField;
                            }, $item->question);
                            $inputCounter = 0;
                            

                            $item->answer = $answer;



                            $item->question = $questionWithInputs;

                        }
                        else{

                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($item, &$inputCounter, &$key) {
                            $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable answer-field" data-question-type="5" data-sortid="'.++$inputCounter.'" data-question-id="'.$item->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$item->id.'" disabled>';
                            return $inputField;
                            }, $item->question);
                            $inputCounter = 0;

                            $item->question = $questionWithInputs;

                        }
                                    
                    }





                }



                // $quizAnswersInfo = DB::table('chapterquizrecords')
                //                 ->where('submittedby',auth()->user()->id)
                //                 ->where('chapterquizid',$quizid)
                //                 ->where('chapterquizrecords.deleted',0)
                //                 ->join('chapterquizrecordsdetail',function($join){
                //                     $join->on('chapterquizrecords.id','=','chapterquizrecordsdetail.headerid');
                //                     $join->where('chapterquizrecordsdetail.deleted',0);
                //                 })
                //                 ->join('chapterquizquestions',function($join){
                //                     $join->on('chapterquizrecordsdetail.questionid','=','chapterquizquestions.id');
                //                 })
                //                 ->select(
                //                     'choiceid',
                //                     'questionid',
                //                     'question',
                //                     'type',
                //                     'description',
                //                     'chapterquizrecordsdetail.points as studPoints',
                //                     'chapterquizquestions.points'
                //                     )
                //                 ->get();

            }


            

            

   
            
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
            
            

            if($numberOfAttempts == 0){
                $chapterquizsched->btn = "Attempt Quiz";
            }else{
                $chapterquizsched->btn = "Retake Quiz";
            }

            $attemptsLeft = 0;

            if(isset($chapterquizsched->noofattempts)){
                
                $attemptsLeft = $chapterquizsched->noofattempts - $numberOfAttempts;

            }

            $lastattempt = DB::table('chapterquizrecords')
                                ->where('submittedby',auth()->user()->id)
                                ->where('chapterquizid',$quizid)
                                ->where('deleted',0)
                                ->latest('submitteddatetime')
                                ->value('submitteddatetime');



            $continuequiz = DB::table('chapterquizrecords')
                                ->where('submittedby',auth()->user()->id)
                                ->where('chapterquizid',$quizid)
                                ->where('deleted',0)
                                ->where('quizstatus',0)
                                ->latest('submitteddatetime')
                                ->value('id');
            

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
                        ->with('continuequiz',$continuequiz)
                        //  ->with('isAnswered',$isAnswered)
                        //  ->with('quizRecord',$checkIfAnswered)
                        //  ->with('clasroomid',$clasroomid)
                        ->with('attemptsLeft',$attemptsLeft)
                        ->with('lastattempt',$lastattempt);
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

        if($request->get('id') != NULL) {
            $id = $request->get('id');
        
        return $id;


        }else{

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


    }


    public function saveAnswer(Request $request){

        $checkIfexist =  DB::table('chapterquizrecordsdetail')
            ->where('headerid',$request->get('headerId'))
            ->where('questionid',$request->get('question_id'))
            ->where('sortid', $request->get('sortId'))
            ->count();


        if ($checkIfexist == 0) {
                $data = [
                    'headerid' => $request->get('headerId'),
                    'questionid' => $request->get('question_id'),
                    'typeofquestion' => $request->get('questionType'),
                ];

                if ($request->get('questionType') != 1) {
                    $data['stringanswer'] = $request->get('answer');

                    if($request->get('sortId') != null && $request->get('questionType') == 5 ){

                        $data['sortid'] = $request->get('sortId');

                    }
                } else {
                    $data['choiceid'] = $request->get('answer');
                }

                DB::table('chapterquizrecordsdetail')->insert($data);

                return 1;
        }else{

                if ($request->get('questionType') != 1) {
                    $data['stringanswer'] = $request->get('answer');

                    if($request->get('sortId') != null && $request->get('questionType') == 5 ){

                        $data['sortid'] = $request->get('sortId');

                    }
                } else {
                    $data['choiceid'] = $request->get('answer');
                }

                DB::table('chapterquizrecordsdetail')
                ->where('headerid', $request->get('headerId'))
                ->where('questionid',$request->get('question_id'))
                ->where('sortid', $request->get('sortId'))
                ->update($data);

                return 0;


        }

    }

    public function saveImage(Request $request)
    {

        $headerId = $request->get('headerId');
        $question_id = $request->get('question_id');
        $imageFile = $request->file('answer');

        $checkIfexist =  DB::table('chapterquizrecordsdetail')
            ->where('headerid',$headerId)
            ->where('questionid',$question_id)
            ->count();

        $data = [
            'headerid' => $request->get('headerId'),
            'questionid' => $request->get('question_id'),
            'typeofquestion' => $request->get('questionType'),
        ];


        // Save the image locally
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path('quizzes'), $imageName);

        // Store the image URL path
        $data['picurl'] = 'quizzes/' . $imageName;

        // insert data
        if ($checkIfexist == 0) {

            DB::table('chapterquizrecordsdetail')->insert($data);

            return 1;

        // update data
        } else {

                DB::table('chapterquizrecordsdetail')
                ->where('headerid', $request->get('headerId'))
                ->where('questionid',$request->get('question_id'))
                ->update($data);

                return 0;
        }

    }

}
