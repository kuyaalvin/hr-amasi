<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeProject extends Pivot
{
protected $table = 'employees_projects';
    protected $primaryKey = 'employee_project_id';
    public $timestamps = false;

}
