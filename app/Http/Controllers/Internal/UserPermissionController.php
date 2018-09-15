<?php

namespace App\Http\Controllers\Internal;

use App\UserPermission;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateStudent;
use App\Http\Requests\UpdateStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon;

class UserPermissionController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'User Permissions';
        $this->page->view = 'm.user_permissions';
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
            ->with('user_permissions', UserPermission::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
            ->with('users', User::all())
            ->with('page', $this->page);
    }

    public function filter($filter, $searchterm = "")
    {
        if ($filter == 'user_id') {
            $objects = User::where('first_name', 'LIKE', "%$searchterm%")->whereOr('last_name', 'LIKE', "%$searchterm%")->get();
            $this->user_permissions = UserPermission::whereIn($filter, $objects->pluck('id'))->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        } else {
            $this->user_permissions = UserPermission::where($filter, 'LIKE', "%$searchterm%")->latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10);
        }

        if (isset($this->user_permissions)) {
            $this->user_permissions->filter = $filter;
            $this->user_permissions->searchterm = $searchterm = urldecode($searchterm);
        }

        return view($this->page->view)
            ->with('user_permissions', $this->user_permissions)
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
    public function store(Request $request)
    {
        $request['user_id'] = $request->user;

        if (UserPermission::where('table', $request->table)->where('action', $request->action)->where('user_id', $request->user_id)->count() == 0) {
            $obj = new UserPermission($request->all());
            DB::statement("ALTER TABLE `" . $obj->table() . "` AUTO_INCREMENT = 1");
            $obj->save();
        } else {
            return redirect()->back()->withErrors('User Permission already exist!');
        }

        session()->flash('success', 'User Permission Created Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function show(UserPermission $userPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPermission $userPermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['user_id'] = $request->user;
        UserPermission::findOrFail($id)->update($request->all());

        session()->flash('success', 'User Permission Updated Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPermission  $userPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserPermission::findOrFail($id)->delete();

        session()->flash('success', 'User Permission Deleted Successfully!');
        return redirect()->back();
    }
}
