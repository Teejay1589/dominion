@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')

    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="widget bg-white">
          <div class="widget-icon bg-success pull-left">
          </div>
          <div class="overflow-hidden">
            <span class="widget-title">0</span>
            <span class="widget-subtitle">Open Visits</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget bg-white">
          <div class="widget-icon bg-success pull-left">
          </div>
          <div class="overflow-hidden">
            <span class="widget-title">0</span>
            <span class="widget-subtitle">New Patients</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget bg-white">
          <div class="widget-icon bg-success pull-left">
          </div>
          <div class="overflow-hidden">
            <span class="widget-title">0</span>
            <span class="widget-subtitle">New Invoices</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget bg-white">
          <div class="widget-icon bg-success pull-left">
          </div>
          <div class="overflow-hidden">
            <span class="widget-title">0</span>
            <span class="widget-subtitle">Fixed Appointments</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div>
          <div class="widget bg-white">
            <div class="widget-icon bg-success pull-left fa fa-check">
            </div>
            <div class="overflow-hidden">
              <span class="widget-title">0</span>
              <span class="widget-subtitle">Stats 1</span>
            </div>
          </div>
          <div class="widget bg-white">
            <div class="widget-icon bg-success pull-left">
            </div>
            <div class="overflow-hidden">
              <span class="widget-title percent">0</span>
              <span class="widget-subtitle">Stats 2</span>
            </div>
          </div>
          <div class="widget bg-white">
            <div class="widget-icon bg-success pull-left">
            </div>
            <div class="overflow-hidden">
              <span class="widget-title">0</span>
              <span class="widget-subtitle">Stats 3</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="widget-chart bg-white">
          <div class="row">
            <div class="col-xs-12">
              <small class="text-uppercase">Chart 1 Title</small>
              <h4 class="bold text-success no-margin">0</h4>
            </div>
          </div>
          <div class="canvas-holder mt5 mb5">
            <div class="rickshaw_graph chart-sm" style="display: table; height: 170px;">
              <h3 class="text-center" style="display: table-cell; vertical-align: middle;">SIMPLE CHART 1</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="widget-chart bg-white">

          <div class="row">
            <div class="col-xs-12">
              <small class="text-uppercase">Chart 2 Title</small>
              <h4 class="bold text-success no-margin">0</h4>
            </div>
          </div>
          <div class="canvas-holder mt5 mb5">
            <div class="flot-pie chart-sm" style="display: table; height: 170px;">
              <h3 class="text-center" style="display: table-cell; vertical-align: middle;">SIMPLE CHART 1</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Appointments Section-->
    <section class="projects no-padding-top">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project mb10">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-date pull-right">
                            <div class="mt10"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
                            <div class="CTAs">
                                <a href="" class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"> </i>Decline</a>
                                <a href="" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"> </i>Fix</a>
                            </div>
                        </div>
                        <div class="project-title d-flex align-items-center">
                            <img src="{{ asset('img/default.png') }}" alt="..." class="img-responsive pull-left mr10 mb10" style="height: 50px;">
                            <div class="text">
                                <h3 class="h4">Ajumobi Temitope <br><small>X-ray</small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="project-progress">
                            <p class="p10">
                                I started feeling some pains around my lower abdomen...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project-->
            <div class="project mb10">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-date pull-right">
                            <div class="mt10"><span class="hidden-sm-down">Today at 6:30 AM</span></div>
                            <div class="CTAs">
                                <a href="" class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"> </i>Decline</a>
                                <a href="" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"> </i>Fix</a>
                            </div>
                        </div>
                        <div class="project-title d-flex align-items-center">
                            <img src="{{ asset('img/default.png') }}" alt="..." class="img-responsive pull-left mr10 mb10" style="height: 50px;">
                            <div class="text">
                                <h3 class="h4">Gbadamosi Williams John <br><small>Eyes</small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="project-progress">
                            <p class="p10">
                                Hello sir, I have a great deal of pain whenever my eyes are exposed to
                                light.
                                I need a check-up...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project-->
            <div class="project mb10">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-date pull-right">
                          <div class="mt10"><span class="hidden-sm-down">Today at 10:00 AM</span></div>
                            <div class="CTAs">
                                <a href="" class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"> </i>Decline</a>
                                <a href="" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"> </i>Fix</a>
                            </div>
                        </div>
                        <div class="project-title d-flex align-items-center">
                            <img src="{{ asset('img/default.png') }}" alt="..." class="img-responsive pull-left mr10 mb10" style="height: 50px;">
                            <div class="text">
                                <h3 class="h4">Nwanaeke Collins <br><small>Heart Pain</small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="project-progress">
                            <p class="p10">
                                Urgent! I'd been having heart pain frequently since 3 days ago...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page_scripts')
@endsection
