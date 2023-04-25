<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
use File;
class LessonController extends Controller
{
    // public function index(Request $request)
    // {

    //     // return $request->all();
    //     $lessons = DB::table('lessons')
    //             ->where('chapterid', $request->get('chapterid'))
    //             ->get();

    //     $lessonkey = 1;
        
    //     foreach($lessons as $lesson){
    //         $lesson->key = $lessonkey;
    //         $lessonkey+=1;
    //     }
        
    //     $getlessonkey = $lessons->where('id',$request->get('lessonid'));

    //     $lessoninfo = DB::table('lessons')
    //         ->where('id', $request->get('lessonid'))
    //         ->first();
            
    //     $lessoncontents = DB::table('lessoncontents')
    //         ->where('lessonid', $request->get('lessonid'))
    //         ->get();
            
    //     return view('admin.adminlessons.lessonindex')
    //         ->with('lessonid', $request->get('lessonid'))
    //         ->with('chapterid', $request->get('chapterid'))
    //         ->with('bookid', $request->get('bookid'))
    //         ->with('booktitle', $request->get('booktitle'))
    //         ->with('manualselection', $request->get('manualselection'))
    //         ->with('manualselectionlink', $request->get('manualselectionlink'))
    //         ->with('lessoninfo', $lessoninfo)
    //         // ->with('lessonkey', $getlessonkey[0]->key)
    //         ->with('lessoncontents', $lessoncontents);
    // }
    // public function content(Request $request)
    // {
    //     return $request->all();
    // }
    // public function 
    public function viewlesson(Request $request)
    {
        // return $request->all();
        $lessoninfo = DB::table('lessons')
            ->where('id', $request->get('formlessonid'))
            ->first();

        $chapterinfo = Db::table('chapters')
            ->where('id', $lessoninfo->chapterid)
            ->first();

        $partinfo = Db::table('parts')
            ->where('id', $chapterinfo->partid)
            ->get();
            
        if(count($partinfo) == 0)
        {
            $bookinfo = Db::table('books')
                ->where('id', $chapterinfo->bookid)
                ->first();
        }else{
            $bookinfo = Db::table('books')
                ->where('id', $partinfo[0]->bookid)
                ->first();
        }
        // -----------------------------------------------------------------------------------------------------    
        $lessons = DB::table('lessons')
                ->where('chapterid', $lessoninfo->chapterid)
                ->get();
                
        $lessonkey = 1;
        
        foreach($lessons as $lesson){
            $lesson->key = $lessonkey;
            $lessonkey+=1;
        }
        

        $getlessonkey = collect($lessons->where('id',$request->get('formlessonid')))->flatten();
        // -----------------------------------------------------------------------------------------------------  
        if(count($partinfo) == 0)
        {
            $chapters = DB::table('chapters')
                ->where('bookid', $chapterinfo->bookid)
                ->get();
        }else{
            $chapters = DB::table('chapters')
                ->where('partid', $partinfo[0]->id)
                ->get();
                
        }
        $chapterkey = 1;
        
        foreach($chapters as $chapter){
            $chapter->key = $chapterkey;
            $chapterkey+=1;
        }

        $getchapterkey = collect($chapters->where('id',$chapterinfo->id))->flatten();
        // -----------------------------------------------------------------------------------------------------  
        $parts = DB::table('parts')
            ->where('bookid', $bookinfo->id)
            ->get();
            
        $partkey = 1;

        foreach($parts as $part){
            $part->key = $partkey;
            $partkey+=1;
        }
        
        if(count($partinfo) == 0)
        {
            $getpartkey = [];
            $partkey = 0;
        }else{
            $getpartkey = collect($parts->where('id',$partinfo[0]->id))->flatten();
            
            $partkey = $getpartkey[0]->key;
        }
        // -----------------------------------------------------------------------------------------------------  

        $lessoncontents = DB::table('lessoncontents')
            ->where('lessonid', $request->get('formlessonid'))
			->where('deleted','0')
            ->get();
            

        return view('admin.adminlessons.lessonindex')
            ->with('lessonid', $request->get('formlessonid'))
            ->with('lessoninfo', $lessoninfo)
            ->with('chapterinfo', $chapterinfo)
            ->with('partinfo', $partinfo)
            ->with('bookinfo', $bookinfo)
            // ->with('lessonid', $request->get('lessonid'))
            // ->with('chapterid', $request->get('chapterid'))
            // ->with('bookid', $request->get('bookid'))
            // ->with('booktitle', $request->get('booktitle'))
            // ->with('manualselection', $request->get('manualselection'))
            // ->with('manualselectionlink', $request->get('manualselectionlink'))
            ->with('lessonkey', $getlessonkey[0]->key)
            ->with('chapterkey', $getchapterkey[0]->key)
            ->with('partkey', $partkey)
            ->with('lessoncontents', $lessoncontents);
        // return view
    }
    public function updatelesson(Request $request)
    {
        // return $request->all();
        if($request->get('type') == 'title'){

            DB::table('lessons')
                ->where('id', $request->get('lessonid'))
                ->update([
                    'title'   => $request->get('lessontitle')
                ]);

        }else if($request->get('type') == 'description'){

            DB::table('lessons')
                ->where('id', $request->get('lessonid'))
                ->update([
                    'description'   => $request->get('lessondescription')
                ]);

        }

        return back();
    }
    public function deletelesson(Request $request)
    {
        // return $request->all();
        DB::table('lessons')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'   => '1'
            ]);
        
        $delete = DB::table('lessons')
            ->where('id', $request->get('id'))
            ->first();
        if($delete->deleted == 1)
        {
            return '1';
        }else{
            return '0';
        }
    }
    public function createcontent(Request $request)
    {
        // 1 = title; 2 = description; 3 = pdf; 4 = link; 5 = photo; 6 = video;
        
        date_default_timezone_set('Asia/Manila');
        
        if($request->get('contenttype') == 'title'){
            DB::table('lessoncontents')
                ->insert([
                    'content'       => $request->get('content'),
                    'lessonid'      => $request->get('lessonid'),
                    'type'          => '1',
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        if($request->get('contenttype') == 'description'){
            DB::table('lessoncontents')
                ->insert([
                    'content'       => $request->get('content'),
                    'lessonid'      => $request->get('lessonid'),
                    'type'          => '2',
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        if($request->get('contenttype') == 'file' || $request->get('contenttype') == 'image'){
            $lessoninfo = DB::table('lessons')
                ->where('id', $request->get('lessonid'))
                ->first();
            $chapterinfo = DB::table('chapters')
                ->where('id', $lessoninfo->chapterid)
                ->first();
            $partinfo = DB::table('parts')
                ->where('id', $chapterinfo->partid)
                ->get();
            if(count($partinfo) == 0)
            {
                $bookinfo = DB::table('books')
                    ->where('id', $chapterinfo->bookid)
                    ->first();
                $publicpath = 'books/'.$bookinfo->title.'/'.$chapterinfo->title.'/'.$lessoninfo->title;
            }else{
                $bookinfo = DB::table('books')
                    ->where('id', $partinfo[0]->bookid)
                    ->first();
                $publicpath = 'books/'.$bookinfo->title.'/'.$partinfo[0]->title.'/'.$chapterinfo->title.'/'.$lessoninfo->title;
            }
            
            $lessoncount = DB::table('lessoncontents')
                ->where('lessonid',$request->get('lessonid'))
                ->where('deleted','0')
                ->count();

            $count = $lessoncount+1;
            
            $urlFolder = str_replace('http://','',$request->root());
    
            if (! File::exists(public_path().$publicpath)) {
    
                $path = public_path($publicpath);
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            
             if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/')) {
    
                 $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/';
                
                 if(!File::isDirectory($cloudpath)){
    
                    File::makeDirectory($cloudpath, 0777, true, true);
                    
                 }
                
             }
    
    
            
            if($request->get('contenttype') == 'file'){
                $file = $request->file('content');
            }else{
                $file = $request->file('photos');
            }
            $extension = $file->getClientOriginalExtension();

             $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/';
    
    
             try{
    
                 $file->move($clouddestinationPath, $lessoninfo->title.'_'.$count.'.'.$extension);
    
             }
             catch(\Exception $e){
               
        
             }
            $destinationPath = public_path($publicpath.'/');
            
            try{
    
                $file->move($destinationPath,$lessoninfo->title.'_'.$count.'.'.$extension);
    
            }
            catch(\Exception $e){
               
        
            }
            DB::table('lessoncontents')
                ->insert([
                    'content'       => $lessoninfo->title.'_'.$count.'.'.$extension,
                    'lessonid'      => $request->get('lessonid'),
                    'type'          => '3',
                    'extension'     => $extension,
                    'filepath'      => $publicpath.'/'.$lessoninfo->title.'_'.$count.'.'.$extension,
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

            return back();
        }
        if($request->get('contenttype') == 'link'){
            DB::table('lessoncontents')
                ->insert([
                    'content'       => $request->get('content'),
                    'lessonid'      => $request->get('lessonid'),
                    'type'          => '4',
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
    }
    public function updatecontent(Request $request)
    {
        // return $request->all();
        // typelist:
        // 1 = title; 2 = description; 3 = pdf; 4 = link; 5 = photo; 6 = video;
        date_default_timezone_set('Asia/Manila');
        //return $request->all();
        if($request->get('title') == true){
            DB::table('lessoncontents')
                ->where('id', $request->get('id'))
                ->update([
                    'content'           => $request->get('title'),
                    'type'              => '1',
                    'filepath'          => null,
                    'extension'          => null,
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        if($request->get('description') == true){
            DB::table('lessoncontents')
                ->where('id', $request->get('id'))
                ->update([
                    'content'           => $request->get('description'),
                    'type'              => '2',
                    'filepath'          => null,
                    'extension'          => null,
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        if($request->has('file') == true || $request->has('photos') == true || $request->has('video') == true){
            
            $lessoncontentinfo = DB::table('lessoncontents')
                ->where('id', $request->get('id'))
                ->first();

            $lessoninfo = DB::table('lessons')
                ->where('id', $lessoncontentinfo->lessonid)
                ->first();
            $chapterinfo = DB::table('chapters')
                ->where('id', $lessoninfo->chapterid)
                ->first();
            $partinfo = DB::table('parts')
                ->where('id', $chapterinfo->partid)
                ->get();
            if(count($partinfo) == 0)
            {
                $bookinfo = DB::table('books')
                    ->where('id', $chapterinfo->bookid)
                    ->first();
                $publicpath = 'books/'.$bookinfo->title.'/'.$chapterinfo->title.'/'.$lessoninfo->title;
            }else{
                $bookinfo = DB::table('books')
                    ->where('id', $partinfo[0]->bookid)
                    ->first();
                $publicpath = 'books/'.$bookinfo->title.'/'.$partinfo[0]->title.'/'.$chapterinfo->title.'/'.$lessoninfo->title;
            }
			//return $publicpath;
                
    
            $urlFolder = str_replace('http://','',$request->root());
    
            if (! File::exists(public_path().$publicpath)) {
    
                $path = public_path($publicpath);
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            // return 'asdasda';
            
             if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/')) {
    
                 $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/';
                
                 if(!File::isDirectory($cloudpath)){
    
                    File::makeDirectory($cloudpath, 0777, true, true);
                    
                 }
                
             }
    
    
            // return basename($request->get('content'));
            
            if($request->has('file') == true){
                $file = $request->file('file');
                // $filetype = 3;
            }elseif($request->has('photos') == true){
                $file = $request->file('photos');
                // $filetype = 5;
            }elseif($request->has('video') == true){
                $file = $request->file('video');
                // $filetype = 6;
            }
            
            // $words = explode(" ", $lessoninfo->title);
            // $acronym = "";
            
            // foreach ($words as $w) {
            //   $acronym .= $w[0];
            // }
            $extension = $file->getClientOriginalExtension();
            //$clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/';
    
            $lessoncount = DB::table('lessoncontents')
            ->where('lessonid',$lessoncontentinfo->lessonid)
            ->where('id','<',$request->get('id'))
            ->where('deleted','0')
            ->count();
			$count = $lessoncount+1;
			
             $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/';
    
    
             try{
    
                 $file->move($clouddestinationPath, $lessoninfo->title.'_'.$count.'.'.$extension);
    
             }
             catch(\Exception $e){
               
        
             }
             //try{
    
                 //$file->move($clouddestinationPath, $lessoninfo->title.'_'.$count.'.'.$extension);
    
             //}
             //catch(\Exception $e){
               
        
             //}
                // return basename($request->get('content'));
            $destinationPath = public_path($publicpath.'/');
                // return $filename;
            
            try{
    
                $file->move($destinationPath,$lessoninfo->title.'_'.$count.'.'.$extension);
    
            }
            catch(\Exception $e){
               
        
            }
            DB::table('lessoncontents')
                ->where('id', $request->get('id'))
                ->update([
                    'content'       => $lessoninfo->title.'_'.$count.'.'.$extension,
                    'type'          => 3,
                    'extension'     => $extension,
                    'filepath'      => $publicpath.'/'.$lessoninfo->title.'_'.$count.'.'.$extension,
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);

        }
        if($request->get('link') == true){
            DB::table('lessoncontents')
                ->where('id', $request->get('id'))
                ->update([
                    'content'       => $request->get('link'),
                    'type'          => '4',
                    'extension'     => null,
                    'filepath'      => null,
                    'updateddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        return back();
    }
    public function deletecontent(Request $request)
    {
        return $request->all();
    }
}
