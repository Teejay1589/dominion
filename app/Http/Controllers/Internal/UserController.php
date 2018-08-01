<?php

namespace App\Http\Controllers\Internal;

use App\User;
// use App\Http\Requests\CreateUsers;
// use App\Http\Requests\UpdateUsers;
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
    public function store(CreateUsers $request)
    {
        $obj = new User($request->all());
        $obj->save();

        session()->flash('success', 'New User Created!');
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
    public function update(UpdateUsers $request, $id)
    {
        $obj = User::findOrFail($id);
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
        User::findOrFail($id)->delete();

        session()->flash('success', 'User Deleted!');
        return redirect()->back();
    }
}
