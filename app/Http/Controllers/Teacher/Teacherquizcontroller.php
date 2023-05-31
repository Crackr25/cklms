<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;
use File;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use BigBlueButton\Parameters\CreateMeetingParameters;
class Teacherquizcontroller extends Controller
{
    public function index(Request $request){

        if($request->get('blade') == 'blade' && $request->has('blade')){

            return view('teacher.teacherquiz.teacherquizindex');

        }else if($request->get('table') == 'table' && $request->has('table')){

            $data = Db::table('teacherquiz')
                ->select(
                    'teacherquiz.id',
                    'teacherquiz.title',
                    'teacherquiz.description',
                    'teacherquiz.createddatetime'
                )
                ->orderBy('teacherquiz.id')
                ->where('teacherquiz.deleted','0')
                ->where('teacherquiz.createdby',auth()->user()->id)
                ->get();



            // dd($quiz);
            return view('teacher.teacherquiz.include.quiztable')
            ->with('data',$data);
        


        
        }

    }


    public function create(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        $id = DB::table('teacherquiz')->insertGetId([
            'title' => $request->get('quizname'),
            'createddatetime' => date('Y-m-d H:i:s'),
            'createdby' => auth()->user()->id,
        ]);

        return $id;

    }


    public function classroomSelect(Request $request)
    {
        $page = $request->get('page')*10;


        $createdby = DB::table('teachers')
                    ->where('userid', auth()->user()->id)
                    ->first()
                    ->id;

        $classrooms = Db::table('classrooms')
            ->select(
                'classrooms.id as id',
                'classrooms.classroomname as text'
            )
            ->orderBy('classrooms.classroomname')
            ->join('teachers','classrooms.createdby','=','teachers.id')
            ->where('classrooms.deleted','0')
            ->where('createdby',$createdby)
            ->take(10)
            ->skip($page)
            ->get();


        $classrooms_count = count($classrooms);



            return @json_encode((object)[
                    "results"=>$classrooms,
                    "pagination"=>(object)[
                            "more"=>$classrooms_count > ($page)  ? true :false
                    ],
                    "count_filtered"=>$classrooms_count
                ]);
    }


    public function studentSelect(Request $request)
    {
        $page = $request->get('page')*10;


        $classroomid = $request->get('classroomid');
    
        $students = DB::table('classroomstudents')
            ->join('users', 'classroomstudents.studentid', '=', 'users.id')
            ->select(
                'classroomstudents.id as id',
                'users.name as text'
            )
            ->where('classroomstudents.classroomid', $classroomid)
            ->where('classroomstudents.deleted', 0)
            ->get();


        $students_count = count($students);



            return @json_encode((object)[
                    "results"=>$students,
                    "pagination"=>(object)[
                            "more"=>$students_count > ($page)  ? true :false
                    ],
                    "count_filtered"=>$students_count
                ]);
    }


    public function createquiz($id, Request $request)
    {


            $teacherquizinfo = DB::table('teacherquiz')
                ->where('id', $id)
                ->first();

            $quizquestions = DB::table('teacherquizquestions')
                ->where('quizid', $id)
                ->where('typeofquiz', '!=', null)
                ->where('deleted', 0)
                ->get();



            if($teacherquizinfo->title == null || $teacherquizinfo->title == ""){
                $teacherquizinfo->title = "Untitled Quiz";
            }

            if($teacherquizinfo->description == null || $teacherquizinfo->description == ""){
                $teacherquizinfo->description = "";
            }



            return view('teacher.teacherquiz.teacherquiz.quizindex')
                ->with('id',$id)
                ->with('quizquestions',$quizquestions)
                ->with('quiz',$teacherquizinfo);
    }


