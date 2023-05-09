<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;
use File;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use BigBlueButton\Parameters\CreateMeetingParameters;
class ClassroomController extends Controller
{
    public function index(Request $request){
        
        if($request->get('table') == 'table' && $request->has('table')){

            $createdby = DB::table('teachers')
                    ->where('userid', auth()->user()->id)
                    ->first()
                    ->id;

            $classrooms = Db::table('classrooms')
                ->select(
                    'classrooms.id',
                    'classrooms.classroomname',
                    'classrooms.code',
                    'classrooms.createddatetime'
                )
                ->orderBy('classrooms.classroomname')
                ->join('teachers','classrooms.createdby','=','teachers.id')
                ->where('classrooms.deleted','0')
                ->where('createdby',$createdby);


            
            if($request->get('search') != 'null' && $request->has('search') ){

                $classrooms = $classrooms->where(function($query) use($request){
                                    $query->where('classroomname','like','%'.$request->get('search').'%');
                                    $query->orWhere('code','like','%'.$request->get('search').'%');
                                });

            }

            $classroomCount = $classrooms->count();

            if($request->get('skip') != 'null' && $request->has('skip') ){

                // $classrooms = $classrooms->skip($request->get('skip'))->take(4);
                $filtertype = 1;

            }
            else{

                // $classrooms = $classrooms->take(12);
                $filtertype = 2;
            }

            $data = array((object)[
                'count'=>$classroomCount,
                'data'=>$classrooms->get(),
                'filtertype'=>$filtertype
            ]);

            if(count($data[0]->data) > 0){

                foreach($data[0]->data as $classroom){
                    $classroom->createddatetime = date('F d, Y h:i:s A', strtotime($classroom->createddatetime));
                    $classroom->students = Db::table('classroomstudents')
                        ->where('classroomid', $classroom->id)
                        ->where('deleted','0')
                        ->count();
                    $classroom->books = Db::table('classroombooks')
                        ->where('classroomid', $classroom->id)
                        ->where('deleted','0')
                        ->count();
                }

            }

            return view('teacher.classrooms.include.classroomtable')
                            ->with('data',$data);
                        // ->with('classrooms',$classrooms);

        }
        else if($request->get('blade') == 'blade' && $request->has('blade')){

            return view('teacher.classrooms.classroomindex');

        }


    }
    public static function getavailablecode(){


        function codegenerator(){
            $length = 6;    
            return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        }

        $code = codegenerator();

        $checkifexists = Db::table('classrooms')
            ->where('code', $code)
            ->get();

        if(count($checkifexists) == 0){

            return $code;

        }else{

            self::getavailablecode();

        }

    }
    public function create(Request $request){

        date_default_timezone_set('Asia/Manila');

        $checkifexists = Db::table('classrooms')
                            ->where('classroomname', $request->get('classroomname'))
                            ->where('code', $request->get('code'))
                            ->get();

        $createdby = DB::table('teachers')
            ->where('userid', auth()->user()->id)
            ->first()
            ->id;
            
        if(count($checkifexists) == 0){

            $id = DB::table('classrooms')
                ->insertGetID([
                    'classroomname' => $request->get('classroomname'),
                    'code'          => $request->get('code'),
                    'createdby'     => $createdby,
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

            // $classrooms = Db::table('classrooms')
            //         ->count();

            DB::table('videoconference')
                ->insertGetID([
                    'classroomid'   => $id,
                    'code'          => 'cklms'.$request->get('code'),
                    'createdby'     => $createdby,
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
            
            \Bigbluebutton::create([
                'meetingID' => 'cklms'.$request->get('code'),
                'meetingName' => $request->get('classroomname'),
                'attendeePW' => 'studentscklms'.$request->get('code'),
                'moderatorPW' => 'teachercklms'.$request->get('code'),
                'defaultWelcomeMessageFooter'       => 'CK Children\'s Publishing',
                'logoutUrl' => explode('/',url()->full())[2].'/videoconference/closevideoconference'
            ]); 

            return '1';

        }else{

            return '0';

        }
    }
    public function viewclassroom(Request $request)
    {

        $classroominfo = Db::table('classrooms')
            ->where('id', $request->get('classroomview'))
            ->where('deleted','0')
            ->first();

        // $students = Db::table('students')
        //     ->where('deleted','0')
        //     ->get();
        
        // if(count($students)>0){
        //     foreach($students as $student){
        //         $checkifexistsinclassroom = Db::table('classroomstudents')
        //             ->where('classroomid', $request->get('classroomview'))
        //             ->where('studentid', $student->id)
        //             ->get();
        //         if(count($checkifexistsinclassroom)  == 0){
        //             $student->exists = 0;
        //         }else{
        //             $student->exists = 1;
        //         }
        //     }
        // }
        
        $createdby = DB::table('teachers')
            ->where('userid', auth()->user()->id)
            ->first();

        // $posts = Db::table('classroomposts')
        //     ->where('classroomid', $request->get('classroomview'))
        //     ->where('deleted','0')
        //     ->orderByDesc('createddatetime')
        //     ->get();
            
        // if(count($posts) > 0){

        //     foreach($posts as $post){

        //         $post->createddatetime = date('F d, Y h:i:s A', strtotime($post->createddatetime));

        //         $attachments = Db::table('classroompostattach')
        //             ->where('postid', $post->id)
        //             ->where('deleted','0')
        //             ->get();

        //         $post->attachments = $attachments;

        //         if($post->usertypeid == '2'){
                    
        //                 $post->mine = '1';
        //                 $post->name = $createdby->firstname.' '.$createdby->lastname.' '.$createdby->suffix;
        //                 $post->gender = $createdby->gender;
        //                 $post->picurl = $createdby->picurl;
                        
        //         }else{
        //             $post->mine = '0';
        //             $studentinfo = DB::table('students')
        //                 ->where('id', $post->createdby)
        //                 ->first();
        //             $post->name = $studentinfo->firstname.' '.$studentinfo->lastname.' '.$studentinfo->suffix;
        //             $post->gender = $studentinfo->gender;
        //             $post->picurl = $studentinfo->picurl;
        //         }

        //         if($post->type == '3')
        //         {
        //             $turnedinass = Db::table('classroomass')
        //                 ->where('assignmentid',$post->id)
        //                 ->where('deleted','0')
        //                 ->get();

        //             $post->turnedin = count($turnedinass);
        //         }
        //         elseif($post->type == '4')
        //         {
        //             $turnedinquiz = Db::table('classroomquiz')
        //                 ->where('quizid',$post->id)
        //                 ->where('deleted','0')
        //                 ->get();

        //             $post->turnedin = count($turnedinquiz);
        //         }

        //         $comments = DB::table('classroompostcomm')
        //             ->where('postid', $post->id)
        //             ->where('deleted','0')
        //             ->orderBy('createddatetime','asc')
        //             ->get();
                    
        //         if(count($comments) > 0){

        //             foreach($comments as $comment){
        //                 if($comment->usertypeid == '3'){
                            
        //                         $studentinfo = DB::table('students')
        //                             ->where('id', $comment->createdby)
        //                             ->first();
        //                         $comment->mine = '0';
        //                         $comment->name = $studentinfo->firstname.' '.$studentinfo->lastname.' '.$studentinfo->suffix;
        //                         $comment->gender = $studentinfo->gender;
        //                         $comment->picurl = $studentinfo->picurl;
                                
        //                 }else{
        //                     if($comment->createdby == $createdby->id){
        //                         $comment->mine = '1';
        //                         $comment->name = $createdby->firstname.' '.$createdby->lastname.' '.$createdby->suffix;
        //                         $comment->gender = $createdby->gender;
        //                         $comment->picurl = $createdby->picurl;
        //                     }else{
        //                         $comment->mine = '0';
        //                         $teacherinfo = DB::table('teachers')
        //                             ->where('id', $comment->createdby)
        //                             ->first();
        //                         $comment->name = $teacherinfo->firstname.' '.$teacherinfo->lastname.' '.$teacherinfo->suffix;
        //                         $comment->gender = $teacherinfo->gender;
        //                         $comment->picurl = $teacherinfo->picurl;
        //                     }
        //                 }
        //                 $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));
        //             }

        //         }
        //         $post->comments = $comments;
        //     }

        // }
        
        // $files = DB::table('classroomposts')
        //     ->select(
        //         'classroompostattach.id',
        //         'classroompostattach.filename',
        //         'classroompostattach.filepath',
        //         'classroompostattach.extension'
        //     )
        //     ->join('classroompostattach', 'classroomposts.id','=','classroompostattach.postid')
        //     ->join('teachers', 'classroomposts.createdby','=','teachers.id')
        //     ->where('classroompostattach.deleted','0')
        //     ->where('classroomposts.deleted','0')
        //     ->where('classroomposts.classroomid',$classroominfo->id)
        //     ->where('classroomposts.usertypeid','2')
        //     ->where('teachers.userid',auth()->user()->id)
        //     ->get();

        // $classroombooks = DB::table('classroombooks')
        //     ->select('classroombooks.id','classroombooks.bookid','classroombooks.classroomid','classroombooks.createddatetime','books.title','books.description','books.picurl')
        //     ->join('books', 'classroombooks.bookid','=','books.id')
        //     ->where('books.isactive', '1')
        //     ->where('classroomid', $request->get('classroomview'))
        //     ->get();
        
        // if(count($classroombooks) > 0)
        // {
        //     foreach($classroombooks as $classroombook)
        //     {
        //         $classroombookchapters = 0;
        //         $classroombooklessons = 0;
        //         $classroombookquizzes = 0;
        //         $classroombookparts = Db::table('parts')
        //             ->where('bookid', $classroombook->bookid)
        //             ->where('deleted', '0')
        //             ->get();
        //         $classroombookchapters = Db::table('chapters')
        //             ->where('bookid', $classroombook->bookid)
        //             ->where('deleted', '0')
        //             ->get();
        //         if(count($classroombookchapters) > 0)
        //         {
        //             foreach($classroombookchapters as $classroombookchapter)
        //             {
        //                 $classroombookchapterlessons = Db::table('lessons')
        //                     ->where('chapterid', $classroombookchapter->id)
        //                     ->where('deleted', '0')
        //                     ->get();
        //                 $classroombooklessons+=count($classroombookchapterlessons);
        //                 $classroombookchapterquizzes = Db::table('chapterquiz')
        //                     ->where('chapterid', $classroombookchapter->id)
        //                     ->where('deleted', '0')
        //                     ->get();
        //                 $classroombookquizzes+=count($classroombookchapterquizzes);
                        
        //             }
        //         }
        //         $classroombook->classroombookparts = count($classroombookparts);
        //         $classroombook->classroombookchapters = count($classroombookchapters);
        //         $classroombook->classroombooklessons = $classroombooklessons;
        //         $classroombook->classroombookquizzes = $classroombookquizzes;
        //     }
        // }

        // $selectbooks = DB::table('books')
        //     ->where('isactive', '1')
        //     ->where('deleted', '0')
        //     ->get();
        
        // if(count($selectbooks) > 0)
        // {
        //     foreach($selectbooks as $selectbook)
        //     {
        //         $chapters = 0;
        //         $lessons = 0;
        //         $quizzes = 0;
        //         $parts = Db::table('parts')
        //             ->where('bookid', $selectbook->id)
        //             ->where('deleted', '0')
        //             ->get();
        //         if(count($parts) > 0)
        //         {
        //             foreach($parts as $part)
        //             {
        //                 $partchapters = Db::table('chapters')
        //                     ->where('partid', $part->id)
        //                     ->where('deleted', '0')
        //                     ->get();
        //                 $chapters+=count($partchapters);
        //                 if(count($partchapters) > 0)
        //                 {
        //                     foreach($partchapters as $partchapter)
        //                     {
        //                         $chapterlessons = Db::table('lessons')
        //                             ->where('chapterid', $partchapter->id)
        //                             ->where('deleted', '0')
        //                             ->get();
        //                         $lessons+=count($chapterlessons);
        //                         $chapterquizzes = Db::table('chapterquiz')
        //                             ->where('chapterid', $partchapter->id)
        //                             ->where('deleted', '0')
        //                             ->get();
        //                         $quizzes+=count($chapterquizzes);
                                
        //                     }
        //                 }

        //             }
        //         }
        //         $selectbook->parts = count($parts);
        //         $selectbook->chapters = $chapters;
        //         $selectbook->lessons = $lessons;
        //         $selectbook->quizzes = $quizzes;
        //     }
        // }
        
        return view('teacher.classrooms.classroomview')
            // ->with('students', $students)
            ->with('teacherinfo', $createdby)
            ->with('classroominfo', $classroominfo);
            // ->with('classroombooks', $classroombooks)
            // ->with('selectbooks', $selectbooks)
            // ->with('posts', $posts)
            // ->with('files', $files);

    }
    public function addstudent(Request $request)
    {
        

        Db::table('classroomstudents')
                ->insert([
                    'classroomid'       => $request->get('classroomid'),
                    'studentid'         => $request->get('studid'),
                    'createdby'         => auth()->user()->id,
                    'createddatetime'   => \Carbon\Carbon::now('Asia/Manila')
                ]);
      
    }
    public function postv1(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        
        // $createdby = DB::table('teachers')
        //     ->where('userid', auth()->user()->id)
        //     ->first()
        //     ->id;
        
        $classroominfo = DB::table('classrooms')
            ->where('id', $request->get('classroomid'))
            ->get();

        $postid = DB::table('classroomposts')
            ->insertGetId([
                'classroomid'       => $request->get('classroomid'),
                'content'           => $request->get('postcontent'),
                'createdby'         => auth()->user()->id,
                'type'              => $request->get('posttype'),
                'usertypeid'        => 2,
                'createddatetime'   => \Carbon\Carbon::now('Asia/Manila')
            ]);

        
        if($request->has('files')){

            $countfiles = count(array_filter($request->file('files')));
            // return count(array_filter($request->file('files')));
            if($countfiles > 0){
    
                foreach($request->file('files') as $file){
    
                    if (! File::exists(public_path().'Classrooms/classroom'.$request->get('classroomid').'/'.'Attachments')) {
    
                        $path = public_path('Classrooms/classroom'.$request->get('classroomid').'/'.'Attachments');
            
                        if(!File::isDirectory($path)){
                            
                            File::makeDirectory($path, 0777, true, true);
            
                        }
                        
                    }
                    // return 'asdasda';
                    
                    // if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description)) {
            
                    //     $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description;
                        
                    //     if(!File::isDirectory($cloudpath)){
            
                    //         File::makeDirectory($cloudpath, 0777, true, true);
                            
                    //     }
                        
                    // }
            
            
                    // return basename($request->get('content'));
                    // $file = $request->file($file);
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    // return $extension;
                    // $filename = 
                    // $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description.'/';
            
            
                    // try{
            
                    //     $file->move($clouddestinationPath, $employeename->email.'-'.strtoupper($employeename->lastname).' '.strtoupper($employeename->firstname[0].'.').$extension);
            
                    // }
                    // catch(\Exception $e){
                       
                
                    // }
                        // return basename($request->get('content'));
                    $destinationPath = public_path('Classrooms/classroom'.$request->get('classroomid').'/'.'Attachments'.'/');
                        // return $filename;
                    
                    try{
            
                        $file->move($destinationPath,$file->getClientOriginalName());
            
                    }
                    catch(\Exception $e){
                       
                
                    }
                    DB::table('classroompostattach')
                        ->insert([
                            'postid'            => $postid,
                            'filename'          => $filename,
                            'filepath'          => 'Classrooms/classroom'.$request->get('classroomid').'/'.'Attachments'.'/'.$file->getClientOriginalName(),
                            'extension'         => $extension
                        ]);
                }
    
            }
        }
        return back();
    }
    public function comment(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        $createdby = DB::table('teachers')
            ->where('userid', auth()->user()->id)
            ->first()
            ->id;

        $commentid = DB::table('classroompostcomm')
            ->insertGetId([
                'postid'            => $request->get('postid'),
                'content'           => $request->get('commentcontent'),
                'createdby'         => $createdby,
                'usertypeid'        => '2',
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $comment = Db::table('classroompostcomm')
                ->where('id', $commentid)
                ->first();
        
        $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));

        return array($createdby,$comment);
    }
    public function refreshcomment(Request $request)
    {
        $commentsarray = array();
        $comments = Db::table('classroompostcomm')
            ->where('postid', $request->get('postid'))
            ->where('deleted', 0)
            ->get();
            
        if($request->get('commentids') == false){
            $comments = Db::table('classroompostcomm')
                ->where('postid', $request->get('postid'))
                ->where('deleted', 0)
                ->get();
            foreach($comments as $comment){
                if($comment->usertypeid == '2'){
                    $createdby = DB::table('teachers')
                        ->where('id', $comment->createdby)
                        ->first();
                    $comment->createdbyname = $createdby->firstname;
                    if(strtolower($createdby->gender) == 'female'){

                        $comment->avatar = 'avatar/teacher-female.png';

                    }else{
                        
                        $comment->avatar = 'avatar/teacher-male.png';
                    }
                    if($createdby->picurl == null){
                        $comment->picurl = $comment->avatar;
                    }
                }
                elseif($comment->usertypeid == '3'){
                    $createdby = DB::table('students')
                        ->where('id', $comment->createdby)
                        ->first();
                    $comment->createdbyname = $createdby->firstname;
                    if(strtolower($createdby->gender) == 'female'){

                        $comment->avatar = 'avatar/S(F) 1.png';

                    }else{
                        
                        $comment->avatar = 'avatar/S(M) 1.png';
                    }
                    if($createdby->picurl == null){
                        $comment->picurl = $comment->avatar;
                    }
                }
                $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));
                array_push($commentsarray, $comment);
            }
        }else{
            
            foreach($comments as $comment){
                if (!in_array($comment->id, $request->get('commentids'))) {
                    if($comment->usertypeid == '2'){
                        $createdby = DB::table('teachers')
                            ->where('id', $comment->createdby)
                            ->first();
                        $comment->createdbyname = $createdby->firstname;
                        if(strtolower($createdby->gender) == 'female'){
    
                            $comment->avatar = 'avatar/teacher-female.png';
    
                        }else{
                            
                            $comment->avatar = 'avatar/teacher-male.png';
                        }
                        if($createdby->picurl == null){
                            $comment->picurl = $comment->avatar;
                        }
                    }
                    elseif($comment->usertypeid == '3'){
                        $createdby = DB::table('students')
                            ->where('id', $comment->createdby)
                            ->first();
                        $comment->createdbyname = $createdby->firstname;
                        if(strtolower($createdby->gender) == 'female'){
    
                            $comment->avatar = 'avatar/S(F) 1.png';
    
                        }else{
                            
                            $comment->avatar = 'avatar/S(M) 1.png';
                        }
                        if($createdby->picurl == null){
                            $comment->picurl = $comment->avatar;
                        }
                    }
                    $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));
                    array_push($commentsarray, $comment);
                }else{
    
                }
            }
        }
        return array($request->get('postid'),$commentsarray);
    }
    public function addthisbook(Request $request)
    {
     
        $checkifexists = DB::table('classroombooks')
            ->where('bookid', $request->get('bookid'))
            ->where('classroomid', $request->get('classroomid'))
            ->where('deleted', 0)
            ->get();

        if(count($checkifexists) == 0)
        {

            DB::table('classroombooks')
                ->insert([
                    'bookid'            => $request->get('bookid'),
                    'classroomid'       => $request->get('classroomid'),
                    'createdby'         => auth()->user()->id,
                    'createddatetime'   => \Carbon\Carbon::now('Asia/Manila')
                ]);

            return 1;

        }else{

            return 0;

        }
    }

