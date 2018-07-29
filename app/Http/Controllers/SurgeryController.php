<?php

namespace App\Http\Controllers;

use App\Surgery;
use App\Patient;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurgeryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->page = collect();
        $this->page->title = 'My Surgeries';
        $this->page->view = 'surgeries';
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
            ->with('surgeries', Surgery::all())
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
    public function store(CreateSurgerys $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function show(Surgery $surgeries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgery $surgeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurgerys $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surgery  $surgeries
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
