<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;


class StudentActivitiesController extends Controller
{
    public static function index(Request $request)
    {

        $studentid = DB::table('students')
                ->where('userid', auth()->user()->id)
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
                            ->where('deleted','0')
                            ->get();
                        
                        
                        foreach($classroom->books as $book){
                                $book->countStatusZero = 1;
                                $bookid = $book->bookid;
                                $book->title = DB :: table('books')
                                                ->where('id', $bookid)
                                                ->value('title');
                                                
                                $book->picurl = DB:: table('books')
                                                ->where('id', $bookid)
                                                ->value('picurl');

                                $classroombooksid = Db::table('classroombooks')
                                    ->where('classroomid', $classroomid)
                                    ->where('deleted','0')
                                    ->value('id');

                                $book->quiz = DB::table('chapterquizsched')
                                    ->where('chapterquizsched.deleted', 0)
                                    ->where('classroomid', $classroom->id)
                                    ->join('lesssonquiz', function($join) {
                                        $join->on('chapterquizsched.chapterquizid', '=', 'lesssonquiz.id');
                                                
                                    })
                                    ->where('lesssonquiz.bookid', $bookid)
                                    ->where('chapterquizsched.status', 0)
                                    ->where('lesssonquiz.deleted', 0)
                                    ->select(
                                        'lesssonquiz.title',
                                        'lesssonquiz.id',
                                        'datefrom',
                                        'timefrom',
                                        'dateto',
                                        'timeto',
                                        'noofattempts',
                                        'chapterquizsched.id as schedid',
                                        'chapterquizsched.status',
                                        'chapterquizsched.createddatetime',
                                        'chapterquizsched.updateddatetime'
                                    )
                                    ->orderBy('createddatetime', 'desc')
                                    ->orderBy('updateddatetime', 'desc')
                                    ->get();


                                    
                                    $now = \Carbon\Carbon::now('Asia/Manila');

                                    foreach ($book->quiz as $item) {
                                        $dateTo = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->dateto . ' ' . $item->timeto);
                                        $dateFrom = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->datefrom . ' ' . $item->timefrom);
                                        
                                        $dateFrom = Carbon::create($item->datefrom);
                                        // Get the formatted date (Month DD, YYYY)
                                        $item->formattedDate = $dateFrom->isoFormat("MMMM DD, YYYY");

                                        // Get the weekday (Monday to Sunday)
                                        $item->weekday = $dateFrom->format("l");


                                        
                                        if ($dateTo <= $now) {
                                            $item->time = $dateTo->isoFormat("MMMM DD, YYYY H a");
                                            $item->timeline = "0";
                                            $item->book = $book->title;
                                        } elseif ($dateFrom > $now) {
                                            $item->book = $book->title;
                                            $item->timeline = "2";
                                        } else {
                                            $item->time = $dateTo->isoFormat("MMMM DD, YYYY H a");
                                            $item->book = $book->title;
                                            $item->timeline = "1";
                                            $item->classroombooksid = $classroombooksid;
                                            $item->classroomid = $classroomid;
                                            $item->bookid = $bookid;
                                        }
                                    }

                                        $countStatusZero1 = 0; // Variable to store the count of $item->status == 0
                                        $countStatusZero2 = 0; // Variable to store the count of $item->status == 0

                                        foreach ($book->quiz as $item) {
                                            if ($item->timeline == 1) {
                                                $countStatusZero1++;
                                                $book->countStatusZero = $countStatusZero1;
                                            }
                                            if ($item->timeline == 0) {
                                                $countStatusZero2++;
                                                $book->countStatusZero =  $countStatusZero2;
                                            }

                                        }
                            
                        }
                    }
                }
            }
        return view('student.activities.index')
                ->with('classrooms', $classrooms);
    }


    public static function viewScores(Request $request)
    {



        $studentid = DB::table('students')
                ->where('userid', auth()->user()->id)
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
            $myCollection = collect();
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
                            ->where('deleted','0')
                            ->get();

                        $bookscontainer = $classroom->books;

                        
                        foreach($bookscontainer as $book){
                                $bookid = $book->bookid;
                                $book->title = DB :: table('books')
                                                ->where('id', $bookid)
                                                ->value('title');
                                                
                                $book->picurl = DB:: table('books')
                                                ->where('id', $bookid)
                                                ->value('picurl');


                                $book->quiz = Db::table('lesssonquiz')
                                                ->where('bookid', $bookid)
                                                ->select('id','title')
                                                ->where('deleted','0')
                                                ->orderBy('id')
                                                ->groupby('id')
                                                ->get();

                                
                                $book->score = 0;
                                $book->maxpointtotal = 0;

                                foreach($book->quiz as $item){

                                    $item->book = $book->title;

                                    $item->picurl = $book->picurl;
                                    $record = Db::table('chapterquizrecords')
                                                ->where('chapterquizid', $item->id)
                                                ->where('deleted','0')
                                                ->where('checked','1')
                                                ->where('submittedby',auth()->user()->id)
                                                ->select('submitteddatetime', 'totalscore')
                                                ->latest('submitteddatetime')
                                                ->first();


                                    $recordcount = Db::table('chapterquizrecords')
                                                ->where('chapterquizid', $item->id)
                                                ->where('deleted','0')
                                                ->where('submittedby',auth()->user()->id)
                                                ->count();

                                    $maxpoints = DB::table('lessonquizquestions')
                                        ->where('quizid', $item->id)
                                        ->where('deleted', 0)
                                        ->where('typeofquiz', '!=', 4)
                                        ->where('typeofquiz', '!=', 9)
                                        ->sum('points');
                                    
                                

                                    if(isset($record)){
                                        $book->maxpointtotal+= $maxpoints;
                                        $book->score+=$record->totalscore;
                                        $item->date = \Carbon\Carbon::create( $record->submitteddatetime)->isoFormat("MMMM DD, YYYY H A");
                                        $item->score = $record->totalscore;
                                        $item->attempt = $recordcount;
                                        $item->percentage = round(($item->score/ $maxpoints) * 100);



                                    }else{
                                        
                                        $item->percentage = "-";
                                        $item->date = "-";
                                        $item->attempt = $recordcount;
                                        $item->score = "Not yet Graded";


                                    }


                                    


                                    $item->maxpoints = $maxpoints;


            

                        }


                        
                    }
                    $myCollection->push($bookscontainer);
                }
            }
        }

        return view('student.scores.index')
            ->with('myCollection', $myCollection);
    }
}
