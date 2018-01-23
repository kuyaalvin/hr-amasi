<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class AuthController extends Controller
{

    public function __construct()
    {
$this->middleware(['authenticate', 'token'])->only('logout');
$this->middleware('guest')->except('logout');
    }

    /**
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Auth\AuthManager $auth
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, AuthManager $auth)
    {
        if ($auth->attempt(['username'=>$request->input('username'), 'password'=>$request->input('password')]))
{
    $user = $request->user();
$token = encrypt(time());
    $user->token = $token;
$request->session()->put('token', $token);
    $user->save();
return redirect('/home');
}
return back()->withErrors('Username or password is incorrect.')->withInput(['username'=>$request->input('username')]);
    }
    
    /**
     *
     * @param  \Illuminate\Auth\AuthManager $auth
     * @return \Illuminate\Http\Response
     */
    public function logout(AuthManager $auth)
    {
 $auth->logout();
        return redirect('/home');
    }

}
