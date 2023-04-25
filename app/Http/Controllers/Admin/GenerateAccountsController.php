<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
class GenerateAccountsController extends Controller
{
    public function index(Request $request)
    {
        $tablesnotfound = 0;
        $studinfotable = 0;
        $studinfocount = 0;
        try {

            $studinfocount = DB::table('studinfo')->count();
            $studinfotable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }

        $es_userstable = 0;
        $es_userscount = 0;
        try {

            $es_userscount = DB::table('es_users')->count();
            $es_userstable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }
        
        $sectionstable = 0;
        $sectionscount = 0;
        try {

            $sectionscount = DB::table('sections')->count();
            $sectionstable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }

        $college_sectionstable = 0;
        $college_sectionscount = 0;
        try {

            $college_sectionscount = DB::table('college_sections')->count();
             $college_sectionstable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }

        $gradeleveltable = 0;
        $gradelevelcount = 0;
        try {

            $gradelevelcount = DB::table('gradelevel')->count();
             $gradeleveltable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }

        $schoolinfotable = 0;
        $schoolinfocount = 0;
        try {

            $schoolinfocount = DB::table('schoolinfo')->count();
             $schoolinfotable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }

        $sytable = 0;
        $sycount = 0;
        try {

            $sycount = DB::table('sy')->count();
             $sytable = 1;

        }catch(\Exception $e)
        {
            $tablesnotfound+=1;
        }

        if($sectionstable == 1 && $gradeleveltable == 1)
        {

            $sec1 = DB::table('sections')
                ->select('sections.id as sectionid','sectionname','gradelevel.acadprogid','gradelevel.levelname','gradelevel.id as levelid')
                ->join('gradelevel','sections.levelid','=','gradelevel.id')
                // ->join('academicprogram','gradelevel.acadprogid','=','academicprogram.id')
                ->where('sections.deleted','0')
                ->where('gradelevel.deleted','0')
                ->get();
        }

        if($college_sectionstable == 1 && $gradeleveltable == 1)
        {


            $sec2 = DB::table('college_sections')
            ->select('college_sections.id as sectionid','college_sections.sectionDesc as sectionname','gradelevel.acadprogid','gradelevel.levelname','gradelevel.id as levelid')
            ->join('gradelevel','college_sections.yearID','=','gradelevel.id')
            ->where('gradelevel.deleted','0')
            ->where('college_sections.deleted','0')
            ->get();
        }

        $sections = collect();
        if($college_sectionstable == 1 && $gradeleveltable == 1 && $sectionstable == 1) 
        {
            $sections = $sections->merge($sec1);
            $sections = $sections->merge($sec2);
        }


        $teachers = DB::table('teachers')
            ->where('deleted','0')
            ->get();

          
        if($request->has('generate')){
            // return $request->all();
            $syid = DB::table('sy')
                ->where('isactive','1')
                ->first()->id;

            
            $sectionfieldvalues = "";
            
            function codegenerator(){
                $length = 3;    
                return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),1,$length);
            } 

            $abbr = strtolower(DB::table('schoolinfo')->first()->abbreviation);
            // "('".$section->levelname." - ".$section->sectionname."','".$abbr.$section->levelname[0].$section->sectionname[0].$code."',1,'".date('Y-m-d H:i:s')."'),";
            $code = codegenerator();
            $classroomid = DB::table('classrooms')
                ->insertGetId([
                    'classroomname'       =>    $request->get('levelname').' - '.$request->get('sectionname'),
                    'code'                =>    $abbr.$request->get('levelname')[0].$request->get('sectionname')[0].$code,
                    'createdby'           =>    $request->get('teacherid'),
                    'createddatetime'     =>    date('Y-m-d H:i:s')
                ]);

