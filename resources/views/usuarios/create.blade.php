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
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  

</div>

@endsection