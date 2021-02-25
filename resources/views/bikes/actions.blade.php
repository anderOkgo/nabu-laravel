@include('bikes.modal-delete')
<form action="{{ route('bikes.destroy', $id) }}" method="POST">
    <a href="{{ route('bikes.show',$id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button></a>
    <a href="{{ route('bikes.edit',$id) }}"><button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></button></a>
     @method('DELETE')
     @CSRF
    <button type="button" class="btn btn-danger btn-sm" data-target="#delete-{{$id}}" data-toggle="modal">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>