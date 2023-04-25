<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Crypt;
use File;
class BookController extends Controller
{
    public function index($id, Request $request)
    {
        
        date_default_timezone_set('Asia/Manila');
        

        $books = DB::table('books')
            ->select(
                // 'subjects.title as subject',
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.picurl',
                'books.deleted'
            )
            // ->join('subjects','books.subjectid','=','subjects.id')
            ->where('books.deleted','0')
            ->get();

        $countbooks       = count($books);

        $booksaddedtoday  = collect($books->where('books.createddatetime', date('Y-m-d')));
        
        $academicprograms = DB::table('academicprogram')
            ->where('deleted','0')
            ->get();

        if($id == 'index'){

            $first = 0;

            if(count($academicprograms) == 0){
                $academicprogram = (object)array(
                    'id' => '0',
                    'programname' => 'OTHERS',
                    'selected' => 1
                );
                // return $books;
                $booksunder = array();
                foreach($books as $book)
                {
                    $checkifhasacadprog = DB::table('booksacadprog')
                        ->where('bookid', $book->bookid)
                        ->where('deleted', 0)
                        ->count();

                    if($checkifhasacadprog == 0)
                    {
                        $book->id = $book->bookid;
                        array_push($booksunder, $book);
                    }
                }
                $academicprogram->books = $booksunder;
                $academicprograms = [$academicprogram];
            }else{


                foreach($academicprograms as $academicprogram){

                    if($first == 0){
                        $academicprogram->selected = 1;
                        $first+=1;
                    }else{
                        $academicprogram->selected = 0;
                    }

                    $booksunder = Db::table('booksacadprog')
                        ->select(
                            'books.id',
                            'books.title as booktitle',
                            'books.description as bookdescription',
                            'books.picurl'
                        )
                        ->join('books','booksacadprog.bookid','=','books.id')
                        ->where('acadprogid', $academicprogram->id)
                        ->where('booksacadprog.deleted', '0')
                        ->where('books.deleted', '0')
                        ->get();
                        
                    $academicprogram->books = $booksunder;

                }

            }
            return view('admin.adminbooks.adminbooksindex')
                ->with('academicprograms',$academicprograms)
                ->with('books',$booksaddedtoday)
                ->with('countbooks',$countbooks);

        }else{

            // if(count($academicprograms) > 0){

            //     foreach($academicprograms as $academicprogram){

            //         if($request->get('academicprogramid') == $academicprogram->id){
            //             $academicprogram->selected = 1;
            //         }else{
            //             $academicprogram->selected = 0;
            //         }

            //         $booksunder = Db::table('booksacadprog')
            //             ->select(
            //                 'books.id',
            //                 'books.title as booktitle',
            //                 'books.description as bookdescription',
            //                 'books.picurl'
            //             )
            //             ->join('books','booksacadprog.bookid','=','books.id')
            //             ->where('acadprogid', $academicprogram->id)
            //             ->where('booksacadprog.deleted', '0')
            //             ->where('books.deleted', '0')
            //             ->get();
                        
            //         $academicprogram->books = $booksunder;
            //     }

            // }
            if($request->get('acadprogid') == 0)
            {
                $booksunder = array();
                foreach($books as $book)
                {
                    $checkifhasacadprog = DB::table('booksacadprog')
                        ->where('bookid', $book->bookid)
                        ->where('deleted', 0)
                        ->count();

                    if($checkifhasacadprog == 0)
                    {
                        $book->id = $book->bookid;
                        array_push($booksunder, $book);
                    }
                }
            }else{
                $booksunder = Db::table('booksacadprog')
                    ->select(
                        'books.id',
                        'books.title as booktitle',
                        'books.description as bookdescription',
                        'books.picurl'
                    )
                    ->join('books','booksacadprog.bookid','=','books.id')
                    ->where('booksacadprog.acadprogid', $request->get('acadprogid'))
                    ->where('booksacadprog.deleted', '0')
                    ->where('books.deleted', '0')
                    ->get();
            }
                        
            return view('admin.adminbooks.include.booksbyacadprog')->with('booksunder',$booksunder);

        }
    
    }
    public function viewbook(Request $request)
    {
        // return $id;
        $book = DB::table('books')
            ->select(
                // 'subjects.title as subject',
                'books.id as bookid',
                'books.title as booktitle',
                'books.description as bookdescription',
                'books.isactive as status',
                'books.picurl'
            )
            // ->join('subjects','books.subjectid','=','subjects.id')
            // ->where('books.deleted','0')
            ->where('books.id',$request->get('id'))
            ->first();
            
        $parts = DB::table('parts')
            ->where('bookid', $request->get('id'))
            ->where('deleted','0')
            ->get();

        $book->parts = $parts;

        if(count($parts) == 0)
        {
            $chapters = DB::table('chapters')
            ->where('bookid', $book->bookid)
            ->where('deleted','0')
            ->get();
    
            $book->chapters = $chapters;

            // if(count($chapters) > 0){

            //     foreach($chapters as $chapter){

            //         $lessons = Db::table('lessons')
            //             ->where('chapterid', $chapter->id)
            //             ->where('deleted','0')
            //             ->get();

            //         $chapter->lessons = $lessons;
            //         $quizzes = Db::table('chapterquiz')
            //             ->where('chapterid', $chapter->id)
            //             ->where('chapterquiz.deleted','0')
            //             ->get();
                        
            //         $chapter->quizzes = $quizzes;

            //     }
            // }
        }
        else{
    
            $book->chapters = [];
            // $book->chapters = [];
            // foreach($parts as $part){
            //     $chapters = DB::table('chapters')
            //         ->where('partid', $part->id)
            //         ->where('deleted','0')
            //         ->get();

            //     $part->chapters = $chapters;
            //     if(count($chapters) > 0){
            //         foreach($chapters as $chapter){
            //             $lessons = Db::table('lessons')
            //                 ->where('chapterid', $chapter->id)
            //                 ->where('deleted','0')
            //                 ->get();

            //             $chapter->lessons = $lessons;
            //             $quizzes = Db::table('chapterquiz')
            //                 ->where('chapterid', $chapter->id)
            //                 ->where('chapterquiz.deleted','0')
            //                 ->get();
                            
            //             $chapter->quizzes = $quizzes;
            //         }
            //     }
            // }
        }
            // }
            // return collect($book);
        // }
        // return $book->parts;
        return view('admin.adminbooks.adminbookview')
            ->with('book', $book);
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
            // return 'asdasda';
            
            // if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description)) {
    
            //     $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description;
                
            //     if(!File::isDirectory($cloudpath)){
    
            //         File::makeDirectory($cloudpath, 0777, true, true);
                    
            //     }
                
            // }
    
    
            // return basename($request->get('content'));
            $file = $request->file('editcoverphoto');
            // return $file;
            // $extension = $file->getClientOriginalExtension();
            // $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description.'/';
    
    
            // try{
    
            //     $file->move($clouddestinationPath, $employeename->email.'-'.strtoupper($employeename->lastname).' '.strtoupper($employeename->firstname[0].'.').$extension);
    
            // }
            // catch(\Exception $e){
               
        
            // }
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
    public function getchapterinfo(Request $request)
    {
        // return $request->all();
        $chapterinfo = DB::table('chapters')
            ->where('id', $request->get('id'))
            ->first();

        return collect($chapterinfo);
    }
    public function editchapterinfo(Request $request)
    {
        $chapterinfo = DB::table('chapters')
            ->where('id', $request->get('id'))
            ->update([
                'title'         => $request->get('editchaptertitle'),
                'description'   => $request->get('editdescription')
            ]);

        return $request->all();
    }
    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        // return $request->all();
        if($request->get('contenttype') == 'part'){

            $id = Db::table('parts')
                    ->insertGetId([
                        'title'             => $request->get('title'),
                        'description'       => $request->get('description'),
                        'bookid'            => $request->get('bookid'),
                        'createddatetime'   => date('Y-m-d H:i:s')
                    ]);

            $getinfo = DB::table('parts')
                ->where('id', $id)
                ->get();
            return $getinfo;

        }
        if($request->get('contenttype') == 'chapter'){

            $id = Db::table('chapters')
                    ->insertGetId([
                        'title'             => $request->get('title'),
                        'description'       => $request->get('description'),
                        'partid'            => $request->get('parentid'),
                        'bookid'            => $request->get('bookid'),
                        'createddatetime'   => date('Y-m-d H:i:s')
                    ]);

            $getinfo = DB::table('chapters')
                ->where('id', $id)
                ->get();

            return $getinfo;

        }
        if($request->get('contenttype') == 'lesson'){

            $id = Db::table('lessons')
                    ->insertGetId([
                        'title'             => $request->get('title'),
                        'description'       => $request->get('description'),
                        'chapterid'            => $request->get('parentid'),
                        // 'bookid'            => $request->get('bookid'),
                        'createddatetime'   => date('Y-m-d H:i:s')
                    ]);

            $getinfo = DB::table('lessons')
                ->where('id', $id)
                ->get();

            return $getinfo;

        }
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
    public function delete(Request $request)
    {
        
        if($request->get('contenttype') == 'part'){
            DB::table('parts')
                ->where('id', $request->get('id'))
                ->where('bookid', $request->get('bookid'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'chapter'){
            DB::table('chapters')
                ->where('id', $request->get('id'))
                ->where('bookid', $request->get('bookid'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'lesson'){
            DB::table('lessons')
                ->where('id', $request->get('id'))
                // ->where('bookid', $request->get('bookid'))
                ->update([
                    'deleted' => 1
                ]);
            return 'success';
        }
        if($request->get('contenttype') == 'quiz'){
            DB::table('chapterquiz')
                ->where('id', $request->get('id'))
                // ->where('bookid', $request->get('bookid'))
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
        // $urlFolder = str_replace('http://','',$request->root());
        if($request->has('cover'))
        {
            if (! File::exists(public_path().'books/'.$request->get('title'))) {
    
                $path = public_path('books/'.$request->get('title'));
    
                if(!File::isDirectory($path)){
                    
                    File::makeDirectory($path, 0777, true, true);
    
                }
                
            }
            // return 'asdasda';
            
            // if (! File::exists(dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description)) {
    
            //     $cloudpath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description;
                
            //     if(!File::isDirectory($cloudpath)){
    
            //         File::makeDirectory($cloudpath, 0777, true, true);
                    
            //     }
                
            // }
    
    
            // return basename($request->get('content'));
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = 
            // $clouddestinationPath = dirname(base_path(), 1).'/'.$urlFolder.'/employeecredentials/'.$credentialdescription->description.'/';
    
    
            // try{
    
            //     $file->move($clouddestinationPath, $employeename->email.'-'.strtoupper($employeename->lastname).' '.strtoupper($employeename->firstname[0].'.').$extension);
    
            // }
            // catch(\Exception $e){
               
        
            // }
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
        if($request->get('academicprograms') == true)
        {
            if(count($request->get('academicprograms'))>0)
            {
                foreach($request->get('academicprograms') as $acadprogid)
                {
                    if($acadprogid != 0)
                    {
                        DB::table('booksacadprog')
                            ->insert([
                                'bookid'    => $bookid,
                                'acadprogid'    => $acadprogid,
                                'createdby' => auth()->user()->id,
                                'createddatetime'   => date('Y-m-d H:i:s')
                            ]);
                    }
                }
            }
        }
        return back();
    }

    // public function description($action, $bookid, Request $request)
    // {
    //     date_default_timezone_set('Asia/Manila');

    //     $action = Crypt::decrypt($action);
        
    //     $bookdescription = DB::table('books')
    //         ->select(
    //             'subjects.title as subject',
    //             'books.id as bookid',
    //             'books.title as booktitle',
    //             'books.description as bookdescription',
    //             'books.picurl as coverphoto'
    //         )
    //         ->join('subjects','books.subjectid','=','subjects.id')
    //         ->where('books.isactive','1')
    //         ->where('books.deleted','0')
    //         ->where('books.id',$bookid)
    //         ->first();

    //     return view('admin.adminbookdescription')
    //         ->with('bookdescription',$bookdescription);
    // }
}
