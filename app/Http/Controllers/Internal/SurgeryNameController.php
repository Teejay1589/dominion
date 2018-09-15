<?php

namespace App\Http\Controllers\Internal;

use App\SurgeryName;
use Illuminate\Http\Request;

class SurgeryNameController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Surgery Names';
        $this->page->view = 'm.surgery_names';
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
            ->with('surgery_names', SurgeryName::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        $this->surgery_names = SurgeryName::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);

        if (isset($this->surgery_names)) {
            $this->surgery_names->filter = $filter;
            $this->surgery_names->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('surgery_names', $this->surgery_names)
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
    public function store(Request $request)
    {
        $obj = new SurgeryName($request->all());
        $obj->save();

        session()->flash('success', 'New Surgery Name Added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurgeryName  $surgeryName
     * @return \Illuminate\Http\Response
     */
    public function show(SurgeryName $surgeryName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SurgeryName  $surgeryName
     * @return \Illuminate\Http\Response
     */
    public function edit(SurgeryName $surgeryName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SurgeryName  $surgeryName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SurgeryName::findOrFail($id)->update($request->all());

        session()->flash('success', 'Surgery Name Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SurgeryName  $surgeryName
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        SurgeryName::findOrFail($id)->delete();

        session()->flash('success', 'Surgery Name Removed!');
        return redirect()->back();
    }
}
