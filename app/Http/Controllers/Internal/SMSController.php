<?php

namespace App\Http\Controllers\Internal;

use App\Sms;
use App\SmartXmx;
use App\SmsPatient;
use App\Patient;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmsController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'SMS';
        $this->page->view = 'm.sms';
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
            ->with('sms', Sms::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('patients', Patient::all())
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == 'patient_file_number') {
            $objects = Patient::where("file_number", 'LIKE', "%$searchterm%")->get();
            $objects = SmsPatient::whereIn('patient_id', $objects->pluck('id'))->get();
            $this->sms = Sms::whereIn('visit_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
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
            $objects = SmsPatient::whereIn('patient_id', $objects->pluck('id'))->get();
            $this->sms = Sms::whereIn('visit_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } elseif ($filter == 'id') {
            if (isset($_GET['default'])) {
                $this->sms = Sms::where($filter, $searchterm)->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            } else {
                $this->sms = Sms::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            }
        } else {
            $this->sms = Sms::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->sms)) {
            $this->sms->filter = $filter;
            $this->sms->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('sms', $this->sms)
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
        if (!isset($_GET['patient_id'])) {
            return redirect()->back()->withErrors('Invalid Parameters!');
        }

        $this->page->action = "create";
        return view($this->page->view)
            ->with('sms', Sms::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('patients', Patient::all())
            ->with('page', $this->page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $request['user_id'] = Auth::id();

        $obj1 = new Sms($request->all());
        $obj1->save();

        // Send SMS Message
        $setting = Setting::findOrFail(1);
        $xmx = new SmartXmx($setting->sms_username, $setting->sms_password);
        $response = $xmx->sendSms($request->from, array_flatten(Patient::whereIn('id', $request->patients)->select('phone_number')->get()->toArray()), $request->message);


        // If Message is sent
        if (true) {
            // Save Sms Patients
            $request['sms_id'] = $obj1->id;
            $counter = 0;
            foreach ($request->patients as $key => $value) {
                $request['patient_id'] = $value;

                $obj2 = new SmsPatient($request->all());
                $obj2->firstOrCreate($obj2->toArray());
                $counter++;
            }
        }
        dd($response);

        session()->flash('success', 'New Sms Created and Successfuly Sent to <strong>' . $counter .'</strong> Patients!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_id'] = Auth::id();

        // $obj1 = Sms::findOrFail($id);
        // $obj1->update($request->all());
        $obj1 = new Sms($request->all());
        $obj1->save();

        // Send SMS Message
        $setting = Setting::findOrFail(1);
        $xmx = new SmartXmx($setting->sms_username, $setting->sms_password);
        $response = $xmx->sendSms($request->from, $request->patients, $request->message);

        // If Message is sent
        if (true) {
            // Save Sms Patients
            $request['sms_id'] = $obj1->id;
            $counter = 0;
            foreach ($request->patients as $key => $value) {
                $request['patient_id'] = $value;

                $obj2 = new SmsPatient($request->all());
                $obj2->firstOrCreate($obj2->toArray());
                $counter++;
            }
        }

        // session()->flash('success', 'Sms Updated and Successfuly Sent to <strong>' . $counter .'</strong> Patients!');
        session()->flash('success', 'New Sms Created and Successfuly Sent to <strong>' . $counter .'</strong> Patients!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // First delete all Sms Patients
        foreach (Sms::findOrFail($id)->sms_patients as $key => $value) {
            $value->delete();
        }
        Sms::findOrFail($id)->delete();

        session()->flash('success', 'Sms Deleted!');
        return redirect()->back();
    }

    public function balance()
    {
        $setting = Setting::findOrFail(1);
        $xmx = new SmartXmx($setting->sms_username, $setting->sms_password);
        $response = $xmx->checkSmsBalance();

        if (is_null(SmartXmx::interpreteResponse($response))) {
            $balance = $response;
            session()->flash('success', 'Your Sms Balance is <strong>' . $balance . '</strong>');
        } else {
            if (SmartXmx::interpreteResponse($response) != 'Successful') {
                return redirect()->back()->withErrors('Error ' . $response . ' ' . SmartXmx::interpreteResponse($response));
            }
        }

        return redirect()->back();
    }
}
