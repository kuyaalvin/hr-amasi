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
    public function store(Request $request)
    {
        $project = new Project();
        $data = $request->all();
        if ($project->validate($data))
        {
            $project->create($data);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        if ($project->validate($data))
        {
            $project->update($data);
        }
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connection $con, Project $project)
    {
        $employee = new Employee();
        $con->transaction(function() use($project, $employee) {
            $employee->where('project_id', $project->project_id)->update(['project_id', null]);
            $project->active = 0;
            $project->save();
        });
        //
    }
}
