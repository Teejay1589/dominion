@extends('layouts.patient')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')

<section>
    <div class="row mb15">
        <div class="col-md-1 col-xs-12"></div>
        <div class="col-md-10 col-xs-12">
          <div class="row">
            <div class="col-md-4">
              <div>
                <div class="widget bg-white">
                  <div class="widget-icon bg-success pull-left fa fa-child">
                  </div>
                  <div class="overflow-hidden">
                    <span class="widget-title">{{ Auth::user()->visits->count() }}</span>
                    <span class="widget-subtitle">My Visits</span>
                    <br>
                    <a href="{{ url('/p/visits') }}" class="text-primary">view</a>
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
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
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
        </div>
        <div class="col-md-1 col-xs-12"></div>
    </div>
</section>

@endsection

@section('page_scripts')
@endsection