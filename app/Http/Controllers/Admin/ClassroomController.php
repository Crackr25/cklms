<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ClassroomController extends Controller
{
    public function index()
    {
        // return 'asda';
        $classrooms = Db::table('classrooms')
            ->where('deleted','0')
            ->get();

        if(count($classrooms)>0)
        {
            foreach($classrooms as $classroom)
            {
                $countbooks = DB::table('classroombooks')
                    ->where('classroomid', $classroom->id)
                    ->where('deleted','0')
                    ->count();

                $classroom->countbooks = $countbooks;

                $countstudents = DB::table('classroomstudents')
                    ->join('students','classroomstudents.id','=','students.id')
                    ->join('users','students.userid','=','users.id')
                    ->where('classroomid', $classroom->id)
                    ->where('classroomstudents.deleted','0')
                    ->count();

                $classroom->countstudents = $countstudents;
            }
        }
        return view('admin.adminclassrooms')
            ->with('classrooms', $classrooms);
    }
    public function getdetails(Request $request)
    {
        $books = Db::table('classroombooks')
            ->select(
                'books.id',
                'books.title',
                'books.picurl',
                'books.picurl',
                'classroombooks.createddatetime as dateaddedd'
            )
            ->join('books', 'classroombooks.bookid','=','books.id')
            ->where('classroomid', $request->get('id'))
            ->where('books.deleted','0')
            ->where('classroombooks.deleted','0')
            ->get();

        $students = Db::table('classroomstudents')
            ->join('students','classroomstudents.id','=','students.id')
            ->join('users','students.userid','=','users.id')
            ->where('classroomid', $request->get('id'))
            ->get();

        return array($books,$students);
    }
}
