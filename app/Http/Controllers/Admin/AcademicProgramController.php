<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AcademicProgramController extends Controller
{
    public function index()
    {

        $academicprograms = DB::table('academicprogram')
            ->where('deleted','0')
            ->get();

        return view('admin.adminacademicprograms')
            ->with('academicprograms',$academicprograms);
    }
    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

        $id =DB::table('academicprogram')
            ->insertGetId([
                'programname'   => $request->get('prog_title'),
                'programcode'   => $request->get('prog_code'),
                'createdby'     => auth()->user()->id,
                'createddatetime' => date('Y-m-d H:i:s')
            ]);

        $info = Db::table('academicprogram')
                ->where('id', $id)
                ->first();
        $display = '<div id="'.$info->id.'">'.
                        '<div class="course-path-card">'.
                            '<div class="course-path-card-contents">'.
                                '<h3 id="programname'.$info->id.'"> '.$info->programname.' </h3>'.
                                '<p id="programcode'.$info->id.'"> Code: '.$info->programcode.'</p>'.
                            '</div>'.
                            '<div class="course-path-card-footer">'.
                                '<h5> <i class="icon-feather-film mr-1"></i><a href="#">View 24 Books</a></h5>'.
                                '<div>'.
                                    '<h5>'.
                                        '<a href="#" class="acadprogedit" progid="'.$info->id.'"><i class="icon-feather-edit mr-1"></i></a>'.
                                    '</h5>'.
                                '</div>'.
                                '<h5>'.
                                    '<a href="#" class="acadprogdelete" progid="'.$info->id.'"><i class="icon-feather-trash mr-1 text-danger"></i></a>'.
                                '</h5>'.
                            '</div>'.
                        '</div>'.
                    '</div>';
        return collect($display);
    }
    public function getinfo(Request $request)
    {
        $info = Db::table('academicprogram')
            ->where('id', $request->get('id'))
            ->first();

        return collect($info);

    }
    public function update(Request $request)
    {
        Db::table('academicprogram')
            ->where('id', $request->get('id'))
            ->update([
                'programname'   => $request->get('prog_title'),
                'programcode'   => $request->get('prog_code')
            ]);
        $info = Db::table('academicprogram')
            ->where('id', $request->get('id'))
            ->first();
        return collect($info);

    }
    public function delete(Request $request)
    {
        Db::table('academicprogram')
            ->where('id', $request->get('id'))
            ->update([
                'deleted'   => 1
            ]);
        $info = Db::table('academicprogram')
            ->where('id', $request->get('id'))
            ->first();
        return collect($info);

    }
}

        // $display = '<div>'.
        //             '<a href="#">'.
        //                 '<div class="card">'.
        //                     '<div class="card-body">'.
        //                         '<div class="uk-flex-middle uk-grid" uk-grid="">'.
        //                             '<div class="row">'.
        //                                 '<div class="col-12">'.
        //                                     '<h6 class="mb-2">'.$info->programname.'</h6>'.
        //                                 '</div>'.
        //                                 '<div class="col-6">'.
        //                                     '<h2> </h2>'.
        //                                 '</div>'.
        //                                 '<div class="col-6 text-center">'.
        //                                     '<i class="fa fa-user fa-2x"></i>'.
        //                                 '</div>'.
        //                             '</div>'.
        //                         '</div>'.
        //                     '</div>'.

        //                     '<div class="card-footer d-flex justify-content-between py-2">'.
        //                         '<a href="#" class=" "> Veiw report</a>'.
        //                     '</div>'.
        //                 '</div>'.
        //             '</a>'.
        //         '</div>';