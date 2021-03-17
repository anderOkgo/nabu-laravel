@extends('layouts.app')


@section('content')

<h2 class="mx-auto">Agregar télefonos</h2>
<hr><br>
<div class="container col-md-6 mx-auto">

  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input id="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite contraseña">
  </div>
    <div class="form-group">
        <label  for="exampleInputEmail1">Télefono</label>
        <input id="tels" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite Télefono">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Posición Télefono</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option id="1">1</option>
          <option id="2">2</option>
          <option id="3">3</option>
        </select>
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
        $("input, select").keypress(function(){
            genrete_comand();
        });

        $("input, select").blur(function(){
            genrete_comand();
            
        });

        $("input, select").change(function(){
            genrete_comand();
            
        });

        $("#btn_generate").click(function(){
            genrete_comand();
        });

        function genrete_comand() {
            $('#nue').val( $('#tels').val() + $('#pass').val() + ' ' +$('#exampleFormControlSelect1').val()  );
        }

    });


    


     

  </script>
@endpush

@endsection