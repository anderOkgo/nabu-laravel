@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2>Crear códigos</h2>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
      <form action="/codes" method ="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="form-group col-md-6">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" placeholder="Por favor digite la cantidad a generar">
          </div>

          <div class="form-group col-md-6">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control">
              <option selected disabled>Elige un rol para este usuario...</option>
              @foreach($roles as $role)
              <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
            </select>
          </div>
          
        </div>

        <div class="row">
          <div class="form-group col-md-6">
          <button type="submit" class="btn btn-primary">Generar</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
          </div>
        </div>


        <form>

  

</div>

@push('scripts')
  <script>
     $(function() {
        $('#usuario').select2({
          theme: 'bootstrap4',
          width: '100%'
        });

        //$('#f-input').fileinput();
        $('#imagen').fileinput({
        theme: 'fas',
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
        
      });

  </script>
@endpush

@endsection