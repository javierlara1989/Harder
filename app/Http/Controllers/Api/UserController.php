<?php
namespace App\Http\Controllers\Api;

use App\User;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login() {
        Log::info('User logging '.request('email'));
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',
            'c_password'=> 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], 200);
    }

    public function details() {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }
}

