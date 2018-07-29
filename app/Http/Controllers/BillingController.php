<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Visit;
use App\Patient;
use App\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'My Billings';
        $this->page->view = 'billings';
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
            ->with('billings', Billing::all())
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
    public function store(CreateBillings $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillings $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
