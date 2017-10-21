<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
