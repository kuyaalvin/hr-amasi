<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class GlobalModel extends Model
{
    protected $errors;
    
    public function errors()
    {
        return $this->errors;
    }

    protected function uniqueRule()
    {
$rule = Rule::unique($this->getTable());
return $this->exists ? $rule ->ignore($this->getKey(), $this->getKeyName()) : $rule;
    }
    
}
