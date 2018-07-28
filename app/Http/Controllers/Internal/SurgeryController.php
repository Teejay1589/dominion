<?php

namespace App\Http\Controllers\Internal;

use App\Surgery;
use App\Patient;
use App\Visit;
use App\SurgeryName;
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
            ->with('surgeries', Surgery::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('visits', Visit::all())
            ->with('surgery_names', SurgeryName::all())
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == "visit_id") {
            $objects = Visit::where('title', 'LIKE', "%$searchterm%")->get();
            $this->surgeries = Surgery::whereIn($filter, $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } elseif ($filter == "surgery_id") {
            $objects = Surgery::where('surgery_name', 'LIKE', "%$searchterm%")->get();
            $this->surgeries = Surgery::whereIn($filter, $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } else {
            $this->surgeries = Surgery::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->surgeries)) {
            $this->surgeries->filter = $filter;
            $this->surgeries->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('surgeries', $this->surgeries)
            ->with('visits', Visit::all())
            ->with('surgery_names', SurgeryName::all())
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
        $request['visit_id'] = $request->visit;

        if (SurgeryName::where('surgery_name', $request->surgery_name)->count() == 0) {
            $obj1 = new SurgeryName();
            $obj1->surgery_name = $request->surgery_name;
            $obj1->save();
        }

        $obj = new Surgery($request->all());
        $obj->save();

        session()->flash('success', 'New Surgery Created!');
        return redirect()->back();
    }
    public function resurgery(CreateSurgeries $request, $id)
    {
        $request['user_id'] = Auth::id();
        $request['visit_id'] = $request->visit;
        $request['surgery_id'] = $id;
        // $request['is_success'] = isset($request->is_success) ? 1 : 0;

        if (SurgeryName::where('surgery_name', $request->name)->count() == 0) {
            $obj1 = new SurgeryName();
            $obj1->surgery_name = $request->name;
            $obj1->save();
        }

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
        $request['visit_id'] = $request->visit;

        if (SurgeryName::where('surgery_name', $request->surgery_name)->count() == 0) {
            $obj1 = new SurgeryName();
            $obj1->surgery_name = $request->surgery_name;
            $obj1->save();
        }

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
