<form action="{{ url('/m/blog/post/create') }}" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Create New Post</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="form-control-label">Title: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" placeholder="Title"
                               value="{{ old('title') }}" required maxlength="255">
                    </div>

                    {{-- <div class="form-group">
                        <label class="form-control-label">Upload a Featured Image:</label>
                        <input type='file' id="uploadImg" name="featured_img"/>
                    </div> --}}

                    <div class="form-group">
                        <label class="form-control-label">Post Body: <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="5" name="body" value="{{ old('body') }}"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

