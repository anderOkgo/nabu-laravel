@extends('layouts.app')


@section('content')
<div class="container">
  <h2>Lista de Códigos <a href="codes/create"><button type="button" class="btn btn-success float-right">Agregar</button></a></h2>
  <table class="table-hover data-table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Código</th>
        <th scope="col">Usuario</th>
        <th scope="col">Rol</th>
        <th scope="col" width="100px" >Acciones</th>
      </tr>
    </thead>
    <tbody>
    
    </tbody>
  </table>
</div>

@push('scripts')
  <script>
    //var URL = "{{ route('usuarios.index')}}";
/*     $(document).ready( function () {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    }); */
     $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "<strong>Buscar:</strong>",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
            responsive: true,
            ajax: "{{ route('codes.index') }}",
            columns: [
              { data: 'id', name: 'id'},
              { data: 'code', name: 'code'},
              { data: 'user', name: 'user'},
              { data: 'rol', name: 'rol'},
              { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
         });
     });
  </script>
@endpush

@endsection