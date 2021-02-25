@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2>Crear Nueva Bicicleta</h2>
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
  <form action="/bikes" method ="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="form-group col-md-6">
        <label>Color</label>
        <input type="text" name="color" class="form-control" placeholder="Nombre">
      </div>
      <div class="form-group col-md-6">
        <label>Marca</label>
        <input type="marca" name="marca" class="form-control" placeholder="marca">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6">
        <label>Serial</label>
        <input type="text" name="serial" class="form-control" placeholder="serial">
      </div>
      
      <div class="form-group col-md-6">
        <label for="usuario">Usuario</label>
        <select name="usuario" id="usuario" class="form-control">
          <option selected disabled>Elige un usuario para esta Bicicleta...</option>
          @foreach($usuarios as $usuario)
          <option value="{{$usuario->id}}">{{$usuario->name}}</option>
          @endforeach
        </select>
      </div>

    </div>


    <div class="row">
      <div class="form-group col-md-6">
        <label>Factura</label>
        <input type="file" name="factura" id="factura" class="form-control" placeholder="factura">
      </div>

      <div class="form-group col-md-6">
        <label >Foto</label>
        <input type="file" id="f-input" name="foto" class="form-control">
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

        $('#f-input').fileinput({
          theme: 'fas',
          language: 'en',
          uploadUrl: '#',
          allowedFileExtensions: ['jpg', 'png', 'gif']
        });

        $('#factura').fileinput({
            theme: 'fas',
            language: 'en',
            uploadUrl: '#',
            allowedFileExtensions: ['jpg', 'png', 'gif']
        });
        
      });

  </script>
@endpush

@endsection