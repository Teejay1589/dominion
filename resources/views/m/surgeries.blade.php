@extends('layouts.app')

@section('page_styles')
    @if( count($surgeries) > 0 )
        <link rel="stylesheet" type="text/css" href="{{ asset('js/datatables/datatables.min.css') }}">
        <style type="text/css">
            .dataTables_wrapper .row {
                width: 100%;
            }
        </style>
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/selectize.js-master/dist/css/selectize.bootstrap2.css') }}">
@endsection

@section('content')

    <section>
        <div class="container-fluid">
        	<div>
        		<a href="#modal-create" class="btn btn-link btn-block" data-toggle="modal">Create Surgery</a>
	        	@include('forms.surgeries-create')
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
                    <div class="card-title">Surgeries</div>
                </div>
                <div class="card-body p-0">
                    @include('tables.surgeries')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page_scripts')
    @if( count($surgeries) > 0 )
        <script type="text/javascript" src="{{ asset('js/datatables/datatables.min.js') }}"></script>
        <script type="text/javascript">
            $(".table").DataTable({
                "pageLength": 10
            });
        </script>
    @endif
    <script type="text/javascript" src="{{ asset('/vendor/selectize.js-master/dist/js/standalone/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select.select-case').selectize({
                maxItems: 1,
                create: false,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
            $('select.select-surgery_name').selectize({
                maxItems: 1,
                create: true,
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ','
            });
        });
    </script>
@endsection
