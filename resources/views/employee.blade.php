<!DOCTYPE html>
<html>
<head>
    <title>Comapnies Data Foam</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
</head>
<body>
   
    {{-- {Employee model table} --}}

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="fname" class="col-sm-2 control-label">FirstName</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter FirstName" value="" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">LastName</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter LastName" value="" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company" class="col-sm-2 control-label">Company</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Enter company Name" value="" maxlength="50" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50">
                        </div>
                    </div>
       
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                            <textarea id="phone" name="phone"  placeholder="Enter Phone" class="form-control"></textarea>
                        </div>
                    </div>
        
                    <div class="modal-footer">
                     <button type="button" class="btn btn-primary add-employee" id="saveBtn" value="create">Save 
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">                    
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Add new company</a>
                    <div class="container">
                        <h1>Employee Data Foam</h1>
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@section('ajax')
<script type="text/javascript">
    $(function () {
        
      /*------------------------------------------
       --------------------------------------------
       Pass Header Token
       --------------------------------------------
       --------------------------------------------*/ 
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
        
      /*------------------------------------------
      --------------------------------------------
      Render DataTable
      --------------------------------------------
      --------------------------------------------*/
      
        
      /*------------------------------------------
      --------------------------------------------
      Click to Button
      --------------------------------------------
      --------------------------------------------*/
      
      $('#createNewProduct').click(function () {
          $('#saveBtn').val("create-product");
          $('#product_id').val('');
          $('#productForm').trigger("reset");
          $('#modelHeading').html("Create New Product");
          $('#ajaxModel').modal('show');
      });
        
      /*------------------------------------------
      --------------------------------------------
      Click to Edit Button
      --------------------------------------------
      --------------------------------------------*/
      $('body').on('click', '.editProduct', function () {
        var employee_id = $(this).data('id');
        $.get("{{ route('employee.index') }}" +'/' + mployee_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Product");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#fname').val(data.fname);
            $('#lname').val(data.lname);
            $('#company').val(data.company);
            $('#email').val(data.email);
            $('#phone').val(data.phone);
        })
      });
        
      /*------------------------------------------
      --------------------------------------------
      Create Product Code
      --------------------------------------------
      --------------------------------------------*/
      $('#saveBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending..');
        
          $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ route('employee.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
         
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
             
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
      });
        
      /*------------------------------------------
      --------------------------------------------
      Delete Product Code
      --------------------------------------------
      --------------------------------------------*/
      $('body').on('click', '.deleteProduct', function () {
       
          var product_id = $(this).data("id");
          confirm("Are You sure want to delete !");
          
          $.ajax({
              type: "DELETE",
              url: "{{ route('employee.store') }}"+'/'+product_id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });

       var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('employee.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'fname', name: 'fname'},
              {data: 'lname', name: 'lname'},
              {data: 'company', name: 'company'},
              {data: 'email', name: 'email'},
              {data: 'phone', name: 'phone'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
         
    });
  </script>
</body>
</html>