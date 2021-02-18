@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <form action="/usuarios" method ="POST">
        @csrf
        <div class="form-group">
          <label for="name">nombre</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="rol">Rol</label>
          <select name="rol" class="form-control">
            <option selected disabled>Elige un rol para este usuario...</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </form>
    </div>
  </div>
  

</div>

@endsection