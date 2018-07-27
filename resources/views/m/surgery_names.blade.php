@extends('layouts.admin')

@section('title', $page->title)

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

            @include('tables.surgery_names')
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
