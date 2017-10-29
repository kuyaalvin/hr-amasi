<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Database\Connection;

class ProjectController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$projects = Project::where('active', 1)->get();
return view('pages/view_projects')->with('projects', $projects);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $data = $request->all();
        if ($project->validate($data))
        {
            $project->create($data);
    return $this->successResponse($request, 'projects', 'Successfully added project');
        }
    return $this->failedResponse($request, $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        if ($project->validate($data))
        {
            $project->update($data);
    return $this->successResponse($request, 'projects', 'Successfully edited project');
        }
    return $this->failedResponse($request, $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Connection $con, Project $project)
    {
        $employee = app(Employee::class);
        $con->transaction(function() use($project, $employee) {
            $employee->where('project_id', $project->project_id)->update(['project_id' => null]);
            $project->active = 0;
            $project->save();
        });
    return $this->successResponse($request, 'projects', 'Successfully deleted project', false);
    }

}
