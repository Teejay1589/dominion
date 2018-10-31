<dl class="dl-horizontal">
    <dt></dt>
    <dd class="mb5 lead"><strong>Post Details</strong></dd>

    <dt>Title</dt>
    <dd class="mb5">{{ $element->title }}</dd>
    <dt>By</dt>
    <dd class="mb5"><span class="badge">{{ optional(optional($element->user)->role)->name }}</span> {{ optional($element->user)->full_name() }}</dd>
    <dt>Body</dt>
    <dd class="mb5">{!! $element->body !!}</dd>
    <dt>Created at</dt>
    <dd class="mb5">{{ $element->created_at }}</dd>
    <dt>Last Modification</dt>
    <dd class="mb5">{{ $element->updated_at }}</dd>
</dl>