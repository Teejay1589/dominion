<?php

namespace App\Http\Controllers\Internal;

use App\Cases;
use App\Patient;
use App\User;
use App\CaseDoctors;
use App\Http\Requests\CreateCases;
use App\Http\Requests\UpdateCases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Cases';
        $this->page->view = 'm.cases';
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = '')
    {
        return view($this->page->view)
            ->with('cases', Cases::all())
            // ->with('cases', Cases::orderBy('id', 'desc')->paginate(10))
            ->with('patients', Patient::all())
            ->with('users', User::all())
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
    public function store(CreateCases $request)
    {
        $request['user_id'] = Auth::id();
        $request['patient_id'] = $request['patient'];
        $request['is_consultation'] = isset($request->is_consultation) ? 1 : 0;
        $request['is_emergency'] = isset($request->is_emergency) ? 1 : 0;
        $request['is_delivery'] = isset($request->is_delivery) ? 1 : 0;
        $request['is_success'] = isset($request->is_success) ? 1 : 0;

        $obj = new Cases($request->all());
        $obj->save();

        // save Case Doctors
        if( count($request->doctors) > 0 ) {
            foreach ($request->doctors as $value) {
                $obj1 = new CaseDoctors($request->all());
                $obj1->case_id = $obj->id;
                $obj1->doctor_id = $value;
                $obj1->save();
            }
        }

        session()->flash('success', 'New Case Created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $cases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCases $request, $id)
    {
        $request['is_consultation'] = isset($request->is_consultation) ? 1 : 0;
        $request['is_emergency'] = isset($request->is_emergency) ? 1 : 0;
        $request['is_delivery'] = isset($request->is_delivery) ? 1 : 0;
        $request['is_success'] = isset($request->is_success) ? 1 : 0;

        $obj = Cases::findOrFail($id);
        $obj->update($request->all());

        // Update Case Doctors
        if ($obj->case_doctors->count() > count($request->doctors)) {
            $i = 1;
            foreach ($obj->case_doctors as $value) {
                if($i <= count($request->doctors)) {
                    $obj1 = CaseDoctors::findOrFail($value->id);
                    $obj1->case_id = $id;
                    $obj1->doctor_id = $request->doctors[$i-1];
                    $obj1->update();
                    $i++;
                } else {
                    $obj1 = CaseDoctors::findOrFail($value->id);
                    $obj1->delete();
                }
            }
        } else if ($obj->case_doctors->count() < count($request->doctors)) {
            $i = 0;
            foreach ($obj->case_doctors as $value) {
                $obj1 = CaseDoctors::findOrFail($value->id);
                $obj1->case_id = $id;
                $obj1->doctor_id = $request->doctors[$i];
                $obj1->update();
                $i++;
            }
            for ($j = $obj->case_doctors->count(); $j < count($request->doctors); $j++) {
                $obj1 = new CaseDoctors($request->all());
                $obj1->user_id = Auth::id();
                $obj1->case_id = $id;
                $obj1->doctor_id = $request->doctors[$j];
                $obj1->save();
            }
        } else {
            $i = 0;
            foreach ($obj->case_doctors as $value) {
                $obj1 = CaseDoctors::findOrFail($value->id);
                $obj1->case_id = $id;
                $obj1->doctor_id = $request->doctors[$i];
                $obj1->update();
                $i++;
            }
        }

        session()->flash('success', 'Case Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cases::findOrFail($id)->delete();

        session()->flash('success', 'Case Deleted!');
        return redirect()->back();
    }
}
