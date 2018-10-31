<?php

namespace App\Http\Controllers\Internal;

use App\Billing;
use App\Patient;
use App\Visit;
use App\Surgery;
use App\Http\Requests\CreateBillings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Billings';
        $this->page->view = 'm.billings';
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
            ->with('billings', Billing::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('visits', Visit::all())
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == 'patient_file_number') {
            $objects = Patient::where("file_number", 'LIKE', "%$searchterm%")->get();
            $objects = Visit::whereIn('patient_id', $objects->pluck('id'))->get();
            $this->billings = Billing::whereIn('visit_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
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
            $objects = Visit::whereIn('patient_id', $objects->pluck('id'))->get();
            $this->billings = Billing::whereIn('visit_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } elseif ($filter == "visit_id") {
            if (isset($_GET['default'])) {
                $this->billings = Billing::where($filter, $searchterm)->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            } else {
                $objects = Visit::where('title', 'LIKE', "%$searchterm%")->get();
                $this->billings = Billing::whereIn($filter, $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            }
        } elseif ($filter == "status") {
            // Interpret
            if (isset($searchterm[0]) && (strtolower($searchterm[0]) == 1 || strtolower($searchterm[0]) == 'y' || strtolower($searchterm[0]) == 'p')) {
                $searchterm = 1;
            } elseif (isset($searchterm[0]) && (strtolower($searchterm[0]) == 0 || strtolower($searchterm[0]) == 'n' || strtolower($searchterm[0]) == 'u')) {
                $searchterm = 0;
            } else {
                $searchterm = "";
            }
            $this->billings = Billing::where('is_paid', 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } else {
            $this->billings = Billing::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->billings)) {
            $this->billings->filter = $filter;
            $this->billings->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('billings', $this->billings)
            ->with('visits', Visit::all())
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
    // public function store(CreateBillings $request)
    public function store(Request $request)
    {
        // dd($request);
        // return redirect()->back()->withInput();

        $request['user_id'] = Auth::id();
        $request['visit_id'] = $request->visit;
        $request['is_paid'] = collect();
        $request->is_paid->push($request->is_paid_0);
        $request->is_paid->push($request->is_paid_1);
        $request->is_paid->push($request->is_paid_2);
        $request->is_paid->push($request->is_paid_3);
        $request->is_paid->push($request->is_paid_4);

        $counter = 0;
        for ($i = 0; $i < count($request->billing_name); $i++) {
            if ($request->billing_name[$i] == null) {
                continue;
            }

            $obj = new Billing($request->all());
            $obj->billing_name = $request->billing_name[$i];
            $obj->amount = $request->amount[$i];
            $obj->is_paid = $request->is_paid[$i];

            // dd($obj);
            $obj->save();
            $counter++;
        }

        session()->flash('success', $counter . ' New Billings Created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function show(Surgeries $billings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBillings $request, $id)
    {
        $request['user_id'] = Auth::id();
        $request['visit_id'] = $request->visit;

        $obj = Billing::findOrFail($id);
        $obj->update($request->all());

        session()->flash('success', 'Billing Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Billing::findOrFail($id)->delete();

        session()->flash('success', 'Billing Deleted!');
        return redirect()->back();
    }

    public function toggle_is_paid($id)
    {
        $billing = Billing::findOrFail($id);
        $billing->is_paid = ($billing->is_paid) ? 0 : 1;
        $billing->update();

        if ($billing->is_paid) {
            session()->flash('success', 'Billing Status is Changed to PAID!');
        } else {
            session()->flash('success', 'Billing Status is Changed to UNPAID!');
        }
        return redirect()->back();
    }
}
