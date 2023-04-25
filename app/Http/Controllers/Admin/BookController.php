<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
use File;
use Hash;
class BookController extends Controller
{
    public function hey(Request $request)
    {        
        date_default_timezone_set('Asia/Manila');
        $books = DB::table('books')
            ->select(
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.picurl',
                'books.deleted',
                'books.createddatetime'
            )
            ->where('books.deleted','0')
            ->get();
        $countbooks       = count($books);

        $booksaddedtoday  = collect($books)->where('books.createddatetime', date('Y-m-d'));
        $first = 0;

        return view('admin.adminbooks.adminbooksindex')
            ->with('booksaddedtoday',$booksaddedtoday)
            ->with('books',$books)
            ->with('countbooks',$countbooks);
    
    }
    public function index($id, Request $request)
    {        
        date_default_timezone_set('Asia/Manila');
        $books = DB::table('books')
            ->select(
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.picurl',
                'books.deleted',
                'books.createddatetime'
            )
            ->where('books.deleted','0')
            ->get();
        $countbooks       = count($books);
		
        $booksaddedtoday  = collect($books)->where('books.createddatetime', date('Y-m-d'));
        $first = 0;

        return view('admin.adminbooks.adminbooksindex')
            ->with('booksaddedtoday',$booksaddedtoday)
            ->with('books',$books)
            ->with('countbooks',$countbooks);
    
    }
    public function viewbook(Request $request)
    {
        
        $book = DB::table('books')
            ->select(
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.isactive as status',
                'books.picurl'
            )
            ->where('books.id',$request->get('id'))
            ->first();
            
        $parts = DB::table('parts')
            ->where('bookid', $request->get('id'))
            ->where('deleted','0')
            ->get();


        // return collect($chapters);
        $sortdata = array();
        $sortype = 0; //0 = datecreated; 1 = sortid;
        if(count($parts)>0)
        {
            foreach($parts as $partkey => $partvalue)
            {
                if($partvalue->sortid == null)
                {
                    Db::table('parts')
                        ->where('id', $partvalue->id)
                        ->update([
                            'sortid' => $partkey+1
                        ]);

                    $partvalue->sortid = $partkey+1;
                }else{
                    $sortype += 1;
                }
                array_push($sortdata,$partvalue);
            }
        }
        if($sortype == 0)
        {
            $parts = collect($sortdata)->sortBy('createdatetime')->values()->all();
        }else{
            $parts = collect($sortdata)->sortBy('sortid')->values()->all();
        }

        $book->parts = $parts;
        
        if(count($parts) == 0)
        {
            $chapters = DB::table('chapters')
            ->where('bookid', $book->bookid)
            ->where('deleted','0')
            ->get();
    
            if(count($chapters)>0)
            {
                foreach($chapters as $chapterkey => $chaptervalue)
                {
                    if($chaptervalue->sortid == null)
                    {
                        Db::table('parts')
                            ->where('id', $chaptervalue->id)
                            ->update([
                                'sortid' => $chapterkey+1
                            ]);
    
                        $chaptervalue->sortid = $chapterkey+1;
                    }else{
                        $sortype += 1;
                    }
                    array_push($sortdata,$chaptervalue);
                }
            }
            if($sortype == 0)
            {
                $chapters = collect($sortdata)->sortBy('createdatetime')->values()->all();
            }else{
                $chapters = collect($sortdata)->sortBy('sortid')->values()->all();
            }
            $book->chapters = $chapters;
        }
        else{
    
            $book->chapters = [];
        }
        
        return view('admin.adminbooks.adminbookview')
            ->with('book', $book);
    }
    public function getchapters(Request $request)
    {
        $chapters = DB::table('chapters')
            ->where('partid', $request->get('id'))
            ->where('deleted','0')
            ->get();

        // return collect($chapters);
        $sortdata = array();
        $sortype = 0; //0 = datecreated; 1 = sortid;
        if(count($chapters)>0)
        {
            foreach($chapters as $chapterkey => $chaptervalue)
            {
                if($chaptervalue->sortid == null)
                {
                    Db::table('chapters')
                        ->where('id', $chaptervalue->id)
                        ->update([
                            'sortid' => $chapterkey+1
                        ]);

                    $chaptervalue->sortid = $chapterkey+1;
                }else{
                    $sortype += 1;
                }
                array_push($sortdata,$chaptervalue);
            }
        }
        if($sortype == 0)
        {
            return  collect($sortdata)->sortBy('createdatetime')->values()->all();
        }else{
            return  collect($sortdata)->sortBy('sortid')->values()->all();
        }
    }
    public function getlessons(Request $request)
    {
        $contents = array();
        $lessons = DB::table('lessons')
            ->where('chapterid', $request->get('id'))
            ->where('deleted','0')
            ->get();
        if(count($lessons)>0)
        {
            foreach($lessons as $lesson)
            {
                $lesson->type = 'l';
                array_push($contents,$lesson);
            }
        }
        $quizzes = DB::table('chapterquiz')
            ->where('chapterid', $request->get('id'))
            ->where('deleted','0')
            ->get();
        if(count($quizzes)>0)
        {
            foreach($quizzes as $quiz)
            {
                $quiz->type = 'q';
                array_push($contents,$quiz);
            }
        }
        $contents = collect($contents)->sortBy('createddatetime');
        $contents = $contents->values()->alL();
        $sortdata = array();
        $sortype = 0; //0 = datecreated; 1 = sortid;
        if(count($contents)>0)
        {
            foreach($contents as $lessonkey => $lessonvalue)
            {
                if($lessonvalue->sortid == null)
                {
                    if($lessonvalue->type == 'l')
                    {
                        Db::table('lessons')
                            ->where('id', $lessonvalue->id)
                            ->update([
                                'sortid' => $lessonkey+1
                            ]);

                    }
                    if($lessonvalue->type == 'q')
                    {
                        Db::table('chapterquiz')
                            ->where('id', $lessonvalue->id)
                            ->update([
                                'sortid' => $lessonkey+1
                            ]);
                    }
                    $lessonvalue->sortid = $lessonkey+1;
                }else{
                    $sortype += 1;
                }
                array_push($sortdata,$lessonvalue);
            }
        }
        if($sortype == 0)
        {
            return  collect($sortdata)->sortBy('createdatetime')->values()->all();
        }else{
            return  collect($sortdata)->sortBy('sortid')->values()->all();
        }
        // $contents = 1z
    }
    public function getpartinfo(Request $request)
    {
        $partinfo = Db::table('parts')
            ->where('id', $request->get('id'))
            ->first();

        return collect($partinfo);
    }
    public function getchapterinfo(Request $request)
    {
        $chapterinfo = Db::table('chapters')
            ->where('id', $request->get('id'))
            ->first();

        return collect($chapterinfo);
    }
    public function getlessoninfo(Request $request)
    {
        $lessoninfo = Db::table('lessons')
            ->where('id', $request->get('id'))
            ->first();

        return collect($lessoninfo);
    }
    public function getquizinfo(Request $request)
    {
        $quizinfo = Db::table('chapterquiz')
            ->where('id', $request->get('id'))
            ->first();

        return collect($quizinfo);
    }
    public function updateinfo(Request $request)
    {
        
        if($request->get('type') == 'part')
        {
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'chapter')
        {
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'lesson')
        {
            DB::table('lessons')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'quiz')
        {
            DB::table('chapterquiz')
                ->where('id', $request->get('id'))
                ->update([
                    'sortid' => $request->get('contentsortid'),
                    'title' => $request->get('title'),
                    'description' => $request->get('description')
                ]);
        }
        return $request->all();
    }
    public function addpart(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $partid = DB::table('parts')
            ->insertGetId([
                'title'     => $request->get('title'),
                'bookid'    => $request->get('bookid'),
                'createdby' => auth()->user()->id,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $partinfo = DB::table('parts')
            ->where('id', $partid)
            ->first();

        return collect($partinfo);
    }
    public function addchapter(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $chapterid = DB::table('chapters')
            ->insertGetId([
                'title'     => $request->get('title'),
                'description'     => $request->get('description'),
                'bookid'    => $request->get('bookid'),
                'partid'    => $request->get('partid'),
                'createdby' => auth()->user()->id,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $chapterinfo = DB::table('chapters')
            ->where('id', $chapterid)
            ->first();

        return collect($chapterinfo);
    }
    public function addlesson(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $lessonid = DB::table('lessons')
            ->insertGetId([
                'title'     => $request->get('title'),
                'description'     => $request->get('description'),
                'chapterid'    => $request->get('chapterid'),
                'createdby' => auth()->user()->id,
                'type' => $request->get('lessontype'),
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $lessoninfo = DB::table('lessons')
            ->where('id', $lessonid)
            ->first();

        return collect($lessoninfo);
    }
    public function addquiz(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $quizid = DB::table('chapterquiz')
            ->insertGetId([
                'title'     => $request->get('title'),
                'description'     => $request->get('description'),
                'chapterid'    => $request->get('chapterid'),
                'type'    => $request->get('type'),
                'createdby' => auth()->user()->id,
                'createddatetime'   => date('Y-m-d H:i:s')
            ]);

        $chapterquizinfo = DB::table('chapterquiz')
            ->where('id', $quizid)
            ->first();

        return collect($chapterquizinfo);
    }
    public function bookinfoupdate(Request $request)
    {
        // return $request->all();
        if($request->has('editcoverphoto'))
        {
            // return $request->file('editcoverphoto');

            if (! File::exists(public_path().'books/'.$request->get('editbooktitle'))) {

                $path = public_path('books/'.$request->get('editbooktitle'));
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            
            $urlFolder = str_replace('http://','',$request->root());
            // return 'asdasda';
            
            if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('editbooktitle'))) {
    
                $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('editbooktitle');
                
                if(!File::isDirectory($cloudpath)){
    
                    File::makeDirectory($cloudpath, 0777, true, true);
                    
                }
                
            }
    
    
            // return basename($request->get('content'));
            $file = $request->file('editcoverphoto');
            // return $file;
            // $extension = $file->getClientOriginalExtension();
            $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('editbooktitle').'/';
    
    
            try{
    
                $file->move($clouddestinationPath, $file->getClientOriginalName());
    
            }
            catch(\Exception $e){
               
        
            }
                // return basename($request->get('content'));
            $destinationPath = public_path('books/'.$request->get('editbooktitle').'/');
                // return $filename;
            
            try{
    
                $file->move($destinationPath,$file->getClientOriginalName());
    
            }
            catch(\Exception $e){
               
        
            }
            // return $file->getClientOriginalName();
            DB::table('books')
            ->where('id', $request->get('editbookid'))
            ->update([
                'picurl'            => 'books/'.$request->get('editbooktitle').'/'.$file->getClientOriginalName(),
            ]);
        }
        DB::table('books')
            ->where('id', $request->get('editbookid'))
            ->update([
                'title'         => $request->get('editbooktitle'),
                'description'   => $request->get('editbookdescription')
            ]);
        return back();
    }
    public function bookstatusupdate(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        DB::table('books')
            ->where('id', $request->get('bookid'))
            ->update([
                'isactive'  => $request->get('bookstatus')
            ]);
    }
    public function getinfo(Request $request)
    {
        // return $request->all();
        if($request->get('datarequesttype') == 'part'){
            $info = DB::table('parts')
                ->where('id', $request->get('datarequestid'))
                ->get();
        }elseif($request->get('datarequesttype') == 'chapter'){
            $info = DB::table('chapters')
                ->where('id', $request->get('datarequestid'))
                ->get();
        }elseif($request->get('datarequesttype') == 'lesson'){
            $info = DB::table('lessons')
                ->where('id', $request->get('datarequestid'))
                ->get();
        }
        
        return $info;
    }
    public function update(Request $request)
    {
        // return $request->all();
        if($request->get('contenttype') == 'part'){
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description'   => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'chapter'){
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description'   => $request->get('description')
                ]);
        }
        elseif($request->get('type') == 'lesson'){
            DB::table('lessons')
                ->where('id', $request->get('id'))
                ->update([
                    'title' => $request->get('title'),
                    'description'   => $request->get('description')
                ]);
        }
        // return back();
    }
    public function deletebycontenttype(Request $request)
    {
        
        if($request->get('contenttype') == 'part'){
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'chapter'){
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'lesson'){
            DB::table('lessons')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'quiz'){
            DB::table('chapterquiz')
                ->where('id', $request->get('id'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
    }
    public function createcontent(Request $request)
    {
        // return $request->all();
        date_default_timezone_set('Asia/Manila');
        if($request->get('type') == 'part'){
            DB::table('parts')
                ->insert([
                    'title'             =>  $request->get('title'),
                    'description'       =>  $request->get('description'),
                    'bookid'            =>  $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        elseif($request->get('type') == 'chapter'){
            DB::table('chapters')
                ->insert([
                    'title'             =>  $request->get('title'),
                    'description'       =>  $request->get('description'),
                    'partid'            =>  $request->get('partid'),
                    'bookid'            =>  $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        elseif($request->get('type') == 'lesson'){
            DB::table('lessons')
                ->insert([
                    'title'             =>  $request->get('title'),
                    'description'       =>  $request->get('description'),
                    'chapterid'         =>  $request->get('chapterid'),
                    // 'bookid'            =>  $request->get('bookid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        return back();
    }
    public function createbooks($id, Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        // return $request->all();
        if($request->has('cover'))
        {
            if (! File::exists(public_path().'books/'.$request->get('title'))) {
    
                $path = public_path('books/'.$request->get('title'));
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            // return 'asdasda';
            
            $urlFolder = str_replace('http://','',$request->root());
            if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('title'))) {
    
                $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('title');
                
                if(!File::isDirectory($cloudpath)){
    
                    File::makeDirectory($cloudpath, 0777, true, true);
                    
                }
                
            }
    
    
            // return basename($request->get('content'));
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/books/'.$request->get('title').'/';
    
    
            try{
    
                $file->move($clouddestinationPath, $file->getClientOriginalName());
    
            }
            catch(\Exception $e){
               
        
            }
                // return basename($request->get('content'));
            $destinationPath = public_path('books/'.$request->get('title').'/');
                // return $filename;
            
            try{
    
                $file->move($destinationPath,$file->getClientOriginalName());
    
            }
            catch(\Exception $e){
               
        
            }
            // return back();
            $action = Crypt::decrypt($id);
    
            // if($action == 'create'){
    
            $bookid = DB::table('books')
                ->insertGetId([
                    'title'             => $request->get('title'),
                    'description'       => $request->get('description'),
                    'subjectid'         => $request->get('subjectid'),
                    'picurl'            => 'books/'.$request->get('title').'/'.$file->getClientOriginalName(),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
    
            // }
        }else{
            
    
            $bookid = DB::table('books')
                ->insertGetId([
                    'title'             => $request->get('title'),
                    'description'       => $request->get('description'),
                    'subjectid'         => $request->get('subjectid'),
                    'createddatetime'   => date('Y-m-d H:i:s')
                ]);
        }
        return back();
    }
    public function deletebook(Request $request)
    {
        // return $request->all();
        // return ;

        if(Hash::check($request->get('password'), auth()->user()->password))
        {
            DB::table('books')
                ->where('id', $request->get('bookid'))
                ->update([
                    'deleted'   => '1'
                ]);

            return '1';
        }else{
            
            return '0';
        }
    }
}
