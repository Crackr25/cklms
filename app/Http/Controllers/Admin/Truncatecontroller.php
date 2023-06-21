<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Http\Request;

class Truncatecontroller extends Controller
{


    public function index(Request $request)
    {


        $data = DB::table('chapterquizrecords')
                    ->get();

        $datarecorddetails = DB::table('chapterquizrecordsdetail')
                    ->get();





    

        return view('admin.truncate')
            ->with('datarecorddetails', $datarecorddetails)
            ->with('data', $data);
    }


    public function trunceQuizrecord(Request $request)
    {


        $type = $request->get('type');


        if($type == 1){


            DB::table('chapterquizrecords')->truncate();


        }else if($type == 2){



                $folderPath = public_path('quizzes');

                // Get the list of files in the folder
                $files = \File::files($folderPath);

                foreach ($files as $file) {
                    \File::delete($file);
                }


            DB::table('chapterquizrecordsdetail')->truncate();


        }








    

        return $type;
    }
    








}
