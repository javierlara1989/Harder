<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use App\User;


class HomeController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function doLogin(Request $request) {
        Log::info('Someone is trying to log in');
        return view('login');
    }

    public function signUp(Request $request) {
        return view('signup');
    }

    public function doSignUp(Request $request) {
        Log::info('Someone is singin up emai:'.$request->email);
        Log::info('HOST === '.env('DB_HOST'));
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return view('wellcome');
    }
}
