<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Position extends GlobalModel
{
    protected $primaryKey = 'position_id';
    public $timestamps = false;
    protected $guarded = ['position_id'];

protected static function boot()
{
    parent::boot();

    static::addGlobalScope('orderByName', function(Builder $builder) {
        $builder->orderBy('name');
    });
        
}

    public function employees()
    {
    return $this->hasMany(Employee::class, 'project_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withDefault();
    }

    public function validate()
    {
        $rules = [
            'name'=>['required', $this->uniqueRule(), 'string', 'max:50'],
            'type'=>['required', 'in:Staff,Worker'],
            'level'=>['required', 'integer', 'min:0', 'max:20'],
            'department_id'=>['required', 'exists:departments'],
        ];
        
        $validator = validator($this->attributes, $rules);
        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
