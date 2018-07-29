<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ChangeUserPassword;
use App\Patient;
use App\Visit;
use App\Surgery;
use App\Billing;
use Illuminate\Hashing\BcryptHasher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'My Dashboard';
        $this->page->view = 'home';
        $this->middleware('auth');
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
        $this->page->title = 'My Profile';
        $this->page->view = 'profile';
        return view($this->page->view)
            ->with('page', $this->page);
    }

    public function update(UpdateProfile $request)
    {
        Auth::user()->update($request->all());

        session()->flash('success', 'Profile SUCCESSFULLY updated!');
        return redirect()->back();
    }

    public function change_password(ChangeUserPassword $request)
    {
        $user = Patient::where('id', Auth::user()->id)->get()->first();
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
}
