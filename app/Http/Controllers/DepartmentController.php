<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;;;
use App\Models\Department;
use App\DataTables\DepartmentsDataTable;

class DepartmentController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\DataTables\DepartmentsDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(DepartmentsDataTable $dataTable)
    {
        return $dataTable->render('pages/view_departments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('pages/add_department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Department $department)
    {
$department->fill($request->all());
if ($department->validate())
{
$department->save();
    return $this->successResponse($request, 'departments', 'Department has been added.');
}
    return $this->failedResponse($request, $department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
return view('pages/edit_department')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
$department->fill($request->all());
        if ($department->validate())
        {
$department->save();    
return $this->successResponse($request, 'departments', 'Department has been edited.');
        }
    return $this->failedResponse($request, $department);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Department $department)
    {
        $department->delete();
    return $this->successResponse($request, 'departments', 'Department has been deleted.', false);
    }
    
}
