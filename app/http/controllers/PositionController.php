<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;;
use App\Models\Position;

class PositionController extends GlobalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$positions = Position::orderBy('position_id')->get();
return view('pages/view_positions')->with('positions', $positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('pages/add_position');
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
$data = $request->all();
if ($position->validate($data))
{
    $position->fill($data);
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
return view('pages/edit_position')->with('position', $position);
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
        $data = $request->all();
        if ($position->validate($data))
        {
            $position->fill($data);
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
