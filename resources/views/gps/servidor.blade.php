@extends('layouts.app')


@section('content')

<h2 class="mx-auto">Agregar Servidor</h2>
<hr><br>
<div class="container col-md-6 mx-auto">

    <div class="form-group">
        <label  for="exampleInputEmail1">Contraseña</label>
        <input id="pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite contraseña">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Servidor</label>
        <input id="new_pass" type="text" class="form-control" id="exampleInputPassword1" placeholder="Digite nueva contraseña">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Puerto</label>
        <input id="apn" type="text" class="form-control" id="exampleInputPassword1" placeholder="Digite nueva contraseña">
      </div>

      <hr>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <a id="btn_generate" class="btn btn-primary"   data-clipboard-action="copy" data-clipboard-target="#nue">Copiar y Enviar</a>
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
        $("#pass").val(localStorage.getItem("pass"));
        $("#btn_generate").attr('href', 'sms:' + localStorage.getItem("tel"));
     });

     $(document).ready(function(){
        $("input").keypress(function(){
            genrete_comand();
            
        });

        $("input").blur(function(){
            genrete_comand();
            
        });

        $("#btn_generate").click(function(){
            genrete_comand();
        });

        function genrete_comand() {
            $('#nue').val( '804' +$('#pass').val() + ' ' + $('#new_pass').val() + ' ' + $('#apn').val() );
        }

    });


    


     

  </script>
@endpush

@endsection