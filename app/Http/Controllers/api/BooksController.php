<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use stdClass;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $classroombooks = DB::table('classroombooks')
                                ->where('classroombooks.deleted',0)
                                ->where('classroomid','63')
                                ->join('books',function($join){
                                        $join->on('classroombooks.bookid','=','books.id');
                                        $join->where('books.deleted',0);
                                })
                                ->select('books.title','classroombooks.*','books.picurl')
                                ->get();


        
        
        return response()->json($classroombooks);


    }




    public function bookChapter($id)
    {



        $parts = DB::table('parts')
            ->where('bookid', $id)
            ->select('id', 'title')
            ->get();



        

        



        if (count($parts) > 0) {


            $lessons = DB::table('lessons')
                ->join('parts', 'parts.id', '=', 'lessons.chapterid')
                ->where('parts.bookid', $id)
                ->where('parts.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.id', 'lessons.title', 'parts.id as chapterid', 'parts.title as chaptertitle')
                ->orderBy('chapterid')
                ->orderBy('lessons.id')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                    ->where('lessonid', $lesson->id)
                    ->where('lessoncontents.deleted', 0)
                    ->value('filepath');
            }
            

            return response()->json($lessons);



        } else {
            $lessons = DB::table('lessons')
                ->join('chapters', 'chapters.id', '=', 'lessons.chapterid')
                ->where('chapters.bookid', $id)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.id', 'lessons.title', 'chapters.id as chapterid', 'chapters.title as chaptertitle')
                ->orderBy('chapterid')
                ->orderBy('lessons.id')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                    ->where('lessonid', $lesson->id)
                    ->where('lessoncontents.deleted', 0)
                    ->value('filepath');
            }

            return response()->json($lessons);
        }

    }




    public function bookChapter2()
    {

        $id = 10;

        // $bookinfo = Db::table('books')
        //             ->where('id', $id)
        //             ->select('id','title')
        //             ->first();

        $parts = Db::table('parts')
                    ->where('bookid', $id)
                    ->select('id','title')
                    ->where('deleted', 0)
                    ->get();

        // $emptyObject = new stdClass();


        //     if (count($parts) > 0) {
        //         foreach ($parts as $part) {

        //             $chapters = DB::table('chapters')
        //                 ->where('partid', $part->id)
        //                 ->select('id', 'title')
        //                 ->where('deleted', 0)
        //                 ->get();


        //             if (count($chapters) > 0) {

        //                 foreach ($chapters as $chapter) {
                            
        //                     $lessons = DB::table('lessons')
        //                         ->where('chapterid', $chapter->id)
        //                         ->where('deleted', 0)
        //                         ->select('id', 'title')
        //                         ->get();



        //                     foreach ($lessons as $lesson){

        //                         $lesson->lessoncontent = DB::table('lessoncontents')
        //                             ->where('lessonid',$lesson->id)
        //                             ->where('lessoncontents.deleted',0)
        //                             ->get();

        //                     }


        //                     $chapter->lessons = $lessons;
        //                 }

        //                 $part->chapters = $chapters;

        //             } else {

        //                 $lessons = DB::table('lessons')
        //                     ->where('chapterid', $part->id)
        //                     ->select('id', 'title')
        //                     ->where('deleted', 0)
        //                     ->get();


        //                 foreach ($lessons as $lesson){

        //                         $lesson->path = DB::table('lessoncontents')
        //                             ->where('lessonid',$lesson->id)
        //                             ->where('lessoncontents.deleted',0)
        //                             ->value('filepath');

        //                 }

        //                 $chapter = $lessons;
        //                 $chapter->path = $lesson->path;

        //             }
        //         }


        //                 return response()->json($lessons);
        //     }else{

            $lessons = DB::table('lessons')
                ->join('chapters', 'chapters.id', '=', 'lessons.chapterid')
                ->where('chapters.bookid', $id)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.id', 'lessons.title' , 'chapters.id as chapterid' ,  'chapters.title as chaptertitle')
                ->orderby('chapterid')
                ->orderby('lessons.id')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                            ->where('lessonid',$lesson->id)
                            ->where('lessoncontents.deleted',0)
                            ->value('filepath'); 


            }


                // }




                    
                    return response()->json($lessons);



        
        



    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
