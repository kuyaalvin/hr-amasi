<?php

namespace App\Models;

use App\models\scopes\ActiveScope;

class Project extends GlobalModel
{
    protected $primaryKey = 'project_id';
    public $timestamps = false;
    protected $guarded = ['project_id', 'active'];
protected $dates = ['time_in', 'time_out'];
protected $dateFormat = 'H:i:s';

protected static function boot()
{
    parent::boot();
    
    static::addGlobalScope(new ActiveScope());
});

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getTimeInAttribute($value)
    {
        return $value;    
    }

    public function getTimeOutAttribute($value)
    {
        return $value;
    }
    
    public function validate(array $data)
    {
        $rules = [
            'name'=>['required', $this->uniqueRule(), 'string', 'max:200'],
            'address'=>['nullable', 'string', 'max:255'],
            'time_in'=>['nullable', 'date_format:' . $this->dateFormat],
            'time_out'=>['nullable', 'date_format:' . $this->dateFormat, 'bail'],
        ];
        
        $messages = [
            'time_in.date_format'=>'The time in does not match the format HH:MM:SS.',
            'time_out.date_format'=>'The time out does not match the format HH:MM:SS.',
            'time_out.after'=>'The time out must be a time after time in.',
        ];
        
        $validator = validator($data, $rules, $messages);
        $validator->sometimes('time_out', 'after:time_in', function($input) use(&$validator) {
            return $validator->validateDateFormat('time_in', $input->time_in, [$this->getDateFormat()]);
        });
        
        $this->errors = $validator->errors();
        return $validator->passes();
    }

}
