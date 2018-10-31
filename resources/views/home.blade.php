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
            @php
              if (Auth::user()->last_visit()) {
                $element = optional(Auth::user()->visits->last());
              }
            @endphp
            @includeWhen(Auth::user()->last_visit(), 'partials.visit-view', ['active_object' => optional(Auth::user()->visits->last())])
            <div class="col-md-4">
              <div class="widget bg-white">
                <div class="widget-icon bg-primary pull-left fa fa-child">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->visits->count() }}</span>
                  <span class="widget-subtitle">
                    @if (Auth::user()->last_visit())
                      <a href="#modal-view-{{ optional($element)->id }}" data-toggle="modal" class="text-primary pull-right ml5">last visit</a>
                      <br>
                    @endif
                    <a href="{{ url('/p/visits') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Visits</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="widget bg-white">
                <div class="widget-icon bg-primary pull-left fa fa-stethoscope">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->surgeries()->count() }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/surgeries') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Surgeries</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="widget bg-white">
                <div class="widget-icon bg-danger pull-left fa fa-stethoscope">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->surgeries()->count() - Auth::user()->surgeries()->where('complications', '')->count() }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/surgeries?filter=complications') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Surgeries with complications</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="widget bg-white">
                <div class="widget-icon bg-primary pull-left fa fa-money">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->billings()->count() }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/billings') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">All Billings</span>
                  </span>
                </div>
              </div>
              <div class="widget bg-white">
                <div class="widget-icon bg-primary pull-left fa fa-money">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">N{{ Auth::user()->billings()->sum('amount') }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/billings') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Total Bills</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="widget bg-white">
                <div class="widget-icon bg-danger pull-left fa fa-money">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->unpaid_bills()->count() }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/billings?filter=unpaid') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Unpaid Bills</span>
                  </span>
                </div>
              </div>
              <div class="widget bg-white">
                <div class="widget-icon bg-danger pull-left fa fa-money">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">N{{ Auth::user()->unpaid_bills()->sum('amount') }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/billings?filter=unpaid') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Total Unpaid Bills</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="widget bg-white">
                <div class="widget-icon bg-lightblue pull-left fa fa-envelope">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->sms_patients()->count() }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/sms') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">Sent SMS</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="widget bg-white">
                <div class="widget-icon bg-lightblue pull-left fa fa-file">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">{{ Auth::user()->patient_files()->count() }}</span>
                  <span class="widget-subtitle">
                    <a href="{{ url('/p/patient_files') }}" class="text-primary pull-right ml5">view</a>
                    <span class="mr5">My Files</span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="widget bg-white">
                <div class="widget-icon bg-primary pull-left fa fa-calendar-o">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">0</span>
                  <span class="widget-subtitle">Appointments</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget bg-white">
                <div class="widget-icon bg-warning pull-left fa fa-calendar-o">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">0</span>
                  <span class="widget-subtitle">Upcoming Appointments</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="widget bg-white">
                <div class="widget-icon bg-danger pull-left fa fa-calendar-o">
                </div>
                <div class="overflow-hidden">
                  <span class="widget-title">0</span>
                  <span class="widget-subtitle">Cancelled Appointments</span>
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