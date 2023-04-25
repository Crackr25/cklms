<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return $data;
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'suffix' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data, Request $request)
    protected function create(Request $request)
    {
        // return $request->all();
        date_default_timezone_set('Asia/Manila');

        if($request->get('middlename') == null){
            $middlename = "";
        }else{
            $middlename = $request->get('middlename').'. ';
        }
        $checkifexists = Db::table('users')
            ->where('email', $request->get('email'))
            ->get();

        if(count($checkifexists) == 0){

            $getstudentid = DB::table('users')
                ->insertGetId([
                    'name' => $request->get('lastname').','.$request->get('firstname').' '.$middlename.' '.$request->get('suffix'),
                    'email' => $request->get('email'),
                    'type' => '3',
                    'password' => Hash::make($request->get('password')),
                    'createddatetime'    => date('Y-m-d H:i:s')
                ]);

            Db::table('students')
                ->insert([
                    'userid'            => $getstudentid,
                    'firstname'         => strtoupper($request->get('firstname')),
                    'middlename'        => strtoupper($request->get('middlename')),
                    'lastname'          => strtoupper($request->get('lastname')),
                    'suffix'            => strtoupper($request->get('suffix')),
                    'gender'            => strtoupper($request->get('gender')),
                    'createddatetime'    => date('Y-m-d H:i:s')
                ]);

            return redirect()->route('login');

        }else{

            return redirect()->back()->with('response','Account already exists!');

        }
        // return User::create([
        //     'name' => $data['lastname'].','.$data['firstname'].' '.$middlename.' '.$data['suffix'],
        //     'email' => $data['email'],
        //     'type' => '3',
        //     'password' => Hash::make($data['password']),
        // ]);
    }
}