    public function chaptertestavailability(Request $request)
    {

        $allowed_students = $request->get('allowed_students');
        $randomize = $request->get('randomize');
        
        $checkifexists = DB::table('teacherquizsched')
            ->where('teacherquizid', $request->get('quizId'))
            ->where('classroomid', $request->get('classroomId'))
            ->where('deleted','0')
            ->get();

        $status = null;
        $quizschedid = null;

        if(count($checkifexists) == 0) {
            $createdsched = DB::table('teacherquizsched')
                ->insertGetId([
                    'teacherquizid'         => $request->get('quizId'),
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
            DB::table('teacherquizsched')
                ->where('id', $checkifexists[0]->id)
                ->update([
                    'teacherquizid'         => $request->get('quizId'),
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
                $countStudent = DB::table('teacher_allowed_student_quiz')
                    ->where('studentid', $student_id)
                    ->where('teacherquizschedid', $quizschedid)
                    ->where('deleted', 0)
                    ->get();

            
                // only add new entry if it does not exists
                if (count($countStudent) == 0) {
                    DB::table('allowed_student_quiz')
                        ->insert([
                            'teacherquizschedid'    => $quizschedid,
                            'studentid'             => $student_id,
                            'createdby'             => auth()->user()->id,
                            'createddatetime'       => \Carbon\Carbon::now('Asia/Manila'),
                        ]);
                }
            }
        }

        return $status;

    }

    public function viewResponse(Request $request)
    {

        return view('teacher.teacherquiz.teacherquiz.quizresponse');
    }


    public function getActiveQuiz(Request $request)
    {
        $quiz = DB::table('teacherquizsched')
            ->where('teacherquizsched.deleted', 0)
            ->where('teacherquizsched.createdby', auth()->user()->id)
            ->join('teacherquiz',function($join){
                $join->on('teacherquizsched.teacherquizid','=','teacherquiz.id');
            })
            ->select(
                                'teacherquiz.title',
                                'teacherquiz.id',
                                'datefrom',
                                'timefrom',
                                'dateto',
                                'timeto',
                                'noofattempts',
                                'randomize',
                                'teacherquizsched.createddatetime'
                    )
            ->get();

        foreach($quiz as $item){
            $item->search = $item->datefrom.' '.$item->timefrom.', '.$item->dateto.' '.$item->timeto.' '.$item->title;

            $quizsched = DB::table('teacherquizsched')
                ->where('teacherquizsched.createdby', auth()->user()->id)
                ->where('teacherquizid',$item->id)
                ->get();

            if(count($quizsched) != 0){

                $item->isactivated = 1; 

                $allowed_students = DB::table('teacher_allowed_student_quiz')
                    ->join('users', 'teacher_allowed_student_quiz.studentid', '=', 'users.id')
                    ->where('teacher_allowed_student_quiz.teacherquizschedid', $quizsched[0]->id)
                    ->where('teacher_allowed_student_quiz.deleted', 0)
                    ->select(
                        'users.id',
                        'teacher_allowed_student_quiz.teacherquizschedid',
                        'users.name')
                    ->get();

                if(count($allowed_students) == 0) {
                    $item->allowed_students = null;
                } else {
                    $item->allowed_students = $allowed_students;
                }

            } else {
                $item->allowed_students = null;
                $item->isactivated = 0; 
            }

        }
        
        return $quiz;
    }

    public function saveDescription(Request $request)
    {


        DB::table('teacherquiz')
            ->where('id', $request->get('quizId'))
            ->update([
                'description'   => $request->get('description')
            ]);

        return 1;
    }


    public function addQuestion(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        $id = DB::table('teacherquizquestions')->insertGetId([
            'quizid' => $request->get('quizid'),
            'createddatetime' => date('Y-m-d H:i:s'),
        ]);

        return $id;
    }


    public function createQuestion(Request $request)
    {


            date_default_timezone_set('Asia/Manila');
            DB::table('teacherquizquestions')
                ->where('id', $request->get('id'))
                ->update([
                    'question'         => $request->get('question'),
                    'typeofquiz'   => $request->get('typeofquiz'),
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);

            return 1;

    }

    public function delquestion(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'                 => 1,
                'updateddatetime'         => date('Y-m-d H:i:s')
                    ]);

        return 1;
    }


    public function createChoices(Request $request)
    {

        
        date_default_timezone_set('Asia/Manila');
        $choice = DB::table('teacherquizchoices')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->where('deleted', 0)
            ->count();

        if($choice == 0){
        DB::table('teacherquizchoices')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'description'       =>  $request->get('description'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

                }else{

                    DB::table('teacherquizchoices')
                        ->where('questionid', $request->get('questionid'))
                        ->where('sortid', $request->get('sortid'))
                        ->update([
                            'questionid'             =>  $request->get('questionid'),
                            'description'       =>  $request->get('description'),
                            'updatedatetime'   => date('Y-m-d H:i:s')
                        ]);

                }
        

            return 1;

    }


    public function delChoices(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        DB::table('teacherquizchoices')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'         => 1,
                'deleteddatetime' => date('Y-m-d H:i:s')
                    ]);

        return 1;
    }


    public function getquestion(Request $request)
    {
        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

        $question->choices = DB::table('teacherquizchoices')
        ->where('questionid', $question->id)
        ->where('deleted', 0)
        ->select('id', 'questionid' , 'description')
        ->orderBy('sortid')
        ->get();

        return response()->json($question);
        
    }

    public function returneditquiz(Request $request)

    {


    $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

    $question->choices = DB::table('teacherquizchoices')
    ->where('questionid', $question->id)
    ->where('deleted', 0)
    ->select('id', 'questionid' , 'description' , 'answer')
    ->orderBy('sortid')
    ->get();


    return response()->json($question);
    
        
    }


    public function setAnswerKey(Request $request)
    {

        if($request->get('questiontype') == 1){
                DB::table('teacherquizchoices')
                        ->where('questionid', $request->get('question_id'))
                        ->where('answer', 1)
                        ->update([
                            'answer'   => '0'
                        ]);

                
                DB::table('teacherquizchoices')
                        ->where('id', $request->get('answer'))
                        ->where('questionid', $request->get('question_id'))
                        ->update([
                            'answer'   => '1'
                        ]);

                return 1;
                    }
            else if($request->get('questiontype') == 7){

                        $checkifexist =  DB::table('teacher_quiz_fill_answer')
                        ->where('headerid', $request->get('question_id'))
                        ->where('sortid', $request->get('sortid'))
                        ->count();

                        if($checkifexist > 0){

                            DB::table('teacher_quiz_fill_answer')
                            ->where('headerid', $request->get('question_id'))
                            ->where('sortid', $request->get('sortid'))
                            ->update([
                                'answer'   => $request->get('answer')
                            ]);

                                return 0;


                        }else{

                            DB::table('teacher_quiz_fill_answer')
                            ->insert([
                                'answer'   => $request->get('answer'),
                                'headerid'   => $request->get('question_id'),
                                'sortid'   => $request->get('sortid')
                            ]);

                                return 5;

                        }  

            }else if($request->get('questiontype') == 8){

                        $checkifexist =  DB::table('teacher_quiz_enum_answer')
                        ->where('headerid', $request->get('question_id'))
                        ->where('sortid', $request->get('sortid'))
                        ->where('deleted', 0)
                        ->count();

                        if($checkifexist > 0){

                            DB::table('teacher_quiz_enum_answer')
                            ->where('headerid', $request->get('question_id'))
                            ->where('sortid', $request->get('sortid'))
                            ->update([
                                'answer'   => $request->get('answer')
                            ]);

                                return 0;


                        }else{

                            DB::table('teacher_quiz_enum_answer')
                            ->insert([
                                'answer'   => $request->get('answer'),
                                'headerid'   => $request->get('question_id'),
                                'sortid'   => $request->get('sortid')
                            ]);

                                return 5;

                        }  

            }else if($request->get('questiontype') == 16){


                if($request->get('answer') == 1){
                    DB::table('teacherquizquestions')
                    ->where('id', $request->get('question_id'))
                    ->update([
                        'ordered'   => 1
                    ]);

                    return 1;
                }else{
                    DB::table('teacherquizquestions')
                    ->where('id', $request->get('question_id'))
                    ->update([
                        'ordered'   => 0
                    ]);

                    return 0;

                }

            }
        
        
    }


    public function setPoints(Request $request)

    {
        DB::table('teacherquizquestions')
            ->where('id', $request->get('dataid'))
            ->update([
                'points'   => $request->get('points')
            ]);

    
        
    }

    public function setGuideanswer(Request $request)

    {
        DB::table('teacherquizquestions')
            ->where('id', $request->get('dataid'))
            ->update([
                'guideanswer'   => $request->get('answer')
            ]);

    
        
    }


    public function createquestionitem(Request $request)
    {

    
            DB::table('teacherquizquestions')
                ->where('id', $request->get('id'))
                ->update([
                    'question'         => $request->get('question'),
                    'typeofquiz'   => $request->get('typeofquiz'),
                    'item'   => $request->get('item')
                ]);
            
            DB::table('teacherquizquestions')
                ->where('id', $request->get('questionid'))
                ->update([
                    'points'             =>  $request->get('item'),
                ]);
            
            DB::table('teacher_quiz_enum_answer')
                ->where('headerid', $request->get('id'))
                ->where('sortid', '>',$request->get('item'))
                ->update([
                    'deleted'         => 1,

                ]);
            
                

            return 1;

    }


    public function getEnum(Request $request)
    {
        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question', 'item')
            ->where('deleted', 0)
            ->first();

        $question->answer = DB::table('teacher_quiz_enum_answer')
            ->where('headerid', $question->id)
            ->select('answer')
            ->where('deleted', 0)
            ->orderBy('sortid')
            ->get();

        return response()->json($question);
        
    }


    public function returnEditenum(Request $request)

    {


        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question' , 'ordered' , 'item')
            ->where('deleted', 0)
            ->first();


            $answer = DB::table('teacher_quiz_enum_answer')
                ->where('headerid', $question->id)
                ->where('deleted', 0)
                ->orderBy('sortid')
                ->pluck('answer');

            $answerString = implode(',', $answer->toArray());

            $question->answer = $answerString;


    return response()->json($question);
    
        
    }

    public function clearEnum(Request $request)

    {


        DB::table('teacher_quiz_enum_answer')
                ->where('headerid', $request->get('parentId'))
                ->update([
                    'deleted'         => 1,

                ]);


    return 1;
    
        
    }


    public function createFillquestion(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $checkifexist = DB::table('teacher_quiz_fill_question')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->count();

        if($checkifexist == 0){
        DB::table('teacher_quiz_fill_question')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'question'       =>  $request->get('description'),
                ]);
        
            DB::table('teacherquizquestions')
                ->where('id', $request->get('questionid'))
                ->update([
                    'points'             =>  $request->get('sortid'),
                ]);

        }else{

            DB::table('teacher_quiz_fill_question')
                ->where('questionid', $request->get('questionid'))
                ->where('sortid', $request->get('sortid'))
                ->update([
                    'question'       =>  $request->get('description'),
                ]);

        }
        

