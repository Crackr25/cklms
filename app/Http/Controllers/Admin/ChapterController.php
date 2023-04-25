<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Crypt;
class ChapterController extends Controller
{
    public static function index(Request $request)
    {
        // return $request->all();
        $chapterinfo = DB::table('chapters')    
            ->select(
                'id',
                'description',
                'partid',
                'createdby',
                'createddatetime',
                'partid'
            )
            ->where('id', $request->get('chapterid'))
            ->first();

        $lessons = Db::table('lessons')
                    ->where('chapterid', $request->get('chapterid'))
                    ->where('deleted', 0)
                    ->get();

        // return $lessons;
        return view('admin.adminchapters.chapterindex')
            ->with('manualselection',$request->get('manualselection'))
            ->with('bookid',$request->get('bookid'))
            ->with('booktitle',$request->get('bookname'))
            ->with('chapterinfo',$chapterinfo)
            ->with('lessons',$lessons);
    }
}
