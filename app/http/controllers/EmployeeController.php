<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Project;

class EmployeeController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('position', 'project')->get();
return view('pages/view_employees')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::orderBy('position_id')->get();
        $projects = Project::orderBy('project_id')->get();
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
        $data = $request->all();
        if ($employee->validate($data))
        {
            $employee->fill($data);
$employee->save();
            return $this->successResponse($request, 'employees', 'Employee ' . $employee->id_number . ' ' . $employee->first_name . ' ' . $employee->last_name . ' has been added.');
        }
        return $this->failedResponse($request, $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $positions = Position::orderBy('position_id')->get();
        $projects = Project::orderBy('project_id')->get();
return view('pages/edit_employee', ['employee'=>$employee, 'positions'=>$positions, 'projects'=>$projects]);
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
        $data = $request->all();
        if ($employee->validate($data))
        {
            $employee->fill($data);
$employee->save();
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
$employee->delete();
return $this->successResponse($request, 'employees', 'Employee ' . $employee->id_number . ' ' . $employee->first_name . ' ' . $employee->last_name . ' has been deleted.', false);
    }
    
}
