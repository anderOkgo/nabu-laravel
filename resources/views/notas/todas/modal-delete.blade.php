<!-- Modal -->
  <div class="modal fade" id="modalEliminar-{{$nota->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Nota</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Esta seguro de eliminar la nota?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>


          {!! Form::open(['action' => ['NotasController@destroy', $nota->id], 'method' => 'delete']) !!}
          {{Form::token()}}
            <button type="submit" class="btn btn-primary">Si</button>
          {!! Form::close() !!}


        </div>
      </div>
    </div>
  </div>