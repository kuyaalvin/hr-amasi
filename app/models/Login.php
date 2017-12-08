<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * App\Models\Login
 *
 * @property int $login_id
 * @property string $username
 * @property string $password
 * @property string|null $token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Login whereLoginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Login wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Login whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Login whereUsername($value)
 * @mixin \Eloquent
 */
class Login extends GlobalModel implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $primaryKey = 'login_id';
    public $timestamps = false;
    protected $guarded = ['login_id', 'token'];
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
