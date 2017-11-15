<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\Login;
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
    $login = $request->user();
$token = encrypt(time());
    $login->token = $token;
$request->session()->put('token', $token);
    $login->save();
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
        $login = $auth->user();
        $login->token = null;
 $auth->logout();
        $login->save();
        return redirect('/home');
    }

}
