@extends('layouts.app')

@section('page_styles')
    {{-- @if( count($surgery_names) > 0 )
        <link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/datatables.min.css') }}">
        <style type="text/css">
            .dataTables_wrapper .row {
                width: 100%;
            }
        </style>
    @endif --}}
@endsection

@section('content')

    <section>
        <div class="container-fluid">
        	<div>
        		<a href="#modal-create" class="btn btn-link btn-block" data-toggle="modal">Create Surgery</a>
	        	@include('forms.surgery_names-create')
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
                    <div class="card-title">Surgery Names</div>
                </div>
                <div class="card-body p-0">
                    @include('tables.surgery_names')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page_scripts')
    {{-- @if( count($surgery_names) > 0 )
        <script type="text/javascript" src="{{ asset('js/datatables/datatables.min.js') }}"></script>
        <script type="text/javascript">
            $(".table").DataTable({
                "pageLength": 10
            });
        </script>
    @endif --}}
@endsection
