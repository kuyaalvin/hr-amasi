<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends GlobalModel
{
    use SoftDeletes;
    
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
const DELETED_AT = 'date_terminated';
    protected $dates = ['birthdate', 'date_started', 'date_terminated'];
    protected $dateFormat = 'Y-m-d';
    protected $guarded = ['employee_id', 'active'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function(Employee $employee) {
            $year = Carbon::today()->year;
            $formattedYear = substr($year, strlen($year)-3);
            $min = 0;
            $max = 99999;
            do {
                $randomDigits = mt_rand($min, $max);
                $idNumber = $formattedYear . (sprintf("%05d", $randomDigits));
            } while ($employee->where('id_number', $idNumber)->get()->isNotEmpty());
            $employee->id_number = $idNumber;
        });
    }
    
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
    public function getBirthdateAttribute($value)
    {
        return $value;
    }
    
    public function getDateStartedAttribute($value)
    {
        return $value;
    }
    
    public function validate(array $data)
    {
        $rules = [            
            'last_name'=>['required', 'string', 'max:50'],
            'middle_name'=>['required', 'string', 'max:100'],
            'first_name'=>['required', 'string', 'max:50'],
            'city_address'=>['required', 'string', 'max:255'],
'telephone_number'=>['nullable', 'regex:/^\d{3}-\d{2}-\d{2}$/'],
            'mobile_number1'=>['nullable', 'regex:/^\d{4}-\d{3}-\d{4}$/'],
            'mobile_number2'=>['nullable', 'regex:/^\d{4}-\d{3}-\d{4}$/'],
            'provincial_address'=>['nullable', 'string', 'max:255'],
            'birthdate'=>['required', 'bail', 'date_format:' . $this->getDateFormat(), 'before:today'],
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
            'account_number'=>['required', $this->uniqueRule(), 'digits_between:1,25'],
            'biometric_id'=>['nullable', $this->uniqueRule(), 'digits_between:1,4'],
            'agency'=>['required', 'boolean'],
            'regular'=>['required', 'boolean'],
            'position_id'=>['nullable', 'exists:positions'],
            'project_id'=>['nullable', 'exists:projects'],
        ];
        
        $messages = [
            'birthdate.before' => 'The birthdate must be a date before today.',
            'birthdate.date_format'=>'The birthdate does not match the format YYYY-MM-DD.',
            'date_started.date_format'=>'The date started does not match the format YYYY-MM-DD.',
            'regular.different'=>'Employees from agency cannot be regularized.',
        ];
        
        $validator = validator($data, $rules, $messages);
$validator->sometimes('regular', 'different:agency', function($input) {
    return $input->agency == 1;
});

        $this->errors = $validator->errors();
        return $validator->passes();
    }
    
}
