@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2>Crear nuevo usuario</h2>
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
      <form action="/usuarios" method ="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="form-group col-md-6">
            <label >Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre">
          </div>
          <div class="form-group col-md-6">
            <label >Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label >Tipo Identificación</label>
            <select name="tipo_dni" class="form-control">
              <option selected disabled>Elige un tipo de documento...</option>
              <option value="CC">Cédula</option>
              <option value="TI">Targeta de Identidad</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label >Número de Identificación</label>
            <input type="text" name="dni" class="form-control" placeholder="Número de Identificación">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label >Célular</label>
            <input type="text" name="celular" class="form-control" placeholder="Célular">
          </div>
          <div class="form-group col-md-6">
            <label >Dirección</label>
            <input type="text" name="direccion" class="form-control" placeholder="Dirección">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label >Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group col-md-6">
            <label >Confirme Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme contraseña">
          </div>
        </div>


        <div class="row">
          <div class="form-group col-md-6">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control">
              <option selected disabled>Elige un rol para este usuario...</option>
              @foreach($roles as $role)
              <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label >Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
          <button type="submit" class="btn btn-primary">Guardar</button>
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