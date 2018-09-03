<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Connection;
use App\DataTables\ProjectsDataTable;
use Yajra\Datatables\Datatables;

class ProjectController extends GlobalController
{
    /**
     * Display a listing of the resource.
     * @param \App\DataTables\ProjectsDataTable $dataTable
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectsDataTable $dataTable)
    {
return $dataTable->render('pages/view_projects');
    }

public function getWorkerAgencyEmployees(int $project_id)
{
return Datatables::of(Employee::query()->where(['project_id'=>$project_id, 'employment_type'=>'agency'])->whereHas('position', function($query) {
$query->where('type', 'worker');
})->with('position'))->make(true);
}

public function getWorkerAdminEmployees(int $project_id)
{
return Datatables::of(Employee::query()->where(['project_id'=>$project_id, 'employment_type'=>'admin'])->whereHas('position', function($query) {
$query->where('type', 'worker');
})->with('position'))->make(true);
}

public function getStaffEmployees(int $project_id)
{
return Datatables::of(Employee::query()->where('project_id', $project_id)->whereHas('position', function($query) {
$query->where('type', 'staff')->orderBy('level');
})->with('position'))->make(true);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('pages/add_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
$project->fill($request->all());
        if ($project->validate())
        {
$project->save();
    return $this->successResponse($request, 'projects', 'New project has been added.');
        }
    return $this->failedResponse($request, $project);
    }

    /**
     * view a specific resource.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function profile(int $project_id)
{
$project = Project::find($project_id);
$employeesCollection = Employee::where('project_id', $project_id);

$countWorkerAgencyEmployees = $employeesCollection->where('employment_type', 'agency')->whereHas('position', function($query) {
$query->where('type', 'worker');
})->count();

$countWorkerAdminEmployees = $employeesCollection->where('employment_type', 'admin')->whereHas('position', function($query) {
$query->where('type', 'worker');
})->count();

$countStaffEmployees = $employeesCollection->whereHas('position', function($query) {
$query->where('type', 'staff');
})->count();

$countEmployees = $employeesCollection->count();

return view('pages/view_project_profile', ['project'=>$project, 'countWorkerAgencyEmployees'=>$countWorkerAgencyEmployees, 'countWorkerAdminEmployees'=>$countWorkerAdminEmployees, 'countStaffEmployees'=>$countStaffEmployees, 'countEmployees'=>$countEmployees]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
return view('pages/edit_project')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
$project->fill($request->all());
        if ($project->validate())
        {
$project->save();
    return $this->successResponse($request, 'projects', 'Project has been edited.');
        }
    return $this->failedResponse($request, $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Connection $con
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Connection $con, Project $project)
    {
        $con->transaction(function() use($project) {
            Employee::where('project_id', $project->project_id)->update(['project_id' => null]);
            $project->active = 0;
            $project->save();
        });
    return $this->successResponse($request, 'projects', 'Project has been deleted.', false);
    }

public function viewTransfer()
{
        $projects = Project::orderBy('project_id')->get();
return view('pages/employee_transfer', ['projects'=>$projects]);
}

}
