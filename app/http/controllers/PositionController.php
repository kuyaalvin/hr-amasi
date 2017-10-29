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
$position = app(Position::class);
$positions = $position->all();
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Position $position)
    {
$data = $request->all();
if ($position->validate($data))
{
    $position->create($data);
    return $this->successResponse($request, 'positions', 'Successfully added position');
}
    return $this->failedResponse($request, $position);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $data = $request->all();
        if ($position->validate($data))
        {
            $position->update($data);
    return $this->successResponse($request, 'positions', 'Successfully edited position');
        }
    return $this->failedResponse($request, $position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Position $position)
    {
        $position->delete();
    return $this->successResponse($request, 'positions', 'Successfully deleted position', false);
    }
    
}
