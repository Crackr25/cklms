<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;



class GroupController extends Controller
{
    public function create(Request $request)
    {

    
        $id = DB::table('classroomgroups')->insertGetId([
            'name' => $request->get('groupname'),
            'teacherid' => auth()->user()->id,
            'classroomid' =>  $request->get('classroomid'),
        ]);

        return $id;

    }

    public function groupView(Request $request)
    {

        $classroominfo = Db::table('classrooms')
            ->where('id', $request->get('classroomid'))
            ->where('deleted','0')
            ->first();

        $groupinfo = Db::table('classroomgroups')
            ->where('id', $request->get('groupview'))
            ->where('deleted','0')
            ->first();

        
        if(isset($classroominfo->gradeid)){

            $classroominfo->grade = DB::table('gradelevel')
            ->where('id', $classroominfo->gradeid)
            ->value('levelname');


        }else{


            $classroominfo->grade = "Grade Level Unassigned";
        }

        return view('teacher.group.groupview')
                ->with('classroominfo', $classroominfo)
                ->with('groupinfo', $groupinfo);


    }

    public function groupMembers(Request $request)
    {

        $groupstudents = Db::table('classroomgroupstudents')
            ->where('classroomid', $request->get('classroomid'))
            ->where('groupid', $request->get('groupid'))
            ->join('students', 'students.id', '=' ,'classroomgroupstudents.studentid')
            ->select('students.*', 'classroomgroupstudents.leader')
            ->where('classroomgroupstudents.deleted','0')
            ->where('students.deleted','0')
            ->get();

        

        return view('teacher.group.include.memberstab')
            ->with('groupstudents', $groupstudents);


    }

    public function addMember(Request $request)
    {

        DB::table('classroomgroupstudents')
            ->insert([
                'studentid' => $request->get('studid'),
                'groupid' => $request->get('groupid'),
                'classroomid' => $request->get('classroomid'),
                'createdby' => auth()->user()->id
            ]);

        

    }

    public function setLeader(Request $request)
    {

        DB::table('classroomgroupstudents')
            ->where('groupid', $request->get('groupid'))
            ->where('classroomid', $request->get('classroomid'))
            ->update([
                'leader' => 0
            ]);

        DB::table('classroomgroupstudents')
            ->where('groupid', $request->get('groupid'))
            ->where('studentid', $request->get('studid'))
            ->where('classroomid', $request->get('classroomid'))
            ->update([
                'leader' => 1
            ]);

        

    }

    public function groupBooks(Request $request)
    {

        $classroombooks = DB::table('groupbooks')
                            ->where('groupbooks.deleted',0)
                            ->where('groupbooks.groupid', $request->get('groupid'))
                            ->join('books',function($join){
                                    $join->on('groupbooks.bookid','=','books.id');
                                    $join->where('books.deleted',0);
                            })
                            ->select('books.title','groupbooks.*','books.picurl')
                            ->get();

        return view('teacher.group.include.bookstab')
                ->with('classroombooks',$classroombooks);
        

    }

    public function allbooks(Request $request)
    {

        $books = DB::table('books')
                ->where('books.deleted',0)
                ->where('books.robotics',1);
            
        
        if($request->get('search') != null && $request->has('search')){

            $books =  $books->where(function($query) use($request){
                $query->where('books.title','like','%'.$request->get('search').'%');
            });

        }
        $books =  $books->leftJoin('groupbooks',function($join) use($request){
                                    $join->on('books.id','=','groupbooks.bookid');
                                    $join->where('groupbooks.groupid',$request->get('groupid'));
                                    $join->where('groupbooks.deleted',0);
                                });

        $teacher = DB::table('teachers')
                                ->where('userid',auth()->user()->id)
                                ->select('id')
                                ->first();

        $books = $books->join('teacherbooks',function($join) use($teacher){
                    $join->on('books.id','=','teacherbooks.bookid');
                    $join->where('teacherbooks.deleted',0);
                    $join->where('teacherbooks.teacherid',$teacher->id);
                });
                        

        $books =  $books->select('books.*','groupbooks.id as classroomid' )->get();


            
    

        return view('teacher.group.include.booklist')
                    ->with('books',$books);



    }


    public function groupStudents(Request $request)
    {

        $students = Db::table('classroomstudents')
            ->where('classroomid', $request->get('classroomid'))
            ->join('students', 'students.id', '=' ,'classroomstudents.studentid')
            ->select('students.*', 'classroomstudents.classroomid')
            ->where('classroomstudents.deleted','0')
            ->get();


        foreach($students as $student){

            $count = DB::table('classroomgroupstudents')
                    ->where('groupid', $request->get('groupid'))
                    ->where('studentid',$student->id)
                    ->where('deleted', 0)
                    ->count();
            if($count > 0){

                $student->member = 1;

            }else{

                $count = DB::table('classroomgroupstudents')
                    ->where('studentid',$student->id)
                    ->where('deleted', 0)
                    ->count();

                    if($count > 0){

                        $student->member = 2;

                    }else{

                        $student->member = 0;
                    }


            }
        }

        return view('teacher.group.include.studentlist')
                ->with('students', $students);


    }

    public function addbook (Request $request)
    {

        $checkifexists = DB::table('groupbooks')
            ->where('bookid', $request->get('bookid'))
            ->where('classroomid', $request->get('classroomid'))
            ->where('groupid', $request->get('groupid'))
            ->where('deleted', 0)
            ->get();

        if(count($checkifexists) == 0)
        {

            DB::table('groupbooks')
                ->insert([
                    'bookid'            => $request->get('bookid'),
                    'classroomid'       => $request->get('classroomid'),
                    'groupid'       => $request->get('groupid'),
                    'createdby'         => auth()->user()->id,
                    'createddatetime'   => \Carbon\Carbon::now('Asia/Manila')
                ]);

            return 1;

        }else{

            return 0;

        }
    }
}
