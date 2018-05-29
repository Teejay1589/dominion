@extends('layouts.patient')

@section('page_styles')
@endsection

@section('content')

    <section>
        <div class="container-fluid">
        	@for ($i = 0; $i < 5; $i++)
	            <div class="card">
	                <div class="card-close">
	                    <div class="dropdown">
	                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
	                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
	                    </div>
	                </div>
	                <div class="card-header">
	                    <div class="card-title">Case Title {{ $i+1 }}</div>
	                </div>
	                <div class="card-body">
	                    <div>Brief Information {{ $i+1 }}</div>
	                </div>
	            </div>
        	@endfor
        </div>
    </section>

@endsection

@section('page_scripts')
@endsection
