<?php

namespace App\Http\Controllers\Internal;

use App\Surgery;
use App\Patient;
use App\Cases;
use App\Http\Requests\CreateSurgeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurgeryController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Surgeries';
        $this->page->view = 'm.surgeries';
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
            ->with('surgeries', Surgery::all())
            ->with('cases', Cases::all())
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
    public function store(CreateSurgeries $request)
    {
        $request['user_id'] = Auth::id();
        $request['case_id'] = $request->case;
        $request['is_success'] = isset($request->is_success) ? 1 : 0;

        $obj = new Surgery($request->all());
        $obj->save();

        session()->flash('success', 'New Surgery Created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surgeries  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function show(Surgeries $surgeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgery $surgeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSurgeries $request, $id)
    {
        $request['case_id'] = $request->case;
        $request['is_success'] = isset($request->is_success) ? 1 : 0;

        $obj = Surgery::findOrFail($id);
        $obj->update($request->all());

        session()->flash('success', 'Surgery Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surgery::findOrFail($id)->delete();

        session()->flash('success', 'Surgery Deleted!');
        return redirect()->back();
    }
}
