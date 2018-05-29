<?php

namespace App\Http\Controllers\Internal;

use App\Patient;
use App\Http\Requests\CreatePatients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientsController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Patients';
        $this->page->view = 'm.patients';
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->page->view)
            ->with('patients', Patient::all())
            ->with('page', $this->page);
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
    public function store(CreatePatients $request)
    {
        $request['user_id'] = Auth::id();

        $obj = new Patient($request->all());
        $obj->password = bcrypt($obj->telephone);
        $obj->save();

        session()->flash('success', 'New Patient Created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show(Patients $patients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePatients $request, $id)
    {
        $obj = Patient::findOrFail($id);
        $obj->update($request->all());

        session()->flash('success', 'Patient Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::findOrFail($id)->delete();

        session()->flash('success', 'Patient Deleted!');
        return redirect()->back();
    }

    public function password_reset($id)
    {
        $patient = Patient::findOrFail($id);
        if( !is_null($patient->phone) ) {
            $patient->password = bcrypt($patient->phone);
            $patient->update();
            session()->flash('success', 'Patient Password Reset to phone number!');
        } else {
            session()->flash('success', 'Patient Password is unchanged!');
        }

        return redirect()->back();
    }
}
