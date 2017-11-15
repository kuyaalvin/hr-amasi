<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\Login;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class LoginController extends GlobalController
{

    public function __construct()
    {
$this->middleware(['authenticate', 'token'])->only('logout');
$this->middleware('guest')->except('logout');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return view('pages/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request, Hasher $hasher)
    {
        $login = new Login();
        $data = $request->all();
$data['password'] = $hasher->make($data['password']);
        if ($login->validate($data))
        {
            $login->create($data);
        }
        //
    }

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

    public function logout(AuthManager $auth)
    {
        $login = $auth->user();
        $login->token = null;
 $auth->logout();
        $login->save();
        return redirect('/home');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
