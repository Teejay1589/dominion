<?php

namespace App\Http\Controllers\Internal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ChangeUserPassword;
use App\User;
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
        Auth::user()->update($request->all());

        session()->flash('success', 'Profile SUCCESSFULLY updated!');
        return redirect()->back();
    }

    public function change_password(ChangeUserPassword $request)
    {
        $user = User::where('id', Auth::user()->id)->get()->first();
        $bcrypt = new BcryptHasher;

        if( $bcrypt->check($request->current_password, $user->password) ) {
            $user->password = bcrypt($request->new_password);

            $user->save();

            // session()->flash('success', 'Password SUCCESSFULLY Changed, Please relogin to continue!');
            session()->flash('success', 'Password SUCCESSFULLY Changed!');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(array('current_password' => 'Current Password entered is incorrect, PASSWORD UNCHANGED!'))->withInput();
        }
    }

    public function my_permissions()
    {
        $this->page->title = 'My Permissions';
        $this->page->view = 'm.my_permissions';
        return view($this->page->view)
            ->with('page', $this->page);
    }
}
