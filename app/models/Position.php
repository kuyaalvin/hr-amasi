<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Position extends Model
{
    protected $primaryKey = 'position_id';
    public $timestamps = false;

    public function employees()
    {
    return $this->hasMany(Employee::class);
    }
    
}
