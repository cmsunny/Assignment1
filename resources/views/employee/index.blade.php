@extends('layouts.app')

@section('content')
                    
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
 </table>
</div>
{{-- Modal --}}
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