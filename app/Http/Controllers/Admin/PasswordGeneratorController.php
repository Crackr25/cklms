<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Hash;
class PasswordGeneratorController extends Controller
{
    public function index()
    {
        
        // $users =  UsersModel::allusers();
        // return
        return view('admin.passwordgenerator.index');
            // ->with('users', $users);
    }
    public function filter(Request $request)
    {
        // return $request->all();
        if($request->get('usertype') == 'student')
        {
            $users =  collect(UsersModel::allusers())->where('usertypeid','7')->values();
        }else{
            $users =  collect(UsersModel::allusers())->where('usertypeid','!=','7')->values();
        }

    
        return view('admin.passwordgenerator.resultstable')
            ->with('users', $users)
            ->with('usertype', $request->get('usertype'));
    }


    public function reset(Request $request)
    {
            DB::table('users')
                ->where('id', $request->get('id'))
                ->update([
                    'password' => Hash::make(12345678),
            ]);

        return "Yey";
    }
}
