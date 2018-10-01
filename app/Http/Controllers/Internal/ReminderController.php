<?php

namespace App\Http\Controllers\Internal;

use App\Reminder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends InternalControl
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'Reminders';
        $this->page->view = 'm.reminders';
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
            ->with('reminders', Reminder::latest()->paginate(isset($_GET['entries']) ? $_GET['entries'] : 10))
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
        $request->validate([
            'label' => 'required|string|min:2|max:180',
        ]);
        $request['user_id'] = Auth::id();
        // $request['user_id'] = $request['user'];
        $request['done'] = isset($request->done) ? 1 : 0;

        $obj = new Reminder($request->all());
        $obj->save();

        session()->flash('success', 'New Reminder Added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|string|min:2|max:180',
        ]);
        $request['user_id'] = Auth::id();
        // $request['user_id'] = $request['user'];
        $request['done'] = isset($request->done) ? 1 : 0;

        $obj = Reminder::findOrFail($id);
        $obj->update($request->all());

        session()->flash('success', 'Reminder Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reminder::findOrFail($id)->delete();
        session()->flash('success', 'Reminder Deleted!');
        return redirect()->back();
    }
}
