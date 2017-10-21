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
    
}
