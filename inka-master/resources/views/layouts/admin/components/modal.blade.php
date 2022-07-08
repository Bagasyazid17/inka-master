<div class="modal fade" id="{{ $id or 'myModal' }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id or 'myModal' }}Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ $title or 'Title' }}</h4>
            </div>
            <div class="modal-body">
                {{ $body or '' }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                {{ $actions or '' }}
            </div>
        </div>
    </div>
</div>