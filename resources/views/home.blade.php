@extends('layouts.patient')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')
    <div class="row">
      <div class="col-md-3">
        <div>
          <div class="widget bg-white">
            <div class="widget-icon bg-success pull-left fa fa-child">
            </div>
            <div class="overflow-hidden">
              <span class="widget-title">{{ Auth::user()->cases->count() }}</span>
              <span class="widget-subtitle">My Visits</span>
              <br>
              <a href="{{ url('/p/cases') }}" class="text-primary">view</a>
            </div>
          </div>
          <div class="widget bg-white">
            <div class="widget-icon bg-success pull-left">
            </div>
            <div class="overflow-hidden">
              <span class="widget-title">0</span>
              <span class="widget-subtitle">My Billings</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">

      </div>
      <div class="col-md-3">
        <div class="widget bg-white">
          <div class="widget-icon bg-success pull-left fa fa-calendar-o">
          </div>
          <div class="overflow-hidden">
            <span class="widget-title">0</span>
            <span class="widget-subtitle">My Appointments</span>
          </div>
        </div>
        <div class="widget bg-white">
          <div class="widget-icon bg-success pull-left">
          </div>
          <div class="overflow-hidden">
            <span class="widget-title">0</span>
            <span class="widget-subtitle">Upcoming Appointments</span>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('page_scripts')
@endsection