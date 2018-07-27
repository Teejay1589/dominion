<?php

namespace App\Http\Controllers\Internal;

use App\Visit;
use App\Patient;
use App\User;
use App\VisitDoctors;
use App\Http\Requests\CreateVisit;
use App\Http\Requests\UpdateVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientVisitsController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Patient Visits';
        $this->page->view = 'm.patient_visits';
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ($id == 0) {
            return redirect('/m/patients')->withErrors('Please, Select a Patient 1st!');
        }

        $this->active_object = Patient::findOrFail($id);

        return view($this->page->view)
            ->with('visits', Visit::all())
            ->with('patients', Patient::all())
            ->with('users', User::all())
            ->with('page', $this->page)
            ->with('active_object', $this->active_object)
            ->with('patient_visits', $this->active_object->visits);
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
    public function store(CreateVisit $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisit $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
