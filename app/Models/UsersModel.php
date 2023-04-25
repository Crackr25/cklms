<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class UsersModel extends Model
{
    public static function allusers()
    {
        
        $employees = DB::table('teachers')
            ->select('teachers.id','teachers.userid','teachers.firstname','teachers.middlename','teachers.lastname','teachers.suffix','teachers.gender','type','picurl','users.email','users.isDefault')
            ->join('users','teachers.userid','=','users.id')
            // ->leftJoin('employee_personalinfo','teachers.id','=','employee_personalinfo.employeeid')
            ->where('teachers.deleted','0')
            ->get();

        // return $employees;
        $students = DB::table('studinfo')
            ->select('studinfo.id','studinfo.userid','studinfo.firstname','studinfo.middlename','studinfo.lastname','studinfo.suffix','studinfo.gender','type','picurl','users.email','users.isDefault')
            ->join('users','studinfo.userid','=','users.id')
            ->where('studinfo.deleted','0')
            ->whereIn('studinfo.studstatus',[1,2,4])
            ->get();
            
        if(count($students)>0)
        {
            foreach($students as $student)
            {
                $student->title = null;
                $student->utype = 'STUDENT';
                $student->usertypeid = 7;
            }
        }
        
        $allusers = collect();
        $allusers = $allusers->merge($employees);
        $allusers = $allusers->merge($students);


        if(count($allusers)>0)
        {
            foreach($allusers as $alluser)
            {
                // if($alluser->usertypeid != 7)
                // {
                //     $alluser->lrn = "";
                // }
                $name_showfirst = "";

                // if($alluser->title != null)
                // {
                //     $name_showfirst.=$alluser->title.' ';
                // }
                $name_showfirst.=$alluser->firstname.' ';

                if($alluser->middlename != null)
                {
                    $name_showfirst.=$alluser->middlename[0].'. ';
                }
                $name_showfirst.=$alluser->lastname.' ';
                $name_showfirst.=$alluser->suffix.' ';

                $alluser->name_showfirst = $name_showfirst;

                $name_showlast = "";

                // if($alluser->title != null)
                // {
                //     $name_showlast.=$alluser->title.' ';
                // }
                $name_showlast.=$alluser->lastname.', ';
                $name_showlast.=$alluser->firstname.' ';

                if($alluser->middlename != null)
                {
                    $name_showlast.=$alluser->middlename[0].'. ';
                }
                $name_showlast.=$alluser->suffix.' ';

                $alluser->name_showlast = $name_showlast;
            }
        }
        return $allusers->sortBy('lastname')->values();
    }
}
