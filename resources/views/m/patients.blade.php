@extends('layouts.app')

@section('page_styles')
@endsection

@section('content')

    <section>
        <div class="container-fluid">
        	<div>
        		<a href="#modal-create" class="btn btn-link btn-block" data-toggle="modal">Create Patient</a>
	        	@include('forms.patients-create')
        	</div>

        	<div class="clearfix"></div>
        	<br>

            <div class="card" style="width: 100%;">
                <div class="card-close">
                    <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="card-title">Patients</div>
                </div>
                <div class="card-body p-0">
                    @include('tables.patients')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page_scripts')
@endsection
