<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;;;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class LoginProvider extends EloquentUserProvider implements  UserProvider
{

    public function updateRememberToken(Authenticatable $user, $token) { }
    
}
