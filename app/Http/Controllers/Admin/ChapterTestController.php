<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
class ChapterTestController extends Controller
{
    
    public static function createchaptertest(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        // return $request->all();
        $chapterinfo = DB::table('chapters')
            ->where('id', $request->get('formchapterid'))
            ->first();

        $bookinfo = Db::table('books')
            ->where('id', $chapterinfo->bookid)
            ->first();

        if($request->get('chaptertestid'))
        {
            $chaptertestinfo = DB::table('chapterquiz')
                ->where('id', $request->get('chaptertestid'))
                ->get();
            if(count($chaptertestinfo) == 0)
            {
                $chaptertestinfo = [];
                array_push($chaptertestinfo, (object)array(
                    'status' => 0
                ));
                $chaptertestinfo = $chaptertestinfo[0];
            }else{
                $chaptertestinfo = $chaptertestinfo[0];

                $chaptertestinfo->questions = DB::table('chapterquizquestions')
                    ->where('headerid', $chaptertestinfo->id)
                    ->where('deleted','0')
                    ->get();
                    
                if(count($chaptertestinfo->questions)>0)
                {
                    $num = 0;
                    foreach($chaptertestinfo->questions as $question)
                    {
                        $num+=1;
                        $question->num = $num;
                        $answers = DB::table('chapterquizchoices')
                            ->select('id as answerid','description','answer','questionid','deleted')
                            ->where('deleted','0')
                            ->where('questionid', $question->id)
                            ->get();
                        $question->answers = $answers;
                        
                    }
                    $chaptertestinfo->questions = collect($chaptertestinfo->questions)->sortByDesc('num');
                }
                
                $chaptertestinfo->status = 1;
            }
        }else{
            $chaptertestinfo = [];
            array_push($chaptertestinfo, (object)array(
                'status' => 0
            ));
            $chaptertestinfo = $chaptertestinfo[0];
        }
        
        if(strtolower($request->get('formquiztype')) == 'customize')
        {
            $quiztype = 0;
        }else{
            $quiztype = 1;
        }
            return view('admin.adminchapters.createchaptertest')
                ->with('chapterinfo', $chapterinfo)
                ->with('chaptertestinfo', $chaptertestinfo)
                ->with('bookinfo', $bookinfo)
                ->with('pagetitle', 'Create Chapter Test')
                ->with('quiztype',$quiztype);
    }
    // public static function updatebasicdetails(Request $request)
    // {

    //     date_default_timezone_set('Asia/Manila');
    //     // return $request->all();
    //     if($request->get('chaptertestid'))
    //     {

    //         $chaptertestid = DB::table('chapterquiz')
    //             ->where('id', $request->get('chaptertestid'))
    //             ->update([
    //                 'chapterid'         => $request->get('chapterid'),
    //                 'title'             => $request->get('chaptertesttitle'),
    //                 'description'       => $request->get('chaptertestdescription')
    //             ]);

    //     }else{

    //         $chaptertestid = DB::table('chapterquiz')
    //             ->insertGetId([
    //                 'chapterid'         => $request->get('chapterid'),
    //                 'title'             => $request->get('chaptertesttitle'),
    //                 'description'       => $request->get('chaptertestdescription'),
    //                 'createddatetime'   => date('Y-m-d H:i:s')
    //             ]);
    //         $request = $request->merge([
    //             'formchapterid'     => $request->get('chapterid'),
    //             'formquiztype'      => 'customize',
    //             'chaptertestid'     => $chaptertestid
    //         ]);
            
    //         if($request->get('quiztype') == '0')
    //         {
    //             $quiztype = 'customize';
    //         }else{
    //             $quiztype = 'upload';
    //         }
    //         return redirect('/admincreatechaptertest?formchapterid='.$request->get('chapterid').'&formquiztype='.$quiztype.'&chaptertestid='.$chaptertestid);
    //         // return \Redirect::route('/admincreatechaptertest?formchapterid='.$request->get('chapterid').)->with($request);
    //         // return self::createchaptertest($request);
    //     }
        
