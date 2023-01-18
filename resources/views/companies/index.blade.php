@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Add Data</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Add new company</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal update-product">
                       <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                <span class="text-danger error-text name_err"></span>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                                <span class="text-danger error-text email_err"></span>
                            </div>
                           
                        </div>
           
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-12">
                                <textarea id="website" name="website" required="" placeholder="Enter Website" class="form-control"></textarea>
                                <span class="text-danger error-text website_err"></span>
                            </div>
                            
                        </div>
            
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary update" id="saveBtn" value="create">Save changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
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
        var product_id = $(this).data('id');
        
            $.get("{{ route('company.index') }}" +'/' + product_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#website').val(data.website);
            });
        });
      
    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            var id = $("#product_id").val()
            if(id) {
                updateCompnay(id);
            } else {
                createCompmany();
            }
        });

        function updateCompnay(id)
        {
            var url = '{{ route("company.update", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
            data: $('#productForm').serialize(),
            url: url,
            type: "PUT",
            dataType: 'json',
            success: function (data) {
                if(data.status == '400')
                {
                    printErrorMsg(data.errors);
                }
                if(data.status == '200')
                {
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                }           
            }
            });
       }

      function createCompmany()
       {
            var url = '{{ route("company.store") }}';
             
                $.ajax({
                data: $('#productForm').serialize(),
                url: url,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if(data.status == '400')
                    {
                        printErrorMsg(data.errors);
                    }
                    if(data.status == '200')
                    {
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                    }
                
                }
           });
      };

      
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
            url: "{{ route('company.store') }}"+'/'+product_id,
            success: function (data) {
                table.draw();
            },
     
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
      /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('company.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'website', name: 'website'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    function printErrorMsg (msg) {
        $.each( msg, function( key, value ) {
          $('.'+key+'_err').text(value);
        });
    }
       
  });
  
</script>
@endpush