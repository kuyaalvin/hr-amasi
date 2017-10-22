<?php

namespace App\Models;

class Position extends GlobalModel
{
    protected $primaryKey = 'position_id';
    public $timestamps = false;
protected $guarded = ['position_id'];
    
    public function employees()
    {
    return $this->hasMany(Employee::class);
    }

    public function validate($data)
    {
        $rules = [
            'name'=>['required', $this->uniqueRule('name', $this->name), 'string', 'max:50'],
        ];
        
        $validator = validator($data, $rules, $messages);
        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
