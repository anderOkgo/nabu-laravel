@extends('layouts.app')


@section('content')

<div class="jumbotron">
  <h1 class="display-4">{{$user->name}}</h1>
  <p class="lead">{{$user->name}}</p>
  <hr class="my-4">
</div>

@endsection