        return 1;
    }


    public function getFillQuestion(Request $request)
    {
        
        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

        $question->fill = DB::table('teacher_quiz_fill_question')
        ->where('questionid', $question->id)
        ->select('id', 'questionid' , 'question', 'sortid')
        ->orderBy('sortid')
        ->get();

        $key= 0;

        $counter = 0;

        $inputCounter = 0;
        foreach ($question->fill as $index => $item) {
            // Replace all occurrences of ~input with input fields that have unique IDs
            $key = 0;
            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($item, &$inputCounter, &$key) {
            $inputField = '<input class="d-inline form-control q-input answer-field" data-type="7" data-sortid="'.++$inputCounter.'" data-question-id="'.$item->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$item->id.'">';
            return $inputField;
            }, $item->question);
            $inputCounter = 0;

            $item->question = $questionWithInputs;
        }




        return response()->json($question);
        
    }


    public function returnEditfill(Request $request)

    {
        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();


        $question->fill = DB::table('teacher_quiz_fill_question')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->get();

        foreach($question->fill as $item){

            $answer = DB::table('teacher_quiz_fill_answer')
                ->where('headerid', $item->id)
                ->orderBy('sortid')
                ->pluck('answer');

            $answerString = implode(',', $answer->toArray());

            $item->answer = $answerString;

        }


    return response()->json($question);
    
        
    }


    public function createdragoption(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $choice = DB::table('teacher_quiz_drag_option')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->count();

        if($choice == 0){
        DB::table('teacher_quiz_drag_option')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'description'       =>  $request->get('description'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

        }else{

            DB::table('teacher_quiz_drag_option')
                ->where('questionid', $request->get('questionid'))
                ->where('sortid', $request->get('sortid'))
                ->update([
                    'questionid'             =>  $request->get('questionid'),
                    'description'       =>  $request->get('description'),
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);

        }
        

        return 1;
    }


    public function createdropquestion(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $choice = DB::table('teacher_quiz_drop_question')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->count();

        if($choice == 0){
        DB::table('teacher_quiz_drop_question')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'question'       =>  $request->get('description'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

        DB::table('teacherquizquestions')
                ->where('id', $request->get('questionid'))
                ->update([
                    'points'             =>  $request->get('sortid'),
                ]);
        

        }else{

            DB::table('teacher_quiz_drop_question')
                ->where('questionid', $request->get('questionid'))
                ->where('sortid', $request->get('sortid'))
                ->update([
                    'questionid'             =>  $request->get('questionid'),
                    'question'       =>  $request->get('description'),
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);

        }
        

        return 1;
    }


    public function getDropQuestion(Request $request)

    {
        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

        $question->drag = DB::table('teacher_quiz_drag_option')
        ->where('questionid', $question->id)
        ->select('id', 'description')
        ->orderBy('sortid')
        ->get();

        $question->drop = DB::table('teacher_quiz_drop_question')
        ->where('questionid', $question->id)
        ->select('id', 'questionid' , 'question', 'sortid')
        ->orderBy('sortid')
        ->get();

        $key= 0;

        $counter = 0;

        $inputCounter = 0;
        foreach ($question->drop as $index => $item) {
            // Replace all occurrences of ~input with input fields that have unique IDs
            $key = 0;
            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($item, &$inputCounter, &$key) {
            $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable" data-sortid="'.++$inputCounter.'" data-question-id="'.$item->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$item->id.'" disabled>';
            return $inputField;
            }, $item->question);
            $inputCounter = 0;

            $item->question = $questionWithInputs;
        }




        return response()->json($question);
        
    }


    public function setAnswerdrop(Request $request)
    {
        

        $checkifexist =  DB::table('teacher_quiz_drop_answer')
            ->where('headerid', $request->get('question_id'))
            ->where('sortid', $request->get('sortId'))
            ->count();

        if($checkifexist == 1){

            DB::table('teacher_quiz_drop_answer')
            ->where('headerid', $request->get('question_id'))
            ->where('sortid', $request->get('sortId'))
            ->update([
                'answer'   => $request->get('answer')
            ]);

                return 0;


        }else{

            DB::table('teacher_quiz_drop_answer')
            ->insert([
                'answer'   => $request->get('answer'),
                'headerid'   => $request->get('question_id'),
                'sortid'   => $request->get('sortId')
            ]);

                return 1;

        }
        
    }


    public function returnEditdrag(Request $request)

    {
        $question = DB::table('teacherquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();


        $question->drag = DB::table('teacher_quiz_drag_option')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->get();
                                                            
        $question->drop = DB::table('teacher_quiz_drop_question')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->get();

        foreach($question->drop as $item){

        $answer = DB::table('teacher_quiz_drop_answer')
            ->where('headerid', $item->id)
            ->orderBy('sortid')
            ->pluck('answer');

        $answerString = implode(',', $answer->toArray());
        $item->answer = $answerString;

        }


    return response()->json($question);
    
        
    }



}

    
