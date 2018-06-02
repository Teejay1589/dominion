@extends('layouts.patient')

@section('page_styles')
@endsection

@section('content')
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-violet"><i class="fa fa-tasks"></i></div>
                        <div class="text"><strong>5</strong><br>
                            <small>My Cases</small>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i class="fa icon-user"></i></div>
                        <div class="text"><strong>5</strong><br>
                            <small>My Billings</small>
                        </div>
                    </div>
                </div>
                <!-- Line Chart -->
                <div class="chart col-lg-6 col-12">
                </div>
                <div class="chart col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-blue"><i class="fa fa-calendar"></i></div>
                        <div class="text"><strong>4</strong><br>
                            <small>My Appointments</small>
                        </div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="fa fa-calendar"></i></div>
                        <div class="text"><strong>1</strong><br>
                            <small>Upcoming Appointments</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page_scripts')
@endsection