<?php

namespace App\Http\Controllers;

use App\Pilot;
use Illuminate\Http\Request;

class PilotController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function show(Pilot $pilot)
    {
        return view('pages.pilots.show', compact(
            'pilot'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function edit(Pilot $pilot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pilot $pilot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pilot  $pilot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pilot $pilot)
    {
        //
    }
}
