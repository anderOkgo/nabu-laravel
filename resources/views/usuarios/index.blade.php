@extends('layouts.app')


@section('content')
<div class="container">
  <h2>Lista de Usuarios <a href="usuarios/create"><button type="button" class="btn btn-success float-right">Agregar</button></a></h2>
  <table class="table-hover data-table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Rol</th>
        <th scope="col">Imagen</th>
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
            ajax: "{{ route('usuarios.index') }}",
            columns: [
              { data: 'id', name: 'id'},
              { data: 'name', name: 'name'},
              { data: 'email', name: 'email'},
              { data: 'rol', name: 'rol'},
              { data: 'imagen', name: 'imagen', searchable: false},
              { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
         });
     });
  </script>
@endpush

@endsection