<?php

namespace App\Http\Controllers;

use App\Http\Requests\Postion\CreateRequest;
use App\Http\Requests\Postion\UpdateRequest;
use App\Models\Position\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('position.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        Position::create($request->validated());

        return redirect(route('positions.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Position $position)
    {
        $position->update($request->validated());

        return redirect(route('positions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
    }
}
