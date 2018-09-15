<?php

namespace App\Http\Controllers;

use App\Visit;
use App\Patient;
use App\VisitDoctors;
use App\Surgery;
use App\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'My Visits';
        $this->page->view = 'visits';
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = '')
    {
        return view($this->page->view)
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
    public function store(CreateVisits $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisits $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visit  $visits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
