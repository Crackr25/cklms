<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index(){
        return response()->json(User::all());
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json(['message' => 'Bad creds', 
            'success' => false ], 401);
        }

        $token = $user->createToken('ebooktoken')->plainTextToken;



        $grade = DB::table('students')
                    ->where('students.userid', $user->id)
                    ->join('gradelevel', 'gradelevel.id', '=', 'students.gradelevel')
                    ->select('gradelevel.levelname')
                    ->first();


        $response = [
            'message' => 'success',
            'success' => true,
            'grade'   => $grade->levelname,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}