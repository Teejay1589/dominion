<?php

namespace App\Http\Controllers\Internal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ChangeUserPassword;
use App\User;
use App\Setting;
use Illuminate\Hashing\BcryptHasher;

class HomeController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Dashboard';
        $this->page->view = 'm.home';
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->page->view)
            ->with('page', $this->page);
    }

    public function profile()
    {
        $this->page->title = 'Profile';
        $this->page->view = 'm.profile';
        return view($this->page->view)
            ->with('page', $this->page);
    }

    // public function update(UpdateProfile $request) // to be used later
    public function update(Request $request)
    {
        if (session()->has('active_profile_picture')) {
            $request['profile_picture'] = session('active_profile_picture');
            session()->forget('active_profile_picture');
            // Auth::user()->profile_picture = $request['profile_picture'];
        }

        Auth::user()->update($request->all());

        session()->flash('success', 'Profile SUCCESSFULLY updated!');
        return redirect()->back();
    }

    public function settings()
    {
        $this->page->title = 'Settings';
        $this->page->view = 'm.settings';
        return view($this->page->view)
            ->with('page', $this->page);
    }

    public function update_settings(Request $request)
    {
        if (session()->has('active_hospital_logo')) {
            $request['hospital_logo'] = session('active_hospital_logo');
            session()->forget('active_hospital_logo');
            // Setting::findOrFail(1)->hospital_logo = $request['hospital_logo'];
        }

        Setting::findOrFail(1)->update($request->all());

        session()->flash('success', 'Settings SUCCESSFULLY updated!');
        return redirect()->back();
    }

    public function change_password(ChangeUserPassword $request)
    {
        $user = User::where('id', Auth::user()->id)->get()->first();
        $bcrypt = new BcryptHasher;

        if ($bcrypt->check($request->current_password, $user->password)) {
            $user->password = bcrypt($request->new_password);

            $user->save();

            // session()->flash('success', 'Password SUCCESSFULLY Changed, Please relogin to continue!');
            session()->flash('success', 'Password SUCCESSFULLY Changed!');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(array('current_password' => 'Current Password entered is incorrect, PASSWORD UNCHANGED!'))->withInput();
        }
    }

    public function upload_cv(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:1024',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = strtolower(str_ireplace(' ', '_', pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME))) . time() . '.' . request()->file->getClientOriginalExtension();
            $destinationPath = 'uploads/mcv/';
            $filePath = $destinationPath . $filename;
            $file->move($destinationPath, $filename);
        }

        $user = User::where('id', Auth::user()->id)->get()->first();
        $user->cv = $filePath;
        $user->update();

        session()->flash('success', 'CV SUCCESSFULLY Uploaded!');
        return redirect()->back();
    }

    public function my_permissions()
    {
        $this->page->title = 'My Permissions';
        $this->page->view = 'm.my_permissions';
        return view($this->page->view)
            ->with('page', $this->page);
    }

    public function ajax_upload_profile_picture(Request $request)
    {
        $filePath = 'img/default.png';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = strtolower(str_ireplace(' ', '_', pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME))) . time() . '.' . request()->image->getClientOriginalExtension();
            $destinationPath = 'uploads/mpp/';
            $filePath = $destinationPath . $filename;
            $file->move($destinationPath, $filename);

            session()->put('active_profile_picture', $filePath);
        }
        return response()->json(['imagepath' => asset($filePath)]);
    }

    public function ajax_upload_hospital_logo(Request $request)
    {
        // $filePath = 'img/default.png';
        $filePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = strtolower(str_ireplace(' ', '_', pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME))) . time() . '.' . request()->image->getClientOriginalExtension();
            $destinationPath = 'uploads/logo/';
            $filePath = $destinationPath . $filename;
            $file->move($destinationPath, $filename);

            session()->put('active_hospital_logo', $filePath);
        }
        return response()->json(['imagepath' => asset($filePath)]);
    }
}
