@extends('layouts.app')

@section('content')

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Información!</h5>
    Bienvendos a la página de inicio de comandos para gps!
  </div>

  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Comencemos!</h5>
    Para empezar a usar la aplicación: <a class="btn-sm btn-success" href="{{url('gps/inicio')}}"> Configurar aqui</a>
  </div>

@endsection
