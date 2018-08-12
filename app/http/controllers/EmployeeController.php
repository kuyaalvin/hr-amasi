<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;;;;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Project;
use App\DataTables\EmployeesDataTable;

class EmployeeController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\DataTables\EmployeesDataTable dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeesDataTable $dataTable)
    {
return $dataTable->render('pages/view_employees');
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
    public function profile(Employee $employee)
{
$employee->load('position', 'project');
return view('pages/view_employee_profile', ['employee'=>$employee]);
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
$employee->fill($request->all());
        if ($employee->validate())
        {
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
$employee->status = $request->input("status");
$employee->date_terminated = Carbon::today();
$employee->update();
return $this->successResponse($request, 'employees', 'Employee ' . $employee->id_number . ' ' . $employee->first_name . ' ' . $employee->last_name . ' has been deleted.', false);
    }
    
}
