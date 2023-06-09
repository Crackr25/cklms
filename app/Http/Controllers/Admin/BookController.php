<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
use File;
use Hash;
class BookController extends Controller
{
    public function hey(Request $request)
    {        
        date_default_timezone_set('Asia/Manila');
        $books = DB::table('books')
            ->select(
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.picurl',
                'books.deleted',
                'books.createddatetime'
            )
            ->where('books.deleted','0')
            ->get();
        $countbooks       = count($books);

        $booksaddedtoday  = collect($books)->where('books.createddatetime', date('Y-m-d'));
        $first = 0;

        return view('admin.adminbooks.adminbooksindex')
            ->with('booksaddedtoday',$booksaddedtoday)
            ->with('books',$books)
            ->with('countbooks',$countbooks);
    
    }
    public function index($id, Request $request)
    {        
        date_default_timezone_set('Asia/Manila');
        $books = DB::table('books')
            ->select(
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.picurl',
                'books.deleted',
                'books.createddatetime'
            )
            ->where('books.deleted','0')
            ->get();
        $countbooks       = count($books);
		
        $booksaddedtoday  = collect($books)->where('books.createddatetime', date('Y-m-d'));
        $first = 0;

        return view('admin.adminbooks.adminbooksindex')
            ->with('booksaddedtoday',$booksaddedtoday)
            ->with('books',$books)
            ->with('countbooks',$countbooks);
    
    }
    public function viewbook(Request $request)
    {
        
        $book = DB::table('books')
            ->select(
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.isactive as status',
                'books.gradeid as grade',
                'books.picurl'
            )
            ->where('books.id',$request->get('id'))
            ->first();

        $book->grades = DB::table('gradelevel')
                        ->where('id', $book->grade)
                        ->value('levelname');
        
            
        $parts = DB::table('parts')
            ->where('bookid', $request->get('id'))
            ->where('deleted','0')
            ->get();


        // return collect($chapters);
        $sortdata = array();
        $sortype = 0; //0 = datecreated; 1 = sortid;
        if(count($parts)>0)
        {
            foreach($parts as $partkey => $partvalue)
            {
                if($partvalue->sortid == null)
                {
                    Db::table('parts')
                        ->where('id', $partvalue->id)
                        ->update([
                            'sortid' => $partkey+1
                        ]);

                    $partvalue->sortid = $partkey+1;
                }else{
                    $sortype += 1;
                }
                array_push($sortdata,$partvalue);
            }
        }
        if($sortype == 0)
        {
            $parts = collect($sortdata)->sortBy('createdatetime')->values()->all();
        }else{
            $parts = collect($sortdata)->sortBy('sortid')->values()->all();
        }

        $book->parts = $parts;
        
        if(count($parts) == 0)
        {
            $chapters = DB::table('chapters')
            ->where('bookid', $book->bookid)
            ->where('deleted','0')
            ->get();
    
            if(count($chapters)>0)
            {
                foreach($chapters as $chapterkey => $chaptervalue)
                {
                    if($chaptervalue->sortid == null)
                    {
                        Db::table('parts')
                            ->where('id', $chaptervalue->id)
                            ->update([
                                'sortid' => $chapterkey+1
                            ]);
    
                        $chaptervalue->sortid = $chapterkey+1;
                    }else{
                        $sortype += 1;
                    }
                    array_push($sortdata,$chaptervalue);
                }
            }
            if($sortype == 0)
            {
                $chapters = collect($sortdata)->sortBy('createdatetime')->values()->all();
            }else{
                $chapters = collect($sortdata)->sortBy('sortid')->values()->all();
            }
            $book->chapters = $chapters;
        }


        else{
    

            $book->chapters = [];
        
        }


        
        return view('admin.adminbooks.adminbookview')
            ->with('book', $book);
    }
    public function getchapters(Request $request)
    {
        $chapters = DB::table('chapters')
            ->where('partid', $request->get('id'))
            ->where('deleted','0')
            ->get();

        // return collect($chapters);
        $sortdata = array();
        $sortype = 0; //0 = datecreated; 1 = sortid;
        if(count($chapters)>0)
        {
            foreach($chapters as $chapterkey => $chaptervalue)
            {
                if($chaptervalue->sortid == null)
                {
                    Db::table('chapters')
                        ->where('id', $chaptervalue->id)
                        ->update([
                            'sortid' => $chapterkey+1
                        ]);

                    $chaptervalue->sortid = $chapterkey+1;
                }else{
                    $sortype += 1;
                }
                array_push($sortdata,$chaptervalue);
            }
        }
        if($sortype == 0)
        {
            return  collect($sortdata)->sortBy('createdatetime')->values()->all();
        }else{
            return  collect($sortdata)->sortBy('sortid')->values()->all();
        }
    }



