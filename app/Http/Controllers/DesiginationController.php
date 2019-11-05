<?php

namespace App\Http\Controllers;

use App\Desigination;
use Illuminate\Http\Request;

class DesiginationController extends Controller
{

    public function index()
    {
        return response()->json(Desigination::all());
    }





    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $dep = Desigination::create($input);
        return response()->json('Desigination Successfully Svaed',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function show(Desigination $desigination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function edit(Desigination $desigination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desigination $desigination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Desigination  $desigination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desigination $desigination)
    {
        //
    }
}
