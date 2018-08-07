<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Department
 *
 * @property int $department_id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereName($value)
 * @mixin \Eloquent
 */
class Department extends GlobalModel
{
    protected $primaryKey = 'department_id';
    public $timestamps = false;
    protected $guarded = ['department_id'];

protected static function boot()
{
    parent::boot();

    static::addGlobalScope('orderByName', function(Builder $builder) {
        $builder->orderBy('name');
    });
        
}

    public function validate()
    {
        $rules = [
            'name'=>['required', $this->uniqueRule(), 'string', 'max:50'],
        ];
        
        $validator = validator($this->attributes, $rules);
        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
