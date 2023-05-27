<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;
use File;
use JoisarJignesh\Bigbluebutton\Facades\Bigbluebutton;
use BigBlueButton\Parameters\CreateMeetingParameters;
class Teacherquizcontroller extends Controller
{
    public function index(Request $request){

        if($request->get('blade') == 'blade' && $request->has('blade')){

            return view('teacher.teacherquiz.teacherquizindex');

        }else if($request->get('table') == 'table' && $request->has('table')){

            $data = [];


            return view('teacher.teacherquiz.include.quiztable')
            ->with('data',$data);;
        


        
        }

    }


    public function create(Request $request)
    {


        date_default_timezone_set('Asia/Manila');
        $id = DB::table('teacherquiz')->insertGetId([
            'title' => $request->get('quizname'),
            'createddatetime' => date('Y-m-d H:i:s'),
            'createdby' => auth()->user()->id,
        ]);

        return $id;

    }


    public function createquiz($id, Request $request)
    {


            $teacherquizinfo = DB::table('teacherquiz')
                ->where('id', $id)
                ->first();

            $quizquestions = DB::table('teacherquizquestions')
                ->where('quizid', $id)
                ->where('typeofquiz', '!=', null)
                ->where('deleted', 0)
                ->get();



            if($teacherquizinfo->title == null || $teacherquizinfo->title == ""){
                $teacherquizinfo->title = "Untitled Quiz";
            }

            if($teacherquizinfo->description == null || $teacherquizinfo->description == ""){
                $teacherquizinfo->description = "";
            }



            return view('teacher.teacherquiz.teacherquiz.quizindex')
                ->with('id',$id)
                ->with('quizquestions',$quizquestions)
                ->with('quiz',$teacherquizinfo);
    }

    public function saveDescription(Request $request)
    {


        DB::table('teacherquiz')
            ->where('id', $request->get('quizId'))
            ->update([
                'description'   => $request->get('description')
            ]);

        return 1;
    }


}

    
