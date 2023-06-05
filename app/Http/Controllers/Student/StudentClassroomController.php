<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
use File;
use Carbon\Carbon;
class StudentClassroomController extends Controller
{
    public static function index(Request $request)
    {

    

        $classroominfo = Db::table('classrooms')
                            ->where('id',Crypt::decrypt($request->get('classroomid')))
                            ->where('deleted','0')
                            ->first();

        $createdby = DB::table('teachers')
            ->where('id', $classroominfo->createdby)
            ->first();

                
        // return "sdfsfd";

        // resources\views\student\studentclassroom\studentclassroomview.blade.php
        return view('student.studentclassroom.studentclassroomview')
                    ->with('teacherinfo', $createdby)
                    ->with('classroominfo', $classroominfo);


        // $request->merge([
        //         'classroomid'   => Crypt::decrypt($request->get('classroomid'))
        // ]);
        // $getbooks = DB::table('classroombooks')
        //     ->where('classroomid', $request->get('classroomid'))
        //     ->get();

        // $classroominfo = Db::table('classrooms')
        //     ->where('id', $request->get('classroomid'))
        //     ->where('deleted','0')
        //     ->first();
            
        // $students = Db::table('students')
        //     ->where('deleted','0')
        //     ->get();
        
        // if(count($students)>0){
        //     foreach($students as $student){
        //         $checkifexistsinclassroom = Db::table('classroomstudents')
        //             ->where('classroomid', $request->get('classroomid'))
        //             ->where('studentid', $student->id)
        //             ->get();
        //         if(count($checkifexistsinclassroom)  == 0){
        //             $student->exists = 0;
        //         }else{
        //             $student->exists = 1;
        //         }
        //     }
        // }
        
        // $studentid = DB::table('students')
        //     ->where('userid', auth()->user()->id)
        //     ->first()
        //     ->id;
        // if(auth()->user()->type == 3){
        //     $createdby = DB::table('students')
        //         ->where('userid', auth()->user()->id)
        //         ->first();
        // }else{
        //     $createdby = DB::table('teachers')
        //         ->where('id', $classroominfo->createdby)
        //         ->first();
        // }

        // $posts = Db::table('classroomposts')
        //     ->where('classroomid', $request->get('classroomid'))
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

        //         if($post->usertypeid == '3'){
        //             if($post->createdby == $createdby->id){
        //                 $post->mine = '1';
        //                 $post->name = $createdby->firstname.' '.$createdby->lastname.' '.$createdby->suffix;
        //                 $post->gender = $createdby->gender;
        //                 $post->picurl = $createdby->picurl;
        //             }else{
        //                 $post->mine = '0';
        //                 $studentinfo = DB::table('students')
        //                     ->where('id', $post->createdby)
        //                     ->first();
        //                 $post->name = $studentinfo->firstname.' '.$studentinfo->lastname.' '.$studentinfo->suffix;
        //                 $post->gender = $studentinfo->gender;
        //                 $post->picurl = $studentinfo->picurl;
        //             }
        //         }else{
        //             $post->mine = '0';
        //             $teacherinfo = DB::table('teachers')
        //                 ->where('id', $post->createdby)
        //                 ->first();
        //             $post->name = $teacherinfo->firstname.' '.$teacherinfo->lastname.' '.$teacherinfo->suffix;
        //             $post->gender = $teacherinfo->gender;
        //             $post->picurl = $teacherinfo->picurl;
        //         }


        //         if($post->type == '3')
        //         {
        //             $turnedinass = Db::table('classroomass')
        //                 ->where('assignmentid',$post->id)
        //                 ->where('createdby',auth()->user()->id)
        //                 ->where('deleted','0')
        //                 ->get();

        //             $post->turnedin = count($turnedinass);
        //         }
        //         elseif($post->type == '4')
        //         {
        //             $turnedinquiz = Db::table('classroomquiz')
        //                 ->where('quizid',$post->id)
        //                 ->where('createdby',auth()->user()->id)
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
        //                 if($comment->usertypeid == '2' && $comment->createdby == $createdby->id){
        //                     $comment->mine = '1';
        //                     $comment->name = $createdby->firstname.' '.$createdby->lastname.' '.$createdby->suffix;
        //                     $comment->gender = $createdby->gender;
        //                     $comment->picurl = $createdby->picurl;
        //                 }else{
        //                     $comment->mine = '0';
        //                     $studentinfo = DB::table('students')
        //                         ->where('id', $comment->createdby)
        //                         ->first();
        //                     $comment->name = $studentinfo->firstname.' '.$studentinfo->lastname.' '.$studentinfo->suffix;
        //                     $comment->gender = $studentinfo->gender;
        //                     $comment->picurl = $studentinfo->picurl;
        //                 }
        //                 $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));
        //             }

        //         }
        //         $post->comments = $comments;
        //     }

        // }
        
        // $classrooms = Db::table('classrooms')
        //     ->select(
        //         'classrooms.id',
        //         'classrooms.classroomname',
        //         'classrooms.createddatetime',
        //         'teachers.firstname',
        //         'teachers.middlename',
        //         'teachers.lastname',
        //         'teachers.suffix'
        //     )
        //     ->join('teachers','classrooms.createdby','=','teachers.id')
        //     ->where('classrooms.deleted','0')
        //     ->distinct()
        //     ->get();

        // if(count($classrooms) > 0){
        //     foreach($classrooms as $classroom){
        //         $classroom->createddatetime = date('F d, Y h:i:s A', strtotime($classroom->createddatetime));
        //         $classroom->students = Db::table('classroomstudents')
        //             ->where('classroomid', $classroom->id)
        //             ->where('deleted','0')
        //             ->count();

        //         $joined = Db::table('classroomstudents')
        //             ->where('classroomid', $classroom->id)
        //             ->where('classroomstudents.studentid',$studentid)
        //             ->where('deleted','0')
        //             ->get();
                
        //         if(count($joined) == 0){
        //             $classroom->joined = 0;
        //         }else{
        //             $classroom->joined = 1;
        //             $classroom->datejoined = date('F d, Y', strtotime($joined[0]->createddatetime));
        //         }
        //         $classroom->books = Db::table('classroombooks')
        //             ->where('classroomid', $classroom->id)
        //             ->where('deleted','0')
        //             ->count();
        //     }
        // }
        // $classroombooks = DB::table('classroombooks')
        //     ->select('classroombooks.id','classroombooks.bookid','classroombooks.classroomid','classroombooks.createddatetime','books.title','books.description','books.picurl')
        //     ->join('books', 'classroombooks.bookid','=','books.id')
        //     ->where('classroomid', $request->get('classroomid'))
        //     ->get();
        
        // if(count($classroombooks) > 0)
        // {
        //     foreach($classroombooks as $classroombook)
        //     {
        //         $classroombookchapters = 0;
        //         $classroombookteachers = 0;
        //         $classroombookquizzes = 0;
        //         $classroombookparts = Db::table('parts')
        //             ->where('bookid', $classroombook->bookid)
        //             ->where('deleted', '0')
        //             ->get();
        //         if(count($classroombookparts) > 0)
        //         {
        //             foreach($classroombookparts as $classroombookpart)
        //             {
        //                 $classroombookpartchapters = Db::table('chapters')
        //                     ->where('partid', $classroombookpart->id)
        //                     ->where('deleted', '0')
        //                     ->get();
        //                 $classroombookchapters+=count($classroombookpartchapters);
        //                 if(count($classroombookpartchapters) > 0)
        //                 {
        //                     foreach($classroombookpartchapters as $classroombookpartchapter)
        //                     {
        //                         $classroombookchapterteachers = Db::table('teachers')
        //                             ->where('chapterid', $classroombookpartchapter->id)
        //                             ->where('deleted', '0')
        //                             ->get();
        //                         $classroombookteachers+=count($classroombookchapterteachers);
        //                         $classroombookchapterquizzes = Db::table('chapterquiz')
        //                             ->where('chapterid', $classroombookpartchapter->id)
        //                             ->where('deleted', '0')
        //                             ->get();
        //                         $classroombookquizzes+=count($classroombookchapterquizzes);
                                
        //                     }
        //                 }

        //             }
        //         }
        //         $classroombook->classroombookparts = count($classroombookparts);
        //         $classroombook->classroombookchapters = $classroombookchapters;
        //         $classroombook->classroombookteachers = $classroombookteachers;
        //         $classroombook->classroombookquizzes = $classroombookquizzes;
        //     }
        // }
        // return view('student.studentclassroom.studentclassroomview')
        //     ->with('classrooms', $classrooms)
        //     ->with('students', $students)
        //     ->with('classroominfo', $classroominfo)
        //     ->with('studentinfo', $createdby)
        //     ->with('books', $getbooks)
        //     ->with('classroombooks', $classroombooks)
        //     ->with('posts', $posts);
    }
    public function joinclassroom(Request $request)
    {
        
        date_default_timezone_set('Asia/Manila');

        $classroomcode = DB::table('classrooms')
            ->where('id', Crypt::decrypt($request->get('classroomid')))
            ->first()
            ->code;

        if(isset($classroomcode)){

            $studentid = DB::table('students')
                            ->where('userid', auth()->user()->id)
                            ->first()
                            ->id;

            DB::table('classroomstudents')
                ->insert([
                    'classroomid'       => Crypt::decrypt($request->get('classroomid')),
                    'studentid'         => $studentid,
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);


            return '1';

        }
        else{

            return '0';
        }

    }
    public function post(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        
        $createdby = DB::table('students')
            ->where('userid', auth()->user()->id)
            ->first();
        
        $classroominfo = DB::table('classrooms')
            ->where('id', $request->get('classroomid'))
            ->get();

        $postid = DB::table('classroomposts')
            ->insertGetId([
                'classroomid'       => $request->get('classroomid'),
                'content'           => $request->get('postcontent'),
                'createdby'         => $createdby->id,
                'usertypeid'        => 3,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);
        if($request->has('files')){
            $countfiles = count(array_filter($request->file('files')));
            // return count(array_filter($request->file('files')));
            if($countfiles > 0){
    
                foreach($request->file('files') as $file){
    
                    if (! File::exists(public_path().'Classrooms/classroom'.$request->get('classroomid').'/'.'Student Attachments'.'/'.'student'.$createdby->lastname.'id'.$createdby->id)) {
    
                        $path = public_path('Classrooms/classroom'.$request->get('classroomid').'/'.'Student Attachments'.'/'.'student'.$createdby->lastname.'id'.$createdby->id);
            
                        if(!File::isDirectory($path)){
                            
                            File::makeDirectory($path, 0777, true, true);
            
                        }
                        
                    }
                    // return 'asdasda'.
                    
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
                    // $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description.'/'.
            
            
                    // try{
            
                    //     $file->move($clouddestinationPath, $employeename->email.'-'.strtoupper($employeename->lastname).' '.strtoupper($employeename->firstname[0].'.').$extension);
            
                    // }
                    // catch(\Exception $e){
                       
                
                    // }
                        // return basename($request->get('content'));
                    $destinationPath = public_path('Classrooms/classroom'.$request->get('classroomid').'/'.'Student Attachments'.'/'.'student'.$createdby->lastname.'id'.$createdby->id.'/');
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
                            'filepath'          => 'Classrooms/classroom'.$request->get('classroomid').'/'.'Student Attachments'.'/'.'student'.$createdby->lastname.'id'.$createdby->id.'/'.$file->getClientOriginalName(),
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

        $createdby = DB::table('students')
            ->where('userid', auth()->user()->id)
            ->first();

        $commentid = DB::table('classroompostcomm')
            ->insertGetId([
                'postid'            => $request->get('postid'),
                'content'           => $request->get('commentcontent'),
                'createdby'         => $createdby->id,
                'usertypeid'        => '3',
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);
        
        $comment = Db::table('classroompostcomm')
                ->where('id', $commentid)
                ->first();
        
        $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));

        return array($createdby,$comment);
    }
    public function refreshpost(Request $request)
    {
        $postsarray = array();
        $posts = Db::table('classroomposts')
            ->where('classroomid', $request->get('classroomid'))
            ->where('deleted', 0)
            ->get();
        $createdby = DB::table('students')
            ->where('userid', auth()->user()->id)
            ->first();

        if($request->get('postids')){
            foreach($posts as $post){
                $attachments = Db::table('classroompostattach')
                    ->where('postid', $post->id)
                    ->where('deleted','0')
                    ->get();

                $post->attachments = $attachments;
                if (!in_array($post->id, $request->get('postids'))) {
                    if($post->usertypeid == '2'){
                        $teacherinfo = DB::table('teachers')
                            ->where('id', $post->createdby)
                            ->first();
                        if(strtolower($teacherinfo->gender) == "female"){
    
                            $post->avatar = "avatar/teacher-female.png";
    
                        }else{
                            
                            $post->avatar = "avatar/teacher-male.png";
                        }
                        if($teacherinfo->picurl == null){
                            $post->picurl = $post->avatar;
                        }
                        $post->mine = '0';
                        $post->name = $teacherinfo->firstname.' '.$teacherinfo->lastname.' '.$teacherinfo->suffix;
                        $post->gender = $teacherinfo->gender;
                        $post->picurl = $teacherinfo->picurl;
                    }
                    elseif($post->usertypeid == '3'){
                        if($post->createdby == $createdby->id){
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
                        $post->createdbyname = $createdby->firstname;
                        if(strtolower($createdby->gender) == "female"){
    
                            $post->avatar = "avatar/S(F) 1.png";
    
                        }else{
                            
                            $post->avatar = "avatar/S(M) 1.png";
                        }
                        if($createdby->picurl == null){
                            $post->picurl = $post->avatar;
                        }
                    }
                    $post->createddatetime = date('F d, Y h:i:s A', strtotime($post->createddatetime));
                    array_push($postsarray, $post);
                }
            }
        }else{

        }
        // return $postsarray;
        $htmlarray = array();
        if(count($postsarray)> 0){

            foreach($postsarray as $postarr){
                $posthtml =  '<div class="row">'.
                '<div class="col-md-12">'.
                 '<div class="card rounded">'.
                 '<div class="card-header pb-0">'.
                 '<div class="row">'.
                 '<div class="col-md-9">'.
                 '<input class="postids" type="hidden" value="'.$postarr->id.'"/>'.
                 '<h5 class="uk-heading-line">'.
                 '<span>';
                 
                 if($postarr->picurl == null){
                    $postarr->picurl = $postarr->avatar;
                    }
                    $posthtml .=  '<img src="' . url($postarr->picurl) . '" onerror="this.onerror = null, this.src='.url($postarr->avatar).'" alt="" class="skill-card-icon"  style="width: 40px;">';
                 
                 if($postarr->mine == 1){
                    $posthtml.=
                    'Me <small class="text-muted">('.$post->name.')</small>'.
                    '<button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only ">'.
                    '<small><i class="uil-edit-alt"></i></small>'.
                    '</button>'.
                    '<button type="button" class="btn btn-secondary  btn-sm rounded-circle btn-icon-only ">'.
                    '<small><i class="uil-trash-alt"></i></small>'.
                    '</button>';
                 }
                 else{
                    
                    $posthtml.= $postarr->name;
                 }
                 $posthtml.=
                 '</span>'.
                 '</h5>'. 
                 '</div>'.
                 '<div class="col-md-3">'.
                 '<small class="text-muted float-right pt-2"> '.$postarr->createddatetime.'</small>'.
                 '</div>'.
                 '</div>'.
                 '</div>'.
                            
                '<div class="card-body pb-0">'.
                $postarr->content;
                if(count($postarr->attachments) > 0){

                    $posthtml.='<div class="path-wrap">'.
    
                    '<div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">'.

                        '<div uk-lightbox>'.
                        '<ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-2-6@m uk-grid-match uk-grid p-2" style="transform: translate3d(0px, 0px, 0px);">';

                    foreach($postarr->attachments as  $attachment){
                        $posthtml.='<li tabindex="-1" class="uk-active ">'.
                            '<div class="skill-card p-1 bg-soft-dark" style="">'.
                                '<a href="'.$attachment->filepath.'" class="mr-2">';
                            if($attachment->extension== "doc"|| $attachment->extension == "docx" ){
                                $posthtml.='<img src="{{asset(assets/images/doc.png)}}" alt="" class="skill-card-icon" style="width: 40px;">';

                            }elseif($attachment->extension == "ppt" ||  $attachment->extension == "pptx" ){
                                $posthtml.='<img src="assets/images/ppt.png" alt="" class="skill-card-icon" style="width:40px;">';

                            }elseif($attachment->extension == "xls" ||  $attachment->extension == "xlsx" ){
                                $posthtml.='<img src="assets/images/xls.jpg" alt="" class="skill-card-icon" style="width: 40px;">';
                                
                            }elseif($attachment->extension == "pdf"){
                                $posthtml.='<img src="assets/images/pdf.png" alt="" class="skill-card-icon" style="width: 40px;">';
                                
                            }elseif($attachment->extension == "mp3" ||  '.$attachment->extension.' == "m4a"){
                                $posthtml.='<img src="assets/images/audio.png" alt="" class="skill-card-icon" style="width: 40px;">';
                                
                            }elseif($attachment->extension == "mp4"){
                                $posthtml.='<img src="assets/images/video.png" alt="" class="skill-card-icon" style="width: 40px;">';
                                
                            }else{
                                $posthtml.='<img src="'.$attachment->filepath.'" alt="" class="skill-card-icon" style="width: 40px;">';

                            }
                        $posthtml.='</a>'.
                                '<div style="display: block; width: 80%">'.
                                    '<p style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis !important; " >'.$attachment->filename.'</p>'.
                                    '<p class="skill-card-subtitle">'.strtoupper($attachment->extension).' File'.
                                    '</p>'.
                                '</div>'.
                            '</div>'.
                        '</li>';
                    }
                    $posthtml.='</ul>'.
                    '</div>'.
                        '<a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible bg-dark" uk-slider-item="previous"></a>'.
                        '<a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next bg-dark" href="#" uk-slider-item="next"></a>'.

                    '</div>'.

                '</div>';
                }
                $posthtml.='</div>'.
                            '<div class="card-footer bg-soft-dark pt-2">'.                    
                                '<div class="commentscontainerautodisplay" postid="'.$postarr->id.'">'.
                                '</div>'.
                                '<div class="commentscontainer" postid="'.$postarr->id.'"></div>'.
                                '<form action="/studentpostcomment" method="get">'.
                                    '<input type="hidden" name="postid" value="'.$post->id.'"/>'.
                                    '<div class="row">'.
                                        '<div class="col-1 col-md-1 col-lg-1 pr-0">'.
                                        '</div>'.
                                        '<div class="col-11 col-md-9 col-lg-9 pl-0">'.
                                            '<input class="form-control" style="border-radius: 50px; " name="commentcontent" type="text" placeholder="Write something...">'.
                                        '</div>'. 
                                        '<div class="col-md-2 col-lg-2 pr-0 pl-0 text-center">'.
                                            '<button type="button" class="btn btn-success commentbutton">Comment</button>'.
                                        '</div>'.
                                    '</div>'.
                                '</form>'.
                            '</div>'.
                        '</div>'.
                    '</div>'.
                '</div>';

                array_push($htmlarray, $posthtml);
            }
        }

        return $htmlarray;
    }
    public function refreshcomment(Request $request)
    {
        $commentsarray = array();
        $comments = Db::table('classroompostcomm')
            ->where('postid', $request->get('postid'))
            ->where('deleted', 0)
            ->get();
            
        if($request->get('commentids')){
            foreach($comments as $comment){
                if (!in_array($comment->id, $request->get('commentids'))) {
                    if($comment->usertypeid == '2'){
                        $createdby = DB::table('teachers')
                            ->where('id', $comment->createdby)
                            ->first();
                        $comment->createdbyname = $createdby->firstname;
                        if(strtolower($createdby->gender) == "female"){
    
                            $comment->avatar = "avatar/teacher-female.png";
    
                        }else{
                            
                            $comment->avatar = "avatar/teacher-male.png";
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
                        if(strtolower($createdby->gender) == "female"){
    
                            $comment->avatar = "avatar/S(F) 1.png";
    
                        }else{
                            
                            $comment->avatar = "avatar/S(M) 1.png";
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
        }else{
            if(count($comments) > 0){
                foreach($comments as $comment){
                    if($comment->usertypeid == '2'){
                        $createdby = DB::table('teachers')
                            ->where('id', $comment->createdby)
                            ->first();
                        $comment->createdbyname = $createdby->firstname;
                        if(strtolower($createdby->gender) == "female"){
    
                            $comment->avatar = "avatar/teacher-female.png";
    
                        }else{
                            
                            $comment->avatar = "avatar/teacher-male.png";
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
                        if(strtolower($createdby->gender) == "female"){
    
                            $comment->avatar = "avatar/S(F) 1.png";
    
                        }else{
                            
                            $comment->avatar = "avatar/S(M) 1.png";
                        }
                        if($createdby->picurl == null){
                            $comment->picurl = $comment->avatar;
                        }
                    }
                    $comment->createddatetime = date('F d, Y h:i:s A', strtotime($comment->createddatetime));
                    array_push($commentsarray, $comment);
                }
            }
        }
        return array($request->get('postid'),$commentsarray);
    }

    public function studentfeed(Request $request){



        $posts = Db::table('classroomposts')
                        ->where('classroomid', $request->get('classroomview'))
                        ->where('deleted','0')
                        ->orderByDesc('createddatetime')
                        ->get();

        
        // return $posts;

            if(count($posts) > 0){

                foreach($posts as $post){
                    

                    // $post->createddatetime = date('F d, Y h:i:s A', strtotime($post->createddatetime));

                    $attachments = Db::table('classroompostattach')
                        ->where('postid', $post->id)
                        ->where('deleted','0')
                        ->get();

                    $createdby = DB::table('teachers')
                        ->where('userid', $post->createdby)
                        ->first();
            
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

                    $comments = DB::table('classroompostcomm')
                                ->where('postid', $post->id)
                                ->where('deleted','0')
                                ->orderBy('createddatetime','asc')
                                ->get();


                    if(count($comments)>0)
                    {
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
                                try{
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
                                }catch(\Exception $error)
                                {
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

            // resources\views\student\studentclassroom\feed.blade.php
            // return $posts;

            return view('student.studentclassroom.feed')->with('posts',$posts);

    }


    public function studentclassmates(Request $request){
    
        
        $classroomstudents = DB::table('classroomstudents')
                                ->where('classroomstudents.deleted',0);

        if($request->get('classroomview') != null && $request->has('classroomview')){

            $classroomstudents = $classroomstudents->where('classroomid',$request->get('classroomview'));
                            
        }

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

        // resources\views\student\studentclassroom\classmates.blade.php
        return view('student.studentclassroom.classmates')
            ->with('classroomstudents',$classroomstudents);

            
    }

    public function studentbooks(Request $request){
    
        
        $classroombooks = DB::table('classroombooks')
                                ->where('classroombooks.deleted',0);

        if($request->get('classroomview') != null && $request->has('classroomview')){

            $classroombooks = $classroombooks->where('classroomid',$request->get('classroomview'));
                                
        }

        $classroombooks = $classroombooks
                            ->join('books',function($join){
                                    $join->on('classroombooks.bookid','=','books.id');
                                    $join->where('books.deleted',0);
                            })
                            ->select('books.title','classroombooks.*','books.picurl')
                            ->get();

                            // resources\views\student\studentclassroom\books.blade.php

        return view('student.studentclassroom.books')
                        ->with('classroombooks',$classroombooks);

            
    }

    public function searchclassroom(Request $request){

        
        $classroom = DB::table('classrooms')
                    ->where('code',$request->get('roomcode'))
                    ->where('classrooms.deleted',0)
                    ->join('teachers',function($join){
                        $join->on('classrooms.createdby','=','teachers.id');
                        $join->where('teachers.deleted',0);
                    })
                    ->select('classrooms.classroomname','classrooms.code','classrooms.id','teachers.firstname','teachers.lastname')
                    ->first();

        if(isset( $classroom->id)){

            $studentid = DB::table('students')
                            ->where('userid', auth()->user()->id)
                            ->first()
                            ->id;

            $checkifExist = DB::table('classroomstudents')
                            ->where('studentid',$studentid)
                            ->where('classroomid',$classroom->id)
                            ->count();

            if( $checkifExist == 0){

                return view('student.studentclassroom.classroomcard')->with('classroom',$classroom);

            }else{

                return 1;

            }
          
           
        }else{

            return 0;

        }
        

    }


    public function loadclassroomtable(){

        $studentid = DB::table('students')
            ->where('userid', auth()->user()->id)
            ->first()
            ->id;

            $classrooms = Db::table('classrooms')
                ->select(
                    'classrooms.id',
                    'classrooms.classroomname',
                    'classrooms.createddatetime',
                    'teachers.firstname',
                    'teachers.middlename',
                    'teachers.lastname',
                    'teachers.suffix',
                    'classrooms.code'
                )
                ->join('teachers','classrooms.createdby','=','teachers.id')
                ->where('classrooms.deleted','0')
                ->distinct()
                ->get();
                
            if(count($classrooms) > 0){
                foreach($classrooms as $classroom){
                    $classroom->createddatetime = date('F d, Y h:i:s A', strtotime($classroom->createddatetime));
                    $classroom->students = Db::table('classroomstudents')
                        ->where('classroomid', $classroom->id)
                        ->where('deleted','0')
                        ->count();

                    $joined = Db::table('classroomstudents')
                        ->where('classroomid', $classroom->id)
                        ->where('classroomstudents.studentid',$studentid)
                        ->where('deleted','0')
                        ->get();
                    
                    if(count($joined) == 0){
                        $classroom->joined = 0;
                    }else{
                        $classroom->joined = 1;
                        $classroom->datejoined = date('F d, Y', strtotime($joined[0]->createddatetime));
                    }
                    $classroom->books = Db::table('classroombooks')
                        ->where('classroomid', $classroom->id)
                        ->where('deleted','0')
                        ->count();
                }
            }

        return view('student.studentclassroom.classroomtable')->with('classrooms',$classrooms);


    }


    public function studentquiz(Request $request){
    
        $currentTime = Carbon::now('Asia/Manila')->isoFormat('YYYY-MM-DD HH:mm:ss');


        $sched = DB::table('teacherquizsched')
                ->where('teacherquizsched.deleted', 0);

            if ($request->get('classroomview') != null && $request->has('classroomview')) {
                $sched = $sched->where('classroomid', $request->get('classroomview'));
            }

            $sched = $sched->join('teacherquiz', function ($join) {
                    $join->on('teacherquizsched.teacherquizid', '=', 'teacherquiz.id');
                    $join->where('teacherquiz.deleted', 0);
                })
                ->select('teacherquizsched.*', 'teacherquiz.*' )
                ->get();

        foreach ($sched as $item){

            $numberOfAttempts = 0;
            $numberOfAttempts =  DB::table('teacherquizrecords')
                ->where('submittedby',auth()->user()->id)
                ->where('teacherquizid',$item->teacherquizid)
                ->where('quizstatus', 1)
                ->count();
            
            if($numberOfAttempts == 0){
                    $item->btn = "Attempt Quiz";
            }else{
                    $item->btn = "Retake Quiz";
            }

            $attemptsLeft = 0;
            if($item->noofattempts){
                $item->attemptsLeft = $item->noofattempts - $numberOfAttempts;
            }

            $item->continuequiz = DB::table('teacherquizrecords')
                                ->where('submittedby',auth()->user()->id)
                                ->where('teacherquizid',$item->teacherquizid)
                                ->where('deleted',0)
                                ->where('quizstatus',0)
                                ->latest('submitteddatetime')
                                ->value('id');

            $item->score = DB::table('teacherquizrecords')
                                ->where('submittedby',auth()->user()->id)
                                ->where('teacherquizid',$item->teacherquizid)
                                ->select('totalscore', 'checked')
                                ->where('deleted',0)
                                ->where('quizstatus',1)
                                ->latest('submitteddatetime')
                                ->first();

            $maxpoints = DB::table('teacherquizquestions')
                ->where('quizid', $item->teacherquizid)
                ->where('deleted', 0)
                ->where('typeofquiz', '!=', 4)
                ->sum('points');
            
            if(isset($item->score)){
                $item->maxpoints = $maxpoints;
            }

        }

            



        //dd($sched);
        return view('student.studentclassroom.quiz')
                        ->with('sched',$sched);
            
    }

    public function attempquiz(Request $request, $id, $classroomid){
    
        
        date_default_timezone_set('Asia/Manila');
        
        $recordidcount = DB::table('teacherquizrecords')
                        ->where('teacherquizid',$id)
                        ->where('submittedby', auth()->user()->id)
                        ->where('quizstatus', 0)
                        ->count();
        $recordid = 1;

        if($recordidcount == 0){

            $recordid = DB::table('teacherquizrecords')
                ->insertGetId([
                    'teacherquizid'       => $id,
                    'classroomid'         => $classroomid,
                    'submittedby'         => auth()->user()->id,
                    'studname'            => auth()->user()->name,
                    'submitteddatetime'   => date('Y-m-d H:i:s')
                ]);
        }else{

            $recordid = DB::table('teacherquizrecords')
                        ->where('teacherquizid',$id)
                        ->where('submittedby', auth()->user()->id)
                        ->where('quizstatus', 0)
                        ->value('id');
        }

        $quizid = $id;


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
                        'teacherquizquestions.points'
                    )
                    ->inRandomOrder()
                    ->get();

        $isAnswered = false;

            
        $checkIfAnswered = DB::table('teacherquizrecords')
                            ->where('submittedby',auth()->user()->id)
                            ->where('teacherquizid',$quizid)
                            ->where('deleted',0)
                            ->select('id','submitteddatetime','quizstatus','updateddatetime')
                            ->first();

        

        if(isset($checkIfAnswered->id)){
            $isAnswered = true;
        }



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

                    if(isset($answer)){
                        $item->answer = $answer;
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
                    }else{

                        $item->answer = "";

                    }
                }

                if($item->typeofquiz == 7 ){


                    $fillquestions = DB::table('teacher_quiz_fill_question')
                                                ->where('questionid', $item->id)
                                                ->orderBy('sortid')
                                                ->get();

                    $item->fill = $fillquestions;


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

                            $questionWithInputs = preg_replace_callback('/~input/', function ($matches) use ($fillItem, &$inputCounter, &$key) {
                                $inputField = '<input class="answer-field d-inline form-control q-input" data-question-type="7" data-sortid="' . ++$inputCounter . '" data-question-id="' . $fillItem->id . '" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-' . $fillItem->id . '" value="' . $fillItem->answer . '">';
                                return $inputField;
                            }, $fillItem->question);
                            $inputCounter = 0;

                            $fillItem->question = $questionWithInputs;
                        } else if ($answercount > 1) {
                            $answer = DB::table('teacherquizrecordsdetail')
                                ->where('questionid', $fillItem->id)
                                ->where('headerid', $recordid)
                                ->select('stringanswer')
                                ->orderBy('sortid', 'asc')
                                ->get();

                            $sort = -1;
                            $questionWithInputs = preg_replace_callback('/~input/', function ($matches) use ($fillItem, &$inputCounter, &$key, &$sort, &$answer) {
                                $inputField = '<input class="answer-field d-inline form-control q-input" data-question-type="7" data-sortid="' . ++$inputCounter . '" data-question-id="' . $fillItem->id . '" value="' . $answer[++$sort]->stringanswer . '" style="width: 200px; margin: 10px; border-color:black" type="text" id="input-' . $fillItem->id . '">';
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
                    }else{
                        $item->picurl = "";
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

                    $item->answer = $newArray;


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

                    
                    foreach($dropquestions as $index => $item){

                        $key = 0;
                        $answercount = DB::table('teacherquizrecordsdetail')
                                        ->where('questionid',$item->id)
                                        ->where('headerid', $recordid)
                                        ->where('deleted',0)
                                        ->count();

                        if($answercount == 1){
                            $item->answer  = DB::table('teacherquizrecordsdetail')
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

                            $answer = DB::table('teacherquizrecordsdetail')
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

            }
            
            // dd($quizQuestions);

            return view('student.studentclassroom.include.attemptquiz')
                        ->with('quizInfo',$quizInfo)
                        ->with('headerid',$recordid)
                        ->with('quizQuestions',$quizQuestions);

            
    }


    public function saveAnswer(Request $request){

        $checkIfexist =  DB::table('teacherquizrecordsdetail')
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

                    if($request->get('questionType') == 8 ){
                        $data['sortid'] = $request->get('sortId');
                    }

                    if($request->get('sortId') != null && $request->get('questionType') == 7 ){
                        $data['sortid'] = $request->get('sortId');
                    }

                } else {
                    $data['choiceid'] = $request->get('answer');
                }

                if($request->get('questionType') == 8 ){
                    $data['sortid'] = $request->get('sortId');
                }

                if($request->get('sortId') != null && $request->get('questionType') == 7 ){
                    $data['sortid'] = $request->get('sortId');
                }

                DB::table('teacherquizrecordsdetail')->insert($data);

                DB::table('teacherquizrecords')
                    ->where('id', $request->get('headerId'))
                    ->update([
                        'updateddatetime'=> \Carbon\Carbon::now('Asia/Manila'),
                        'updatedby'=> auth()->user()->id
                    ]);

                return 1;
        }else{

                if ($request->get('questionType') != 1) {
                    $data['stringanswer'] = $request->get('answer');

                    if($request->get('sortId') != null && $request->get('questionType') == 5 ){
                        $data['sortid'] = $request->get('sortId');
                    }

                    if($request->get('questionType') == 8 ){
                        $data['sortid'] = $request->get('sortId');
                    }

                    if($request->get('sortId') != null && $request->get('questionType') == 7 ){
                        $data['sortid'] = $request->get('sortId');
                    }


                } else {
                    $data['choiceid'] = $request->get('answer');
                }

                $data['updateddatetime'] = \Carbon\Carbon::now('Asia/Manila');
                $data['updatedby'] = auth()->user()->id;

                DB::table('teacherquizrecordsdetail')
                ->where('headerid', $request->get('headerId'))
                ->where('questionid',$request->get('question_id'))
                ->where('sortid', $request->get('sortId'))
                ->update($data);

                DB::table('teacherquizrecords')
                    ->where('id', $request->get('headerId'))
                    ->update([
                        'updateddatetime'=> \Carbon\Carbon::now('Asia/Manila'),
                        'updatedby'=> auth()->user()->id
                    ]);

                return 0;


        }

    }


    public function saveImage(Request $request)
    {

        $headerId = $request->get('headerId');
        $question_id = $request->get('question_id');
        $imageFile = $request->file('answer');

        $checkIfexist =  DB::table('teacherquizrecordsdetail')
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

        // Make the complete path of image
        $protocol = $request->getScheme();
        $host = $request->getHost();

        $rootDomain = $protocol . '://' . $host;

        // insert data
        if ($checkIfexist == 0) {

            DB::table('teacherquizrecordsdetail')->insert($data);

        // update data
        } else {

            $data['updateddatetime'] = \Carbon\Carbon::now('Asia/Manila');
            $data['updatedby'] = auth()->user()->id;

            DB::table('teacherquizrecordsdetail')
            ->where('headerid', $request->get('headerId'))
            ->where('questionid',$request->get('question_id'))
            ->update($data);
        }

        $data['picurl'] = $rootDomain . '/' . $data['picurl'];

        return $data;

    }

    public function submitanswers(Request $request)
    {

    
        DB::table('teacherquizrecords')
            ->where('id', $request->get('dataId'))
            ->update([
                'quizstatus'=>1,
                'submitteddatetime'=> \Carbon\Carbon::now('Asia/Manila'),
            ]);

        return '1';
    }

}