    public function getlessons(Request $request)
    {
        $contents = array();
        $lessons = DB::table('lessons')
            ->where('chapterid', $request->get('id'))
            ->where('deleted','0')
            ->get();
        if(count($lessons)>0)
        {
            foreach($lessons as $lesson)
            {
                $lesson->type = 'l';
                array_push($contents,$lesson);
            }
        }
        $quizzes = DB::table('lesssonquiz')
            ->where('chapterid', $request->get('id'))
            ->where('deleted','0')
            ->get();
        if(count($quizzes)>0)
        {
            foreach($quizzes as $quiz)
            {
                $quiz->type = 'q';
                array_push($contents,$quiz);
            }
        }
        $contents = collect($contents)->sortBy('createddatetime');
        $contents = $contents->values()->alL();
        $sortdata = array();
        $sortype = 0; //0 = datecreated; 1 = sortid;
        if(count($contents)>0)
        {
            foreach($contents as $lessonkey => $lessonvalue)
            {
                if($lessonvalue->sortid == null)
                {
                    if($lessonvalue->type == 'l')
                    {
                        Db::table('lessons')
                            ->where('id', $lessonvalue->id)
                            ->update([
                                'sortid' => $lessonkey+1
                            ]);

                    }
                    if($lessonvalue->type == 'q')
                    {
                        Db::table('lesssonquiz')
                            ->where('id', $lessonvalue->id)
                            ->update([
                                'sortid' => $lessonkey+1
                        ]);
                    }
                    $lessonvalue->sortid = $lessonkey+1;
                }else{
                    $sortype += 1;
                }
                array_push($sortdata,$lessonvalue);
            }
        }
        if($sortype == 0)
        {
            return  collect($sortdata)->sortBy('createdatetime')->values()->all();
        }else{
            return  collect($sortdata)->sortBy('sortid')->values()->all();
        }
        // $contents = 1z
    }
    public function getpartinfo(Request $request)
    {
        $partinfo = Db::table('parts')
            ->where('id', $request->get('id'))
            ->first();

        return collect($partinfo);
    }
    public function getchapterinfo(Request $request)
    {
        $chapterinfo = Db::table('chapters')
            ->where('id', $request->get('id'))
            ->first();

        return collect($chapterinfo);
    }
    public function getlessoninfo(Request $request)
    {
        $lessoninfo = Db::table('lessons')
            ->where('id', $request->get('id'))
            ->first();

        return collect($lessoninfo);
    }
    public function getquizinfo(Request $request)
    {
        $quizinfo = Db::table('lesssonquiz')
            ->where('id', $request->get('id'))
            ->first();

        return collect($quizinfo);
    }



    public function updateinfo(Request $request)
    {
        
        if($request->get('type') == 'part')
        {
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'chapter')
        {
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'lesson')
        {
            DB::table('lessons')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'quiz')
        {
            DB::table('chapterquiz')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        return $request->all();
    }


    public function updateQuiznfo(Request $request)
    {
        
        $imageFile = $request->file('selectedFile');

        
        if ($imageFile) {
                // Save the image locally
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move(public_path('quizcover'), $imageName);

                DB::table('lesssonquiz')
                ->where('id', $request->get('id'))
                ->update([
                    'picurl' => 'quizcover/' . $imageName,
                ]);


        } else {
            $data = null; // Set $data to null if the image file is null
        }
    

            DB::table('lesssonquiz')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);

    }


