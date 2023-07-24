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


    public function delete(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        DB::table('teacherquiz')
                ->where('id',$request->get('id'))
                ->update([
                    'deleted'         => 1,
                    'deleteddatetime'       => \Carbon\Carbon::now('Asia/Manila')
                ]);
    }


    public function classroomSelect(Request $request)
    {
        $page = $request->get('page')*10;
        $search = $request->get('search');


        $createdby = DB::table('teachers')
                    ->where('userid', auth()->user()->id)
                    ->first()
                    ->id;

        $query = Db::table('classrooms')
            ->select(
                'classrooms.id as id',
                'classrooms.classroomname as text'
            )
            ->orderBy('classrooms.classroomname')
            ->join('teachers','classrooms.createdby','=','teachers.id')
            ->where('classrooms.deleted','0')
            ->where('createdby',$createdby);
        if ($search) {

            $query->where('classrooms.classroomname', 'LIKE', '%' . $search . '%');

        }
        
        $classrooms =$query->take(10)
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
        $page = $request->get('page') * 10;
        $classroomId = $request->get('classroomid');
        $search = $request->get('search');

        $query = DB::table('classroomstudents')
            ->join('students', 'classroomstudents.studentid', '=', 'students.id')
            ->select(
                'classroomstudents.id as id',
                DB::raw("CONCAT(students.firstname, ' ', students.lastname) as text")
            )
            ->where('classroomstudents.classroomid', $classroomId)
            ->where('classroomstudents.deleted', 0);



        if ($search) {
            $query->where('users.name', 'LIKE', '%' . $search . '%');
        }

        $students = $query->take(10)
            ->skip($page)
            ->get();

        $studentsCount = count($students);

        return response()->json([
            "results" => $students,
            "pagination" => [
                "more" => $studentsCount > ($page) ? true : false
            ],
            "count_filtered" => $studentsCount
        ]);
    }

    public function quizSelect(Request $request)
    {
        $page = $request->get('page')*10;


        $quiz = Db::table('teacherquiz')
                ->select(
                    'teacherquiz.id as id',
                    'teacherquiz.title as text'
                )
                ->orderBy('teacherquiz.id')
                ->where('teacherquiz.deleted','0')
                ->where('teacherquiz.createdby',auth()->user()->id)
                ->take(10)
                ->skip($page)
                ->get();


        $quiz_count = count($quiz);

            return @json_encode((object)[
                    "results"=>$quiz,
                    "pagination"=>(object)[
                            "more"=>$quiz_count > ($page)  ? true :false
                    ],
                    "count_filtered"=>$quiz_count
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
            ->where('teacherquizsched.createdby', auth()->user()->id);
            if($request->get('classroom') != null && $request->get('classroom') != ''){

                $quiz = $quiz->where('teacherquizsched.classroomid', $request->get('classroom'));

            }

            if($request->get('quiz') != null && $request->get('quiz') != ''){

                $quiz = $quiz->where('teacherquizsched.teacherquizid', $request->get('quiz'));

            }

            $quiz = $quiz->join('teacherquiz', function ($join) {
                $join->on('teacherquizsched.teacherquizid', '=', 'teacherquiz.id');
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


    public function quizresponses(Request $request)
        {
            $studentid = $request->get('student');
            $teacherquizid = $request->get('quizID');
            $classroomid = $request->get('classroom');

            $responses = DB::table('teacherquizrecords')
                ->join('users', 'users.id', '=', 'teacherquizrecords.submittedby');

            if($classroomid != null && $classroomid != ''){

                $responses = $responses->where('teacherquizrecords.classroomid', $classroomid);

            }

            if($studentid != null && $studentid != ''){

                $responses = $responses->where('teacherquizrecords.submittedby', $studentid);

            }

            
            $responses = $responses->where('teacherquizrecords.teacherquizid', $teacherquizid)
                ->where('teacherquizrecords.deleted', '0')
                ->where('teacherquizrecords.quizstatus', '1')
                ->select('teacherquizrecords.id', 'teacherquizrecords.classroomid', 'teacherquizrecords.teacherquizid', 'teacherquizrecords.submittedby', 'users.name', 'teacherquizrecords.totalscore', 'teacherquizrecords.submitteddatetime', 'teacherquizrecords.deleted', 'teacherquizrecords.quizstatus', 'teacherquizrecords.deletedby', 'teacherquizrecords.updatedby', 'teacherquizrecords.updateddatetime')
                ->get();

            $maxpoints = DB::table('teacherquizquestions')
                ->where('quizid', $teacherquizid)
                ->where('deleted', 0)
                ->where('typeofquiz', '!=', 4)
                ->sum('points');

            foreach ($responses as $response) {
                $response->maxpoints = $maxpoints;
            }

            return $responses;
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

    public function saveTitle(Request $request)
    {


        DB::table('teacherquiz')
            ->where('id', $request->get('quizId'))
            ->update([
                'Title'   => $request->get('title')
            ]);

        return 1;
    }



    public function addQuestion(Request $request)
    {


        date_default_timezone_set('Asia/Manila');


        $count = DB::table('teacherquizquestions')
            ->where('quizid', $request->get('quizid'))
            ->where('question', null)
            ->where('typeofquiz', null)
            ->where('deleted', 0)
            ->first();
        

        if(isset($count)){

            DB::table('teacherquizquestions')
                ->where('id', $count->id)
                ->update([
                    'quizid' => $request->get('quizid'),
                    'createddatetime' => date('Y-m-d H:i:s'),
                ]);

            return $count->id;



            


        }else{

            $id = DB::table('teacherquizquestions')->insertGetId([
                        'quizid' => $request->get('quizid'),
                        'createddatetime' => date('Y-m-d H:i:s'),
                    ]);

        return $id;


        }
        

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
                    'updateddatetime'   => date('Y-m-d H:i:s'),
                    'points'   => 1
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
                ->where('id', $request->get('id'))
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

                return 0;

                    



        }else{


            if($request->get('description') != null || $request->get('description') != "" ){



                DB::table('teacher_quiz_fill_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'question'       =>  $request->get('description'),
                    ]);

                return 0;
                
            }else{



                DB::table('teacher_quiz_fill_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'deleted'             =>  1,
                    ]);


            return 1;

            }
        }        

        

    }

    public function setFillPoints(Request $request)
    {


        DB::table('teacherquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->update([
                        'points'   =>  $request->get('total'),
                    ]);
        
        $return = $request->get('total');

        return $return; 
        


        
    }

    public function setDragPoints(Request $request)
    {


        DB::table('teacherquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->update([
                        'points'   =>  $request->get('total'),
                    ]);
        
        
        


        
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
        ->where('deleted', 0)
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
        
            if($request->get('description') != null || $request->get('description') != "" ){
                DB::table('teacher_quiz_drag_option')
                    ->insert([
                            'sortid'            =>  $request->get('sortid'),
                            'questionid'        =>  $request->get('questionid'),
                            'description'       =>  $request->get('description'),
                            'createddatetime'   => date('Y-m-d H:i:s')
                        ]);
            }

        }else{

            if($request->get('description') != null || $request->get('description') != "" ){

                DB::table('teacher_quiz_drag_option')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'questionid'             =>  $request->get('questionid'),
                        'description'       =>  $request->get('description'),
                        'updateddatetime'   => date('Y-m-d H:i:s')
                ]);
            }else{

                DB::table('teacher_quiz_drag_option')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'deleted'  =>  1
                ]);
                
            }

        }
        

        return 1;
    }


    public function createdropquestion(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $choice = DB::table('teacher_quiz_drop_question')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->where('deleted', 0)
            ->count();

        

        if($choice == 0){



            if($request->get('description') != null || $request->get('description') != "" ){

        

                DB::table('teacher_quiz_drop_question')
                    ->insert([
                            'sortid'            =>  $request->get('sortid'),
                            'questionid'        =>  $request->get('questionid'),
                            'question'       =>  $request->get('description'),
                            'createddatetime'   => date('Y-m-d H:i:s')
                        ]);

    

                }
                

        }else{

            if($request->get('description') != null || $request->get('description') != "" ){




                DB::table('teacher_quiz_drop_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'questionid'             =>  $request->get('questionid'),
                        'question'       =>  $request->get('description'),
                        'updateddatetime'   => date('Y-m-d H:i:s')
                    ]);


                

            }else{

                

                DB::table('teacher_quiz_drop_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'deleted'             =>  1,
                    ]);




            }

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
        ->where('deleted', 0)
        ->select('id', 'description')
        ->orderBy('sortid')
        ->get();

        $question->drop = DB::table('teacher_quiz_drop_question')
        ->where('questionid', $question->id)
        ->where('deleted', 0)
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
            ->where('deleted', 0)
            ->get();
                                                            
        $question->drop = DB::table('teacher_quiz_drop_question')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->where('deleted', 0)
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


    public function viewquizresponse($classroomId, $quizId, $recordId, Request $request)
    {

        $recordid = $recordId;
        $quizid = $quizId;
        $classroomid = $classroomId;

        $studinfo = DB::table('teacherquizrecords')
            ->where('id',$recordId)
            ->value('studname');

        $quizInfo = DB::table('teacherquiz')
                        ->where('id',$quizid)
                        ->select('id','title', 'description' )
                        ->first();



        $quizQuestions = DB::table('teacherquizquestions')
                    ->where('teacherquizquestions.deleted','0')
                    ->where('quizid', $quizInfo->id)
                    ->where('typeofquiz', '!=', null)
                    ->select(
                        'teacherquizquestions.id',
                        'teacherquizquestions.question',
                        'teacherquizquestions.typeofquiz',
                        'teacherquizquestions.item',
                        'teacherquizquestions.points',
                        'teacherquizquestions.ordered'
                    )
                    ->get();

        $isAnswered = false;




            foreach($quizQuestions as $item){

                if($item->typeofquiz == 1){

                    $choices = DB::table('teacherquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id','answer', 'sortid')
                                    ->orderBy('sortid')
                                    ->get();

                    $item->choices = $choices;

                    $answer = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('choiceid');

                    $check = DB::table('teacherquizchoices')
                                    ->where('questionid',$item->id)
                                    ->where('id', $answer)
                                    ->where('deleted',0)
                                    ->value('answer');

                    if(isset($answer)){
                        $item->answer = $answer;

                        if($check == 1){


                            $item->check = 1;

                            $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');

                            //update points value
                            DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('id', $teacherdetailsid)
                                    ->where('deleted', 0)
                                    ->update([
                                        'points' => 1


                                    ]);
                                    



                        }else{



                            $item->check = 0;


                        }
                        
                    }else{

                        $item->answer = 0;

                    }


                }

                if($item->typeofquiz == 2 || $item->typeofquiz == 3 ){

                    $answer = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('stringanswer');


                    if(isset($answer)){

                        $item->answer = $answer;

                        $item->detailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');

                        $item->pointsgiven = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('points');





                    }else{

                        $item->answer = "";
                        $item->detailsid = 0;
                        $item->pointsgiven = 0;

                    }

                    
                }

                if($item->typeofquiz == 7 ){


                    $fillquestions = DB::table('teacher_quiz_fill_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();

                    $item->fill = $fillquestions;

                    $score = 0;


                    foreach ($item->fill as $index => $fillItem) {
                        $key = 0;
                        $answercount = DB::table('teacherquizrecordsdetail')
                            ->where('questionid', $fillItem->id)
                            ->where('headerid', $recordid)
                            ->where('deleted', 0)
                            ->count();

                        if ($answercount == 1) {
                            $fillItem->answer  = DB::table('teacherquizrecordsdetail')
                                ->where('questionid', $fillItem->id)
                                ->where('headerid', $recordid)
                                ->where('deleted', 0)
                                ->value('stringanswer');


                            $checkanswer = DB::table('teacher_quiz_fill_answer')
                                    ->where('headerid',$fillItem->id)
                                    ->where('sortid', 1)
                                    ->value('answer');

                            $check='';

                            if($checkanswer == $fillItem->answer){

                                $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$fillItem->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', 1)
                                    ->where('deleted',0)
                                    ->value('id');

                                //update points value
                                DB::table('teacherquizrecordsdetail')

                                ->where('id', $teacherdetailsid)
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

                            $answer = DB::table('teacherquizrecordsdetail')
                                ->where('questionid', $fillItem->id)
                                ->where('headerid', $recordid)
                                ->select('stringanswer', 'sortid')
                                ->orderBy('sortid', 'asc')
                                ->get();

                            foreach($answer as $ans){

                                $checkanswer = DB::table('teacher_quiz_drop_answer')
                                    ->where('headerid',$fillItem->id)
                                    ->where('sortid', $ans->sortid)
                                    ->value('answer');

                                if($checkanswer == $ans->stringanswer){

                                    $score+= 1;

                                    $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$fillItem->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $ans->sortid)
                                    ->where('deleted',0)
                                    ->value('id');

                                    //update points value
                                    DB::table('teacherquizrecordsdetail')
                                    ->where('id', $teacherdetailsid)
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

                    $answer = DB::table('teacherquizrecordsdetail')
                        ->where('questionid',$item->id)
                        ->where('headerid', $recordid)
                        ->where('deleted',0)
                        ->value('picurl');

                    if(isset($answer)){
                        $item->picurl = $rootDomain.'/'.$answer;

                        $item->detailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('id');

                        $item->pointsgiven = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('deleted',0)
                                    ->value('points');
                    }else{
                        $item->picurl = "";
                        $item->detailsid = 0;
                        $item->pointsgiven = 0;
                    }
                }


                if($item->typeofquiz == 8){
                

                    $numberOfTimes = $item->item;


                    $newArray = []; // Declare an empty array

                    for ($i = 0; $i < $numberOfTimes; $i++) {

                        $answer  = DB::table('teacherquizrecordsdetail')
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
                            $countval = DB::table('teacher_quiz_enum_answer')
                            ->where('answer', $new)
                            ->where('headerid', $item->id)
                            ->count();

                            if($countval > 0){
                                $answerArray[] = 1;
                                $score+=1;

                                $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $key + 1)
                                    ->where('deleted',0)
                                    ->value('id');

                                    //update points value
                                    DB::table('teacherquizrecordsdetail')

                                    ->where('id', $teacherdetailsid)
                                    ->where('deleted', 0)
                                    ->update([
                                        'points' => 1


                                    ]);
                            }else{
                                $answerArray[] = 0;
                            }
                        }else{

                            $countval = DB::table('teacher_quiz_enum_answer')
                            ->where('answer', $new)
                            ->where('headerid', $item->id)
                            ->where('sortid', $key + 1)
                            ->count();

                            if($countval > 0){
                                $answerArray[] = 1;
                                $score+=1;

                                $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$item->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $key)
                                    ->where('deleted',0)
                                    ->value('id');

                                //update points value
                                DB::table('teacherquizrecordsdetail')
                                ->where('id', $teacherdetailsid)
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

                    $dragoption = DB::table('teacher_quiz_drag_option')
                                    ->where('questionid',$item->id)
                                    ->where('deleted',0)
                                    ->select('description','id')
                                    ->get();

                    $item->drag = $dragoption;

                    $dropquestions = DB::table('teacher_quiz_drop_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();

                    $item->drop = $dropquestions;


                    $score = 0;

                    

                    
                    foreach($dropquestions as $index => $drop) {
                        $key = 0;
                        $answercount = DB::table('teacherquizrecordsdetail')
                            ->where('questionid', $drop->id)
                            ->where('headerid', $recordid)
                            ->where('deleted', 0)
                            ->count();


                        //Check the answer if 1 drop question have only 1 blanks question
                        if ($answercount == 1) {
                            $drop->answer = DB::table('teacherquizrecordsdetail')
                                ->where('questionid', $drop->id)
                                ->where('headerid', $recordid)
                                ->where('deleted', 0)
                                ->value('stringanswer');

                            $checkanswer = DB::table('teacher_quiz_drop_answer')
                                ->where('headerid', $drop->id)
                                ->where('sortid', 1)
                                ->value('answer');

                            if ($checkanswer == $drop->answer) {



                                    $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$drop->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', 1)
                                    ->where('deleted',0)
                                    ->value('id');

                                    //update points value
                                    DB::table('teacherquizrecordsdetail')
                                    ->where('id', $teacherdetailsid)
                                    ->where('sortid',1)
                                    ->where('deleted', 0)
                                    ->update([
                                        'points' => 1


                                    ]);


                                $score += 1;
                                $check = '<span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>';
                            
                            } else {
                                $check = '<span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>';
                            }
                            

                            //Set up the drop question for teacher view
                            $questionWithInputs = preg_replace_callback('/~input/', function($matches) use ($drop, &$inputCounter, &$key, &$check) {
                                $inputField = '<input class="d-inline form-control q-input drop-option q-input ui-droppable bg-primary text-white answer-field" data-question-type="5" data-sortid="'.(++$inputCounter).'" data-question-id="'.$drop->id.'" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-'.$drop->id.'" value="'.$drop->answer.'" disabled>'.$check;
                                return $inputField;
                            }, $drop->question);
                            $inputCounter = 0;
                            
                            $drop->question = $questionWithInputs;

                        //Check the answer if 1 drop question have multiple blanks question
                        } else if ($answercount > 1) {


                            $answer = DB::table('teacherquizrecordsdetail')
                                ->where('questionid', $drop->id)
                                ->where('headerid', $recordid)
                                ->select('stringanswer', 'sortid')
                                ->orderBy('sortid', 'asc')
                                ->get();
                            
                            foreach ($answer as $ans) {
                                $checkanswer = DB::table('teacher_quiz_drop_answer')
                                    ->where('headerid', $drop->id)
                                    ->where('sortid', $ans->sortid)
                                    ->value('answer');

                                if ($checkanswer == $ans->stringanswer) {



                                    $teacherdetailsid = DB::table('teacherquizrecordsdetail')
                                    ->where('questionid',$drop->id)
                                    ->where('headerid', $recordid)
                                    ->where('sortid', $ans->sortid)
                                    ->where('deleted',0)
                                    ->value('id');

                                    //update points value
                                    DB::table('teacherquizrecordsdetail')
                                    ->where('id', $teacherdetailsid)
                                    ->where('sortid', $ans->sortid)
                                    ->where('deleted', 0)
                                    ->update([
                                        'points' => 1


                                    ]);
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

            //dd($quizQuestions);
            

            return view('teacher.teacherquiz.teacherquiz.studentquizresponse')
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
    
            DB::table('teacherquizrecordsdetail')
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

            $sum = DB::table('teacherquizrecordsdetail')
                ->where('headerid', $headerid)
                ->sum('points');

            DB::table('teacherquizrecords')
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


    public function changeSetPoints(){




        $store = DB::table('lessonquizquestions')
                    ->where('typeofquiz', 7)
                    ->where('deleted', 0)
                    ->get();

        $count = 0;
        $sortdata = array();
        foreach($store  as $item){

            $store2 = DB::table('lesson_fill_question')
                    ->where('questionid', $item->id)
                    ->where('deleted', 0)
                    ->get();

                $sortdata1 = array();
                foreach($store2 as $question){

                    $keyword = '~input'; // The word you want to count
                    $existingval = $question->question;

                    $count2 = substr_count($existingval, $keyword);

                    $count+= $count2;

                        
                }
            

            
            DB::table('lessonquizquestions')
                ->where('id', $item->id)
                ->update([
                    'points'             =>  $count,
                ]);
            
            array_push($sortdata1,$count ,$item->id);
            array_push($sortdata, $sortdata1);

            $count = 0;
                        
        }

    dd($sortdata);
    }



}

    
