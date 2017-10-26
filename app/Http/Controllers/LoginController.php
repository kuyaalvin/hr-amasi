<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\Login;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class LoginController extends GlobalController
{
    private $auth;
    
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return view('pages/login');
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

    public function login(Request $request)
    {
        if ($this->auth->attempt(['username'=>$request->input('username'), 'password'=>$request->input('password')]))
{
    $login = $this->auth->user();
    $login->session_id = $request->session()->getId();
    $login->save();
}
// 
    }

    public function logout()
    {
        $login = $this->auth->user();
        $login->session_id = null;
 $this->auth->logout();
        $login->save();
        // 
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
