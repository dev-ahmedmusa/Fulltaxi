<!-- Modal -->
<div class="modal fade" id="delete{{ $cancelReason->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/cancelReasons_trans.delete_cancelReasons')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cancelReason.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $cancelReason->id }}">
                <h5>{{trans('Dashboard/cancelReasons_trans.Warning')}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/cancelReasons_trans.Close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('Dashboard/cancelReasons_trans.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
