<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

class User extends GlobalModel implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $guarded = ['user_id', 'token'];
    protected $hidden = ['password', 'token'];
 
 public function validate(array $data)
 {
     $rules = [
         'username'=>['required', $this->uniqueRule(), 'string', 'max:16', 'alpha_num'],
         'password'=>['required', 'string', 'max:255'],
     ];
     
     $validator = validator($data, $rules);
     $this->errors = $validator->errors();
     return $validator->passes();
 }

 public function getRememberTokenName() { }
 
}
