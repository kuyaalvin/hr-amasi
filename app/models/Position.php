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
    return $this->hasMany(Employee::class);
    }

    public function validate(array $data)
    {
        $rules = [
            'name'=>['required', $this->uniqueRule(), 'string', 'max:50'],
        ];
        
        $validator = validator($data, $rules);
        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
