<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
class SubjectController extends Controller
{

    public function index(Request $request)
    {

        $subjects = DB::table('subjects')
            ->where('isactive','1')
            ->where('deleted','0')
            ->get();

        if(count($subjects) > 0){
            

            $subjects[0]->subjectfirst = 1;
        }

        return view('admin.adminsubjects')
            ->with('subjects',$subjects);
    
    }
    public function createsubjects($id, Request $request)
    {

        date_default_timezone_set('Asia/Manila');

        $action = Crypt::decrypt($id);
        
        if($action == 'index'){

            return view('admin.admincreatesubject');

        }else{
            
            DB::table('subjects')
                ->insert([
                    'title'             => $request->get('subjecttitle'),
                    // 'description'       => $request->get('short_description'),
                    // 'picurl'            => $request->get('subjectcover'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
    
            return back();
    
        }
    }
    public function view(Request $request)
    {
        $subjectinfo = DB::table('subjects')
            ->where('id', $request->get('subjectid'))
            ->first();

        return collect($subjectinfo);
    }
    public function edit(Request $request)
    {
        $subjectinfo = DB::table('subjects')
            ->where('id', $request->get('editsubjectid'))
            ->update([
                'title'     => $request->get('editsubjecttitle')
            ]);

        return collect($request->get('editsubjecttitle'));
    }
    public function delete(Request $request)
    {
        $subjectinfo = DB::table('subjects')
            ->where('id', $request->get('deletesubjectid'))
            ->update([
                'deleted'     => '1'
            ]);

        return collect($request->get('deletesubjectid'));
    }
}
