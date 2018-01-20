<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Connection;
use App\DataTables\ProjectsDataTable;

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

}
