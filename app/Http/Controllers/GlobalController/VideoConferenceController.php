<?php

namespace App\Http\Controllers\GlobalController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use BigBlueButton\Parameters\CreateMeetingParameters;
class VideoConferenceController extends Controller
{
    public function startcall(Request $request)
    {
        $classroominfo =  DB::table('classrooms')
        ->where('id', $request->get('classroomid'))
        ->where('deleted','0')
        ->first();
        $conferenceinfo = DB::table('videoconference')
            ->where('classroomid', $request->get('classroomid'))
            ->where('deleted','0')
            ->first();
        // if($request->get('call'))
        // {
            if(count(collect($conferenceinfo)) == 0)
            {
                function codegenerator(){
                    $length = 6;    
                    return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                }
        
                $code = codegenerator();
        
                $checkifexists = Db::table('classrooms')
                    ->where('code', $code)
                    ->get();
        
                if(count($checkifexists) > 0){
        
                    self::getavailablecode();
        
                }
    
                DB::table('videoconference')
                    ->insert([
                        'classroomid'   => $request->get('classroomid'),
                        'code'          => 'cklms'.$code,
                        'createdby'     => auth()->user()->id,
                        'createddatetime'   => date('Y-m-d H:i:s')
                    ]);
                
                \Bigbluebutton::create([
                    'meetingID' => 'cklms'.$code,
                    'meetingName' => $classroominfo->classroomname,
                    'attendeePW' => 'studentscklms'.$code,
                    'moderatorPW' => 'teachercklms'.$code,
                    'defaultWelcomeMessageFooter'       => 'CK Children\'s Publishing',
                    'logoutUrl' => explode('/',url()->full())[2].'/videoconference/closevideoconference'
                ]); 
    
            }
            $conferenceinfo = DB::table('videoconference')
                ->where('classroomid', $request->get('classroomid'))
                ->where('deleted','0')
                ->first();
            
            // $url = \Bigbluebutton::start([
            //     'meetingID' => $conferenceinfo->code,
            //     'moderatorPW' => 'teacher'.$conferenceinfo->code, //moderator password set here
            //     'attendeePW' => 'student'.$conferenceinfo->code, //attendee password here
            //     'userName' => auth()->user()->name,//for join meeting 
            //     'defaultWelcomeMessage'                     => 'Good day!',
            //     'defaultWelcomeMessageFooter'       => 'CK Children\'s Publishing'
            //     //'redirect' => false // only want to create and meeting and get join url then use this parameter 
            // ]);
            return redirect()->away('https://services.ckgroup.ph/api/cklmsmeet/call?conferencecode='.$conferenceinfo->code.'&username='.auth()->user()->name);
        // }else{
        //     return view('global.maintenance');
        // }
    }
    public function checkifcallisrunning(Request $request)
    {
        $conferenceinfo = DB::table('videoconference')
            ->where('classroomid', $request->get('classroomid'))
            ->where('deleted','0')
            ->first();
        
        $checkifonline = Bigbluebutton::isMeetingRunning([
            'meetingID' => $conferenceinfo->code,
        ]);
        
        if($checkifonline == true)
        {
            // $url = Bigbluebutton::join([
            //     'meetingID' => $classroom->code,
            //     'userName' => auth()->user()->name,
            //     'password' => $classroom->password, //which user role want to join set password here
            //     'defaultWelcomeMessage'                     => 'Good day!',
            //     'defaultWelcomeMessageFooter'       => 'CK Children\'s Publishing'
            // ]);

            // return redirect()->to($url);
            return '1';
            
        }else{

            return '0';

        }
    }
    public function joincall(Request $request)
    {
        // return $request;
        $conferenceinfo = DB::table('videoconference')
            ->where('classroomid', $request->get('classroomid'))
            ->where('deleted','0')
            ->first();

        // $url = Bigbluebutton::join([
        //     'meetingID' => $conferenceinfo->code,
        //     'userName' => auth()->user()->name,
        //     'password' => 'student'.$conferenceinfo->code, //which user role want to join set password here
        //     'defaultWelcomeMessage'                     => 'Good day!',
        //     'defaultWelcomeMessageFooter'       => 'CK Children\'s Publishing'
        // ]);

        // return redirect()->to($url);

        return redirect()->away('https://services.ckgroup.ph/api/cklmsmeet/join?conferencecode='.$conferenceinfo->code.'&username='.auth()->user()->name);
    }
}
