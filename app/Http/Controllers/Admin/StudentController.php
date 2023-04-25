<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    public function index()
    {
        // return 'aad';
        $students = Db::table('students')
            ->join('users','students.userid','=','users.id')
            ->get();

        return view('admin.adminstudents')
            ->with('students', $students);
    }
}
