<?php
namespace App\Http\Controllers\Internal;
use App\PatientFile;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PatientFIleController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Patient Files';
        $this->page->view = 'm.patient_files';
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
            ->with('patient_files', PatientFile::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('patients', Patient::all())
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == 'patient_file_number') {
            $objects = Patient::where("file_number", 'LIKE', "%$searchterm%")->get();
            $this->patient_files = PatientFile::whereIn('patient_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
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
            $this->patient_files = PatientFile::whereIn('patient_id', $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } elseif ($filter == 'id') {
            if (isset($_GET['default'])) {
                $this->patient_files = PatientFile::where($filter, $searchterm)->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            } else {
                $this->patient_files = PatientFile::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
            }
        } else {
            $this->patient_files = PatientFile::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->patient_files)) {
            $this->patient_files->filter = $filter;
            $this->patient_files->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('patient_files', $this->patient_files)
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
    public function store(Request $request)
    {
        $request->validate([
            'patient' => 'required|exists:patients,id',
            'file_name' => 'required|string|min:2|max:100',
            'file' => 'required|file|mimes:jpeg,jpg,png|max:1024',
        ]);
        $request['user_id'] = Auth::id();
        $request['patient_id'] = $request['patient'];
        $req = collect($request->all());
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = strtolower(str_ireplace(' ', '_', pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME))) . time() . '.' . request()->file->getClientOriginalExtension();
            $destinationPath = 'uploads/patient_files/';
            $filePath = $destinationPath . $filename;
            $file->move($destinationPath, $filename);
            $req['file'] = $filePath;
        }
        $obj = new PatientFile($req->all());
        $obj->save();
        session()->flash('success', 'New Patient File Added!');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function show(PatientFIle $patientFIle)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientFIle $patientFIle)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient' => 'required|exists:patients,id',
            'file_name' => 'required|string|min:2|max:100',
            'file' => 'required|file|mimes:jpeg,jpg,png|max:1024',
        ]);
        $request['user_id'] = Auth::id();
        $request['patient_id'] = $request['patient'];
        $req = collect($request->all());
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = strtolower(str_ireplace(' ', '_', pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME))) . time() . '.' . request()->file->getClientOriginalExtension();
            $destinationPath = 'uploads/patient_files/';
            $filePath = $destinationPath . $filename;
            $file->move($destinationPath, $filename);
            $req['file'] = $filePath;
        }
        $obj = PatientFile::findOrFail($id);
        $obj->update($req->all());
        session()->flash('success', 'Patient File Updated!');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientFIle  $patientFIle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PatientFile::findOrFail($id)->delete();
        session()->flash('success', 'Patient File Deleted!');
        return redirect()->back();
    }
}