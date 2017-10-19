<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_id';
    public $timestamps = false;
    protected $guarded = ['active'];
    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
}
