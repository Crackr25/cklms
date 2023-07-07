<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentProfileController extends Controller
{
    public static function index(Request $request)
    {



        $studentinfo = DB::table('students')
                ->join('users', 'users.id', '=', 'students.userid')
                ->where('students.userid', auth()->user()->id)
                ->where('students.deleted', 0)
                ->select('students.firstname', 'students.middlename', 'students.lastname', 'students.suffix', 'students.gender', 'students.picurl', 'students.gradelevel' ,'users.mobilenum', 'users.email')
                ->first();



        if(isset($studentinfo->gradelevel)){

                $studentinfo->grade = DB::table('gradelevel')
                ->where('id', $studentinfo->gradelevel)
                ->value('levelname');


            }else{


                $studentinfo->grade = "Grade Level Unassigned";
            }
        


    


        return view('student.profile.profile')
                    ->with('studentinfo', $studentinfo);

    }


    public static function updateProfile(Request $request)
    {



        DB::table('students')
            ->where('userid', auth()->user()->id)
            ->where('deleted', 0)
            ->update([
                'firstname' => $request->input('firstname'),
                'middlename' => $request->input('middlename'),
                'lastname' => $request->input('lastname'),
                'suffix' => $request->input('suffix'),
        ]);

        
        $firstname  = $request->input('firstname');
        $middlename = $request->input('middlename');
        $lastname   = $request->input('lastname');


        $fullname = $firstname . ' ' . substr($middlename, 0, 1) . '. ' . $lastname;

        DB::table('users')
            ->where('id', auth()->user()->id)
            ->where('deleted', 0)
            ->update([
                'name' => $fullname,
                'email' => $request->input('email'),
                'mobilenum' => $request->input('contactnum'),
        ]);




    }

    public static function updateProfileGrades(Request $request)
    {



        DB::table('students')
            ->where('userid', auth()->user()->id)
            ->where('deleted', 0)
            ->update([
                'gradelevel' => $request->input('gradeid')
        ]);






    }

    public static function updateProfileGender(Request $request)
    {



        DB::table('students')
            ->where('userid', auth()->user()->id)
            ->where('deleted', 0)
            ->update([
                'gender' => $request->input('gender')
        ]);






    }


}
