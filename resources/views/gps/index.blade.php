@extends('layouts.app')


@section('content')
<div class="container <div col-md-6 mx-auto">

    <div class="form-group">
        <label for="exampleInputEmail1">Contraeña anterior</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite contraseña">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraeña Nueva</label>
        <input id="nue" type="text" class="form-control" id="exampleInputPassword1" placeholder="Digite nueva contraseña">
      </div>
      

      <a id="btn_generate" class="btn btn-primary" href="sms:+573157625054"  data-clipboard-action="copy" data-clipboard-target="#nue">Generar</a>

      
      
      

    </div>

<div>


@push('scripts')
  <script>
     $(function() {
        var clipboard = new ClipboardJS('#btn_generate');
         
     });

     

  </script>
@endpush

@endsection