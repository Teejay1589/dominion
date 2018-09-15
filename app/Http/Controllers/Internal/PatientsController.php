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
            ->with('patients', Patient::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        $this->patients = Patient::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);

        if (isset($this->patients)) {
            $this->patients->filter = $filter;
            $this->patients->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('patients', $this->patients)
            ->with('page', $this->page);
    }

    public function medical_history($id)
    {
        $this->page->title = 'Medical History';
        $this->page->view = 'm.medical_history';
        $this->active_object = Patient::findOrFail($id);

        return view($this->page->view)
            ->with('active_object', $this->active_object)
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
        $request['file_number'] = Patient::generate_file_number();

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
        if (!is_null($patient->phone_number)) {
            $patient->password = bcrypt($patient->phone_number);
            $patient->update();
            session()->flash('success', 'Patient Password Reset to phone number!<br>Password Reset to: <strong>' . $patient->phone_number . '</strong>');
        } else {
            return redirect()->back()->withErrors('Patient Password is unchanged! Reason: Patient does not have a Phone Number');
        }

        return redirect()->back();
    }
}
