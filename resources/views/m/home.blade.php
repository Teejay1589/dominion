@extends('layouts.app')

@section('page_styles')
@endsection

@section('content')
    <!-- Dashboard Counts Section-->
    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-violet"><i class="icon-check"></i></div>
                        <div class="title"><span>All Open<br>Cases</span>
                        </div>
                        <div class="number"><strong>17</strong></div>
                    </div>
                    <div class="add-new">
                        <a href="{{ url('/m/cases') }}" class="btn btn-xs btn-small bg-violet">Add New Case</a>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-orange"><i class="icon-user"></i></div>
                        <div class="title"><span>New<br>Patients</span>
                        </div>
                        <div class="number"><strong>9</strong></div>
                    </div>
                    <div class="add-new">
                        <a href="{{ url('/m/patients') }}" class="btn btn-xs btn-small bg-orange">Register New Patient</a>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-green"><i class="icon-bill"></i></div>
                        <div class="title"><span>New<br>Invoices</span>
                        </div>
                        <div class="number"><strong>5</strong></div>
                    </div>
                    <div class="add-new">
                        <a class="btn btn-xs btn-small bg-green">See All Billings</a>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-red"><i class="fa fa-calendar-o"></i></div>
                        <div class="title"><span>Fixed<br>Appointments</span>
                        </div>
                        <div class="number"><strong>6</strong></div>
                    </div>
                    <div class="add-new">
                        <a class="btn btn-xs btn-small bg-red">See All Appointments</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-violet"><i class="fa fa-tasks"></i></div>
                        <div class="text"><strong>334</strong><br>
                            <small>Total Cases</small>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i class="fa icon-user"></i></div>
                        <div class="text"><strong>252</strong><br>
                            <small>Total Patients</small>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-blue"><i class="fa icon-user"></i></div>
                        <div class="text"><strong>37</strong><br>
                            <small>Total Staff</small>
                        </div>
                    </div>
                </div>
                <!-- Line Chart            -->
                <div class="chart col-lg-6 col-12">
                    <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                        <canvas id="lineCahrt"></canvas>
                    </div>
                </div>
                <div class="chart col-lg-3 col-12">
                    <!-- Bar Chart   -->
                    <div class="bar-chart has-shadow bg-white">
                        {{--<div class="title"><strong class="text-violet">95%</strong><br>--}}
                        {{--<small>Current Server Uptime</small>--}}
                        {{--</div>--}}
                        {{--<canvas id="barChartHome"></canvas>--}}
                    </div>
                    <!-- Numbers-->
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        {{--<div class="icon bg-green"><i class="fa fa-line-chart"></i></div>--}}
                        {{--<div class="text"><strong>99.9%</strong><br>--}}
                        {{--<small>Success Rate</small>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointments Section-->
    <section class="projects no-padding-top">
        <div class="container-fluid">
            <!-- Project-->
            <div class="project">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="image has-shadow"><img src="{{ asset('img/default.png') }}" alt="..."
                                                               class="img-fluid"></div>
                            <div class="text">
                                <h3 class="h4">Ajumobi Temitope</h3>
                                <small>X-ray</small>
                            </div>
                        </div>
                        <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span>
                            <div class="CTAs pull-right">
                                <a href="" class="btn btn-xs btn-secondary"><i
                                            class="fa fa-thumbs-down"> </i>Decline</a>
                                <a href="" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Fix
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="project-progress">
                            <p>
                                I started feeling some pains around my lower abdomen...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project-->
            <div class="project">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="image has-shadow"><img src="{{ asset('img/default.png') }}" alt="..."
                                                               class="img-fluid"></div>
                            <div class="text">
                                <h3 class="h4">Gbadamosi Williams John</h3>
                                <small>Eyes</small>
                            </div>
                        </div>
                        <div class="project-date"><span class="hidden-sm-down">Today at 6:30 AM</span>
                            <div class="CTAs pull-right">
                                <a href="" class="btn btn-xs btn-secondary"><i
                                            class="fa fa-thumbs-down"> </i>Decline</a>
                                <a href="" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Fix
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="project-progress">
                            <p>
                                Hello sir, I have a great deal of pain whenever my eyes are exposed to
                                light.
                                I need a check-up...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project-->
            <div class="project">
                <div class="row bg-white has-shadow">
                    <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                        <div class="project-title d-flex align-items-center">
                            <div class="image has-shadow"><img src="{{ asset('img/default.png') }}" alt="..."
                                                               class="img-fluid"></div>
                            <div class="text">
                                <h3 class="h4">Nwanaeke Collins</h3>
                                <small>Heart Pain</small>
                            </div>
                        </div>
                        <div class="project-date"><span class="hidden-sm-down">Today at 10:00 AM</span>
                            <div class="CTAs pull-right">
                                <a href="" class="btn btn-xs btn-secondary"><i
                                            class="fa fa-thumbs-down"> </i>Decline</a>
                                <a href="" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Fix
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-col col-lg-6 d-flex align-items-center">
                        <div class="project-progress">
                            <p>
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
