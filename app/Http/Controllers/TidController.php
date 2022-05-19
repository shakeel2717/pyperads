<?php

namespace App\Http\Controllers;

use App\Models\Tid;
use Illuminate\Http\Request;

class TidController extends Controller
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
     * @param  \App\Models\Tid  $tid
     * @return \Illuminate\Http\Response
     */
    public function show(Tid $tid)
    {
        return 1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tid  $tid
     * @return \Illuminate\Http\Response
     */
    public function edit(Tid $tid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tid  $tid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tid $tid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tid  $tid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tid $tid)
    {
        //
    }
}
