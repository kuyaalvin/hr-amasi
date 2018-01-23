<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string|null $token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @mixin \Eloquent
 */
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
