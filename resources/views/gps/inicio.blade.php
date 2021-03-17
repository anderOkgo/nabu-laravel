@extends('layouts.app')


@section('content')

<h2 class="mx-auto">Definir Datos App</h2>
<hr><br>
<div class="container col-md-6 mx-auto">
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Información de interes!</h5>
    Los datos de esta zona serán almacenados en su dispositivo (computador o móvil).
Esta información puede ser eliminada borrando datos de navegación del navegador.
  </div>

  <label  for="pass">Contraseña</label>
  <div class="input-group ">
    <input id="pass" type="password" class="form-control"  placeholder="Digite contraseña">
    <span class="input-group-append">
      <button id="ver_pass" type="button" class="btn btn-info btn-flat">Ver</button>
    </span>
  </div><br>
      <div class="form-group">
        <label for="exampleInputPassword1">Télefono GPS</label>
        <input id="new_pass" type="text" class="form-control" id="exampleInputPassword1" placeholder="Digite nueva contraseña">
      </div>

      <hr>
      <div class="input-group mx-auto">
        <div class="input-group-prepend">
            <button id="btn_generate" class="btn btn-primary" >Guardar</button>
        </div>
      </div>

    </div>

<div>


@push('scripts')
  <script>
     $(function() {
        var clipboard = new ClipboardJS('#btn_generate');
        $("#pass").val(localStorage.getItem("pass"));
        $("#btn_generate").attr('href', 'sms:' + localStorage.getItem("tel"));
        var clipboard = new ClipboardJS('#btn_generate');
        $("#pass").val(localStorage.getItem("pass"));
        $("#new_pass").val(localStorage.getItem("tel"));
        $("#btn_generate").attr('href', 'sms:+57' + localStorage.getItem("tel"));
     });

     $(document).ready(function() {
      
        $("#btn_generate").click(function() {
          save_vars('pass', $("#pass").val());
          save_vars('tel', $("#new_pass").val());
          alert("Datos Guardados")
        });

        $("#ver_pass").click(function() {
          

          var tipo =  document.getElementById("pass");
          if(tipo.type == "password") {
            tipo.type = "text";
          }else{
            tipo.type = "password";
          }
          
        });

     

        function save_vars(key, value) {
          localStorage.setItem(key, value);
        }
      });


    


     

  </script>
@endpush

@endsection