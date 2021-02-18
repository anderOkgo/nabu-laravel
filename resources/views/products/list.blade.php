<!DOCTYPE html>
  
<html lang="en">
<head>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel DataTable Ajax Crud Tutorial - Tuts Make</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
<h2>Laravel DataTable Ajax Crud Tutorial - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
<br>
<a href="https://www.tutsmake.com/how-to-install-yajra-datatables-in-laravel/" class="btn btn-secondary">Back to Post</a>
<a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-product">Add New</a>
<br><br>
  
<table class="table table-bordered table-striped" id="laravel_datatable">
   <thead>
      <tr>
         <th>ID</th>
         <th>S. No</th>
         <th>Title</th>
         <th>Product Code</th>
         <th>Description</th>
         <th>Created at</th>
         <th>Action</th>
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

<script>
    var SITEURL = '{{URL::to('')}}';
    $(document).ready( function () {
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
             url: SITEURL + "/product-list",
             type: 'GET',
            },
            columns: [
                     {data: 'id', name: 'id', 'visible': false},
                     {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                     { data: 'title', name: 'title' },
                     { data: 'product_code', name: 'product_code' },
                     { data: 'description', name: 'description' },
                     { data: 'created_at', name: 'created_at' },
                     {data: 'action', name: 'action', orderable: false},
                  ],
           order: [[0, 'desc']]
         });
    
    /*  When user click add user button */
       $('#create-new-product').click(function () {
           $('#btn-save').val("create-product");
           $('#product_id').val('');
           $('#productForm').trigger("reset");
           $('#productCrudModal').html("Add New Product");
           $('#ajax-product-modal').modal('show');
       });
     
      /* When click edit user */
       $('body').on('click', '.edit-product', function () {
         var product_id = $(this).data('id');
         $.get('product-list/' + product_id +'/edit', function (data) {
            $('#title-error').hide();
            $('#product_code-error').hide();
            $('#description-error').hide();
            $('#productCrudModal').html("Edit Product");
             $('#btn-save').val("edit-product");
             $('#ajax-product-modal').modal('show');
             $('#product_id').val(data.id);
             $('#title').val(data.title);
             $('#product_code').val(data.product_code);
             $('#description').val(data.description);
         })
      });
    
       $('body').on('click', '#delete-product', function () {
     
           var product_id = $(this).data("id");
           
           if(confirm("Are You sure want to delete !")){
             $.ajax({
                 type: "get",
                 url: SITEURL + "product-list/delete/"+product_id,
                 success: function (data) {
                 var oTable = $('#laravel_datatable').dataTable(); 
                 oTable.fnDraw(false);
                 },
                 error: function (data) {
                     console.log('Error:', data);
                 }
             });
           }
       }); 
      
      });
     
   if ($("#productForm").length > 0) {
         $("#productForm").validate({
     
        submitHandler: function(form) {
     
         var actionType = $('#btn-save').val();
         $('#btn-save').html('Sending..');
          
         $.ajax({
             data: $('#productForm').serialize(),
             url: SITEURL + "product-list/store",
             type: "POST",
             dataType: 'json',
             success: function (data) {
     
                 $('#productForm').trigger("reset");
                 $('#ajax-product-modal').modal('hide');
                 $('#btn-save').html('Save Changes');
                 var oTable = $('#laravel_datatable').dataTable();
                 oTable.fnDraw(false);
                  
             },
             error: function (data) {
                 console.log('Error:', data);
                 $('#btn-save').html('Save Changes');
             }
         });
       }
     })
   }
   </script>
 
</html>