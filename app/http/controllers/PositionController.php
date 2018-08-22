<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;;;
use App\Models\Position;
use App\Models\Department;
use App\DataTables\PositionsDataTable;

class PositionController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\DataTables\PositionsDataTable $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(PositionsDataTable $dataTable)
    {
        return $dataTable->render('pages/view_positions');
    }

public function getHierarchy()
{
    $departments = Department::all();
    return view('pages/view_position_heirarchy')->with(['departments'=>$departments]);
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
    
}
