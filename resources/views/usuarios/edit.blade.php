@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h3>Edita usuario {{$user->name}}</h3>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <form action="{{ route('usuarios.update', $user->id) }}" method ="POST">
        @method('PATCH')
        @CSRF
        <div class="form-group">
          <label for="name">nombre</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
    </div>
  </div>

</div>

@endsection