<?php

namespace App\Http\Controllers\GlobalController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class MessageController extends Controller
{
    public function index()
    {

        $recipients = array();

        if(auth()->user()->type == 2){
            
            $createdby = DB::table('teachers')
                ->where('userid', auth()->user()->id)
                ->first();


            $students = DB::table('classrooms')
                ->select(
                    'students.id',
                    'students.firstname',
                    'students.middlename',
                    'students.lastname',
                    'students.suffix',
                    'students.gender',
                    'students.gender',
                    'students.picurl'
                )
                ->join('classroomstudents','classrooms.id','=','classroomstudents.classroomid')
                ->join('students','classroomstudents.studentid','=','students.id')
                ->join('teachers','classrooms.createdby','=','teachers.id')
                ->where('teachers.userid',auth()->user()->id)
                ->where('students.deleted','0')
                ->where('classroomstudents.deleted','0')
                ->where('classrooms.deleted','0')
                ->distinct()
                ->get();
            
            if(count($students)>0)
            {
                foreach($students as $student)
                {
                    if(strtolower($student->gender) == 'female')
                    {

                        $student->avatar = 'avatar/S(F) 1.png';

                    }else{
                        
                        $student->avatar = 'avatar/S(M) 1.png';
                    }

                    if($student->picurl == null){
                        $student->picurl = $student->avatar;
                    }

                    $student->usertypeid = '3';

                    array_push($recipients, $student);
                }
            }
            
            $extends = 'teacher.layouts.app';
        }elseif(auth()->user()->type == 3){
            $createdby = DB::table('students')
                ->where('userid', auth()->user()->id)
                ->first();
            $extends = 'student.layouts.app';
            $studentid = DB::table('students')
                ->where('userid', auth()->user()->id)
                ->first()
                ->id;



            $teachers = DB::table('classrooms')
                ->select(
                    'teachers.id',
                    'teachers.firstname',
                    'teachers.middlename',
                    'teachers.lastname',
                    'teachers.suffix',
                    'teachers.gender',
                    'teachers.gender',
                    'teachers.picurl'
                )
                ->join('classroomstudents','classrooms.id','=','classroomstudents.classroomid')
                ->join('teachers','classrooms.createdby','=','teachers.id')
                ->where('classroomstudents.studentid',$studentid)
                ->where('classroomstudents.deleted','0')
                ->where('classrooms.deleted','0')
                ->distinct()
                ->get();
                
            if(count($teachers)>0)
            {
                foreach($teachers as $teacher)
                {
                    if(strtolower($teacher->gender) == 'female')
                    {

                        $teacher->avatar = 'avatar/teacher-female.png';

                    }else{
                        
                        $teacher->avatar = 'avatar/teacher-male.png';
                    }

                    if($teacher->picurl == null){
                        $teacher->picurl = $teacher->avatar;
                    }

                    $teacher->usertypeid = '2';

                    array_push($recipients, $teacher);
                }
            }
            $classrooms = Db::table('classrooms')
                ->select(
                    'classrooms.id',
                    'classrooms.classroomname',
                    'classrooms.createddatetime',
                    'teachers.firstname',
                    'teachers.middlename',
                    'teachers.lastname',
                    'teachers.suffix'
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
        }

        
        $messagesrecipients = DB::table('messages')
            ->where(function ($query) use ($createdby) {
                $query->where('createdby', '=' , $createdby->id)
                    ->orWhere('recipientid', '=', $createdby->id);
            })
            ->orderBy('createddatetime','asc')
            ->get();
        // );
        
        if(count($messagesrecipients)>0){


            foreach($messagesrecipients as $messagesrecipient)
            {
                if($messagesrecipient->usertypeid == '2'){
                    if(auth()->user()->type == '2')
                    {
                        $recipientname = Db::table('teachers')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                        if(strtolower($recipientname->gender) == 'female')
                        {
        
                            $avatar = 'avatar/teacher-female.png';
        
                        }else{
                            
                            $avatar = 'avatar/teacher-male.png';
                        }
        
                        $messagesrecipient->accountid = $recipientname->id;
                        $messagesrecipient->firstname = $recipientname->firstname;
                        $messagesrecipient->middlename = $recipientname->middlename;
                        $messagesrecipient->lastname = $recipientname->lastname;
                        $messagesrecipient->suffix = $recipientname->suffix;
                        $messagesrecipient->gender = $recipientname->gender;
                        $messagesrecipient->picurl = $recipientname->picurl;
                        $messagesrecipient->avatar = $avatar;

                        if($recipientname->picurl == null){
                            $recipientname->picurl = $avatar;
                            $messagesrecipient->picurl = $avatar;
                        }

                        if($messagesrecipient->createdby == $createdby->id){
                            // array_push($recipients, (object)array(
                            //     'id'            => $recipientname->id,
                            //     'firstname'     => $recipientname->firstname,
                            //     'middlename'    => $recipientname->middlename,
                            //     'lastname'      => $recipientname->lastname,
                            //     'suffix'        => $recipientname->suffix,
                            //     'gender'        => $recipientname->gender,
                            //     'picurl'        => $recipientname->picurl,
                            //     'avatar'        => $avatar,
                            //     'usertypeid'    => 2,
                            //     'mine'          => 1
                            // ));
                            
                            $messagesrecipient->mine = '1';

                        }else{
                            array_push($recipients, (object)array(
                                'id'            => $recipientname->id,
                                'firstname'     => $recipientname->firstname,
                                'middlename'    => $recipientname->middlename,
                                'lastname'      => $recipientname->lastname,
                                'suffix'        => $recipientname->suffix,
                                'gender'        => $recipientname->gender,
                                'picurl'        => $recipientname->picurl,
                                'avatar'        => $avatar,
                                'usertypeid'    => 2
                            ));
                            $messagesrecipient->mine = '0';
                        }

                    }else{
                        $recipientname = Db::table('teachers')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                            if(strtolower($recipientname->gender) == 'female')
                            {
            
                                $avatar = 'avatar/teacher-female.png';
            
                            }else{
                                
                                $avatar = 'avatar/teacher-male.png';
                            }
            
        
                            $messagesrecipient->accountid = $recipientname->id;
                            $messagesrecipient->firstname = $recipientname->firstname;
                            $messagesrecipient->middlename = $recipientname->middlename;
                            $messagesrecipient->lastname = $recipientname->lastname;
                            $messagesrecipient->suffix = $recipientname->suffix;
                            $messagesrecipient->gender = $recipientname->gender;
                            $messagesrecipient->picurl = $recipientname->picurl;
                            $messagesrecipient->avatar = $avatar;
                            if($recipientname->picurl == null){
                                $recipientname->picurl = $avatar;
                                $messagesrecipient->picurl = $avatar;
                            }
                        array_push($recipients, (object)array(
                            'id'            => $recipientname->id,
                            'firstname'     => $recipientname->firstname,
                            'middlename'    => $recipientname->middlename,
                            'lastname'      => $recipientname->lastname,
                            'suffix'        => $recipientname->suffix,
                            'gender'        => $recipientname->gender,
                            'picurl'        => $recipientname->picurl,
                            'avatar'        => $avatar,
                            'usertypeid'    => 2
                        ));
                        $messagesrecipient->mine = '0';
                    }

                }elseif($messagesrecipient->usertypeid == '3'){
                    if(auth()->user()->type == '2')
                    {
                        $recipientname = Db::table('students')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                        if(strtolower($recipientname->gender) == 'female')
                        {
        
                            $avatar = 'avatar/S(F) 1.png';
        
                        }else{
                            
                            $avatar = 'avatar/S(M) 1.png';
                        }
        
                        $messagesrecipient->accountid = $recipientname->id;
                        $messagesrecipient->firstname = $recipientname->firstname;
                        $messagesrecipient->middlename = $recipientname->middlename;
                        $messagesrecipient->lastname = $recipientname->lastname;
                        $messagesrecipient->suffix = $recipientname->suffix;
                        $messagesrecipient->gender = $recipientname->gender;
                        $messagesrecipient->picurl = $recipientname->picurl;
                        $messagesrecipient->avatar = $avatar;
                        if($recipientname->picurl == null){
                            $recipientname->picurl = $avatar;
                            $messagesrecipient->picurl = $avatar;
                        }
                        array_push($recipients, (object)array(
                            'id'            => $recipientname->id,
                            'firstname'     => $recipientname->firstname,
                            'middlename'    => $recipientname->middlename,
                            'lastname'      => $recipientname->lastname,
                            'suffix'        => $recipientname->suffix,
                            'gender'        => $recipientname->gender,
                            'picurl'        => $recipientname->picurl,
                            'avatar'        => $avatar,
                            'usertypeid'    => 3
                        ));
                        $messagesrecipient->mine = '0';

                    }else{
                        $recipientname = Db::table('students')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                            if(strtolower($recipientname->gender) == 'female')
                            {
            
                                $avatar = 'avatar/S(F) 1.png';
            
                            }else{
                                
                                $avatar = 'avatar/S(M) 1.png';
                            }
            
        
                            $messagesrecipient->accountid = $recipientname->id;
                            $messagesrecipient->firstname = $recipientname->firstname;
                            $messagesrecipient->middlename = $recipientname->middlename;
                            $messagesrecipient->lastname = $recipientname->lastname;
                            $messagesrecipient->suffix = $recipientname->suffix;
                            $messagesrecipient->gender = $recipientname->gender;
                            $messagesrecipient->picurl = $recipientname->picurl;
                            $messagesrecipient->avatar = $avatar;
                            if($recipientname->picurl == null){
                                $recipientname->picurl = $avatar;
                                $messagesrecipient->picurl = $avatar;
                            }
                        if($messagesrecipient->createdby == $createdby->id){
                            // array_push($recipients, (object)array(
                            //     'id'            => $recipientname->id,
                            //     'firstname'     => $recipientname->firstname,
                            //     'middlename'    => $recipientname->middlename,
                            //     'lastname'      => $recipientname->lastname,
                            //     'suffix'        => $recipientname->suffix,
                            //     'gender'        => $recipientname->gender,
                            //     'picurl'        => $recipientname->picurl,
                            //     'avatar'        => $avatar,
                            //     'usertypeid'    => 2,
                            //     'mine'          => 1
                            // ));
                            $messagesrecipient->mine = '1';
                        }else{
                            array_push($recipients, (object)array(
                                'id'            => $recipientname->id,
                                'firstname'     => $recipientname->firstname,
                                'middlename'    => $recipientname->middlename,
                                'lastname'      => $recipientname->lastname,
                                'suffix'        => $recipientname->suffix,
                                'gender'        => $recipientname->gender,
                                'picurl'        => $recipientname->picurl,
                                'avatar'        => $avatar,
                                'usertypeid'    => 2
                            ));
                            $messagesrecipient->mine = '0';
                        }
                    }
                }
            }
        }
        
        if(auth()->user()->type == 2){
            return view('global.messages')
                ->with('createdby',$createdby)
                ->with('extends', $extends)
                ->with('messages', collect($messagesrecipients)->unique())
                ->with('recipients', collect($recipients)->unique());
        }elseif(auth()->user()->type == 3){
            return view('global.messages')
                ->with('createdby',$createdby)
                ->with('classrooms', $classrooms)
                ->with('extends', $extends)
                ->with('messages', collect($messagesrecipients)->unique())
                ->with('recipients', collect($recipients)->unique());
        }
    }
    public function getmessage(Request $request)
    {
        $messages = array();

        $messagescreated = DB::table('messages')
            ->where('messages.deleted','0')
            ->where('messages.createdby',$request->get('id'))
            ->where('messages.usertypeid',$request->get('usertypeid'))
            ->get();
        
        if(count($messagescreated)>0)
        {
            foreach($messagescreated as $messagecreated)
            {
                $messagesattach = DB::table('messagesattach')
                    ->where('messageid', $messagecreated->id)
                    ->where('deleted','0')
                    ->get();

                $messagecreated->attachments = $messagesattach;

                $messagecreated->mine = 1;

                array_push($messages, $messagecreated);
                
            }
        }

        $messagesreceived = DB::table('messages')
            ->where('messages.deleted','0')
            ->where('messages.recipientid',$request->get('id'))
            ->where('messages.recusertypeid',$request->get('usertypeid'))
            ->get();

        if(count($messagesreceived)>0)
        {
            foreach($messagesreceived as $messagereceived)
            {
                $messagesattach = DB::table('messagesattach')
                    ->where('messageid', $messagereceived->id)
                    ->where('deleted','0')
                    ->get();

                $messagereceived->attachments = $messagesattach;

                $messagereceived->mine = 1;

                array_push($messages, $messagereceived);
                
            }
        }
        if($request->get('usertypeid') == 2)
        {
            $userinfo = DB::table('teachers')
                ->where('id', $request->get('id'))
                ->first();

            if(strtolower($userinfo->gender) == "female"){

                $userinfo->avatar = "avatar/teacher-female.png";

            }else{
                
                $userinfo->avatar = "avatar/teacher-male.png";
            }
            if($userinfo->picurl == null){
                $userinfo->picurl = $userinfo->avatar;
            }
            $userinfo->usertypeid = 2;
        }
        elseif($request->get('usertypeid') == 3)
        {
            $userinfo = DB::table('students')
                ->where('id', $request->get('id'))
                ->first();

            if(strtolower($userinfo->gender) == "female"){

                $userinfo->avatar = "avatar/S(F) 1.png";

            }else{
                
                $userinfo->avatar = "avatar/S(M) 1.png";
            }
            if($userinfo->picurl == null){
                $userinfo->picurl = $userinfo->avatar;
            }
            $userinfo->usertypeid = 3;
        }


        
        return array($userinfo,$messages);
    }
    public function sendmessage(Request $request)
    {
        
        date_default_timezone_set('Asia/Manila');
        
        if(auth()->user()->type == '2'){
            $createdby = DB::table('teachers')
                ->where('userid', auth()->user()->id)
                ->first()
                ->id;
        }elseif(auth()->user()->type == '3'){
            $createdby = DB::table('students')
                ->where('userid', auth()->user()->id)
                ->first()
                ->id;
        }

        $messageid = DB::table('messages')
            ->insertGetId([
                'content'           => $request->get('content'),
                'recipientid'       => $request->get('recipientid'),
                'recusertypeid'     => $request->get('usertypeid'),
                'createdby'         => $createdby,
                'usertypeid'        => auth()->user()->type,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        
        // recipientid
        // usertypeid
        // content

    }
    public function autodisplaymessage(Request $request)
    {
        // return $request->all();
        if(auth()->user()->type == '2'){
            $createdby = DB::table('teachers')
                ->where('userid', auth()->user()->id)
                ->first()
                ->id;
        }elseif(auth()->user()->type == '3'){
            $createdby = DB::table('students')
                ->where('userid', auth()->user()->id)
                ->first()
                ->id;
        }
            
        $recipientid = $request->get('recipientid');
        $usertypeid = $request->get('usertypeid');

        $messages = DB::table('messages')
            ->where(function ($query) use ($createdby) {
                $query->where('createdby', '=' , $createdby)
                    ->orWhere('recipientid', '=', $createdby);
            })
            ->where(function ($query) {
                $query->where('usertypeid', '=' , auth()->user()->type)
                    ->orWhere('recusertypeid', '=', auth()->user()->type);
            })
            ->orderBy('createddatetime','asc')
            ->get();
            
        $messagearray = array();
        if(count($messages) > 0){
            foreach($messages as $message)
            {
                if($message->usertypeid == '2'){
                    if(auth()->user()->type == '2')
                    {
                        if($message->createdby == $createdby)
                        {
                            $message->mine = '1';
                        }else{
                            $message->mine = '0';
                        }
                    }else{
                        $message->mine = '0';
                    }
                }else{
                    if(auth()->user()->type == '2')
                    {
                        $message->mine = '0';

                    }else{
                        if($message->createdby == $createdby)
                        {
                            $message->mine = '1';
                        }else{
                            $message->mine = '0';
                        }
                    }
                }
                if($request->get('messageids')){
                    if (!in_array($message->id, $request->get('messageids'))) {
                        array_push($messagearray, $message);
                    }
                }else{
                    array_push($messagearray, $message);
                }
            }
        }
        $htmldata = array();

        if(count($messagearray)>0)
        {
            foreach($messagearray as $msg)
            {
                if($msg->usertypeid == 2){
                    $userinfo = DB::table('teachers')
                        ->where('id', $msg->createdby)
                        ->first();

                    $msg->picurl = $userinfo->picurl;
                    
                    if(strtolower($userinfo->gender) == "female"){
        
                        $msg->avatar = "avatar/teacher-female.png";
        
                    }else{
                        
                        $msg->avatar = "avatar/teacher-male.png";
                    }
                    if($userinfo->picurl == null){
                        $msg->picurl = $msg->avatar;
                    }
                }else{
                    $userinfo = DB::table('students')
                        ->where('id', $msg->createdby)
                        ->first();

                    $msg->picurl = $userinfo->picurl;
                    
                    if(strtolower($userinfo->gender) == "female"){
        
                        $msg->avatar = "avatar/S(F) 1.png";
        
                    }else{
                        
                        $msg->avatar = "avatar/S(M) 1.png";
                    }
                    if($userinfo->picurl == null){
                        $msg->picurl = $msg->avatar;
                    }
                }
                if($msg->mine == 1)
                {

                    $html = '<div class="message-bubble me">'.
                                '<div class="message-bubble-inner">'.
                                    '<div class="message-avatar">'.
                                        '<img src="'.asset($msg->picurl).'" onerror="this.onerror = null, this.src='.asset($msg->avatar).'"alt="">'.
                                    '</div>'.
                                    '<div class="message-text">'.
                                        '<input type="hidden" name="messageid" value="'.$msg->id.'"/>'.
                                        '<p>'.$msg->content.'</p>'.
                                    '</div>'.
                                '</div>'.
                                '<div class="clearfix"></div>'.
                            '</div>';
                }else{
                    
                    $html = '<div class="message-bubble">'.
                                '<div class="message-bubble-inner">'.
                                    '<div class="message-avatar">'.
                                        '<img src="'.asset($msg->picurl).'" onerror="this.onerror = null, this.src='.asset($msg->avatar).'"alt="">'.
                                    '</div>'.
                                    '<div class="message-text">'.
                                        '<input type="hidden" name="messageid" value="'.$msg->id.'"/>'.
                                        '<p>'.$msg->content.'</p>'.
                                    '</div>'.
                                '</div>'.
                                '<div class="clearfix"></div>'.
                            '</div>';
                }
                array_push($htmldata, $html);
            }
        }
        return $htmldata;

    }

    public function loadmessages(Request $request){

        // return $request->all();

        if(auth()->user()->type == 2){
            
            $createdby = DB::table('teachers')
                ->where('userid', auth()->user()->id)
                ->first();

        }else if(auth()->user()->type == 3){

            $createdby = DB::table('students')
                ->where('userid', auth()->user()->id)
                ->first();
        }

    
        $messagesrecipients = DB::table('messages')
                    ->where(function ($query) use ($request,$createdby) {
                        $query->where('createdby', '=' , $createdby->id)
                              ->where('recipientid', '=', $request->get('studid'));
                    })
                    ->orWhere(function ($query) use ($request,$createdby) {
                        $query->where('createdby', '=' , $request->get('studid'))
                              ->where('recipientid', '=', $createdby->id );
                    })
                    ->orderBy('createddatetime','asc')
                    ->get();

        // return $messagesrecipients;

        if(count($messagesrecipients)>0){


            foreach($messagesrecipients as $messagesrecipient)
            {
                if($messagesrecipient->usertypeid == '2'){
                    if(auth()->user()->type == '2')
                    {
                        $recipientname = Db::table('teachers')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                        if(strtolower($recipientname->gender) == 'female')
                        {
        
                            $avatar = 'avatar/teacher-female.png';
        
                        }else{
                            
                            $avatar = 'avatar/teacher-male.png';
                        }
        
                        $messagesrecipient->accountid = $recipientname->id;
                        $messagesrecipient->firstname = $recipientname->firstname;
                        $messagesrecipient->middlename = $recipientname->middlename;
                        $messagesrecipient->lastname = $recipientname->lastname;
                        $messagesrecipient->suffix = $recipientname->suffix;
                        $messagesrecipient->gender = $recipientname->gender;
                        $messagesrecipient->picurl = $recipientname->picurl;
                        $messagesrecipient->avatar = $avatar;

                        if($recipientname->picurl == null){
                            $recipientname->picurl = $avatar;
                            $messagesrecipient->picurl = $avatar;
                        }

                        if($messagesrecipient->createdby == $createdby->id){
                            // array_push($recipients, (object)array(
                            //     'id'            => $recipientname->id,
                            //     'firstname'     => $recipientname->firstname,
                            //     'middlename'    => $recipientname->middlename,
                            //     'lastname'      => $recipientname->lastname,
                            //     'suffix'        => $recipientname->suffix,
                            //     'gender'        => $recipientname->gender,
                            //     'picurl'        => $recipientname->picurl,
                            //     'avatar'        => $avatar,
                            //     'usertypeid'    => 2,
                            //     'mine'          => 1
                            // ));
                            
                            $messagesrecipient->mine = '1';

                        }else{
                       
                            $messagesrecipient->mine = '0';
                        }

                    }else{
                        $recipientname = Db::table('teachers')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                            if(strtolower($recipientname->gender) == 'female')
                            {
            
                                $avatar = 'avatar/teacher-female.png';
            
                            }else{
                                
                                $avatar = 'avatar/teacher-male.png';
                            }
            
        
                            $messagesrecipient->accountid = $recipientname->id;
                            $messagesrecipient->firstname = $recipientname->firstname;
                            $messagesrecipient->middlename = $recipientname->middlename;
                            $messagesrecipient->lastname = $recipientname->lastname;
                            $messagesrecipient->suffix = $recipientname->suffix;
                            $messagesrecipient->gender = $recipientname->gender;
                            $messagesrecipient->picurl = $recipientname->picurl;
                            $messagesrecipient->avatar = $avatar;
                            if($recipientname->picurl == null){
                                $recipientname->picurl = $avatar;
                                $messagesrecipient->picurl = $avatar;
                            }
                      
                        $messagesrecipient->mine = '0';
                    }

                }elseif($messagesrecipient->usertypeid == '3'){
                    if(auth()->user()->type == '2')
                    {
                        $recipientname = Db::table('students')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                        if(strtolower($recipientname->gender) == 'female')
                        {
        
                            $avatar = 'avatar/S(F) 1.png';
        
                        }else{
                            
                            $avatar = 'avatar/S(M) 1.png';
                        }
        
                        $messagesrecipient->accountid = $recipientname->id;
                        $messagesrecipient->firstname = $recipientname->firstname;
                        $messagesrecipient->middlename = $recipientname->middlename;
                        $messagesrecipient->lastname = $recipientname->lastname;
                        $messagesrecipient->suffix = $recipientname->suffix;
                        $messagesrecipient->gender = $recipientname->gender;
                        $messagesrecipient->picurl = $recipientname->picurl;
                        $messagesrecipient->avatar = $avatar;
                        if($recipientname->picurl == null){
                            $recipientname->picurl = $avatar;
                            $messagesrecipient->picurl = $avatar;
                        }
                       
                        $messagesrecipient->mine = '0';

                    }else{
                        $recipientname = Db::table('students')
                            ->where('id', $messagesrecipient->createdby)
                            ->first();

                            if(strtolower($recipientname->gender) == 'female')
                            {
            
                                $avatar = 'avatar/S(F) 1.png';
            
                            }else{
                                
                                $avatar = 'avatar/S(M) 1.png';
                            }
            
        
                            $messagesrecipient->accountid = $recipientname->id;
                            $messagesrecipient->firstname = $recipientname->firstname;
                            $messagesrecipient->middlename = $recipientname->middlename;
                            $messagesrecipient->lastname = $recipientname->lastname;
                            $messagesrecipient->suffix = $recipientname->suffix;
                            $messagesrecipient->gender = $recipientname->gender;
                            $messagesrecipient->picurl = $recipientname->picurl;
                            $messagesrecipient->avatar = $avatar;
                            if($recipientname->picurl == null){
                                $recipientname->picurl = $avatar;
                                $messagesrecipient->picurl = $avatar;
                            }
                        if($messagesrecipient->createdby == $createdby->id){
                            // array_push($recipients, (object)array(
                            //     'id'            => $recipientname->id,
                            //     'firstname'     => $recipientname->firstname,
                            //     'middlename'    => $recipientname->middlename,
                            //     'lastname'      => $recipientname->lastname,
                            //     'suffix'        => $recipientname->suffix,
                            //     'gender'        => $recipientname->gender,
                            //     'picurl'        => $recipientname->picurl,
                            //     'avatar'        => $avatar,
                            //     'usertypeid'    => 2,
                            //     'mine'          => 1
                            // ));
                            $messagesrecipient->mine = '1';
                        }else{
                           
                            $messagesrecipient->mine = '0';
                        }
                    }
                }
            }
        }

        // return collect($messagesrecipients)->unique();
        // resources\views\global\messagecontainer.blade.php

        return view('global.messagecontainer')->with('messages', collect($messagesrecipients)->unique());

    }

}
