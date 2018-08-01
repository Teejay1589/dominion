@extends('layouts.admin')

@section('title', $page->title)

@section('page_styles')
@endsection

@section('content')
    <section>
		<div class="row mb15">
            <div class="col-md-1 col-sm-12"></div>
            <div class="col-md-10 col-sm-12">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title h5 text-bold">I Can</div>
								<div class="panel-subtitle text-italic text-success">List of actions you can perform</div>
							</div>
							<div class="panel-body bg-success">

								<nav>
									<ul class="nav">
										@foreach (App\Permission::where('permit', '>=', Auth::user()->role_id)->get()->unique('table') as $obj)
											<li class="nav-item">
												<em>
													@foreach (App\Permission::where('permit', '>=', Auth::user()->role_id)->where('table', $obj->table)->get() as $element)
														@if ( $loop->first && App\Permission::where('permit', '>=', Auth::user()->role_id)->where('table', $obj->table)->count() > 2 )
															{{ $element->action }},
														@elseif ( $loop->first )
															{{ $element->action }}
														@elseif ( $loop->last )
															and {{ $element->action }}
														@else
															{{ $element->action }},
														@endif
													@endforeach
												</em>
												<strong>{{ str_ireplace('_', ' ', $obj->table) }}</strong>
											</li>
										@endforeach
									</ul>
								</nav>

							</div>
							{{-- <div class="panel-footer"></div> --}}
						</div>
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title h5 text-bold">Special Permissions</div>
								<div class="panel-subtitle text-italic text-success">List of actions you can also perform</div>
							</div>
							<div class="panel-body bg-success">

								<nav>
									<ul class="nav">
										@foreach (App\UserPermission::where('user_id', Auth::id())->get()->unique('table') as $obj)
											<li class="nav-item">
												<em>
													@foreach (App\UserPermission::where('user_id', Auth::id())->where('table', $obj->table)->get() as $element)
														@if ( $loop->first && App\UserPermission::where('user_id', Auth::id())->where('table', $obj->table)->count() > 2 )
															{{ $element->action }},
														@elseif ( $loop->first )
															{{ $element->action }}
														@elseif ( $loop->last )
															and {{ $element->action }}
														@else
															{{ $element->action }},
														@endif
													@endforeach
												</em>
												<strong>{{ str_ireplace('_', ' ', $obj->table) }}</strong>
											</li>
										@endforeach
									</ul>
								</nav>

							</div>
							{{-- <div class="panel-footer"></div> --}}
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title h5 text-bold">I Cannot</div>
								<div class="panel-subtitle text-italic text-danger">List of actions you cannot perform</div>
							</div>
							<div class="panel-body bg-danger">

								<nav>
									<ul class="nav">
										@foreach (App\Permission::where('permit', '<', Auth::user()->role_id)->get()->unique('table') as $obj)
											<li class="nav-item">
												<em>
													@foreach (App\Permission::where('permit', '<', Auth::user()->role_id)->where('table', $obj->table)->get() as $element)
														@if ( $loop->first && App\Permission::where('permit', '<', Auth::user()->role_id)->where('table', $obj->table)->count() > 2 )
															{{ $element->action }},
														@elseif ( $loop->first )
															{{ $element->action }}
														@elseif ( $loop->last )
															and {{ $element->action }}
														@else
															{{ $element->action }},
														@endif
													@endforeach
												</em>
												<strong>{{ str_ireplace('_', ' ', $obj->table) }}</strong>
											</li>
										@endforeach
									</ul>
								</nav>

							</div>
							{{-- <div class="panel-footer"></div> --}}
						</div>
					</div>
				</div>
			</div>
            <div class="col-md-1 col-sm-12"></div>
		</div>
	</section>
@endsection

@section('page_scripts')
@endsection