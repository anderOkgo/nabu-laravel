@extends('layouts.app')


@section('content')

<h2 class="mx-auto">Reiniciar</h2>
<hr><br>
<div class="container col-md-6 mx-auto">

      <hr>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <a id="btn_generate" class="btn btn-primary" href="sms:+573157625054"  data-clipboard-action="copy" data-clipboard-target="#nue">Copiar y Enviar</a>
        </div>
        <!-- /btn-group -->
        <input id="nue" type="text" class="form-control" value= "RESTART">
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
            $('#nue').val( 'RESTART');
        }

    });


    


     

  </script>
@endpush

@endsection