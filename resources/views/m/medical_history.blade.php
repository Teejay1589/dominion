@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')
    <section>
		<div class="row mb15">
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-10 col-sm-12">
				<div class="panel">
                    <div class="panel-heading border">
                        <div class="panel-title h5 mb5"><strong>{{ $active_object->full_name() }}</strong></div>
                        <div class="panel-subtitle"><code>{{ $active_object->file_number }}</code></div>
                    </div>
                    <div class="panel-body">

                        <nav>
                            <ul class="nav">
                                <li class="nav-item">
                                    <span class="text-primary">brief information about patient</span>
                                </li>
                                <li class="nav-item">
                                    <em>
                                        patient info, visits, surgeries (except billings) shows up as
                                    </em>
                                    <strong> patient medical history</strong>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    {{-- <div class="panel-footer"></div> --}}
                </div>
			</div>
            <div class="col-md-1 col-sm-12"></div>
		</div>
	</section>
@endsection

@section('page_scripts')
@endsection