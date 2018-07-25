<?php

namespace App\Models;

use App\models\scopes\BinaryActiveScope;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Project
 *
 * @property int $project_id
 * @property string $name
 * @property string $address
 * @property \Carbon\Carbon|null $time_in
 * @property \Carbon\Carbon|null $time_out
 * @property int $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereTimeIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereTimeOut($value)
 * @mixin \Eloquent
 */
class Project extends GlobalModel
{
    protected $primaryKey = 'project_id';
    public $timestamps = false;
    protected $guarded = ['project_id', 'active'];
protected $dateFormat = 'H:i:s';

protected static function boot()
{
    parent::boot();

    static::addGlobalScope(new BinaryActiveScope());
    static::addGlobalScope('orderByName', function(Builder $builder) {
        $builder->orderBy('name');
    });
        
}

    public function employees()
    {
        return $this->hasMany(Employee::class, 'project_id');
    }

    public function getTimeInAttribute($value)
    {
        return $value;    
    }

    public function getTimeOutAttribute($value)
    {
        return $value;
    }
    
    public function validate()
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
        
        $validator = validator($this->attributes, $rules, $messages);
        $validator->sometimes('time_out', 'after:time_in', function($input) use(&$validator) {
            return $validator->validateDateFormat('time_in', $input->time_in, [$this->getDateFormat()]);
        });
        
        $this->errors = $validator->errors();
        return $validator->passes();
    }

}
