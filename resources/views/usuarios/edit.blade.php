@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</div>

@endsection