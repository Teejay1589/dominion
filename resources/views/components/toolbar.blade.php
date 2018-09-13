<div id="toolBar">
  <div class="row">
      @isset ( $create_form )
        <div class="col-lg-3 col-xs-12 mb5">
            <div>
                @if ( isset($create_text) )
                    <a href="#modal-create" class="btn btn-primary btn-block btn-sm" data-toggle="modal">{{ $create_text }}</a>
                @else
                    <a href="#modal-create" class="btn btn-primary btn-block btn-sm" data-toggle="modal">Create {{ ucwords(str_singular(str_ireplace('_', ' ', $data_name), 1)) }}</a>
                @endif
                @include($create_form)
            </div>
        </div>
      @endisset
      <div class="col-lg-7 col-xs-12 mb5">
          <div class="input-group input-group-sm" style="width: auto;">
              <div class="input-group-addon hidden-xs"><span class="glyphicon glyphicon-search"></span></div>
              <input type="text" class="form-control" id="searchTerm" name="searchterm" placeholder="Search Term" style="width: 65%; padding: 0 .5rem;" value="{{ isset($data->searchterm) && !isset($_GET['default']) ? $data->searchterm : '' }}">
              @php
                  $keys = $model->getFillable();
                  if ( isset($removed_keys) ) {
                    $removed_keys = $removed_keys;
                  } else {
                    $removed_keys = array('id', 'created_at', 'updated_at');
                  }
                  if ( isset($added_keys) ) {
                      foreach ($added_keys as $key => $value) {
                          array_push($keys, $value);
                      }
                  }
                  if ( isset($addup_keys) ) {
                      foreach ($addup_keys as $key => $value) {
                          array_unshift($keys, $value);
                      }
                  }
              @endphp
              <select id="filter" class="form-control" name="filter" style="width: 35%; padding: 0 .2rem;">
                  {{-- <option value="">ALL</option> --}}
                  @foreach ($keys as $obj => $value)
                      @continue ( in_array($value, $removed_keys) )
                      <option value="{{ $value }}" {{ (isset($data->filter) && $data->filter == $value) ? 'selected' : '' }}>{{ str_ireplace("_"," ",str_ireplace("_id", " ", $value)) }}</option>
                  @endforeach
              </select>
              <div class="input-group-btn">
                  <button class="btn btn-primary" id="searchButton" type="button">Search</button>
              </div>
          </div>
          @isset ( $data->searchterm )
              <span class="help-block"><small><strong>{{ $data->total() }}</strong> Records Found!</small></span>
          @endisset
      </div>
      <div class="col-lg-2 col-xs-12 mb5">
            <div class="form-group px-2">
                <div class="input-group input-group-sm">
                    <div class="input-group-addon">Show:</div>
                    @php
                        $entries = array(10, 25, 50, 100);
                    @endphp
                    <select class="form-control" id="searchEntries" name="entries">
                        @foreach ($entries as $obj)
                            <option value="{{ $obj }}" {{ (isset($_GET['entries']) && $_GET['entries'] == $obj) ? 'selected' : '' }}>{{ $obj }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
      </div>
  </div>
</div>