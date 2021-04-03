@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2>Editar usuario: {{$user->name}}</h2>
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

      <form action="{{ route('usuarios.update', $user->id) }}" method ="POST" enctype="multipart/form-data">
        @method('PATCH')
        @CSRF
        <div class="row">
          <div class="form-group col-md-6">
            <label >Nombre</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Nombre">
          </div>
          <div class="form-group col-md-6">
            <label >Email</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Email">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label >Tipo Identificación</label>
            <select name="tipo_dni" class="form-control">
              <option selected disabled>Elige un tipo de documento...</option>
              @if( $user->type_doc == "CC" )
              <option value="CC" selected>Cédula</option>
              <option value="TI">Targeta de Identidad</option>
              @else
              <option value="CC">Cédula</option>
              <option value="TI" selected>Targeta de Identidad</option>
              @endif
            </select>
          </div>
          <div class="form-group col-md-6">
            <label >Número de Identificación</label>
            <input type="text" name="dni" value="{{$user->num_doc}}" class="form-control" placeholder="Número de Identificación">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label >Célular</label>
            <input type="text" name="celular" value="{{$user->cell}}" class="form-control" placeholder="Célular">
          </div>
          <div class="form-group col-md-6">
            <label >Dirección</label>
            <input type="text" name="direccion" value="{{$user->dir}}" class="form-control" placeholder="Dirección">
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label >Contraseña <span class="small">(Opcional)</span></label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group col-md-6">
            <label >Confirme Contraseña<span class="small">(Opcional)</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme contraseña">
          </div>
        </div>


        <div class="row">

          @if(Auth::user()->tieneRole()[0] !== "administrador" ) 
          <div class="d-none">
          @endif
            <div class="form-group col-md-6">
              <label for="rol">Rol</label>
              <select name="rol" class="form-control">
                <option selected disabled>Elige un rol para este usuario...</option>
                @foreach($roles as $role)
                @if($role->name == str_replace(array('["', '"]'), '', $user->tieneRole() ))
                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                @else
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
                @endforeach
              </select>
            </div>

            @if(Auth::user()->tieneRole()[0] !== "administrador" ) 
          </div> 
            @endif
              
          
          
          <input type="hidden" name="{{$user->tieneRole()}}">
          <div class="form-group col-md-6">
            <label >Imagen</label>
            <input type="file" name="imagen" class="form-control">
            @if($user->imagen != "")
            <img src="{{ asset('imagenes/'. $user->imagen)}}" alt="{{$user->imagen}}" height="50px" width="50px">
            @endif
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
          </div>
        </div>

      </form>
    </div>
  </div>

</div>

@endsection