    // }
    public function createquestion(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        if($request->get('points') == null)
        {
            $points = 0;

        }else{
            $points = $request->get('points');
        }
        $questionid = DB::table('chapterquizquestions')
            ->insertGetId([
                'headerid'          => $request->get('chaptertestid'),
                'question'          => $request->get('question'),
                'points'            => $points,
                'type'              => $request->get('questiontype'),
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $questioninfo = DB::table('chapterquizquestions')
            ->where('id', $questionid)
            ->first();

        return collect($questioninfo);
    }
    public function editquestion(Request $request)
    {
        if($request->get('points') == null)
        {
            $points = 0;

        }else{
            $points = $request->get('points');
        }
        
        DB::table('chapterquizquestions')
            ->where('id',$request->get('questionid'))
            ->update([
                'question' => $request->get('question'),
                'points' => $points,
                'type' => $request->get('type')
            ]);
        $request->merge([
            'editedpoints' => $points
         ]);
        return $request->all();
        
    }
    public function deletequestion(Request $request)
    {
        // return $request->all();
        DB::table('chapterquizquestions')
            ->where('id', $request->get('questionid'))
            ->update([
                'deleted' => 1
            ]);
        
        DB::table('chapterquizchoices')
            ->where('questionid',$request->get('questionid'))
            ->update([
                'deleted'=>1
            ]);

        return $request->get('questionid');
    }
    public function addanswers(Request $request)
    {
        
        date_default_timezone_set('Asia/Manila');
        
        foreach($request->get('choices') as $choice)
        {
            DB::table('chapterquizchoices')
                ->insert([
                    'questionid'          => $request->get('questionid'),
                    'description'          => $choice,
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        $questioninfo = DB::table('chapterquizquestions')
            ->where('id', $request->get('questionid'))
            ->first();
            
        $answers = DB::table('chapterquizchoices')
            ->where('questionid', $request->get('questionid'))
            ->get();
        $questioninfo->answers = $answers;
        return collect($questioninfo);
    }
    public function editanswer(Request $request)
    {
        // return $request->all();
        date_default_timezone_set('Asia/Manila');

        DB::table('chapterquizchoices')
            ->where('id', $request->get('answerid'))
            ->update([
                'description'   => $request->get('newanswer')
            ]);

        return $request->all();
        

    }
    public function deleteanswer(Request $request)
    {
        $questionid = DB::table('chapterquizchoices')
            ->where('id', $request->get('answerid'))
            ->first()->questionid;

        DB::table('chapterquizchoices')
            ->where('id', $request->get('answerid'))
            ->update([
                'deleted'   => 1
            ]);
        
        
        $answersleft = DB::table('chapterquizchoices')
            ->where('questionid', $questionid)
            ->where('deleted', '0')
            ->get();

        $request->merge([
            'answersleft'=>count($answersleft)
        ]);
        return $request->all();
        
    }
    public function viewchaptertest(Request $request)
    {
        // return $request->all();
        date_default_timezone_set('Asia/Manila');
        // return $request->all();

            
        $chaptertestinfo = DB::table('chapterquiz')
            ->where('id', $request->get('formquizid'))
            ->first();

        $chapterinfo = DB::table('chapters')
            ->where('id', $chaptertestinfo->chapterid)
            ->first();

        $bookinfo = Db::table('books')
            ->where('id', $chapterinfo->bookid)
            ->first();
        if($chaptertestinfo->type == '1')
        {

            $chaptertestinfo->questions = DB::table('chapterquizquestions')
                ->where('headerid', $chaptertestinfo->id)
                ->where('deleted','0')
                ->get();
                
            if(count($chaptertestinfo->questions)>0)
            {
                $num = 0;
                foreach($chaptertestinfo->questions as $question)
                {
                    $num+=1;
                    $question->num = $num;
                    $answers = DB::table('chapterquizchoices')
                        ->select('id as answerid','description','answer','questionid','deleted')
                        ->where('deleted','0')
                        ->where('questionid', $question->id)
                        ->get();
                    $question->answers = $answers;
                    
                }
                $chaptertestinfo->questions = collect($chaptertestinfo->questions)->sortByDesc('num');
            }
            
        }else{
            $chaptertestinfo->attachments = DB::table('chapterquizattachments')
                ->where('chapterquizid', $chaptertestinfo->id)
                ->where('deleted','0')
                ->get();
        }
        $chaptertestinfo->status = 1;
    
        // return collect($chaptertestinfo);
        return view('admin.adminchapters.chaptertestview')
            ->with('chapterinfo', $chapterinfo)
            ->with('chaptertestinfo', $chaptertestinfo)
            ->with('bookinfo', $bookinfo)
            ->with('pagetitle', 'Chapter Test')
            ->with('quiztype', $chaptertestinfo->type);
    }
    public function updateanswer(Request $request)
    {
        DB::table('chapterquizchoices')
            ->where('id', $request->get('answerid'))
            ->update([
                'answer'    => $request->get('answer')
            ]);
    }
    public function chapterstestuploadfiles(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        // return $request->all();
        foreach($request->file('files') as $eachfile)
        {
            $chaptertestinfo = DB::table('chapterquiz')
                ->where('id', $request->get('chaptertestid'))
                ->first();

            $chapterinfo = DB::table('chapters')
                ->where('id', $request->get('chapterid'))
                ->first();

            $partinfo = DB::table('parts')
                ->where('id', $chapterinfo->partid)
                ->get();

            if(count($partinfo) == 0)
            {
                $bookinfo = DB::table('books')
                    ->where('id', $chapterinfo->bookid)
                    ->first();
                $publicpath = 'books/'.$bookinfo->title.'/'.$chapterinfo->title.'/'.$chaptertestinfo->title;
            }else{
                $bookinfo = DB::table('books')
                    ->where('id', $partinfo[0]->bookid)
                    ->first();
                $publicpath = 'books/'.$bookinfo->title.'/'.$partinfo[0]->title.'/'.$chapterinfo->title.'/'.$chaptertestinfo->title;
            }
            
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
    
    
            $file = $eachfile;
            $count = DB::table('chapterquizattachments')
            ->where('chapterquizid', $request->get('chaptertestid'))
            ->where('deleted','0')
            ->count();
            $extension = $file->getClientOriginalExtension();

             $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/'.$publicpath.'/';
    
    
             try{
                // $file->move($destinationPath,'Quiz_'.($count+1).'.'.$extension);
                 $file->move($clouddestinationPath,'Quiz_'.($count+1).'_'.$file->getClientOriginalName().'.'.$extension);
    
             }
             catch(\Exception $e){
               
        
             }
            $destinationPath = public_path($publicpath.'/');
            
            try{
                $file->move($destinationPath,'Quiz_'.($count+1).'_'.$file->getClientOriginalName().'.'.$extension);
    
            }
            catch(\Exception $e){
               
            }
            DB::table('chapterquizattachments')
                ->insert([
                    'chapterquizid' => $request->get('chaptertestid'),
                    'filename'      => 'Quiz_'.($count+1).'_'.$file->getClientOriginalName().'.'.$extension,
                    'extension'     => $extension,
                    'filepath'      => $publicpath.'/Quiz_'.($count+1).'_'.$file->getClientOriginalName().'.'.$extension,
                    'createdby'     => auth()->user()->id,
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);

        }
        return back();
    }
    public function deletefile(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        DB::table('chapterquizattachments')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'    => 1,
                'deletedby'    => auth()->user()->id,
                'deleteddatetime' => date('Y-m-d H:i:s')
            ]);
    }


}