    public function getClassroomAssignedTable(Request $request)
    {
        
        $bookid = $request->get('bookid');

        $classroombooks = DB::table('classroombooks')
            ->join('classrooms', 'classrooms.id', '=', 'classroombooks.classroomid')
            ->where('classroombooks.bookid', $bookid)
            ->where('classrooms.deleted', '0')
            ->where('classroombooks.deleted', '0')
            ->select('classrooms.classroomname', 'classrooms.code', 'classrooms.createdby')
            ->get();




        if(isset($classroombooks)){

            foreach($classroombooks as $book){
                $teacher = DB::table('teachers')
                                ->where('id', $book->createdby)
                                ->select('teachers.firstname', 'teachers.lastname', 'teachers.middlename')
                                ->first();

                $book->teacher = $teacher->firstname.' '.$teacher->middlename.' '.$teacher->lastname;


            }

        }




    return $classroombooks;






    }


    public function addpart(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $partid = DB::table('parts')
            ->insertGetId([
                'title'     => $request->get('title'),
                'bookid'    => $request->get('bookid'),
                'createdby' => auth()->user()->id,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $partinfo = DB::table('parts')
            ->where('id', $partid)
            ->first();

        return collect($partinfo);
    }

    public function gradeSelect(Request $request)
    {
        $page = $request->get('page')*10;
        $search = $request->get('search');



        $query = Db::table('gradelevel')
            ->select(
                'gradelevel.id as id',
                'gradelevel.levelname as text'
            )
            ->orderBy('gradelevel.sortid')
            ->where('deleted','0');
        if ($search) {

            $query->where('gradelevel.levelname', 'LIKE', '%' . $search . '%');

        }
        
        $query =$query->take(10)
            ->skip($page)
            ->get();


        $query_count = count($query);



            return @json_encode((object)[
                    "results"=>$query,
                    "pagination"=>(object)[
                            "more"=>$query_count > ($page)  ? true :false
                    ],
                    "count_filtered"=>$query_count
                ]);
    }


    public function gradeAssign(Request $request)
    {

            DB::table('books')
                ->where('id', $request->get('bookid'))
                ->update([
                    'gradeid'             =>  $request->get('gradeid'),
                ]);




    }
    





    public function addchapter(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $chapterid = DB::table('chapters')
            ->insertGetId([
                'title'     => $request->get('title'),
                'description'     => $request->get('description'),
                'bookid'    => $request->get('bookid'),
                'partid'    => $request->get('partid'),
                'createdby' => auth()->user()->id,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $chapterinfo = DB::table('chapters')
            ->where('id', $chapterid)
            ->first();

        return collect($chapterinfo);
    }
    public function addlesson(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $lessonid = DB::table('lessons')
            ->insertGetId([
                'title'     => $request->get('title'),
                'description'     => $request->get('description'),
                'chapterid'    => $request->get('chapterid'),
                'createdby' => auth()->user()->id,
                'type' => $request->get('lessontype'),
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $lessoninfo = DB::table('lessons')
            ->where('id', $lessonid)
            ->first();

        return collect($lessoninfo);
    }



    public function addquiz($id, Request $request)
    {


        $chapterquizinfo = DB::table('lesssonquiz')
            ->where('id', $id)
            ->first();

        $quizquestions = DB::table('lessonquizquestions')
            ->where('quizid', $id)
            ->where('typeofquiz', '!=', null)
            ->where('deleted', 0)
            ->get();


        $protocol = $request->getScheme();
        $host = $request->getHost();

        $rootDomain = $protocol . '://' . $host;

        foreach($quizquestions as $item){

            if($item->typeofquiz == 9){
                $item->image = $rootDomain.'/'.$item->picurl;
            }
        }



        if($chapterquizinfo->title == null || $chapterquizinfo->title == ""){
            $chapterquizinfo->title = "Untitled Quiz";
        }

        if($chapterquizinfo->description == null || $chapterquizinfo->description == ""){
            $chapterquizinfo->description = "";
        }


        //dd($quizquestions);

        return view('admin.adminquiz.quizindex')
        ->with('id',$id)
        ->with('quizquestions',$quizquestions)
        ->with('quiz',$chapterquizinfo);
    }

    public function createquiz(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        $id = DB::table('lesssonquiz')->insertGetId([
            'bookid' => $request->get('bookid'),
            'chapterid' => $request->get('chapterid'),
            'createddatetime' => date('Y-m-d H:i:s'),
        ]);

        return $id;
    }


    public function setBonus(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        DB::table('lessonquizchoices')
            ->where('questionid', $request->get('id'))
            ->update([
                'answer'         => 1
                    ]);

        return 1;
    }



    public function saveImage(Request $request)
    {

        $question_id = $request->get('question_id');
        $imageFile = $request->file('answer');


        $data = [
            'question'  => "Image holder",
            'typeofquiz' => 9,
        ];


        // Save the image locally
        $imageName = time() . '_' . $imageFile->getClientOriginalName();
        $imageFile->move(public_path('quizquestion'), $imageName);

        // Store the image URL path
        $data['picurl'] = 'quizquestion/' . $imageName;

        // Make the complete path of image
        $protocol = $request->getScheme();
        $host = $request->getHost();

        $rootDomain = $protocol . '://' . $host;

        // insert data

        $data['updateddatetime'] = \Carbon\Carbon::now('Asia/Manila');


        DB::table('lessonquizquestions')
        ->where('id', $question_id)
        ->update($data);


        $data['picurl'] = $rootDomain . '/' . $data['picurl'];

        return $data;

    }

    public function delquestion(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'         => 1
                    ]);

        return 1;
    }

    public function delChoices(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        DB::table('lessonquizchoices')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'         => 1,
                'deleteddatetime' => date('Y-m-d H:i:s')
                    ]);

        return 1;
    }

    public function getquiz(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        $quizlist = DB::table('lesssonquiz')
            ->where('bookid', $request->get('bookid'))
            ->where('chapterid', $request->get('chapterid'))
            ->where('deleted', 0)
            ->get();

        return $quizlist;
    }


    public function createdescription(Request $request)
    {


        DB::table('lesssonquiz')
            ->where('id', $request->get('id'))
            ->update([
                'title'         => $request->get('title'),
                'coverage'      => $request->get('coverage'),
                'description'   => $request->get('description')
            ]);

        return 1;
    }
    

    public function addquestion(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        $id = DB::table('lessonquizquestions')->insertGetId([
            'quizid' => $request->get('quizid'),
            'createddatetime' => date('Y-m-d H:i:s'),
        ]);

        return $id;
    }


    public function lessonSelect(Request $request)
    {
        $page = $request->get('page')*10;

        $chapter = DB::table('lesssonquiz')->where('id',$request->get('quizId'))->value('chapterid');

        $lessons = DB::table('lessons')
            ->where('chapterid', $chapter)
            ->where('deleted', 0)
            ->select(
                                    'lessons.title as id',
                                    'lessons.title as text'
                    )
            ->take(10)
            ->skip($page)
            ->get();

        $lessons_count = DB::table('lessons')
        ->where('chapterid', $chapter)
        ->where('deleted', 0)
        ->count();



            return @json_encode((object)[
                    "results"=>$lessons,
                    "pagination"=>(object)[
                            "more"=>$lessons_count > ($page)  ? true :false
                    ],
                    "count_filtered"=>$lessons_count
                ]);
    }


    public function createquestion(Request $request)
    {


            date_default_timezone_set('Asia/Manila');
            DB::table('lessonquizquestions')
                ->where('id', $request->get('id'))
                ->update([
                    'question'         => $request->get('question'),
                    'typeofquiz'   => $request->get('typeofquiz'),
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);

            return 1;

    }

    public function createquestionitem(Request $request)
    {

        

            DB::table('lessonquizquestions')
                ->where('id', $request->get('id'))
                ->update([
                    'question'         => $request->get('question'),
                    'typeofquiz'   => $request->get('typeofquiz'),
                    'item'   => $request->get('item')
                ]);
            
            DB::table('lessonquizquestions')
                ->where('id', $request->get('questionid'))
                ->update([
                    'points'             =>  $request->get('item'),
                ]);
            
            DB::table('lesson_quiz_enum_answer')
                ->where('headerid', $request->get('id'))
                ->where('sortid', '>',$request->get('item'))
                ->update([
                    'deleted'         => 1,

                ]);

            return 1;

    }

    public function delcoverage(Request $request)
    {

        DB::table('lesssonquiz')
            ->where('id', $request->get('id'))
            ->update([
                'coverage'         => "",
            ]);

        return 1;
    }

    public function createdragoption(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $choice = DB::table('lesson_quiz_drag_option')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->count();

        if($choice == 0){
        DB::table('lesson_quiz_drag_option')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'description'       =>  $request->get('description'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

        }else{

            DB::table('lesson_quiz_drag_option')
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
        $choice = DB::table('lesson_quiz_drop_question')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->count();

        if($choice == 0){
        DB::table('lesson_quiz_drop_question')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'question'       =>  $request->get('description'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

        DB::table('lessonquizquestions')
                ->where('id', $request->get('questionid'))
                ->update([
                    'points'             =>  $request->get('sortid'),
                ]);
        

        }else{

            DB::table('lesson_quiz_drop_question')
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


    public function createFillquestion(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $checkifexist = DB::table('lesson_fill_question')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->count();

        if($checkifexist == 0){

            $description = $request->get('description'); // Get the input string from the frontend

            $keyword = '~input'; // The word you want to count

            $count = (substr_count($description, $keyword));

            if($request->get('description') != null || $request->get('description') != "" ){

                $existingPoints = intval(DB::table('lessonquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->value('points'));

                $count+=$existingPoints ;
                if( $request->get('sortid') == 1){
                    $count -= 1;
                }

                DB::table('lesson_fill_question')
                    ->insert([
                            'sortid'            =>  $request->get('sortid'),
                            'questionid'        =>  $request->get('questionid'),
                            'question'       =>  $request->get('description'),
                        ]);
            
                DB::table('lessonquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->update([
                        'points'             =>  $count,
                    ]);
            }

        }else{


            if($request->get('description') != null || $request->get('description') != "" ){

                $description = $request->get('description'); // Get the input string from the frontend

                $keyword = '~input'; // The word you want to count
                $existingval = DB::table('teacher_quiz_fill_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->value('question');

                
                $count = substr_count($description, $keyword);
                $count2 = substr_count($existingval, $keyword);

                $existingPoints = intval(DB::table('teacherquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->value('points'));

                $newPoints;


                if($count > $count2){

                    $total = $count - $count2;
                    $newPoints = $existingPoints + $total;

                }else{

                    $total = $count2 - $count;
                    $newPoints = $existingPoints - $total;

                }

                DB::table('lesson_fill_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'question'       =>  $request->get('description'),
                    ]);


                DB::table('teacherquizquestions')
                        ->where('id', $request->get('questionid'))
                        ->update([
                            'points'             =>  $newPoints
                        ]);


                return 0;

            }else{


                $keyword = '~input'; // The word you want to count
                $existingval = DB::table('lesson_fill_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->value('question');

                $count2 = substr_count($existingval, $keyword);

                $existingPoints = intval(DB::table('lessonquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->value('points'));

                $newPoints = $existingPoints - $count2;


                DB::table('lesson_fill_question')
                    ->where('questionid', $request->get('questionid'))
                    ->where('sortid', $request->get('sortid'))
                    ->update([
                        'deleted'             =>  1,
                    ]);


                // Update the 'points' column with the new value
                DB::table('teacherquizquestions')
                    ->where('id', $request->get('questionid'))
                    ->update([
                        'points' => $newPoints
                    ]);


            return 1;

            }
        }

        

        return 1;
    }

    public function createchoices(Request $request)
    {
        
        date_default_timezone_set('Asia/Manila');
        $choice = DB::table('lessonquizchoices')
            ->where('questionid', $request->get('questionid'))
            ->where('sortid', $request->get('sortid'))
            ->where('deleted', 0)
            ->count();

        if($choice == 0){
        DB::table('lessonquizchoices')
            ->insert([
                    'sortid'            =>  $request->get('sortid'),
                    'questionid'        =>  $request->get('questionid'),
                    'description'       =>  $request->get('description'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

                }else{

                    DB::table('lessonquizchoices')
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


    public function bookinfoupdate(Request $request)
    {
        // return $request->all();
        if($request->has('editcoverphoto'))
        {
            // return $request->file('editcoverphoto');

            if (! File::exists(public_path().'books/'.$request->get('editbooktitle'))) {

                $path = public_path('books/'.$request->get('editbooktitle'));
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            
            $urlFolder = str_replace('http://','',$request->root());
            // return 'asdasda';
            
            if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('editbooktitle'))) {
    
                $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('editbooktitle');
                
                if(!File::isDirectory($cloudpath)){
    
                    File::makeDirectory($cloudpath, 0777, true, true);
                    
                }
                
            }
    
    
            // return basename($request->get('content'));
            $file = $request->file('editcoverphoto');
            // return $file;
            // $extension = $file->getClientOriginalExtension();
            $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('editbooktitle').'/';
    
    
            // try{
    
            //     $file->move($clouddestinationPath, $file->getClientOriginalName());
    
            // }
            // catch(\Exception $e){
        
            // }
                // return basename($request->get('content'));
            $destinationPath = public_path('books/'.$request->get('editbooktitle').'/');
                // return $filename;
            
            try{
    
                $file->move($destinationPath,$file->getClientOriginalName());
    
            }
            catch(\Exception $e){
                
        
            }

            
            
            DB::table('books')
            ->where('id', $request->get('editbookid'))
            ->update([
                'picurl'            => 'books/'.$request->get('editbooktitle').'/'.$file->getClientOriginalName(),
            ]);

            return back();


        }
        DB::table('books')
            ->where('id', $request->get('editbookid'))
            ->update([
                'title'         => $request->get('editbooktitle'),
                'description'   => $request->get('editbookdescription')
            ]);
        return back();
    }
    public function bookstatusupdate(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        DB::table('books')
            ->where('id', $request->get('bookid'))
            ->update([
                'isactive'  => $request->get('bookstatus')
            ]);
    }
    public function getinfo(Request $request)
    {
        // return $request->all();
        if($request->get('datarequesttype') == 'part'){
            $info = DB::table('parts')
                ->where('id', $request->get('datarequestid'))
                ->get();
        }elseif($request->get('datarequesttype') == 'chapter'){
            $info = DB::table('chapters')
                ->where('id', $request->get('datarequestid'))
                ->get();
        }elseif($request->get('datarequesttype') == 'lesson'){
            $info = DB::table('lessons')
                ->where('id', $request->get('datarequestid'))
                ->get();
        }
        
        return $info;
    }
    public function update(Request $request)
    {
        // return $request->all();
        if($request->get('contenttype') == 'part'){
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description'   => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'chapter'){
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description'   => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'lesson'){
            DB::table('lessons')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description'   => $request->get('description')
                ]);
        }
        // return back();
    }
    public function deletebycontenttype(Request $request)
    {
        
        if($request->get('contenttype') == 'part'){
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'chapter'){
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'lesson'){
            DB::table('lessons')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'quiz'){
            // DB::table('chapterquiz')
            //     ->where('id', $request->get('id'))
            //     ->update([
            //         'deleted' => 1
            //     ]);

            DB::table('lesssonquiz')
            ->where('id', $request->get('id'))
            ->update([
                'deleted' => 1
            ]);
            return 'success';
        }
    }
    public function createcontent(Request $request)
    {
        // return $request->all();
        date_default_timezone_set('Asia/Manila');
        if($request->get('type') == 'part'){
            DB::table('parts')
                ->insert([
                    'title'             =>  $request->get('title'),
                    'description'       =>  $request->get('description'),
                    'bookid'            =>  $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        elseif($request->get('type') == 'chapter'){
            DB::table('chapters')
                ->insert([
                    'title'             =>  $request->get('title'),
                    'description'       =>  $request->get('description'),
                    'partid'            =>  $request->get('partid'),
                    'bookid'            =>  $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        elseif($request->get('type') == 'lesson'){
            DB::table('lessons')
                ->insert([
                    'title'             =>  $request->get('title'),
                    'description'       =>  $request->get('description'),
                    'chapterid'         =>  $request->get('chapterid'),
                    // 'bookid'            =>  $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        return back();
    }
    public function createbooks($id, Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        // return $request->all();
        if($request->has('cover'))
        {
            if (! File::exists(public_path().'books/'.$request->get('title'))) {
    
                $path = public_path('books/'.$request->get('title'));
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            // return 'asdasda';
            
            $urlFolder = str_replace('http://','',$request->root());
            if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('title'))) {
    
                $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('title');
                
                if(!File::isDirectory($cloudpath)){
    
                    File::makeDirectory($cloudpath, 0777, true, true);
                    
                }
                
            }
    
    
            // return basename($request->get('content'));
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('title').'/';
    
    
            // try{
    
            //     $file->move($clouddestinationPath, $file->getClientOriginalName());
    
            // }
            // catch(\Exception $e){
        
        
            // }
                // return basename($request->get('content'));
            $destinationPath = public_path('books/'.$request->get('title').'/');
                // return $filename;
            
            try{
    
                $file->move($destinationPath,$file->getClientOriginalName());
    
            }
            catch(\Exception $e){
        
            }
            // return back();
            $action = Crypt::decrypt($id);
    
            // if($action == 'create'){
    
            $bookid = DB::table('books')
                ->insertGetId([
                    'title'             => $request->get('title'),
                    'description'       => $request->get('description'),
                    'subjectid'         => $request->get('subjectid'),
                    'picurl'            => 'books/'.$request->get('title').'/'.$file->getClientOriginalName(),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
    
            // }
        }else{
            
    
            $bookid = DB::table('books')
                ->insertGetId([
                    'title'             => $request->get('title'),
                    'description'       => $request->get('description'),
                    'subjectid'         => $request->get('subjectid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        return back();
    }
    public function updateSort(Request $request)
    {
        // return $request->all();
        // return ;

        $type = $request->get('type');



        if($type == 'lesson'){

            DB::table('lessons')
            ->where('id', $request->get('id'))
            ->update([
                'sortid'   => $request->get('sortid')
            ]);

        }else if($type == 'quiz'){

            DB::table('lesssonquiz')
            ->where('id', $request->get('id'))
            ->update([
                'sortid'   => $request->get('sortid')
            ]);

        }

        
    }



    public function deletebook(Request $request)
    {
        // return $request->all();
        // return ;

        if(Hash::check($request->get('password'), auth()->user()->password))
        {
            DB::table('books')
                ->where('id', $request->get('bookid'))
                ->update([
                    'deleted'   => '1'
                ]);

            return '1';
        }else{
            
            return '0';
        }
    }


    public function getquestion(Request $request)
    {
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

        $question->choices = DB::table('lessonquizchoices')
        ->where('questionid', $question->id)
        ->where('deleted', 0)
        ->select('id', 'questionid' , 'description')
        ->orderBy('sortid')
        ->get();

        return response()->json($question);
        
    }

    public function getDropQuestion(Request $request)
    {
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

        $question->drag = DB::table('lesson_quiz_drag_option')
        ->where('questionid', $question->id)
        ->select('id', 'description')
        ->orderBy('sortid')
        ->get();

        $question->drop = DB::table('lesson_quiz_drop_question')
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



    public function getFillQuestion(Request $request)
    {
        
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

        $question->fill = DB::table('lesson_fill_question')
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

    public function getEnum(Request $request)
    {
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question', 'item')
            ->where('deleted', 0)
            ->first();

        return response()->json($question);
        
    }



    public function setAnswerKey(Request $request)
    {

        if($request->get('questiontype') == 1){
                DB::table('lessonquizchoices')
                        ->where('questionid', $request->get('question_id'))
                        ->where('answer', 1)
                        ->update([
                            'answer'   => '0'
                        ]);

                
                DB::table('lessonquizchoices')
                        ->where('id', $request->get('answer'))
                        ->where('questionid', $request->get('question_id'))
                        ->update([
                            'answer'   => '1'
                        ]);

                return 1;
                    }
            else if($request->get('questiontype') == 7){

                        $checkifexist =  DB::table('lesson_quiz_fill_answer')
                        ->where('headerid', $request->get('question_id'))
                        ->where('sortid', $request->get('sortid'))
                        ->count();

                        if($checkifexist > 0){

                            DB::table('lesson_quiz_fill_answer')
                            ->where('headerid', $request->get('question_id'))
                            ->where('sortid', $request->get('sortid'))
                            ->update([
                                'answer'   => $request->get('answer')
                            ]);

                                return 0;


                        }else{

                            DB::table('lesson_quiz_fill_answer')
                            ->insert([
                                'answer'   => $request->get('answer'),
                                'headerid'   => $request->get('question_id'),
                                'sortid'   => $request->get('sortid')
                            ]);

                                return 5;

                        }  

            }else if($request->get('questiontype') == 8){

                        $checkifexist =  DB::table('lesson_quiz_enum_answer')
                        ->where('headerid', $request->get('question_id'))
                        ->where('sortid', $request->get('sortid'))
                        ->count();

                        if($checkifexist > 0){

                            DB::table('lesson_quiz_enum_answer')
                            ->where('headerid', $request->get('question_id'))
                            ->where('sortid', $request->get('sortid'))
                            ->update([
                                'answer'   => $request->get('answer')
                            ]);

                                return 0;


                        }else{

                            DB::table('lesson_quiz_enum_answer')
                            ->insert([
                                'answer'   => $request->get('answer'),
                                'headerid'   => $request->get('question_id'),
                                'sortid'   => $request->get('sortid')
                            ]);

                                return 5;

                        }  

            }else if($request->get('questiontype') == 16){


                if($request->get('answer') == 1){
                    DB::table('lessonquizquestions')
                    ->where('id', $request->get('question_id'))
                    ->update([
                        'ordered'   => 1
                    ]);

                    return 1;
                }else{
                    DB::table('lessonquizquestions')
                    ->where('id', $request->get('question_id'))
                    ->update([
                        'ordered'   => 0
                    ]);

                    return 0;

                }

            }
        
        
    }


    public function setAnswerdrop(Request $request)
    {
        

        $checkifexist =  DB::table('lesson_quiz_drop_answer')
            ->where('headerid', $request->get('question_id'))
            ->where('sortid', $request->get('sortId'))
            ->count();

        if($checkifexist == 1){

            DB::table('lesson_quiz_drop_answer')
            ->where('headerid', $request->get('question_id'))
            ->where('sortid', $request->get('sortId'))
            ->update([
                'answer'   => $request->get('answer')
            ]);

                return 0;


        }else{

            DB::table('lesson_quiz_drop_answer')
            ->insert([
                'answer'   => $request->get('answer'),
                'headerid'   => $request->get('question_id'),
                'sortid'   => $request->get('sortId')
            ]);

                return 1;

        }
        
    }

    public function returneditquiz(Request $request)

    {


    $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();

    $question->choices = DB::table('lessonquizchoices')
    ->where('questionid', $question->id)
    ->where('deleted', 0)
    ->select('id', 'questionid' , 'description' , 'answer')
    ->orderBy('sortid')
    ->get();


    return response()->json($question);
    
        
    }


    public function returnEditdrag(Request $request)

    {
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();


        $question->drag = DB::table('lesson_quiz_drag_option')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->get();
                                                            
        $question->drop = DB::table('lesson_quiz_drop_question')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->get();

        foreach($question->drop as $item){

        $answer = DB::table('lesson_quiz_drop_answer')
            ->where('headerid', $item->id)
            ->orderBy('sortid')
            ->pluck('answer');

        $answerString = implode(',', $answer->toArray());
        $item->answer = $answerString;

        }


    return response()->json($question);
    
        
    }

    public function returnEditfill(Request $request)

    {
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question')
            ->where('deleted', 0)
            ->first();


        $question->fill = DB::table('lesson_fill_question')
            ->where('questionid', $question->id)
            ->orderBy('sortid')
            ->get();

        foreach($question->fill as $item){

            $answer = DB::table('lesson_quiz_fill_answer')
                ->where('headerid', $item->id)
                ->orderBy('sortid')
                ->pluck('answer');

            $answerString = implode(',', $answer->toArray());

            $item->answer = $answerString;

        }


    return response()->json($question);
    
        
    }

    public function returnEditenum(Request $request)

    {
        $question = DB::table('lessonquizquestions')
            ->where('id', $request->get('id'))
            ->select('id','question' , 'ordered' , 'item')
            ->where('deleted', 0)
            ->first();


            $answer = DB::table('lesson_quiz_enum_answer')
                ->where('headerid', $question->id)
                ->orderBy('sortid')
                ->pluck('answer');

            $answerString = implode(',', $answer->toArray());

            $question->answer = $answerString;


    return response()->json($question);
    
        
    }


    public function setPoints(Request $request)

    {
        DB::table('lessonquizquestions')
            ->where('id', $request->get('dataid'))
            ->update([
                'points'   => $request->get('points')
            ]);

    
        
    }

    public function setGuideanswer(Request $request)

    {
        DB::table('lessonquizquestions')
            ->where('id', $request->get('dataid'))
            ->update([
                'quideanswer'   => $request->get('answer')
            ]);

    
        
    }
}
