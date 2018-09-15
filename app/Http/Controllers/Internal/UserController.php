<?php

namespace App\Http\Controllers\Internal;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Users';
        $this->page->view = 'm.users';
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
            ->with('users', User::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        $this->users = User::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);

        if (isset($this->users)) {
            $this->users->filter = $filter;
            $this->users->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('users', $this->users)
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
        $request['role_id'] = $request->role;
        $request['password'] = bcrypt(strtolower($request->last_name));

        $obj = new User($request->all());
        $obj->save();

        session()->flash('success', 'New User Created!<br>Account Password: <strong>'.strtolower($request->last_name).'</strong>');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['role_id'] = $request->role;

        $obj = User::findOrFail($id);
        if ( $request['role_id'] != $obj->role_id ) {
            if ( Auth::user()->role_id > 1 ) {
                return redirect()->back()->withErrors('Only the Admin can change Users Role!');
            }
        }
        $obj->update($request->all());

        session()->flash('success', 'User Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Auth::user()->role_id > 1 ) {
            return redirect()->back()->withErrors('Only the Admin can delete Users!');
        }
        User::findOrFail($id)->delete();

        session()->flash('success', 'User Deleted!');
        return redirect()->back();
    }

    public function password_reset($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user->last_name)) {
            $user->password = bcrypt(strtolower($user->last_name));
            $user->update();
            session()->flash('success', 'User Password Successfully Reset!<br>Password Reset to: <strong>'.strtolower($user->last_name).'</strong>');
        } else {
            return redirect()->back()->withErrors('Users Password is unchanged! Reason: User does not have a Last Name');
        }

        return redirect()->back();
    }
}
