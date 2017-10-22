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

    protected function uniqueRule($col, $value)
    {
$rule = Rule::unique($this->table);
return $this->exists && $this->isClean([$col]) ? $rule ->ignore($value, $col) : $rule;
    }
    
}
