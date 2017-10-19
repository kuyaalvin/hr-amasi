<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $primaryKey = 'login_id';
    public $timestamps = false;
    protected $guarded = ['token'];
    protected $hidden = ['password', 'token'];
    
}
