<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;
use \Carbon\CarbonTimeZone;
use Auth;
use DateTime;
use Session;
use \Carbon\CarbonPeriod;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

            // Auth::logout();


            
            // return auth()->user()->type;
        
        if(auth()->user()->type == 1){

            $students = Db::table('students')
                ->where('deleted','0')
                ->get();

            $teachers = Db::table('teachers')
                ->where('deleted','0')
                ->get();

            $books = Db::table('books')
                ->where('deleted','0')
                ->get();

            $classrooms = Db::table('classrooms')
                ->where('deleted','0')
                ->get();

            return view('admin.admindashboard')
                ->with('students', $students)
                ->with('teachers', $teachers)
                ->with('books', $books)
                ->with('classrooms', $classrooms);
            
        }
        elseif(auth()->user()->type == 2 && auth()->user()->deleted == 0){

            $createdby = DB::table('teachers')
                ->where('userid', auth()->user()->id)
                ->first()
                ->id;

            $books = Db::table('books')
                ->where('deleted','0')
                ->get();

            $classrooms = Db::table('classrooms')
                ->join('teachers','classrooms.createdby','=','teachers.id')
                ->where('classrooms.deleted','0')
                ->where('classrooms.createdby',$createdby)
                ->get();

            return view('teacher.teacherdashboard')
                ->with('classrooms', $classrooms)
                ->with('books', $books);
            
        }
        elseif(auth()->user()->type == 3 && auth()->user()->deleted == 0){

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
            
            return view('student.studentdashboard')
                // ->with('classroomsjoined', $classroomsjoined)
                ->with('classrooms', $classrooms);
        }
        
        else{
            Auth::logout();
        }

    }
}
