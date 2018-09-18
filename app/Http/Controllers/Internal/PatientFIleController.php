<?php

namespace App\Http\Controllers\Internl;

use App\PatientFIle;
use App\Patient;
use Illuminate\Http\Request;

class PatientFIleController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Patient Files';
        $this->page->view = 'm.patient_files';
        $this->middleware('auth:admin');
    }

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
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function show(PatientFIle $patientFIle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientFIle $patientFIle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientFIle $patientFIle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientFIle $patientFIle)
    {
        //
    }
}
