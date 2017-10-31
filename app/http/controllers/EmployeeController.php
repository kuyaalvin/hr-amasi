<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\Employee;

class EmployeeController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('active', 1)->orderBy('employee_id')->get();
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $data = $request->all();
        if ($employee->validate($data))
        {
            $employee->create($data);
            return $this->successResponse($request, 'employees', 'Successfully added employee');
        }
        return $this->failedResponse($request, $employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->all();
        if ($employee->validate($data))
        {
            $employee->update($data);
            return $this->successResponse($request, 'employees', 'Successfully edited employee');
        }
        return $this->failedResponse($request, $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
$employee->active = 0;
$employee->save();
return $this->successResponse($request, 'employees', 'Successfully deleted employee', false);
    }
    
}
