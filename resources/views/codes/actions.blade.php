@include('codes.modal-delete')
<form action="{{ route('usuarios.destroy', $id) }}" method="POST">
     @method('DELETE')
     @CSRF
    <button type="button" class="btn btn-danger btn-sm" data-target="#delete-{{$id}}" data-toggle="modal">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>