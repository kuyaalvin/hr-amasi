<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Employee
 *
 * @property int $employee_id
 * @property string $id_number
 * @property string $last_name
 * @property string $first_name
 * @property string $middle_name
 * @property string $city_address
 * @property string|null $provincial_address
 * @property string|null $telephone_number
 * @property string|null $mobile_number1
 * @property string|null $mobile_number2
 * @property \Carbon\Carbon $birthdate
 * @property string $civil_status
 * @property int|null $number_of_dependencies
 * @property string $citizenship
 * @property string|null $religion
 * @property string $gender
 * @property string|null $sss_id
 * @property string|null $phic_id
 * @property string|null $hdmf_id
 * @property string|null $tin_id
 * @property string|null $account_number
 * @property string|null $biometric_id
 * @property string $payroll_type
 * @property \Carbon\Carbon $date_started
 * @property \Carbon\Carbon|null $date_terminated
 * @property int $agency
 * @property int $regular
 * @property int|null $position_id
 * @property int|null $project_id
 * @property-read \App\Models\Position|null $position
 * @property-read \App\Models\Project|null $project
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereAgency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereBiometricId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereCitizenship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereCityAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereCivilStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereDateStarted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereDateTerminated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereHdmfId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereMobileNumber1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereMobileNumber2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereNumberOfDependencies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee wherePayrollType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee wherePhicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereProvincialAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereRegular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereSssId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereTelephoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employee whereTinId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Employee withoutTrashed()
 * @mixin \Eloquent
 */
class Employee extends GlobalModel
{
    use SoftDeletes;
    
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
const DELETED_AT = 'date_terminated';
    protected $dates = ['birthdate', 'date_started', 'date_hired', 'date_terminated'];
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
            } while ($employee->where('id_number', $idNumber)->exists());
            $employee->id_number = $idNumber;
        });

        static::addGlobalScope('orderByLastName', function(Builder $builder) {
           $builder->orderBy('last_name');
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
'employment_type'=>['required', 'in:Agency,Regular'],
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
