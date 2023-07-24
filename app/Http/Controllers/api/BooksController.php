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
    public function index(Request $request)
    {



        // $classroombooks = DB::table('classroombooks')
        //                         ->where('classroombooks.deleted',0)
        //                         ->where('classroomid','63')
        //                         ->join('books',function($join){
        //                                 $join->on('classroombooks.bookid','=','books.id');
        //                                 $join->where('books.deleted',0);
        //                         })
        //                         ->select('books.title','classroombooks.*','books.picurl')
        //                         ->get();


        
        
        // return response()->json($classroombooks);

        $studentid = DB::table('students')
                ->where('userid', $request->get('id'))
                ->first()
                ->id;



        $classrooms = Db::table('classrooms')
                ->select(
                    'classrooms.id',
                    'classrooms.classroomname',
                    'classrooms.createddatetime',
                    'teachers.firstname',
                    'teachers.middlename',
                    'teachers.lastname',
                    'teachers.suffix',
                    'classrooms.code'
                )
                ->join('teachers','classrooms.createdby','=','teachers.id')
                ->where('classrooms.deleted','0')
                ->distinct()
                ->get();
            $sortdata = array();
            if(count($classrooms) > 0){
                foreach($classrooms as $classroom){
                    $classroomid = $classroom->id;
                    $classroom->createddatetime = date('F d, Y h:i:s A', strtotime($classroom->createddatetime));
                    $classroom->students = Db::table('classroomstudents')
                        ->where('classroomid', $classroom->id)
                        ->where('deleted','0')
                        ->count();

                    $joined = Db::table('classroomstudents')
                        ->where('classroomid', $classroom->id)
                        ->where('classroomstudents.studentid',$studentid)
                        ->where('deleted','0')
                        ->get();
                    
                    if(count($joined) == 0){
                        $classroom->joined = 0;
                    }else{
                        $classroom->joined = 1;
                        $classroom->datejoined = date('F d, Y', strtotime($joined[0]->createddatetime));
                    }

                    if($classroom->joined == 1){

                        
                        $classroom->books = Db::table('classroombooks')
                            ->where('classroomid', $classroom->id)
                            ->join('books',function($join){
                                                $join->on('books.id','=','classroombooks.bookid');
                                                $join->where('books.deleted',0);
                                            })
                            ->where('classroombooks.deleted','0')
                            ->select('books.*')
                            ->get();

                        array_push($sortdata, $classroom->books);

                        
                }
            }
        }
        return response()->json($sortdata);


    }




    public function bookChapter($id)
    {



        $parts = DB::table('parts')
            ->where('bookid', $id)
            ->select('id', 'title')
            ->get();



        

        



        if (count($parts) > 0) {



            //check if the parts has chapters
            $chapter = DB::table('chapters')
                ->join('parts', 'parts.id', '=', 'chapters.partid')
                ->where('parts.bookid', $id)
                ->where('parts.deleted', 0)
                ->count();



            if($chapter > 0){



            $lessons = DB::table('lessons')
                ->join('chapters', 'chapters.id', '=', 'lessons.chapterid')
                ->join('parts', 'parts.id', '=', 'chapters.partid')
                ->where('parts.bookid', $id)
                ->where('parts.deleted', 0)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.id', 'parts.id as chapterid', 'parts.title as chaptertitle')
                ->orderBy('lessonid')
                // ->orderBy('chapterid')
                // ->orderBy('parts.sortid')
                // ->orderBy('chapters.sortid')
                // ->orderBy('lessons.sortid')
                // ->orderBy('lessonid')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                    ->where('lessonid', $lesson->id)
                    ->where('lessoncontents.deleted', 0)
                    ->value('filepath');

                $lesson->lessontitle = DB::table('lessons')
                    ->where('id', $lesson->id)
                    ->where('deleted', 0)
                    ->value('title');
            }
            

            $array = array($lessons, $parts);
        
            return response()->json($array);


            //if parts has no chapter
            }else{

                $lessons = DB::table('chapters')
                ->join('books', 'books.id', '=', 'chapters.bookid')
                ->join('lessons', 'lessons.chapterid', '=', 'chapters.id')
                ->where('books.id', $id)
                ->where('books.deleted', 0)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('chapters.id', 'lessons.title as lessontitle', 'chapters.id as chapterid', 'chapters.title as chaptertitle' ,'lessons.id as lessonid')
                // //->orderBy('parts.id')
                // ->orderBy('chapters.sortid')
                // ->orderBy('lessons.sortid')
                ->orderBy('lessonid')
                ->get();

                foreach ($lessons as $lesson) {
                    $lesson->path = DB::table('lessoncontents')
                        ->where('lessonid', $lesson->lessonid)
                        ->where('lessoncontents.deleted', 0)
                        ->value('filepath');
                }
            

                $array = array($lessons, $parts);
        
            return response()->json($array);





            }






        } else {
            $lessons = DB::table('lessons')
                ->join('chapters', 'chapters.id', '=', 'lessons.chapterid')
                ->where('chapters.bookid', $id)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.id as lessonid', 'lessons.title as lessontitle', 'chapters.id as chapterid', 'chapters.title as chaptertitle')
                ->orderBy('chapters.sortid')
                ->orderBy('lessons.sortid')
                ->orderBy('lessonid')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                    ->where('lessonid', $lesson->lessonid)
                    ->where('lessoncontents.deleted', 0)
                    ->value('filepath');
            }

            $array = array($lessons, $parts);
        
            return response()->json($array);
        }

    }




    public function bookChapter2($id)
    {

        $bookinfo = DB::table('books')
                ->where('id', $id)
                ->first();

        


        
        $parts = DB::table('parts')
            ->where('bookid', $id)
            ->where('deleted', 0)
            ->orderBy('parts.sortid')
            ->get();      

        
        if (count($parts) > 0) {



            //check if the parts has chapters
            $chapters = DB::table('chapters')
                ->join('parts', 'parts.id', '=', 'chapters.partid')
                ->where('parts.bookid', $id)
                ->where('parts.deleted', 0)
                ->where('chapters.deleted', 0)
                ->select('chapters.*')
                ->orderBy('chapters.sortid')
                ->get();



            if(count($chapters) > 0){



            $lessons = DB::table('lessons')
                ->join('chapters', 'chapters.id', '=', 'lessons.chapterid')
                ->join('parts', 'parts.id', '=', 'chapters.partid')
                ->where('parts.bookid', $id)
                ->where('parts.deleted', 0)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.*')
                ->orderBy('lessons.id')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                    ->where('lessonid', $lesson->id)
                    ->where('lessoncontents.deleted', 0)
                    // ->value('filepath');
                    ->get();

                $lesson->lessontitle = DB::table('lessons')
                    ->where('id', $lesson->id)
                    ->where('deleted', 0)
                    ->value('title');
            }

            $object = (object) [
                'bookcover' => $bookinfo->picurl,
                'parts' => $parts,
                'chapters' => $chapters,
                'lessons' => $lessons,
            ];
            

        
            return response()->json($object);


            //if parts has no chapter
            }else{

                $lessons = DB::table('chapters')
                ->join('books', 'books.id', '=', 'chapters.bookid')
                ->join('lessons', 'lessons.chapterid', '=', 'chapters.id')
                ->where('books.id', $id)
                ->where('books.deleted', 0)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('chapters.id', 'lessons.title as lessontitle', 'chapters.id as chapterid', 'chapters.title as chaptertitle' ,'lessons.id as lessonid')
                ->orderBy('lessons.id')
                ->get();

                foreach ($lessons as $lesson) {
                    $lesson->path = DB::table('lessoncontents')
                        ->where('lessonid', $lesson->lessonid)
                        ->where('lessoncontents.deleted', 0)
                        ->get();
                }

                $object = (object) [
                    'bookcover' => $bookinfo->picurl,
                    'parts' => $parts,
                    'lessons' => $lessons,
                    
                ];
            

                $array = array($lessons, $objects);
        
            return response()->json($object);

            





            }






        } else {


            $chapters = DB::table('chapters')
            ->where('bookid', $id)
            ->where('deleted', 0)
            ->get(); 



            $lessons = DB::table('lessons')
                ->join('chapters', 'chapters.id', '=', 'lessons.chapterid')
                ->where('chapters.bookid', $id)
                ->where('chapters.deleted', 0)
                ->where('lessons.deleted', 0)
                ->select('lessons.id as lessonid', 'lessons.title as lessontitle', 'chapters.id as chapterid', 'chapters.title as chaptertitle')
                ->orderBy('chapters.sortid')
                ->orderBy('lessons.sortid')
                ->orderBy('lessonid')
                ->get();

            foreach ($lessons as $lesson) {
                $lesson->path = DB::table('lessoncontents')
                    ->where('lessonid', $lesson->lessonid)
                    ->where('lessoncontents.deleted', 0)
                    ->get();
            }

            $object = (object) [
                'bookcover' => $bookinfo->picurl,
                'chapters' => $chapters,
                'lessons' => $lessons,
                
            ];
                    
            return response()->json($object);
        }





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
