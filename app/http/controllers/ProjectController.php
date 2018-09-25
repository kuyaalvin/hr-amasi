<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Connection;
use Yajra\Datatables\Datatables;

class ProjectController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return view('pages/view_projects');
    }

public function getData()
{
return Datatables::of(Project::query()->withCount('employees'))->make(true);
}

public function getWorkerAgencyEmployees(Request $request, int $project_id)
{
return Datatables::of(Employee::query()->withoutGlobalScopes()->join('positions', 'employees.position_id', '=', 'positions.position_id')->where(['employees.project_id'=>$project_id, 'employees.employment_type'=>'agency', 'positions.type'=>'worker', 'employees.status'=>'active'])->orderBy('employees.first_name')->select('employees.*', 'positions.name as position_name', 'positions.level as position_level'))
->filter(function($query) use($request)
{
if ($request->has('search') && !empty($request->input('search')['value']))
{
$searchValue = $request->input('search')['value'];
$query->whereRaw("(LOWER(`employees`.`first_name`) LIKE '%$searchValue%' or LOWER(`employees`.`middle_name`) LIKE '%$searchValue%' or LOWER(`employees`.`last_name`) LIKE '%$searchValue%' or LOWER(`positions`.`name`) LIKE '%$searchValue%')");
}
})
->make(true);
}

public function getWorkerAdminEmployees(Request $request, int $project_id)
{
return Datatables::of(Employee::query()->withoutGlobalScopes()->join('positions', 'employees.position_id', '=', 'positions.position_id')->where(['employees.project_id'=>$project_id, 'employees.employment_type'=>'admin', 'positions.type'=>'worker', 'employees.status'=>'active'])->orderBy('employees.first_name')->select('employees.*', 'positions.name as position_name', 'positions.level as position_level'))
->filter(function($query) use($request)
{
if ($request->has('search') && !empty($request->input('search')['value']))
{
$searchValue = $request->input('search')['value'];
$query->whereRaw("(LOWER(`employees`.`first_name`) LIKE '%$searchValue%' or LOWER(`employees`.`middle_name`) LIKE '%$searchValue%' or LOWER(`employees`.`last_name`) LIKE '%$searchValue%' or LOWER(`positions`.`name`) LIKE '%$searchValue%')");
}
})
->make(true);
}

public function getStaffEmployees(Request $request, int $project_id)
{
return Datatables::of(Employee::query()->withoutGlobalScopes()->join('positions', 'employees.position_id', '=', 'positions.position_id')->where(['employees.project_id'=>$project_id, 'positions.type'=>'staff', 'employees.status'=>'active'])->orderBy('positions.level')->select('employees.*', 'positions.name as position_name', 'positions.level as position_level'))
->filter(function($query) use($request)
{
if ($request->has('search') && !empty($request->input('search')['value']))
{
$searchValue = $request->input('search')['value'];
$query->whereRaw("(LOWER(`employees`.`first_name`) LIKE '%$searchValue%' or LOWER(`employees`.`middle_name`) LIKE '%$searchValue%' or LOWER(`employees`.`last_name`) LIKE '%$searchValue%' or LOWER(`positions`.`name`) LIKE '%$searchValue%')");
}
})
->make(true);
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
$projectWhereArg = ['project_id'=>$project_id];

$countWorkerAgencyEmployees = Employee::where($projectWhereArg)->where('employment_type', 'agency')->whereHas('position', function($query) {
$query->where('type', 'worker');
})->count();

$countWorkerAdminEmployees = Employee::where($projectWhereArg)->where('employment_type', 'admin')->whereHas('position', function($query) {
$query->where('type', 'worker');
})->count();

$countStaffEmployees = Employee::where($projectWhereArg)->whereHas('position', function($query) {
$query->where('type', 'staff');
})->count();

$countEmployees = Employee::where($projectWhereArg)->count();

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
