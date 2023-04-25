<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
class PartController extends Controller
{
    public function manualselection($id, Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $manualselection = Crypt::decrypt($id);
        // return $manualselection;
        $bookinformation = DB::table('books')
            ->where('id', Crypt::decrypt($request->get('bookid')))
            ->first();

        $parts = Db::table('parts')
            ->select(
                'books.id as bookid',
                'parts.id as partid',
                'parts.title as parttitle'
            )
            ->join('books','parts.bookid','=','books.id')
            ->where('parts.deleted','0')
            ->where('parts.bookid',Crypt::decrypt($request->get('bookid')))
            ->get();

        if(count($parts) > 0){

            foreach($parts as $part){

                $chapters  = DB::table('chapters')
                            ->where('partid', $part->partid)
                            ->where('deleted','0')
                            ->get();

                $part->chapters = $chapters;

                if(count($chapters) > 0){

                    foreach($chapters as $chapter){

                        $lessons = Db::table('lessons')
                                    ->where('chapterid', $chapter->id)
                                    ->where('deleted','0')
                                    ->get();

                        if(count($lessons) > 0){

                            foreach($lessons as $lesson){

                                $lesson->lastupdated = date('F d, Y h:i:s A', strtotime($lesson->updateddatetime));

                            }

                        }

                        $chapter->lessons = $lessons;

                    }

                }

            }

        }

        // return $parts;
        if($manualselection == 'lecture'){
            return  view('admin.adminparts.lecture')
                ->with('bookinformation',$bookinformation)
                ->with('parts',$parts);
        }elseif($manualselection == 'laboratory'){
            return  view('admin.adminparts.laboratory')
                ->with('bookinformation',$bookinformation)
                ->with('parts',$parts);
        }

    }
    public function view(Request $request)
    {
        return $request->all();
        return  view('admin.adminpartsview');
    }
    public function createpart(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        
        $checkifexists = DB::table('parts')
            ->where('title','like','%'.$request->get('part'))
            ->where('bookid', $request->get('bookid'))
            ->where('deleted','0')
            ->get();
            
        if(count($checkifexists) == 0){

            Db::table('parts')
                ->insert([
                    'title'             => $request->get('part'),
                    'bookid'            => $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s'),
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);

        }
    }
    public function createchapters(Request $request)
    {
        DB::table('chapters')
            ->insert([
                'description'       => $request->get('chapter'),
                'partid'            => $request->get('partid'),
                'createddatetime'   => date('Y-m-d H:i:s'),
                'updateddatetime'   => date('Y-m-d H:i:s')
            ]);
    }
    public function createlessons(Request $request)
    {
        DB::table('lessons')
            ->insert([
                'title'             => $request->get('lesson'),
                'chapterid'         => $request->get('chapterid'),
                'createddatetime'   => date('Y-m-d H:i:s'),
                'updateddatetime'   => date('Y-m-d H:i:s')
            ]);
    }
}
