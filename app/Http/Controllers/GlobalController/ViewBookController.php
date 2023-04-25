<?php

namespace App\Http\Controllers\GlobalController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ViewBookController extends Controller
{
    
    public function viewbook($id, Request $request)
    {
        // date_default_timezone_set('Asia/Manila');
        $ids = explode('-',$id);
        $classroombookid = $ids[0];
        $classroomid = $ids[1];
        $bookid = $ids[2];

        $bookinfo = DB::table('books')
                        ->where('id',$bookid)
                        ->select('id','title','description','picurl')
                        ->first();

        // return   collect($bookinfo);

        // $parts = Db::table('parts')
        //     ->where('bookid', $bookinfo->id)
        //     ->where('deleted','0')
        //     ->get();
        // $chapters = Db::table('chapters')
        //     ->where('bookid', $bookinfo->id)
        //     ->where('deleted','0')
        //     ->get();
        // if(count($parts)>0)
        // {
        //     foreach($parts as $part)
        //     {
        //         $chapters = Db::table('chapters')
        //             ->where('partid', $part->id)
        //             ->where('deleted','0')
        //             ->get();

        //         $part->chapters = $chapters;
        //         if(count($chapters)>0)
        //         {
        //             foreach($chapters as $chapter)
        //             {
        //                 $chaptercontents = array();

        //                 $lessons = Db::table('lessons')
        //                     ->where('chapterid', $chapter->id)
        //                     ->where('deleted','0')
        //                     ->get();
                        
        //                 if(count($lessons)>0)
        //                 {
        //                     foreach($lessons as $lesson)
        //                     {
        //                         $lessoncontents = DB::table('lessoncontents')
        //                             ->where('lessonid', $lesson->id)
        //                             ->where('deleted','0')
        //                             ->orderBy('id','asc')
        //                             ->get();

        //                         $lesson->lessoncontents = $lessoncontents;
        //                         $lesson->displaytype = 'l';
        //                         array_push($chaptercontents, $lesson);
        //                     }
        //                 }

        //                 $quizzes = Db::table('chapterquiz')
        //                     ->where('chapterid', $chapter->id)
        //                     ->where('deleted','0')
        //                     ->get();

        //                 if(count($quizzes)>0)
        //                 {
        //                     foreach($quizzes as $quiz)
        //                     {
                                
        //                         $questions = DB::table('chapterquizquestions')
        //                             ->where('headerid', $quiz->id)
        //                             ->where('deleted','0')
        //                             ->get();

        //                         $quiz->questions = collect($questions)->shuffle()->flatten();
        //                         // $quiz->questions = $questions;

        //                         $checkifschedexists = DB::table('chapterquizsched')
        //                             ->where('classroomid',$classroomid)
        //                             ->where('chapterquizid',$quiz->id)
        //                             ->where('deleted','0')
        //                             ->get();

        //                         if(count($checkifschedexists) == 0)
        //                         {
        //                             $quiz->sched = 0;
        //                         }else{
        //                             foreach($checkifschedexists as $checkifschedexist)
        //                             {
        //                                 if(date('Y-m-d H:i:s') >= $checkifschedexist->datefrom.' '.$checkifschedexist->timefrom && date('Y-m-d H:i:s') <= $checkifschedexist->dateto.' '.$checkifschedexist->timeto)
        //                                 {
        //                                     DB::table('chapterquizsched')
        //                                         ->where('id', $checkifschedexist->id)
        //                                         ->update([
        //                                             'status'    => '1'
        //                                         ]);
        //                                     $checkifschedexist->status = 1;
        //                                 }else{
        //                                     DB::table('chapterquizsched')
        //                                         ->where('id', $checkifschedexist->id)
        //                                         ->update([
        //                                             'status'    => '0'
        //                                         ]);
        //                                     $checkifschedexist->status = 0;
        //                                 }
        //                                 $checkifschedexist->datefrom = date('M d, Y',strtotime($checkifschedexist->datefrom));
        //                                 $checkifschedexist->timefrom = date('h:i:s A',strtotime($checkifschedexist->timefrom));
        //                                 $checkifschedexist->dateto   = date('M d, Y',strtotime($checkifschedexist->dateto));
        //                                 $checkifschedexist->timeto   = date('h:i:s A',strtotime($checkifschedexist->timeto));
        //                             }
        //                             $quiz->schedinfo = $checkifschedexists[0];
        //                             $quiz->sched = 1;
        //                             // return $quiz->schedinfo->id;
        //                         }

        //                         if(count($questions)>0)
        //                         {
        //                             foreach($questions as $question)
        //                             {
        //                                 $answers = DB::table('chapterquizchoices')
        //                                     ->where('questionid', $question->id)
        //                                     ->where('deleted','0')
        //                                     ->get();
        //                                 $noofanswers = count(collect($answers->where('answer','1')));

        //                                 $question->noofanswers = $noofanswers;

        //                                 if(count($answers) > 0)
        //                                 {
        //                                     $question->answers = collect($answers)->shuffle()->flatten();
        //                                 }
        //                                 else{
        //                                     $question->answers = $answers;
        //                                 }
        //                             }
        //                         }
        //                         $quiz->displaytype = 'q';

        //                         $checkattempts = Db::table('chapterquizrecords')
        //                             ->where('chapterquizid', $quiz->id)
        //                             ->where('submittedby', auth()->user()->id)
        //                             ->get();
                                
        //                         if(count($checkattempts)>0)
        //                         {
        //                             foreach($checkattempts as $checkattempt)
        //                             {
        //                                 $checkattempt->details = DB::table('chapterquizrecordsdetail')
        //                                     ->where('headerid', $checkattempt->id)
        //                                     ->get();
        //                             }
        //                         }
        //                         $quiz->records = $checkattempts;
        //                         array_push($chaptercontents, $quiz);
        //                     }
        //                 }
                        
        //                 $chapter->chaptercontents = collect($chaptercontents)->sortBy('createddatetime')->flatten();
        //             }
        //         }
        //     }
        // }else{
        //     if(count($chapters)>0)
        //     {
        //         foreach($chapters as $chapter)
        //         {
        //             $chaptercontents = array();

        //             $lessons = Db::table('lessons')
        //                 ->where('chapterid', $chapter->id)
        //                 ->where('deleted','0')
        //                 ->get();
                    
        //             if(count($lessons)>0)
        //             {
        //                 foreach($lessons as $lesson)
        //                 {
        //                     $lessoncontents = DB::table('lessoncontents')
        //                         ->where('lessonid', $lesson->id)
        //                         ->where('deleted','0')
        //                         ->orderBy('id','asc')
        //                         ->get();

        //                     $lesson->lessoncontents = $lessoncontents;
        //                     $lesson->displaytype = 'l';
        //                     array_push($chaptercontents, $lesson);
        //                 }
        //             }

        //             $quizzes = Db::table('chapterquiz')
        //                 ->where('chapterid', $chapter->id)
        //                 ->where('deleted','0')
        //                 ->get();

        //             if(count($quizzes)>0)
        //             {
        //                 foreach($quizzes as $quiz)
        //                 {
                            
        //                     $questions = DB::table('chapterquizquestions')
        //                         ->where('headerid', $quiz->id)
        //                         ->where('deleted','0')
        //                         ->get();

        //                     $quiz->questions = collect($questions)->shuffle()->flatten();
        //                     // $quiz->questions = $questions;

        //                     $checkifschedexists = DB::table('chapterquizsched')
        //                         ->where('classroomid',$classroomid)
        //                         ->where('chapterquizid',$quiz->id)
        //                         ->where('deleted','0')
        //                         ->get();

        //                     if(count($checkifschedexists) == 0)
        //                     {
        //                         $quiz->sched = 0;
        //                     }else{
        //                         foreach($checkifschedexists as $checkifschedexist)
        //                         {
        //                             if(date('Y-m-d H:i:s') >= $checkifschedexist->datefrom.' '.$checkifschedexist->timefrom && date('Y-m-d H:i:s') <= $checkifschedexist->dateto.' '.$checkifschedexist->timeto)
        //                             {
        //                                 DB::table('chapterquizsched')
        //                                     ->where('id', $checkifschedexist->id)
        //                                     ->update([
        //                                         'status'    => '1'
        //                                     ]);
        //                                 $checkifschedexist->status = 1;
        //                             }else{
        //                                 DB::table('chapterquizsched')
        //                                     ->where('id', $checkifschedexist->id)
        //                                     ->update([
        //                                         'status'    => '0'
        //                                     ]);
        //                                 $checkifschedexist->status = 0;
        //                             }
        //                             $checkifschedexist->datefrom = date('M d, Y',strtotime($checkifschedexist->datefrom));
        //                             $checkifschedexist->timefrom = date('h:i:s A',strtotime($checkifschedexist->timefrom));
        //                             $checkifschedexist->dateto   = date('M d, Y',strtotime($checkifschedexist->dateto));
        //                             $checkifschedexist->timeto   = date('h:i:s A',strtotime($checkifschedexist->timeto));
        //                         }
        //                         $quiz->schedinfo = $checkifschedexists[0];
        //                         $quiz->sched = 1;
        //                         // return $quiz->schedinfo->id;
        //                     }

        //                     if(count($questions)>0)
        //                     {
        //                         foreach($questions as $question)
        //                         {
        //                             $answers = DB::table('chapterquizchoices')
        //                                 ->where('questionid', $question->id)
        //                                 ->where('deleted','0')
        //                                 ->get();
        //                             $noofanswers = count(collect($answers->where('answer','1')));

        //                             $question->noofanswers = $noofanswers;

        //                             if(count($answers) > 0)
        //                             {
        //                                 $question->answers = collect($answers)->shuffle()->flatten();
        //                             }
        //                             else{
        //                                 $question->answers = $answers;
        //                             }
        //                         }
        //                     }
        //                     $quiz->displaytype = 'q';
        //                     array_push($chaptercontents, $quiz);
        //                 }
        //             }
                    
        //             $chapter->chaptercontents = collect($chaptercontents)->sortBy('createddatetime')->flatten();
        //         }
        //     }
        // }
        
        // $bookinfo->parts = $parts;
        // $bookinfo->chapters = $chapters;
        // $bookinfo->classroomid = $classroomid;
   
        return view('global.viewbook.viewbookindex')
                        ->with('classroomid', $classroomid)
                        ->with('bookinfo', $bookinfo);


                        
    }
    public function chaptertestavailability(Request $request)
    {

        // return $request->all();
        
        // date_default_timezone_set('Asia/Manila');

        // $noofattempts = $request->get('noofattempts');
        // $chaptertestid = $request->get('chaptertestid');
        // $classroomid = $request->get('classroomid');

        // $activityrange = explode(' - ', $request->get('activitydatetimerange'));

        // $datetimefrom = explode(' ',$activityrange[0]);
        // $datefrom = date('Y-m-d', strtotime($datetimefrom[0]));
        // $timefrom = date('H:i:s', strtotime($datetimefrom[1].' '.$datetimefrom[2]));

        // $datetimeto = explode(' ',$activityrange[1]);
        // $dateto = date('Y-m-d', strtotime($datetimeto[0]));
        // $timeto = date('H:i:s', strtotime($datetimeto[1].' '.$datetimeto[2])); 

        // $checkifexists = DB::table('chapterquizsched')
        //     ->where('chapterquizid', $chaptertestid)
        //     ->where('classroomid', $classroomid)
        //     ->where('deleted','0')
        //     ->get();

        // if(count($checkifexists) == 0)
        // {

            DB::table('chapterquizsched')
                ->insertGetId([
                    'chapterquizid'         => $request->get('chaptertestid'),
                    'classroomid'           => $request->get('classroomid'),
                    'datefrom'              => $request->get('datestart'),
                    'timefrom'              => $request->get('timestart'),
                    'dateto'                => $request->get('dateend'),
                    'timeto'                => $request->get('timeend'),
                    'noofattempts'          => $request->get('noofattempts'),
                    'createdby'             => auth()->user()->id,
                    'createddatetime'       => \Carbon\Carbon::now('Asia/Manila')
                ]);

            // $schedinfo = Db::table('chapterquizsched')
            //     ->where('id', $schedid)
            //     ->first();

            // $schedinfo->datefrom    = date('m-d-Y', strtotime($schedinfo->datefrom));
            // $schedinfo->timefrom    = date('h:i:s A', strtotime($schedinfo->timefrom));
            // $schedinfo->dateto      = date('m-d-Y', strtotime($schedinfo->dateto));
            // $schedinfo->timeto      = date('h:i:s A', strtotime($schedinfo->timeto));

            // return collect($schedinfo);

        // }else{

        // }


    }
    public function takethetest(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        
        // $headerid = Db::table('chapterquizrecords')
        //     ->insertGetId([
        //         'chapterquizid'         =>  $request->get('chapterquizid'),
        //         'submittedby'           => auth()->user()->id,
        //         'submitteddatetime'     => date('Y-m-d H:i:s')
        //     ]);

        $quizinfo = Db::table('chapterquiz')
            ->where('id',$request->get('chapterquizid'))
            ->first();
        
        $questions = DB::table('chapterquizquestions')
            ->where('headerid', $request->get('chapterquizid'))
            ->where('deleted','0')
            ->get();
            
        $quizinfo->questions = $questions;

        $checkifschedexists = DB::table('chapterquizsched')
            ->where('classroomid',$request->get('classroomid'))
            ->where('chapterquizid',$request->get('chapterquizid'))
            ->where('deleted','0')
            ->get();

        if(count($checkifschedexists) == 0)
        {
            $quizinfo->sched = 0;
        }else{
            $quizinfo->sched = 1;
            foreach($checkifschedexists as $checkifschedexist)
            {
                if(date('Y-m-d H:i:s') >= $checkifschedexist->datefrom.' '.$checkifschedexist->timefrom && date('Y-m-d H:i:s') <= $checkifschedexist->dateto.' '.$checkifschedexist->timeto)
                {
                    DB::table('chapterquizsched')
                        ->where('id', $checkifschedexist->id)
                        ->update([
                            'status'    => '1'
                        ]);
                    $checkifschedexist->status = 1;
                }else{
                    DB::table('chapterquizsched')
                        ->where('id', $checkifschedexist->id)
                        ->update([
                            'status'    => '0'
                        ]);
                    $checkifschedexist->status = 0;
                }
                $checkifschedexist->datefrom = date('M d, Y',strtotime($checkifschedexist->datefrom));
                $checkifschedexist->timefrom = date('h:i:s A',strtotime($checkifschedexist->timefrom));
                $checkifschedexist->dateto   = date('M d, Y',strtotime($checkifschedexist->dateto));
                $checkifschedexist->timeto   = date('h:i:s A',strtotime($checkifschedexist->timeto));
            }
            $quizinfo->schedinfo = $checkifschedexists[0];
            $quizinfo->noofattempts = $checkifschedexists[0]->noofattempts;
        }
        // return collect($quizinfo);
        if(count($questions)>0)
        {
            foreach($questions as $question)
            {
                $answers = DB::table('chapterquizchoices')
                    ->where('questionid', $question->id)
                    ->where('deleted','0')
                    ->get();
                $noofanswers = count(collect($answers->where('answer','1')));

                $question->noofanswers = $noofanswers;

                if(count($answers) > 0)
                {
                    $question->answers = collect($answers)->shuffle()->flatten();
                }
                else{
                    $question->answers = $answers;
                }
            }
        }
        $quizinfo->displaytype = 'q';

        $checkattempts = Db::table('chapterquizrecords')
            ->where('chapterquizid', $request->get('chapterquizid'))
            ->where('submittedby', auth()->user()->id)
            ->get();
        
        if(count($checkattempts)>0)
        {
            foreach($checkattempts as $checkattempt)
            {
                $checkattempt->details = DB::table('chapterquizrecordsdetail')
                    ->where('headerid', $checkattempt->id)
                    ->get();
            }

        }else{
            
            $headerid = Db::table('chapterquizrecords')
                ->insertGetId([
                    'chapterquizid'         =>  $request->get('chapterquizid'),
                    'submittedby'           => auth()->user()->id,
                    'submitteddatetime'     => date('Y-m-d H:i:s')
                ]);
            $checkattempts = Db::table('chapterquizrecords')
                ->where('chapterquizid', $request->get('chapterquizid'))
                ->where('submittedby', auth()->user()->id)
                ->get();

            if(count($checkattempts)>0)
            {
                foreach($checkattempts as $checkattempt)
                {
                    $checkattempt->details = DB::table('chapterquizrecordsdetail')
                        ->where('headerid', $checkattempt->id)
                        ->get();
                }
            }
        }
        $quizinfo->records = $checkattempts;
        return view('global.viewbook.studentview.studentviewtaketest')
            ->with('quizinfo', $quizinfo);
        
    }
}
