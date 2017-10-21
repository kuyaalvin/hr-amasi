<?php

namespace App\Models;

class Project extends GlobalModel
{
    protected $primaryKey = 'project_id';
    public $timestamps = false;
    protected $guarded = ['project_id', 'active'];
protected $dates = ['time_in', 'time_out'];
protected $dateFormat = 'H:i:s';

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
}
