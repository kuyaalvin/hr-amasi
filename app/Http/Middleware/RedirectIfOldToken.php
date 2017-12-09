<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Login;
use Illuminate\Auth\AuthManager;

class RedirectIfOldToken
{
    private $auth;
    
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentLogin = $request->user();
$currentToken = $request->session()->get('token');
        $newToken = $currentLogin->token;

        if ($currentToken != $newToken)
        {
$this->auth->logout();
        return redirect('/');
        }

        return $next($request);
    }
}
