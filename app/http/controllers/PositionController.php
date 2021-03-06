<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;;;
use App\Models\Position;
use App\Models\Department;
use Yajra\Datatables\Datatables;

class PositionController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/view_positions');
    }

public function getData()
{
return Datatables::of(Position::query()->with('department')->select('positions.*'))->make(true);
}

public function getHierarchy()
{
    $departments = Department::all();
    return view('pages/view_position_hierarchy')->with(['departments'=>$departments]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
return view('pages/add_position')->with(['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Position $position)
    {
$position->fill($request->all());
if ($position->validate())
{
$position->save();
    return $this->successResponse($request, 'positions', 'Position has been added.');
}
    return $this->failedResponse($request, $position);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $departments = Department::all();
return view('pages/edit_position')->with(['position'=>$position, 'departments'=>$departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
$position->fill($request->all());
        if ($position->validate())
        {
$position->save();    
return $this->successResponse($request, 'positions', 'Position has been edited.');
        }
    return $this->failedResponse($request, $position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Position $position)
    {
        $position->delete();
    return $this->successResponse($request, 'positions', 'Position has been deleted.', false);
    }

public function getPositionsByDepartments($department_id)
{
return Datatables::of(Position::query()->where('department_id', $department_id)->get())->make(true);
}

public function editHierarchy($department_id)
{
    return view('pages/edit_position_hierarchy')->with(['department_id'=>$department_id]);
}

public function updateHierarchy(Request $request)
{
foreach ($request->input('positions') as $position)
{
Position::where('position_id', $position['position_id'])->update(['level'=>$position['level']]);
}
return $this->getHierarchy();
}

    
}
