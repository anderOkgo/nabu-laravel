@extends('layouts.app')


@section('content')
<a id="btn_generate" class="btn btn-primary" href="/gps/pass"  data-clipboard-action="copy" data-clipboard-target="#nue">Cambio de contraseña</a>
<div class="container col-md-6 mx-auto">

    <div class="form-group">
        <label  for="exampleInputEmail1">Contraeña anterior</label>
        <input id="pass" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite contraseña">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraeña Nueva</label>
        <input id="new_pass" type="text" class="form-control" id="exampleInputPassword1" placeholder="Digite nueva contraseña">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <a id="btn_generate" class="btn btn-primary" href="sms:+573157625054"  data-clipboard-action="copy" data-clipboard-target="#nue">Generar</a>
        </div>
        <!-- /btn-group -->
        <input id="nue" type="text" class="form-control">
      </div>

    </div>

<div>


@push('scripts')
  <script>
     $(function() {
        var clipboard = new ClipboardJS('#btn_generate');
     });

     $(document).ready(function(){
        $("input").keypress(function(){
            genrete_comand();
            
        });

        $("input").blur(function(){
            genrete_comand();
            
        });

        function genrete_comand() {
            $('#nue').val( '777' +$('#pass').val() + $('#new_pass').val());
        }

    });


    


     

  </script>
@endpush

@endsection