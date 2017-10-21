<?php

namespace App\Models;

class Employee extends GlobalModel
{
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    protected $dates = ['birthdate', 'date_started'];
    protected $dateFormat = 'Y-m-d';
    protected $guarded = ['employee_id', 'active'];
    
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
}
