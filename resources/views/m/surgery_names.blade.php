@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')
    <section>
        <div class="row mb15">
            <div class="col-md-1 col-xs-12"></div>
            <div class="col-md-10 col-xs-12">
            	@include('components.toolbar', [
                    'model' => new App\SurgeryName(),
                    'create_form' => 'forms.surgery_names-create',
                    'data_name' => 'surgery_names',
                    'data' => $surgery_names,
                    'removed_keys' => array('id', 'description', 'created_at', 'updated_at')
                ])

                {{-- <div class="clearfix"></div>
                <br> --}}

                <div>
                    @forelse ($surgery_names as $element)
                        <div class="panel mb5">
                            <div class="panel-heading p10 pb5" role="tab" id="panel-heading{{ $element->id }}">
                                <span class="pull-right">
                                    <a href="#modal-update-{{ $element->id }}" data-toggle="modal" class="mr10">update</a>
                                    <a href="{{ url('/m/surgeries/delete/'.$element->id) }}" class="mr10 text-danger">
                                        <span>delete</span>
                                    </a>
                                </span>
                                <h5 class="panel-title">
                                    <span class="mr10">{{ $element->surgery_name }}</span>
                                </h5>
                                <div class="mb5"></div>
                                <div>
                                    @include('forms.surgery_names-update', ['active_object' => $element])
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                            <strong>Sorry!</strong> No Records Found
                        </div>
                    @endforelse
                </div>

                <div class="text-left">
                    {{ $surgery_names->links('shared.pagination', ['small' => true]) }}
                </div>
            </div>
            <div class="col-md-1 col-xs-12"></div>
        </div>
    </section>

@endsection

@section('page_scripts')
    <script type="text/javascript">
        var base_url = '{{ url('/m/surgery_names') }}';
    </script>
    <script type="text/javascript" src="{{ asset('js/toolbar.js') }}"></script>
@endsection
