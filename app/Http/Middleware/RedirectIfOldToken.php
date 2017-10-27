<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Login;

class RedirectIfOldToken
{
    
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

        if ($currentToken !== $newToken)
        {
        return redirect()->route('login');
        }

        return $next($request);
    }
}
