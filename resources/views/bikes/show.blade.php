@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h2>Datos de la Bicicleta</h2>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
  <form  method ="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

    <div class="row">
      <div class="form-group col-md-6">
        <label>Color</label>
        <p>{{$bike->color}}</p>
      </div>
      <div class="form-group col-md-6">
        <label>Marca</label>
        <p>{{$bike->brand}}</p>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6">
        <label>Serial</label>
        <p>{{$bike->serial}}</p>
      </div>

      <div class="form-group col-md-6">
        <label for="usuario">Usuario</label>
          @foreach($users as $user)
              @if( $user->id ==  $bike->user_id )
              <p>{{$user->name}}</p>
              @endif
            @endforeach
      </div>

      <div class="form-group col-md-6">
        <label>Serial</label>
        <p>{{$bike->type}}</p>
      </div>
      
    </div>


    <div class="row">
      <div class="form-group col-md-6">
        <label>Factura</label>
        <input type="file" id="factura" name="factura" class="form-control" placeholder="factura">
      </div>
      <div class="form-group col-md-6">
        <label >Foto</label>
        <input type="file" id="f-input" name="foto" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label >QR</label>
        <input type="file" id="qr" name="qr" class="form-control">
      </div>
    </div>

    
  <form>

</div>

@push('scripts')
  <script>
     $(function() {
        $('#usuario').select2({
          theme: 'bootstrap4',
          width: '100%'
        });

        //$('#f-input').fileinput();
        $('#f-input').fileinput({
        theme: 'fas',
        language: 'es',
        uploadUrl: '#',
        showUpload: false,
        showBrowse: false,
        showClose: false,
        showRemove: false,
        showCaption: false,
        initialPreview: [
          "<img src='{{$bike->getUrlPathAttribute('photo_path')}}' class='file-preview-image' alt='Desert' title='Desert'>"
        ],
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });

    $('#factura').fileinput({
        theme: 'fas',
        language: 'es',
        uploadUrl: '#',
        showUpload: false,
        showBrowse: false,
        showClose: false,
        showRemove: false,
        showCaption: false,
        initialPreview: [
          "<img src='{{$bike->getUrlPathAttribute('invoice_path')}}' class='file-preview-image' alt='Desert' title='Desert'>"
        ],
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });

    $('#qr').fileinput({
        theme: 'fas',
        language: 'es',
        uploadUrl: '#',
        showUpload: false,
        showBrowse: false,
        showClose: false,
        showRemove: false,
        showCaption: false,
        initialPreview: [
          "<img src='{{$bike->code_path}}' class='file-preview-image' alt='Desert' title='Desert'>"
        ],
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
        
      });

  </script>
@endpush

@endsection