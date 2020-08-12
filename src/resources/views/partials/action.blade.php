<a href="{{ route('autoremove.remove', ['id' => $corporation->corporation_id]) }}" class="btn btn-sm btn-danger">
    <i class="fas fa-trash-alt"></i> {{ trans('web::seat.delete') }}
</a>