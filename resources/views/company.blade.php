
  <!-- Modal -->
  <div class="modal fade" id="companydata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="addform" >
            {{csrf_field()}}
        <div class="modal-body">
            <div class="row">   
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                     <label class="control-label">Name&nbsp; </label>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" minlength="3"
                         value="{{isset($company->name) ? $company->name : ''}}" >
                         <span class="validation-errors"></span>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label class="control-label">Email&nbsp;</label>
                        
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" minlength="3"
                            value="{{isset($company->email) ? $company->email : ''}}" >
                            <span class="validation-errors"></span>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label class="control-label">Website&nbsp;</label>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="form-group">
                        <input type="text" id="validation-errors" class="form-control" name="website" 
                            value="{{isset($company->website) ? $company->website : ''}}" >
                            <span class="validation-errors"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Companies Data Form</h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#companydata" style="margin-left: 90%">
                        Add Data
                       </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            {{-- <th>Auction</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#addform').on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('company.store')}}",
                method: 'POST',
                data: $("#addform").serialize(),
                success: function(response) {
                    console.log(response);
                    if(response.status == '200'){
                        $("#addform").modal('hide');
                        $("#addform").html(" ");
                    }
                },
                error: function (xhr) {
                $('.validation-errors').html('');
                $.each(xhr.responseJSON.errors, function(key,value) {
                $('.validation-errors').append('<div class="alert alert-danger">'+value+'</div');
                 }); 
                }
            });
        });
    });
     
</script>    