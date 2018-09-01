<?php

namespace App\Models;

use Carbon\Carbon;
use App\models\scopes\ActiveScope;
use Illuminate\Database\Eloquent\Builder;

class Employee extends GlobalModel
{
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';
    protected $guarded = ['employee_id', 'status'];

    protected static function boot()
    {
        parent::boot();

    static::addGlobalScope(new ActiveScope());

        static::creating(function(Employee $employee) {
            $year = Carbon::today()->year;
            $formattedYear = substr($year, strlen($year)-3);
            $min = 0;
            $max = 99999;
            do {
                $randomDigits = mt_rand($min, $max);
                $idNumber = $formattedYear . (sprintf("%05d", $randomDigits));
            } while ($employee->where('id_number', $idNumber)->exists());
            $employee->id_number = $idNumber;
        });

        static::addGlobalScope('orderByLastName', function(Builder $builder) {
           $builder->orderBy('last_name');
        });
        
    }
    
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id')->withDefault();
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withDefault();
    }
    
    public function getBirthdateAttribute($value)
    {
        return $value;
    }
    
    public function getDateStartedAttribute($value)
    {
        return $value;
    }
    
    public function validate()
    {
        $rules = [            
            'last_name'=>['required', 'string', 'max:50'],
            'middle_name'=>['required', 'string', 'max:100'],
            'first_name'=>['required', 'string', 'max:50'],
            'mothers_maiden_name'=>['nullable', 'string', 'max:50'],
'city_address'=>['required', 'string', 'max:255'],
'telephone_number'=>['nullable', 'regex:/^\d{3}-\d{2}-\d{2}$/'],
            'mobile_number1'=>['nullable', 'regex:/^\d{4}-\d{3}-\d{4}$/'],
            'mobile_number2'=>['nullable', 'regex:/^\d{4}-\d{3}-\d{4}$/'],
            'provincial_address'=>['nullable', 'string', 'max:255'],
            'birthdate'=>['required', 'bail', 'date_format:' . $this->getDateFormat(), 'before:today'],
            'birth_place'=>['required', 'string', 'max:50'],
            'emergency_contact_name'=>['nullable', 'string', 'max:50'],
            'emergency_contact_number'=>['nullable', 'regex:/^\d{4}-\d{3}-\d{4}$/'],
            'emergency_contact_address'=>['nullable', 'string', 'max:255'],
            'civil_status'=>['required', 'in:Single,Married'],
            'number_of_dependencies'=>['nullable', 'integer', 'min:0', 'max:127'],
            'citizenship'=>['required', 'string', 'max:30'],
            'religion'=>['nullable', 'string', 'max:30'],
            'gender'=>['required', 'in:Male,Female'],
'sss_id'=>['nullable', 'regex:/^\d{2}-\d{7}-\d$/'],
            'phic_id'=>['nullable', 'regex:/^\d{2}-\d{9}-\d$/'],
            'hdmf_id'=>['nullable', 'regex:/^\d{4}-\d{4}-\d{4}$/'],
            'tin_id'=>['nullable', 'regex:/^\d{3}-\d{3}-\d{3}-000$/'],
            'payroll_type'=>['required', 'in:Weekly,Monthly'],
            'date_started'=>['required', 'date_format:' . $this->getDateFormat()],
            'date_hired'=>['nullable', 'date_format:' . $this->getDateFormat()],
            'account_number'=>['nullable', $this->uniqueRule(), 'digits_between:1,25'],
            'biometric_id'=>['nullable', $this->uniqueRule(), 'digits_between:1,4'],
'employment_type'=>['required', 'in:Agency,Admin'],
            'referred_by'=>['nullable', 'string', 'max:50'],
            'walk_in'=>['nullable', 'string', 'max:50'],
            'position_id'=>['nullable', 'exists:positions'],
            'project_id'=>['nullable', 'exists:projects'],
        ];
        
        $messages = [
            'birthdate.before' => 'The birthdate must be a date before today.',
            'birthdate.date_format'=>'The birthdate does not match the format YYYY-MM-DD.',
            'date_started.date_format'=>'The date started does not match the format YYYY-MM-DD.',
        ];
        
        $validator = validator($this->attributes, $rules, $messages);

        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