            $students = DB::table('studinfo')
                ->select(
                    'studinfo.id',
                    // 'es_users.email as username',
                    'lastname',
                    'firstname',
                    'middlename',
                    'suffix',
                    'gender',
                    'sectionid',
                    'levelid'
                )
                ->join('es_users','studinfo.userid','es_users.id')
                ->whereIn('studstatus',[1,2,4])
                ->where('studinfo.deleted','0')
                ->where('es_users.type','7')
                ->where('es_users.deleted','0')
                ->where('studinfo.levelid',$request->get('levelid'))
                ->where('studinfo.sectionid',$request->get('sectionid'))
                ->distinct()
                ->get();

            if(count($students)>0)
            {
                foreach($students as $student)
                {
                    if($student->middlename != null)
                    {
                        $studentmiddlename = $student->middlename[0].'.';
                    }else{
                        $studentmiddlename = null;
                    }
                    $studentlastname = str_replace(' ', '', $student->lastname);
                    $studentfirstname = str_replace(' ', '', $student->firstname);
                    $userid = DB::table('users')
                        ->insertGetId([
                            'name'  => $student->firstname.' '.$studentmiddlename.' '.$student->lastname.' '.$student->suffix,
                            'email' => strtolower($studentlastname.'_'.$studentfirstname.'@cklms.ph'),
                            'type' => '3',
                            'password' => Hash::make('123456789'),
                            'schoolabbr' => strtolower($abbr),
                            'created_at'    => date('Y-m-d H:i:s')
                        ]);
                        
                    $studentid = Db::table('students')
                        ->insertGetId([
                            'userid'            => $userid,
                            'firstname'         => strtoupper($student->firstname),
                            'middlename'        => strtoupper($student->middlename),
                            'lastname'          => strtoupper($student->lastname),
                            'suffix'            => strtoupper($student->suffix),
                            'gender'            => strtoupper($student->gender),
                            'createddatetime'    => date('Y-m-d H:i:s')
                        ]);

                    Db::table('classroomstudents')
                        ->insert([
                            'classroomid'       => $classroomid,
                            'studentid'         => $studentid,
                            // 'createdby'    => date('Y-m-d H:i:s')
                            'createddatetime'    => date('Y-m-d H:i:s')
                        ]);
                }
            }
            return array('1', array($request->all()));
            
        }else{
            
            if($studinfotable == 1) 
            {
                $students = DB::table('studinfo')
                    ->select(
                        'studinfo.id',
                        // 'es_users.email as username',
                        'lastname',
                        'firstname',
                        'middlename',
                        'suffix',
                        'gender',
                        'sectionid',
                        'levelid'
                    )
                    ->join('es_users','studinfo.userid','es_users.id')
                    ->whereIn('studstatus',[1,2,4])
                    ->where('studinfo.deleted','0')
                    ->where('es_users.type','7')
                    ->where('es_users.deleted','0')
                    // ->where('studinfo.levelid',$request->get('levelid'))
                    // ->where('studinfo.sectionid',$request->get('sectionid'))
                    ->distinct()
                    ->get();
            }else{
                $students = array();
            }
            if(count($sections) > 0)
            {
                foreach($sections as $section)
                {
                    $checkifexists = Db::table('classrooms')
                        ->where('classroomname', $section->levelname.' - '.$section->sectionname)
                        ->where('deleted','0')
                        ->count();

                    if($checkifexists == 0)
                    {
                        $section->exists = 0;
                    }else{
                        $section->exists = 1;
                    }
                }
            }
            return view('admin.admingenerateaccounts.index')
                ->with('sections', $sections)
                ->with('students', count($students))
                ->with('teachers', $teachers)
                ->with('studinfotable', $studinfotable)
                ->with('es_userstable', $es_userstable)
                ->with('sectionstable', $sectionstable)
                ->with('college_sectionstable', $college_sectionstable)
                ->with('gradeleveltable', $gradeleveltable)
                ->with('schoolinfotable', $schoolinfotable)
                ->with('sytable', $sytable)
                ->with('studinfocount', $studinfocount)
                ->with('es_userscount', $es_userscount)
                ->with('sectionscount', $sectionscount)
                ->with('college_sectionscount', $college_sectionscount)
                ->with('gradelevelcount', $gradelevelcount)
                ->with('schoolinfocount', $schoolinfocount)
                ->with('sycount', $sycount)
                ->with('tablesnotfound', $tablesnotfound);
        }
        // return view('cklms.index');

    }
    public function export()
    {
        
        $schoolabbr = strtolower(Db::table('schoolinfo')->first()->abbreviation);
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();;
        $sheet = $spreadsheet->getActiveSheet();
        $borderstyle = [
            // 'alignment' => [
            //     'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            // ],
            'borders' => [
                'allborders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    // 'color' => ['argb' => 'FFFF0000'],
                ],
            ]
        ];

        $classrooms = Db::table('classrooms')
            ->whereDate('createddatetime', '2020-10-02')
            ->where('code','like','%'.$schoolabbr.'%')
            ->where('deleted','0')
            ->get();
            
        
        if(count($classrooms)>0)
        {
            foreach($classrooms as $classroom)
            {
                $students = Db::table('classroomstudents')
                    ->select(
                        'students.lastname',
                        'students.firstname',
                        'students.middlename',
                        'students.suffix',
                        'users.email as username',
                        'users.id as userid'
                    )
                    ->join('students','classroomstudents.studentid','=','students.id')
                    ->join('users','users.id','=','students.userid')
                    ->where('users.schoolabbr', $schoolabbr)
                    ->whereDate('users.created_at', '2020-10-02')
                    ->where('classroomstudents.classroomid', $classroom->id)
                    ->orderBy('students.lastname','asc')
                    ->get();

                $classroom->students = $students;

            }
        }
        $countcellno = 1;
        if(count($classrooms)>0)
        {
            foreach($classrooms as $classroom)
            {
                
                $sheet->mergeCells('A'.$countcellno.':E'.$countcellno);
                $sheet->getStyle('A'.$countcellno.':E'.$countcellno)->getFont()->setBold(true);
                $sheet->setCellValue('A'.$countcellno, $classroom->classroomname);
                
                $sheet->setCellValue('F'.$countcellno, 'Classroom Code:');
                $sheet->setCellValue('G'.$countcellno, $classroom->code);
                $sheet->getStyle('F'.$countcellno.':G'.$countcellno)->getFont()->setBold(true);

                $countcellno+=1;

                if(count($classroom->students) > 0)
                {
                    $sheet->mergeCells('B'.$countcellno.':E'.$countcellno);
                    $sheet->setCellValue('B'.$countcellno, 'Students');
                    
                    // $sheet->mergeCells('F'.$countcellno.':G'.$countcellno);
                    $sheet->setCellValue('F'.$countcellno, 'Username');
                    $sheet->setCellValue('G'.$countcellno, 'Password');
                    $sheet->setCellValue('H'.$countcellno, 'userid');

                    $sheet->getStyle('A'.$countcellno.':G'.$countcellno)->getFont()->setBold(true);

                    $countcellno+=1;
                    
                    foreach($classroom->students as $stud)
                    {
                        $sheet->mergeCells('B'.$countcellno.':E'.$countcellno);
                        $sheet->setCellValue('B'.$countcellno, $stud->lastname.', '.$stud->firstname.' '.$stud->middlename.' '.$stud->suffix);
                        
                        // $sheet->mergeCells('F'.$countcellno.':G'.$countcellno);
                        $sheet->setCellValue('F'.$countcellno, $stud->username);
                        $sheet->setCellValue('G'.$countcellno, ' 123456789');
                        $sheet->setCellValue('H'.$countcellno, $stud->userid);
        
                        $countcellno+=1;
                    }
                }
            }
        }


        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Student Accounts'.date('Y-m-d H:i:s').'.xlsx"');
        $writer->save("php://output");
    }
}
