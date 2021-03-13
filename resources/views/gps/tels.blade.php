@extends('layouts.app')


@section('content')
<div class="container col-md-6 mx-auto">
  <h2>telefonos</h2>

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