    public function classrooms(Request $request){

        $createdby = DB::table('teachers')
                        ->where('userid', auth()->user()->id)
                        ->first()
                        ->id;

        $classrooms = Db::table('classrooms')
                    ->select(
                        'classrooms.id',
                        'classrooms.classroomname',
                        'classrooms.code',
                        'classrooms.createddatetime'
                    )
                    ->join('teachers','classrooms.createdby','=','teachers.id')
                    ->where('classrooms.deleted','0')
                    ->where('createdby',$createdby)
                    ->get();

        if($request->get('table') == 'table' && $request->has('table')){

            // resources\views\teacher\classrooms\include\classroomtable.blade.php

            return view('teacher.classrooms.include.classroomtable')
                    ->with('classrooms',$classrooms);

        }


    }

    public function classroomfeed(Request $request){
        
        $posts = Db::table('classroomposts')
            ->where('classroomid', $request->get('classroomview'))
            ->where('deleted','0')
            ->orderByDesc('createddatetime')
            ->get();

        $createdby = DB::table('teachers')
                        ->where('userid', auth()->user()->id)
                        ->first();
                    


   
            
        if(count($posts) > 0){

            foreach($posts as $post){

                $post->createddatetime = date('F d, Y h:i:s A', strtotime($post->createddatetime));

                $attachments = Db::table('classroompostattach')
                    ->where('postid', $post->id)
                    ->where('deleted','0')
                    ->get();

                $post->attachments = $attachments;

                if($post->usertypeid == '2'){
                    
                        $post->mine = '1';
                        $post->name = $createdby->firstname.' '.$createdby->lastname.' '.$createdby->suffix;
                        $post->gender = $createdby->gender;
                        $post->picurl = $createdby->picurl;
                        
                }else{
                    $post->mine = '0';
                    $studentinfo = DB::table('students')
                        ->where('id', $post->createdby)
                        ->first();
                    $post->name = $studentinfo->firstname.' '.$studentinfo->lastname.' '.$studentinfo->suffix;
                    $post->gender = $studentinfo->gender;
                    $post->picurl = $studentinfo->picurl;
                }

                if($post->type == '3')
                {
                    $turnedinass = Db::table('classroomass')
                        ->where('assignmentid',$post->id)
                        ->where('deleted','0')
                        ->get();

                    $post->turnedin = count($turnedinass);
                }
                elseif($post->type == '4')
                {
                    $turnedinquiz = Db::table('classroomquiz')
                        ->where('quizid',$post->id)
                        ->where('deleted','0')
                        ->get();

                    $post->turnedin = count($turnedinquiz);
                }

                $comments = DB::table('classroompostcomm')
                    ->where('postid', $post->id)
                    ->where('deleted','0')
                    ->orderBy('createddatetime','asc')
                    ->get();
                    
                if(count($comments) > 0){

                    foreach($comments as $comment){
                        if($comment->usertypeid == '3'){
                            
                                $studentinfo = DB::table('students')
                                    ->where('id', $comment->createdby)
                                    ->first();
                                $comment->mine = '0';
                                $comment->name = $studentinfo->firstname.' '.$studentinfo->lastname.' '.$studentinfo->suffix;
                                $comment->gender = $studentinfo->gender;
                                $comment->picurl = $studentinfo->picurl;
                                
                        }else{
                            if($comment->createdby == $createdby->id){
                                $comment->mine = '1';
                                $comment->name = $createdby->firstname.' '.$createdby->lastname.' '.$createdby->suffix;
                                $comment->gender = $createdby->gender;
                                $comment->picurl = $createdby->picurl;
                            }else{
                                $comment->mine = '0';
                                $teacherinfo = DB::table('teachers')
                                    ->where('id', $comment->createdby)
                                    ->first();
                                $comment->name = $teacherinfo->firstname.' '.$teacherinfo->lastname.' '.$teacherinfo->suffix;
                                $comment->gender = $teacherinfo->gender;
                                $comment->picurl = $teacherinfo->picurl;
                            }
                        }
                        $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));
                    }

                }
                $post->comments = $comments;
            }

        }

        return view('teacher.classrooms.include.includefeed')
                ->with('createdby',$createdby)
                ->with('posts',$posts);
                


    }

    public function post(Request $request){


        $post = DB::table('classroomposts');


        if($request->get('postid') != null && $request->has('postid')){

            $post =   $post->where('id',$request->get('postid')) ;

        }

        if($request->get('remove') == 'remove' && $request->has('remove')){

            $post =   $post->where('createdby',auth()->user()->id);

            $post->update([
                'deleted'=>'1',
                'deletedby'=>auth()->user()->id,
                'deleteddatetime'=>\Carbon\Carbon::now('Asia/Manila')
            ]);

        }
        if($request->get('update') == 'update' && $request->has('update')){

            $post =   $post->where('createdby',auth()->user()->id);

            $post->update([
                'content'=>$request->get('content'),
                'updatedby'=>auth()->user()->id,
                'updateddatetime'=>\Carbon\Carbon::now('Asia/Manila')
            ]);


        }


    }


    public function classroomstudents(Request $request){

        $classroomstudents = DB::table('classroomstudents')
                                ->where('classroomstudents.deleted',0);

        if($request->get('classroomid') != null && $request->has('classroomid')){

            $classroomstudents = $classroomstudents->where('classroomid',$request->get('classroomid'));
                                                  

                                              
        }

        if($request->get('studentroomid') != null && $request->has('studentroomid')){

            $classroomstudents =  $classroomstudents->where('id',$request->get('studentroomid'));
         
        }

  

        if($request->get('student') == 'student' && $request->has('student')){

            $classroomstudents =  $classroomstudents
                                    ->join('students',function($join){
                                        $join->on('classroomstudents.studentid','=','students.id');
                                        $join->where('students.deleted',0);
                                    })
                                    ->select(
                                        'students.firstname',
                                        'students.lastname',
                                        'students.id',
                                        'classroomstudents.id as classid'
                                    )->get();
                           
            return view('teacher.classrooms.include.studentststab')
                        ->with('classroomstudents',$classroomstudents);

        }
        else if($request->get('remove') == 'remove' && $request->has('remove')){

            $classroomstudents = $classroomstudents->where('createdby',auth()->user()->id);

            $classroomstudents->update([
                'deleted'=>1,
                'deletedby'=>auth()->user()->id,
                'deleteddatetime'=>\Carbon\Carbon::now('Asia/Manila')
            ]);

        }

    }


    public function students(Request $request){

        $students = DB::table('students')
                        ->where('students.deleted',0);


        if($request->get('search') != null && $request->has('search')){

            $students =  $students->where(function($query) use($request){

                $query->where('students.firstname','like',$request->get('search').'%');
                $query->orWhere('students.lastname','like',$request->get('search').'%');
            

            });

        }
        else{

            $students =  $students->where('students.id',0);

        }


        if($request->get('classroomid') != null && $request->has('classroomid')){

            $students =  $students->leftJoin('classroomstudents',function($join) use($request){
                                        $join->on('students.id','=','classroomstudents.studentid');
                                        $join->where('classroomstudents.classroomid',$request->get('classroomid'));
                                        $join->where('classroomstudents.deleted',0);
                                    });

        }


        if($request->get('list') == 'list' && $request->has('list')){

            $students =  $students->select('students.*','classroomstudents.id as classroomid' )->get();

            return view('teacher.classrooms.include.studentlist')
                             ->with('students',$students);

        }


        
    }

    public function classroombooks(Request $request){


        $classroombooks = DB::table('classroombooks')
                            ->where('classroombooks.deleted',0);

        if($request->get('classroomid') != null && $request->has('classroomid')){

            $classroombooks = $classroombooks->where('classroomid',$request->get('classroomid'))
                                                   ->where('classroombooks.createdby',auth()->user()->id);

                                              
        }

        if($request->get('classroombookid') != null && $request->has('classroombookid')){

            $classroombooks = $classroombooks->where('id',$request->get('classroombookid'));
                                                   
        }

 


        if($request->get('table') == 'table' && $request->has('table')){

            $classroombooks = $classroombooks
                                ->join('books',function($join){
                                        $join->on('classroombooks.bookid','=','books.id');
                                        $join->where('books.deleted',0);
                                })
                                ->select('books.title','classroombooks.*','books.picurl')
                                ->get();

            return view('teacher.classrooms.books.bookstable')
                             ->with('classroombooks',$classroombooks);

        }
        else if($request->get('remove') == 'remove' && $request->has('remove')){

            $classroombooks->update([
                'deleted'=>1,
                'deletedby'=>auth()->user()->id,
                'deleteddatetime'=>\Carbon\Carbon::now('Asia/Manila')
            ]);

        }

    }

    public function allbooks(Request $request){


            $books = DB::table('books')
                    ->where('books.deleted',0);

        
            if($request->get('search') != null && $request->has('search')){

                $books =  $books->where(function($query) use($request){
                    $query->where('books.title','like','%'.$request->get('search').'%');
                });

            }
            // else if($request->get('search') == null && $request->has('search')){

            //     $books =  $books->where('books.id',0);

            // }
        
            if($request->get('classroomid') != null && $request->has('classroomid')){

                $books =  $books->leftJoin('classroombooks',function($join) use($request){
                                    $join->on('books.id','=','classroombooks.bookid');
                                    $join->where('classroombooks.classroomid',$request->get('classroomid'));
                                    $join->where('classroombooks.deleted',0);
                                });

            }
            

            if($request->get('bookid') != null && $request->has('bookid')){

                $books =  $books->where('books.id',$request->get('bookid'));

            }

            if($request->get('list') == 'list' && $request->has('list')){

                $teacher = DB::table('teachers')
                                ->where('userid',auth()->user()->id)
                                ->select('id')
                                ->first();

                $books = $books->join('teacherbooks',function($join) use($teacher){
                            $join->on('books.id','=','teacherbooks.bookid');
                            $join->where('teacherbooks.deleted',0);
                            $join->where('teacherbooks.teacherid',$teacher->id);
                        });
                                

                $books =  $books->select('books.*','classroombooks.id as classroomid' )->get();

                return view('teacher.classrooms.books.booklist')
                        ->with('books',$books);

            }
            else if($request->get('parts') == 'parts' && $request->has('parts')){



                $bookParts = $books->join('parts',function($join){
                                    $join->on('books.id','=','parts.bookid');
                                    $join->where('parts.deleted',0);
                                });

                if(count($books->get()) == 0){

                    $type = 2;

                    $books = DB::table('books')
                                    ->where('books.deleted',0);

                    if($request->get('bookid') != null && $request->has('bookid')){

                        $books =  $books->where('books.id',$request->get('bookid'));
            
                    }
                    
                    $bookChapter =  $books->join('chapters',function($join){
                                        $join->on('books.id','=','chapters.bookid');
                                        $join->where('chapters.deleted',0);
                                    });

                    $books = $bookChapter->select('chapters.*')->get();

                }
                else{

                    $type = 1;

                    $bookParts = $books->select('parts.*')->get();

                    $books = $bookParts ;
                }
                
                return view('global.viewbook.booklist.parts')
                                ->with('parts',$books)
                                ->with('type',$type);


            }
            else if($request->get('chapters') == 'chapters' && $request->has('chapters')){

                $books = $books->join('chapters',function($join){
                                    $join->on('books.id','=','chapters.bookid');
                                    $join->where('chapters.deleted',0);
                                });


                if($request->get('partid') != null && $request->has('partid')){

                    $books = $books->where('chapters.partid',$request->get('partid'));

                }

                
        
                return view('global.viewbook.booklist.chapter')
                        ->with('chapters',$books->select('chapters.*')->get());


            }

            else if($request->get('lessons') == 'lessons' && $request->has('lessons')){


                $lessons = array();

                if($request->get('chapterid') != null && $request->has('chapterid')){

                    
                    $lessons = DB::table('lessons')
                                ->where('chapterid',$request->get('chapterid'))
                                ->where('lessons.deleted',0)
                                ->get();


                    $chapter = DB::table('chapters')
                                ->where('id',$request->get('chapterid'))
                                ->where('chapters.deleted',0)
                                ->first();

                    $chapterQuiz = DB::table('lesssonquiz')
                                ->where('chapterid',$request->get('chapterid'))
                                ->where('lesssonquiz.deleted',0)
                                ->get();

                    $lessons = collect($lessons)->toArray();

                    foreach($chapterQuiz as $item){

                        $item->quiz = true;
                        $item->type = 1;

                        array_push($lessons,$item);
        
                    }

                }

                if(isset($chapter->title) && $chapter->title == 'Download Links'){


                    foreach($lessons as $item){

                        $item->type = 2;

                        $links = DB::table('lessoncontents')
                                    ->where('lessonid',$item->id)
                                    ->where('deleted',0)
                                    ->first();

                        // return collect($links);

                        if(isset($links->content) && $links->type == 4){

                            $item->description = $links->content;

                        }    
                        else{

                            $item->description = "#";
                        }    
                    

                    }
                

                    


                }

        
                return view('global.viewbook.booklist.lesson')
                        ->with('lessons',$lessons);


            }


            

        }




}
