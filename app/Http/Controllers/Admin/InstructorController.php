<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
class InstructorController extends Controller
{

    public function index()
    {
        $teachers = DB::table('teachers')
            ->select(
                'teachers.id as teacherid',
                'teachers.userid',
                'teachers.firstname',
                'teachers.middlename',
                'teachers.lastname',
                'teachers.suffix',
                'teachers.gender',
                'teachers.email',
                'teachers.picurl',
                'users.type',
                'users.isActive'
            )
            ->join('users','teachers.userid','=','users.id')
            ->where('teachers.deleted','0')
            ->where('users.deleted','0')
            ->get();
        // return $teachers;
        return view('admin.adminteachers.admininstructors')
            ->with('teachers', $teachers);
    }

    public function create(Request $request)
    {
        // return $request->all();

        date_default_timezone_set('Asia/Manila');

        $checkifexists = DB::table('teachers')
            ->where('firstname', $request->get('firstname'))
            ->where('middlename', $request->get('middlename'))
            ->where('lastname', $request->get('lastname'))
            ->where('email', $request->get('email'))
            ->get();
            
        if(count($checkifexists) == 0){

            if($request->get('middlename') == null){
                $middlename = "";
            }else{
                $middlename = $request->get('middlename')[0].'.';
            }

            if($request->get('suffix') == null){
                $suffix = "";
            }else{
                $suffix = $request->get('suffix')[0].'.';
            }

            $userid = DB::table('users')
                    ->insertGetId([
                        'name'              => $request->get('firstname').' '.$middlename.' '.$request->get('lastname').' '.$suffix,
                        'email'             => $request->get('email'),
                        'type'              => '2',
                        'password'          => Hash::make('123456789'),
                        'created_at'        => date('Y-m-d H:i:s')
                    ]);

            DB::table('teachers')
                ->insert([
                    'userid'            => $userid,
                    'firstname'         => $request->get('firstname'),
                    'middlename'        => $request->get('middlename'),
                    'lastname'          => $request->get('lastname'),
                    'suffix'            => $request->get('suffix'),
                    'gender'            => $request->get('gender'),
                    'email'             => $request->get('email'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);


            return '1';

        }else{
            return '0';
        }

    }
    public function editstatus(Request $request)
    {
        // return $request->all();
        if($request->get('currentstat') == 1)
        {
            $status = 0;
        }else{
            $status = 1;
        }
        Db::table('users')
            ->where('id', $request->get('userid'))
            ->update([
                'isActive'  => $status
            ]);
        $request->merge([
            'newstatus' => $status
        ]);
        return $request->all(); 
    }
    public function getinfo(Request $request)
    {
        $info = Db::table('teachers')
            ->select(
                'teachers.firstname',
                'teachers.middlename',
                'teachers.lastname',
                'teachers.gender',
                'users.email'
            )
            ->join('users','teachers.userid','=','users.id')
            ->where('teachers.id', $request->get('id'))
            ->first();

        return collect($info);
    }
    public function updateinfo(Request $request)
    {
        Db::table('teachers')
            ->where('id', $request->get('id'))
            ->update([
                'firstname'     => $request->get('firstname'),
                'middlename'    => $request->get('middlename'),
                'lastname'      => $request->get('lastname'),
                'gender'        => $request->get('gender')
            ]);

        $userid = Db::table('teachers')
            ->where('id', $request->get('id'))
            ->first()
            ->userid;

        Db::table('users')
            ->where('id', $userid)
            ->update([
                'email' => $request->get('username')
            ]);

        return $request->all();
        
    }
    public static function booksassigned(Request $request)
    {
        // return $request->all();
        $booksassigned = Db::table('teacherbooks')
            ->select(
                'teacherbooks.id',
                'books.id as bookid',
                'books.title',
                'books.description',
                'books.picurl'
            )
            ->join('books', 'teacherbooks.bookid','=','books.id')
            ->where('teacherbooks.teacherid', $request->get('id'))
            ->where('teacherbooks.deleted','0')
            ->where('books.deleted','0')
            ->get();
            
        return collect($booksassigned);
    }
    public function searchbook(Request $request)
    { 
        // field , 'like', '%'.value.'%'
        // $teacherid = Db::table('teachers')
        //     ->where('userid', auth()->user()->id)
        //     ->first()
        //     ->id;
        // return auth()->user()->id;
        $searchbooks = DB::table('books')
            ->where('title','like','%'.$request->get('thisbook').'%')
            ->where('deleted','0')
            ->where('isactive','1')
            ->get();
        $books = array();
        if(count($searchbooks)>0)
        {
            foreach($searchbooks as $searchbook)
            {
                $checkifexists = DB::table('teacherbooks')
                    ->where('teacherid',$request->get('teacherid'))
                    ->where('bookid', $searchbook->id)
                    ->where('deleted','0')
                    ->count();

                if($checkifexists == 0)
                {
                    array_push($books, $searchbook);
                }
            }
        }
        return collect($books);
        
    }
    public function assignthisbook(Request $request)
    { 
        // return $request->all();
        // $request->get('teacherid');
        $checkifexists = DB::table('teacherbooks')
            ->where('teacherid', $request->get('teacherid'))
            ->where('bookid', $request->get('bookid'))
            ->where('deleted','0')
            ->count();

        if($checkifexists == 0)
        {
            
            DB::table('teacherbooks')
                ->insert([
                    'teacherid' => $request->get('teacherid'),
                    'bookid' => $request->get('bookid'),
                    'createddatetime' => date('Y-m-d H:i:s')
                ]);
        }
        // $request->merge([
        //     'id' => $request->get('teacherid')
        // ]);
        // return redirect()->action('Admin\InstructorController@booksassigned', [$request]);
        
        // self::booksassigned($request);
        return $request->all();
    }
    public function deletethisbook(Request $request)
    {
        DB::table('teacherbooks')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'   => '1'
            ]);

        return $request->all();
    }

}
