<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Image;
use Session;
use Validator;

class SchoolInfoController extends Controller
{
    public function index()
    {
        
        $schoolinfo = DB::table('schoolinfo')
                        ->where('id', 1)
                        ->first();



        return view('admin.adminschoolinfo')
                ->with('schoolinfo', $schoolinfo);
    }



    public function update(Request $request)
    {
        

        $street = $request->get('street');
        $barangay = $request->get('barangay');
        $municipality = $request->get('municipality');
        $city = $request->get('city');
        

        $address = $street . ' ' . $barangay . ' ' . $municipality . ' ' . $city;


        DB::table('schoolinfo')
        ->where('id', 1)
        ->update([
            'schoolname' => $request->get('schoolname'),
            'schoolid' => $request->get('schoolid'),
            'division' => $request->get('division'),
            'district' => $request->get('district'),
            'address' => $address,
            'region' => $request->get('region'),
            'websitelink' => $request->get('website'),
            'essentiellink' => $request->get('essentiel_link'),
            'schoolcolor' => $request->get('schoolcolor')
        ]);

    }



    public static function updatelogo(Request $request){




            if (! File::exists(public_path().'storage/logo')) {
                $path = public_path('storage/logo');
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
            }

            

            $data = $request->image;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $extension = 'png';

            $destinationPath = public_path('storage/logo/schoollogo.png');
            file_put_contents($destinationPath, $data);

            DB::table('schoolinfo')
                    ->where('id', 1)
                    ->update(['picurl'=>'/storage/logo/schoollogo.png' ]);


            return $data;


    }
}
