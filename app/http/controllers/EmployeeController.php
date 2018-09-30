<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;;;;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Project;
use App\Models\EmployeeProject;
use Yajra\Datatables\Datatables;

class EmployeeController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return view('pages/view_employees');
    }

public function getData()
{
return Datatables::of(Employee::query()->withoutGlobalScopes()->join('positions', 'employees.position_id', '=', 'positions.position_id')->join('employees_projects', 'employees.employee_id', '=', 'employees_projects.employee_id')->join('projects', 'projects.project_id', '=', 'employees_projects.project_id')->where(['projects.active'=>1, 'employees.status'=>'active'])->orderBy('employees.first_name')->select('employees.*', 'positions.name as position_name', 'projects.name as project_name'))->make(true);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        $projects = Project::all();
return view('pages/add_employee', ['positions'=>$positions, 'projects'=>$projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
$employee->fill($request->all());
        if ($employee->validate())
        {
$employee->save();
if (null !== $request->input('project_id'))
{
$employeeProject = new EmployeeProject();
$employeeProject->employee_id = $employee->employee_id;
$employeeProject->project_id = $employee_id;
$employeeProject->save();
}
            return $this->successResponse($request, 'employees', 'Employee ' . $employee->id_number . ' ' . $employee->first_name . ' ' . $employee->last_name . ' has been added.');
        }
        return $this->failedResponse($request, $employee);
    }

    /**
     * view a specific resource.
     *
     * @param  int $employee_id
     * @return \Illuminate\Http\Response
     */
    public function profile(int $employee)
{
$employee2  = Employee::withoutGlobalScopes()->join('positions', 'employees.position_id', '=', 'positions.position_id')->join('employees_projects', 'employees.employee_id', '=', 'employees_projects.employee_id')->join('projects', 'projects.project_id', '=', 'employees_projects.project_id')->where(['employees.employee_id'=>$employee, 'projects.active'=>1, 'employees.status'=>'active'])->orderBy('employees.first_name')->select('employees.*', 'positions.name as position_name', 'projects.name as project_name')->first();
return view('pages/view_employee_profile', ['employee'=>$employee2]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $positions = Position::all();
        $projects = Project::all();
$project_id = (EmployeeProject::where(['employee_id'=>$employee->employee_id, 'active'=>1]))->first()->project_id;
return view('pages/edit_employee', ['employee'=>$employee, 'positions'=>$positions, 'projects'=>$projects, 'project_id'=>$project_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
$oldProjectId = (EmployeeProject::where(['employee_id'=>$employee->employee_id, 'active'=>1]))->first()->project_id;

$employee->fill($request->all());
        if ($employee->validate())
        {
$employee->save();
if (null !== $request->input('project_id') && $oldProjectId !== $request->input('project_id'))
{
$employeeProject = new EmployeeProject();
$employeeProject->update(['active'=>0]);
$employeeProject->employee_id = $employee->employee_id;
$employeeProject->project_id = $request->input('project_id');
$employeeProject->save();
}
            
return $this->successResponse($request, 'employees', 'Employee ' . $employee->id_number . ' ' . $employee->first_name . ' ' . $employee->last_name . ' has been edited.');
        }
        return $this->failedResponse($request, $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employee $employee)
    {
$employee->status = $request->input("status");
$employee->date_terminated = Carbon::today();
$employee->update();
return $this->successResponse($request, 'employees', 'Employee ' . $employee->id_number . ' ' . $employee->first_name . ' ' . $employee->last_name . ' has been deleted.', false);
    }
    
}
