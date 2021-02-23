@extends('layouts.app')


@section('content')  
<div class="container">
 
<table class="table table-bordered table-striped data-table" id="laravel_datatable">
   <thead>
      <tr>
        <th>id</th>
        <th>color</th>
        <th>serial</th>
        <th>brand</th>
        <th>photo_path</th>
        <th>code_path</th>
      </tr>
   </thead>
</table>
</div>
  
<div class="modal fade" id="ajax-product-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="productCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="productForm" name="productForm" class="form-horizontal">
           <input type="hidden" name="product_id" id="product_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                </div>
            </div> 
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product Code</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Tilte" value="" maxlength="50" required="">
                </div>
            </div>
  
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">
         
    </div>
</div>
</div>
</div>
</body>

@push('scripts')
  <script>
     $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('bikes.index')}}",
            columns: [
              { data: 'id', name: 'id'},
              { data: 'color', name: 'color'},
              { data: 'serial', name: 'serial'},
              { data: 'brand', name: 'brand'},
              { data: 'photo_path', name: 'photo_path', searchable: false},
              { data: 'code_path', name: 'code_path', orderable: false, searchable: false},
            ]
         });
     });
  </script>
@endpush
@endsection
 