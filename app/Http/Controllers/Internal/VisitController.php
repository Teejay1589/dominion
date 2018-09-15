<?php

namespace App\Http\Controllers\Internal;

use App\Visit;
use App\Patient;
use App\User;
use App\VisitDoctors;
use App\Http\Requests\CreateVisits;
use App\Http\Requests\UpdateVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Visits';
        $this->page->view = 'm.visits';
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
            ->with('visits', Visit::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('patients', Patient::all())
            ->with('users', User::all())
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == 'patient_file_number') {
            $objects = Patient::where("file_number", 'LIKE', "%$searchterm%")->get();
            $this->visits = Visit::whereIn('patient_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } elseif ($filter == 'patient_id') {
            $searchterms = array();
            $searchterms = explode(' ', $searchterm);

            if (count($searchterms) == 2) {
                $object = Patient::where([["first_name", 'LIKE', "%$searchterms[0]%"], ["last_name", 'LIKE', "%$searchterms[1]%"]])->get();
            } else {
                $object = Patient::where("first_name", 'LIKE', "%$searchterms[0]%")->get();
                $object2 = Patient::where("last_name", 'LIKE', "%$searchterms[0]%")->get();
                $object->push($object2);
                $object = $object->flatten();
            }
            $objects = $object;
            $this->visits = Visit::whereIn('patient_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } elseif ($filter == 'id') {
            if (isset($_GET['default'])) {
                $this->visits = Visit::where($filter, $searchterm)->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            } else {
                $this->visits = Visit::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            }
        } elseif ($filter == "successful_delivery") {
            // Interprete
            if (isset($searchterm[0]) && (strtolower($searchterm[0]) == 1 || strtolower($searchterm[0]) == 'y' || strtolower($searchterm[0]) == 's')) {
                $searchterm = 1;
            } elseif (isset($searchterm[0]) && (strtolower($searchterm[0]) == 0 || strtolower($searchterm[0]) == 'n' || strtolower($searchterm[0]) == 'u')) {
                $searchterm = 0;
            } else {
                $searchterm = "";
            }
            $this->visits = Visit::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } else {
            $this->visits = Visit::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->visits)) {
            $this->visits->filter = $filter;
            $this->visits->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('visits', $this->visits)
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
    public function store(CreateVisits $request)
    {
        $request['user_id'] = Auth::id();
        $request['patient_id'] = $request['patient'];
        // $request['successful_delivery'] = isset($request->successful_delivery) ? 1 : 0;

        $obj = new Visit($request->all());
        $obj->save();

        // save Visit Doctors
        if (count($request->doctors) > 0) {
            foreach ($request->doctors as $value) {
                $obj1 = new VisitDoctors($request->all());
                $obj1->visit_id = $obj->id;
                $obj1->doctor_id = $value;
                $obj1->save();
            }
        }

        session()->flash('success', 'New Visit Created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visits  $visits
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
     * @param  \App\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisits $request, $id)
    {
        $request['successful_delivery'] = isset($request->successful_delivery) ? 1 : 0;

        $obj = Visit::findOrFail($id);
        $obj->update($request->all());

        // Update Visit Doctors
        if ($obj->visit_doctors->count() > count($request->doctors)) {
            $i = 1;
            foreach ($obj->visit_doctors as $value) {
                if ($i <= count($request->doctors)) {
                    $obj1 = VisitDoctors::findOrFail($value->id);
                    $obj1->visit_id = $id;
                    $obj1->doctor_id = $request->doctors[$i - 1];
                    $obj1->update();
                    $i++;
                } else {
                    $obj1 = VisitDoctors::findOrFail($value->id);
                    $obj1->delete();
                }
            }
        } else if ($obj->visit_doctors->count() < count($request->doctors)) {
            $i = 0;
            foreach ($obj->visit_doctors as $value) {
                $obj1 = VisitDoctors::findOrFail($value->id);
                $obj1->visit_id = $id;
                $obj1->doctor_id = $request->doctors[$i];
                $obj1->update();
                $i++;
            }
            for ($j = $obj->visit_doctors->count(); $j < count($request->doctors); $j++) {
                $obj1 = new VisitDoctors($request->all());
                $obj1->user_id = Auth::id();
                $obj1->visit_id = $id;
                $obj1->doctor_id = $request->doctors[$j];
                $obj1->save();
            }
        } else {
            $i = 0;
            foreach ($obj->visit_doctors as $value) {
                $obj1 = VisitDoctors::findOrFail($value->id);
                $obj1->visit_id = $id;
                $obj1->doctor_id = $request->doctors[$i];
                $obj1->update();
                $i++;
            }
        }

        session()->flash('success', 'Visit Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visit::findOrFail($id)->delete();

        session()->flash('success', 'Visit Deleted!');
        return redirect()->back();
    }
}
