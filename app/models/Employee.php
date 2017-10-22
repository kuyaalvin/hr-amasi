<?php

namespace App\Models;

use Carbon\Carbon;

class Employee extends GlobalModel
{
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    protected $dates = ['birthdate', 'date_started'];
    protected $dateFormat = 'Y-m-d';
    protected $guarded = ['employee_id', 'active'];

    public function setDateStartedAttribute(string $value)
    {
$this->attributes['date_started'] = $value;
$dateValue = Carbon::parse($value);
$this->attributes['active'] = $dateValue->isFuture() ? 0 : 1;
    }
    
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
    public function validate(array $data)
    {
        $rules = [
            'id_number'=>['required', $this->uniqueRule(), 'digits_between:1,10'],
            'biomentric_id'=>['nullable', $this->uniqueRule(), 'digits_between:1,255'],
            'account_number'=>['required', $this->uniqueRule(), 'digits_between:1,25'],
            'last_name'=>['required', 'string', 'max:50'],
            'middle_name'=>['required', 'string', 'max:100'],
            'first_name'=>['required', 'string', 'max:50'],
            'city_address'=>['required', 'string', 'max:255'],
            'provincial_address'=>['nullable', 'string', 'max:255'],
            'birthdate'=>['required', 'bail', 'date_format:' . $this->getDateFormat(), 'before:today'],
            'civil_status'=>['required', 'in:Single,Married'],
            'number_of_dependencies'=>['nullable', 'integer', 'min:0', 'max:127'],
            'citizenship'=>['required', 'string', 'max:30'],
            'religion'=>['nullable', 'string', 'max:30'],
            'gender'=>['required', 'in:Male,Female'],
            'sss_id'=>['nullable', 'digits_between:1,20'],
            'tin_no'=>['nullable', 'digits_between:1,20'],
            'phil_health_mp'=>['nullable', 'digits_between:1,20'],
            'payroll_type'=>['required', 'in:Weekly,Monthly'],
            'date_started'=>['required', 'date_format:' . $this->getDateFormat()],
            'agency'=>['required', 'boolean'],
            'regular'=>['required', 'boolean'],
            'position_id'=>['nullable', 'exists:positions'],
            'project_id'=>['nullable', 'exists:positions'],
        ];
        
        $messages = [
            'birthdate.before' => 'The birthdate must be a date before today.',
            'birthdate.date_format'=>'The birthdate does not match the format YYYY-MM-DD.',
            'date_started.date_format'=>'The date started does not match the format YYYY-MM-DD.',
            'regular.different'=>'Agency and regular cannot both be selected.',
        ];
        
        $validator = validator($data, $rules, $messages);
$validator->sometimes('regular', 'different:agency', function($input)
    {
    return $input->agency === 1;
});

        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
