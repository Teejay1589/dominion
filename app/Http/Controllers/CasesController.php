<?php

namespace App\Http\Controllers;

use App\Cases;
use App\Patients;
use App\Http\Requests\CreateCases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
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
        $this->page->view = 'cases';
        $this->middleware('auth');
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
            ->with('patients', Patients::all())
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

        $obj = new Cases($request->all());
        $obj->save();

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
    public function update(CreateCases $request, $id)
    {
        $obj = Cases::findOrFail($id);
        $obj->update($request->all());

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
